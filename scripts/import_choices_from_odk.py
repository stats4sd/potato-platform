import mysql.connector as MySQLConnection
import pandas as pd
from pathlib import Path
from dotenv import load_dotenv
import sys
import os
import errno
import dbConfig as config
base_path = Path(__file__).parent.parent
env_path = base_path / ".env"
load_dotenv(dotenv_path=env_path)

user = os.getenv('DB_USERNAME')
passwd = os.getenv('DB_PASSWORD')
host = os.getenv('DB_HOST')
db = os.getenv('DB_DATABASE')

### variedad ###
choices = pd.read_excel(open(sys.argv[1], 'rb'), sheet_name='choices')
choices.rename(columns={"label": "label_spanish", "name": "value"}, inplace=True)
choices = choices.where((pd.notnull(choices)), None)
choices = choices.dropna(thresh=1)

try:
    conn = MySQLConnection.connect(**config.dbConfig)
    cursor = conn.cursor()

    cols = choices.columns.tolist()
    cols = '`,`'.join(cols)

    print('data is uploading')
    data_value = []
    for i, row in choices.iterrows():
        sql = f"INSERT INTO `choices` (`{cols}`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
        data_value.append(tuple(row))

    cursor.executemany(sql, data_value)
    conn.commit()

except MySQLConnection.Error as err:
    print(f'Failed to upload data for: {err}')

else:
    print('data uploaded')

conn.close
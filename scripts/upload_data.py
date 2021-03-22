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
variedad=pd.read_excel(open(sys.argv[1], 'rb'),sheet_name='Variedad')

codes=[]
for name in variedad.codigo_variedad:
    codes.append([s for s in name if s.isdigit() or s=="."])
variedad_name=[]
for code in codes:
    variedad_name.append("".join(code))

variedad['name']=variedad_name
columns_name = {'codigo_agricultor':'farmer_id', 'codigo_variedad':'id', }
variedad = variedad.rename(columns=columns_name)

### brotamiento ###
brotamiento=pd.read_excel(open(sys.argv[1], 'rb'),sheet_name='Brotamiento', skiprows=1)

columns_name = {'codigo_variedad':'variety_id', 'brote_color':'color_predominant_tuber_shoot', 'brote_color_2':'color_secondary_tuber_shoot', 'brote_color_2_dist':'distribution_color_secodary_tuber_shoot' }
brotamiento = brotamiento.rename(columns=columns_name)
# drop rows with missing value / NaN in every column
#brotamiento = brotamiento.dropna(thresh=10)
brotamiento = brotamiento.where((pd.notnull(brotamiento)), None)


### fructificacion ###
fructificacion=pd.read_excel(open(sys.argv[1], 'rb'),sheet_name='Fructificación', skiprows=1)

columns_name = {'codigo_variedad':'variety_id','color_baya':'color_berries', 'forma_baya':'shape_berry', 'madurez_variedad':'maturity_variety'}
fructificacion = fructificacion.rename(columns=columns_name)
# drop rows with missing value / NaN in every column
#fructificacion = fructificacion.dropna(thresh=10)
fructificacion = fructificacion.where((pd.notnull(fructificacion)), None)

### floracion ###
floracion=pd.read_excel(open(sys.argv[1], 'rb'),sheet_name='Floración', skiprows=1, na_values=['_','-'])

columns_name = {'codigo_variedad':'variety_id','crecimiento':'plant_growth', 'diseccion':'leaf_dissection', 'foliolos':'number_lateral_leaflets', 'interhojuelas':'number_intermediate_leaflets', 'interhojuelas_peciolulo':'number_leaflets_on_petioles', 'color_tallo':'color_stem', 'forma_alas_tallo':'shape_stem_wings', 'grado_floracion':'degree_flowering_plant', 'forma_corola':'shape_corolla', 'color_flor':'color_predominant_flower', 'intensidad_predominante':'intensity_color_predominant_flower', 'color_flor_2':'color_secondary_flower', 'distribucion_secundario':'distribution_color_secodary_flower', 'pigmentacion_anteras':'pigmentation_anthers', 'pigmentacion_pistilo':'pigmentation_pistil', 'color_caliz':'color_chalice', 'color_pedicelo':'color_pedicel'}
floracion = floracion.rename(columns=columns_name)
floracion = floracion.drop(['tolerencia_rancha', 'tolerencia_granizada', 'tolerencia_helada', 'tolerencia_sequia'], axis=1)
# drop rows with missing value / NaN in every column
floracion = floracion.dropna(thresh=10)
floracion = floracion.where((pd.notnull(floracion)), None)

### Tuberculos a la cosecha ###
tuberculos=pd.read_excel(open(sys.argv[1], 'rb'),sheet_name='Tubérculos a la cosecha', skiprows=1)

columns_name = {'codigo_variedad':'variety_id','piel_color':'color_predominant_tuber', 'piel_intensidad':'intensity_color_predominant_tuber', 'piel_color_2':'color_secondary_tuber', 'piel_color_2_dist':'distribution_color_secodary_tuber', 'forma':'shape_tuber', 'forma_variante':'variant_shape_tuber', 'forma_ojos':'depth_tuber_eyes', 'pulpa_color':'color_predominant_tuber_pulp', 'pulpa_color_2':'color_secondary_tuber_pulp', 'pulpa_color_2_dist':'distribution_color_secodary_tuber_pulp'}
tuberculos = tuberculos.rename(columns=columns_name)
tuberculos = tuberculos.drop(['tolerencia_rancha', 'tolerencia_gorgojo', 'tolerencia_granizada', 'tolerencia_helada', 'tolerencia_sequia'], axis=1)
# drop rows with missing value / NaN in every column
tuberculos = tuberculos.dropna(thresh=10)
tuberculos = tuberculos.where((pd.notnull(tuberculos)), None)

# connects to database
conn = MySQLConnection.connect(**config.dbConfig)
cursor = conn.cursor()

# get data from variables 
sql_select_id_variables = "SELECT id FROM variables WHERE xlsform_varname='crecimiento';"
cursor.execute(sql_select_id_variables)
print(cursor.fetchall())

# get data from variables_choices 
sql_select_variables_choices = "SELECT choice_id FROM _link_variables_choices WHERE variable_id='1';"
cursor.execute(sql_select_variables_choices)
print(cursor.fetchall())
choices_ids = list(cursor.fetchall())
# get data from choices 
sql_select_choices = "SELECT * FROM choices WHERE id IN "+choices_ids+";"
print(sql_select_choices)
cursor.execute(sql_select_choices)
print(cursor.fetchall())


# get all records
# variables =pd.DataFrame(cursor.fetchall())
# variables.columns = cursor.column_names

# print("variables: ", variables)

# get data from choices 
sql_select_choices = "select * from choices;"
cursor.execute(sql_select_choices)
# get all records
choices =pd.DataFrame(cursor.fetchall())
choices.columns = cursor.column_names



print("choices: ", choices)

dataframes = [variedad, floracion, fructificacion, brotamiento, tuberculos]
tables = ['`varieties`', '`flowering`', '`fructification`', '`sprouts`', '`tubers_at_harvest`']

for d,t in zip(dataframes, tables): 
    try:

        data = d

        cols = data.columns.tolist()
        cols = '`,`'.join(cols)

        print('data is uploading')
        data_value = []
        for i, row in data.iterrows():
            sql = f"INSERT INTO {t} (`{cols}`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
            data_value.append(tuple(row))

        cursor.executemany(sql, data_value)
        conn.commit()

    except MySQLConnection.Error as err:
        print(f'Failed to upload data for {t} : {err}')

    else:
        print('data uploaded for ', t)

conn.close
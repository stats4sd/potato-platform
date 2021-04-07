<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePhotosFloweringTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flowering', function (Blueprint $table) {
        $table->string('photos')->change();
        });

        Schema::table('flowering', function (Blueprint $table) {
        $table->renameColumn('photos', 'photo_leaf');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flowering', function (Blueprint $table) {
        $table->renameColumn('photo_leaf', 'photos');
        });

        Schema::table('flowering', function (Blueprint $table) {
        $table->json('photos')->change();
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */   
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit',128)->nullable()->default(null);
            $table->string('name',128)->nullable()->default(null);
            $table->string('department',128)->nullable()->default(null);
            $table->string('city',128)->nullable()->default(null);
            $table->string('adress',256)->nullable()->default(null);            
            $table->string('phone1',256)->nullable()->default(null);
            $table->string('phone2',256)->nullable()->default(null);
            $table->string('phone3',256)->nullable()->default(null);
            $table->string('email_institucional',256)->nullable()->default(null);            
            $table->string('description',512)->nullable()->default(null);
            $table->string('slogan',256)->nullable()->default(null);
            $table->string('scutcheon1', 256)->default('default.png');
            $table->string('scutcheon2', 256)->default('default.png');
            $table->string('label')->nullable()->default(null);
            $table->boolean('active')->default(true);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}

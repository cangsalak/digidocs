<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependences', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name',128)->nullable()->default(null);            
            $table->string('adress',256)->nullable()->default(null);            
            $table->string('phone1',256)->nullable()->default(null);
            $table->string('phone2',256)->nullable()->default(null);
            $table->string('phone3',256)->nullable()->default(null);
            $table->string('email_institutional',256)->nullable()->default(null);            
            $table->string('description',512)->nullable()->default(null);            
            $table->string('label')->nullable()->default(null);
            $table->boolean('active')->default(true);            
            $table->timestamps();
            $table->integer('entity_id')->unsigned()->default(2);            
            $table->foreign('entity_id')->references('id')->on('entities')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependences');
    }
}

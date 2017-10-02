<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPetAbandonedTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Ad_Pet_Abandoned';

    /**
     * Run the migrations.
     * @table Ad_Pet_Abandoned
     *
     * @return void
     */
    public function up()
    {
    	Schema::create($this->set_schema_table, function (Blueprint $table) {
    		$table->engine = 'InnoDB';
    		$table->increments('idAd_Pet_Abandoned');
    		$table->integer('fkPet');
    		$table->text('personality_pet')->nullable();

    		$table->index(["fkPet"], 'idAd_Pet_Abandoned');


    		$table->foreign('fkPet', 'idAd_Pet_Abandoned')
    		->references('idPets')->on('Pets')
    		->onDelete('no action')
    		->onUpdate('no action');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists($this->set_schema_table);
    }
}



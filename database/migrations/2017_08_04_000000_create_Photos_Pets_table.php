<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosPetsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Photos_Pets';

    /**
     * Run the migrations.
     * @table Photos_Pets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPhoto');
            $table->integer('fkPet');
            $table->binary('photo_pet')->nullable();

            $table->index(["fkPet"], 'fk_Photos_Pets_Pets1_idx');


            $table->foreign('fkPet', 'fk_Photos_Pets_Pets1_idx')
                ->references('idPet')->on('Pets')
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


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Pets';

    /**
     * Run the migrations.
     * @table Pets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPet');
            $table->integer('fkUser');
            $table->string('name_pet', 45)->nullable();
            $table->string('age_pet', 45)->nullable();
            $table->string('proportion_pet', 45)->nullable();
            $table->string('species_pet', 45)->nullable();
            $table->string('breed_pet', 45)->nullable();
            $table->string('city_pet', 45)->nullable();
            $table->string('state_pet', 2)->nullable();
            $table->text('description')->nullable();
            $table->boolean('active_ad')->nullable();

            $table->index(["fkUser"], 'fk_Pets_Users1_idx');


            $table->foreign('fkUser', 'fk_Pets_Users1_idx')
                ->references('idUser')->on('Users')
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



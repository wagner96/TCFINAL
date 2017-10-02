
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviePetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Movie_Pet';

    /**
     * Run the migrations.
     * @table Movie_Pet
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idMovie');
            $table->integer('fkPet');
            $table->text('link_movie')->nullable();

            $table->index(["fkPet"], 'fk_Movie_Pet_Pets1_idx');


            $table->foreign('fkPet', 'fk_Movie_Pet_Pets1_idx')
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





<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdPetDisappearedTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Ad_Pet_Disappeared';

    /**
     * Run the migrations.
     * @table Ad_Pet_Disappeared
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idAd_Pet_Disappeared');
            $table->integer('fkPet');
            $table->string('reward', 45)->nullable();
            $table->string('where', 45)->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('when', 45)->nullable();

            $table->index(["fkPet"], 'fk_Ad_Pet_Disappeared_Pets1_idx');


            $table->foreign('fkPet', 'fk_Ad_Pet_Disappeared_Pets1_idx')
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

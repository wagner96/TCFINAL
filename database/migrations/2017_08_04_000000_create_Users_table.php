<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Users';

    /**
     * Run the migrations.
     * @table Users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idUser');
            $table->string('name', 250)->nullable();
            $table->string('email', 45);
            $table->string('breed', 45)->nullable();
            $table->string('password', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->binary('photo_profile')->nullable();
            $table->string('state', 2)->nullable();
            $table->string('cep', 45)->nullable();
            $table->string('city', 45)->nullable();
            $table->string('district', 45)->nullable();
            $table->string('complement', 45)->nullable();
            $table->integer('number')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->text('social_network')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('hierarchical_level', 45)->nullable();
            $table->boolean('active_user')->nullable();
            $table->text('description_actions')->nullable();
            $table->date('date_profile_creation')->nullable();
            $table->date('date_profile_modification')->nullable();

            $table->unique(["email"], 'email_UNIQUE');
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


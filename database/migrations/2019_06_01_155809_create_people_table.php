<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('movies_as_actor_actress')->nullable();
            $table->unsignedInteger('movies_as_director')->nullable();
            $table->unsignedInteger('movies_as_producer')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('aliases');
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
        Schema::dropIfExists('people');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastName')->nullable();

            $table->string('company')->nullable();
            $table->string('linkedin')->unique()->nullable();
            $table->string('formation')->nullable();

            $table->string('contactPoint')->nullable();
            $table->date('dateFirstContact')->nullable();

            $table->string('cell')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('emailSecondary')->nullable();

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
        Schema::dropIfExists('leads');
    }
}

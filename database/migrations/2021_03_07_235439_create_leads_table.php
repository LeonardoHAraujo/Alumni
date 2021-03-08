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
            $table->string('lastName');

            $table->string('company')->nullable();
            $table->string('linkedin')->unique()->nullable();
            $table->string('formation')->nullable();

            $table->string('contactPoint');
            $table->date('dateFirstContact');

            $table->string('cell')->unique();
            $table->string('telephone')->nullable();
            $table->string('email')->unique();
            $table->string('emailSecondary')->nullable();

            $table->string('city');
            $table->string('state');
            $table->string('country');
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

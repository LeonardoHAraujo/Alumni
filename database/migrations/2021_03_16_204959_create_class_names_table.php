<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_names', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('data')->nullable();
            $table->bigInteger('course')->nullable()->unsigned();
            $table->bigInteger('course2')->nullable()->unsigned();
            $table->string('class')->nullable();
            $table->string('local')->nullable();

            $table->foreign('course')
                ->references('id')
                ->on ('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('course2')
                ->references('id')
                ->on ('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('class_names');
    }
}

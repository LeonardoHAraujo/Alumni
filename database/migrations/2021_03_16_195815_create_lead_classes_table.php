<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_classes', function (Blueprint $table) {
          $table->id();
          $table->integer('classId');
          $table->string('certificate')->nullable();
          $table->string('paid')->nullable();
          $table->string('confirmed')->nullable();
          $table->string('class')->nullable();

          $table->foreign('classId')
            ->references('id')
            ->on ('class_names')
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
        Schema::dropIfExists('lead_classes');
    }
}

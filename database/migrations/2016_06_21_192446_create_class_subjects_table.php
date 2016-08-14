<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subjects', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->tinyInteger('deleted')->unsigned()->default('0');

            $table->timestamps();

            $table->foreign('class_id')
                    ->references('id')->on('class_names')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('subject_id')
                    ->references('id')->on('subjects')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class_subjects');
    }
}

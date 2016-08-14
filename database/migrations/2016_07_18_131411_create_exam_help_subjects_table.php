<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamHelpSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_help_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('help_id')->unsigned();
            $table->integer('subject_id');
            $table->string('other_subject');
            $table->string('topic');

            $table->timestamps();

            $table->foreign('help_id')
                    ->references('id')->on('exam_helps')
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
        Schema::drop('exam_help_subjects');
    }
}

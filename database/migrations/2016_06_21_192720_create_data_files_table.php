<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_files', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id')->unsigned();
            $table->integer('class_subject_id')->unsigned();
            $table->integer('data_type_id')->unsigned();
            $table->string('file_name');
            $table->string('description');
            $table->timestamps();

            $table->foreign('class_subject_id')
                    ->references('id')->on('class_subjects')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('data_type_id')
                    ->references('id')->on('data_file_types')
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
        Schema::drop('data_files');
    }
}

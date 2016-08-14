<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('response')->unsigned();
            $table->integer('material')->unsigned();
            $table->integer('query_resolve')->unsigned();
            $table->string('message');
            $table->tinyInteger('at_front')->default(0);

            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('response')
                    ->references('id')->on('feedback_grades')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('material')
                    ->references('id')->on('feedback_grades')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');

            $table->foreign('query_resolve')
                    ->references('id')->on('feedback_grades')
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
        Schema::drop('feedbacks');
    }
}

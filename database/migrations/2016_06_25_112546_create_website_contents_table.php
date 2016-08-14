<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_contents', function (Blueprint $table) {
             $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('content',2500)->default('Content Here....');
            $table->integer('file_type')->unsigned();
            
            $table->timestamps();

            $table->foreign('file_type')
                    ->references('id')->on('file_types')
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
        Schema::drop('website_contents');
    }
}

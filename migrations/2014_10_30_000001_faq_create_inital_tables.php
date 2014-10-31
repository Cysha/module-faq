<?php

use Illuminate\Database\Migrations\Migration;

class FaqCreateInitalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_categories', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->boolean('active')->default(1);

        });

        Schema::create('faq_questions', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('question', 255);
            $table->text('answer');
            $table->boolean('active')->default(1);

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
        Schema::drop('faq_questions');
        Schema::drop('faq_categories');
    }
}

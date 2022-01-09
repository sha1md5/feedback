<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Answer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer', function (Blueprint $table) {
            $table->uuid('project_id');
            $table->uuid('employee_id');
            $table->uuid('question_id');
            $table->text('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')->references('id')->on('project')->cascadeOnDelete();
            $table->foreign('employee_id')->references('id')->on('employee')->cascadeOnDelete();
            $table->foreign('question_id')->references('id')->on('question')->cascadeOnDelete();

            $table->primary(['project_id', 'employee_id', 'question_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answer');
    }
}

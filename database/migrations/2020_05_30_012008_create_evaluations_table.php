<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('class', 255);
            $table->string('discipline', 255);
            $table->string('institution', 255);
            $table->string('game_name', 255);
            $table->bigInteger('evaluator_id')->unsigned();
            $table->foreign('evaluator_id')->references('id')->on('evaluators')->onDelete('cascade');
            $table->bigInteger('standard_questionnaire_id')->unsigned();
            $table->foreign('standard_questionnaire_id')->references('id')->on('standard_questionnaires')->onDelete('cascade');
            $table->string('course');
            $table->dateTime('date');

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
        Schema::dropIfExists('evaluations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('evaluation_id')->unsigned();
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
            $table->bigInteger('standard_questionnaire_item_id')->unsigned()->nullable();
            $table->foreign('standard_questionnaire_item_id')->references('id')->on('standard_questionnaire_items')->onDelete('cascade');
            $table->bigInteger('extra_questionnaire_item_id')->unsigned()->nullable();
            $table->foreign('extra_questionnaire_item_id')->references('id')->on('extra_questionnaire_items')->onDelete('cascade');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('response');

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
        Schema::dropIfExists('responses');
    }
}

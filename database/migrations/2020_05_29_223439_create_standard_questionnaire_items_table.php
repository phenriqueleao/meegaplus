<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardQuestionnaireItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_questionnaire_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('standard_questionnaire_id')->unsigned();
            $table->foreign('standard_questionnaire_id')->references('id')->on('standard_questionnaires')->onDelete('cascade');
            $table->string('description');
            $table->string('number');
            
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
        Schema::dropIfExists('standard_questionnaire_items');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardQuestionnaireItem extends Model
{
    protected $fillable = [
        'number', 
        'description', 
        'standard_questionnaire_id'
    ];

    public function standard_questionnaire()
    {
        return $this->belongsTo(StandardQuestionnaire::class);
    }

    public function response()
    {
        return $this->hasMany(Response::class);
    }
}

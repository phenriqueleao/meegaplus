<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'evaluation_id', 
        'standard_questionnaire_item_id', 
        'extra_questionnaire_item_id', 
        'student_id', 
        'response'
    ];

    public function standardquestion()
    {
        return $this->belongsTo(StandardQuestionnaireItem::class);
    }

    public function extraquestion()
    {
        return $this->belongsTo(ExtraQuestionnaireItem::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

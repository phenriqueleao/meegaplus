<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraQuestionnaireItem extends Model
{
    protected $fillable = [
        'number', 
        'description', 
        'evaluation_id'
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StandardQuestionnaire extends Model
{
    protected $fillable = [
        'name', 
        'created_at', 
        'updated_at'
    ];
    
    public function standardquestions()
    {
        return $this->hasMany(StandardQuestionnaireItem::class);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'name', 'email', 'password', 'evaluation_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}

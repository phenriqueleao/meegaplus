<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Evaluator extends Authenticatable
{
    use Notifiable;

    protected $guard = 'evaluator';

    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'institution',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function evaluation()
    {
        return $this->hasMany(Evaluation::class);
    }
}

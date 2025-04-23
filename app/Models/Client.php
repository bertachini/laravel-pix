<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'cpf', 'phone', 'email', 'password', 'account_number', 'balance', 'city_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

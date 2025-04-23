<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Client extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'name', 'cpf', 'phone', 'email', 'password', 'account_number', 'balance', 'city_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

namespace App\Models;


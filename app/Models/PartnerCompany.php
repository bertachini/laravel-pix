<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUuid;

class PartnerCompany extends Model
{
    //
    use HasFactory, HasUuid;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'company_name',
        'cnpj',
        'phone',
        'email',
        'access_token',
        'balance',
    ];

    

}

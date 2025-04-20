<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUuid;

class Client extends Model
{
    //
    use HasFactory, HasUuid;
    
    public $incrementing = false;
    protected $keyType = 'string';

  
}

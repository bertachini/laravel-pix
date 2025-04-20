<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasUuid;
use App\Models\PartnerCompany;
use App\Models\Client;
use App\Models\TransactionStatus;

class Transaction extends Model
{
    //

    use HasFactory, HasUuid;
    public $incrementing = false;
    protected $keyType = 'string';

    function company()
    {
        return $this->belongsTo(PartnerCompany::class , 'partner_company_id');
    }
    
    function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class);
    }


    function client()
    {
        return $this->belongsTo(Client::class);
    }

}

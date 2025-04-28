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

    protected $fillable = [
        'date',
        'partner_company_id',
        'client_id',
        'amount',
        'transaction_status_id'
    ];

    function partnerCompany()
    {
        return $this->belongsTo(PartnerCompany::class , 'partner_company_id');
    }

    function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class, 'transaction_status_id');
    }


    function client()
    {
        return $this->belongsTo(Client::class);
    }

}

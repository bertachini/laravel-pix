<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerCompany;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Support\Str;

class TransactionsController extends Controller
{
    //
    
    public function newTransiction()
    {

        $paternerCompanies = PartnerCompany::all();
        $clients = Client::all();

        return view('transactions.new', [
            'paternerCompanies' => $paternerCompanies,
            'clients' => $clients
        ]);
    }

    public function saveTransiction(Request $req)
    {
        $uudiPennding = TransactionStatus::where('name', 'pending')->firstOrFail();

        $transaction = new Transaction;
        $transaction->date = now();
        $transaction->partner_company_id = $req->partner_company_id;
        $transaction->client_id = $req->client_id;
        $transaction->amount = $req->amount;
        $transaction->transaction_status_id = $uudiPennding->id;
        $transaction->save();

        return redirect(route('transactions.get'))->with('notify',[
            'type' => 'success',
            'message' => 'Transação criada com sucesso! com o ID: ' . $transaction->id
        ]);
    }

    public function getTransiction()
    {
        $transactions = Transaction::all();

        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }




}

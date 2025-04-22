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


        $transaction = Transaction::create([
            'date' => now(),
            'partner_company_id' => $req->partner_company_id,
            'client_id' => $req->client_id,
            'amount' => $req->amount,
            'transaction_status_id' => $uudiPennding->id
        ]);
       

        return redirect(route('transactions.get'))->with('success', 'Transação criada com sucesso!');
    }

    public function getTransiction()
    {
        $transactions = Transaction::all();

        return view('transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function getTransictionById($id)
    {
        $transaction = Transaction::where('partner_company_id', $id)->orWhere('client_id', $id)->get();
        return view('transactions.index', [
            'transactions' => $transaction
        ]);
    }

    public function approveTransiction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $recebedor = PartnerCompany::findOrFail($transaction->partner_company_id);
        $pagador = Client::findOrFail($transaction->client_id);

        if($pagador->balance < $transaction->amount){
            return redirect(route('transactions.get'))->with('error', 'Saldo insuficiente para realizar a transação!');
        }

        $pagador->balance -= $transaction->amount;
        $pagador->save();
        $recebedor->balance += $transaction->amount;
        $recebedor->save();
        $transaction->transaction_status_id = TransactionStatus::where('name', 'approved')->first()->id;
        $transaction->save();

        return redirect(route('transactions.get'))->with('success', 'Transação aprovada com sucesso!');
    }
    public function rejectTransiction($id)
    {
        $transaction = Transaction::updateOrCreate(
            ['id' => $id],
            ['transaction_status_id' => TransactionStatus::where('name', 'rejected')->first()->id]
        );

        return redirect(route('transactions.get'))->with('success', 'Transação rejeitada com sucesso!');
    }



}

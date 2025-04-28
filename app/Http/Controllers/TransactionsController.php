<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\PartnerCompany;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\TransactionStatus;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function newTransaction()
    {
        $partnerCompanies = PartnerCompany::all();
        $clients = Client::all();
        $transactionStatuses = TransactionStatus::all();

        return view('transactions.new', compact('partnerCompanies', 'clients', 'transactionStatuses'));
    }

    public function saveTransaction(TransactionRequest $request)
    {
        $transaction = Transaction::create([
            'date' => now(),
            'partner_company_id' => $request->partner_company_id,
            'client_id' => $request->client_id,
            'amount' => $request->amount,
            'transaction_status_id' => $request->transaction_status_id,
        ]);

        return redirect()->route('transactions.get')->with('success', 'Transação criada com sucesso!');
    }

    public function getTransaction()
    {
        $transactions = Transaction::all();
        \Log::info('Transactions fetched: ' . $transactions->count());
        return view('transactions.index', compact('transactions'));
    }

    public function getTransactionById($id)
    {
        $transactions = Transaction::where('partner_company_id', $id)
            ->orWhere('client_id', $id)
            ->get();
        return view('transactions.index', compact('transactions'));
    }

    public function editTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $partnerCompanies = PartnerCompany::all();
        $clients = Client::all();
        $statuses = TransactionStatus::all();

        return view('transactions.edit', compact('transaction', 'partnerCompanies', 'clients', 'statuses'));
    }

    public function updateTransaction(TransactionRequest $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'date' => $request->date,
            'partner_company_id' => $request->partner_company_id,
            'client_id' => $request->client_id,
            'amount' => $request->amount,
            'transaction_status_id' => $request->transaction_status_id,
        ]);

        return redirect()->route('transactions.get')->with('success', 'Transação atualizada com sucesso!');
    }

    public function deleteTransaction($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.get')->with('success', 'Transação excluída com sucesso!');
    }
}

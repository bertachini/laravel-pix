<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\TransactionStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StatusController extends Controller
{
    public function getStatus()
    {
        $statuses = TransactionStatus::all();
        return view('status.index', compact('statuses'));
    }

    public function newStatus()
    {
        return view('status.new');
    }

    public function saveStatus(StatusRequest $request)
    {
        $status = TransactionStatus::create([
            'id' => (string) Str::uuid(),
            'name' => $request->name,
        ]);

        return redirect()->route('status.get')->with('success', 'Status cadastrado com sucesso.');
    }

    public function editStatus($id)
    {
        $status = TransactionStatus::findOrFail($id);
        return view('status.edit', compact('status'));
    }

    public function updateStatus(StatusRequest $request, $id)
    {
        $status = TransactionStatus::findOrFail($id);
        $status->update([
            'name' => $request->name,
        ]);

        return redirect()->route('status.get')->with('success', 'Status atualizado com sucesso.');
    }

    public function deleteStatus($id)
    {
        $status = TransactionStatus::findOrFail($id);
        $status->delete();

        return redirect()->route('status.get')->with('success', 'Status excluído com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionStatus;

class StatusController extends Controller
{
    //

    public function getStatus()
    {
        $status = TransactionStatus::all();

        return view('status.index', [
            'status' => $status
        ]);
    }
    
    public function newStatus()
    {
        return view('status.new');

    }

    public function saveStatus(Request $req)
    {
        $status = TransactionStatus::create([
            'name' => $req->name,
        ]);

        return redirect()->route('status.get')->with('success', 'Status created successfully.');
    }
}

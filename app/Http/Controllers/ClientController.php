<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\City;
use Illuminate\Support\Str;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    //

    public function clients()
    {
        $clients = Client::all();
        return view('clients.index', [
            'clients' => $clients,
        ]);
    }
    
    public function newClient()
    {
        $city = City::all();
        return view('clients.new', [
            'cities' => $city,
        ]);
    }

    public function saveClient(ClientRequest $request)
    {
       
        $client = Client::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'account_number' => (string) Str::uuid(),
            'balance' => 0.0,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('clients.get')->with('success', 'Client created successfully.');
    }

}

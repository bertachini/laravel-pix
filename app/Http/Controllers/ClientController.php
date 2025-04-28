<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\City;
use App\Models\Client;
use Illuminate\Support\Str;

class ClientController extends Controller
{
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

        return redirect()->route('clients.get')->with('success', 'Cliente cadastrado com sucesso');
    }

    public function editClient($id)
    {
        $client = Client::findOrFail($id);
        $cities = City::all();

        return view('clients.edit', [
            'client' => $client,
            'cities' => $cities,
        ]);
    }

    public function updateClient(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'phone' => $request->phone,
            'email' => $request->email,
            'city_id' => $request->city_id,
            'password' => $request->password ? bcrypt($request->password) : $client->password,
            'balance' => $request->balance ?? $client->balance,
        ]);

        return redirect()->route('clients.get')->with('success', 'Cliente atualizado com sucesso');
    }

    public function destroyClient($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.get')->with('success', 'Cliente excluído com sucesso');
    }
}

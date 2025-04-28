<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function newCity()
    {
        return view('cities.new');
    }

    public function saveCity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ], [
            'name.required' => 'O nome da cidade é obrigatório.',
            'name.string' => 'O nome da cidade deve ser uma string.',
            'name.max' => 'O nome da cidade deve ter no máximo 255 caracteres.',
            'state.required' => 'O estado é obrigatório.',
            'state.string' => 'O estado deve ser uma string.',
            'state.max' => 'O estado deve ter no máximo 255 caracteres.',
            'country.required' => 'O país é obrigatório.',
            'country.string' => 'O país deve ser uma string.',
            'country.max' => 'O país deve ter no máximo 255 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        City::create([
            'name' => $request->name,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        return redirect()->route('cities.get')->with('success', 'Cidade cadastrada com sucesso!');
    }

    public function editCity($id)
    {
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function updateCity(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ], [
            'name.required' => 'O nome da cidade é obrigatório.',
            'name.string' => 'O nome da cidade deve ser uma string.',
            'name.max' => 'O nome da cidade deve ter no máximo 255 caracteres.',
            'state.required' => 'O estado é obrigatório.',
            'state.string' => 'O estado deve ser uma string.',
            'state.max' => 'O estado deve ter no máximo 255 caracteres.',
            'country.required' => 'O país é obrigatório.',
            'country.string' => 'O país deve ser uma string.',
            'country.max' => 'O país deve ter no máximo 255 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $city->update([
            'name' => $request->name,
            'state' => $request->state,
            'country' => $request->country,
        ]);

        return redirect()->route('cities.get')->with('success', 'Cidade atualizada com sucesso!');
    }

    public function deleteCity($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('cities.get')->with('success', 'Cidade excluída com sucesso!');
    }
}

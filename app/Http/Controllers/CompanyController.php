<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\PartnerCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function getPartnerCompany()
    {
        $partnerCompanies = PartnerCompany::all();
        \Log::info('PartnerCompanies fetched: ' . $partnerCompanies->count()); // Debug log
        return view('company.index', compact('partnerCompanies'));
    }

    public function newPartnerCompany()
    {
        return view('company.new');
    }

    public function savePartnerCompany(CompanyRequest $request)
    {
        $company = PartnerCompany::create([
            'company_name' => $request->company_name,
            'cnpj' => $request->cnpj,
            'phone' => $request->phone,
            'email' => $request->email,
            'access_token' => Str::random(32),
            'balance' => 0.0,
            'is_active' => true,
        ]);

        return redirect()->route('company.get')->with('success', 'Empresa cadastrada com sucesso.');
    }

    public function editPartnerCompany($id)
    {
        $company = PartnerCompany::findOrFail($id);
        return view('company.edit', compact('company'));
    }
    public function updatePartnerCompany(CompanyRequest $request, $id)
    {
        $company = PartnerCompany::findOrFail($id);
        $company->update([
            'company_name' => $request->company_name,
            'cnpj' => $request->cnpj,
            'phone' => $request->phone,
            'email' => $request->email,
            'access_token' => $company->access_token,
        ]);

        return redirect()->route('company.get')->with('success', 'Empresa atualizada com sucesso.');
    }

    public function deletePartnerCompany($id)
    {
        $company = PartnerCompany::findOrFail($id);
        $company->delete();

        return redirect()->route('company.get')->with('success', 'Empresa excluída com sucesso.');
    }
}

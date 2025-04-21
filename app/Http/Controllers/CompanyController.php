<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerCompany;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    //


    public function getPartnerCompany()
    {
        $partnerCompanies = PartnerCompany::all();

        return view('company.index', [
            'partnerCompanies' => $partnerCompanies
        ]);
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
            'access_token' => '',
            'balance' => 0.0,
        ]);

        return redirect()->route('company.get')->with('success', 'Company created successfully.');
    }

}

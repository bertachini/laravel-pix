@extends('template.fullpainel')

@section('title')
<title>Dashboard</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/company.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('company.new') }}" class="btn btn-primary">Nova Compania</a>
    </div>
    <div class="row mt-3">
    
      @foreach ($partnerCompanies as $company)
        <div class="companhia-card">
            <img
                src="http://localhost:8000/img/icon/company.png"
                alt="Logo da Companhia"
                class="logo"
            />
            <div class="box-infos">
                <div class="name_id">
                    <h1 class="nome">{{ $company->company_name }}</h1>
                    <span class="valor">{{ $company->id }}</span>
                </div>
                <div class="infos">
                    <div class="box-1">
                        <div>
                            <span class="label">CNPJ</span><br />
                            <span class="valor">{{$company->cnpj}}</span>
                        </div>
                        <div>
                            <span class="label">Telefone</span><br />
                            <span class="valor">{{ $company->phone }}</span>
                        </div>
                    </div>
                    <div class="box-1">
                        <div>
                            <span class="label">Email</span><br />
                            <span class="valor">{{ $company->email }}</span>
                        </div>
                        <div>
                            <span class="label">Saldo</span><br />
                            <span class="valor">{{ $company->balance }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-actions">
                <a class="fa-solid fa-pen-to-square yellow"></a>
                <a class="fa-solid fa-eye-slash green"></a>
                <a class="fa-solid fa-trash red"></a>
            </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
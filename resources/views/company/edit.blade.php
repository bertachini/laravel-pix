@extends('template.fullpainel')

@section('title')
<title>Editar Empresa</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/company.css') }}">
@endsection

@section('content')
<div class="form-center">
    <form action="{{ route('company.update', $company->id) }}" method="POST" class="company-forms form-control form-control-sm p-3">
        @csrf
        @method('PATCH')
        <div class="text-center mt-2">
            <img src="{{ asset('img/icon/company.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Editar Empresa</h4>
        <div class="mb-2">
            <label for="company_name" class="form-label">Nome da Empresa</label>
            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $company->company_name) }}" required>
            @error('company_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{ old('cnpj', $company->cnpj) }}" required>
            @error('cnpj')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $company->phone) }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between mt-4">
            <input type="submit" class="btn btn-success form-control me-2" value="Salvar">
            <a href="{{ route('company.get') }}" class="btn btn-secondary form-control">Cancelar</a>
        </div>
    </form>
</div>
@endsection

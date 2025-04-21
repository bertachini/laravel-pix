@extends('template.fullpainel')
@section('content')
<div class="form-center">
    <form action="{{ route('company.save') }}" method="post" class="company-forms form-control form-control-sm p-3">
        @csrf
        <div class="text-center mb-1 mt-3">
            <img src="{{ asset('img/icon/company.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Registrar Compania</h4>
        <div class="mb-3">
            <label for="company_name" class="form-label">Nome da Compania</label>
            <input type="text" class="form-control  @error('company_name') is-invalid @enderror" id="company_name" name="company_name" required>
            @error('company_name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" required>
            @error('cnpj')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
            @error('phone')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar"></button>
    </form>
</div>
@endsection
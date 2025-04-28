@extends('template.fullpainel')

@section('title')
<title>Nova Transação</title>
@endsection

@section('content')
<div class="form-center">
    <form action="{{ route('transactions.save') }}" method="POST" class="transaction-form form-control form-control-sm p-3">
        @csrf
        <div class="text-center mb-1 mt-3">
            <img src="{{ asset('img/icon/transaction.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Registrar Transação</h4>
        <div class="mb-3">
            <label for="partner_company_id" class="form-label">Empresa Parceira</label>
            <select class="form-select @error('partner_company_id') is-invalid @enderror" id="partner_company_id" name="partner_company_id" required>
                <option value="" selected>Selecione uma empresa</option>
                @foreach ($partnerCompanies as $company)
                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                @endforeach
            </select>
            @error('partner_company_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_id" class="form-label">Cliente</label>
            <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                <option value="" selected>Selecione um cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Valor</label>
            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transaction_status_id" class="form-label">Status da Transação</label>
            <select class="form-select @error('transaction_status_id') is-invalid @enderror" id="transaction_status_id" name="transaction_status_id" required>
                <option value="" selected>Selecione um status</option>
                @foreach ($transactionStatuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
            @error('transaction_status_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar">
    </form>
</div>
@endsection

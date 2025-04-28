@extends('template.fullpainel')

@section('title')
<title>Editar Transação</title>
@endsection

@section('content')
<div class="form-center">
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" class="transaction-form form-control form-control-sm p-3">
        @csrf
        @method('PATCH')
        <div class="text-center mb-1 mt-3">
            <img src="{{ asset('img/icon/transaction.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Editar Transação</h4>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="datetime-local" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $transaction->created_at->format('Y-m-d\TH:i')) }}" required>
            @error('date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="partner_company_id" class="form-label">Empresa Parceira</label>
            <select class="form-select @error('partner_company_id') is-invalid @enderror" id="partner_company_id" name="partner_company_id" required>
                <option value="">Selecione uma empresa</option>
                @foreach ($partnerCompanies as $company)
                    <option value="{{ $company->id }}" {{ old('partner_company_id', $transaction->partner_company_id) == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                @endforeach
            </select>
            @error('partner_company_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_id" class="form-label">Cliente</label>
            <select class="form-select @error('client_id') is-invalid @enderror" id="client_id" name="client_id" required>
                <option value="">Selecione um cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $transaction->client_id) == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Valor</label>
            <input type="number" step="0.01" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $transaction->amount) }}" required>
            @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="transaction_status_id" class="form-label">Status</label>
            <select class="form-select @error('transaction_status_id') is-invalid @enderror" id="transaction_status_id" name="transaction_status_id" required>
                <option value="">Selecione um status</option>
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ old('transaction_status_id', $transaction->transaction_status_id) == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>
            @error('transaction_status_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between mt-4">
            <input type="submit" class="btn btn-success form-control me-2" value="Salvar">
            <a href="{{ route('transactions.get') }}" class="btn btn-secondary form-control">Cancelar</a>
        </div>
    </form>
</div>
@endsection

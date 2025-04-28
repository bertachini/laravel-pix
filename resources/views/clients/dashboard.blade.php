@extends('template.fullpainel')

@section('title')
<title>Dashboard do Cliente</title>
@endsection

@section('content')
<div class="container py-4">
    <!-- Header with Welcome and Logout -->
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="text-primary mb-0">Dashboard do Cliente</h2>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-dark">Saldo Atual</h5>
                    <p class="card-text fs-3 text-success">
                        {{ number_format($client->balance, 2, ',', '.') }} BRL
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h4 class="text-primary mb-3">Histórico de Transações</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark text-white">
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Empresa Parceira</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
                            <td>{{ $transaction->partnerCompany ? $transaction->partnerCompany->company_name : 'Empresa não encontrada' }}</td>
                            <td>{{ number_format($transaction->amount, 2, ',', '.') }} BRL</td>
                            <td>{{ $transaction->transactionStatus ? $transaction->transactionStatus->name : 'Status não encontrado' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Nenhuma transação cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

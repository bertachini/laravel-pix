@extends('template.fullpainel')

@section('title')
<title>Transações</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <a href="{{ route('transactions.new') }}" class="btn btn-primary">Nova Transação</a>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data</th>
                        <th scope="col">Empresa Parceira</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $transaction)
                        <tr>
                            <td>{{ Str::limit($transaction->id, 8) }}</td>
                            <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $transaction->partnerCompany->company_name }}</td>
                            <td>{{ $transaction->client->name }}</td>
                            <td>{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                            <td> {{$transaction->transactionStatus->name}} </td>
                            <td>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('transactions.delete', $transaction->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhuma transação cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('template.fullpainel')

@section('title')
<title>Clientes</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <a href="{{ route('clients.new') }}" class="btn btn-primary">Novo Cliente</a>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Balanço</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->cpf }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->account_number }}</td>
                        <td>{{ $client->balance }}</td>
                        <td>{{ $client->city->name }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Nenhum cliente cadastrado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('template.fullpainel')

@section('title')
    <title>Cidades</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <a href="{{ route('cities.new') }}" class="btn btn-primary">Nova Cidade</a>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Estado</th>
                        <th scope="col">País</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cities as $city)
                        <tr>
                            <td>{{ $city->id }}</td>
                            <td>{{ $city->name }}</td>
                            <td>{{ $city->state }}</td>
                            <td>{{ $city->country }}</td>
                            <td>
                                <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('cities.delete', $city->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta cidade?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma cidade cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

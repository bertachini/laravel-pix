@extends('template.fullpainel')

@section('title')
<title>Status</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
        <a href="{{ route('status.new') }}" class="btn btn-primary">Novo Status</a>
    </div>
    <div class="row mt-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statuses as $status)
                        <tr>
                            <td>{{ $status->name }}</td>
                            <td>
                                <a href="{{ route('status.edit', $status->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('status.delete', $status->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Nenhum status cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

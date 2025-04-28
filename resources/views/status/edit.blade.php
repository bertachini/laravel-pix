@extends('template.fullpainel')

@section('title')
<title>Editar Status</title>
@endsection

@section('content')
<div class="form-center">
    <form action="{{ route('status.update', $status->id) }}" method="POST" class="company-forms form-control form-control-sm p-3">
        @csrf
        @method('PATCH')
        <div class="text-center mt-2">
            <img src="{{ asset('img/icon/status.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Editar Status</h4>
        <div class="mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $status->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-between mt-4">
            <input type="submit" class="btn btn-success form-control me-2" value="Salvar">
            <a href="{{ route('status.get') }}" class="btn btn-secondary form-control">Cancelar</a>
        </div>
    </form>
</div>
@endsection

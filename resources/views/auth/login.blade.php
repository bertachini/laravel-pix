@extends('template.main')
@section('content')
<div class="form-center">
    <form action="{{ route('process.register') }}" method="post" class="resgistro form-control form-control-sm p-3">
        @csrf
        <h1 class="text-center">Registro</h1>
        <label for="name" class="form-label mt-4">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="email" class="form-label mt-2">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="password" class="form-label mt-2">Senha</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="password_confirmation" class="form-label mt-2">Confirmar Senha</label>
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
        @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar">
    </form>
</div>
@endsection

@extends('template.main')
@section('content')
<div class="form-center">
    <form action="{{ route('process.login') }}" method="post" class="resgistro form-control form-control-sm p-3">
        @csrf
        <h1 class="text-center">Login</h1>
        <label for="email" class="form-label mt-4">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="password" class="form-label mt-2">Senha</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <input type="submit" class="btn btn-success mt-4 form-control" value="Entrar">
        <a class="btn btn-info mt-2 form-control" href="{{ route('register') }}">Cadastrar</a>
    </form>
</div>
@endsection

@extends('template.main')
@section('content')
<div class="form-center">
    <form action="{{ route('process.login') }}" method="post" class="resgistro form-control form-control-sm p-3">
        @csrf
        <h1 class="text-center">Login</h1>
        <label for="email" class="form-label mt-4">Email</label>
        <input type="email" class="form-control" id="email" name="email">
        <label for="password" class="form-label mt-2">Senha</label>
        <input type="password" class="form-control" id="password" name="password">
        <input type="submit" class="btn btn-success mt-4 form-control" value="Entrar"></button>
        <a class="btn btn-info mt-2 form-control" href="{{ route('register') }}">Cadastrar</a>
    </form>
</div>
@endsection

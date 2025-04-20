@extends('template.main')
@section('content')
<div class="form-center">
    <form action="{{ route('save.register') }}" method="post" class="resgistro form-control form-control-sm p-3">
        @csrf
        <h1 class="text-center">Registro</h1>
        <label for="name" class="form-label mt-4">Nome completo</label>
        <input type="text" class="form-control" id="name" name="name">
        <label for="email" class="form-label mt-2">Email</label>
        <input type="email" class="form-control" id="email" name="email">
        <label for="senha" class="form-label mt-2">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha">
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar"></button>
    </form>
</div>
@endsection
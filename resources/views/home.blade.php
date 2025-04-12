@extends('template.main')


@section('nav')

<a class="nav-link active" aria-current="page" href="/">Home</a>
<a class="nav-link" href="/conta">Conta</a>
<a class="nav-link" href="/transacao">Transação</a>

@endsection


@section('user')
<a class="fa-solid fa-right-to-bracket" href="/login"></a>
@endsection


@section('content')
<h1>Home works!</h1>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Coluna 1</h2>
            <p>Conteúdo da coluna 1</p>
        </div>
        <div class="col-md-4">
            <h2>Coluna 2</h2>
            <p>Conteúdo da coluna 2</p>
        </div>
        <div class="col-md-4">
            <h2>Coluna 3</h2>
            <p>Conteúdo da coluna 3</p>
        </div>
    </div>

@endsection
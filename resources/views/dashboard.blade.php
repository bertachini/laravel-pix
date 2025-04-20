@extends('template.main')

@section('title')
<title>Dashboard</title>
@endsection

@section('nav')

<a class="nav-link active" aria-current="page" href="/">Home</a>
<a class="nav-link" href="/conta">Conta</a>
<a class="nav-link" href="/transacao">Transação</a>

@endsection


@section('user')
<img src="https://ui-avatars.com/api/?name={{session('username')}}&background=212529&color=ffd100&rounded=true&format=svg&size=96" alt="User" class="user-icon">
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
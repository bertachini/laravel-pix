@extends('template.main')

@section('title')
 @yield('title')
@endsection

@section('nav')
<a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
<a class="nav-link" href="/clients">Clientes</a>
<a class="nav-link" href="/company">Companias</a>
<a class="nav-link" href="/transactions">Transações</a>
@endsection

@section('user')
<img src="https://ui-avatars.com/api/?name={{session('username')}}&background=212529&color=ffd100&rounded=true&format=svg&size=96" alt="User" class="user-icon">
@endsection

@section('content')
 @yield('content')
@endsection
@extends('template.main')

@section('title')
 @yield('title')
@endsection

@section('css')
 @yield('css')
@endsection

@section('nav')
<a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
<a class="nav-link" href="{{route('clients.get')}}">Clientes</a>
<a class="nav-link" href="{{route('company.get')}}">Companias</a>
<a class="nav-link" href="{{route('transactions.get')}}">Transações</a>
<a class="nav-link" href="{{ route('cities.get') }}">Cidades</a>
<a class="nav-link" href="{{ route('status.get') }}">Status</a>
@endsection

@section('user')
<img src="https://ui-avatars.com/api/?name={{session('username')}}&background=212529&color=ffd100&rounded=true&format=svg&size=96" alt="User" class="user-icon">
@endsection

@section('content')
 @yield('content')
@endsection

@push('scripts')
    @stack('painel-scripts')
@endpush
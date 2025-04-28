@extends('template.main')

@section('title')
    @yield('title')
@endsection

@section('css')
    @yield('css')
@endsection

@section('nav')
    @if (Auth::guard('web')->check())
        <a class="nav-link" href="{{ route('clients.get') }}">Clientes</a>
        <a class="nav-link" href="{{ route('company.get') }}">Companias</a>
        <a class="nav-link" href="{{ route('transactions.get') }}">Transações</a>
        <a class="nav-link" href="{{ route('cities.get') }}">Cidades</a>
        <a class="nav-link" href="{{ route('status.get') }}">Status</a>
    @endif
@endsection

@section('user')
    @auth
        <div class="Account">
            <img id="img"
                 src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=212529&color=ffd100&rounded=true&format=svg&size=96"
                 alt="User" class="user-icon">
            <div class="box-account" style="display: none;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Log Out</button>
                </form>
            </div>
        </div>
    @endauth
@endsection

@section('content')
    @yield('content')
@endsection

@push('scripts')
    @stack('painel-scripts')
    <script>
        const accountImg = document.getElementById('img');
        const box = document.querySelector('.box-account');

        accountImg.addEventListener('click', () => {
            box.style.display = box.style.display === 'flex' ? 'none' : 'flex';
        });
    </script>
@endpush

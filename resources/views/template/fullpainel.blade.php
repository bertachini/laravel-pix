@extends('template.main')

@section('title')
 @yield('title')
@endsection

@section('css')
 @yield('css')
@endsection

@section('nav')
    @if (session('user_id'))
     @if (session('user_type') == 'admin')
        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
        <a class="nav-link" href="{{route('clients.get')}}">Clientes</a>
        <a class="nav-link" href="{{route('company.get')}}">Companias</a>
        <a class="nav-link" href="{{route('transactions.get')}}">Transações</a>
        <a class="nav-link" href="{{ route('cities.get') }}">Cidades</a>
        <a class="nav-link" href="{{ route('status.get') }}">Status</a>
     @elseif (session('user_type') == 'user')
        <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
     @endif
    @endif
@endsection

@section('user')
@if (session('user_id'))
<div class="Account">
    <img id="img" src="https://ui-avatars.com/api/?name={{session('username')}}&background=212529&color=ffd100&rounded=true&format=svg&size=96" alt="User" class="user-icon">
    <div class="box-account">
        <a id="logout" >Log Out</a>
    </div>
</div>
@else
<a class="fa-solid fa-right-to-bracket login" href="{{route('login')}}"></a>
@endif
@endsection

@section('content')
 @yield('content')
@endsection

@push('scripts')
    @stack('painel-scripts')
@endpush

@push('scripts')

<script>

    const accoutnimg = document.getElementById('img');

    accoutnimg.addEventListener('click', ()=>{
        console.log('cliquei');
        let box = document.querySelector('.box-account');
        if (box.style.display === 'flex') {
            box.style.display = 'none';
        } else {
            box.style.display = 'flex';
        }
    })

    const logout = document.getElementById('logout');

    logout.addEventListener('click', (e) => {
        console.log('cliquei no logout');
        fetch('/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({})
        }).then(response => {
            if (response.ok) {
                window.location.href = '/login';
            } else {
                console.error('Logout failed');
            }
        })
    });
    

       
</script>
@endpush


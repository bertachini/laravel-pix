@extends('template.fullpainel')
@section('content')
<div class="form-center">
    <form action="{{ route('clients.save') }}" method="post" class="company-forms form-control form-control-sm p-3">
        @csrf
        <div class="text-center  mt-2">
            <img src="{{ asset('img/icon/client.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Registrar Cliente</h4>
        <div class="mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" required>
            @error('cpf')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-2">
            <label for="city_id" class="form-label">Cidade</label>
            <select class="form-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                <option value="">Selecione uma cidade</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            @error('city_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar"></button>
    </form>
</div>
@endsection
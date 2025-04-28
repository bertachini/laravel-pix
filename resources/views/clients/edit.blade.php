@extends('template.fullpainel')

@section('title')
    <title>Editar Cliente</title>
@endsection

@section('content')
    <div class="form-center">
        <form action="{{ route('clients.update', $client->id) }}" method="POST"
            class="company-forms form-control form-control-sm p-3">
            @csrf
            @method('PATCH')
            <div class="text-center mt-2">
                <img src="{{ asset('img/icon/client.png') }}" alt="Logo" class="logo">
            </div>
            <h4 class="text-center">Editar Cliente</h4>
            <div class="mb-2">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $client->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf"
                    value="{{ old('cpf', $client->cpf) }}" required>
                @error('cpf')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" value="{{ old('phone', $client->phone) }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email', $client->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Senha (deixe em branco para manter)</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="balance" class="form-label">Saldo</label>
                <input type="number" step="0.01" class="form-control @error('balance') is-invalid @enderror"
                    id="balance" name="balance" value="{{ old('balance', $client->balance) }}">
                @error('balance')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-2">
                <label for="city_id" class="form-label">Cidade</label>
                <select class="form-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                    <option value="">Selecione uma cidade</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                            {{ old('city_id', $client->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between mt-4">
                <input type="submit" class="btn btn-success form-control me-2" value="Salvar">
                <a href="{{ route('clients.get') }}" class="btn btn-secondary form-control">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@extends('template.fullpainel')
@section('content')
<div class="form-center">
    <form action="{{ route('status.save') }}" method="post" class="company-forms form-control form-control-sm p-3">
        @csrf
        <div class="text-center  mt-2">
            <img src="{{ asset('img/icon/status.png') }}" alt="Logo" class="logo">
        </div>
        <h4 class="text-center">Registrar Status</h4>
        <div class="mb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-4 form-control" value="Cadastrar"></button>
    </form>
</div>
@endsection
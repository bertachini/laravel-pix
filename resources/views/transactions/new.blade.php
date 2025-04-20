@extends('template.main')
@section('content')
<div class="form-center">
    <form action="{{ route('transactions.save') }}" method="post" class="resgistro-transctiosn form-control form-control-sm p-3">
        @csrf
        <h1 class="text-center">Registrar transação</h1>

        <div class="mb-3">
            <label for="paternerCompany" class="form-label">Empresa parceira</label>
            <select class="form-select" aria-label="Default select example" id="paternerCompany" name="partner_company_id" required>
                <option selected value="">Selecione uma empresa</option>
                @foreach ($paternerCompanies as $p)
                <option value="{{ $p->id }}">{{ $p->company_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <select class="form-select" aria-label="Default select example" id="cliente" name="client_id" required>
                <option selected value="">Selecione um cliente</option>
                @foreach ($clients as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Valor</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <input type="submit" class="btn btn-primary" value="Registrar">
    </form>
</div>
@endsection
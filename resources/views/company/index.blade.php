@extends('template.fullpainel')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="container">
    <div class="row mt-3">
      <a href="{{ route('company.new') }}" class="btn btn-primary">Nova Compania</a>
    </div>
    <div class="row mt-3">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nomde da Compania</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Telefone</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($partnerCompanies as $company)
          <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->cnpj }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->email }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
@extends('template.main')

@section('nav')
 @yield('nav')
@endsection
@section('user')
    @yield('user')
@endsection

@section('content')
<div class="form-center">
    @yield('form')
</div>
@endsection

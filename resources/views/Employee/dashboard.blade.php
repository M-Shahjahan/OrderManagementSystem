@extends('layouts.employee')
@section('PageTitle')
    OMS | Employee
@endsection
@section('user')
    <div class="container"> {{ __('Hello '.Auth::user()->name.', You are logged in!') }} </div>
@endsection

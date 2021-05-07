@extends('layouts.customer')
@section('PageTitle')
    OMS | Customer
@endsection
@section('user')
    <div class="container"> {{ __('Hello '.Auth::user()->name.', You are logged in!') }} </div>
@endsection


@extends('layouts.admin')
@section('PageTitle')
    OMS | Add Employee
@endsection
@section('user')

    <form method="POST" action="{{ route('employee.store') }}">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('Name') }}
                    </strong>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <strong>{{ __('Father Name') }}
            </strong>
            <div class="col-md-6">
                <input id="fatherName" type="text" class="form-control @error('fatherName') is-invalid @enderror" name="fatherName" value="{{ old('fatherName') }}" required autocomplete="fatherName" autofocus placeholder="Enter Father Name">

                @error('fatherName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <strong>{{ __('Email Address') }}
            </strong>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email Address">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <strong>{{ __('Gender') }}
            </strong>
            <div class="col-md-6">

                <select id="Gender" name="gender" class="form-control @error('Gender') is-invalid @enderror" required autocomplete="gender" autofocus>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                @error('Gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <input name="role" type="hidden" value="employee">
        <div class="form-group row">
            <strong>{{ __('Contact') }}
            </strong>
            <div class="col-md-6">
                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus placeholder="11-Digit Number">

                @error('contact')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <strong>{{ __('Password') }}
            </strong>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required autocomplete="new-password">

                <span id='passwordLength'></span>
                <br>
                <input type="button" id="show-password" value="Show Password" class="btn btn-group-toggle">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <strong>{{ __('Confirm Password') }}
            </strong>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span id='message'></span>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="register-button">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>


@endsection

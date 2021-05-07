@extends('layouts.admin')
@section('PageTitle')
    OMS | Edit Employee Details
@endsection
@section('user')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>

        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('employee.update',$employee->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Name</strong>
                    <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Father Name</strong>
                    <input type="text" name="fatherName" class="form-control" value="{{$employee->fatherName}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">

                    <select id="Gender" name="gender" class="form-control @error('Gender') is-invalid @enderror" required autocomplete="gender" autofocus>
                        @if($employee->gender=="Male")
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        @elseif($employee->gender=="Female")
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                            <option value="Other">Other</option>
                        @else
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other" selected>Other</option>
                        @endif

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
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contact</strong>
                    <input type="text" name="contact" class="form-control" value="{{$employee->contact}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

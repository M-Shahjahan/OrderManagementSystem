@extends('layouts.employee')
@section('PageTitle')
    OMS | Customer Details
@endsection
@section('user')
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
    <div class="row">
        <div class="col s12">
            <div class="page-title" style="font-size: 24px;">Customers</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Customers</span>
                    <table id="customers" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Customer Name</th>
                            <th>Father Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Email</th>

                        </tr>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->fatherName}}</td>
                                <td>{{$customer->gender}}</td>
                                <td>{{$customer->contact}}</td>
                                <td>{{$customer->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection




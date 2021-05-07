@extends('layouts.admin')
@section('PageTitle')
    OMS | Manage Employee
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
            <div class="page-title" style="font-size: 24px;">Employee Details</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Employee Details</span>
                    <table id="employeeDetails" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Father Name</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->fatherName}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>{{$employee->contact}}</td>
                                <td>{{$employee->email}}</td>
                                <td>
                                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST">
                                        <a class="btn btn-primary" href="{{route('employee.edit',$employee->id)}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



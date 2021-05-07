@extends('layouts.'.$currentUser)
@section('PageTitle')
    OMS | Manage Order
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
            <div class="page-title" style="font-size: 24px;">Orders</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Orders</span>
                    <table id="employeeDetails" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Order Price</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->orderID}}</td>
                                <td>{{$order->orderDate}}</td>
                                <td>{{$order->orderPrice}}</td>
                                <td>
                                        <a class="btn btn-primary" href="{{route('order.show',$order->orderID)}}">View Details</a>
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

@extends('layouts.'.$currentUser)
@section('PageTitle')
    OMS | View Order Details
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
            <div class="page-title" style="font-size: 24px;">Order Details</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Order Details</span>
                    @if($currentUser!='customer')
                        <h4>Customer Name : {{$customers->name}}</h4>
                        <h4>Order ID : {{$orderIDs}}</h4>
                    @else
                        <h4>Order ID : {{$orderIDs}}</h4>
                    @endif
                    <table id="orderDetails" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Order Price</th>
                        </tr>
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$orderDetail->productName}}</td>
                                <td>{{$orderDetail->productPrice}}</td>
                                <td>{{$orderDetail->quantity}}</td>
                                <td>{{$orderDetail->orderPrice}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection





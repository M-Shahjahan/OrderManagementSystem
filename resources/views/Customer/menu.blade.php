@extends('layouts.customer')
@section('PageTitle')
    OMS | Menu
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
            <div class="page-title" style="font-size: 24px;">Menu items</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Menu Items</span>
                    <table id="leaveDetails" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <input class="itemID" type="hidden" value="{{$product->productID}}">
                                <td>{{$product->productName}}</td>
                                <td class="priceTag" id="price">{{$product->price}}</td>
                                <td>
                                    <input class="itemQuantity" type="text" value="0" style="width: 50px;text-align: center">
                                </td>
                                <td>
                                    <button type="button" id="addButton" class="btn btn-danger" style="font-size: 25px">+</button>
                                    <button type="button" id="removeButton" class="btn btn-outline-primary" style="font-size: 25px">-</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <table>
                    <tr>
                        <th>Total Price : Rs. </th>
                        <td id="amount" class="orderAmount">0</td>
                    </tr>
                </table>
            </div>
            <div>
                <button type="button" id="placeOrder" class="btn btn-primary">Place Order</button>
            </div>
        </div>
    </div>
@endsection


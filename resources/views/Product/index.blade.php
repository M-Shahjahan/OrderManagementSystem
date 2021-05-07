@extends('layouts.admin')
@section('PageTitle')
    OMS | Manage Items
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
            <div class="page-title" style="font-size: 24px;">Item Details</div>
        </div>
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Item Details</span>
                    <table id="itemDetails" class="display responsive-table">
                        <tbody>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th width="300px">Action</th>
                        </tr>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->productID}}</td>
                                <td>{{$product->productName}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    <form action="{{route('product.destroy',$product->productID)}}" method="POST">
                                        <a class="btn btn-primary" href="{{route('product.edit',$product->productID)}}">Edit</a>
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


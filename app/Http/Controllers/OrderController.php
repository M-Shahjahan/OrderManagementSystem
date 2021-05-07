<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role=="customer"){
            $orders=Order::getCustomerOrders(Auth::user()->id);
            return view('order/index',['orders'=>$orders,'currentUser'=>Auth::user()->role]);
        }
        $orders=Order::getAllRecords();
        return view('order/index',['orders'=>$orders,'currentUser'=>Auth::user()->role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=Order::getMaxID()+1;
        $request['orderID']=$id;
        $request['userID']=Auth::user()->id;
        Order::addOrderRecord($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order=Order::getOrder($id);
        $customer=Customer::getCustomer($order->userID);
        $orderDetails=OrderDetail::getOrderDetail($id);
        return view('order/view',['orderDetails'=>$orderDetails,'customers'=>$customer,'orderIDs'=>$id,'currentUser'=>Auth::user()->role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

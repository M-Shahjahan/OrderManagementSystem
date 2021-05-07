<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    protected $primaryKey = 'orderID';

    protected $fillable = [
        'orderDate',
        'orderPrice'
    ];
    public static function getAllRecords(){
        return DB::table('orders')->get();
    }

    public static function getCustomerOrders($id){
        return Order::where('userID',$id)->get();
    }

    public static function addOrderRecord($value){
        DB::insert('INSERT INTO Orders(orderID,userID,orderPrice) VALUES (?,?,?)',[$value['orderID'],$value['userID'],$value['orderPrice']]);
    }

    public static function deleteOrder($id){
        Order::where('orderID',$id)->delete();
    }
    public static function getOrder($id){
        return DB::table('orders')->where('orderID',$id)->first();
    }

    public static function updateOrder($order,$value){
        $order->update($value);
    }
    public static function getMaxID(){
        return DB::table('orders')->max('orderID');
    }
}

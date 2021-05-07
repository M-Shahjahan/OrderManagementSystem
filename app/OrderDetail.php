<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class OrderDetail extends Model
{
    protected $primaryKey = array("orderID","productID");

    protected $fillable = [
        'productPrice',
        'quantity',
        'orderPrice'
    ];

    public static function getOrderDetail($id){
        return DB::select('SELECT products.productName,orderdetails.productPrice, orderdetails.quantity,orderdetails.orderPrice FROM orderdetails
    JOIN orders on orders.orderID=orderDetails.orderID
    JOIN products on products.productID=orderdetails.productID
    Join users on users.id=orders.userID WHERE orders.orderID='.$id);;
    }
    public static function addOrderDetailRecord($value){
        DB::insert('INSERT INTO OrderDetails(orderID,productID,productPrice,quantity,orderPrice) VALUES(?,?,?,?,?)',
            [$value['orderID'],$value['productID'],$value['productPrice'],$value['quantity'],$value['orderPrice']]);
        return true;
    }
}

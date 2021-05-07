<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Customer extends Model
{
    protected $primaryKey = 'customerID';

    public static function getAllRecords(){
        return DB::table('users')->where('role','=','customer')->get();
    }
    public static function getCustomer($id){
        return DB::table('users')->where('id',$id)->first();
    }
    public static function getMaxID(){
        return DB::table('users')->max('id');
    }
    public static function addCustomer($value){
        DB::insert('INSERT INTO Customers(customerName,fatherName,gender,contact,email) VALUES (?,?,?,?,?)',[$value['name'],$value['fatherName'],$value['gender'],$value['contact'],$value['email']]);
    }
}

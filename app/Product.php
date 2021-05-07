<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    protected $primaryKey ='productID';

    protected $fillable = [
        'productName',
        'price',
        'quantity'
    ];
    public static function getAllRecords(){
        return DB::table('products')->simplePaginate(5);
    }

    public static function addProductRecord($value){
        Product::create($value);
    }

    public static function deleteProduct($id){
        Product::where('productID',$id)->delete();
    }
    public static function getProduct($id){

        return Product::where('productID',$id)->first();
    }

    public static function updateProduct($product,$value){
        $product->update($value);
    }

    public static function getMaxID(){
        return DB::table('products')->max('productID')+1;
    }
}

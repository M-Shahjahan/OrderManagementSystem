<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllRecords();
        return view('product/index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ID=Product::getMaxID();
        $request->validate([
            'productName'=>'required|max:255',
            'price'=>'required|numeric|between:0,99999',
            'quantity'=>'required|integer|min:1'
        ]);
        $request->id=$ID;
        Product::addProductRecord($request->all());
        return redirect()->route('product.index')
            ->with('Success','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::getProduct($id);
        return view('product.edit',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::where('productID',$id)->first();
        $request->validate([
            'productName'=>'required|max:255',
            'price'=>'required|numeric|between:0,99999.99',
            'quantity'=>'required|integer|min:1'
        ]);
        Product::updateProduct($product,$request->all());
        return redirect()->route('product.index')
            ->with('Success','Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::deleteProduct($id);
        return redirect()->route('product.index')->with('Success','Product Deleted Successfully');
    }
}

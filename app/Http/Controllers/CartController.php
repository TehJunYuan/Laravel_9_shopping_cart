<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\myCart;
use App\Models\Product;
use Session;
use Auth; //to insert user ID

class CartController extends Controller
{
    //
    //check the user login or not
    public function __construct(){
        $this->middleware('auth');
        return('home');
    }

    public function add(){
        $r=request();
        $addCart=myCart::Create([
            'productID'=>$r->productId,
            'quantity'=>$r->quantity,
            'userID'=>Auth::id(),
            'dateAdd' => '2023-11-11',
            'orderID'=>'',
        ]);

        return redirect()->route('show.my.cart');
    }

    public function showMyCart(){
        $carts=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select('my_carts.quantity as cartQTY','my_carts.id as cid','products.*')
        ->where('my_carts.orderID','=','') //if'' empty means haven't make payment
        ->where('my_carts.userID','=',Auth::id()) //item match with current login user+
        ->paginate(5);

        $this->cartItem(); //call function calculate no.cart Item
        
        return view('mycart')->with('carts',$carts);
    }

    public function delete($id){
        
        $deleteItem=myCart::find($id); //binding record
        $deleteItem->delete(); //delete record
        Session::flash('success',"Item was remove successfully!");
        Return redirect()->route('show.my.cart');
    }

    public function cartItem(){
        
        $cartItem=0;
        $noItem=DB::table('my_carts')
        ->leftjoin('products','products.id','=','my_carts.productID')
        ->select(DB::raw('COUNT(*) as count_item'))
        ->where('my_carts.orderID','=','') //if'' empty means haven't make payment
        ->where('my_carts.userID','=',Auth::id()) //item match with current login user+
        ->groupBy('my_carts.userID')
        ->first();

        if($noItem){
            $cartItem=$noItem->count_item;
        }
        Session()->put('cartItem',$cartItem); //assign value to session varible cartItem
    }
}
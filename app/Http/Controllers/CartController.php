<?php

namespace App\Http\Controllers;
use App;
use App\Product;
use App\Cart;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        if(isset($_COOKIE["shoes_size"])){
            $size=$_COOKIE["shoes_size"];
        }
        
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id,$size);
        //dd($cart);
        $request->session()->put('cart',$cart);
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);
    
        Session::put('cart',$cart);
        if($cart->totalQuantity<=0){
            Session::forget('cart');
        }
        return redirect()->route('cart.index');
    }

    public function index()
    {
        if(!Session::has('cart')){
            return view('cart.index',['products'=>null]);
        }
        $oldCart= Session::get('cart');
        $cart= new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        $totalQuantity= $cart->totalQuantity;
        return view('cart.index', compact ('products','totalPrice','totalQuantity'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\CartBuy;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    //
    public function showproduct($product_id){
        $product = DB::table('products')->where('id', $product_id)->first(); 
        return view('cart.product')->with(['product' => $product]);
    } 
    public function addCart(Request $request){
        $product = DB::table('products')->where('id', $request->id)->first();
        $color = $request->color;
        $size = $request->size;
        $quantity = $request->quantity;
        $cartbuy = new CartBuy($product, $size, $color, $quantity);
        $preCarts = Session('Cart') ?: [];
        $newCarts = $cartbuy->addCart($preCarts);
        Session()->put('Cart', $newCarts);
        header("Cache-Control: no cache");
        session_cache_limiter("private_no_expire");

        return view('cart.items')->with('carts', Session('Cart'));
    }
    public function showCartItems(){
        return view('cart.items')->with('carts', Session('Cart'));
    }
    public function delete(Request $request){
            $Carts = Session('Cart');
            array_splice($Carts, $request->id, 1);
            Session()->put('Cart', $Carts);
            $output = 'OKE';
            return $output;
        
    }
}

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
        return redirect()->route('cart.showaddcart');  
    }
    public function showaddCart(){
        return view('cart.items')->with('carts', Session('Cart'));
    }
    public function delete(Request $request){
        if(Auth::check()){
            
        }
        else{
            $Carts = Session('Cart');
            array_splice($Carts, $request->id, 1);
            Session()->put('Cart', $Carts);
            $output = '';
            if($Carts){
            foreach($Carts as $idex => $cart){
                $output .= '<tr>
                <td class="item">
                    <div class="d-flex">
                        <img src="'.$cart->product->image.'"
                            alt="">
                        <div class="pl-2">
                            '.$cart->product->name.'
                            <div class="text-uppercase new"><span class="fas fa-star"></span>new</div>
                            <div class="d-flex flex-column justify-content-center">
                                <div class="text-muted">'.$cart->product->category.'</div>
                                <div><a href="#"><span class="red text-uppercase"><span
                                                class="fas fa-comment pr-1"></span>add a comment</span></a>
                                </div>
                            </div>
                        </div>
                </td>
                <td>' .$cart->quantity. '</td>
                <td class="d-flex flex-column"><span class="black">$'.$cart->product->price.'</span>
                </td>
                <td>
                    '.$cart->size.'
                </td>
                <td>
                    '.$cart->color.'
                </td>
                <td class="font-weight-bold">
                    '.$cart->getTotal().'
                    <div class="close">&times;
                        <input type="hidden" value='.$idex.' name="delete">
                    </div>
                </td>
                {{-- <input type="hidden" value="'.$cart->product->id.'"> --}}
            </tr>';
            }}
            return  Response($output);
        }
        
    }
}

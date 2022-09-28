<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
class CartBuy
{
    public $product;
    public $size;
    public $color;
    public $quantity;
    public function __construct($product, $size, $color, $quantity)
    {
        $this->product = $product;
        $this->size = $size;
        $this->color = $color;
        $this->quantity = $quantity;
    }
    public function checkinCart($precarts){
        for($i = 0; $i < sizeof($precarts); $i++){
            if($precarts[$i]->product == $this->product
            && $precarts[$i]->size == $this->size
            && $precarts[$i]->color == $this->color)
                return $i;
        }
        return -1;
    }
    public function addCart($precarts){
        $id = $this->checkinCart($precarts);
        if($id != -1){
            $precarts[$id]->quantity += $this->quantity;
        }
        else $precarts[] = $this;
        return $precarts;
    }
    public function getTotal(){
        return $this->product->price * $this->quantity;
    }
    // public function mergeIfLogin($precarts){
    //     $user_id = auth('web')->id();
    //     $user = User::find($user_id);
    //     foreach ($precarts as $cartbuy) {
    //         $color_id = Color::where('name', $cartbuy->color);
    //         $size_id = Size::where('name', $cartbuy->size);
    //         $car
    //     }
    // }
}

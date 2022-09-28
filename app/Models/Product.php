<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = ['name', 'category', 'descrip', 'price', 'image'];
    public function carts(){
        $this->belongsToMany(Cart::class, 'amounts');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];
    public function carts(){
        $this->belongsToMany(Cart::class, 'amounts');
    }
}

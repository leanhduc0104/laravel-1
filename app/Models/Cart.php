<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'amount_id', 'quantity'];
    public $timestamps = false;
    public function user(){
        $this->belongsTo(User::class);
    }
    public function colors(){
        $this->belongsToMany(Color::class, 'amounts');
    }
    public function sizes(){
        $this->belongsToMany(Size::class, 'amounts');
    }
    public function products(){
        $this->belongsToMany(Product::class, 'amounts');
    }
}

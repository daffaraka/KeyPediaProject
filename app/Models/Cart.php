<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $primaryKey = 'cart_id';
    
    protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'product_id',
        'user_id',
        'image_product'
    ];

    public function Product(){
        return $this->hasMany(Product::class,'product_id','product_id');
    }
    public function User(){
        return $this->hasOne(Product::class,'user_id','user_id');
    }

    public function Transaksi(){
        return $this->hasOne(Transaksi::class,'transaction_id','cart_id');
    }
}

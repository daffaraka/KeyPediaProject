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
        'nama_product',
        'harga_product',
        'quantity',
        'product_id',
        'user_id',
        'image_product'
    ];

    public function Product(){
        return $this->hasMany(Product::class,'product_id','product_id');
    }
    public function User(){
        return $this->hasOne(Product::class,'id','user_id');
    }

    public function Transaksi(){
        return $this->hasOne(Product::class,'id_transaksi','cart_id');
    }
}

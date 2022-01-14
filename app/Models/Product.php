<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $fillable = [
    'product_id',
    'product_name',
    'product_price',	
    'product_description',	
    'product_image',	
    'product_status',	
    'category_id',
    ];

    public function Category() {
        return $this->belongsTo(Category::class,'id','category_id'); 
    }

    public function Transaksi(){
        return $this->hasMany(Transaksi::class,'transaction_id','product_id');
    }
}

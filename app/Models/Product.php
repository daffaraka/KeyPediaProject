<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';
    protected $fillable = [
    'product_id	',
    'nama_product',
    'harga_product',	
    'deskripsi_product',	
    'image_product',	
    'status_product',	
    'category_id',
    ];

    public function Category() {
        return $this->belongsTo(Category::class,'id','category_id'); 
    }
}

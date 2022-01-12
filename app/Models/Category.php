<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

     protected $table = 'categories';
    use HasFactory;
    protected $fillable = [
        'category',
    ];

    public function Product(){
        return $this->hasMany(Product::class,'product_id','id');
    }
}

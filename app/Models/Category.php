<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

     protected $table = 'categories';

     protected $primaryKey = 'category_id';
    use HasFactory;
    protected $fillable = [
        'category_name',
    ];

    public function Product(){
        return $this->hasMany(Product::class,'product_id','category_id');
    }
}

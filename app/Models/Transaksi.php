<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'nama_product',
        'id_product',
        'harga_product',	
        'id_cart',
        'quantity',	
        'harga_total',
        'status_transaksi',
        'image_product'
    ];

    public $timestamps = true;

    
}

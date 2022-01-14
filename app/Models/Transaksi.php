<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table ='transactions';

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'product_id',
        'product_name',
        'product_price',	
        'cart_id',
        'quantity',	
        'transaction_total',
        'transaction_status',
        'product_image'
    ];

    public $timestamps = true;

    
}

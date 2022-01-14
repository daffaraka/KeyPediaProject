<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
[
            'product_name' => 'Keyboard 1-',
            'product_price' => 12500,
            'product_description' => 'deskripsi keyboard',
            'product_image' => 'Keyboard 1-Keychron K6.jpg',
            'product_status' => 'aktif',
            'category_id' => '1',
           
       ],
       [
            'product_name' => 'Keyboard 2-',
            'product_price' => 20000,
            'product_description' => 'deskripsi keyboard 2',
            'product_image' => 'Keyboard 2-87 key keyboard.jpg',
            'product_status' => 'aktif',
            'category_id' => '1',
       ],
       [
            'product_name' => 'Keyboard 3-',
            'product_price' => 30000,
            'product_description' => 'keyboard deskripsi 3',
            'product_image' => 'Keyboard 3-87 key keyboard(2).jpg',
            'product_status' => 'aktif',
            'category_id' => '1',
        ]
    );
    }
}

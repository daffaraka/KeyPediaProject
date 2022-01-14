<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class CartController extends Controller
{
    public function cart(){

        $this->data['cart'] = Cart::all();
        

      
        return view('home.product.cart',$this->data);
    }

   


    public function addToCart(Request $request,$id) {

      
        $product = new Product; 
        // $cart = new Cart;
        // $cart->user_id = 1;

        $productAttribute = [];
        $productAttribute['nama_product'] = $product->where('product_id',$id)->value('nama_product');
        $productAttribute['harga_product'] = $product->where('product_id',$id)->value('harga_product');
        $productAttribute['quantity'] = 1;
        $productAttribute['product_id'] = $product->where('product_id',$id)->value('product_id');
        $productAttribute['user_id'] = Auth::user()->id;
        $productAttribute['image_product'] = $product->where('product_id',$id)->value('image_product');

        Cart::create($productAttribute);

        $cart = Cart::find($id);
        
        return redirect()->route('cart');
    }

    public function checkoutPage($id)
    { 
        $cart = Cart::find($id);
        
        $category = Category::with('Product')->get('category');

      
       
        $categoryProduct = Cart::where('cart_id',$id)->get();
        
        $namaCategory = Category::where('id',$categoryProduct)->pluck('category')->first();
        
        return view('home.product.checkout-page',['namaCategory'=>$namaCategory,'cart'=>$cart]);
    }

    public function updateQty(Request $request,$id) {
        
        $requestQty = $request->input('quantity');
        
        $update = [];
        $update['quantity'] = $requestQty;
     
        Cart::find($id)->update($update);
        
        

        return redirect()->route('cart');
    }

    public function updateQtyOnPage(Request $request,$id) {
        

        dd($request->input());

        $cartId = Cart::find($id);
        $requestQty = $request->input('quantity');
        
        $update = [];
        $update['quantity'] = $requestQty;
     
        $cartId->update($update);
        
        

        return redirect()->back();
    }
    public function checkout(Request $request,$id) 
    {
       
        $getQuantity = Cart::where('cart_id', $id)->value('quantity');
        $getHargaProuct =  Cart::where('cart_id', $id)->value('harga_product'); 
       

        $cartId = Cart::find($id);
        $transaksiAttribute = [];
        $transaksiAttribute['nama_product'] = Cart::where('cart_id', $id)->value('nama_product');
        $transaksiAttribute['id_product'] = Cart::where('cart_id', $id)->pluck('product_id')->first();
        $transaksiAttribute['harga_product'] = Cart::where('cart_id', $id)->value('harga_product');
        $transaksiAttribute['id_cart'] =  $id;
        $transaksiAttribute['quantity'] =  $getQuantity ;
        $transaksiAttribute['harga_total'] = $getQuantity * $getHargaProuct;
        $transaksiAttribute['status_transaksi'] = 'selesai';
        $transaksiAttribute['image_product'] = Cart::where('cart_id', $id)->value('image_product');

       
        Transaksi::create($transaksiAttribute)->save();

        
        return redirect()->route('transaksi');
    }

    public function transaksi(){

        $transaksi = Transaksi::all();

        return view('home.product.transaksi',['transaksi'=>$transaksi]);
    }

    public function detailTransaksi($id) {
        $detailTransaksi = Transaksi::find($id);

        return view('home.product.detail-transaksi',['detailTransaksi'=>$detailTransaksi]);
    }

    public function destroyCart($id) {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->route('cart');
    }
}

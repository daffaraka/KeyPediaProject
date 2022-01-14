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
        $productAttribute['product_name'] = $product->where('product_id',$id)->value('product_name');
        $productAttribute['product_price'] = $product->where('product_id',$id)->value('product_price');
        $productAttribute['product_quantity'] = 1;
        $productAttribute['product_id'] = $product->where('product_id',$id)->value('product_id');
        $productAttribute['user_id'] = Auth::user()->user_id;
        $productAttribute['image_product'] = $product->where('product_id',$id)->value('product_image');

        Cart::create($productAttribute);

        
        return redirect()->route('cart');
    }

    public function checkoutPage($id)
    { 
        $cart = Cart::find($id);
        
        $category = Category::with('Product')->get('category_name');

      
       
        $categoryProduct = Cart::where('cart_id',$id)->get();
        
        $namaCategory = Category::where('category_id',$categoryProduct)->pluck('category_name')->first();
        
        return view('home.product.checkout-page',['namaCategory'=>$namaCategory,'cart'=>$cart]);
    }

    public function updateQty(Request $request,$id) {
        
        $requestQty = $request->input('product_quantity');
        
        $update = [];
        $update['product_quantity'] = $requestQty;
     
        Cart::find($id)->update($update);
        
        

        return redirect()->route('cart');
    }

    public function updateQtyOnPage(Request $request,$id) {
        

        dd($request->input());

        $cartId = Cart::find($id);
        $requestQty = $request->input('product_quantity');
        
        $update = [];
        $update['product_quantity'] = $requestQty;
     
        $cartId->update($update);
        
        

        return redirect()->back();
    }
    public function checkout(Request $request,$id) 
    {
       
        $getQuantity = Cart::where('cart_id', $id)->value('product_quantity');
        $getHargaProuct =  Cart::where('cart_id', $id)->value('product_price'); 
       

        $cartId = Cart::find($id);
        $transaksiAttribute = [];
        $transaksiAttribute['product_name'] = Cart::where('cart_id', $id)->value('product_name');
        $transaksiAttribute['product_id'] = Cart::where('cart_id', $id)->pluck('product_id')->first();
        $transaksiAttribute['product_price'] = Cart::where('cart_id', $id)->value('product_price');
        $transaksiAttribute['cart_id'] =  $id;
        $transaksiAttribute['quantity'] =  $getQuantity ;
        $transaksiAttribute['transaction_total'] = $getQuantity * $getHargaProuct;
        $transaksiAttribute['transaction_status'] = 'selesai';
        $transaksiAttribute['product_image'] = Cart::where('cart_id', $id)->value('image_product');

       
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

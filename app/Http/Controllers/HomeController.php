<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    // public function home()
    // {
    //     $product = Product::all();
    //     return view('home.home')->with('product',$product);
    // }

    public function beranda()
    {
        $product = DB::table('products')->paginate(4);
        return view('home.beranda')->with('product',$product);
    }

    public function listProduct()
    {
        
        $product = Product::all();
        
        return view('home.product.index-product')->with('product',$product);
    }

    public function createProduct()
    {
        $category = Category::orderBy('category_name','ASC')->get();
        return view('home.product.create-product')->with('category',$category);
    }


    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'product_name' => 'required|min:5',
            'product_price' => 'required|integer',
            'product_description' => 'required|min:20',
            'category_id' => 'required',
         ], 
        $anu = [
            'product_name.required' => 'Nama product wajib di isi',
            'product_name.min' => 'Nama product minimal terdiri dari 5 huruf',
            'product_price.required' => 'Harga product wajib dicantumkan',
            'product_price.integer' => 'Input harus berupa angka',
            'product_description.required' => 'Deskripsi product wajib di isi',
            'product_description.min' => 'Deskripsi product harus terdiri dari minimal 20 huruf',
            'category_id.required' => 'Category id dibutuhkan'
        ]);


        $productAttribute = [];

        $file =  $request->file('product_image');
        
        $imagename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
       
        $file->move(public_path('product_image'),$request->product_name.'-'.$imagename);
        

        $productAttribute['product_name'] = $request->product_name;
        $productAttribute['product_price'] = $request->product_price;
        $productAttribute['product_description'] = $request->product_description;
        $productAttribute['product_image'] =  $request->product_name.'-'.$imagename;
        $productAttribute['product_status'] = 'aktif';
        $productAttribute['category_id'] = $request->category_id;
        
       
        Product::create($productAttribute);
        return redirect()->route('listProduct');
    }




    public function showProduct($id)
    {
        $showProduct = Product::find($id);
        $categoryProduct = Product::where('product_id',$id)->pluck('category_id')->first();
        $namaCategory = Category::where('category_id',$categoryProduct)->pluck('category_name')->first();
        
        return view('home.product.detail-product',['namaCategory'=>$namaCategory,'showProduct'=>$showProduct]);
    }

    public function checkoutPage($id)
    {
        $product = Product::find($id);
        $categoryProduct = Product::where('product_id',$id)->pluck('category_id')->first();
        $namaCategory = Category::where('id',$categoryProduct)->pluck('category')->first();
        
        return view('home.product.detail-product',['namaCategory'=>$namaCategory,'product'=>$product]);
    }

    
    public function editProduct($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('category_name','ASC')->get();
        return view('home.product.edit-product',['product'=>$product,'category'=>$category]);
    }

   
    public function updateProduct(Request $request, $id)
    {
       
        $file =  $request->file('product_image');
        
        $imagename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
       
        $product = Product::find($id);
        if($file){
            unlink('product_image/'.$product->product_image);

            $file->move(public_path('product_image'),$request->nama_product.'-'.$imagename);

        } else {
            unset($request);
        }

        $productAttribute = [];
        $productAttribute['product_name'] = $request->nama_product;
        $productAttribute['product_price'] = $request->harga_product;
        $productAttribute['product_description'] = $request->deskripsi_product;
        $productAttribute['product_image'] =  $request->nama_product.'-'.$imagename;
        $productAttribute['product_status'] = 'aktif';
        $productAttribute['category_id'] = $request->category_id;

        Product::find($id)->update($productAttribute);
        return redirect()->route('home.home');
    }

  
    public function destroyProduct($id)
    {
        $product = Product::find($id);

        unlink('product_image/'.$product->product_image);

        $product->delete();
       

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request) {
        
        $request->user()->update([
            'user_password' => Hash::make($request->get('user_password'))
        ]);

        return redirect()->route('beranda');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
        $category = Category::orderBy('category','ASC')->get();
        return view('home.product.create-product')->with('category',$category);
    }


    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'nama_product' => 'required|min:5',
            'harga_product' => 'required|integer',
            'deskripsi_product' => 'required|min:20',
            'category_id' => 'required',
         ], 
        $anu = [
            'nama_product.required' => 'Nama product wajib di isi',
            'nama_product.min' => 'Nama product minimal terdiri dari 5 huruf',
            'harga_product.required' => 'Harga product wajib dicantumkan',
            'harga_product.integer' => 'Input harus berupa angka',
            'deskripsi_product.required' => 'Deskripsi product wajib di isi',
            'deskripsi_product.min' => 'Deskripsi product harus terdiri dari minimal 20 huruf',
            'category_id.required' => 'Category id dibutuhkan'
        ]);


        $productAttribute = [];

        $file =  $request->file('image_product');
        
        $imagename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
       
        $file->move(public_path('image_product'),$request->nama_product.'-'.$imagename);
      
        $productAttribute['nama_product'] = $request->nama_product;
        $productAttribute['harga_product'] = $request->harga_product;
        $productAttribute['deskripsi_product'] = $request->deskripsi_product;
        $productAttribute['image_product'] =  $request->nama_product.'-'.$imagename;
        $productAttribute['status_product'] = 'aktif';
        $productAttribute['category_id'] = $request->category_id;
        
        Product::create($productAttribute);
        return redirect()->route('listProduct');
    }




    public function showProduct($id)
    {
        $showProduct = Product::find($id);
        $categoryProduct = Product::where('product_id',$id)->pluck('category_id')->first();
        $namaCategory = Category::where('id',$categoryProduct)->pluck('category')->first();
        
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
        $category = Category::orderBy('category','ASC')->get();
        return view('home.product.edit-product',['product'=>$product,'category'=>$category]);
    }

   
    public function updateProduct(Request $request, $id)
    {
       
        $file =  $request->file('image_product');
        
        $imagename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
       
        $product = Product::find($id);
        if($file){
            unlink('image_product/'.$product->image_product);

            $file->move(public_path('image_product'),$request->nama_product.'-'.$imagename);

        } else {
            unset($request);
        }

        $productAttribute = [];
        $productAttribute['nama_product'] = $request->nama_product;
        $productAttribute['harga_product'] = $request->harga_product;
        $productAttribute['deskripsi_product'] = $request->deskripsi_product;
        $productAttribute['image_product'] =  $request->nama_product.'-'.$imagename;
        $productAttribute['status_product'] = 'aktif';
        $productAttribute['category_id'] = $request->category_id;

        Product::find($id)->update($productAttribute);
        return redirect()->route('home.home');
    }

  
    public function destroyProduct($id)
    {
        $product = Product::find($id);

        unlink('image_product/'.$product->image_product);

        $product->delete();
       

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request) {
        
        $request->user()->update([
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('beranda');
    }
}

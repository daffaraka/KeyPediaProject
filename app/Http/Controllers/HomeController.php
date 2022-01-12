<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        $product = Product::all();
        return view('home.home')->with('product',$product);
    }

    public function index()
    {
        $product = Product::all();
        return view('home.product.index-product')->with('product',$product);
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
        
        return view('home.product.show-product',['namaCategory'=>$namaCategory,'showProduct'=>$showProduct]);
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
}

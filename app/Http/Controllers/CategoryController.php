<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        
    }

    
    
    public function createCategory()
    {
        $category = Category::all();

        return view('home.category.create-category')->with('category',$category);
    }

    public function storeCategory(Request $request)
    {
        Category::create($request->all());

        return redirect()->route('createCategory');
    }
    
    
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('home.category.edit-category')->with('category',$category);
    }

  
    public function updateCategory(Request $request, $id)
    {
        Category::find($id)->update($request->all());
      
        return redirect()->route('createCategory');
    }

  
    public function destroyCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('createCategory');
    }
}

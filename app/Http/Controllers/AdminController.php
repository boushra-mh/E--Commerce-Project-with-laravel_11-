<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
     
    public function add_category(Request $request)
    {
      $category=new Category();
      $category->category_name=$request->category;

      $category->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Category Added Successfully');
      return redirect()->back();

    
    }
    public function delete_category($id )
    {

      $data =Category::find($id);
      $data->delete();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Category Deleted   Successfully');
      return redirect()->back();

    }
    public function edit_category($id)
    {
      $data=Category::find($id);
      return view("admin.edit",compact("data"));
    }
    public function update_category(Request $request ,$id)
    {
      $data=Category::find($id);
      $data->category_name=$request->category;
      $data->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Category updated   Successfully');
      return redirect('/view_category');

    }

    public function add_product()
    {
      $category=Category::all();
      return view('admin.add_product',compact("category"));
    }
    public function upload_product(Request $request)
    {
      $product=new Product();
      $product->product_name=$request->title;
      $product->price=$request->price;
      $product->quantity=$request->quantity;
      $product->description=$request->description;
      $product->category =$request->name;
      $image=$request->image;
      if($image)
      {
        $imageName=time() .'.'. $image->getClientOriginalExtension();
        $request->image->move('products' . $imageName);
        $product->image=$imageName;
      }
      $product->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added Successfully');
      return redirect()->back();

    }
    public function view_product()
    {
      $product=Product::paginate(3);
      
      return view('admin.view_product',compact('product'));
    }
    public function delete_product($id)
    {
      $products=Product::find($id);
      $products->delete();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted   Successfully');
      return redirect()->back();

    }
}


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
      $product->category=$request->name;
      $image=$request->image;
      // if($image)
      // {
      //   $imageName=time() .'.'. $image->getClientOriginalExtension();
      //   $request->image->move('public/products' . $imageName);
      //   $product->image=$imageName;
      // }

      if ($image = $request->file('image')) {
        $destinationPath = 'images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $product->image = "$profileImage";
    }
      $product->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added Successfully');
      return redirect()->back();

    }
    public function view_product()
    {
      $product=Product::paginate(63);
      
      return view('admin.view_product',compact('product'));
    }
    public function delete_product($id)
    {
      $products=Product::find($id);
      $products->delete();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted   Successfully');
      return redirect()->back();

    }
    public function edit_product($id)
    {
      $data  =Product::find($id);
      return view('admin.edit_product', compact('data'));

    }
    public function update_product(Request $request,$id)
    {
     
      $data=Product::find($id);
      $data->product_name=$request->product_name;
      $data->description=$request->description;
      $data->price=$request->price;
      $data->quantity=$request->quantity;
      $data->category=$request->category;
    
      if ($image = $request->file('image')) {
          $destinationPath = 'images/';
          $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
          $image->move($destinationPath, $profileImage);
          $data->image = "$profileImage";
      }
      $data->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('Product updated   Successfully');
      return redirect('/view_product');

    }
    public function product_search(Request $request)
    {
      $search = $request->search;
      $product=Product::where('product_name','LIKE','%'.$search.'%')
      ->orWhere('category','LIKE','%'.$search.'%')->paginate(63);
      return view('admin/view_product',compact('product'));
    }
}


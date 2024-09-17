<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        return view("admin.index");
    }
    public function  home()
    {
        $product=Product::all();
        return view("home.index",compact('product'));
    }
    public function home_login()
    {
        $product=Product::all();
          
        $user=Auth::user();
         
        $user_id=$user->id;

        $count = Cart::where('user_id',$user_id)->count();

        return view("home.index",compact('product','count'));

    }
     public function product_details($id)
     {
        $product=Product::find($id);
        return view("home.product_details",compact('product'));
     }
     public function add_cart($id)
     {
         $product_id = $id; 

         $user = Auth::user(); 

         $user_id= $user->id;

         $data= new Cart();

         $data->user_id = $user_id;

         $data->product_id = $product_id;

         $data->save();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Product Added To The Cart Successfully');

         return redirect()->back();

     }

}

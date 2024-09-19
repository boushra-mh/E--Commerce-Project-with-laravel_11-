<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $user=User::where('usertype', 'user')->get()->count();

        $product=Product::all()->count();

        $order=Order::all()->count();

        $order_delivery=Order::where('status', 'delivered')->get()->count();

        return view("admin.index",compact('user','product','order','order_delivery'));
    }
    public function  home()
    {
        $product=Product::all();
        
        if(Auth::id())
        {

        $user=Auth::user();
         
        $user_id=$user->id;

        $count = Cart::where('user_id',$user_id)->count();

        }

        else
        {

        $count ='';

        }

        return view("home.index",compact('product','count'));
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
  
        $user=Auth::user();
         
        $user_id=$user->id;

        $count = Cart::where('user_id',$user_id)->count();


        return view("home.product_details",compact('product','count'));
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

     public function myCart()
     {

        if(Auth::id())
        {
            $user=Auth::user();

            $user_id = $user->id;

            $count=Cart::where('user_id',$user_id)->count() ;

            $cart= Cart::where('user_id',$user_id)->get();
        }

        return view('home.myCart',compact('count','cart'));
     }
     public function confirm_order(Request $request)
     {

        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $user_id =Auth::user()->id;

        $cart = Cart::where('user_id',$user_id)->get();
        
        foreach($cart as $carts)
        {
            $order = new Order() ;

            $order->name =  $name ;

            $order->rec_address = $address ;

            $order->phone = $phone ;

            $order->user_id = $user_id ;

            $order->product_id = $carts->product_id ;

            $order->save();

        }

        $cart_remove =Cart::where('user_id', $user_id)->get();

        foreach ($cart_remove as $remove)
        {
            $data =Cart::find($remove->id);

            $data->delete();
        }

        toastr()->timeOut(5000)->closeButton()->addSuccess('Products Ordered Successfully');
        
        return redirect()->back() ;


     }

}

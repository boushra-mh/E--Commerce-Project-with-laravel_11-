<!DOCTYPE html>
<html>

<head>
@include('home.css')

<style>

    .div_deg
    {
           display: flex;
           justify-content: center;
           align-items: center;
           margin: 60px
      
    }
    table
    {
        border: 2px solid black;
        text-align: center;
        width: 800px; 

    }
    th 
    { 
        border: 2px solid black;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
        background-color: black;

    }
    td
    {
 
        border: 1px solid skyblue;
    }
    .cart_value
    {
        text-align: center;
        margin-bottom: 80px;
        padding: 18px; 
    }
    h3
    {
        font-family: serif;
    }
    .order_deg
    {

    }
    label
    {
        display: inline-block;
        width: 150px;
    }
    .div_gap
    {
        padding: 20px;
    }

</style>

</head>

<body>
  <div class="hero_area">
      <!-- header section strats -->
      @include('home.header')
          <!-- end header section -->
  </div>
    <div class="div_deg">

        <table>
            <tr>
                <th>Product Title</th>

                <th>Price</th>

                <th>Image</th>

                <th>Remove</th>
              
            </tr>
            <?php
            $value=0;
            ?>
            @foreach ($cart as $cart)
          
            <tr>
                <td>{{$cart->product->product_name}}</td>
                <td>{{$cart->product->price}}</td>
                <td>
                    <img  width="150" height="150"  src="/images/{{$cart->product->image}}">
                </td>
                <td></td>
            </tr>
            <?php
            $value = (int)$value + (int)$cart->product->price ;
            ?>
            @endforeach
        </table>
       </div>
       <div class="cart_value">
        <h3>Total Value Of This Cart : {{$value}} $ </h3>
     </div>
    </di>
     <div class="div_deg">
        <div class="order_deg">
       
            <form method="POST" action="{{url('confirm_order')}}">
                @csrf

              <div class="div_gap"> 
                 <label>Receiver Name</label>
                 <input type="text" name="name  " value="{{Auth::user()->name}}">
              </div>
              
              <div class="div_gap">
                <label> Receiver Address</label>
                <input type="text" name="address" value="{{Auth::user()->address}}">
              </div>

              <div class="div_gap">  
                <label>Receiver Phone</label>
                <input type="text" bame="phone" value="{{Auth::user()->phone}}">
               </div>

               <div class="div_gap">
               
                <input  class="btn btn-primary" type="submit" value="Cash On Delivery">
               </div>
               <a  class="btn btn-success" href="{{url('stripe',$value)}}" >Pay Using Card</a>
              
        
             </form>
        </div>
     </div>
      




  <!-- info section -->
@include('home.footer')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
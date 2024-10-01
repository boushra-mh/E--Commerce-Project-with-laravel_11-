<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            border: 2px solid skyblue;
            background-color: black;
            padding: 10px;
            text-align: center;
            color: white;
            font-size: 15px;
            font-weight: bold;
            margin: 40px;
            width:40px;
            /* background-color:antiquewhite; */
        }
        td
        {
     
            border: 1px solid skyblue;
            /* color: rgba(255, 255, 255, 0); */
            padding: 10px ;
        }
        </style>
</head>
<body>
   <div>

      @include('home.header')

   </div>

        <div class="div_deg">
            <table>
                <tr>
                   
                    <th>Product Name</th>              
                    <th>Price </th>  
                    <th>Status</th>          
                    <th>Image</th>
                </tr>
                @foreach ($order as $order )
                 <tr>
                    <td>{{$order->product->product_name}}</td>
                    <td>{{$order->product->price}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <img width="120" height="120" src="images/{{$order->product->image}}">
                    </td>
                  </tr>
                @endforeach
            </table>
        </div>
    
   



     <!-- info section -->

      @include('home.footer')
    <!-- end info section -->
    
</body>
</html>
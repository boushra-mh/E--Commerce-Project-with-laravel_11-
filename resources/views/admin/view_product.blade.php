<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style  type="text/css">
        input[type='text'] 
        {
          widows: = px;
          height: 40px;
       

        }
      
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30 px;
            
        }
        .table_deg
        {
          text-align: center;
          margin: auto;
          border: 2px solid yellowgreen;
          margin-top: 50px;
          margin-bottom: 300px;
          width: 600px;
        }
        th
        {
          background-color: skyblue;
          padding: 15px;
          font-size: 20px;
          font-weight: bold;
          color: white;
        }
        td
        {
          color:rgb(10, 10, 10) ;
          padding: 10px;
          border: 1px solid skyblue; 
        }
    </style>
  </head>
  <body>
   @include('admin.header')
   
      <!-- Sidebar Navigation-->
     @include('admin.siderbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <form  class="div_deg"action="{{url('product_search')}}" method="get" >
              @csrf
              <input type="text" name="search">
              <input type="submit" value="submit" class="btn btn-primary">
            </form>
            <div class="div_deg">
               
            </div>
            <div>
              <table class="table_deg">
                <tr>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach ($product as $products )
                <tr>    
                  <td>{{$products->product_name}}</td>
                   <td>{{$products->category}}</td>
                  <td>{!!Str::words($products->description,5)!!}</td>
                  <td>{{$products->price}}</td>
                  <td>{{$products->quantity}}</td>
                  <td>
                       <img  height="120"  width="120" src="images/{{$products->image}}">
                  </td>
                  <td>
                    <a class="btn btn-success "
                    href="{{url('edit_product', $products->id)}} ">Edit</a>
                  </td> 
                  <td>
                    <a class="btn btn-danger" onclick="cobfirmation(event)"
                    href="{{url('delete_product', $products->id)}} ">Delete</a>
                  </td>
                 
                </tr>
                @endforeach
               
              </table>
             </div>
          </div>  
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/javascript">
         function cobfirmation(ev)
         {
          ev.preventDefault();
          var urlToRedirect =ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);

          swal({
          
            title :"Are You Sure To Delete This ?",
            text :"This Delete Will Be parmanent" ,
            icon :"warning" ,
            buttons :true ,
            dangerMod:true,
          })
          .then(
            (willancel)=>{
              if(willancel)
            {
              window.location.href=urlToRedirect;
            }
          })
          
         }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>s
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
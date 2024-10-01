<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
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
        border: 2px solid rgb(10, 250, 242);
        text-align: center;
        width: 800px; 

    }
    th 
    { 
        border: 2px solid skyblue;
        padding: 10px;
        text-align: center;
        color: rgb(10, 230, 245);
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
   @include('admin.header')
   
      <!-- Sidebar Navigation-->
     @include('admin.siderbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="div_deg">
                <table>
                    <tr>
                        <th>Customer Name </th>
                        <th>Product Title</th>
                        <th> Address</th>
                        <th>Price </th>
                        <th>Phone </th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Print Pdf</th>

                    </tr>
                    @foreach ($data as $data )
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->product->product_name}}</td>
                        <td>{{$data->rec_address}}</td>
                        <td>{{$data->product->price}}</td>
                        <td>{{$data->phone}}</td>
                        <td>
                            <img width="120" height="120" src="images/{{$data->product->image}}">
                            
                        </td>
                        <td>
                          @if($data->status=='in Progress')
                          <span style="color:red">{{$data->status}}</span>
                          @elseif($data->status=='on the way')
                          <span style="color:skyblue">{{$data->status}}</span>
                          @else
                          <span style="color:rgb(112, 171, 72)">{{$data->status}}</span>
                          @endif

                        </td>
                        <td>
                          <a href="{{url('on_the_way',$data)}}" class="btn btn-primary" >On The way</a>
                          <a href="{{url('delivered',$data)}}" class="btn btn-success" >Delivery</a>
                        </td>
                        <td>
                        <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print Pdf</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>  
      </div>
    </div>
    <!-- JavaScript files-->
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
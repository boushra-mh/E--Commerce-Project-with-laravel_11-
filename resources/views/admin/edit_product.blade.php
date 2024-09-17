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
          margin: 60 px;
      
          
      }
      label 
      {
          display: inline-flex;
          width: 250px;
          font-size: 18px;        
      }
      input[type="text"]
      {
          width: 350px;
          height: 50px;
      }
      textarea
      {
          height:80px;
          width: 450px;
      }
      .input_deg
      {
          padding: 15px;

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
            <div class="page-content">
                <div class="page-header">
                  <div class="container-fluid">
                    <h1>Update product</h1>
                        <div class="dev_deg">
                            <form action="{{url('update_product', $data->id)}}" method="POST">
                                @csrf
                                <div class="input_deg">
                                       <label>Product_Name</label>
                                       <input type="text"name="product_name" class="form-control" value="{{$data->product_name}}" >
                                </div>
                                <div class="input_deg">
                                      <label>Description</label>
                                      <textarea  name="description" class="form-control">{{$data->description}}</textarea>
                                 </div>
                                 <div class="input_deg">
                                    <label>Price</label>
                                    <input type="text"name="price"  class="form-control"value="{{$data->price}}" >
                                 </div>
                               
                                <div class="input_deg">
                                    <label>Quantity</label>
                                     <input type="number"name="quantity" class="form-control" value="{{$data->quantity}}" >
                                </div>
                              
                              <div class="input_deg">
                                <label>Category</label>
                                <select name="category"> 
                               <option value="{{ $data->category}}" class="form-control">{{ $data->category}}</option>   
                                </select>
                              </div>
                            </div>
                            <div class="input_deg">
                                <label> Current Image</label>
                                <img src="/images/{{ $data->image }}" width="100px">
                            </div>
                          
                          <div class="input_deg"> 
                                <label>New Image</label> 
                                <input type="file" name="image">
                                </div>
                              
                              <div class="input_deg">
                                <input type="submit" class="btn btn-primary" class="form-control" value="Update Product" />
                              </div>
                            </form>
                        </div>
                  </div>  
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
@extends("layout")

@section("master")

<div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full inner_page_head">
                     <h3>Upload Products</h3>
                  </div>
               </div>
            </div>
         </div>
<div class="container" style="margin-top:30px;">

  
<form action="{{'/create_pdt_Post'}}" method="post" enctype="multipart/form-data" style="border:1px solid grey; padding:40px;border-radius:5px;">
@csrf
  <div class="form-group">
    <!-- <label for="exampleInputEmail1">Product Name</label> -->
    <input type="text" class="form-control" name="Pdt_name" aria-describedby="emailHelp" placeholder="Enter Product Name">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Product Image</label> -->
    <input type="File" class="form-control" name="ImageFile" onchange="showimage(this)"  id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Product Price</label> -->
    <input type="number" class="form-control" name="Pdt_price" placeholder="Enter Product Price">
  </div>
  <div class="form-group">
    <!-- <label for="exampleInputPassword1">Product Price</label> -->
    <input type="number" class="form-control" name="qty" placeholder="Enter Product Price">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Product catagory</label>
    <select name="Catagory_name">
        <option value="Jewellery">Jewellery</option>    
        <option value="Medicians">Cosmetics</option>    
    </select>
  </div>

  <button type="submit" style="
    padding: 15px 20px;
    font-size: 16px;
    border:none;
    text-transform: capitalize;
    line-height: normal;
    margin: 10px auto;
    border-radius:5px;
    background: #333;
    color: #fff;
    font-weight: 600;text-decoration:none;">Submit</button>
</form>
</div>

@endsection
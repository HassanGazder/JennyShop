@extends("layout")


@section("master")



<div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full inner_page_head">
                     <h3>Customers Orders</h3>
                  </div>
               </div>
            </div>
         </div>
<div class="jumbotron">

    <div class="container">
    <!-- <div class="heading_container heading_center">
               <h2>
                  User <span>Messages</span>
               </h2>
            </div> -->

<table class="table table-light table-hover table-striped mt-5">
    <tr>

        <td colspan="3" class="text-left" > 
        <form action="{{'/Filter_Orders_list'}}" id="Filter_form" method="post">
            @csrf
            <label class="label-control">Filter</label>    
            <select  class="form-control col-md-4" onchange="$('#Filter_form').submit()" name="fileterValue">
                <option value="Select">
                    Select Catogory
                </option>
                <option value="Jewellery">
                    Jewellery
                </option>
                <option value="Medicians">
                Medicians    
                </option>
            </select>
        </form>
    </td>
    <td colspan="3" class="text-right" > 
        <label class="label-control">Your Total Sale :</label> 
    {{$TotalSale}}
    <script>
    var value = $(".text-right").text().replace("Your Total Sale :","");
    newvalue = "Total Sale :"+parseInt(value).toLocaleString("eu",{minimumFractionDigits:2})+"/Pkr";
    $(".text-right").text(newvalue);
    
    </script>
</td>
    </tr>
  <thead>
    <tr>
      <th scope="col">Customer id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Product name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Qty</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach($Cus_orders as $us)
    <tr>
      <th scope="row">{{$us->id}}</th>
      <th>{{$us->name}}</th>
      <td>{{$us->Pdt_title}}</td>
      <td>{{$us->Pdt_price}}</td>
      <td>{{$us->qty}}</td>
      <td>{{$us->created_at}}</td>
    </tr>
    <tr>
    @endforeach
  </tbody>
</table>

    </div>
</div>
@endsection
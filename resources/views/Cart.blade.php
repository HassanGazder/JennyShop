@extends('layout')


@section('master')
<style>

.qty
{
  display: flex;
}
.qty span
{
  cursor: pointer;
  width: 60px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(0,0,0,.1);
  font-size: 10px;
  background-color: rgb(190, 55, 55);
}
.qty span:hover
{
  background-color: rgb(218, 75, 75);
  transition: 0.8s;
}
.qty span.qty-subtract
{
  border-right: 0;
  border-radius: 25px 0 0 25px;
}
.qty span.qty-add
{
  border-left: 0;
  border-radius: 0 25px 25px 0;
}
.qty input
{
  background-color: #fff;
  border: 0;
  outline: none;
  width: 50px;
  height: 40px;
  text-align: center;
  font-weight: 600;
  border: 1px solid rgba(0,0,0,.1);
}



</style>
<div class="heading_container heading_center">
               <h2>
                  My <span>Cart</span>
               </h2>
            </div>


<div class="Jumbotron" style="margin-bottom:100px">


<div class="container">

<table class="table table-light table-hover table-striped mt-5">
  <thead>
  <tr>
      <td class="text-left" colspan="3">
          <strong>Grand Total</strong>
      </td>
      <td class="text-right" colspan="2">
          <p class="Grand_total">0.0 pkr</p>
      </td>
  </tr>
  <tr>
    <td colspan="5" style="display:none;text-align:center" id="success_message" >
    <div class="alert alert-success" role="alert">
        Thank you for placing Order.
    </div>
    </td>
  </tr>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Qty</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
  <tfoot>
    <tr>
        <td  colspan="5" class="text-center">
        <div class="options">
          <a role="button" style="cursor:pointer;display:none" data-toggle="modal" data-target="#model1"   class="btn btn-success option2">
            Buy Now
          </a>
          <a role="button" onclick="history.back();" style="cursor:pointer" class="option1 btn btn-danger">
          Back to Shop
          </a>
         </div>
        </td>
    </tr>
  </tfoot>
</table>


</div>

</div>




  <script src="https://kit.fontawesome.com/fcd37f342e.js" crossorigin="anonymous"></script>
  
  
  <div class="modal fade" id="model1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you Really want to delete</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button"  class="btn btn-primary orderBtn">Yes</button>
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="js/addtocart.js"></script>
<script>

</script>  
  @endsection
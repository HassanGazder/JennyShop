@extends('layout')

@section("master")
@csrf
<!-- inner page section -->
<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Manage Products</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
       
            @foreach($Products as $p)


               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <button type="button" style="cursor:pointer" data-toggle="modal" data-target="#modal{{$p->id}}"  class="option1 btn btn-danger">
                           Delete
                           </button>
                           <a href="" class="update option2">
                           Update
                           </a>
                        </div>
                     </div>

                     <div class="img-box">
                        <img src="Products_images/{{$p->Pdt_img}}" class="Pdt_img" alt="img">
                     </div>
                     <div class="detail-box">
                        <h5 class="Pdt_title">
                        {{$p->Pdt_title}}
                        </h5>
                        <h6 class="Pdt_price">
                        {{$p->Pdt_price}}
                        </h6>
                     </div>
                  </div>
               </div>
                     <!-- Confirmation Modal -->


<div class="modal fade" id="modal{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        <button type="button"  class="btn btn-primary delete" data-id="{{$p->id}}" onclick="DeleteProduct(event)" >Yes</button>

        
        <!-- <form action="{{'delete/$p->id'}}" id="from{{$p->id}}" method="post">
        </form> -->
      </div>
    </div>
  </div>
</div>





                     
                     <!-- Confirmation Modal -->
               @endforeach
            </div>
            <!-- <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div> -->
            
         </div>
      </section>


      <!-- end product section -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
<script>
function  DeleteProduct(event){
// alert("working");

var id = $(event.target).attr('data-id');

$.ajax({
  content : "application/json",
  type: "GET",
  url: "delete/"+id,
  success:(result)=>{

    $("#modal"+id).modal("hide");
    window.location.reload();


  },
  error: (result)=>{alert("erorr")}
});







}


</script>

   <script src="js/addtocart.js"></script>
@endsection

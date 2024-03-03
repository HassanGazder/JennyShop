@extends('layout')

@section("master")

<!-- inner page section -->
<section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Search Results</h3>
                     <p> No of result :{{$NO_of_results}}</p> 
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding" style="padding:40px 0;">
         <div class="container">
            <!-- <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div> -->
            <div class="row">
       
            @foreach($Data as $p)


               <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a role="button" style="cursor:pointer" data-name="{{$p->Pdt_title}}" data-id="{{$p->id}}" class="addtocartbtn option1">
                           Add To Cart
                           </a>
                           <a href="" class="option2">
                           Buy Now
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

   <script src="js/addtocart.js"></script>
@endsection

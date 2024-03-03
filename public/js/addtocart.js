
var addtocartbtn =  $(".addtocartbtn");

cart = LoadChanges("Cart_products");

var Grand_total = LoadChanges("Grand_total");
if(Grand_total == null){
    Grand_total = 0;
}
$(".Grand_total").html(`${Grand_total.toLocaleString("eu",{minimumFractionDigits:2})}/Pkr`);

if (cart == null) {
    cart = [];
}

var counter = LoadChanges("index");
if (counter == null) {
    counter = 0;
}

function LoadChanges(Objects){
    return JSON.parse(localStorage.getItem(Objects));
}

function savechanges(Key,Object){
    localStorage.setItem(Key,Object);
}

    
for(var i=0; i< addtocartbtn.length; i++){
    addtocartbtn[i].addEventListener("click",(event)=>{
        event.preventDefault();
        var pdt_id = $(event.target).attr("data-id"); 
        var pdt_name = $(event.target).attr("data-name"); 
        console.log(pdt_name);
        $.ajax({
            
              type : "GET",
              datatype: "json",
              url: "Get_pdt/"+pdt_id,
              content: "application/json",
              asyn:true,
              success: (result)=>{  
                var status = cart.find(x=>x.Pdt_title==pdt_name);
                console.log(status);
                if(status != null){

                    console.log("item already in you cart");
                }
                else{
                    SavetoLocalstorage(result); 
                    alert("item added to your cart");                                                   
                }
              },
              error: ()=>{
                  console.log("someting went wrong");
              }
        });
    });
}    

function SavetoLocalstorage(result){
    
    result.qty = 1
    cart[counter] = result;
    Grand_total += parseInt(result.Pdt_price * 1);
    $(".Grand_total").html(`${Grand_total.toLocaleString("eu",{minimumFractionDigits:2})}/Pkr`);

    counter++;                        

    savechanges("Cart_products",JSON.stringify(cart));    
    savechanges("Grand_total",JSON.stringify(Grand_total));
    savechanges("index",counter); 
}




// window.onload = ()=>{
    
 
    var tbody = document.getElementsByTagName("tbody")[0];

    $.each(cart,(key,value)=>{
    
        var tr = `<tr>
        <th class="Pdt_id" data-id="${key}" scope="row">${key+1}</th>
        <td class="Pdt_title">${value.Pdt_title}</td>
        <td class="Pdt_price">${value.Pdt_price}</td>
        <td class='my-auto qty'>                                
        <div class="" style="display: inline-flex;">
        <span class="qty-subtract"><i class="fas fa-minus text-white"></i></span>
        <input type="number" id="count" min="1" max="3" class="qty quantity" name="qty" value="${value.qty}" />
        <span class="qty-add"><i class="fas fa-plus text-white"></i></span>
        </div>
        </td>
        <td><button type="button"  class="Remove btn btn-outline-danger">Remove</button></td>
        </tr>`;
        tbody.innerHTML += tr;
    });
// };


var removebtn = $(".Remove");
$(removebtn).on('click',(e)=>{
e.preventDefault();

RemoveFromCart(e)
window.location.reload();

});

function RemoveFromCart(e){

    var Pdt_id = $(e.target).parent().parent().find(".Pdt_id").attr("data-id");
    var Pdt_price = $(e.target).parent().parent().find("td:nth-child(3)").text();
    var qty = $(e.target).parent().parent().find(".quantity").val();
    cart.splice(Pdt_id,1);
    $(e.target).parent().parent().fadeOut();
    counter--;                   
    console.log(Pdt_price);     
    Grand_total -= parseInt(Pdt_price *qty);
    savechanges("index",counter); 
    savechanges("Cart_products",JSON.stringify(cart));    
    savechanges("Grand_total",JSON.stringify(Grand_total));

    $(".Grand_total").html(`${Grand_total.toFixed(2)}/Pkr`);

    
}


// change quantity Within cart items
$(".qty span").on('click', function (event) {
    event.preventDefault();
    var maindiv = event.target.parentElement.parentElement.parentElement; 
    var price = maindiv.getElementsByClassName("Pdt_price")[0].innerText;
    var title = maindiv.getElementsByClassName("Pdt_title")[0].innerText;
    console.log(`price = ${typeof(price)} and name = ${title}`);
    var qty = $(this).closest('.qty').find('input');
    var qtyVal = parseInt(qty.val());
    if ($(this).hasClass('qty-add')) {
        if (qtyVal != 3)
        {
            qty.val(qtyVal + 1);
            Grand_total += parseInt(price);
            $(".Grand_total").html(`${Grand_total.toLocaleString('eu',{minimumFractionDigits:2})}/Pkr`);
        savechanges("Grand_total",JSON.stringify(Grand_total));


            cart.forEach((item) => {
                if(title == item.Pdt_title)
                {
                    // alert("true");
                    item.qty = qty.val();
                    savechanges("Cart_products",JSON.stringify(cart));    

                }
            })
        }
    }
    else if (qtyVal > 1) {
        qty.val(qtyVal - 1);
        Grand_total -= parseInt(price);
        $(".Grand_total").html(`${Grand_total.toLocaleString('eu',{minimumFractionDigits:2})}/Pkr`);
        savechanges("Grand_total",JSON.stringify(Grand_total));

        // cart_total -= parseInt(price);
        // SaveChanges("grand-total",cart_total);
        // document.getElementsByClassName('cartTotalPrice')[0].innerText = "Rs :"+cart_total.toLocaleString("eu");
        cart.forEach((item) => {
            if(title == item.Pdt_title)
            {
                // alert("true");
                item.qty = qty.val();
                savechanges("Cart_products",JSON.stringify(cart));    
                 $(".option2").hide();   
            }
        })
     }
});



//Logics to submit orders::
$(".orderBtn").on('click',()=>{
    // alert("order btn clicked");
    
    // check if cart is empty or not
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax(
           {
             content: "application/json",
             type: "POST",
             dataType:"json",
             data:localStorage.getItem("Cart_products"),
             url: "Submit_Order",
             success:(Result)=>{
                 $("#model1").modal('hide');
                 $("tbody").empty();
                 $(".option2").hide();
                 $("tbody").html("<tr><td class='text-center' colspan='5'><h5 class='text-danger'>Your cart is empty</h5></td></tr>")
                 $(".Grand_total").html("00/Pkr");
                 $("#success_message").fadeIn('slow');

                 setTimeout(()=>{
                     $("#success_message").fadeOut('slow');
                 },3000);
                 localStorage.clear();





             },
             error:(Result)=>{alert("error")},
           }
       ); 
});
if(cart.length > 0){
    console.log("les than 0");
    $(".option2").show();
}
else{
    $(".option2").hide();
    $("tbody").html("<tr><td class='text-center' colspan='5'><h5 class='text-danger'>Your cart is empty</h5></td></tr>")


}

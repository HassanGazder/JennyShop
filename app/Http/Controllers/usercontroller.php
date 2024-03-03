<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Contactus;
use App\Models\User;
use App\Models\orders;
use Auth;


class usercontroller extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    function home()
    {
        $Products = Products::where('Pdt_Catagory','=','Jewellery')->take(6)->get();
        // echo $Products;
       return view("home",compact("Products"));
    }

    function aboutfunction()
    {
        return view('About');
    }

    function contactfunction()
    {
        return view('Contact');
    }

    function Medicians()
    {
        $Products = Products::where('Pdt_Catagory','=','Medicians')->get();
        $title = "Medicians";

        return view("Products",compact("Products"),['articleName' => $title]);
    }
    function Jewellery()
    {
        $Products = Products::where('Pdt_Catagory','=','Jewellery')->get();
        
        $title = "Jewellery Products";
        
        return view("Products",compact("Products"),['articleName' => $title]);
    }
    
    function Create_Get(){

        return view('Create_Product');
    }
    function create_pdt_Post(Request $req){
            $Pdt =new Products();

            $img = $req->file("ImageFile");
            $ext = rand().".".$img->getClientOriginalName();
            $img->move("Products_images/",$ext);
            $Pdt->Pdt_img = $ext;
            $Pdt->qty = $req->qty;
            $Pdt->Pdt_title = $req->Pdt_name;
            $Pdt->Pdt_price = $req->Pdt_price;
            $Pdt->Pdt_Catagory = $req->Catagory_name;
            $Pdt->save();
            

        return view('Create_Product');
    }

    function Contact_Post(Request $req){
        $Mess_details = new Contactus();
        $Mess_details->name = $req->name;
        $Mess_details->email = $req->email;
        $Mess_details->subject = $req->subject;
        $Mess_details->message = $req->message;

        $Mess_details->save();
        $result = "Thanks For Feedback";
        return  view("Contact",['Success_message'=>$result]);
    }
    //GET method of user message

    function User_messages_GET(){

        $User_messages=  Contactus::ALL();

        return View('User_messages',compact('User_messages'));
    }

    //Get Method to display cart items
    function cart(){

        return view("Cart");
    }



    // To get data by id

    function Get_pdt($id){

        $product = Products::where('id','=',$id)->first();
            // return $product-;
        return response()->json($product);
    }
    
    function Login_page(){
        return view("auth.Login");
    }
    
    function Register_page(){
        return view("auth.register");
    }
    function Admin_dashboard(){
        return view("Admin_Dashboard");
    }
    // Action to Get all Products For Admin Action.
    function Manage_Products(){
        $Products = Products::all();
        return view("Manage_Products",compact("Products"));
    }
    
    
    function Delete_Product($id){

        $product = Products::where('id','=',$id)->first();
        
        $product->delete();
        return response()->json("success");
   
    }
     
    
    
    //Get method for search Data
    function Searched_Products(Request $req){
        $searchtext = $req->search;
            $Data = Products::where('Pdt_title','like',$searchtext.'%')->get();
            $noofresult = $Data->count();
            return view("Searched_Products",compact("Data"),["NO_of_results"=>$noofresult]);

            
        }
        
    
        //fucntion Submit Order To Admin
    
        function Submit_Order(Request $req){
            $data = json_decode($req->getContent());
           
            foreach ($data as $value) {
                # code...
                $order = new orders();
                $order->Pdt_img = $value->Pdt_img;
                $order->qty = $value->qty;
                $order->Pdt_title = $value->Pdt_title;
                $order->Pdt_price = $value->Pdt_price;
                $order->Pdt_Catagory = $value->Pdt_Catagory;
                $order->user_id = Auth::user()->id;
                $order->save();
            }

            return response()->json("success");
        }
    
        
        //fucntion for Display all users
        function User_orders(){

            $Cus_orders = User::join('orders', 'orders.user_id', '=', 'users.id')->get(['users.id', 'users.name', 'orders.Pdt_title','orders.Pdt_price','orders.qty','orders.created_at']);
            $TotalSale = User::join('orders', 'orders.user_id', '=', 'users.id')->sum('orders.Pdt_price');
            return view("orders",compact("Cus_orders"),['TotalSale'=>$TotalSale]);
        }
    
        function login(){
            return view('auth.login');
        }



    //Function for filter User_orders_list
        function fitlerOrder(Request $req)
        {
                $Filtername = $req->fileterValue;
                $Cus_orders = User::join('orders', 'orders.user_id', '=', 'users.id')->where('orders.Pdt_Catagory','=',$Filtername)->get(['users.id', 'users.name', 'orders.Pdt_title','orders.Pdt_price','orders.qty','orders.created_at']);
                $price=0;
                foreach ($Cus_orders as $value) {
                    $price += $value->Pdt_price * $value->qty;
                }

                return view("orders",compact("Cus_orders"),['TotalSale'=>$price]);

        }

    }

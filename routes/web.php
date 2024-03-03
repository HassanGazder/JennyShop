<?php

use Illuminate\Support\Facades\Route;
use App\http\controllers\usercontroller;
use App\http\controllers\auth\Logincontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/Contact', function () {
    return view('Contact');
});
Route::get('/About', function () {
    return view('About');
});
Route::get('/Products', function () {
    return view('Products');
});

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('',[usercontroller::class,'home']);
Route::get('/homehome.blade.php',[usercontroller::class,'home']);
Route::get('/AboutAbout.blade.php',[usercontroller::class,'aboutfunction']);
Route::get('/ContactContact.blade.php',[usercontroller::class,'contactfunction']);
Route::get('/create_pdt',[usercontroller::class,'Create_Get'])->middleware('is_admin');
Route::post('/create_pdt_Post',[usercontroller::class,'create_pdt_Post'])->middleware('is_admin');

Route::get('/Medicians',[usercontroller::class,'Medicians']);
Route::get('/Jewellery',[usercontroller::class,'Jewellery']);

//Route for Contact us page form
Route::post('/Contact_Post',[usercontroller::class,'Contact_Post']);

//Route to show User messages

Route::get('/User_messages',[usercontroller::class,'User_messages_GET'])->middleware('is_admin');

//route for diplay cart items

Route::get('/cart',[usercontroller::class,'cart']);

// route to get product with id

Route::get('/Get_pdt/{id}',[usercontroller::class,'Get_pdt']);

//route for Admin Which Contain all product list
Route::get('/Manage_Products',[usercontroller::class,'Manage_Products'])->middleware('is_admin');



//Route for search items
Route::get('/Searched_Products', [usercontroller::class, 'Searched_Products']);


//Route for Home
Route::get('/home', [usercontroller::class, 'home'])->name('home');



Auth::routes();
//route for login page
Route::get('/login',[usercontroller::class,'login']);
Auth::routes();

//route to delete products
Route::get('/delete/{id}',[usercontroller::class,'Delete_Product']);




//Route for Submit_Order
Route::post('/Submit_Order',[usercontroller::class,'Submit_Order'])->name('postSubmit');




//Route to Display User Orders

Route::get('/User_orders',[usercontroller::class,'User_orders']);


//Route for filter User_orders_list
Route::post('/Filter_Orders_list',[usercontroller::class,'fitlerOrder']);
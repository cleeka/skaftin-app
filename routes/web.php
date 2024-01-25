<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;


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

Route::get('/', function () {
    return view('welcome');
});

 


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    
    // Admin login Route
   Route::match(['get','post'],'login', 'AdminController@login');

   Route::group(['middleware'=>['admin']],function(){

    // Admin dashboard Route
   Route::get('dashboard', 'AdminController@dashboard');

    // Update Admin Password
   Route::match(['get','post'],'update-admin-password' ,'AdminController@updateAdminPassword');

    // Check Admin Password
   Route::post('check-admin-password' ,'AdminController@checkAdminPassword');

   //update admin details
   Route::match(['get','post'],'update-admin-details' ,'AdminController@updateAdminDetails');


   //update vendor details
   Route::match(['get','post'],'update-vendor-details/{slug}' ,'AdminController@updateVendorDetails');

   // View Admins/Subadmins/Vendors
   Route::get('admins/{type?}', 'AdminController@admins');
   
   //View vendor details
   Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails');


   //update admin status
    Route::post('update-admin-status','AdminController@updateAdminStatus');

    // Admin logout
   Route::get('logout', 'AdminController@logout'); 

   // Sections
   Route::get('sections','SectionController@sections');
   Route::post('update-section-status','SectionController@updateSectionStatus');
   Route::get('delete-section/{id}','SectionController@deleteSection');
   Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');

   // Brands
   Route::get('brands','BrandController@brands');
   Route::post('update-brand-status','BrandController@updateBrandStatus');
   Route::get('delete-brand/{id}','BrandController@deleteBrand');
   Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');

   // Categories
   Route::get('categories','CategoryController@categories');
   Route::post('update-category-status','CategoryController@updateCategoryStatus');
   Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');
   Route::get('append-categories-level','CategoryController@appendCategoryLevel');
   Route::get('delete-category/{id}','CategoryController@deleteCategory');

   //Menus
   Route::get('menus','MenusController@menus');
   Route::post('update-dish-status','MenusController@updateDishStatus');
   Route::get('delete-dish/{id}','MenusController@deleteDish');
   Route::match(['get','post'],'add-edit-dish/{id?}','MenusController@addEditDish');

   //Add Attributes
   Route::match(['get','post'],'add-edit-attributes/{id}','MenusController@addAttributes');
   Route::get('delete-attribute/{id}','MenusController@deleteAttribute');
   Route::match(['get','post'],'edit-attributes/{id}','MenusController@editAttributes');

   //Add Images
   Route::match(['get','post'],'add-images/{id}','MenusController@addImages');
   Route::get('delete-image/{id}','MenusController@deleteImage');

   //users
   Route::get('users','UserController@users');
   Route::post('update-user-status','UserController@updateUserStatus');

   //orders
   Route::get('orders','OrderController@orders');
   Route::get('orders/{id}','OrderController@orderDetails');
   Route::post('update-order-status','OrderController@updateOrderStatus');
    Route::post('update-order-item-status','OrderController@updateOrderItemStatus');
   });
});

Route::namespace('App\Http\Controllers\Front')->group(function(){
  Route::get('/','IndexController@index');
  Route::get('/our-story','IndexController@story');
  Route::get('/faq','IndexController@faq');
  Route::get('/privacy-policy','IndexController@policy');
  Route::get('/food-safety','IndexController@food');
  Route::get('/terms','IndexController@terms');
  

  Route::post('/', 'IndexController@store');

  //Listing/Category routes
  $catUrls = Category::select('url')->where('status',1)->get()->pluck('url')->toArray();
  foreach ($catUrls as $key => $url) {
    Route::get('/'.$url,'ProductsController@listing');
  }

  Route::get('/subscriber', 'SubscriberController@index');
  
  // Vendor Products listing
  Route::get('/products/{vendorid}','ProductsController@vendorListing');


  //Product detail page
  Route::get('/product/{id}','ProductsController@detail');

  //Get product attribute price
  Route::post('get-product-price','ProductsController@getProductPrice');

  //Vendor Login/Register
  Route::get('vendor/register','VendorController@register');
  Route::get('vendor/login','VendorController@login');

  //Vendor Register
  Route::post('vendor/register','VendorController@vendorRegister');
  
  // vendor or Cook forgot password
  Route::match(['get','post'],'vendor/forgot-password','VendorController@forgotPasswordVendor');

  //confirm vendor account
  Route::get('vendor/confirm/{code}','VendorController@confirmVendor');

  // Add to cart route
  Route::post('cart/add','ProductsController@cartAdd');

  // cart route
  Route::get('/cart','ProductsController@cart');

   //update cart qty
  Route::post('cart/update','ProductsController@cartUpdate');

  //delete cart item
  Route::post('cart/delete','ProductsController@cartDelete');

  //user Login/Register
  Route::get('user/register','UserController@register');
  Route::get('user/login','UserController@login');

  // User register
  Route::post('user/register','UserController@userRegister');
  
  Route::get('/send-verification-code','PhoneVerificationController@showForm');
  Route::post('/send-verification-code', 'PhoneVerificationController@sendVerificationCode');

  // user login
  Route::post('user/login',['as'=>'login','uses'=>'UserController@userLogin']);
  
  Route::group(['middleware'=>['auth']],function(){
       
       // update user account
      Route::match(['get','post'],'user/account','UserController@userAccount');

      //update user password
      Route::post('user/update-password','UserController@userUpdatePassword');

      // checkout
      Route::match(['get','post'],'/checkout','ProductsController@checkout');

      // get delivery address
      Route::post('get-delivery-address','AddressController@getDeliveryAddress');

      // save delivery address
      Route::post('save-delivery-address','AddressController@saveDeliveryAddress');

      // remove delivery address
      Route::post('remove-delivery-address','AddressController@removeDeliveryAddress');

      //thanks
      Route::get('thanks', 'ProductsController@thanks');

      //users orders
      Route::get('user/orders/{id?}', 'OrderController@orders');

      //Paypal routes
      Route::get('paypal','PaypalController@paypal');
      Route::post('pay','PaypalController@pay')->name('payment');
      Route::get('success','PaypalController@success');
      Route::get('error','PaypalController@error');

  });

  // user forgot password
  Route::match(['get','post'],'user/forgot-password','UserController@forgotPassword');
  
  


  // User logout
  Route::get('user/logout','UserController@userLogout');

  // confirm user account
  Route::get('user/confirm/{code}','UserController@confirmAccount');
  
  // routes/web.php



   



});


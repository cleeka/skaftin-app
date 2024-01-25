<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductsAttribute;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProduct;
use Session;
use Auth;
use DB;
use Mail;

class ProductsController extends Controller
{

     

    public function listing(){
    	$url = Route::getFacadeRoot()->current()->uri(); 
    	$categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
    	if($categoryCount>0){
    		//get category details
    		$categoryDetails = Category::categoryDetails($url);    		
    		$categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1)->simplePaginate(8);
           
    		//dd($categoryDetails);
    		//echo "Category exists"; die;
    		return view('front.products.listing')->with(compact('categoryDetails','categoryProducts'));
        return response()->json(['data' => $items], 200);
    	} else{
    		abort(404);
    	}

    }

    public function vendorListing($vendorid){
        //get vendor shop name
       $getVendorShop = Vendor::getVendorShop($vendorid);
       // get vendor products
       $vendorProducts = Product::with('brand')->where('vendor_id',$vendorid)->where('status',1);
       $vendorProducts = $vendorProducts->paginate(30);
       return view('front.products.vendor_listing')->with(compact('getVendorShop','vendorProducts'));
    }

    public function detail($id){
      $productDetails = Product::with(['category','brand','vendor','attributes'=>function($query){ $query->where('stock','>',0)->where('status',1); },'images'])->find($id)->toArray();
      $categoryDetails = Category::categoryDetails($productDetails['category']['url']);
      
      //get group products
      $groupProducts = array();
      if(!empty($productDetails['group_code'])){
        $groupProducts = Product::select('id','product_image')->where('id','!=',$id)->where(['group_code'=>$productDetails['group_code'],'status'=>1])->get()->toArray();
         
      }

      $totalStock = ProductsAttribute::where('product_id',$id)->sum('stock');
     // dd($productDetails) ;
      return view('front.products.detail')->with(compact('productDetails','categoryDetails','totalStock','groupProducts')); 
    }

    public function getProductPrice(Request $request){
        if($request->ajax()){
            $data = $request->all();
           // echo "<pre>"; print_r($data); die;
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'],$data['size']);
            return $getDiscountAttributePrice;
        }
    }
    
    public function cartAdd(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            // check product stock is available or not
            $getProductStock = ProductsAttribute::getProductStock($data['product_id'],$data['size']);

            // dd($getProductStock);

     
          // if($getProductStock<$data['quantity']){
          //   return redirect()->back()->with('error_message','Required Quantity is not available!');
          // }

          // if (count($getProductStock) === 0){
          //   return redirect()->back();
          // }

          // generate session ID if not exists
          $session_id = Session::get('session_id');
          if(empty($session_id)){
            $session_id = Session::getId();
            Session::put('session_id',$session_id);
          }
          
          // check product if already exists in the user cart
          if(Auth::check()){
           // user is logged in
            $user_id = Auth::user()->id;
            $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'user_id'=>$user_id])->count();

          }else{
           // user is not logged in
            $user_id = 0;
            $countProducts = Cart::where(['product_id'=>$data['product_id'],'size'=>$data['size'],'session_id'=>$session_id])->count();
          }

          if($countProducts>0){
            return redirect()->back()->with('error_message','Product already exists in Cart!');
          }


          // save product in carts table
          $item = new Cart;
          $item->session_id = $session_id;
          $item->user_id = $user_id;
          $item->product_id = $data['product_id'];
          $item->size = $data['size'];
          $item->quantity = $data['quantity'];
          $item->save();
          return redirect()->back()->with('success_message','Product has been added in Cart! <a href="/cart">View cart</a>');
        }
    }

    public function cart(){
      $getCartItems = Cart::getCartItems();
       //dd($getCartItems);
      return view('front.products.cart')->with(compact('getCartItems'));
    }

    public function cartUpdate(Request $request){
      if($request->ajax()){
        $data = $request->all();
          // echo "<pre>"; print_r($data); die;
        // get cart details
        $cartDetails = Cart::find($data['cartid']);

        // get available product stock
        $availableStock = ProductsAttribute::select('stock')->where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size']])->first()->toArray();

        // echo "<pre>"; print_r($availableStock); die;

         // stock quantity availability
        if($data['qty']>$availableStock['stock']){
          $getCartItems = Cart::getCartItems();
          return response()->json([
            'status'=>false,
            'message'=>'Product stock is not available',
            'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems'))
          ]);
        }

        //check if product size is available
        $availableSize = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'],'size'=>$cartDetails['size'],'status'=>1])->count();
        if($availableSize==0){
          $getCartItems = Cart::getCartItems();
          return response()->json([
            'status'=>false,
            'message'=>'Product size is not available',
            'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems'))
          ]);
        }
        
        //update quantity
        Cart::where('id',$data['cartid'])->update(['quantity'=>$data['qty']]);
        $getCartItems = Cart::getCartItems();
          return response()->json([
            'status'=>true,
            'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems'))
        ]);
      }
    }

    public function cartDelete (Request $request){
      if($request->ajax()){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;
        Cart::where('id',$data['cartid'])->delete();
        $getCartItems = Cart::getCartItems();
          return response()->json([
            'view'=>(String)View::make('front.products.cart_items')->with(compact('getCartItems'))
        ]);
      }
    }

    public function checkout(Request $request){
      
      $deliveryAddresses = DeliveryAddress::deliveryAddresses();
      $getCartItems = Cart::getCartItems();
     // dd($deliveryAddresses);

      if(count($getCartItems)==0){
        $message = "Shopping cart is empty! Please add products to checkout";
        return redirect('cart')->with('error_message',$message);
      }

      if($request->isMethod('post')){
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
         
         //delivery address validation
        if(empty($data['address_id'])){
          $message = "Please select delivery address!";
          return redirect()->back()->with('error_message',$message);
        }

        //payment method validation
        if(empty($data['payment_gateway'])){
          $message = "Please select Payment Method";
          return redirect()->back()->with('error_message',$message);
        }

        // echo "<pre>"; print_r($data); die;

        $deliveryAddress = DeliveryAddress::where('id',$data['address_id'])->first()->toArray();
        // dd($deliveryAddress);

         if($data['payment_gateway']=="COD"){
          $payment_method = "COD";
          $order_status = "New";
        }else{
          $payment_method = "Prepaid";
          $order_status = "Pending";
        }

        DB::beginTransaction();

        //Calculate grand total
        $total_price = 0;
        foreach($getCartItems as $item){
         $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']); 
         $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']);
         
      }

      // calculate shipping charges
      $shipping = 0;
      $shipping = $total_price * 10/100;

      //calculate grand total
      $grand_total = $total_price + $shipping;


     //insert grand total in session variable
      Session::put('grand_total',$grand_total);

      //insert order details
      $order = new Order;
      $order->user_id = Auth::user()->id;
      $order->name = $deliveryAddress['name'];
      $order->address = $deliveryAddress['address'];
      $order->city = $deliveryAddress['city'];
      $order->state = $deliveryAddress['state'];
      $order->country = $deliveryAddress['country'];
      $order->pincode = $deliveryAddress['pincode'];
      $order->mobile = $deliveryAddress['mobile'];
      $order->email = Auth::user()->email;
      $order->shipping = $shipping;
      $order->order_status = $order_status;
      $order->payment_method = $payment_method;
      $order->payment_gateway = $data['payment_gateway'];
      $order->grand_total = $grand_total;
      $order->save();
      $order_id = DB::getPdo()->lastInsertId();

      foreach($getCartItems as $item){
        $cartItem = new OrdersProduct;
        $cartItem->order_id = $order_id;
        $cartItem->user_id = Auth::user()->id;
        $getProductDetails = Product::select('product_code','product_name','product_color','admin_id','vendor_id')->where('id',$item['product_id'])->first()->toArray();
        // 

        $cartItem->admin_id = $getProductDetails['admin_id'];
        $cartItem->vendor_id = $getProductDetails['vendor_id'];
        $cartItem->product_id = $item['product_id'];
        $cartItem->product_code = $getProductDetails['product_code'];
        $cartItem->product_name = $getProductDetails['product_name'];
        $cartItem->product_color = $getProductDetails['product_color'];
        $cartItem->product_size = $item['size'];
        $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
        $cartItem->product_price = $getDiscountAttributePrice['final_price'];
        $cartItem->product_qty = $item['quantity'];
        $cartItem->save();
      }

      //insert order id in session variable
      Session::put('order_id',$order_id);

      DB::commit();

       $orderDetails = Order::with('orders_products')->where('id',$order_id)->first()->toArray();

       if($data['payment_gateway']=="COD"){
           
           //send order email
          $email = Auth::user()->email;
          $messageData = [
             'email' =>$email,
             'name' => Auth::user()->name,
             'order_id' => $order_id,
             'orderDetails' => $orderDetails
          ];
          Mail::send('emails.order',$messageData,function($message)use($email){
            $message->to($email)->subject('Order Placed - Cleeka.com');
          });

        }if($data['payment_gateway']=="Paypal"){
           //redirect user to paypal page after saving order
          return redirect('/paypal');
        }else{
          echo "Prepaid payment methods ";
        }
          
    
      return redirect('thanks');
    }

     
      return view('front.products.checkout')->with(compact('deliveryAddresses','getCartItems'));
    }

    public function thanks(){
      if(Session::has('order_id')){
        //empty the cart
        Cart::where('user_id',Auth::user()->id)->delete();
        return view('front.products.thanks');
      }else{
        return redirect('cart');
      }
   }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\OrderItemStatus;
use App\Models\OrdersProduct;
use App\Models\User;
use Session;
use Auth;

class OrderController extends Controller
{   
	public function orders(){
		Session::put('page','orders');
		$adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        if($adminType=="vendor"){
        $vendorStatus = Auth::guard('admin')->user()->status;
        if($vendorStatus==0){
          return redirect("admin/update-vendor-details/personal")->with('error_message','Your vendor account is not approved yet. Please make sure you fill in all your Personal, business and bank details');
          }
        }
        if($adminType=="vendor"){
           $orders = Order::where('vendor_id',$vendor_id)->get()->toArray();
        }else{
        	$orders = Order::orderBy('id','desc')->get()->toArray();
        }

		
        // dd($orders);
        return view('admin.orders.orders')->with(compact('orders'));
	}

    public function orderDetails($id){
        Session::put('page','orders');
        $adminType = Auth::guard('admin')->user()->type;
        $vendor_id = Auth::guard('admin')->user()->vendor_id;
        if($adminType=="vendor"){
        $vendorStatus = Auth::guard('admin')->user()->status;
        if($vendorStatus==0){
          return redirect("admin/update-vendor-details/personal")->with('error_message','Your vendor account is not approved yet. Please make sure you fill in all your Personal, business and bank details');
          }
        }

        if($adminType=="vendor"){
          $orderDetails = Order::where('vendor_id',$vendor_id)->where('id',$id)->first()->toArray();
         }else{
         $orderDetails = Order::where('id',$id)->first()->toArray();
        }

       
        $userDetails = User::where('id',$orderDetails['user_id'])->first()->toArray();
        $orderStatuses = OrderStatus::where('status',1)->get()->toArray();
        $orderItemStatuses = OrderItemStatus::where('status',1)->get()->toArray();
        return view('admin.orders.order_details')->with(compact('orderDetails','userDetails','orderStatuses','orderItemStatuses'));
    }

    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // update order status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);
            $message = "Order Status has been updated successefully!";
            return redirect()->back()->with('success_message',$message);
        }
    } 

     public function updateOrderItemStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // update order status
            OrdersProduct::where('id',$data['order_item_id'])->update(['item_status'=>$data['order_item_status']]);
            $message = "Order Item Status has been updated successefully!";
            return redirect()->back()->with('success_message',$message);
        }
    } 
}

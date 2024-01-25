<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Notifications\OrderPlaced;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Vendor;
use Auth;

class OrderController extends Controller
{
    
   public function index()
    {
        $orders = Order::all();
        return response()->json(['data' => $orders], 200);
    } 
    
    public function showUserOrders($userId)
    {
        $user = User::findOrFail($userId);

        // Fetch orders for the user
        $orders = $user->orders;

        return response()->json(['orders' => $orders]);
    }
    
    
   public function order(Request $request)
    {
       

        $orders = new Order ([
            
            'user_id' => $request->input('user_id'),
            'vendor_id' => $request->input('vendor_id'),
            'username' => $request->input('username'),
            'vendor_name' => $request->input('vendor_name'),
            'address' => $request->input('address'),
            'dish_id' => $request->input('dish_id'),
            'dish_name' => $request->input('dish_name'),
            'dish_qty' => $request->input('dish_qty'),
            'dish_price' => $request->input('dish_price'),
            'dish_image' => $request->input('dish_image'),
            'day' => $request->input('day'),
            'cancel_time' => $request->input('cancel_time'),
            'delivery_fee' => $request->input('delivery_fee'),
            'service_fee' => $request->input('service_fee'),
            'payment_method' => $request->input('payment_method'),
            'subtotal' => $request->input('subtotal'),
            // 'grand_total' => $request->input('grand_total'),
            
        ]);
        
        // // Get the vendor's email (replace this with your actual logic)
        //   $vendorEmail = Vendor::find($vendorId)->email;

        //  // Send email to the vendor
        //  Mail::to($vendorEmail)->send(new OrderPlaced($orders)); 

        $orders->save();

        return response()->json($orders);
    }
    
    public function canCancelOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order->isCancellationTimePassed()) {
            
            return response()->json(['can_cancel' => false, 'message' => 'Cancellation time has passed.']);
        } else {
            
            return response()->json(['can_cancel' => true, 'message' => 'You can cancel the order']);
        }
    }
    
    
    public function updateOrderStatus($orderId, $newStatus)
    {
        try {
            // Find the order by ID
            $order = Order::findOrFail($orderId);

            // Update the order status
            $order->update(['order_status' => $newStatus]);

            return response()->json(['message' => 'Order status updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating order status: ' . $e->getMessage()], 500);
        }
    }
    
    
    	
}

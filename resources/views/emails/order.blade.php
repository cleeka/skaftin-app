<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width:700px;">
		<tr><td>&nbsp;</td></tr>
		<tr><td><img src="{{ asset('front/assets/img/logo.png') }}"></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Hello {{$name}}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Thank you for Ordering Food with Skaftin. Please check your order details:</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Order No. {{$order_id}}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>
			<table style="width:95%" cellpadding="5" cellspacing="5" bgcolor="#f7f47f4">
				<tr bgcolor="#cccccc">
					<td>Product Name</td>
					<td>Product Code</td>
					<td>Product Size</td>
					<td>Product Color</td>
					<td>Product Quantity</td>
					<td>Product Price</td>
				</tr>
				@foreach($orderDetails['orders_products'] as $order)
				<tr bgcolor="#cccccc">
					<td>{{ $order['product_name'] }}</td>
					<td>{{ $order['product_code'] }}</td>
					<td>{{ $order['product_size'] }}</td>
					<td>{{ $order['product_color'] }}</td>
					<td>{{ $order['product_qty'] }}</td>
					<td>{{ $order['product_price'] }}</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="5" align="right">Grand Total</td>
					<td>R {{ $orderDetails['grand_total'] }}</td>
				</tr>
				
			</table>
		</td></tr>
	</table>

</body>
</html>
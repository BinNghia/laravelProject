<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xác nhận đơn hàng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding:15px;">
		<div class="col-md-12" >

			<p style="text-align: center;color: #fff">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
			<div class="row" style="background: cadetblue;padding: 15px">

				
				<div class="col-md-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px">
					<h4 style="margin:0">CÔNG TY BÁN HÀNG AHT</h4>
					<h6 style="margin:0">DỊCH VỤ BÁN HÀNG - VẬN CHUYỂN - NHẬP KHẨU CHUYÊN NGHIỆP</h5>
				</div>

				<div class="col-md-6 logo"  style="color: #fff">
					<p>Chào bạn <strong style="color: #000;text-decoration: underline;">{{$full_name}}</strong></p>
				</div>
				
				<div class="col-md-12">
					<p style="color:#fff;font-size: 17px;">Bạn hoặc một ai đó đã đăng ký dịch vụ tại Shop của chúng tôi </p>
					
					<h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>

					<p>Email: 
						{{$email}}
					</p>
					<p>Họ và tên người nhận: 
						{{$full_name}}
					</p>
					<p>Địa chỉ nhận hàng: 
						{{$address}}
					</p>	
					<p>Số điện thoại: 
						{{$phone_number}}
					</p>	
					<p>Ghi chú đơn hàng: 
						{{$note}}
					</p>
					<p>Hình thức thanh toán : <strong style="text-transform: uppercase;color:#fff">Thanh toán khi nhận hàng
					</strong></p>
					<p style="color:#fff">Nếu thông tin người nhận hàng không có chúng tôi sẽ liên hệ với người đặt hàng để trao đổi thông tin về đơn hàng đã đặt.</p>

					<h4 style="color: #000;text-transform: uppercase;">Sản phẩm đã đặt</h4>
					<table border="1" cellpadding="10" cellspacing="0" width="400">
						<thead>
							<tr>
								<th>STT</th>
								<th>Sản phẩm</th>
								<th>Giá tiền</th>
								<th>Số lượng đặt</th>
								<th>Thành tiền</th>

							</tr>
						</thead>

						<tbody>
							<?php $n=1; ?>
							@if(Session::has('cart'))
							@foreach($product_cart as $cart)
							<tr>
								<td>{{$n}}</td>
								<td>{{$cart['item']['name']}}</td>
								<td>${{$cart['price']}}.00</td>
								<td>{{$cart['qty']}}</td>
								<td>${{$cart['price']/$cart['qty']}}.00</td>
							</tr>
							<?php $n++; ?>
							@endforeach
							@endif
							<tr>
								<td colspan="4" align="right">Tổng tiền: @if(Session::has('cart'))${{$totalPrice}}.00 @else 0 @endif</td>
							</tr>

						</tbody>
					</table>
				</div>

				<p style="color:#fff">Mọi chi tiết xin liên hệ website tại: <a target="_blank" href="#">Shop</a>, hoặc liên hệ qua số hotline: 19001000.<br>
				Xin cảm ơn quý khách đã đặt hàng Shop của chúng tôi.</p>

			</div>
		</div>
	</div>
</body>
</html>
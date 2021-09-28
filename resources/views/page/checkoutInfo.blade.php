@extends('redirect')

@section('content')
<div class="container" style="transform: translateY(150px);">
	<div class="pull-left">
		<h6 class="inner-title">Checkout</h6>
	</div>
	<div class="pull-right">
		<div class="beta-breadcrumb">
			<a href="trangchu">Home</a> / <span>Checkout</span>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<div class="container" style="transform: translateY(150px); margin-bottom: 150px;">
	<div id="content">
		@if(session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
        @endif
		<form action="checkoutInfo" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="row">
				<div class="col-sm-6">
					<!-- <h4></h4> -->
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="full_name">Fullname*</label>
						<input type="text" id="full_name" name="full_name" required>
					</div>

					<div class="form-block">
						<label for="name">Username*</label>
						<input type="text" id="name" name="name" placeholder="Username" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="address">Address*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" required>
					</div>
					
					<div class="form-block">
						<label for="phone_number">Phone*</label>
						<input type="text" id="phone_number" name="phone_number" required>
					</div>

					<div class="form-block">
                        <label>Date of Birth*</label>
                        <input name="birth" placeholder="Ngày sinh" type="date" required>
                    </div>

                    <div class="form-block">
                        <label>Gender*</label>
                        <input type="radio" class="input-radio" id="gender" name="gender" value="0" checked style="width: 10%;"><span style="margin-right: 10%;">Nam</span>
						<input type="radio" class="input-radio" id="gender" name="gender" value="1" style="width: 10%;"><span>Nữ</span>
                    </div>

                    <!-- <div class="form-block">
                        <label>Quyền người dùng*</label>
                        <input type="radio" class="input-radio" id="idGroup" name="idGroup" checked="" value="0" readonly style="width: 10%;"><span style="margin-right: 10%;">Người dùng</span>
                    </div> -->

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" placeholder="example@gmail.com" value="{{old('email')}}" >
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" required>
					</div>

					<div class="form-block">
						<label>Re password*</label>
						<input type="Password" name="passwordAgain" placeholder="Repeat password" required>
						@if ($errors->has('passwordAgain'))
                            <div class="alert alert-danger">{{ $errors->first('passwordAgain') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="note">Note</label>
						<textarea id="note" name="note"></textarea>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Your Order</h5></div>
						<div class="your-order-body">
							<div class="your-order-item">
								<div>
								@if(Session::has('cart'))
								@foreach($product_cart as $cart)
									<div class="media">
										<img src="assets/img/{{$cart['item']['image']}}" alt="" class="pull-left" style="width: 20%;">
										<div class="media-body">
											<p class="font-large">{{$cart['item']['name']}}</p>
											<span class="color-gray your-order-info">Quantity: {{$cart['qty']}}</span>
											<span class="color-gray your-order-info">Price: ${{$cart['price']/$cart['qty']}}.00</span>
										</div>
									</div>
								@endforeach
								@endif
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="your-order-item">
								<div class="pull-left"><p class="your-order-f18">Total:</p></div>
								<div class="pull-right"><h5 class="color-black">@if(Session::has('cart'))${{$totalPrice}}.00 @else 0 @endif</h5></div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="your-order-head"><h5>Mode of payment</h5></div>
						
						<div class="your-order-body">
							<ul class="payment_methods methods">
								<li class="payment_method_bacs">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="CDO" checked data-order_button_text="">
									<label for="payment_method_bacs">Cash On Delivery</label>
									<div class="payment_box payment_method_bacs" style="display: block;">Khách hàng sẽ thanh toán hóa đơn khi Shipper giao hàng đến
									</div>						
								</li>

								<!-- <li class="payment_method_cheque">
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản</label>
									<div class="payment_box payment_method_cheque" style="display: block;">
										Chủ tài khoản: ABC
									</div>						
								</li> -->
								<li  id="paypal-button"></li>
							</ul>
						</div>

						<div class="text-center"><button type="submit" class="beta-btn primary" href="#">Checkout <i class="fa fa-chevron-right"></i></button></div>
					</div>
				</div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection
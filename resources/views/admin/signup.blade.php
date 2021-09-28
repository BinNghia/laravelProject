<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>Admin - LinhTVK</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div id="page-wrapper" style="background-color: #fff;">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-lg-12">
	                <h1 class="page-header">SignUp
	                </h1>
	            </div>
	            <!-- /.col-lg-12 -->
	            {{-- Handle Show Message Success --}}
	            @if(session('thongbao'))
	                <div class="alert alert-success">{{session('thongbao')}}</div>
	            @endif

	            {{-- Form Input Create new user --}}
	            <div class="col-lg-7" style="padding-bottom:120px">
	                <form action="" method="POST">
	                    {{-- Token --}}
	                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>

	                    <div class="form-group">
	                        <label>Full name*</label>
	                        <input class="form-control" name="full_name" placeholder="Full name" />
	                    </div>
	                    
	                    {{-- User name --}}
	                    <div class="form-group">
	                        <label>Username*</label>
	                        <input class="form-control" name="name" placeholder="Username" value="{{old('Username')}}"/>
	                        @if ($errors->has('name'))
	                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
	                        @endif
	                    </div>

	                    <div class="form-group">
	                        <label>Password*</label>
	                        <input class="form-control" type="password" name="password" placeholder="Password" />
	                    </div>

	                    <div class="form-group">
	                        <label>Re password*</label>
	                        <input class="form-control" type="Password" name="passwordAgain" placeholder="Confirm" />
	                        @if ($errors->has('passwordAgain'))
                            	<div class="alert alert-danger">{{ $errors->first('passwordAgain') }}</div>
                       		@endif
	                    </div>

	                    {{-- Email --}}
	                    <div class="form-group">
	                        <label>Email</label>
	                        <input class="form-control" name="email" placeholder="example@gmail.com" value="{{old('email')}}" />
	                        @if ($errors->has('email'))
	                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
	                        @endif
	                    </div>

	                    <div class="form-group">
	                        <label>Address</label>
	                        <input class="form-control" name="address" placeholder="Address" />
	                    </div>

	                    <div class="form-group">
	                        <label>Phone number</label>
	                        <input class="form-control" name="phone_number" placeholder="Phone number" />
	                    </div>

	                    <div class="form-group">
	                        <label>Date of Birth</label>
	                        <input class="form-control" name="birth" placeholder="mm/dd/yyyy" type="date" />
	                    </div>

	                    <div class="form-group">
	                        <label>Gender</label><br>
	                        <label class="radio-inline">
	                            <input name="gender" value="0" checked="" type="radio">Male
	                        </label>
	                        <label class="radio-inline">
	                            <input name="gender" value="1" type="radio">Female
	                        </label>
	                    </div>

	                    <!-- {{-- User role --}}
	                    <div class="form-group">
	                        <label>Quyền người dùng</label><br>
	                        <label class="radio-inline">
	                            <input name="idGroup" value="1" checked="" type="radio"> Admin
	                        </label>
	                    </div> -->

	                    <div class="form-group">
	                        <label>Note</label>
	                        <input class="form-control" name="note" placeholder="Note" />
	                    </div>

	                    {{-- Submit --}}
	                    <button type="submit" class="btn btn-default">Register</button>
	                    <button type="reset" class="btn btn-default">Reset</button>
	                </form>
	            </div>
	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper --> 
</boddy>
 
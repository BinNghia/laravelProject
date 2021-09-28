@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$users->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <!-- @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif -->

                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                <form action="admin/users/edit/{{$users -> id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    
                    <div class="form-group">
                        <label>Full name</label>
                        <input class="form-control" name="full_name" placeholder="Full name" value="{{$users->full_name}}" />
                    </div>

                    {{-- User name --}}
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="name" placeholder="Username" value="{{$users->name}}"/>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="changePassword" name="changePassword">
                        <label>Password</label>
                        <input class="form-control password" type="password" name="password" placeholder="Enter Password" disabled />
                    </div>

                    <div class="form-group">
                        <label>Re password</label>
                        <input class="form-control password" type="password" name="passwordAgain" placeholder="Confirm" disabled />
                        @if ($errors->has('passwordAgain'))
                            <div class="alert alert-danger">{{ $errors->first('passwordAgain') }}</div>
                        @endif
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="example@gmail.com" readonly="" value="{{$users->email}}" />
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input class="form-control" name="address" placeholder="Address" value="{{$users->address}}" />
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input class="form-control" name="phone_number" placeholder="Phone number" value="{{$users->phone_number}}" />
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" name="birth" placeholder="mm/dd/yyyy" type="date" value="{{$users->birth}}" />
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
                        <input class="form-control" name="note" placeholder="Note" value="{{$users->note}}" />
                    </div>

                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper --> 
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>

@endsection
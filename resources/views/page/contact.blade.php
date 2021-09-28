@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contact</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="trangchu">Home</a> / <span>Contact</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container" style="transform: translateY(150px); margin-bottom: 200px;">
    <form action="" method="POST" role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-group">
            <label>Full name</label>
            <input type="text" name="full_name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label>Phone number</label>
            <input type="text" name="phone_number" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
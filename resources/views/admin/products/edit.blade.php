@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif

                {{-- Thêm encript để gửi file --}}
                <form action="admin/products/edit/{{$products->id}}" method="POST" enctype="multipart/form-data">
                    {{-- Thêm token để gửi tới server --}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Name" value="{{$products->name}}" />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" placeholder="Description" value="{{$products->description}}" />
                    </div>

                    <div class="form-group">
                        <label>Unit Price</label>
                        <input class="form-control" name="unit_price" placeholder="Unit Price" value="{{$products->unit_price}}" />
                    </div>

                    <div class="form-group">
                        <label>Promotion Price</label>
                        <input class="form-control" name="promotion_price" placeholder="Promotion Price" value="{{$products->promotion_price}}" />
                    </div>

                    <div class="form-group">
                        <label>Image</label><br>
                         <img width="270px" src="assets/img/{{$products->image}}"/> <br>
                        <input type="file" name="image" id="uploadImage">
                    </div>

                    <div class="form-group">
                        <label>New Product</label>
                        <input class="form-control" name="new" value="{{$products->new}}" />
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
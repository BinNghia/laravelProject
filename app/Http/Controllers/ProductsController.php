<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Products;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    //
    public function getIndex()
    {
        $products = Products::all();

        return view('admin.products.list', ['products' => $products]);
    }

    public function getEdit($id)
    {
        $products = Products::Find($id);

        return view('admin.products.edit', ['products' => $products]);
    }

    public function postEdit(ProductsRequest $request, $id)
    {
        $products = Products::Find($id);
        
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                // return redirect('admin/tintuc/them')->with('loi', 'Chỉ được chọn file jpg, png, jpeg'); 
                return redirect()->back()->with('Error', 'Only jpg, png, jpeg files can be selected');
            }

            $name = $file->getClientOriginalName();
            $file->move("assets/img",$name);
            $products->image = $name;
        } else {
            $products->image = "";
        }
        $products->new = $request->new;
        $products->save();

        return redirect('admin/products/edit/'.$id)->with('thongbao', 'Edit successfully');

    }

    public function getAdd()
    {

        return view('admin.products.add');
    }

    public function postAdd(ProductsRequest $request) {
        
        $products = new Products;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->unit_price = $request->unit_price;
        $products->promotion_price = $request->promotion_price;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                
                return redirect()->back()->with('Error', 'Only jpg, png, jpeg files can be selected');
            }

            $name = $file->getClientOriginalName();
            $tenhinh = str_random()."_".$name;
            while(file_exists("assets/img/".$tenhinh)) {
                $tenhinh = str_random()."_".$name;
            }
            $file->move("assets/img",$tenhinh);
            $products->image = $tenhinh;
        } else {
            $products->image = "";
        }
        $products->new = $request->new;
        $products->save();
        
        return redirect('admin/products/add')->with('thongbao', 'Add successfully');
    }

    public function getDelete($id) {
        $products = Products::find($id);
        $products->bill_detail()->delete();
        $products->delete();
        
        return redirect('admin/products/list')->with('thongbao', 'Delete successfully');
    }
}

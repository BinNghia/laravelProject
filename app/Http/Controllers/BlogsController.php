<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Blogs;
use App\Http\Requests\BlogsRequest;

class BlogsController extends Controller
{
    //
    public function getIndex()
    {
        $blogs = Blogs::all();

        return view('admin.blogs.list', ['blogs' => $blogs]);
    }

    public function getEdit($id)
    {
        $blogs = Blogs::Find($id);

        return view('admin.blogs.edit', ['blogs' => $blogs]);
    }

    public function postEdit(BlogsRequest $request, $id)
    {
        $blogs = Blogs::Find($id);

        if($request->hasFile('urlHinh')){
            $file = $request->file('urlHinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != "jpeg")
            {
                
                return redirect()->back()->with('Error', 'Only jpg, png, jpeg files can be selected');
            }

            $name = $file->getClientOriginalName();
            $file->move("assets/img",$name);
            $blogs->urlHinh = $name;
        } else {
            $blogs->urlHinh = "";
        }
        $blogs->description = $request->description;
        $blogs->views = $request->views;
        $blogs->likes = $request->likes;
        $blogs->save();

        return redirect('admin/blogs/edit/'.$id)->with('thongbao', 'Edit successfully');
    }

    public function getAdd()
    {

        return view('admin.blogs.add');
    }

    public function postAdd(BlogsRequest $request) {
        
        $blogs = new Blogs;
        if($request->hasFile('urlHinh')){
            $file = $request->file('urlHinh');
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
            $blogs->urlHinh = $tenhinh;
        } else {
            $blogs->urlHinh = "";
        }
        $blogs->description = $request->description;
        $blogs->views = $request->views;
        $blogs->likes = $request->likes;
        $blogs->save();

        return redirect('admin/blogs/add')->with('thongbao', 'Add successfully');
    }

    public function getDelete($id) {
        $blogs = Blogs::find($id);
        $blogs->delete();

        return redirect('admin/blogs/list')->with('thongbao', 'Delete successfully');
    }
}

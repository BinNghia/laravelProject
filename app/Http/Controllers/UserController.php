<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;

use App\Http\Requests;
use App\User;
use App\Products;
use App\BillDetail;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public function getIndex()
    {
        $users = User::all();

        return view('admin.users.list', ['users' => $users]);
    }

    public function getDashboard()
    {
        $products = Products::all();
        $bill_detail = BillDetail::all();
        $users = User::where('idGroup',1)->get();
        $customers = User::where('idGroup',0)->get();

        return view('admin.dashboard', ['products' => $products, 'bill_detail' => $bill_detail, 'users' => $users, 'customers' => $users]);
    }

    public function getLoginAdmin() 
    {

        return view('admin.login');
    }

    public function postLoginAdmin(UserRequest $request) 
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password, 'idGroup' => 1 ])) 
        {

            return redirect('admin/dashboard');
        }
        
        return redirect()->back()->withInput()->with('thongbao', 'Login failed');
        
    }
    public function getLogout() 
    {
        Auth::logout();

        return redirect('admin/login');
    }

    public function getSignUpAdmin() 
    {

        return view('admin.signup');
    }

    public function postSignUpAdmin(Request $request) 
    {

        $user = new User;
        $user->full_name = $request->full_name;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->birth = $request->birth;
        $user->gender = $request->gender;
        $user->idGroup = 1;
        $user->note = $request->note;
        $user->save();

        return redirect('admin/login')->with('thongbao', 'Sign Up Success');
    }

    public function getEdit($id)
    {
        $users = User::Find($id);

        return view('admin.users.edit', ['users' => $users]);
    }

    public function postEdit(Request $request, $id)
    {
        $users = User::Find($id);
        $users->full_name = $request->full_name;
        $users->name = $request->name;
        
        if($request->changePassword == "on"){
            
            $users->password = bcrypt($request->password);
        }

        $users->email = $request->email;
        $users->address = $request->address;
        $users->phone_number = $request->phone_number;
        $users->birth = $request->birth;
        $users->gender = $request->gender;
        $users->idGroup = $request->idGroup;
        $users->note = $request->note;
        $users->save();
        
        return redirect('admin/users/edit/'.$id)->with('thongbao', 'Edit successfully');

    }

    public function getDetete($id) 
    {
        $users = User::find($id);
        $users->bill_detail()->delete();
        $users->bills()->delete();
        $users->delete();

        return redirect('admin/users/list')->with('thongbao', 'Delete successfully');
    }
}

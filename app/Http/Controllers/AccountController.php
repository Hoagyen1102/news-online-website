<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use App\Models\Journalist;

class AccountController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view ('login', ['category'=>$category]);
    }
    public function checklogin(Request $request)
    {
        $category = Category::all();
        $email = $request->get('email');
        $password = $request->get('password');

        $user = User::where('Email', $email)->first();
        $admin = Admin::where('Email', $email)->first();
        $journalist = Journalist::where('Email', $email)->first();

        if ($user && Hash::check($password, $user->Password)) {
            session(['account' => $user,'role' => 'user']);
        } elseif($admin && Hash::check($password, $admin->Password)){
            session(['account' => $admin,'role' => 'admin']);
        } elseif($journalist && Hash::check($password, $journalist->Password)){
            session(['account' => $journalist,'role' => 'journalist']);
        } else{
            return redirect('/login')->with('error', 'Thông tin đăng nhập không chính xác');
        }
        return redirect('/index');
    }
    public function signup()
    {
        $category = Category::all();
        return view ('signup', ['category'=>$category]);
    }
    public function checksignup(Request $request)
    {
        $category = Category::all();
        $user = new User;
        $checkuserbyemail = User::where('Email', $request->get('email'))->get();
        $count = $checkuserbyemail->count();
        if ($count > 0) {
            return redirect('/signup')->with('alert', 'Email đã được sử dụng!');
        } else {
            $user->Email = $request->get('email');
            $user->Password = bcrypt($request->get('password'));
            $user->Fullname = $request->get('fullname');
            $user->Image = $request->get('image');
            $user->PhoneNumber = $request->get('phonenumber');
            $user->save();
            return view ('login', ['category'=>$category]);
        }
    }
    public function logout()
    {
        session()->forget('account');
        session()->forget('role');
        $category = Category::all();
        return view ('login', ['category'=>$category]);
    }
    public function profile($id)
    {
        $category = Category::all();
        $image = session('account')->Image;
        return view ('profile', ['category'=>$category,'image'=>$image]);
    }
    public function editprofile()
    {
        $category = Category::all();
        return view ('editprofile', ['category'=>$category]);
    }
    public function notnull($account, $request) {
        if($request->get('email')) $account->Email = $request->get('email');
        if($request->get('password')) $account->Password = bcrypt($request->get('password'));
        if($request->get('fullname')) $account->Fullname = $request->get('fullname');
        if($request->get('image')) $account->Image = $request->get('image');
        if($request->get('phonenumber')) $account->PhoneNumber = $request->get('phonenumber');
        $account->save();
        session(['account' => $account]);
    }
    public function checkeditprofile(Request $request)
    {
        if(session('role')=="user")
        {
            $user = User::where('Email', session('account')->Email)->first();
            $this->notnull($user, $request);
        }elseif(session('role')=="admin"){
            $admin = Admin::where('Email', session('account')->Email)->first();
            $this->notnull($admin, $request);
        }else{
            $journalist = Journalist::where('Email', session('account')->Email)->first();
            $this->notnull($journalist, $request);
        }
        return redirect('/profile/'.session('account')->_id);
    }
    public function listjournalist()
    {
        $list = Journalist::orderBy('_id', 'asc')->get();
        $category = Category::all();
        return view ('listjournalist', ['list'=>$list,'category'=>$category]);
    }
    public function listuser()
    {
        $list = User::orderBy('_id', 'asc')->get();
        $category = Category::all();
        return view ('listuser', ['list'=>$list,'category'=>$category]);
    }
    public function deletejournalist($id)
    {
        $journalist = Journalist::where('_id', $id)->first();
        $journalist->delete();
        return redirect()->back();
    }
    public function deleteuser($id)
    {
        $user = User::where('_id', $id)->first();
        $user->delete();
        return redirect()->back();
    }
    public function upuser($id)
    {
        $user = User::where('_id', $id)->first();
        $journalist =  new Journalist([
            'Email' => $user->Email,
            'Password' => $user->Password,
            'Fullname' => $user->Fullname,
            'Image' => $user->Image,
            'PhoneNumber' => $user->PhoneNumber
        ]);
        $journalist->save();
        $user->delete();
        return redirect()->back();
    }
}

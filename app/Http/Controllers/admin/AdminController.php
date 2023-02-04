<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

use App\Models\Product;
use App\Models\Order;
use App\Models\News;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
  public function Authlogin(){
    $admin_id = Session::get('admin_id');
    if($admin_id){
        return Redirect::to('page_admin.dasboard');
    }else{
      return Redirect::to('admin/login')->send();
    }
  } 
      public function index(){
        $this->Authlogin();
        $customerAll = User::all()->count();
        $orderAll = Order::all()->count();
        $productAll = Product::all()->count();
        $blogAll = News::all()->count();
      return view('admin_layout')->with(compact('customerAll','orderAll','productAll','blogAll'));
      }
      public function login()
      {
        return view('page_admin.dasboard');
      }
      public function xuly(Request $request){
        $data = $request->validate([
          'name' => 'required|max:255',
          'password' => 'required|min:6|max:255',
      ],
      [
          'name.required' => 'Username bạn phải điền!',
          'password.required' => 'Password bạn phải điền!',
          'password.min' => 'Mật khẩu phải lớn hơn hoặc bằng 6 kí tự',
      ]
  );
      $role = 'admin';
      $name= $data['name'];
      $password= md5($data['password']);
      $admin= User::where('name',$name)->where('password',$password)->where('role',$role)->where('status','1')->first();
      if($admin){
       
          Session::put('name',$admin->name );
          Session::put('id',$admin->id );
          return view('admin_layout');
      }else{
          return redirect()->back()->with('dasboard','Bạn đăng nhập không thành công.Xin vui lòng xem lại username và mật khẩu của bạn!^^');;
      }
   }
   public function logout(Request $request)
   {
     Session::put('name',null);
     Session::put('id',null);
     return Redirect::to('/admin/login');
   }
}
<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News_Category;
use App\Models\Banner;
use App\Models\Order;
use App\Models\OrderDetails;
use Session;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function index(){
        $category = Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $product = Product::orderBy('product_id','DESC')->where('product_active','1')->limit(4)->get();
        $producthot = Product::all()->random(4);
        $productview = Product::orderBy('product_view','DESC')->where('product_active','1')->limit(4)->get();
        // $productAll2 = Product::all()->random(4)->count('product_id');
        $order = OrderDetails::orderBy('product_quanlity','DESC')->take(4)->get();
        return view('page_user.home')->with(compact('category','product','producthot','categorynews','banner','order','productview'));
    }
    public function login()
    {
        // $category = Category::all();
        // $product = Product::orderBy('product_id','DESC')->where('product_active','1')->take(10)->get();
      return view('page_user.user_login.user_login');
    }
    public function xuly_user(Request $request)
    {
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
       
        $name= $data['name'];
        $password= md5($data['password']);
        $admin= User::where('name',$name)->where('password',$password)->where('status','1')->first();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $product =  Product::orderBy('product_id','DESC')->where('product_active','1')->limit(4)->get();
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $producthot = Product::all()->random(4);
        $order = OrderDetails::orderBy('product_quanlity','DESC')->take(4)->get();
        $productview = Product::orderBy('product_view','DESC')->where('product_active','1')->limit(4)->get();
        // $productAll2=Product::count('product_id');
        if($admin){
         
            Session::put('name',$admin->name );
            Session::put('id',$admin->id );
            return view('page_user.home')->with(compact('category','product','producthot','categorynews','banner','order','productview'));
        }else{
            return redirect()->back()->with('user_login','Bạn đăng nhập không thành công.Xin vui lòng xem lại username và mật khẩu của bạn hoặc tài khoản đã bị tắt');
        }
    }

    public function register()
    {
      return view('page_user.register.register');
    }
    public function xuly_register(Request $request)
    {
    
        $data = $request->validate(
            [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10',
            'address' => 'required',
            'image' => 'required',
            ],
            [
                'email.unique' => 'Email đã có xin điền email khác',
                'name.required' => 'Tên của bạn phải có',
                'password.required' => 'Password phải có',
                'phone.required' => 'Số điện thoại phải có',
                'address.required' => 'Địa chỉ phải có',
                'image.required' => 'Ảnh phải có',
            ]
        );
        
        $khachhang = new User();

        $khachhang->name = $data['name'];
        $khachhang->password = md5($data['password']);
        $khachhang->email = $data['email'];
        $khachhang->phone = $data['phone'];
        $khachhang->address = $data['address'];
        $khachhang->image = $data['image'];
        $khachhang->status = 1;
        $khachhang->role = 'user';
        $khachhang->save();
        Session::put('name',$khachhang->name );
        Session::put('id',$khachhang->id );
        return Redirect::to('/');
    }
    public function user_logout()
    {
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/');
    }

   public function search(Request $request){
    $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
    $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
    $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
    $keyword = $request->keyword;
    $search_product = Product::orderBy('product_price','ASC')->where('product_name','like','%'.$keyword.'%')->Orwhere('product_price','like','%'.$keyword.'%')->get();
    return view('page_user.product.search')->with(compact('category','search_product','categorynews','banner','keyword'));
   }
}

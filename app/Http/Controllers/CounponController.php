<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\Banner;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
class CounponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerAll = User::all()->count();
        $orderAll = Order::all()->count();
        $productAll = Product::all()->count();
        $blogAll = News::all()->count();
        $coupon = Coupon::orderBy('coupon_id','ASC')->get();
        return view('page_admin.coupon.index')->with(compact('coupon','customerAll','orderAll','productAll','blogAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'coupon_name' => 'required|unique:coupon|max:255',
                'coupon_number' => 'required',
                
                'coupon_condition' => 'required',
                'coupon_time' => 'required',
                'coupon_code' => 'required',
                'coupon_date_start' => 'required',
                'coupon_date_end' => 'required',
                ],
                [
                    'coupon_name.required' => 'Phải có tên mã',
                    'coupon_number.required' => 'Phải có đường số mã giảm giá',
                    'coupon_condition.required' => 'Phải có điều kiện',
                    'coupon_time.required' => 'Phải có thời gian giảm giá',
                    'coupon_code.required' => 'Phải có mã giảm giá',
                    'coupon_date_start.required' => 'Phải có ngày bắt đầu giảm giá',
                    'coupon_date_end.required' => 'Phải có ngày kết thúc giảm giá',
                ],
        );

        
         $coupon = new Coupon();
         $coupon->coupon_name = $data['coupon_name'];
         $coupon->coupon_number = $data['coupon_number'];
         $coupon->coupon_condition = $data['coupon_condition'];
         $coupon->coupon_time = $data['coupon_time'];
         $coupon->coupon_code = $data['coupon_code'];
         $coupon->coupon_date_start = $data['coupon_date_start'];
         $coupon->coupon_date_end = $data['coupon_date_end'];
         $coupon->save();
         return redirect()->back()->with('status','Thêm mã thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuccoupon = Coupon::all();
        $danhmuc = Coupon::find($id);
        return view('page_admin.coupon.edit')->with(compact('danhmuc','danhmuccoupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'coupon_name' => 'required',
                'coupon_number' => 'required',
                
                'coupon_condition' => 'required',
                'coupon_time' => 'required',
                'coupon_code' => 'required',
                'coupon_date_start' => 'required',
                'coupon_date_end' => 'required',
                ],
                [
                    'coupon_name.required' => 'Phải có tên mã',
                    'coupon_number.required' => 'Phải có đường số mã giảm giá',
                    'coupon_condition.required' => 'Phải có điều kiện',
                    'coupon_time.required' => 'Phải có thời gian giảm giá',
                    'coupon_code.required' => 'Phải có mã giảm giá',
                    'coupon_date_start.required' => 'Phải có ngày bắt đầu giảm giá',
                    'coupon_date_end.required' => 'Phải có ngày kết thúc giảm giá',
                ],
        );

        
        $danhmuccoupon = Coupon::find($id);
        $danhmuccoupon->coupon_name = $data['coupon_name'];
        $danhmuccoupon->coupon_number = $data['coupon_number'];
        $danhmuccoupon->coupon_condition = $data['coupon_condition'];
        $danhmuccoupon->coupon_time = $data['coupon_time'];
        $danhmuccoupon->coupon_code = $data['coupon_code'];
        $danhmuccoupon->coupon_date_start = $data['coupon_date_start'];
        $danhmuccoupon->coupon_date_end = $data['coupon_date_end'];
        $danhmuccoupon->save();
         return redirect()->back()->with('status','Cập nhậ thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::find($id)->delete();
        return redirect()->back()->with('message','Xóa mã thành công!');
    }

    ///////////////////////////////ket thuc admin
    public function unset_coupon()
    {
        $coupon = session()->get('coupon');
        if($coupon == true){
            session()->forget('coupon');
            return redirect()->back()->with('message','Xóa mã giảm giá thành công');
        }else{
            return redirect()->back()->with('error','Không có mã để xóa.Hihi');
        }
    }


    
    public function show_promotion()
    {
        $category = Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        $coupon = Coupon::orderBy('coupon_id','ASC')->get();
       
        return view('page_user.promotion.show_promotion')->with(compact('category','banner','coupon'));
    }
}

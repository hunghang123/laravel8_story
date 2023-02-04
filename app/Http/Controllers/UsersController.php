<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id','DESC')->paginate(5);
        $customerAll = User::all()->count();
        $orderAll = Order::all()->count();
        $productAll = Product::all()->count();
        $blogAll = News::all()->count();
        return view('page_admin.users.index')->with(compact('user','customerAll','orderAll','productAll','blogAll',(request()->input('page',1)-1)*5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('page_admin.users.create');
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
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required|min:10',
            'address' => 'required',
            'image' => 'required',
            
            
            'role' => 'required',
            ],
            [
                'email.unique' => 'Email đã có xin điền email khác',
                'name.required' => 'Tên của bạn phải có',
                'password.required' => 'Password phải có',
                'phone.required' => 'Số điện thoại phải có',
                'address.required' => 'Địa chỉ phải có',
                'image.required' => 'Ảnh khách hàng phải có',
              
                
                'role.required' => 'Quyền người dùng phải có',
            ]
        );
        
        $khachhang = new User();

        $khachhang->name = $data['name'];
        $khachhang->password = md5($data['password']);
        $khachhang->email = $data['email'];
        $khachhang->phone = $data['phone'];
        $khachhang->address = $data['address'];
        $khachhang->image = $data['image'];
     
        $khachhang->role = $data['role'];
        $khachhang->save();
        return redirect()->back()->with('status','Thêm người dùng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $khachhang = User::all();
        $user = User::find($id);
        return view('page_admin.users.edit')->with(compact('khachhang','user'));
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
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|min:10',
            'address' => 'required',
            'image' => 'required',
            'role' => 'required',
            ],
            [
                'email.unique' => 'Email đã có xin điền email khác',
                'name.required' => 'Tên của bạn phải có',
                'password.required' => 'Password phải có',
                'phone.required' => 'Số điện thoại phải có',
                'address.required' => 'Địa chỉ phải có',
                'image.required' => 'Ảnh khách hàng phải có',
                'role.required' => 'Quyền người dùng phải có',
            ]
        );
        $khachhang =  User::find($id);
        $khachhang->name = $data['name'];
        $khachhang->password = md5($data['password']);
        $khachhang->email = $data['email'];
        $khachhang->phone = $data['phone'];
        $khachhang->address = $data['address'];
        $khachhang->image = $data['image'];
        $khachhang->role = $data['role'];
        $khachhang->save();
        return redirect()->back()->with('status','Thêm người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $donhang = Order::where('id',$id)->first();
        if($donhang!=null){
            return redirect()->back()->with('status',' Tài khoản này đang đặt đơn hàng không thể xóa!');
        }else{
            $user = User::find($id);
        $path = $user->image;
            if(file_exists($path))
            {
                unlink($path);
            }
            User::find($id)->delete();
            return redirect()->back()->with('message','Xóa tài khoản thành công!');
        }

        // $user = User::find($id);
        // $path = $user->image;
        // if(file_exists($path))
        // {
        //     unlink($path);
        // }
        // User::find($id)->delete();
        // return redirect()->back()->with('message','Xóa sản phẩm thành công!');
    }

    public function active($id)
    {
       
            $user=User::find($id);
            
            if($user->status==1){
                
                $user->update(['status'=>'0']);
                return redirect()->route('user.index')->with('thong bao','Đã tắt' .$user->name.'thành công'); 
            }else{
                
                $user->update(['status'=>'1']);
                return redirect()->route('user.index')->with('thong bao','Đã mở' .$user->name.'thành công');
            }
        
    }
   
}

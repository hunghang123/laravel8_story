<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
use Illuminate\Http\Request;

class BannerController extends Controller
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
        $banner = Banner::orderBy('Banner_id','ASC')->get();
        return view('page_admin.banner.index')->with(compact('banner','customerAll','orderAll','productAll','blogAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.banner.create');
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
                'banner_name' => 'required|unique:banner|max:255',
                'banner_url' => 'required',
                
                'banner_image' => 'required',
                ],
                [
                    'banner_name.required' => 'Phải có tên slide',
                    'banner_url.required' => 'Phải có đường link',
                    'banner_image.required' => 'Phải có hình ảnh slide',
                ],
        );

        // $data = array();
        // $data['category_name'] = $request->category_product_name;
        // $data['category_desc'] = $request->category_product_desc;
        // $data['category_status'] = $request->category_product_status;
         $banner = new Banner();
         $banner->banner_name = $data['banner_name'];
         $banner->banner_url = $data['banner_url'];
       
         $banner->banner_image = $data['banner_image'];
         $banner->save();
         return redirect()->back()->with('status','Thêm slide thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $danhmucslide = Banner::all();
        $danhmuc = Banner::find($id);
        return view('page_admin.banner.edit')->with(compact('danhmuc','danhmucslide'));
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
                'banner_name' => 'required',
                'banner_url' => 'required',
                
                'banner_image' => 'required',
                ],
                [
                    'banner_name.required' => 'Phải có tên slide',
                    'banner_url.required' => 'Phải có đường link',
                    'banner_image.required' => 'Phải có hình ảnh slide',
                ],
        );
        $danhmucslide =  Banner::find($id);
        $danhmucslide->banner_name = $data['banner_name'];
        $danhmucslide->banner_url = $data['banner_url'];
      
        $danhmucslide->banner_image = $data['banner_image'];
        $danhmucslide->save();
        return redirect()->back()->with('status','Thêm danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::find($id)->delete();
        return redirect()->back()->with('message','Xóa slide banner thành công!');
    }
    public function active($id)
    {
       
            $banner=Banner::find($id);
            
            if($banner->banner_active==1){
                
                $banner->update(['banner_active'=>'0']);
                return redirect()->route('banner.index')->with('thong bao','Đã tắt thành công'); 
            }else{
                
                $banner->update(['banner_active'=>'1']);
                return redirect()->route('banner.index')->with('thong bao','Đã mở thành công');
            }
        
    }
}

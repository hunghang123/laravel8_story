<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News_Category;
use App\Models\Category;
use App\Models\Banner;
use App\Models\News;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
class NewscategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $categorynews = News_Category::orderBy('news_category_id','ASC')->get();
        return view('page_admin.news_category.index')->with(compact('categorynews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.news_category.create');
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
                'news_category_name' => 'required|unique:news_category|max:255',
                
                ],
                [
                    'news_category_name.required' => 'Phải có tên danh mục tin tức',
                   
                ],
        );

        // $data = array();
        // $data['category_name'] = $request->category_product_name;
        // $data['category_desc'] = $request->category_product_desc;
        // $data['category_status'] = $request->category_product_status;
         $categorynews = new News_Category();
         $categorynews->news_category_name = $data['news_category_name'];
        
         $categorynews->save();
         return redirect()->back()->with('status','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $danhmuc_id = News_Category::where('news_category_id',$id)->first();
        $news = News::orderBy('news_id','DESC')->where('news_category_id',$danhmuc_id->news_category_id)->where('news_active','1')->get();
        $hienthilay1ten =  News_Category::where('news_category_id',$id)->limit(1)->get();
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        return view('page_user.newscategory.show_categorynews')->with(compact('category','danhmuc_id','news','hienthilay1ten','categorynews','banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $danhmuctintuc = News_Category::all();
        $danhmuc = News_Category::find($id);
        return view('page_admin.news_category.edit')->with(compact('danhmuc','danhmuctintuc'));
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
            'news_category_name' => 'required',
            
            
            ],
            [
                'news_category_name.required' => 'Tên danh mục phải có',
                
            ]
        );
      
        $danhmuctintuc = News_Category::find($id);

        $danhmuctintuc->news_category_name = $data['news_category_name'];
        
        $danhmuctintuc->save();

        return redirect()->back()->with('status','Cập nhật danh mục sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = News::where('news_category_id',$id)->first();
        if($tintuc!=null){
            return redirect()->back()->with('status','Danh mục tin tức này đã có tin tức không thể xóa!');
        }else{
            News_Category::find($id)->delete();
            return redirect()->back()->with('message','Xóa danh mục tin tức thành công!');
        }

       
    }


    public function active($id)
    {
       
            $categorynews=News_Category::find($id);
            
            if($categorynews->news_category_status==1){
                
                $categorynews->update(['news_category_status'=>'0']);
                return redirect()->route('news_category.index')->with('thong bao','Đã tắt' .$categorynews->news_category_name.'thành công'); 
            }else{
                
                $categorynews->update(['news_category_status'=>'1']);
                return redirect()->route('news_category.index')->with('thong bao','Đã mở' .$categorynews->news_category_name.'thành công');
            }
        
    }
}

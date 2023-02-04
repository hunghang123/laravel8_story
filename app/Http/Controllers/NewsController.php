<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\News_Category;
use App\Models\Category;
use App\Models\Banner;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
class NewsController extends Controller
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
        $news = News::orderBy('news_id','ASC')->get();
        return view('page_admin.news.index')->with(compact('news','customerAll','orderAll','productAll','blogAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuctintuc = News_Category::all();
        return view('page_admin.news.create')->with(compact('danhmuctintuc'));
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
            'news_name' => 'required|unique:news|max:255',
           
            'news_desc' => 'required',
            
            'news_image' => 'required',
            
            'news_content' => 'required',
            'news_capture' => 'required',
            'category' => 'required',
            
            ],
            [
                
                'news_name.unique' => 'Tên tin tức đã có xin điền tên khác',
                'news_desc.required' => 'Mô tả tin tức phải có',
                
                'news_name.required' => 'Tên tin tức phải có',
                'news_image.required' => 'Anh tin tức phải có',
                
                'news_content.required' => 'Content tin tức phải có',
                'news_capture.required' => 'Capture tin tức phải có',
            ]
           
        );
      
        $tintuc = new News();
       
        $tintuc->news_name = $data['news_name'];
       
        $tintuc->news_desc = $data['news_desc'];
        
        
     
        $tintuc->news_content = $data['news_content'];
        $tintuc->news_capture = $data['news_capture'];
        $tintuc->news_category_id = $data['category'];
        
        
        $tintuc->news_image =  $data['news_image'];
        
        $tintuc->save();

        return redirect()->back()->with('status','Thêm sản phẩm thành công!');

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
        $danhmuctintuc = News_Category::all();
        $tintuc = News::find($id);
        
        return view('page_admin.news.edit')->with(compact('tintuc','danhmuctintuc'));
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
            'news_name' => 'required',
           
            'news_desc' => 'required',
            
            'news_image' => 'required',
            
            'news_content' => 'required',
            'news_capture' => 'required',
            'category' => 'required',
            
            ],
            [
                
                
                'news_desc.required' => 'Mô tả tin tức phải có',
                
                'news_name.required' => 'Tên tin tức phải có',
                'news_image.required' => 'Anh tin tức phải có',
                
                'news_content.required' => 'Content tin tức phải có',
                'news_capture.required' => 'Capture tin tức phải có',
            ]
           
        );
      
        $tintuc =  News::find($id);
       
        $tintuc->news_name = $data['news_name'];
       
        $tintuc->news_desc = $data['news_desc'];
        
        
     
        $tintuc->news_content = $data['news_content'];
        $tintuc->news_capture = $data['news_capture'];
        $tintuc->news_category_id = $data['category'];
        
        
        $tintuc->news_image =  $data['news_image'];
        
        $tintuc->save();

        return redirect()->back()->with('status','Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = News::find($id);
        $path = $tintuc->news_image;
        if(file_exists($path))
        {
            unlink($path);
        }
        News::find($id)->delete();
        return redirect()->back()->with('message','Xóa sản phẩm thành công!');
    }

    public function active($id)
    {
       
            $news=News::find($id);
            
            if($news->news_active==1){
                
                $news->update(['news_active'=>'0']);
                return redirect()->route('news.index')->with('thong bao','Đã tắt' .$news->news_name.'thành công'); 
            }else{
                
                $news->update(['news_active'=>'1']);
                return redirect()->route('news.index')->with('thong bao','Đã mở' .$news->news_name.'thành công');
            }
        
    }
    ////////////////////////////////ket thuc admin
    public function showhomenew(){
        $category = Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $news = News::orderBy('news_id','DESC')->where('news_active','1')->limit(4)->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
        return view('page_user.new')->with(compact('category','categorynews','news','banner'));
    }


    public function details_news($id){
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $news_id = News::where('news_id',$id)->first();
        $news = News::orderBy('news_id','DESC')->where('news_id',$news_id->news_id)->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
       ////update view
       $post = News::where('news_id',$news_id->news_id)->first();
       $post->news_view = $post->news_view + 1;
       $post->save();
       
      return view('page_user.news.show_detailsnews')->with(compact('category','news_id','news','banner','post'));
    }
}

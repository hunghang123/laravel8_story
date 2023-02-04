<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\News_Category;
use App\Models\Banner;
use App\Models\User;
use App\Models\Order;
use App\Models\News;
class CategoryController extends Controller
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
        $category = Category::orderBy('category_id','ASC')->paginate(4);
        return view('page_admin.category.index')->with(compact('category','customerAll','orderAll','productAll','blogAll',(request()->input('page',1)-1)*5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page_admin.category.create');
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
                'category_name' => 'required|unique:category|max:255',
                'category_desc' => 'required',
                'category_parent' => 'required',
                'category_image' => 'required',
                ],
                [
                    'category_name.required' => 'Phải có tên danh mục',
                    'category_desc.required' => 'Phải có mô tả danh mục',
                    'category_image.required' => 'Phải có hình ảnh danh mục',
                ],
        );

        // $data = array();
        // $data['category_name'] = $request->category_product_name;
        // $data['category_desc'] = $request->category_product_desc;
        // $data['category_status'] = $request->category_product_status;
         $category = new Category();
         $category->category_name = $data['category_name'];
         $category->category_desc = $data['category_desc'];
         $category->category_parent = $data['category_parent'];
         $category->category_image = $data['category_image'];
         $category->save();
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
        
        $danhmucsanpham = Category::all();
        $danhmuc = Category::find($id);
        return view('page_admin.category.edit')->with(compact('danhmuc','danhmucsanpham'));
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
            'category_name' => 'required',
            'category_desc' => 'required',
            'category_parent' => 'required',
            'category_image' => 'required',
            
            ],
            [
                'category_name.required' => 'Tên danh mục phải có',
                'category_desc.required' => 'Mô tả phải có',
                'category_image.required' => 'Anh phải có',
            ]
        );
      
        $danhmucsanpham = Category::find($id);

        $danhmucsanpham->category_name = $data['category_name'];
        $danhmucsanpham->category_desc = $data['category_desc'];
        $danhmucsanpham->category_parent = $data['category_parent'];
        $danhmucsanpham->category_image = $data['category_image'];
        $danhmucsanpham->save();

        return redirect()->back()->with('message','Cập nhật danh mục sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = Product::where('category_id',$id)->first();
        if($sanpham!=null){
            return redirect()->back()->with('status','Danh mục sản phẩm này đã có sản phẩm không thể xóa!');
        }else{
            Category::find($id)->delete();
            return redirect()->back()->with('message','Xóa danh mục sản phẩm thành công!');
        }
        // Category::find($id)->delete();
        // return redirect()->back()->with('message','Xóa danh mục sản phẩm thành công!');
    }
    public function active($id)
    {
       
            $category=Category::find($id);
            
            if($category->category_status==1){
                
                $category->update(['category_status'=>'0']);
                return redirect()->route('category.index')->with('thong bao','Đã tắt' .$category->category_name.'thành công'); 
            }else{
                
                $category->update(['category_status'=>'1']);
                return redirect()->route('category.index')->with('thong bao','Đã mở' .$category->category_name.'thành công');
            }
        
    }

    ///////ket thuc ham admin
    public function show_category_home($id){
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $danhmuc_id = Category::where('category_id',$id)->first();
        $product = Product::orderBy('product_id','DESC')->where('category_id',$danhmuc_id->category_id)->where('product_active','1')->get();
        $category2 =  Category::where('category_id',$id)->limit(1)->get();
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
      return view('page_user.category.show_category_home')->with(compact('category','danhmuc_id','product','category2','categorynews','banner'));
    }
}

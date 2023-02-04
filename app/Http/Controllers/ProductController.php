<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\News_Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\News;
class ProductController extends Controller
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
        $product = Product::orderBy('product_id','ASC')->paginate(5);
        return view('page_admin.product.index')->with(compact('product','customerAll','orderAll','productAll','blogAll',(request()->input('page',1)-1)*5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmucsanpham = Category::all();
        return view('page_admin.product.create')->with(compact('danhmucsanpham'));
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
            'product_name' => 'required|unique:product|max:255',
           
            'product_desc' => 'required',
            'product_price' => 'required|min:1',
            'product_price_cost' => 'required|min:1',
            'product_promotion' => 'required|min:1',
            'product_imge' => 'required',
            'product_quanlity' => 'required',
            'product_details' => 'required',
            'category' => 'required',
            
            ],
            [
                
                'product_name.unique' => 'Tên sản phẩm đã có xin điền tên khác',
                'product_desc.required' => 'Mô tả sản phẩm phải có',
                'product_price.required' => 'Giá sản phẩm phải có',
                'product_price_cost.required' => 'Giá gốc sản phẩm phải có',
                'product_promotion.required' => 'Giá khuyến mãi sản phẩm phải có',
                'product_name.required' => 'Tên sản phẩm phải có',
                'product_imge.required' => 'Anh sản phẩm phải có',
                'product_quanlity.required' => 'Số lượng sản phẩm phải có',
                'product_details.required' => 'Chi tiết sản phẩm phải có',
                
            ]
           
        );
      
        $sanpham = new Product();
       
        $sanpham->product_name = $data['product_name'];
       
        $sanpham->product_desc = $data['product_desc'];
        $sanpham->product_sold = 0;
        
        $sanpham->product_price = $data['product_price'];
        $sanpham->product_price_cost = $data['product_price_cost'];
        $sanpham->product_promotion = $data['product_promotion'];
        $sanpham->product_quanlity = $data['product_quanlity'];
     
        $sanpham->product_details = $data['product_details'];
        $sanpham->category_id = $data['category'];
        
        
        $sanpham->product_imge =  $data['product_imge'];
        
        $sanpham->save();

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
        $danhmucsanpham = Category::all();
        $sanpham = Product::find($id);
        
        return view('page_admin.product.edit')->with(compact('sanpham','danhmucsanpham'));
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
            'product_name' => 'required',
           
            'product_desc' => 'required',
            'product_price' => 'required',
            'product_promotion' => 'required',
            'product_price_cost' => 'required',
            'product_imge' => 'required',
            'product_quanlity' => 'required',
            'product_details' => 'required',
            'category' => 'required',
         
            ],
            [
                
                
                'product_desc.required' => 'Mô tả sản phẩm phải có',
                'product_price.required' => 'Giá sản phẩm phải có',
                'product_promotion.required' => 'Giá khuyến mãi sản phẩm phải có',
                'product_name.required' => 'Tên sản phẩm phải có',
                'product_imge.required' => 'Anh sản phẩm phải có',
                'product_price_cost.required' => 'Giá gốc sản phẩm phải có',
                'product_quanlity.required' => 'Số lượng sản phẩm phải có',
                'product_details.required' => 'Chi tiết sản phẩm phải có',
                
            ]
           
        );
       
        $sanpham = Product::find($id);
       
        $sanpham->product_name = $data['product_name'];
        
        $sanpham->product_desc = $data['product_desc'];
        $sanpham->product_sold = 0;
        $sanpham->product_price = $data['product_price'];
        $sanpham->product_price_cost = $data['product_price_cost'];
        $sanpham->product_promotion = $data['product_promotion'];
        $sanpham->product_quanlity = $data['product_quanlity'];
   
        $sanpham->product_details = $data['product_details'];
        $sanpham->category_id = $data['category'];
       
            $sanpham->product_imge =  $data['product_imge'];
       
        $sanpham->save();

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
        
        $donhang = OrderDetails::where('product_id',$id)->first();
        if($donhang!=null){
            return redirect()->back()->with('status',' Sản phẩm này đã có trong đơn hàng không thể xóa!');
        }else{
            $sanpham = Product::find($id);
        $path = $sanpham->product_imge;
            if(file_exists($path))
            {
                unlink($path);
            }
            Product::find($id)->delete();
            return redirect()->back()->with('message','Xóa sản phẩm thành công!');
        }
    }



    public function active($id)
    {
       
            $product=Product::find($id);
            
            if($product->product_active==1){
                
                $product->update(['product_active'=>'0']);
                return redirect()->route('product.index')->with('thong bao','Đã tắt' .$product->product_name.'thành công'); 
            }else{
                
                $product->update(['product_active'=>'1']);
                return redirect()->route('product.index')->with('thong bao','Đã mở' .$product->product_name.'thành công');
            }
        
    }
///////////ket thuc admin san pham
    public function details_product($id){
        $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
        $product_id = Product::where('product_id',$id)->first();
        $product = Product::orderBy('product_id','DESC')->where('product_id',$product_id->product_id)->get();
        $product_suggestion = Product::all()->random(4);
        $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
        if($product_id!=null){
            $category_id = $product_id->category_id;
            $product_relate = Product::where('category_id',$category_id)->whereNotIn('product_id',[$id])->get();
        }
        ////update view
        $post = Product::where('product_id',$product_id->product_id)->first();
        $post->product_view = $post->product_view + 1;
        $post->save();
        
        $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
      return view('page_user.product.show_details')->with(compact('category','product_id','product','product_suggestion','product_relate','categorynews','banner','post'));
    }
///////////tat ca san pham
   public function all_product(){
    $category =  Category::orderBy('category_id','DESC')->where('category_status','1')->get();
    $all_product =  Product::orderBy('product_id','DESC')->where('product_active','1')->paginate(8);
    $categorynews =  News_Category::orderBy('news_category_id','ASC')->where('news_category_status','1')->get();
    $banner = Banner::orderBy('Banner_id','DESC')->where('banner_active','1')->get();
    return view('page_user.product.all_product')->with(compact('category','all_product','categorynews','banner',(request()->input('page',1)-1)*5));
   }
}

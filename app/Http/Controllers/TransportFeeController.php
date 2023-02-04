<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Models\TransportFee;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
class TransportFeeController extends Controller
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
        $city = City::orderBy('matp','ASC')->get();
        $district = District::orderBy('maqh','ASC')->get();
        $ward = Ward::orderBy('maxptt','ASC')->get();
        $transportFee = TransportFee::orderBy('feeship_id','ASC')->get();
        return view('page_admin.transport.index')->with(compact('city','district','ward','transportFee','customerAll','orderAll','productAll','blogAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::orderBy('matp','ASC')->get();
        $district = District::orderBy('maqh','ASC')->get();
        $ward = Ward::orderBy('maxptt','ASC')->get();
        return view('page_admin.transport.create')->with(compact('city','district','ward'));
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
                'city' => 'required',
                'district' => 'required',
                'ward' => 'required',
                'shipping_fee' => 'required',
                
                ],
                [
                    'city.required' => 'Phải có tên thành phô',
                    'district.required' => 'Phải có tên quận huyện',
                    'ward.required' => 'Phải có phường xã thị trấn',
                    'shipping_fee.required' => 'Phải có thu phí',
                    
                ],
        );

        
        $transport_fee = new TransportFee();
        $transport_fee->matp = $data['city'];
        $transport_fee->maqh = $data['district'];
        $transport_fee->maxptt = $data['ward'];
        $transport_fee->shipping_fee = $data['shipping_fee'];
        $transport_fee->save();
         return redirect()->back()->with('status','Thêm thu phí thành công');
       
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $transport_fee = TransportFee::find($data['feeshipping_id']);
        $fee_value = $data['fee_value'];
        $transport_fee->shipping_fee = $fee_value;
        $transport_fee->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransportFee::find($id)->delete();
        return redirect()->back()->with('message','Xóa vận chuyển thành công!');
    }



    public function select_delivery(Request $request){
        $data = $request->all();
        $output= '';
        if($data['action']){
           if($data['action']=='city'){
            $district = District::where('matp',$data['ma'])->orderBy('maqh','ASC')->get();
                $output.='<option value="0">------Chọn quận huyện------</option>';
                foreach ($district as $key => $district){
                    $output.='<option value="'.$district->maqh.'">'.$district->nameqh.'</option>';
                }
           }else{
            $ward = Ward::where('maqh',$data['ma'])->orderBy('maxptt','ASC')->get();
            $output.='<option value="0">------Chọn xã phường------</option>';
            foreach ($ward as $key => $ward){
                $output.='<option value="'.$ward->maxptt.'">'.$ward->namexptt.'</option>';
            }
           }
        
        }
        echo $output;
    }
    public function add_delivery(Request $request){
        $data = $request->all();
        $transport_fee = new TransportFee();
        $transport_fee->matp = $data['city'];
        $transport_fee->maqh = $data['district'];
        $transport_fee->maxptt = $data['ward'];
        $transport_fee->shipping_fee = $data['shipping_fee'];
        $transport_fee->save();
       
    }
}

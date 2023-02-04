<?php

namespace App\Http\Controllers;
use App\Models\Statistical;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
use Illuminate\Http\Request;
use Carbon\Carbon;
class StatisticalController extends Controller
{
    public function show_statistical(Request $request)
    {
        $ip_address = $request->ip();
        // $ip_address = '156.145.221.45';
        // dd($ip_address);
        $startOfMonthNow = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $monthPrev = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $monthNext = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $onewYear = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $visitorLastMonth = Visitor::whereBetween('visitor_date',[$monthPrev,$monthNext])->get();
        $countVisitorLastMonth = $visitorLastMonth->count();

        $visitorThisMonth = Visitor::whereBetween('visitor_date',[$monthPrev,$dateNow])->get();
        $countVisitorThisMonth = $visitorThisMonth->count();

        $visitorThisYear = Visitor::whereBetween('visitor_date',[$onewYear,$dateNow])->get();
        $countVisitorThisYear = $visitorThisYear->count();

        $visitorOnline =  Visitor::where('visitor_ip_address',$ip_address)->get();
        $count = $visitorOnline->count();

        $visitorAll = Visitor::all()->count();
      

        if($count<1){
            $visitor = new Visitor();
            $visitor->visitor_ip_address = $ip_address;
            $visitor->visitor_date = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
///////////tổng các thứ
        $customerAll = User::all()->count();
        $orderAll = Order::all()->count();
        $productAll = Product::all()->count();
        $blogAll = News::all()->count();
       
        $product_customer_view = Product::orderBy('product_view','DESC')->take(10)->get();
        $news_customer_view = News::orderBy('news_view','DESC')->take(10)->get();
        return view('page_admin.statistical.show_statistical')->with(compact('count','visitorAll','countVisitorLastMonth','countVisitorThisMonth','countVisitorThisYear',
    'customerAll','orderAll','productAll','blogAll','product_customer_view','news_customer_view'));
        
    }
    public function getDateFilter(Request $request)
    {
     
        $data = $request->all();

       $from_date = $data['dateFrom'];
       $to_date = $data['dateTo'];
        $statistical = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();

        if($statistical){
            foreach($statistical as $value){
                $char[] = array(
                    'orderDate'=> $value->order_date,
                    'totalOrder'=> $value->total_order,
                    'sales' => $value->sales,
                    'profit' => $value->profit,
                    'quantity' => $value->quantity,
                );
            }
        }

        echo $data = json_encode($char);
    }

    public function filterStatisticalProfit(Request $request)
    {
        $data = $request->all();

        $char = array();
        $result = '';

        $startOfMonthNow = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $monthPrev = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $monthNext = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sevenDay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $onewYear = Carbon::now('Asia/Ho_Chi_Minh')->subYears(1)->startOfYear()->toDateString();

        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['value']=='sevenDay'){
            $result = Statistical::whereBetween('order_date',[$sevenDay,$dateNow])->orderBy('order_date','ASC')->get();
        }elseif($data['value']=='monthPrev'){
            $result = Statistical::whereBetween('order_date',[$monthPrev,$monthNext])->orderBy('order_date','ASC')->get();

        }elseif($data['value']=='monthNext'){
            $result = Statistical::whereBetween('order_date',[$startOfMonthNow,$dateNow])->orderBy('order_date','ASC')->get();
        }elseif($data['value']=='oneYear'){
            $result = Statistical::whereBetween('order_date',[$onewYear,$dateNow])->orderBy('order_date','ASC')->get();
        }
        foreach($result as $value){
            $char[] = array(
                'orderDate'=> $value->order_date,
                'totalOrder'=> $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            );
        }
        echo $data = json_encode($char);
    }

    public function showstatisticaloneyear(Request $request)
    {
        $char = array();

        $oneYear = Carbon::now('Asia/Ho_Chi_Minh')->subYears(2)->startOfYear()->toDateString();
        $dateNow = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $result = Statistical::whereBetween('order_date',[$oneYear,$dateNow])->orderBy('order_date','ASC')->get();

        foreach($result as $value){
            $char[] = array(
                'orderDate'=> $value->order_date,
                'totalOrder'=> $value->total_order,
                'sales' => $value->sales,
                'profit' => $value->profit,
                'quantity' => $value->quantity,
            );
        }
        echo $data = json_encode($char);

    }
   
}

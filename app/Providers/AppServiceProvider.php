<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\News;
use App\Models\Statistical;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('*',function($view){
            $count = 0;
            if(session()->get('cart')){
                $count = count(session()->get('cart'));
            }
            $customerAll = User::all()->count();
            $orderAll = Order::all()->count();
            $productAll = Product::all()->count();
            $blogAll = News::all()->count();
            $sum = Statistical::all()->sum('sales');
            $sumprofit = Statistical::all()->sum('profit');
            $view->with(compact('customerAll','orderAll','productAll'
            ,'blogAll','sum','sumprofit','count'));
        });
    }
}

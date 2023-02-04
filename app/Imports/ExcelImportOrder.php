<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImportOrder implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'order_code'=>$row[0],
            'shipping_id'=>$row[1],
            'order_status'=>$row[2],
            'order_coupon'=>$row[3],
            'order_feeship'=>$row[4],
            'created_at'=>$row[5],
            'update_at'=>$row[6],
            'order_date'=>$row[7],
        ]);
    }
}

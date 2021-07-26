<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;


class OrderReturns extends Model
{
    protected $table ='customer_orders_returns';
    
    public static $reasons = [
            '1' => 'Ordered wrong product',
            '2' => 'Received wrong product',
            '3' => 'Product is damaged or defective',
            '4' => 'Other',
        ];
    
}
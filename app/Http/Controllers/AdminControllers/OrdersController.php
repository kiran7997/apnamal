<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\AdminControllers\SiteSettingController;
use App\Http\Controllers\Controller;
use App\Models\Core\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use App\Models\Web\OrderReturns;
use Session;
use App\Models\Core\Products;

class OrdersController extends Controller 
{
    //
    public function __construct(Setting $setting)
    {
        $this->myVarsetting = new SiteSettingController($setting);

    }

    // View Order Returns At Admin End
    public function getReturns()
    {

        $title = array('pageTitle' => 'Return Requests');
        $language_id = '1';

        $message = array();
        $errorMessage = array();
        $order_product_ids = OrderReturns::query()->where('status','=', 1)->orderBy('created_at', 'DESC')->pluck('order_product_id')->toArray();
        // $orders_id = DB::table('orders_products')->whereIn('orders_products_id',$order_product_ids)->pluck('orders_id')->toArray();
        // $orders = DB::table('orders')
        //             ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
        //             ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
        //             ->whereIn('orders.orders_id',$orders_id)
        //             ->select('orders.*')->orderBy('created_at', 'DESC')
        //             ->paginate(40);
        
        $returns = OrderReturns::query()
                    ->LeftJoin('orders_products', 'customer_orders_returns.order_product_id', '=', 'orders_products.orders_products_id')
                    ->LeftJoin('orders', 'orders_products.orders_id', '=', 'orders.orders_id')
                    ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                    ->where('customer_orders_returns.status','=', 1)
                    ->orderBy('customer_orders_returns.created_at', 'DESC')
                    ->get();
        $total_price = array();
        foreach ($returns as $index=> $orders_data) {
            $returns[$index]->total_price = $orders_data->final_price;
            $returns[$index]->orders_status_id = $orders_data->status;
            $returns[$index]->orders_status = 'Raised return';
        }

        $ordersData['message'] = $message;
        $ordersData['errorMessage'] = $errorMessage;
        $ordersData['orders'] = $returns;
        $ordersData['currency'] = $this->myVarsetting->getSetting();
        return view("admin.Orders.returns", $title)->with('listingOrders', $ordersData);
    }

    //add listingOrders
    public function display()
    {

        $title = array('pageTitle' => Lang::get("labels.ListingOrders"));
        //$language_id                            =   $request->language_id;
        $language_id = '1';

        $message = array();
        $errorMessage = array();
        if(Auth()->user()->user_type == 2){
            $orders = DB::table('orders')
                    ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                    ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                    ->where('products.vendor',Auth()->user()->id)->select('orders.*')->orderBy('created_at', 'DESC')
            ->paginate(40);
        }else{
            $orders = DB::table('orders')->orderBy('created_at', 'DESC')
            ->paginate(40);
        }

        $index = 0;
        $total_price = array();

        foreach ($orders as $orders_data) {
            $orders_products = DB::table('orders_products')->sum('final_price');

            $orders[$index]->total_price = $orders_products;

            $orders_status_history = DB::table('orders_status_history')
                ->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
                ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
                ->select('orders_status_description.orders_status_name', 'orders_status_description.orders_status_id')
                ->where('orders_status_description.language_id', '=', $language_id)
                ->where('orders_id', '=', $orders_data->orders_id)
                ->where('role_id', '<=', 2)
                ->orderby('orders_status_history.date_added', 'DESC')->limit(1)->get();

            $orders[$index]->orders_status_id = $orders_status_history[0]->orders_status_id;
            $orders[$index]->orders_status = $orders_status_history[0]->orders_status_name;
            $index++;

        }

        $ordersData['message'] = $message;
        $ordersData['errorMessage'] = $errorMessage;
        $ordersData['orders'] = $orders;
        $ordersData['currency'] = $this->myVarsetting->getSetting();
        return view("admin.Orders.index", $title)->with('listingOrders', $ordersData);
    }

    //view order detail
    public function vieworder(Request $request)
    {
        $title = array('pageTitle' => Lang::get("labels.ViewOrder"));
        $language_id = '1';
        $orders_id = $request->id;

        $message = array();
        $errorMessage = array();

        DB::table('orders')->where('orders_id', '=', $orders_id)
            ->where('customers_id', '!=', '')->update(['is_seen' => 1]);

        $order = DB::table('orders')
            ->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
            ->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
            ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)
            ->where('role_id', '<=', 2)
            ->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();

        foreach ($order as $data) {
            $orders_id = $data->orders_id;

            $orders_products = DB::table('orders_products')
                ->join('products', 'products.products_id', '=', 'orders_products.products_id')
                ->LeftJoin('image_categories', function ($join) {
                    $join->on('image_categories.image_id', '=', 'products.products_image')
                        ->where(function ($query) {
                            $query->where('image_categories.image_type', '=', 'THUMBNAIL')
                                ->where('image_categories.image_type', '!=', 'THUMBNAIL')
                                ->orWhere('image_categories.image_type', '=', 'ACTUAL');
                        });
                })
                ->select('orders_products.*', 'image_categories.path as image')
                ->where('orders_products.orders_id', '=', $orders_id)->get();
            $i = 0;
            $total_price = 0;
            $total_tax = 0;
            $product = array();
            $subtotal = 0;
            foreach ($orders_products as $orders_products_data) {
                $product_attribute = DB::table('orders_products_attributes')
                    ->where([
                        ['orders_products_id', '=', $orders_products_data->orders_products_id],
                        ['orders_id', '=', $orders_products_data->orders_id],
                    ])
                    ->get();

                $orders_products_data->attribute = $product_attribute;
                $product[$i] = $orders_products_data;
                $total_price = $total_price + $orders_products[$i]->final_price;

                $subtotal += $orders_products[$i]->final_price;

                $i++;
            }
            $data->data = $product;
            $orders_data[] = $data;
        }

        $orders_status_history = DB::table('orders_status_history')
            ->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
            ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)
            ->where('role_id', '<=', 2)
            ->orderBy('orders_status_history.date_added', 'desc')
            ->where('orders_id', '=', $orders_id)->get();

        $orders_status = DB::table('orders_status')
            ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)->where('role_id', '<=', 2)->get();

        $ordersData['message'] = $message;
        $ordersData['errorMessage'] = $errorMessage;
        $ordersData['orders_data'] = $orders_data;
        $ordersData['total_price'] = $total_price;
        $ordersData['orders_status'] = $orders_status;
        $ordersData['orders_status_history'] = $orders_status_history;
        $ordersData['subtotal'] = $subtotal;

        //get function from other controller
        $ordersData['currency'] = $this->myVarsetting->getSetting();

        return view("admin.Orders.vieworder", $title)->with('data', $ordersData);
    }
    
    public function approveOrderReturn($id){
            $order_product = DB::table('orders_products')->where('orders_products_id','=', $id)->first();
            $date_added = date('Y-m-d h:i:s');
            
            $return = OrderReturns::query()->where('order_product_id','=', $id)->first();
            if($return)
            {
                $return->status = 0;
                $return->save();
            }
            $orders_history_id = DB::table('orders_status_history')
                                    ->insertGetId(
                                    ['orders_id' => $order_product->orders_id,
                                        'orders_status_id' => 4,
                                        'date_added' => $date_added,
                                        'customer_notified' => '1',
                                        'comments' => '',
                                    ]);
            $product = DB::table('products')->where('products_id', '=', $order_product->products_id)->update([
                'products_quantity' => DB::raw('products_quantity + "'.$order_product->products_quantity.'"'),
                'products_ordered' => DB::raw('products_quantity - "'.$order_product->products_quantity.'"'),
            ]);

            Session::flash('message', 'Order return has been approved.'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->back();
    }
    public function declineOrderReturn($id){
            $return = OrderReturns::query()->where('order_product_id','=', $id)->first();
            if($return)
            {
                $return->status = 2;
                $return->save();
            }

            Session::flash('message', 'Order return has been declined.'); 
            Session::flash('alert-class', 'alert-success');
            
            return redirect()->back();
    }


    //update order
    public function updateOrder(Request $request)
    {
            $orders_status = $request->orders_status;
            $comments = $request->comments;
            $orders_id = $request->orders_id;
            $old_orders_status = $request->old_orders_status;
            $date_added = date('Y-m-d h:i:s');

            //get function from other controller

            $setting = $this->myVarsetting->getSetting();

            $status = DB::table('orders_status')->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
                ->where('orders_status_description.language_id', '=', 1)->where('role_id', '<=', 2)->where('orders_status_description.orders_status_id', '=', $orders_status)->get();

            if ($old_orders_status == $orders_status) {
                return redirect()->back()->with('error', Lang::get("labels.StatusChangeError"));
            } else {
                //orders status history
                $orders_history_id = DB::table('orders_status_history')->insertGetId(
                    ['orders_id' => $orders_id,
                        'orders_status_id' => $orders_status,
                        'date_added' => $date_added,
                        'customer_notified' => '1',
                        'comments' => $comments,
                    ]);

                if ($orders_status == '2') {

                    $orders_products = DB::table('orders_products')->where('orders_id', '=', $orders_id)->get();

                    foreach ($orders_products as $products_data) {
                        DB::table('products')->where('products_id', $products_data->products_id)->update([
                            'products_quantity' => DB::raw('products_quantity - "' . $products_data->products_quantity . '"'),
                            'products_ordered' => DB::raw('products_ordered + 1'),
                        ]);
                    }
                }

                $orders = DB::table('orders')->where('orders_id', '=', $orders_id)
                    ->where('customers_id', '!=', '')
                    ->get();
                $data = array();
                $data['customers_id'] = $orders[0]->customers_id;
                $data['orders_id'] = $orders_id;
                $data['status'] = $status[0]->orders_status_name;

                return redirect()->back()->with('message', Lang::get("labels.OrderStatusChangedMessage"));
            }



    }

    //deleteorders
    public function deleteOrder(Request $request)
    {
        DB::table('orders')->where('orders_id', $request->orders_id)->delete();
        DB::table('orders_products')->where('orders_id', $request->orders_id)->delete();
        return redirect()->back()->withErrors([Lang::get("labels.OrderDeletedMessage")]);
    }

    //view order detail
    public function invoiceprint(Request $request)
    {

        $title = array('pageTitle' => Lang::get("labels.ViewOrder"));
        $language_id = '1';
        $orders_id = $request->id;

        $message = array();
        $errorMessage = array();

        DB::table('orders')->where('orders_id', '=', $orders_id)
            ->where('customers_id', '!=', '')->update(['is_seen' => 1]);

        $order = DB::table('orders')
            ->LeftJoin('orders_status_history', 'orders_status_history.orders_id', '=', 'orders.orders_id')
            ->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
            ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)->where('role_id', '<=', 2)
            ->where('orders.orders_id', '=', $orders_id)->orderby('orders_status_history.date_added', 'DESC')->get();

        foreach ($order as $data) {
            $orders_id = $data->orders_id;

            $orders_products = DB::table('orders_products')
                ->join('products', 'products.products_id', '=', 'orders_products.products_id')
                ->select('orders_products.*', 'products.products_image as image')
                ->where('orders_products.orders_id', '=', $orders_id)->get();
            $i = 0;
            $total_price = 0;
            $total_tax = 0;
            $product = array();
            $subtotal = 0;
            foreach ($orders_products as $orders_products_data) {

                //categories
                $categories = DB::table('products_to_categories')
                    ->leftjoin('categories', 'categories.categories_id', 'products_to_categories.categories_id')
                    ->leftjoin('categories_description', 'categories_description.categories_id', 'products_to_categories.categories_id')
                    ->select('categories.categories_id', 'categories_description.categories_name', 'categories.categories_image', 'categories.categories_icon', 'categories.parent_id')
                    ->where('products_id', '=', $orders_products_data->orders_products_id)
                    ->where('categories_description.language_id', '=', $language_id)->get();

                $orders_products_data->categories = $categories;

                $product_attribute = DB::table('orders_products_attributes')
                    ->where([
                        ['orders_products_id', '=', $orders_products_data->orders_products_id],
                        ['orders_id', '=', $orders_products_data->orders_id],
                    ])
                    ->get();

                $orders_products_data->attribute = $product_attribute;
                $product[$i] = $orders_products_data;
                $total_price = $total_price + $orders_products[$i]->final_price;

                $subtotal += $orders_products[$i]->final_price;

                $i++;
            }
            $data->data = $product;
            $orders_data[] = $data;
        }

        $orders_status_history = DB::table('orders_status_history')
            ->LeftJoin('orders_status', 'orders_status.orders_status_id', '=', 'orders_status_history.orders_status_id')
            ->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)->where('role_id', '<=', 2)
            ->orderBy('orders_status_history.date_added', 'desc')
            ->where('orders_id', '=', $orders_id)->get();

        $orders_status = DB::table('orders_status')->LeftJoin('orders_status_description', 'orders_status_description.orders_status_id', '=', 'orders_status.orders_status_id')
            ->where('orders_status_description.language_id', '=', $language_id)->where('role_id', '<=', 2)->get();

        $ordersData['message'] = $message;
        $ordersData['errorMessage'] = $errorMessage;
        $ordersData['orders_data'] = $orders_data;
        $ordersData['total_price'] = $total_price;
        $ordersData['orders_status'] = $orders_status;
        $ordersData['orders_status_history'] = $orders_status_history;
        $ordersData['subtotal'] = $subtotal;

        //get function from other controller

        $ordersData['currency'] = $this->myVarsetting->getSetting();

        return view("admin.Orders.invoiceprint", $title)->with('data', $ordersData);

    }

}

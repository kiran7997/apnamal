<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Core\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Core\Setting;
use App\Models\Core\Languages;
use Illuminate\Support\Facades\Lang;
use App\Models\Core\Images;
use Auth;


class VendorController extends Controller
{

  public function __construct()
  {
      $setting = new Setting();
      $this->Setting = $setting;
  } 

  public function commonsetting(){
      $result = array('pagination'=>'20');
      return $result;
  }


    public function getSetting(){
        $setting = $this->Setting->getSettings();
        return $setting;
    }

    public function imageType(){
        $extensions = array('gif','jpg','jpeg','png');
        return $extensions;
    }

    public function getlanguages(){

        $languages = $this->Setting->fetchLanguages();
        return $languages;
    }

    //units page
    public function getUnits(){

        $units = $this->Setting->Units();
        return $units;
    }
    
//alert Setting
    public function getAlertSetting(){
        $setting = $this->Setting->alterSetting();
        return $setting;
    }

// slugify method
    public function slugify($slug){

        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);

        // transliterate
        if (function_exists('iconv')){
            $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        }

        // remove unwanted characters
        $slug = preg_replace('~[^-\w]+~', '', $slug);

        // trim
        $slug = trim($slug, '-');

        // remove duplicate -
        $slug = preg_replace('~-+~', '-', $slug);

        // lowercase
        $slug = strtolower($slug);

        if (empty($slug)) {
            return 'n-a';
        }

        return $slug;
    }
    
    //getsinglelanguages
    public function getSingleLanguages($language_id){

        $languagesClass = new Language();

        $languages = $languagesClass->getSingleLan();
        return $languages;
    }
    
    public function vendor(Request $request)
    {
        $vendors = DB::table('users')->where('user_type',2)->get();
        $adminvendors = DB::table('users')->where('id',1)->first();
        return view('admin.vendor.index')
                ->with('adminvendors',$adminvendors)
                ->with('vendors',$vendors);
    }
    
    public function vendorstatus(Request $request)
    {
        $id = $request->id;
        $status = DB::table('users')->where('id',$id)->value('status');
        
       if($status == 1){
           DB::table('users')->where('id',$id)->update(['status' => 0]);
       } else {
           DB::table('users')->where('id',$id)->update(['status' => 1]);
       }
       
       \Session::flash('flash_message', 'Status updated successfully!');
        return redirect()->back();
    }
    
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = DB::table('users')->where('id',$id)->first();
        return view('admin.vendor.edit')
                    ->with('id',$id)
                   ->with('data',$data);
    }
    
    public function update(Request $request)
    {
        $update = DB::table('users')->where('id',$request->id)->update([
                                        'company' => $request->company,
                                        'company_description' => $request->company_description,
        ]);
        
            \Session::flash('flash_message', 'Vendor details updated successfully!');
        return redirect()->back();
    }
  
    public function delete(Request $request)
    {
        $update = DB::table('products')->where('vendor',$request->id)->update(['vendor'=>1]);
        
        $delete = DB::table('users')->where('id',$request->id)->delete();
        
        \Session::flash('flash_message', 'Vendor deleted successfully!');
        return redirect()->back();
    }
    
    public function view_earning(Request $request)
    {
        $products = DB::table('products')
                            ->join('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->join('products_description','products_description.products_id','=','products.products_id')
                            ->join('orders_products','products.products_id','=','orders_products.products_id')
                            ->join('orders','orders_products.orders_id','=','orders.orders_id')
                            ->where('products.vendor',$request->id)
                            ->get();
        $sold_cost_vendor_pending = 0;
        $sold_cost_vendor_completed = 0;
                
        $vendor_orders_ids = DB::table('orders')
                        ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                            ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                            ->LeftJoin('currencies', 'currencies.code', '=', 'orders.currency')
                            ->where('products.vendor',$request->id)
                            //->where('customers_id','!=','')
                            ->select('orders.*')
                            ->orderBy('orders.date_purchased','DESC')
                            ->pluck('orders_id')->toArray();
                            
                foreach($vendor_orders_ids as $vendor_pending_orders_id){
                    $vendor_pending_order_status = DB::table('orders_status_history')
                            ->where('orders_id',$vendor_pending_orders_id)->orderby('orders_status_history_id','desc')->first();
                    if($vendor_pending_order_status->orders_status_id==1){
                        $vendor_pending_orders = DB::table('orders')
                                ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                                ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                                ->where('orders.orders_id',$vendor_pending_orders_id)
                                ->where('products.vendor',$request->id)
                                ->get();
                        foreach($vendor_pending_orders as $vendor_pending_order){
                                $sold_cost_vendor_pending += $vendor_pending_order->final_price;
                            }
                      }
                  }
                  
               foreach($vendor_orders_ids as $vendor_completed_orders_id){
                        $vendor_completed_order_status = DB::table('orders_status_history')
                            ->where('orders_id',$vendor_completed_orders_id)->orderby('orders_status_history_id','desc')->first();
                        if($vendor_completed_order_status->orders_status_id==2){
                            $vendor_completed_orders = DB::table('orders')
                                ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                                ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                                ->where('orders.orders_id',$vendor_completed_orders_id)
                                ->where('products.vendor',$request->id)
                                ->get();
                            foreach($vendor_completed_orders as $vendor_completed_order){
                                $sold_cost_vendor_completed += $vendor_completed_order->final_price;
                            }
                        }
                    }
                    
                    $total_earned = DB::table('withdrawal')->where('vendor_id',$request->id)->where('status',1)->sum('withdrawal_request');
                    $total_products = DB::table('products')->where('vendor',$request->id)->count();
                   // $sold_costvendorcompleted = $sold_cost_vendor_completed;
                   // $sold_cost_vendorpending = $sold_cost_vendor_pending;
        return view('admin.vendor.viewearning')
                        ->with('sold_cost_vendor_pending',$sold_cost_vendor_pending)
                        ->with('sold_cost_vendor_completed',$sold_cost_vendor_completed)
                        ->with('total_earned',$total_earned)
                        ->with('total_products',$total_products)
                        ->with('products',$products);
    }
    
    public function withdrawal()
    {
        $withdrawal = DB::table('withdrawal')->where('vendor_id',Auth::user()->id)->get();
        $Last_withdrawal = DB::table('withdrawal')->where('vendor_id',Auth::user()->id)->orderBy('id','desc')->value('status');
        
        $sold_cost_vendor_pending = 0;
        $sold_cost_vendor_completed = 0;
                
        $vendor_orders_ids = DB::table('orders')
                        ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                            ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                            ->LeftJoin('currencies', 'currencies.code', '=', 'orders.currency')
                            ->where('products.vendor',Auth::user()->id)
                            //->where('customers_id','!=','')
                            ->select('orders.*')
                            ->orderBy('orders.date_purchased','DESC')
                            ->pluck('orders_id')->toArray();
                            
                foreach($vendor_orders_ids as $vendor_pending_orders_id){
                    $vendor_pending_order_status = DB::table('orders_status_history')
                            ->where('orders_id',$vendor_pending_orders_id)->orderby('orders_status_history_id','desc')->first();
                    if($vendor_pending_order_status->orders_status_id==1){
                        $vendor_pending_orders = DB::table('orders')
                                ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                                ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                                ->where('orders.orders_id',$vendor_pending_orders_id)
                                ->where('products.vendor',Auth::user()->id)
                                ->get();
                        foreach($vendor_pending_orders as $vendor_pending_order){
                                $sold_cost_vendor_pending += $vendor_pending_order->final_price;
                            }
                      }
                  }
                  
               foreach($vendor_orders_ids as $vendor_completed_orders_id){
                        $vendor_completed_order_status = DB::table('orders_status_history')
                            ->where('orders_id',$vendor_completed_orders_id)->orderby('orders_status_history_id','desc')->first();
                        if($vendor_completed_order_status->orders_status_id==2){
                            $vendor_completed_orders = DB::table('orders')
                                ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                                ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                                ->where('orders.orders_id',$vendor_completed_orders_id)
                                ->where('products.vendor',Auth::user()->id)
                                ->get();
                            foreach($vendor_completed_orders as $vendor_completed_order){
                                $sold_cost_vendor_completed += $vendor_completed_order->final_price;
                            }
                        }
                    }
        $approved_amount = DB::table('withdrawal')->where('vendor_id',Auth::user()->id)->where('status',1)->sum('withdrawal_request');
        $pending_amount  = DB::table('withdrawal')->where('vendor_id',Auth::user()->id)->where('status',0)->sum('withdrawal_request');
        $left_balance = $approved_amount+$pending_amount;
                return view('admin.Withdrawal.index')
                    ->with('withdrawal',$withdrawal)
                    ->with('sold_cost_vendor_pending',$sold_cost_vendor_pending)
                    ->with('sold_cost_vendor_completed',$sold_cost_vendor_completed)
                    ->with('approved_amount',$approved_amount)
                    ->with('left_balance',$left_balance)
                    ->with('pending_amount',$pending_amount)
                    ->with('Last_withdrawal',$Last_withdrawal);
    }
    
    public function Postwithdrawal(Request $request)
    {
        $check_balance = $request->checkbalance;
        $withdrawal_request = $request->withdrawal_request;
        
       if($withdrawal_request > $check_balance){
           return redirect()->back()->withErrors('Please enter lesser value');
       }
        
        $insert = DB::table('withdrawal')->insertGetId([
                            'withdrawal_request' => $request->withdrawal_request,
                            'special_notes' => $request->special_notes,
                            'status' => 0,
                            'vendor_id' => Auth::user()->id,
                    ]);
        
        \Session::flash('flash_message', 'Withdrawal reques has been submited successfully!');
        return redirect()->back();
    }
    
    public function vendor_withdrawal_request(Request $request)
    {
        $withdrawal_request = DB::table('withdrawal')->where('vendor_id',$request->id)->get();
        
        $approved_amount = DB::table('withdrawal')->where('vendor_id',$request->id)->where('status',1)->sum('withdrawal_request');
       // print_r($approved_amount); die;
        $sold_cost_vendor_completed = 0;
                
        $vendor_orders_ids = DB::table('orders')
                        ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                            ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                            ->LeftJoin('currencies', 'currencies.code', '=', 'orders.currency')
                            ->where('products.vendor',$request->id)
                            //->where('customers_id','!=','')
                            ->select('orders.*')
                            ->orderBy('orders.date_purchased','DESC')
                            ->pluck('orders_id')->toArray();
        
            foreach($vendor_orders_ids as $vendor_completed_orders_id){
                        $vendor_completed_order_status = DB::table('orders_status_history')
                            ->where('orders_id',$vendor_completed_orders_id)->orderby('orders_status_history_id','desc')->first();
                        if($vendor_completed_order_status->orders_status_id==2){
                            $vendor_completed_orders = DB::table('orders')
                                ->LeftJoin('orders_products', 'orders.orders_id', '=', 'orders_products.orders_id')
                                ->LeftJoin('products', 'orders_products.products_id', '=', 'products.products_id')
                                ->where('orders.orders_id',$vendor_completed_orders_id)
                                ->where('products.vendor',$request->id)
                                ->get();
                            foreach($vendor_completed_orders as $vendor_completed_order){
                                $sold_cost_vendor_completed += $vendor_completed_order->final_price;
                            }
                        }
                    }
        $avilable_balance = $sold_cost_vendor_completed-$approved_amount;
        return view('admin.vendor.withdrawal-request')
                    ->with('sold_cost_vendor_completed',$sold_cost_vendor_completed)
                    ->with('avilable_balance',$avilable_balance)
                    ->with('approved_amount',$approved_amount)
                    ->with('withdrawal_request',$withdrawal_request);
    }
    
    public function statuswithdrawal(Request $request)
    {
        $upddate = DB::table('withdrawal')->where('id',$request->id)->update(['status'=>$request->status]);
        
          \Session::flash('flash_message', 'Status has been updated successfully!');
        return redirect()->back();
    }
}

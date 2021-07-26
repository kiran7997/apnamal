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

class AboutController extends Controller
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
    
    public function about_us(Request $request)
    {
        $images  = new Images();
        $result = array();
        $allimage = $images->getimages();
        $about = DB::table('aboutus')->where('id',1)->first();
        return view('admin.About.about_us')
                    ->with('result', $result)
                    ->with('about', $about)
                    ->with('allimage',$allimage);
    }

    public function aboutus(Request $request)
    {
       $images  = new Images();
       $allimage = $images->getimages();
       
       if ($request->image) {
          $image = $request->image;
         } else {
          $image = '';
        }
        
        $insert = DB::table('aboutus')->where('id',1)->update([
                          'title_1'=> $request->title_1,
                          'title_2'=> $request->title_2,
                          'description'=> $request->description,
                          'image'=> $image,
                      ]);
        
        \Session::flash('flash_message', 'Updated successfully!');
          return redirect()->back();
    }
    
    public function donations()
    {
        $donations = DB::table('donations')->orderby('id','desc')->paginate(30);
        return view('admin.pages.donations')->with('donations',$donations);
    }
    
    public function donation($id)
    {
        $donation = DB::table('donations')->where('id',$id)->first();
        return view('admin.pages.view_donation')->with('donation',$donation);
    }
    
    public function donation_status($id){
        DB::table('donations')->where('id',$id)->update(['status'=>1]);
          \Session::flash('flash_message', 'Completed successfully!');
        return redirect()->back();
    }
    
    public function memberships() 
    {
       $membership = DB::table('membership')->get();
       return view('admin.Membership.index',compact('membership'));
    }
    
    public function membership(Request $request)
    {
        $data = DB::table('membership')->where('id',$request->id)->first();
        $payment_details = DB::table('razorpay_res')->where('sale_id',$request->id)->first();
        return view('admin.Membership.viewDetails',compact('data','payment_details'));
    }
    
    public function membership_status(Request $request)
    {
      $update = DB::table('membership')->where('id',$request->id)->update(['status'=>1]);
      
      \Session::flash('flash_message', 'Status updated successfully!');
     return redirect()->back();
    }
}
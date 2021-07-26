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
use Illuminate\Support\Str;

class BlogController extends Controller
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
    
   
    public function blogcategory()
    {
        $categories = DB::table('blog_category')->get();
        return view('admin.Blog.blogcategory',compact('categories'));
    }
    
    public function addcategory()
    {
        $categories = DB::table('blog_category')->get();
        return view('admin.Blog.addcategory',compact('categories'));
    }
    
    public function add_category(Request $request)
    {
      if(!empty($request->parent_id)){
          $parent = $request->parent_id;
      } else {
          $parent = 0;
      }
       $insert = DB::table('blog_category')->insertGetId([
                            'parent_id'=> $parent,
                            'cat_name'=> $request->cat_name,
                            'status'=> $request->status,
                        ]);
       
       \Session::flash('flash_message', 'Category added successfully!');
          return redirect()->back();
    }
    
    public function edit_category(Request $request)
    {
        $id = $request->id;
        $categories = DB::table('blog_category')->get();
        $data = DB::table('blog_category')->where('id',$request->id)->first();
        return view('admin.Blog.edit_category',compact('id','data','categories'));
    }
    
    public function update_category(Request $request)
    {
        $id = $request->id;
        if(!empty($request->parent_id)){
          $parent = $request->parent_id;
      } else {
          $parent = 0;
      }
        $update = DB::table('blog_category')->where('id',$id)->update([
                                        'parent_id'=> $parent,
                                        'cat_name'=> $request->cat_name,
                                        'status'=> $request->status,
                                    ]);
        
         \Session::flash('flash_message', 'Category updated successfully!');
          return redirect()->back();
    }
    
    public function delete_category(Request $request)
    {
        $id = $request->id;
        
        $delete = DB::table('blog_category')->where('id',$id)->delete();
        
        \Session::flash('flash_message', 'Category deleted successfully!');
         return redirect()->back();
    }
    
    public function blog()
    {
        $blogs = DB::table('blogs')->get();
        return view('admin.Blog.blog',compact('blogs'));
    }
    
    public function addblog()
    {
        $images  = new Images();
        $allimage = $images->getimages();
        $categories = DB::table('blog_category')->get();
        return view('admin.Blog.addblog',compact('categories','allimage'));
    }
    
    public function add_blog(Request $request)
    {
        $images  = new Images();
       $allimage = $images->getimages();
       $slug = Str::slug($request->title);
       if ($request->image_id) {
                $image = $request->image_id;
            } else {
                $image = '';
            }
            
        $insert = DB::table('blogs')->insertGetId([
                            'image_id'=> $image,
                            'cat_id'=> $request->cat_id,
                            'title'=> $request->title,
                            'description'=> $request->description,
                            'status'=> $request->status,
                        ]);
       
       \Session::flash('flash_message', 'Blog added successfully!');
          return redirect()->back();
    }
    
    public function edit_blog(Request $request)
    {
        $id = $request->id;
        $images  = new Images();
        $allimage = $images->getimages();
        $categories = DB::table('blog_category')->get();
        $data = DB::table('blogs')->where('id',$request->id)->first();
        return view('admin.Blog.edit_blog',compact('categories','allimage','data','id'));
    }
    
    public function update_blog(Request $request)
    {
         $images  = new Images();
       $allimage = $images->getimages();
       $slug = Str::slug($request->title);
       if ($request->image_id) {
                $image = $request->image_id;
            } else {
                $image = '';
            }
            
         $id = $request->id;
         
        $insert = DB::table('blogs')->where('id',$id)->update([
                            'image_id'=> $image,
                            'cat_id'=> $request->cat_id,
                            'title'=> $request->title,
                            'description'=> $request->description,
                            'status'=> $request->status,
                        ]);
       
       \Session::flash('flash_message', 'Blog updated successfully!');
          return redirect()->back();
    }
    
    public function delete_blog(Request $request)
    {
        $id = $request->id;
        
        $delete = DB::table('blogs')->where('id',$id)->delete();
        
        \Session::flash('flash_message', 'Blog deleted successfully!');
         return redirect()->back();
    }
}
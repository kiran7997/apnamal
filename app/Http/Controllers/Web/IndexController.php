<?php
namespace App\Http\Controllers\Web;
use Validator;
use DB;
use Hash;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lang;
use Carbon;
use Illuminate\Support\Facades\Mail;
use Session;
use View;
use Config;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\Models\Web\Currency;
use App\Models\Web\News;
use App\Models\Web\Order;


class IndexController extends Controller
{

	public function __construct(
		                  Index $index,
											News $news,
											Languages $languages,
											Products $products,
											Currency $currency,
											Order $order
											)
	{
		$this->index = $index;
		$this->order = $order;
		$this->news = $news;
		$this->languages = $languages;
		$this->products = $products;
		$this->currencies = $currency;
		$this->theme = new ThemeController();
	}

    public function index() {
        $title = array('pageTitle' => Lang::get("website.Home"));
        $newest_products = DB::table('products')->orderBy('products_id','desc')->where('products_status',1)->get();
       /*******************************Mobile Computers Products************************************/
        $mobile_computers_interest = DB::table('categories')->where('categories_slug','mobile-computers')->pluck('categories_id')->toArray();
        $mobile_products_id = DB::table('products_to_categories')->whereIn('categories_id', $mobile_computers_interest)->groupby('products_id')->pluck('products_id')->toArray();
        $mobile_computers_products = DB::table('products')->whereIn('products_id', $mobile_products_id)->where('products_status',1)->get();
        /*******************************Mobile Computers Products************************************/
        
        /*******************************TV Appliances Products************************************/
        $tv_appliances_interest = DB::table('categories')->where('categories_slug','tv-appliances-electronics')->pluck('categories_id')->toArray();
        $tv_appliances_products_id = DB::table('products_to_categories')->whereIn('categories_id', $tv_appliances_interest)->groupby('products_id')->pluck('products_id')->toArray();
        $tv_appliances_products = DB::table('products')->whereIn('products_id', $tv_appliances_products_id)->where('products_status',1)->get();
        /*******************************Mobile Computers Products************************************/
        
        /*******************************Men Fashion Products************************************/
        $men_fashion_interest = DB::table('categories')->where('categories_slug','men-fashion')->pluck('categories_id')->toArray();
        $men_fashion_products_id = DB::table('products_to_categories')->whereIn('categories_id', $men_fashion_interest)->groupby('products_id')->pluck('products_id')->toArray();
        $men_fashion_products = DB::table('products')->whereIn('products_id', $men_fashion_products_id)->where('products_status',1)->get();
        /*******************************Men Fashion Products************************************/
        
        /*******************************Women Fashion Products************************************/
        $women_fashion_interest = DB::table('categories')->where('categories_slug','men-fashion')->pluck('categories_id')->toArray();
        $women_fashion_products_id = DB::table('products_to_categories')->whereIn('categories_id', $women_fashion_interest)->groupby('products_id')->pluck('products_id')->toArray();
        $women_fashion_products = DB::table('products')->whereIn('products_id', $women_fashion_products_id)->where('products_status',1)->get();
        /*******************************Men Fashion Products************************************/
        
        $categories_products = ['mobile_computers' => $mobile_computers_products,
                                'tv_appliances' => $tv_appliances_products,
                                'men_fashion' => $men_fashion_products,
                                'women_fashion' => $women_fashion_products,
                                ];
        
        $comic = DB::table('home_page')->get();
        $authors = DB::table('manufacturers')
                        ->join('image_categories','manufacturers.manufacturer_image','=','image_categories.image_id')
                        ->where('image_categories.image_type','=','ACTUAL')
                        ->select('image_categories.*','manufacturers.*')
                        ->orderby('manufacturers.manufacturers_id','asc')
                        ->get();
        $popular_products = DB::table('products')
                        ->join('orders_products','products.products_id','=','orders_products.products_id')
                        ->select('products.*')
                        ->groupby('products.products_id')
                        ->where('products.products_status',1)
                        ->get();
//        $top_monthly_categories = DB::table('orders')
//                        ->join('orders_products','orders.orders_id','=','orders_products.orders_id')
//                        ->join('products','products.products_id','=','orders_products.products_id')
//                        ->join('products_to_categories','products.products_id','=','products_to_categories.products_id')
//                        ->join('categories','products_to_categories.categories_id','=','categories.categories_id')
//                        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
//                        ->join('image_categories','categories.categories_image','=','image_categories.image_id')
//                        ->where('categories.level',0)
//                        ->whereMonth('orders.date_purchased',Carbon\Carbon::now()->month)
//                        ->where('products.products_status',1)
//                        ->select('categories.*','categories_description.*','image_categories.*')
//                        ->groupby('categories.categories_id')
//                        ->limit(6)
//                        ->get();

        // $title = array('pageTitle' => 'Shop By Category');
        //         $category_ids = DB::table('categories')->where('categories_slug', $request->slug)->pluck('categories_id')->toArray();
        //         $products_id = DB::table('products_to_categories')->whereIn('categories_id', $category_ids)->groupby('products_id')->pluck('products_id')->toArray();
        //         $products = DB::table('products')->whereIn('products_id', $products_id)->orderby('products_id','desc')->paginate(12);
        //         $authors = DB::table('manufacturers')->get();
        //         $searchCategory = DB::table('categories')->where('categories_slug', $request->slug)->value('categories_id');
        //         return view("web.shop_by_catogory", ['title' => $title])
        //                 ->with('products', $products)->with('authors', $authors)->with('searchCategory', $searchCategory);

        $top_monthly_categories = DB::table('categories')
                        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
                        ->join('image_categories','categories.categories_image','=','image_categories.image_id')
                        ->where('categories.level',0)
                        ->select('categories.*','categories_description.*','image_categories.*')
                        ->groupby('categories.categories_id')
                        ->get();
        $sliders = DB::table('sliders_images')
                        ->join('image_categories','sliders_images.sliders_image','=','image_categories.image_id')
                        ->where('image_categories.image_type','=','ACTUAL')
                        ->select('image_categories.*')
                        ->orderby('sliders_images.sliders_id','asc')
                        ->get();
        return view("web.index", ['title' => $title])->with(['newest_products' => $newest_products,
                    'sliders' => $sliders,'authors' => $authors,'popular_products' => $popular_products,
                    'top_monthly_categories' => $top_monthly_categories,
                    'categories_products'=> $categories_products,'comic'=>$comic]);
    }

    public function maintance(){
		return view('errors.maintance');
	}

	public function error(){
		return view('errors.general_error',['msg' => $msg]);
	}

	public function privacy_policy(){
            $data = DB::table('pages')
                    ->join('pages_description','pages.page_id','=','pages_description.page_id')
                    ->where('pages.slug','privacy-policy')
                    ->where('pages.type',2)
                    ->select('pages_description.*')
                    ->first();
            return view('web.privacy_policy')->with('data',$data);
	}

	public function term_conditions(){
            $data = DB::table('pages')
                    ->join('pages_description','pages.page_id','=','pages_description.page_id')
                    ->where('pages.slug','term-conditions')
                    ->where('pages.type',2)
                    ->select('pages_description.*')
                    ->first();
            return view('web.term_conditions')->with('data',$data);
	}

	public function return_refund(){
            $data = DB::table('pages')
                    ->join('pages_description','pages.page_id','=','pages_description.page_id')
                    ->where('pages.slug','return-refund')
                    ->where('pages.type',2)
                    ->select('pages_description.*')
                    ->first();
            return view('web.return_refund')->with('data',$data);
	}

	public function faqs(){
            $data = DB::table('faqs')->get();
            return view('web.faqs')->with('data',$data);
	}

	public function become_a_vendor(){
            return view('web.become_a_vendor');
	}

	public function logout(){
		Auth::guard('customer')->logout();
		return redirect()->back();
	}
	public function test(){
		$productcategories = $this->products->productCategories1();
		echo print_r($productcategories);

	}

	private function setHeader($header_id){
		$count	= $this->order->countCompare();
		$languages = $this->languages->languages();
		$currencies = $this->currencies->getter();
		$productcategories = $this->products->productCategories();
		$title = array('pageTitle' => Lang::get("website.Home"));
		$result = array();
		$result['commonContent'] = $this->index->commonContent();

		if($header_id == 1){

			$header = (string)View::make('web.headers.headerOne',['count'=>$count,'currencies'=> $currencies,'languages' => $languages,'productcategories' => $productcategories,'result' => $result])->render();
		}
		elseif ($header_id == 2) {
			$header = (string)View::make('web.headers.headerTwo');
		}
		elseif ($header_id == 3) {
			$header = (string)View::make('web.headers.headerThree')->render();
		}
		elseif ($header_id == 4) {
			$header = (string)View::make('web.headers.headerFour')->render();
		}
		elseif ($header_id == 5) {
			$header = (string)View::make('web.headers.headerFive')->render();
		}
		elseif ($header_id == 6) {
			$header = (string)View::make('web.headers.headerSix')->render();
		}
		elseif ($header_id == 7) {
			$header = (string)View::make('web.headers.headerSeven')->render();
		}
		elseif ($header_id == 8) {
			$header = (string)View::make('web.headers.headerEight')->render();
		}
		elseif ($header_id == 9) {
			$header = (string)View::make('web.headers.headerNine')->render();
		}
		else{
			$header = (string)View::make('web.headers.headerTen')->render();
		}
		return $header;
	}

	private function setBanner($banner_id){
		if($banner_id == 1){
			$banner = (string)View::make('web.banners.banner1')->render();
		}
		elseif ($banner_id == 2) {
			$banner = (string)View::make('web.banners.banner2')->render();
		}
		elseif ($banner_id == 3) {
			$banner = (string)View::make('web.banners.banner3')->render();
		}
		elseif ($banner_id == 4) {
			$banner = (string)View::make('web.banners.banner4')->render();
		}
		elseif ($banner_id == 5) {
			$banner = (string)View::make('web.banners.banner5')->render();
		}
		elseif ($banner_id == 6) {
			$banner = (string)View::make('web.banners.banner6')->render();
		}
		elseif ($banner_id == 7) {
			$banner = (string)View::make('web.banners.banner7')->render();
		}
		elseif ($banner_id == 8) {
			$banner = (string)View::make('web.banners.banner8')->render();
		}
		elseif ($banner_id == 9) {
			$banner = (string)View::make('web.banners.banner9')->render();
		}
		elseif ($banner_id == 10) {
			$banner = (string)View::make('web.banners.banner10')->render();
		}
		elseif ($banner_id == 11) {
			$banner = (string)View::make('web.banners.banner11')->render();
		}
		elseif ($banner_id == 12) {
			$banner = (string)View::make('web.banners.banner12')->render();
		}
		elseif ($banner_id == 13) {
			$banner = (string)View::make('web.banners.banner13')->render();
		}
		elseif ($banner_id == 14) {
			$banner = (string)View::make('web.banners.banner14')->render();
		}
		elseif ($banner_id == 15) {
			$banner = (string)View::make('web.banners.banner15')->render();
		}
		elseif ($banner_id == 16) {
			$banner = (string)View::make('web.banners.banner16')->render();
		}
		elseif ($banner_id == 17) {
			$banner = (string)View::make('web.banners.banner17')->render();
		}
		elseif ($banner_id == 18) {
			$banner = (string)View::make('web.banners.banner18')->render();
		}
		elseif ($banner_id == 19) {
			$banner = (string)View::make('web.banners.banner19')->render();
		}
		else{
			$banner = (string)View::make('web.banners.banner20')->render();
		}
		return $banner;
	}

	private function setFooter($footer_id){
		if($footer_id == 1){
			$footer = (string)View::make('web.footers.footer1')->render();
		}
		elseif ($footer_id == 2) {
			$footer = (string)View::make('web.footers.footer2')->render();
		}
		elseif ($footer_id == 3) {
			$footer = (string)View::make('web.footers.footer3')->render();
		}
		elseif ($footer_id == 4) {
			$footer = (string)View::make('web.footers.footer4')->render();
		}
		elseif ($footer_id == 5) {
			$footer = (string)View::make('web.footers.footer5')->render();
		}
		elseif ($footer_id == 6) {
			$footer = (string)View::make('web.footers.footer6')->render();
		}
		elseif ($footer_id == 7) {
			$footer = (string)View::make('web.footers.footer7')->render();
		}
		elseif ($footer_id == 8) {
			$footer = (string)View::make('web.footers.footer8')->render();
		}
		elseif ($footer_id == 9) {
			$footer = (string)View::make('web.footers.footer9')->render();
		}
		else{
			$footer = (string)View::make('web.footers.footer10')->render();
		}
		return $footer;
	}
	//page
	public function page(Request $request){

		$pages = $this->order->getPages($request);
		if(count($pages)>0){
			$title = array('pageTitle' => $pages[0]->name);
			$final_theme = $this->theme->theme();
			$result['commonContent'] = $this->index->commonContent();
			$result['pages'] = $pages;
			return view("web.page", ['title' => $title,'final_theme' => $final_theme])->with('result', $result);

		}else{
			return redirect()->intended('/') ;
		}
	}

    //myContactUs
    public function contactus(Request $request) {
        $title = array('pageTitle' => Lang::get("website.Contact Us"));
        return view("web.contact-us", ['title' => $title]);
    }

    //processContactUs
    public function processContactUs(Request $request) {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        $result['commonContent'] = $this->index->commonContent();
        $send_from = $email;
        $send_to = $result['commonContent']['setting'][3]->value;
        $data = array('name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message);
//        $data = array('name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message, 'adminEmail' => $result['commonContent']['setting'][3]->value);
//        Mail::send('/mail/contactUs', ['data' => $data], function($m) use ($data) {
//            $m->to($data['adminEmail'])->subject(Lang::get("website.contact us title"))->getSwiftMessage()
//                    ->getHeaders()
//                    ->addTextHeader('x-mailgun-native-send', 'true');
//        });
        Mail::send('mail.contactUs', ['data' => $data], function ($message) use ($send_from,$send_to){
            $message->from($send_from,Lang::get("website.Ecommerce"));
            $message->to($send_to)->subject(Lang::get("website.contact us title"));
        });
        return redirect()->back()->with('success', Lang::get("website.contact us message"));
    }

    //donate
    public function donate(Request $request) {
        $title = array('pageTitle' => Lang::get("website.Contact Us"));
        return view("web.donate", ['title' => $title]);
    }

    //processDonate
    public function processDonate(Request $request) {
        $data = $request->except(array('_token'));
        $rule = array(
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'subject' => 'required',
            'message' => 'required'
        );
        $validator = \Validator::make($data, $rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages());
        }
        $donate = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        
        DB::table('donations')->insert($donate);
        
        return redirect()->back()->with('success', Lang::get("website.Donation message"));
    }

    //newsletter
    public function newsletter(Request $request) {
        $email = $request->email;
        $chk_newsletter_subscriptions = DB::table('newsletter_subscriptions')->where('email',$request->email)->get();
        if(count($chk_newsletter_subscriptions)==0){
             DB::table('newsletter_subscriptions')->insert(['email'=>$request->email]);
            $result['commonContent'] = $this->index->commonContent();
            $send_from = $result['commonContent']['setting'][3]->value;
            $send_to = $email;
            $data = array('email' => $email);
            Mail::send('mail.newsletter', ['data' => $data], function ($message) use ($send_from,$send_to){
                $message->from($send_from,Lang::get("website.Ecommerce"));
                $message->to($send_to)->subject(Lang::get("website.Subscribe for Newsletter"));
            });
            return 1;
        }else{
            return 0;
        }
    }
    
    public function about_us(Request $request)
    {
     $data = DB::table('pages')
                    ->join('pages_description','pages.page_id','=','pages_description.page_id')
                    ->where('pages.slug','about-us')
                    ->where('pages.type',2)
                    ->select('pages_description.*')
                    ->first();
        return view('web.aboutus')->with('data',$data);
    }
    
    public function blog_category(Request $request)
    {
        $blogs = DB::table('blogs')->where('cat_id',$request->id)->get();
        return view('web.blog_category',compact('blogs'));
    }
    public function single_blog(Request $request)
    {
       $blog = DB::table('blogs')->where('id',$request->id)->first();
       $image = DB::table('image_categories')->where('image_id',$blog->image_id)->value('path');
       return view('web.single_blog',compact('blog','image'));
    }
}
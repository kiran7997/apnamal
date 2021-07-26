<?php
namespace App\Http\Controllers\Web;
//validator is builtin class in laravel
use Validator;

use DB;
//for password encryption or hash protected
use Hash;

//for authenitcate login data
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;

//for requesting a value
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//for Carbon a value
use Carbon;
use Session;
use Lang;
use URL;
use App\Models\Web\Index;
use App\Models\Web\Languages;
use App\Models\Web\Products;
use App\Models\Web\Currency;
//email
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
	public function __construct(
											Index $index,
											Languages $languages,
											Products $products,
											Currency $currency
											)
	{
		$this->index = $index;
		$this->languages = $languages;
		$this->products = $products;
		$this->currencies = $currency;
		$this->theme = new ThemeController();
	}

	//shop
	public function shop(Request $request){
		$title = array('pageTitle' => Lang::get('website.Shop'));
		$result = array();

		$result['commonContent'] = $this->index->commonContent();
		$final_theme = $this->theme->theme();
		if(!empty($request->page)){
			$page_number = $request->page;
		}else{
			$page_number = 0;
		}

		if(!empty($request->limit)){
			$limit = $request->limit;
		}else{
			$limit = 15;
		}

		if(!empty($request->type)){
			$type = $request->type;
		}else{
			$type = '';
		}

		//min_max_price
		if(!empty($request->price)){
			$d = explode(";",$request->price);
			$min_price = $d[0];
			$max_price = $d[1];
		}else{
			$min_price = '';
			$max_price = '';
		}
		//category
		if(!empty($request->category) and $request->category!='all'){
			$category = $this->products->getCategories($request);

			$categories_id = $category[0]->categories_id;
			//for main
			if($category[0]->parent_id==0){
				$category_name = $category[0]->categories_name;
				$sub_category_name = '';
				$category_slug = '';
			}else{
			//for sub
				$main_category = $this->products->getMainCategories($category[0]->parent_id);

				$category_slug = $main_category[0]->categories_slug;
				$category_name = $main_category[0]->categories_name;
				$sub_category_name = $category[0]->categories_name;
			}

		}else{
			$categories_id = '';
			$category_name = '';
			$sub_category_name = '';
			$category_slug = '';
		}

		$result['category_name'] = $category_name;
		$result['category_slug'] = $category_slug;
		$result['sub_category_name'] = $sub_category_name;

		//search value
		if(!empty($request->search)){
			$search = $request->search;
		}else{
			$search = '';
		}


		$filters = array();
		if(!empty($request->filters_applied) and $request->filters_applied==1){
			$index = 0;
			$options = array();
			$option_values = array();

			$option = $this->products->getOptions();

			foreach($option as $key=>$options_data){
				$option_name = str_replace(' ','_',$options_data->products_options_name);

				if(!empty($request->$option_name)){
					$index2 = 0;
					$values = array();
					foreach($request->$option_name as $value)
					{
						$value = $this->products->getOptionsValues($value);
						$option_values[]=$value[0]->products_options_values_id;
					}
					$options[] = $options_data->products_options_id;
				}
			}


			$filters['options_count'] = count($options);

			$filters['options'] = implode($options,',');
			$filters['option_value'] = implode($option_values, ',');

                        $filters['filter_attribute']['options'] = $options;
			$filters['filter_attribute']['option_values'] = $option_values;

                        $result['filter_attribute']['options'] = $options;
			$result['filter_attribute']['option_values'] = $option_values;
		}

		$data = array('page_number'=>$page_number, 'type'=>$type, 'limit'=>$limit,
		 'categories_id'=>$categories_id, 'search'=>$search,
		 'filters'=>$filters, 'limit'=>$limit, 'min_price'=>$min_price, 'max_price'=>$max_price );

		$products = $this->products->products($data);
		$result['products'] = $products;

		$data = array('limit'=>$limit, 'categories_id'=>$categories_id );
		$filters = $this->filters($data);
		$result['filters'] = $filters;

		$cart = '';
		$result['cartArray'] = $this->products->cartIdArray($cart);

		if($limit > $result['products']['total_record']){
			$result['limit'] = $result['products']['total_record'];
		}else{
			$result['limit'] = $limit;
		}

		//liked products
		$result['liked_products'] = $this->products->likedProducts();
		$result['categories'] = $this->products->categories();

		$result['min_price'] = $min_price;
		$result['max_price'] = $max_price;

		return view("web.shop", ['title' => $title,'final_theme' => $final_theme])->with('result', $result);

	}

	public function search_by_author_name(Request $request){
            $author_name = $request->authorName;
            $authors = DB::table('manufacturers')->where('manufacturer_name','like','%'.$author_name.'%')->get();
            return view("web.append_authors")->with('authors', $authors);
	}

	public function filterProducts(Request $request){
//            echo '<pre>';
//            print_r($request->all());
//            die;
		//min_price
		
//		if(!empty($request->limit)){
//			$limit = $request->limit;
//		}else{
//			$limit = 15;
//		}

//		if(!empty($request->type)){
//			$type = $request->type;
//		}else{
//			$type = '';
//		}

		//if(!empty($request->category_id)){
//		if(!empty($request->category) and $request->category!='all'){
//                    $category = DB::table('categories')
//                            ->leftJoin('categories_description','categories_description.categories_id','=','categories.categories_id')
//                            ->where('categories_slug',$request->category)
//                            ->where('language_id',Session::get('language_id'))
//                            ->get();
//
//                    $categories_id = $category[0]->categories_id;
//		}else{
//                    $categories_id = '';
//		}
		//search value
//		if(!empty($request->search)){
//			$search = $request->search;
//		}else{
//			$search = '';
//		}

		//min_price
//		if(!empty($request->min_price)){
//			$min_price = $request->min_price;
//		}else{
//			$min_price = '';
//		}
//
//		//max_price
//		if(!empty($request->max_price)){
//			$max_price = $request->max_price;
//		}else{
//			$max_price = '';
//		}

//		if(!empty($request->filters_applied) and $request->filters_applied==1){
//			$filters['options_count'] = count($request->options_value);
//			$filters['options'] = $request->options;
//			$filters['option_value'] = $request->options_value;
//		}else{
//			$filters = array();
//		}
//
//		$data = array('page_number'=>$request->page_number,
//                        //'type'=>$type,
//                        //'limit'=>$limit, 
//                        'categories_id'=>$categories_id,
//                        //'search'=>$search,
//                        //'filters'=>$filters,
//                        'min_price'=>$min_price,
//                        'max_price'=>$max_price
//                    );

                $categoryid = $request->categoryid;
                $authorids = $request->authorids;
                $ratings = $request->ratings;
                /*echo '<pre>';
                print_r($ratings);
                die;*/
                if($request->sortby==1){
                    $sortby = 'products.products_id';
                    $sortbyvalue = 'desc';
                }elseif($request->sortby==2){
                    $sortby = 'products.products_ordered';
                    $sortbyvalue = 'desc';
                }elseif($request->sortby==3){
                    $sortby = 'products.avg_rating';
                    $sortbyvalue = 'desc';
                }elseif($request->sortby==4){
                    $sortby = 'products.products_price';
                    $sortbyvalue = 'asc';
                }elseif($request->sortby==5){
                    $sortby = 'products.products_price';
                    $sortbyvalue = 'desc';
                }
                
                

		$query = DB::table('products')
    				->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
    				->leftJoin('products_description','products_description.products_id','=','products.products_id')
                                ->LeftJoin('image_categories','products.products_image','=','image_categories.image_id')
                                ->LeftJoin('products_to_categories','products.products_id','=','products_to_categories.products_id')
                                ->where(function ($query) use ($categoryid, $authorids, $ratings) {
                                    if (isset($categoryid) && !empty($categoryid)) {
                                        $query->where('products_to_categories.categories_id',$categoryid);
                                    }
                                    if (isset($authorids) && !empty($authorids)) {
                                        $query->whereIn('products.manufacturers_id',$authorids);
                                    }
                                    if (isset($ratings) && !empty($ratings)) {
//                                        for ($i = 0; $i < count($ratings); $i++){
//                                            $query->where(DB::raw('bookname like %'.$element.'%'));
//                                            $query->where('products.avg_rating','>=',$ratings[$i]);
//                                        }
                                        $query->whereIn('products.avg_rating',$ratings);
                                    }
                                })
                                ->where('products.products_status',1)
                                ->groupBy('products.products_id')
                                ->orderby($sortby,$sortbyvalue);
                                
            if($request->has('searchText') && !empty($request->searchText))
            {
            	$query->where('products_description.products_name',"LIKE","%".$request->searchText."%");
            }
            if($request->has('price') && !empty($request->price))
            {
                if(!empty($request->min)){
            		$min_price = $request->min;
            	}else{
            		$min_price = 0;
            	}
            	//max_price
            	if(!empty($request->max)){
            		$max_price = $request->max;
            	}else{
            		$max_price = 100000;
            	}
            	
            	$query->whereBetween('products.products_price', [$min_price, $max_price]);
            }
            
            $products = $query->get();
                        
//            echo '<pre>';
//            print_r($products);
//            die;

//		$cart = '';
//		$result['cartArray'] =  $this->products->cartIdArray($cart);
//		$result['limit'] = $limit;
		return view("web.filterproducts")->with('products', $products);

	}

	public function filterVendorProducts(Request $request){
            $vendorid = $request->vendorid;
            if($request->vendorsortby==1){
                $sortby = 'products.products_id';
                $sortbyvalue = 'desc';
            }elseif($request->vendorsortby==2){
                $sortby = 'products.products_ordered';
                $sortbyvalue = 'desc';
            }elseif($request->vendorsortby==3){
                $sortby = 'products.avg_rating';
                $sortbyvalue = 'desc';
            }elseif($request->vendorsortby==4){
                $sortby = 'products.products_price';
                $sortbyvalue = 'asc';
            }elseif($request->vendorsortby==5){
                $sortby = 'products.products_price';
                $sortbyvalue = 'desc';
            }

            $products = DB::table('products')
                            ->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->leftJoin('products_description','products_description.products_id','=','products.products_id')
                            ->LeftJoin('image_categories','products.products_image','=','image_categories.image_id')
                            ->LeftJoin('products_to_categories','products.products_id','=','products_to_categories.products_id')
                            ->where('products.vendor',$vendorid)
                            ->where('products.products_status',1)
                            ->groupBy('products.products_id')
                            ->orderby($sortby,$sortbyvalue)
                            ->get();
            return view("web.filterVendorProducts")->with('products', $products);
	}

	public function autocomplete(Request $request){
            $products = DB::table('products')
                            ->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->leftJoin('products_description','products_description.products_id','=','products.products_id')
                            ->LeftJoin('image_categories','products.products_image','=','image_categories.image_id')
                            ->LeftJoin('products_to_categories','products.products_id','=','products_to_categories.products_id')
                            ->where('products_description.products_name',"LIKE","%".$request->input('query')."%")
                            ->where('products.products_status',1)
                            ->groupBy('products.products_id')
                            ->orderby('products.products_id','desc')
                            ->get();
            return view("web.search_results")->with('products', $products);
        }
        
        public function search(Request $request){
        	// dd($request);
            $search = $request->search;
            $searchCategory = $request->searchCategory;
            $products = $filteredProducts = DB::table('products')
                            ->leftJoin('manufacturers','manufacturers.manufacturers_id','=','products.manufacturers_id')
                            ->leftJoin('products_description','products_description.products_id','=','products.products_id')
                            ->LeftJoin('image_categories','products.products_image','=','image_categories.image_id')
                            ->LeftJoin('products_to_categories','products.products_id','=','products_to_categories.products_id')
                            // ->where('products_description.products_name',"LIKE","%".$request->input('query')."%")
							->where('products_description.products_name',"LIKE","%".$search."%")
                            ->where(function ($query) use ($search, $searchCategory) {
                                if (!empty($search)) {
                                    $query->where('products_description.products_name',"LIKE","%".$search."%");
                                }
                                if ($searchCategory!='all') {
                                    $query->where('products_to_categories.categories_id',$searchCategory);
                                }
                            })
                            ->where('products.products_status',1)
                           // ->groupBy('products.products_id')
                            ->orderby('products.products_id','desc')
                            ->paginate(30);
            $authors = DB::table('manufacturers')->get();
            // dd($products->count());
            return view("web.shop_by_catogory",compact('filteredProducts','products', 'authors','searchCategory','search'));
        }

	public function ModalShow(Request $request){

				$title 			= 	array('pageTitle' => Lang::get('website.Product Detail'));
				$result 		= 	array();
				$result['commonContent'] = $this->index->commonContent();
				$final_theme = $this->theme->theme();
				//min_price
				if(!empty($request->min_price)){
					$min_price = $request->min_price;
				}else{
					$min_price = '';
				}

				//max_price
				if(!empty($request->max_price)){
					$max_price = $request->max_price;
				}else{
					$max_price = '';
				}

				if(!empty($request->limit)){
					$limit = $request->limit;
				}else{
					$limit = 15;
				}

				$products = $this->products->getProductsById($request->products_id);

				//category
				$category = $this->products->getCategoryByParent($products[0]->products_id);


				if(!empty($category)){
					$category_slug = $category[0]->categories_slug;
					$category_name = $category[0]->categories_name;
				}else{
					$category_slug = '';
					$category_name = '';
				}
				$sub_category = $this->products->getSubCategoryByParent($products[0]->products_id);

				if(!empty($sub_category) and count($sub_category)>0){
					$sub_category_name = $sub_category[0]->categories_name;
					$sub_category_slug = $sub_category[0]->categories_slug;
				}else{
					$sub_category_name = '';
					$sub_category_slug = '';
				}

				$result['category_name'] = $category_name;
				$result['category_slug'] = $category_slug;
				$result['sub_category_name'] = $sub_category_name;
				$result['sub_category_slug'] = $sub_category_slug;

				$isFlash = $this->products->getFlashSale($products[0]->products_id);


				if(!empty($isFlash) and count($isFlash)>0){
					$type = "flashsale";
				}else{
					$type = "";
				}

				$data = array('page_number'=>'0', 'type'=>$type, 'products_id'=>$products[0]->products_id, 'limit'=>$limit, 'min_price'=>$min_price, 'max_price'=>$max_price);
				$detail = $this->products->products($data);
				$result['detail'] = $detail;

				$i = 0;
				foreach($result['detail']['product_data'][0]->categories as $postCategory){
					if($i==0){
						$postCategoryId = $postCategory->categories_id;
						$i++;
					}
				}

				$data = array('page_number'=>'0', 'type'=>'', 'categories_id'=>$postCategoryId, 'limit'=>$limit, 'min_price'=>$min_price, 'max_price'=>$max_price);
				$simliar_products = $this->products->products($data);
				$result['simliar_products'] = $simliar_products;

				$cart = '';
				$result['cartArray'] = $this->products->cartIdArray($cart);

				//liked products
				$result['liked_products'] = $this->products->likedProducts();
		return view("web.common.modal1")->with('result', $result);
	}

	//access object for custom pagination
	function accessObjectArray($var){
	  return $var;
	}

	//productDetail
    public function productDetail(Request $request) {
        $title = array('pageTitle' => Lang::get('website.Product Detail'));
        $product = DB::table('products')->where('products_slug', $request->slug)->first();
        $product_main_image = DB::table('image_categories')->where('image_id', $product->products_image)->value('path');
        $product_images_ids = DB::table('products_images')->where('products_id', $product->products_id)->pluck('image')->toArray();
        $product_images = DB::table('image_categories')->whereIn('image_id', $product_images_ids)->where('image_type','ACTUAL')->pluck('path')->toArray();
        $product_name = DB::table('products_description')->where('products_id', $product->products_id)->first();

        $product_category_id = DB::table('products_to_categories')->where('products_id', $product->products_id)->pluck('categories_id');
        $related_products_ids = DB::table('products_to_categories')->whereIn('categories_id', $product_category_id)->pluck('products_id');
        $related_products = DB::table('products')->whereIn('products_id', $related_products_ids)->where('products_id','!=',$product->products_id)->get();
        $same_new_products = DB::table('products')->whereIn('products_id', $related_products_ids)
                ->where('products_id','!=',$product->products_id)->inRandomOrder()->limit(2)->get();

        return view("web.productDetail", ['title' => $title])->with('product', $product)
            ->with('product_main_image', $product_main_image)
            ->with('product_images', $product_images)
            ->with('product_name', $product_name)
            ->with('same_new_products', $same_new_products)
            ->with('related_products', $related_products);
    }

    public function shop_by_catogory(Request $request) {
        $title = array('pageTitle' => 'Shop By Category');
        $category_ids = DB::table('categories')->where('categories_slug', 'LIKE', $request->slug)->pluck('categories_id')->toArray();
        $products_id = DB::table('products_to_categories')->whereIn('categories_id', $category_ids)->groupby('products_id')->pluck('products_id')->toArray();
        $products = DB::table('products')->whereIn('products_id', $products_id)->orderby('products_id','desc')->paginate(12);
        $authors = DB::table('manufacturers')->get();
        $searchCategory = DB::table('categories')->where('categories_slug', 'LIKE',$request->slug)->value('categories_id');
        return view("web.shop_by_catogory", ['title' => $title])
                ->with('products', $products)->with('authors', $authors)->with('searchCategory', $searchCategory);
    }
    
    public function new_release(Request $request) {
        $title = array('pageTitle' => 'New Release');
        $products = $newest_products = DB::table('products')->orderBy('products_id','desc')->where('products_status',1)->paginate(12);
        return view("web.shop_by_catogory", ['title' => $title])
                ->with('products', $products);
    }
    
    public function best_selling(Request $request) {
        $title = array('pageTitle' => 'Best Sellers');
        $products = DB::table('products')
                        ->join('orders_products','products.products_id','=','orders_products.products_id')
                        ->select('products.*')
                        ->groupby('products.products_id')
                        ->where('products.products_status',1)->paginate(12);
        return view("web.shop_by_catogory", ['title' => $title])
                ->with('products', $products);
    }
    
    public function shop_all(Request $request) {
        $title = array('pageTitle' => 'Shop');
        $products = DB::table('products')->paginate(12);
        $authors = DB::table('manufacturers')->get();
        return view("web.shop_by_catogory", ['title' => $title])
                ->with('products', $products)->with('authors', $authors);
    }

    //productDetail
	public function get_product_details_modal(Request $request){
            $array = array();
            $product = DB::table('products')->where('products_id',$request->id)->first();
            $product_image = DB::table('image_categories')->where('image_id',$product->products_image)->value('path');
            $products_name = DB::table('products_description')->where('products_id',$product->products_id)->value('products_name');
            $author_name = DB::table('manufacturers')->where('manufacturers_id',$product->manufacturers_id)->value('manufacturer_name');
            $vendor_firstname = DB::table('users')->where('id',$product->vendor)->value('first_name');
            $vendor_lastname = DB::table('users')->where('id',$product->vendor)->value('last_name');
            $count_review = DB::table('reviews')->where('products_id',$request->id)->count();
            $rating_avg = DB::table('reviews')->where('products_id',$request->id)->sum('reviews_rating');
            
             if(!empty($count_review)){
                 $total = $rating_avg/$count_review;
             } else {
                 $total = '';
             }
            
            $array = array(
                'image'=>URL::asset('/'.$product_image),
                'products_name'=>$products_name,
                'specification'=>$product->specification,
                'products_price'=>$product->products_price,
                'product_id'=>$product->products_id,
                'vendor_name' => $vendor_firstname.' '.$vendor_lastname,
                'author_name'=>$author_name,
                'count_review'=>$count_review,
                'average_rating' => round($total),
                );
            return $array;
            //return view("web.detail", ['title' => $title, 'final_theme' => $final_theme])->with('result', $result);
	}

	//filters
	public function filters($data){
    $response = $this->products->filters($data);
		return($response);
		}

	//getquantity
	public function getquantity(Request $request){
		$data = array();
		$data['products_id'] = $request->products_id;
		$data['attributes'] = $request->attributeid;

		$result = $this->products->productQuantity($data);
		print_r(json_encode($result));
	}

        public function productreview(Request $request)
        {
            DB::table('reviews')->insert([
                'review_comment'=>$request->review_comment,
                'reviews_rating'=>$request->rating,
                'products_id'=>$request->products_id,
                'customers_id'=>auth()->guard('customer')->user()->id,
            ]);
            $count_review = DB::table('reviews')->where('products_id',$request->products_id)->count();
            $review_sum = DB::table('reviews')->where('products_id',$request->products_id)->sum('reviews_rating');
            $total = $review_sum/$count_review;
            
            DB::table('products')->where('products_id',$request->products_id)->update(['avg_rating'=>round($total)]);
            
            \Session::flash('flash_message', 'Thanks for your review..');
            return redirect()->back();
        }
}

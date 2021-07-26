<?php $alll_main_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->join('image_categories','image_categories.image_id','=','categories.categories_icon')
        ->where('categories.level','=',0)
        ->select('categories_description.*','image_categories.*','categories.categories_slug as categories_slug')
        ->groupBy('categories.categories_id')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>

<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="ps-container">
            <div class="header__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><a href="{{url('/shop')}}"><i class="icon-menu"></i><span>SHOP BY CATEGORY</span></a></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            @if(count($alll_main_categories)>0)
                                @foreach($alll_main_categories as $alll_main_category)
                                    <?php $alll_sub_categories = DB::table('categories')
                                            ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
                                            ->where('categories.parent_id',$alll_main_category->categories_id)
                                            ->where('categories.level','=',1)
                                            ->select('categories_description.*','categories.categories_slug as categories_slug')
                                            ->orderBy('categories.categories_id','asc')
                                            ->get();
                                    ?>
                                    @if(count($alll_sub_categories)==0)
                                        <li class="current-menu-item "><a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}"><img src="{{URL::to($alll_main_category->path)}}" width="20px"> {{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                                        </li>
                                    @endif
                                    @if(count($alll_sub_categories)>0)
                                    <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}"><img src="{{URL::to($alll_main_category->path)}}" width="20px"> {{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                                        <div class="mega-menu">
                                            @foreach($alll_sub_categories as $alll_sub_category)
                                            <div class="mega-menu__column">
                                                <a href="{{URL::to('shop-by-category/'.$alll_sub_category->categories_slug)}}"><h4>{{isset($alll_sub_category->categories_name) ? $alll_sub_category->categories_name : null}}<span class="sub-toggle"></span></h4></a>
                                                <?php $alll_sub_sub_categories = DB::table('categories')
                                                        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
                                                        ->where('categories.parent_id',$alll_sub_category->categories_id)
                                                        ->where('categories.level','=',2)
                                                        ->select('categories_description.*','categories.categories_slug as categories_slug')
                                                        ->orderBy('categories.categories_id','asc')
                                                        ->get();
                                                ?>
                                                @if(count($alll_sub_sub_categories)>0)
                                                <ul class="mega-menu__list">
                                                    @foreach($alll_sub_sub_categories as $alll_sub_sub_category)
                                                    <li class="current-menu-item "><a href="{{URL::to('shop-by-category/'.$alll_sub_sub_category->categories_slug)}}">{{isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div><a class="ps-logo" href="{{URL::to('/')}}"><img src="{{asset('').$result['setting'][15]->value}}" alt=""></a>
            </div>
<?php $alll_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.level','=',0)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
            <div class="header__center">
                <form class="ps-form--quick-search" action="{{URL::to('/search')}}" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control" name="searchCategory">
                            <option value="all">All</option>
                            @if(count($alll_categories)>0)
                            @foreach($alll_categories as $alll_category)
                                <option class="level-0" value="{{$alll_category->categories_id}}">{{isset($alll_category->categories_name) ? $alll_category->categories_name : null}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <input class="form-control typeahead" type="text" name="search" placeholder="I'm shopping for..." id="input-search">
                    <button type="submit">Search</button>
                    <div class="ps-panel--search-result"  id="search_results">
                        <div class="ps-panel__content">
                        </div>
                        <div class="ps-panel__footer text-center"><a href="{{URL::to('/shop')}}">See all results</a></div>
                    </div>
                </form>
            </div>
            <div class="header__right">
                <div class="header__actions">
                    <!--<a class="header__extra" href="{{URL::to('/donate')}}"><i class="fa fa-book" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="DONATES BOOKS"></i></a>-->
    <?php
        $dattaa = array();
        $resultt['wishlist'] = App\Models\Web\Customer::wishlist1($dattaa);
    ?>
                    <a class="header__extra" href="{{URL::to('/wishlist')}}">
                        <i class="icon-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                        <span>
                            <i>@if(auth()->guard('customer')->check()) {{count($resultt['wishlist']['products']['product_data'])}} @else 0 @endif</i>
                        </span>
                    </a>
    <?php
        $dataa = array();
        $resultt['cart'] = $result['cart'] = App\Models\Web\Cart::myCart1($dataa);
    ?>
                    @if(count($resultt['cart'])>0)
                    <div class="ps-cart--mini" id="appendCart">
                        @if(isset($resultt['cart']))
                        <a class="header__extra" href="{{URL::to('/viewcart')}}"><i class="icon-bag2"></i><span><i>{{count($resultt['cart'])}}</i></span></a>
                        @else
                        <a class="header__extra" href="{{URL::to('/viewcart')}}"><i class="icon-bag2"></i><span><i>0</i></span></a>
                        @endif
                        <div class="ps-cart__content">
                            <div class="ps-cart__items">
                            <?php $Subtotall = 0; ?>
                               @if(isset($resultt['cart']))
                                @foreach($resultt['cart'] as $roww)
                                <?php
                                $products_vendor = DB::table('products')->where('products_id',$roww->products_id)->value('vendor');
                                $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                              ?>
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail"><a href="{{URL::to('product-detail/'.$roww->products_slug)}}"><img src="{{URL::asset('/'.$roww->image_path)}}" alt="image"></a></div>
                                    <div class="ps-product__content">
                                        <a class="ps-product__remove" href="{{URL::to('delete-cart/'.$roww->customers_basket_id)}}" onclick="return confirm('Are you sure?');"><i class="icon-cross"></i></a>
                                        <a href="{{URL::to('product-detail/'.$roww->products_slug)}}">{{$roww->products_name}}</a>
                                       <p>Seller:<strong> {{$first_name}}  {{$last_name}}</strong></p><small>{{$roww->customers_basket_quantity}} x <i class="fa fa-inr"></i>{{$roww->price}}</small>
                                    </div>
                                </div>
                                    <?php $Subtotall += $roww->customers_basket_quantity*$roww->price; ?>
                                @endforeach
                                @endif
                            </div>
                            <div class="ps-cart__footer">
                                <h3>Sub Total:<strong><i class="fa fa-inr"></i>{{$Subtotall}}</strong></h3>
                                <figure>
                                    <a class="ps-btn" href="{{URL::to('/viewcart')}}">View Cart</a>
                                    @if(isset($resultt['cart']) && count($resultt['cart'])>0)
                                        @if(auth()->guard('customer')->check())
                                        <a class="ps-btn" href="{{URL::to('/checkout')}}">Checkout</a>
                                        @else
                                        <a class="ps-btn" href="{{URL::to('/guest_checkout')}}">Checkout</a>
                                        @endif
                                    @endif
                                </figure> 
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="ps-block--user-header">
                        @if(auth()->guard('customer')->check())
                            @if(auth()->guard('customer')->user()->user_type==2)
                                <div class="ps-block__left"><a href="{{URL::to('/profile')}}"><i class="icon-user"></i></a></div>
                            @else
                                <div class="ps-block__left"><a href="{{URL::to('/profile')}}"><i class="icon-user"></i></a></div>
                            @endif
                        @else
                        <div class="ps-block__left"><i class="icon-user"></i></div>
                        @endif
                        <div class="ps-block__right">
                            @if(auth()->guard('customer')->check())
                                <a href="{{URL::to('/logout')}}">Logout</a>
                            @else
                                <a href="{{URL::to('/login')}}">Login</a>
                                <a href="{{URL::to('/signup')}}">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="ps-container">
            <div class="navigation__left">
                <div class="menu--product-categories">
                    <div class="menu__toggle"><a href="{{url('/shop')}}"><i class="icon-menu"></i><span> SHOP BY CATEGORY</span></a></div>
                    <div class="menu__content">
                        <ul class="menu--dropdown">
                            @if(count($alll_main_categories)>0)
                                @foreach($alll_main_categories as $alll_main_category)
                                    <?php $alll_sub_categories = DB::table('categories')
                                            ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
                                            ->where('categories.parent_id',$alll_main_category->categories_id)
                                            ->where('categories.level','=',1)
                                            ->select('categories_description.*','categories.categories_slug')
                                            ->orderBy('categories.categories_id','asc')
                                            ->get();
                                    ?>
                                    @if(count($alll_sub_categories)==0)
                                        <li class="current-menu-item "><a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}"><img src="{{URL::to($alll_main_category->path)}}" width="20px"> {{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                                        </li>
                                    @endif
                                    @if(count($alll_sub_categories)>0)
                                    <li class="current-menu-item menu-item-has-children has-mega-menu"><a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}"><img src="{{URL::to($alll_main_category->path)}}" width="20px"> {{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                                        <div class="mega-menu">
                                            @foreach($alll_sub_categories as $alll_sub_category)
                                            <div class="mega-menu__column">
                                                <a href="{{URL::to('shop-by-category/'.$alll_sub_category->categories_slug)}}"><h4>{{isset($alll_sub_category->categories_name) ? $alll_sub_category->categories_name : null}}<span class="sub-toggle"></span></h4></a>
                                                <?php $alll_sub_sub_categories = DB::table('categories')
                                                        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
                                                        ->where('categories.parent_id',$alll_sub_category->categories_id)
                                                        ->where('categories.level','=',2)
                                                        ->select('categories_description.*','categories.categories_slug')
                                                        ->orderBy('categories.categories_id','asc')
                                                        ->get();
                                                ?>
                                                @if(count($alll_sub_sub_categories)>0)
                                                <ul class="mega-menu__list">
                                                    @foreach($alll_sub_sub_categories as $alll_sub_sub_category)
                                                    <li class="current-menu-item "><a href="{{URL::to('shop-by-category/'.$alll_sub_sub_category->categories_slug)}}">{{isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <?php
             $category_blgo = DB::table('blog_category')->where('parent_id','!=',0)->get()
            ?>
            <div class="navigation__right">
                <ul class="menu">
                    <li class="menu-item"><a href="{{URL::to('/best-selling')}}">Best Sellers</a><span class="sub-toggle"></span></li>
                    <li class="menu-item"><a href="{{URL::to('/new-release')}}">New Release</a><span class="sub-toggle"></span></li>
                    <!-- <li class="menu-item-has-children"><a href="{{url('blog-category/'.Str_slug('EDUCATOR TOOLS').'/'.'1')}}">New Release</a><span class="sub-toggle"></span>-->
                    <!--    <ul class="sub-menu">-->
                    <!--      @if(count($category_blgo)>0)-->
                    <!--         @foreach($category_blgo as $category)-->
                    <!--        <li class="current-menu-item "><a href="{{url('blog-category/'.Str_slug($category->cat_name).'/'.$category->id)}}">{{$category->cat_name}}</a></li>-->
                    <!--        @endforeach-->
                    <!--      @endif-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children has-mega-menu"><a href="{{URL::to('/vendor-registration')}}">PARTTNER WITH US</a><span class="sub-toggle"></span>-->
                    <!--    <div class="mega-menu">-->
                    <!--        <div class="mega-menu__column">-->
                    <!--            <ul class="mega-menu__list">-->
                    <!--                <li class="current-menu-item "><a href="{{url('admin/login')}}">MY LIBRARY</a></li>-->
                    <!--                <li class="current-menu-item "><a href="{{url('admin/login')}}">MY BOOKLIST</a></li>-->
                    <!--                <li class="current-menu-item "><a href="{{URL::to('/vendor-registration')}}">CREATE A LIBRARY SITE.</a></li>-->
                    <!--            </ul>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="menu-item"><a href="{{url('blog-category/'.Str_slug('PROFESSIONAL DEVELOPMENT').'/'.'10')}}">PROFESSIONAL DEVELOPMENT</a></li>-->
                </ul>
            </div>
        </div>
    </nav>
</header>

<header class="header header--mobile" data-sticky="true">
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{url('/')}}"><img src="{{asset('').$result['setting'][15]->value}}"  alt=""></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini">
                    @if(isset($result['cart']))
                        <a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>{{count($result['cart'])}}</i></span></a>
                    @else
                        <a class="header__extra" href="#" ><i class="icon-bag2"></i><span><i>0</i></span></a>
                    @endif
                	
                    <div class="ps-cart__content">
                        <div class="ps-cart__items">
                        <?php $Subtotall = 0; ?>
                         @if(isset($result['cart']))
                            @foreach($result['cart'] as $row)
                                <?php
                                    $products_vendor = DB::table('products')->where('products_id',$row->products_id)->value('vendor');
                                    $first_name = DB::table('users')->where('id',$products_vendor)->value('first_name');
                                    $last_name = DB::table('users')->where('id',$products_vendor)->value('last_name');
                                    $productDetails = DB::table('products')->where('products_id',$row->products_id)->first();
                                ?>  
                                <div class="ps-product--cart-mobile">
                                    <div class="ps-product__thumbnail">
                                    	<a href="{{URL::to('product-detail/'.$row->products_slug)}}">
                                        <img src="{{URL::asset('/'.$row->image_path)}}" alt="{{$row->products_name}}">
                                        </a>
                                    </div>
                                    <div class="ps-product__content">
                                    	<a class="ps-product__remove" href="{{URL::to('delete-cart/'.$row->customers_basket_id)}}" onclick="return confirm('Are you sure?');">
                                        	<i class="icon-cross"></i>
                                        </a>
                                        <a href="{{URL::to('product-detail/'.$row->products_slug)}}">{{$row->products_name}}</a>
                                        <p>Seller: <strong> {{$first_name}}  {{$last_name}}</strong></p><small>{{$row->customers_basket_quantity}} x ₹{{$row->price}}</small>
                                    </div>
                                </div>
                                <br>
                                <?php $Subtotall += $row->customers_basket_quantity*$row->price; ?>
                            @endforeach
                        @endif
                        </div>
                        <div class="ps-cart__footer">
                            <h3>Sub Total:<strong><i class="fa fa-inr" aria-hidden="true"></i>₹{{$Subtotall}}</strong></h3>
                            <figure>
                               @if(auth()->guard('customer')->check())
                                    <a class="ps-btn" href="{{URL::to('/checkout')}}">Proceed to checkout</a>
                                @else
                                    <a class="ps-btn" href="{{URL::to('/guest_checkout')}}">Proceed to checkout</a>
                                @endif
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="ps-block--user-header">
                    @if(auth()->guard('customer')->check())
                    <div class="ps-block__left"><a href="{{URL::to('/profile')}}"><i class="icon-user"></i></a></div>
                    @else
                    <div class="ps-block__left"><a href="{{URL::to('/login')}}"><i class="icon-user"></i></a></div>
                    @endif
                    <div class="ps-block__right">
                        @if(auth()->guard('customer')->check())
                        <a href="{{URL::to('/logout')}}">Logout</a>
                        @else
                        <a href="{{URL::to('/login')}}">Login</a>
                        <a href="{{URL::to('/signup')}}">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
    	<form class="ps-form--search-mobile" action="{{URL::to('/search')}}" method="get">
        	<div class="form-group--nest">
            	<input class="form-control typeahead" type="text" name="search" placeholder="I'm shopping for..." id="input-search-mobile">
                	<button type="submit"><i class="icon-magnifier"></i></button>
            </div>
        	<div class="ps-panel--search-result"  id="search_results_mobile">
        		<div class="ps-panel__content">
        		</div>
                <div class="ps-panel__footer text-center">
                    <a href="{{URL::to('/shop')}}">See all results</a>
                </div>
			</div>
		</form>
	</div>
</header>
@extends('web.layout')
@section('content')
<div class="ps-layout--shop mt-5" data-select2-id="11">
    <div class="ps-layout__left">
        <aside class="widget widget_shop">
            <div class="ps-block__container">
                <div class="ps-block__thumbnail">
                  @if(!empty($result['vendor']->avatar))
                    <img src="{{URL::asset('/'.$result['vendor']->avatar)}}" alt="">
                   @endif
                </div>
                <div class="ps-block__header mt-3">
                    <h4>{{isset($result['vendor']->first_name) ? $result['vendor']->first_name : null}}  {{isset($result['vendor']->last_name) ? $result['vendor']->last_name : null}}</h4>
                    <div class="br-wrapper br-theme-fontawesome-stars">
                        <!--<select class="ps-rating" data-read-only="true" style="display: none;">-->
                        <!--    <option value="1">1</option>-->
                        <!--    <option value="1">2</option>-->
                        <!--    <option value="1">3</option>-->
                        <!--    <option value="1">4</option>-->
                        <!--    <option value="2">5</option>-->
                        <!--</select>-->
                        <?php
                         if(!empty($result['review_count'])){
                        $total_review = $result['total_review_sum']/$result['review_count'];
                       } else {
                           $total_review = '';
                      }
                      $round_review = round($total_review);
                        ?>
                        <div class="br-widget br-readonly">
                                    @if($round_review == 5)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="5" class="br-selected br-current"></a>
                                          @elseif($round_review == 4)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 3)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 2)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @elseif($round_review == 1)
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @else
                                            <a href="javascript:;" data-rating-value="1" data-rating-text="1" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="2" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="3" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="4" class=""></a>
                                            <a href="javascript:;" data-rating-value="2" data-rating-text="5"></a>
                                          @endif
                            <div class="br-current-rating">1</div>
                          </div>
                        </div>
                    
                </div><span class="ps-block__divider"></span>
                <div class="ps-block__content">
                    <p><strong>{{isset($result['vendor']->first_name) ? $result['vendor']->first_name : null}}  {{isset($result['vendor']->last_name) ? $result['vendor']->last_name : null}}</strong>, {{isset($result['vendor']->company_description) ? $result['vendor']->company_description : null}}</p>
                    <figure>
                        <figcaption>Foloow us on social</figcaption>
                        <ul class="ps-list--social-color">
                          @if(!empty($result['vendor']->facebook_link))
                            <li><a class="facebook" target="_blank" href="{{url($result['vendor']->facebook_link)}}"><i class="fa fa-facebook"></i></a></li>
                            @else
                            <li><a class="facebook" href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                         @endif
                         @if(!empty($result['vendor']->twitter_link))
                            <li><a class="twitter"  target="_blank" href="{{url($result['vendor']->twitter_link)}}"><i class="fa fa-twitter"></i></a></li>
                            @else
                            <li><a class="twitter" href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                         @endif
                         @if(!empty($result['vendor']->linkdein_link))
                            <li><a class="linkedin" target="_blank" href="{{url($result['vendor']->linkdein_link)}}"><i class="fa fa-linkedin"></i></a></li>
                            @else
                            <li><a class="linkedin" href="javascript:;"><i class="fa fa-linkedin"></i></a></li>
                         @endif
                         @if(!empty($result['vendor']->rss_link))
                            <li><a class="feed" target="_blank" href="{{url($result['vendor']->rss_link)}}"><i class="fa fa-feed"></i></a></li>
                           @else
                            <li><a class="feed" href="javascript:;"><i class="fa fa-feed"></i></a></li>
                          @endif
                        </ul>
                    </figure> 
                </div>
                <div class="ps-block__footer">
                    <p>Call us directly<strong>{{isset($result['vendor']->phone) ? $result['vendor']->phone : null}}</strong></p>
                    <p>or Or if you have any question</p><a class="ps-btn ps-btn--fullwidth" href="">Contact Seller</a>
                </div>
            </div>

        </aside>

    </div>

    <div class="ps-layout__right" data-select2-id="10">

        <div class="ps-shopping ps-tab-root" data-select2-id="9">
            <div class="ps-shopping__header">

                <div class="ps-shopping__actions" data-select2-id="8">
                    <select class="ps-select select2-hidden-accessible filterVendorProducts" data-vendorid="{{isset($result['vendor']->id) ? $result['vendor']->id : null}}" id="vendorsortby" data-placeholder="Sort Items" data-select2-id="4" tabindex="-1" aria-hidden="true">
                        <option value="1">Sort by latest</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by average rating</option>
                        <option value="4">Sort by price: low to high</option>
                        <option value="5">Sort by price: high to low</option>
                    </select>
<!--                    <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="5" style="width: 200px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-h5e4-container"><span class="select2-selection__rendered" id="select2-h5e4-container" role="textbox" aria-readonly="true" title="Sort by latest">Sort by latest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->

                </div>
            </div>
            <div class="ps-tabs">
                <div class="ps-tab active append_vendor_products" id="tab-1">
                    <div class="ps-shopping-product">
                        <div class="row">
                            
                         @if(count($result['vendor_prodcuts']))
                             @foreach($result['vendor_prodcuts'] as $newest_product)
                 <?php
                    $newest_product_main_image = DB::table('image_categories')->where('image_id',$newest_product->products_image)->value('path');
                    $newest_product_name = DB::table('products_description')->where('products_id',$newest_product->products_id)->value('products_name');
                    $product_inventory_in = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','in')->sum('stock');
                    $product_inventory_out = DB::table('inventory')->where('products_id',$newest_product->products_id)->where('stock_type','out')->sum('stock');
                    $product_inventory = $product_inventory_in-$product_inventory_out;
                    $newest_product_percent = (($newest_product->products_mrp - $newest_product->products_price)*100) /$newest_product->products_mrp;
                ?>
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6  col-6 ">
            <div class="BooksPanel ps-product">
                <div class="ps-product__thumbnail">
                    <a href="{{URL::to('product-detail/'.$newest_product->products_slug)}}" class="books-panel-item-wrap is-book-panel-trigger selected">
                        @if(isset($newest_product_main_image))
                        <div class="book-thumb-img-wrap has-edge">
                            <img src="{{URL::asset('/'.$newest_product_main_image)}}" class="w-100 img-fluid" alt="" width="267" height="400">            
                        </div>
                        @endif
                    </a>
                    <div class="ps-product__badge">{{isset($newest_product_percent) ? round($newest_product_percent) : '0'}}%</div>
                </div>
                <div class="ps-product__container">
                    <div class="ps-product__content">
                        <div class="on_producta row mb-2">
                            <div class="col-12">
                                <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="{{$newest_product->products_id}}">Quick View</a>
                                @if($product_inventory==0)
                                <strong class="text-danger"> Out of stock</strong>
                                @else
                                <form action="{{url('/addToCart')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="1"/>
                                    <input type="hidden" name="products_id" value="{{ isset($newest_product->products_id) ? $newest_product->products_id : null }}">
                                    <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        <a class="ps-product__title" href="{{URL::to('product-detail/'.$newest_product->products_slug)}}">{{isset($newest_product_name) ? $newest_product_name : null}}</a>
                        <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{isset($newest_product->products_price) ? $newest_product->products_price : null}} <del><i class="fa fa-inr"></i>{{isset($newest_product->products_mrp) ? $newest_product->products_mrp : null}} </del></p>
                    </div>
                    <div class="ps-product__content hover">
                        <div class="on_producta row mb-2">
                            <div class="col-12">
                                <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="{{$newest_product->products_id}}">Quick View</a>
                                @if($product_inventory==0)    
                                <strong class="text-danger"> Out of stock</strong>
                                @else
                                <form action="{{url('/addToCart')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="1"/>
                                    <input type="hidden" name="products_id" value="{{ isset($newest_product->products_id) ? $newest_product->products_id : null }}">
                                    <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                </form>
                                @endif
                            </div>
                        </div>
                        <a class="ps-product__title" href="{{URL::to('product-detail/'.$newest_product->products_slug)}}">{{isset($newest_product_name) ? $newest_product_name : null}}</a>
                        <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{isset($newest_product->products_price) ? $newest_product->products_price : null}} <del><i class="fa fa-inr"></i>{{isset($newest_product->products_mrp) ? $newest_product->products_mrp : null}} </del></p>
                    </div>
                </div>
            </div>
        </div>
                        @endforeach
                     @endif
                     
                        </div>
                    </div>
<!--                    <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div>-->
                </div>
<!--                <div class="ps-tab" id="tab-2">
                    <div class="ps-shopping-product">
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?1310.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/1.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young Shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?1150.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/2.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?42.99 - ?60.00</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/3.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?125.30</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/4.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Global Office</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?55.99</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                <div class="ps-product__badge">-37%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?32.99 <del>?41.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/6.jpg" alt=""></a>
                                <div class="ps-product__badge">-5%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?100.99 <del>?106.00 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/7.jpg" alt=""></a>
                                <div class="ps-product__badge">-16%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Korea Long Sofa Fabric In Blue Navy Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?567.89 <del>?670.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/8.jpg" alt=""></a>
                                <div class="ps-product__badge">-16%</div>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Unero Military Classical Backpack</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>02</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price sale">?35.89 <del>?42.20 </del></p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/9.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Rayban Rounded Sunglass Brown Color</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>02</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?35.89</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/10.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?29.39 - ?39.99</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product ps-product--wide">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/11.jpg" alt=""></a>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                                    <div class="ps-product__rating">
                                        <div class="br-wrapper br-theme-fontawesome-stars"><select class="ps-rating" data-read-only="true" style="display: none;">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><div class="br-widget br-readonly"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="2" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="3" class="br-selected br-current"></a><a href="#" data-rating-value="1" data-rating-text="4" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="5"></a><div class="br-current-rating">1</div></div></div><span>01</span>
                                    </div>
                                    <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                    <ul class="ps-product__desc">
                                        <li> Unrestrained and portable active stereo speaker</li>
                                        <li> Free from the confines of wires and chords</li>
                                        <li> 20 hours of portable capabilities</li>
                                        <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                        <li> 3/4? Dome Tweeters: 2X and 4? Woofer: 1X</li>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping">
                                    <p class="ps-product__price">?13.43</p><a class="ps-btn" href="#">Add to cart</a>
                                    <ul class="ps-product__actions">
                                        <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                        <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
@include('web.includes.newsletter')
@endsection
@extends('web.layout')
@section('content')
<div class="ps-layout--shop" data-select2-id="11">
    <div class="ps-layout__left">
        <aside class="widget widget_shop">
            <h4 class="widget-title">Categories</h4>
            <ul class="ps-list--categories">
<?php $alll_main_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.level','=',0)
        ->select('categories_description.*','categories.categories_slug as categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
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
                <li class="current-menu-item ">
                    <!--<a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}">{{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>-->
                    <a href="javascript:;" class="filterProducts categoryid <?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'activeOption';} ?>" style="<?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'color: #fcb800';} ?>" data-categoryid="{{$alll_main_category->categories_id}}">{{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                </li>
                @endif
                @if(count($alll_sub_categories)>0)
                <li class="current-menu-item menu-item-has-children">
                    <!--<a href="{{URL::to('shop-by-category/'.$alll_main_category->categories_slug)}}">{{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>-->
                    <a href="javascript:;" class="filterProducts categoryid <?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'activeOption';} ?>" style="<?php if(isset($searchCategory) && $searchCategory==$alll_main_category->categories_id){echo 'color: #fcb800';} ?>" data-categoryid="{{$alll_main_category->categories_id}}">{{isset($alll_main_category->categories_name) ? $alll_main_category->categories_name : null}}</a>
                    <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        @foreach($alll_sub_categories as $alll_sub_category)
                        <li class="current-menu-item menu-item-has-children">
                            <a href="javascript:;" class="filterProducts categoryid" data-categoryid="{{$alll_sub_category->categories_id}}">{{isset($alll_sub_category->categories_name) ? $alll_sub_category->categories_name : null}}</a>
<?php $alll_sub_sub_categories = DB::table('categories')
        ->join('categories_description','categories.categories_id','=','categories_description.categories_id')
        ->where('categories.parent_id',$alll_sub_category->categories_id)
        ->where('categories.level','=',2)
        ->select('categories_description.*','categories.categories_slug')
        ->orderBy('categories.categories_id','asc')
        ->get();
?>
                            @if(count($alll_sub_sub_categories)>0)
                            <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                @foreach($alll_sub_sub_categories as $alll_sub_sub_category)
                                <li class="current-menu-item ">
                                    <!--<a href="{{URL::to('shop-by-category/'.$alll_sub_sub_category->categories_slug)}}">{{isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null}}</a>-->
                                    <a href="javascript:;" class="filterProducts categoryid" data-categoryid="{{$alll_sub_sub_category->categories_id}}">{{isset($alll_sub_sub_category->categories_name) ? $alll_sub_sub_category->categories_name : null}}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
                @endif
            </ul>
        </aside>
        <aside class="widget widget_shop">

            <figure>
                <h4 class="widget-title">By Price</h4>
                <div id="nonlinear" class="noUi-target noUi-ltr noUi-horizontal"></div>
                <p class="ps-slider__meta ">Price:<span class="ps-slider__value">Min. <span class="ps-slider__min filterProducts1">0</span></span>-<span class="ps-slider__value ">Max.<span class="ps-slider__max filterProducts1">1000</span></span></p>
            </figure>
            <figure>
                <h4 class="widget-title">By RATING</h4>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterPoducts1" type="checkbox" id="review-1" name="review" value="5">
                    <label for="review-1"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-2" name="review" value="4">
                    <label for="review-2"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-3" name="review" value="3">
                    <label for="review-3"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-4" name="review" value="2">
                    <label for="review-4"><span><i class="fa fa-star rate"></i><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control ratings filterProducts1" type="checkbox" id="review-5" name="review" value="1">
                    <label for="review-5"><span><i class="fa fa-star rate"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></label>
                </div>
            </figure>
        </aside>
    </div>
    <div class="ps-layout__right" data-select2-id="10">
        <div class="ps-shopping ps-tab-root" data-select2-id="9">
            <div class="ps-shopping__header">
                <div class="ps-shopping__actions" data-select2-id="8">
                    <select class="ps-select select2-hidden-accessible filterProducts1" id="sortby" data-placeholder="Sort Items" data-select2-id="4" tabindex="-1" aria-hidden="true" style="width:350px">
                        <option value="1">Sort by latest</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by average rating</option>
                        <option value="4">Sort by price: low to high</option>
                        <option value="5">Sort by price: high to low</option>
                    </select>
<!--                    <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="5" style="width: 200px;">
                        <span class="selection">
                            <span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-h5e4-container">
                                <span class="select2-selection__rendered" id="select2-h5e4-container" role="textbox" aria-readonly="true" title="Sort by latest">Sort by latest</span>
                                <span class="select2-selection__arrow" role="presentation">
                                    <b role="presentation"></b>
                                </span>
                            </span>
                        </span>
                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                    </span>-->
                </div>
            </div>
            <div class="ps-tabs">
                <div class="ps-tab append_products active" id="tab-1">
                    <div class="ps-shopping-product">
                        <div class="row" id="unique_i_am">
                            @if(count($products)>0)
                            @foreach($products as $product)
                            <?php
                              $product_main_image = DB::table('image_categories')->where('image_id', $product->products_image)->value('path');
                              $product_images_ids = DB::table('products_images')->where('products_id', $product->products_id)->pluck('image')->toArray();
                              $product_images = DB::table('image_categories')->whereIn('image_id', $product_images_ids)->where('image_type','ACTUAL')->pluck('path')->toArray();
                              $product_name = DB::table('products_description')->where('products_id', $product->products_id)->first();
                              $product_inventory_in = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','in')->sum('stock');
                              $product_inventory_out = DB::table('inventory')->where('products_id',$product->products_id)->where('stock_type','out')->sum('stock');
                              $product_inventory = $product_inventory_in-$product_inventory_out;
                              $product_percent = (($product->products_mrp - $product->products_price)*100) /$product->products_mrp;
                            ?>
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6  col-6">
                                <div class="BooksPanel ps-product">
                                    <div class="ps-product__thumbnail">
                                        <a href="{{URL::asset('product-detail/'.$product->products_slug)}}" class="books-panel-item-wrap is-book-panel-trigger selected">
                                            <div class="book-thumb-img-wrap has-edge">
                                                <img src="{{URL::asset('/'.$product_main_image)}}" class="w-100 img-fluid" alt="" width="267" height="400">            
                                            </div>
                                        </a>
                                        <div class="ps-product__badge">{{isset($product_percent) ? round($product_percent) : '0'}}%</div>
                                    </div>
                                    <div class="ps-product__container">
                                        <div class="ps-product__content">
                                            <div class="on_producta row mb-2">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="{{$product->products_id}}">Quick View</a>
                                                    @if($product_inventory==0)
                                                    <strong class="text-danger"> Out of stock</strong>
                                                    @else
                                                    <form action="{{url('/addToCart')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <a class="ps-product__title" href="{{URL::to('product-detail/'.$product->products_slug)}}">{!!$product_name->products_name!!}</a>
                                            <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{isset($product->products_price) ? $product->products_price : null}} <del><i class="fa fa-inr"></i>{{isset($product->products_mrp) ? $product->products_mrp : null}} </del></p>
                                        </div>
                                        <div class="ps-product__content hover">
                                            <div class="on_producta row mb-2">
                                                <div class="col-12 d-flex justify-content-between">
                                                    <a class="btn btn-warning product-quickview" role="button" aria-pressed="true" data-toggle="modal" data-target="#product-quickview" data-productid="{{$product->products_id}}">Quick View</a>
                                                    @if($product_inventory==0)
                                                    <strong class="text-danger"> Out of stock</strong>
                                                    @else
                                                    <form action="{{url('/addToCart')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="products_id" value="{{ isset($product->products_id) ? $product->products_id : null }}">
                                                        <input type="hidden" name="type" value="1"/>
                                                        <button class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                            <a class="ps-product__title" href="{{URL::to('product-detail/'.$product->products_slug)}}">{!!$product_name->products_name!!}</a>
                                            <p class="ps-product__price sale"><i class="fa fa-inr"></i>{{isset($product->products_price) ? $product->products_price : null}} <del><i class="fa fa-inr"></i>{{isset($product->products_mrp) ? $product->products_mrp : null}} </del></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="ps-pagination">
                        @if(count($products)>0)
                        {!!$products->appends(\Request::except('page'))->render()!!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
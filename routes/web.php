<?php

Route::get('/clear', function(){
$exitCode = Artisan::call('optimize');
$exitCode = Artisan::call('route:clear');
$exitCode = Artisan::call('view:clear');
$exitCode = Artisan::call('config:clear');
});

if(file_exists(storage_path('installed'))){
    $check = DB::table('settings')->where('id', 94)->first();
    if($check->value == 'Maintenance'){
            $middleware = ['installer','env'];
    }
    else{
            $middleware = ['installer'];
    }
}
else{ 
    $middleware = ['installer'];
}
Route::get('/maintance','Web\IndexController@maintance');

Route::group(['namespace' => 'Web','middleware' => ['installer']], function () {
Route::get('/login', 'CustomersController@login');
Route::get('/get-zones', 'CustomersController@get_zones');
Route::post('/process-login', 'CustomersController@processLogin');
Route::get('/logout', 'CustomersController@logout')->middleware('Customer');
});
Route::group(['namespace' => 'Web','middleware' => $middleware], function () {
    Route::get('general_error/{msg}', function($msg) {
        return view('errors.general_error',['msg' => $msg]);
    });
    Route::get('/','IndexController@index');
    Route::post('/change_language', 'WebSettingController@changeLanguage');
    Route::post('/change_currency', 'WebSettingController@changeCurrency');
    Route::post('/addToCart', 'CartController@addToCart');
    Route::get('/incQty', 'CartController@incQty');
    Route::get('/decQty', 'CartController@decQty');
    Route::get('/rent-price', 'CartController@rentPrice');
    Route::get('/get-total-price', 'CartController@get_total_price');
    Route::post('/modal_show', 'ProductsController@ModalShow');
    Route::get('/deleteCart', 'CartController@deleteCart');
    Route::get('/viewcart', 'CartController@viewcart');
    Route::get('/editcart/{id}/{slug}', 'CartController@editcart');
    Route::get('/delete-cart/{id}', 'CartController@delete_cart');
    Route::post('/updateCart', 'CartController@updateCart');
    Route::post('/updatesinglecart', 'CartController@updatesinglecart');
    Route::get('/cartButton', 'CartController@cartButton'); 
    Route::get('about-us','IndexController@about_us');
    Route::get('/profile', 'CustomersController@profile')->middleware('Customer'); 
    Route::get('/address', 'CustomersController@address')->middleware('Customer');
    Route::get('/vendor-dashboard', 'CustomersController@vendor_dashboard')->middleware('Customer');
    Route::post('/vendor-dashboard', 'CustomersController@vendor_dashboard')->middleware('Customer');
    Route::post('/vendor-products', 'CustomersController@vendor_products')->middleware('Customer');
    Route::get('/vendor-orders', 'CustomersController@vendor_orders')->middleware('Customer');
    Route::get('/vendor-store/{id}/{slug}', 'CustomersController@vendor_store');
    Route::get('/wishlist', 'CustomersController@wishlist')->middleware('Customer');
    Route::post('/updateMyProfile', 'CustomersController@updateMyProfile')->middleware('Customer');
    Route::post('/updateMyPassword', 'CustomersController@updateMyPassword')->middleware('Customer');
    Route::get('UnlikeMyProduct/{id}', 'CustomersController@unlikeMyProduct')->middleware('Customer');
    Route::post('likeMyProduct', 'CustomersController@likeMyProduct');
    Route::post('addToCompare', 'CustomersController@addToCompare');
    Route::get('compare', 'CustomersController@Compare')->middleware('Customer');
    Route::get('deletecompare/{id}', 'CustomersController@DeleteCompare')->middleware('Customer');
    Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
    Route::get('/returns', 'OrdersController@returns')->middleware('Customer');
    Route::get('/view-order/{id}', 'OrdersController@viewOrder')->middleware('Customer');
    
    Route::get('/return-order/{id}', 'OrdersController@requestReturn')->middleware('Customer');
    Route::get('request-return/{id}/{product_id}', 'OrdersController@openreturnForm')->middleware('Customer');
    Route::get('cancel-item/{id}/{product_id}', 'OrdersController@cancelItem')->middleware('Customer');
    
    Route::post('submit-return', 'OrdersController@submitReturn')->middleware('Customer');
    
    Route::get('/vendor-view-order/{id}', 'OrdersController@vendor_viewOrder')->middleware('Customer');
    Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
    Route::get('/shipping-address', 'ShippingAddressController@shippingAddress')->middleware('Customer');
    Route::post('/addMyAddress', 'ShippingAddressController@addMyAddress')->middleware('Customer');
    Route::post('/myDefaultAddress', 'ShippingAddressController@myDefaultAddress')->middleware('Customer');
    Route::post('/update-address', 'ShippingAddressController@updateAddress')->middleware('Customer');
    Route::get('/delete-address/{id}', 'ShippingAddressController@deleteAddress')->middleware('Customer');
    Route::post('/ajaxZones', 'ShippingAddressController@ajaxZones');
    /*******************Blog Start***********************/
    Route::get('blog-category/{slug}/{id}','IndexController@blog_category');
    Route::get('single-blog/{slug}/{id}','IndexController@single_blog');
    /*******************Blog End***********************/
    //news section
    Route::get('/news', 'NewsController@news');
    Route::get('/news-detail/{slug}', 'NewsController@newsDetail');
    Route::post('/loadMoreNews', 'NewsController@loadMoreNews');
    Route::get('/page', 'IndexController@page');
    Route::get('/shop', 'ProductsController@shop_all');
    
    Route::get('/best-selling', 'ProductsController@best_selling');
    Route::get('/new-release', 'ProductsController@new_release');
    
    Route::get('/search', 'ProductsController@search');
    
    Route::get('/shop-by-category/{slug}', 'ProductsController@shop_by_catogory');
    Route::get('/product-detail/{slug}', 'ProductsController@productDetail');
    Route::get('/get-product-details-modal', 'ProductsController@get_product_details_modal');
    Route::get('/filterProducts', 'ProductsController@filterProducts');
    Route::get('/filterVendorProducts', 'ProductsController@filterVendorProducts');
    Route::post('/getquantity', 'ProductsController@getquantity');
    Route::get('/search_by_author_name', 'ProductsController@search_by_author_name');

    Route::get('/guest_checkout', 'OrdersController@guest_checkout');
    Route::get('/place_order_chk_pincode', 'OrdersController@place_order_chk_pincode');
    Route::get('/checkout', 'OrdersController@checkout')->middleware('Customer');
    Route::post('/checkout_shipping_address', 'OrdersController@checkout_shipping_address')->middleware('Customer');
    Route::post('/checkout_billing_address', 'OrdersController@checkout_billing_address')->middleware('Customer');
    Route::post('/checkout_payment_method', 'OrdersController@checkout_payment_method')->middleware('Customer');
    Route::post('/paymentComponent', 'OrdersController@paymentComponent')->middleware('Customer');
    Route::post('/place_order', 'OrdersController@place_order')->middleware('Customer');
    Route::get('/thank-you', 'OrdersController@thankyou')->middleware('Customer');
    Route::get('/orders', 'OrdersController@orders')->middleware('Customer');
    Route::post('/updatestatus/', 'OrdersController@updatestatus')->middleware('Customer');
    Route::post('/myorders', 'OrdersController@myorders')->middleware('Customer');
    Route::get('/stripeForm', 'OrdersController@stripeForm')->middleware('Customer');
    Route::post('/pay-instamojo', 'OrdersController@payIinstamojo')->middleware('Customer');
    Route::get('/get-tax', 'OrdersController@get_tax')->middleware('Customer');
    Route::get('/order-tracking', 'OrdersController@order_tracking');
    Route::post('/order-tracking', 'OrdersController@orderTracking');

    Route::get('/checkout/hyperpay', 'OrdersController@hyperpay')->middleware('Customer');
    Route::get('/checkout/hyperpay/checkpayment', 'OrdersController@checkpayment')->middleware('Customer');
    Route::post('/checkout/payment/changeresponsestatus', 'OrdersController@changeresponsestatus')->middleware('Customer');
    Route::post('/apply_coupon', 'CartController@apply_coupon');
    Route::get('/removeCoupon/{id}', 'CartController@removeCoupon');

    Route::get('/signup', 'CustomersController@signup');
    Route::get('/logoutt', 'CustomersController@logout')->middleware('Customer');
    Route::get('/membership', 'CustomersController@membership')->middleware('Customer');
    Route::post('/membership', 'CustomersController@membershipProcess')->middleware('Customer');
    Route::post('/signupProcess', 'CustomersController@signupProcess');
    Route::get('/forgotPassword', 'CustomersController@forgotPassword');
    Route::get('/recoverPassword', 'CustomersController@recoverPassword');
    Route::post('/processPassword', 'CustomersController@processPassword');
    
    Route::get('razorpay', 'CustomersController@razorpay');
    Route::post('razorpay/success', 'CustomersController@razorpay_success');
    Route::get('razorpay/failure', 'CustomersController@razorpay_failure');
    Route::get('thanks', 'CustomersController@thanks');
    Route::get('cancel', 'CustomersController@cancel');

    Route::get('/vendor-registration', 'CustomersController@vendor_registration');
    Route::post('/vendor-registration', 'CustomersController@vendoRegistration');

    Route::get('login/{social}', 'CustomersController@socialLogin');
    Route::get('login/{social}/callback', 'CustomersController@handleSocialLoginCallback');
    Route::post('/commentsOrder', 'OrdersController@commentsOrder');
    Route::post('/subscribeNotification/', 'CustomersController@subscribeNotification');
    Route::get('/donate', 'IndexController@donate');
    Route::post('/donate', 'IndexController@processDonate');
    Route::get('/contact-us', 'IndexController@contactus');
    Route::post('/contact-us', 'IndexController@processContactUs');
    Route::post('/newsletter', 'IndexController@newsletter');
    Route::post('/productreview', 'ProductsController@productreview');
});

Route::get('/test', 'Web\IndexController@test1');
Route::get('/faqs', 'Web\IndexController@faqs');
Route::get('/privacy-policy', 'Web\IndexController@privacy_policy');
Route::get('/term-conditions', 'Web\IndexController@term_conditions');
Route::get('/return-refund', 'Web\IndexController@return_refund');
Route::get('/become-a-vendor', 'Web\IndexController@become_a_vendor');
Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'Web\ProductsController@autocomplete'));
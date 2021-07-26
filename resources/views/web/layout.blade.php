<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $result['setting'] = DB::table('settings')->get(); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="author" content="">
        @if(empty($result['setting'][18]->value))
        <title>@lang('website.Ecommerce')</title>
        @else
        <title><?= stripslashes($result['setting'][18]->value) ?></title>
        @endif
        @if(!empty($result['setting'][86]->value))
        <link rel="icon" href="{{asset('').$result['setting'][86]->value}}" type="image/gif">
        @endif
        <meta name="DC.title"  content="<?= stripslashes($result['setting'][73]->value) ?>"/>
        <meta name="description" content="<?= stripslashes($result['setting'][75]->value) ?>"/>
        <meta name="keywords" content="<?= stripslashes($result['setting'][74]->value) ?>"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/nouislider/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/fonts/Linearicons/Linearicons/Font/demo-files/demo.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/owl-carousel/assets/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/slick/slick/slick.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/nouislider/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/lightGallery-master/dist/css/lightgallery.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/plugins/select2/dist/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('web/css/style.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        @include("web.includes.header")
        @yield("content")
        @include("web.includes.footer")
        @include("web.includes.modals")
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{URL::asset('web/plugins/jquery.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/nouislider/nouislider.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/popper.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/masonry.pkgd.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/isotope.pkgd.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/jquery.matchHeight-min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/slick/slick/slick.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/slick-animation.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/lightGallery-master/dist/js/lightgallery-all.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/sticky-sidebar/dist/sticky-sidebar.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{URL::asset('web/plugins/gmap3.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
        <!-- custom scripts-->
        <script src="{{URL::asset('web/js/main.js')}}"></script>
        <script src="{{URL::asset('web/js/myscript.js')}}"></script>
    </body>
</html>
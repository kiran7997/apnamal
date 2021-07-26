<div class="col-lg-4">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__header">
                @if(!empty(auth()->guard('customer')->user()->avatar))
                <img src="{{URL::asset('/'.auth()->guard('customer')->user()->avatar)}}" alt="avatar">
                @endif
                <figure>
                    <figcaption>Hello</figcaption>
                    <p><a href="javascript:;">{{auth()->guard('customer')->user()->email}}</a></p>
                </figure>
            </div>
            <div class="ps-widget__content">
                <ul>
                    <li class="<?php if(\Request::getRequestUri()=='/profile'){echo 'active';} ?>"><a href="{{URL::to('/profile')}}"><i class="icon-user"></i> Account Information</a></li>
                    <!--<li><a href="#"><i class="icon-alarm-ringing"></i> Notifications</a></li>-->
                    <li class="<?php if(\Request::getRequestUri()=='/orders'){echo 'active';} ?>"><a href="{{URL::to('/orders')}}"><i class="icon-papers"></i> Orders</a></li>
                    <li class="<?php if(\Request::getRequestUri()=='/returns'){echo 'active';} ?>"><a href="{{URL::to('/returns')}}"><i class="icon-papers"></i> Returns</a></li>
                    <li class="<?php if(\Request::getRequestUri()=='/address'){echo 'active';} ?>"><a href="{{URL::to('/address')}}"><i class="icon-map-marker"></i> Address</a></li>
                    <!--<li><a href="#"><i class="icon-store"></i> Recent Viewed Product</a></li>-->
                    <li><a href="{{URL::to('/wishlist')}}"><i class="icon-heart"></i> Wishlist</a></li>
                    <li><a href="{{URL::to('/logout')}}"><i class="icon-power-switch"></i>Logout</a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>
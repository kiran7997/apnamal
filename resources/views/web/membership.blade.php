@extends('web.layout')
@section('content')
<div class="ps-page--my-account">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Home</a></li>
                <li>Membership</li>
            </ul>
        </div>
    </div>
    <div class="ps-my-account">
        <div class="container">
            <form class="ps-form--accounta ps-tab-root" action="{{URL::to('/membership')}}" method="post">
                {{csrf_field()}}
                <h4 class="text-center">MEMBERSHIP</h4>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></a>
                    <ul style="list-style: none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">@lang('website.Error'):</span>
                    {!! session('error') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">@lang('website.success'):</span>
                    {!! session('success') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="form-group">
                    <label>Name<sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label>Email<sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="Your Email address" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label>Contact<sup>*</sup></label>
                    <input class="form-control" type="tel:" placeholder="Enter Your Mobile No." name="mobile" value="{{ old('mobile') }}" required>
                </div>
                <div class="form-group">
                    <label>Street Address 1<sup>*</sup></label>
                    <textarea class="form-control" type="" placeholder="Enter Your Address" name="address1" required>{{ old('address1') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Street Address 2<sup>*</sup></label>
                    <textarea class="form-control" type="" placeholder="Enter Your Address" name="address2">{{ old('address2') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Alternate Phone No.<sup>*</sup></label>
                    <input class="form-control" type="tel:" placeholder="Enter Your Alternate Mobile No." name="phone" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <label>State<sup>*</sup></label>
                    <div class="form-group__content">
                        <select name="zone_id" class="form-control" required>
                            <option value=""> --- Please Select --- </option>
                            @if(count($zones)>0)
                            @foreach($zones as $zone)
                                <option value="{{$zone->zone_id}}" <?php if(old('zone_id')==$zone->zone_id){echo 'selected';} ?>>{{$zone->zone_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
<!--                <div class="form-group">
                    <label>State / City<sup>*</sup>
                    </label>
                    <div class="form-group__content">
                        <select name="zone_id" id="" class="form-control">
                            <option value=""> --- Please Select --- </option>
                            <option value="">Andaman and Nicobar Islands</option>
                            <option value="">Andhra Pradesh</option>
                            <option value="">Arunachal Pradesh</option>
                            <option value="">Assam</option>
                            <option value="">Bihar</option>
                            <option value="">Chandigarh</option>
                            <option value="">Chhattisgarh</option>
                            <option value="">Dadra and Nagar Haveli</option>
                            <option value="">Daman and Diu</option>
                            <option value="">Delhi</option>
                            <option value="">Goa</option>
                            <option value="">Gujarat</option>
                            <option value="">Haryana</option>
                            <option value="">Himachal Pradesh</option>
                            <option value="">Jammu and Kashmir</option>
                            <option value="">Jharkhand</option>
                            <option value="">Karnataka</option>
                            <option value="">Kerala</option>
                        </select>
                    </div>
                </div>-->
                <div class="form-group">
                    <label>City<sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="Enter Your city" value="{{ old('city') }}" name="city" required>
                </div>
                <div class="form-group">
                    <label>ZIP / Postal Code<sup>*</sup></label>
                    <input class="form-control" type="text" placeholder="Enter Your zip or postal Code" value="{{ old('pincode') }}" name="pincode" required>
                </div>
                <level class="my-3">Choose Your Prices & Plans</level>
                <ul class="ps-tab-list my-4">
                    <li><a href="#prime_member">
                         Prime Membership Plans</a>
                    </li>
                    <li><a href="#pro_member">
                         Pro Membership Plans</a>
                    </li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab" id="prime_member">
                        <div class="card pt-4 my-4">
                            <div class="card-body">
                                <h5 class="pl-5"><input type="radio" name="member_type" id="Primemember" class="form-check-input" value="1" <?php if(old('member_type')==1){echo 'checked';} ?>> &nbsp;  Prime Membership Plans</h5>
                                <hr>
                                <ul>
                                    <li>One Time Membership free</li>
                                    <li>One Time Security Deposit  of Rs.800</li>
                                    <li>(Withdrawal of Security Deposit at any time)</li>
                                    <li>Prime Membership Amount of Rs. 200.</li>
                                    <li>Cancel Anytime :</li>
                                    <li>No due dates or late fees Ever ! (up to 7 days)</li>
                                    <li>Large Selection of Latest and Past Title.</li>
                                    <li>Great offer and Discount.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="ps-tab" id="pro_member">
                        <div class="card pt-4 my-4">
                            <div class="card-body">
                                <h5 class="pl-5"><input type="radio" name="member_type" id="Primemember" class="form-check-input" value="2" <?php if(old('member_type')==2){echo 'checked';} ?>> &nbsp;  Pro Membership Plans</h5>
                                <hr>
                                <ul>
                                    <li>One Time Membership free.</li>
                                    <li>One Time Security Deposit.</li>
                                    <li>Pro Membership Amount::Rs- </li>
                                    <li>Cancel Anytime: </li>
                                    <li>Late fees or due dates will be apply (per day Rs-1 or Rs-2)</li>
                                    <li>Large Selection of Lates and popular Titles.</li>
                                    <li>Limited offer and Discount.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-5" id="prime">
                    <div class="col-12">
                        <h5>Books</h5>
                    </div>
                    <div class="col-6">
                        <select name="prime_membership_plan">
                            <option value="">For Prime Membership Plans</option>
                            <option value="1" <?php if(old('prime_membership_plan')==1){echo 'selected';} ?>>2 At-a-time Multiple order</option>
                            <option value="2" <?php if(old('prime_membership_plan')==2){echo 'selected';} ?>>4 At-a-time</option>
                            <option value="3" <?php if(old('prime_membership_plan')==3){echo 'selected';} ?>>6 At-a-time</option>
                            <option value="4" <?php if(old('prime_membership_plan')==4){echo 'selected';} ?>>9 At-a-time</option>
                            <option value="5" <?php if(old('prime_membership_plan')==5){echo 'selected';} ?>>12 At-a-time</option>
                            <option value="6" <?php if(old('prime_membership_plan')==6){echo 'selected';} ?>>15 At-a-time</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="pro_membership_plan">
                            <option value="">For Pro Membership Plans</option>
                            <option value="1" <?php if(old('pro_membership_plan')==1){echo 'selected';} ?>>1 At-a-time</option>
                            <option value="2" <?php if(old('pro_membership_plan')==2){echo 'selected';} ?>>2 At-a-time</option>
                            <option value="3" <?php if(old('pro_membership_plan')==3){echo 'selected';} ?>>3 At-a-time</option>
                            <option value="4" <?php if(old('pro_membership_plan')==4){echo 'selected';} ?>>4 At-a-time</option>
                            <option value="5" <?php if(old('pro_membership_plan')==5){echo 'selected';} ?>>5 At-a-time</option>
                            <option value="6" <?php if(old('pro_membership_plan')==6){echo 'selected';} ?>>6 At-a-time</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Book<sup>*</sup></label>
                    <div class="form-group__content">
                        <select name="book" class="form-control">
                            <option value=""> --- Select Book--- </option>
                            @if(count($books)>0)
                            @foreach($books as $book)
                                <option value="{{$book->products_id}}" <?php if(old('book')==$book->products_id){echo 'selected';} ?>>{{$book->products_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Months<sup>*</sup></label>
                    <div class="form-group__content">
                        <select name="months" class="form-control">
                            <option value=""> --- Select Months --- </option>
                            <option value="1" <?php if(old('months')==1){echo 'selected';} ?>>January</option>
                            <option value="2" <?php if(old('months')==2){echo 'selected';} ?>>February</option>
                            <option value="3" <?php if(old('months')==3){echo 'selected';} ?>>March</option>
                            <option value="4" <?php if(old('months')==4){echo 'selected';} ?>>April</option>
                            <option value="5" <?php if(old('months')==5){echo 'selected';} ?>>May</option>
                            <option value="6" <?php if(old('months')==6){echo 'selected';} ?>>June</option>
                            <option value="7" <?php if(old('months')==7){echo 'selected';} ?>>July</option>
                            <option value="8" <?php if(old('months')==8){echo 'selected';} ?>>August</option>
                            <option value="9" <?php if(old('months')==9){echo 'selected';} ?>>September</option>
                            <option value="10" <?php if(old('months')==10){echo 'selected';} ?>>October</option>
                            <option value="11" <?php if(old('months')==11){echo 'selected';} ?>>November</option>
                            <option value="12" <?php if(old('months')==12){echo 'selected';} ?>>December</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Avail Prime Membership?<sup>*</sup></label>
                    <input value="1" type="radio" name="avail_prime" <?php if(old('avail_prime')==1){echo 'checked';} ?>> Yes
                    <input value="0" type="radio" name="avail_prime" <?php if(old('avail_prime')==0){echo 'checked';} ?>> No
                </div>
                <div class="form-group">
                    <label>Select Magazines<sup>*</sup></label>
                    <select name="magazines" class="form-control">
                        <option value=""> --- Select Magazines--- </option>
                        <option value="1" <?php if(old('magazines')==1){echo 'selected';} ?>>Monthly</option>
                        <option value="2" <?php if(old('magazines')==2){echo 'selected';} ?>>Semi-Annual</option>
                        <option value="3" <?php if(old('magazines')==3){echo 'selected';} ?>>Annual</option>
                    </select>
                </div>
                <h5>How did you hear about us*</h5>
                <div class="form-group">
                    <label>How did you find us?<sup>*</sup></label>
                    <textarea class="form-control row-5" name="how_to_find" placeholder="How did you find us?">{{ old('how_to_find') }}</textarea>
                </div>
                <div class="form-group">
                    <label>By their us of these eBooks, texts and images, members are to follow these Conditions of Use :</label>
                    <input type="checkbox" name="terms_conditions" aria-label="terms_conditions" <?php if(old('terms_conditions')=='on'){echo 'checked';} ?> required> I Agree<sup>*</sup>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="am_robot" aria-label="am_robot" <?php if(old('am_robot')=='on'){echo 'checked';} ?> required> I am a robot.
                </div>
                <input type="hidden" value="100" name="amount" id="amount"/>
                <div class="row">
                    <div class="col-12 text-right">
                        <div class="form-group">
                            <button class="btn btn-lg btn-warning" type="submit">Submit And Continue</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
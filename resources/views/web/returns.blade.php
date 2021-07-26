@extends('web.layout')
@section('content')
<main class="ps-page--my-account">
    
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="{{URL::to('/profile')}}">Account</a></li>
                    <li>Invoices</li>
                </ul>
            </div>
        </div>
    
        <section class="ps-section--account">
            <div class="container">
                <div class="row">
                    @include('web.includes.user_sidebar')
                    <div class="col-lg-8">
                        <div class="ps-section__right">
                            <div class="ps-section--account-setting">
                                <div class="ps-section__header">
                                    <h3>Orders</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="table-responsive">
                                        <table class="table ps-table ps-table--invoices">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <!--<th>Title</th>-->
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($result['orders'])>0)
                                                <?php $i = count($result['orders']);?>
                                                @foreach($result['orders'] as $row)
                                                    @if($row->orders_status == 'Return')
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <!--<td>Marshall Kilburn Portable Wireless Speaker</td>-->
                                                            <td>{{$row->date_purchased}}</td>
                                                            <td><i class="fa fa-inr"></i>{{$row->order_price}}</td>
                                                            <td>
                                                                @if($row->orders_status=="Completed")
                                                                <span class="btn btn-outline-success">
                                                                @elseif($row->orders_status=="Return")
                                                                <span class="btn btn-outline-danger">
                                                                @elseif($row->orders_status=="Cancel")
                                                                <span class="btn btn-outline-warning">
                                                                @else
                                                                <span class="btn btn-outline-info">
                                                                @endif
                                                                {{ $row->orders_status }}
                                                            </span>
                                                            </td>
                                                            <td class="text-center"><a href="{{URL::to('view-order/'.$row->orders_id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                                        </tr>
                                                        <?php $i--; ?>
                                                    @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('web.includes.newsletter')
    </main>
@endsection
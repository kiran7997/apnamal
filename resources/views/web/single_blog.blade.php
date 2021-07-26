@extends('web.layout')
@section('content')

<section class="blog_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="blog_page">
                    <img src="{{URL::asset($image)}}" class="img-fluid"/>
                    <h2>{{isset($blog->title) ? $blog->title : null}}</h2>
                    <p>{{isset($blog->description) ? $blog->description : null}}</p>
                </div>
            </div>
        </div> 
    </div>
</section>
 
@endsection
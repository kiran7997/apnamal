@extends('web.layout')
@section('content')

 @if(count($blogs)>0)
    @foreach($blogs as $blog)
    <?php
    $image = DB::table('image_categories')->where('image_id',$blog->image_id)->value('path');
    ?>
    <section class="blog_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog_page">
                         <img src="{{URL::asset($image)}}" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blog_text">
                       <h2><a href="{{url('single-blog/'.Str_slug($blog->title).'/'.$blog->id)}}">{{$blog->title}}</a></h2>
                       <p>{{ Str_limit($blog->description),200 }}</p>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @else
    <div class="col-lg-12">
       <div class="blog_text text-center mt-4">
           <h1>No result found!</h1>
       </div>
    </div>
@endif
@endsection
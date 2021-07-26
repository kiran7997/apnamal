@if(count($authors)>0)
@foreach($authors as $author)
<?php $author_product_count = DB::table('products')->where('manufacturers_id', $author->manufacturers_id)->count(); ?>
<div class="ps-checkbox">
    <input class="form-control authorids filterProducts1" type="checkbox" id="brand-{{$author->manufacturers_id}}" name="author[]" value="{{$author->manufacturers_id}}">
    <label for="brand-{{$author->manufacturers_id}}">{{$author->manufacturer_name}} ({{$author_product_count}})</label>
</div>
@endforeach
@endif
<script>
$('.filterProducts1').on('change', function() {
    var sortby = $('#sortby').val();
    var categoryid;
    if ($('.categoryid').length) {
        categoryid = $('.activeOption').attr("data-categoryid");
    }
    var authorids = [];
    $('.authorids:checked').each(function(i){
        authorids[i] = $(this).val();
    });
    var ratings = [];
    $('.ratings:checked').each(function(i){
        ratings[i] = $(this).val();
    });
    $.get('/filterProducts', {categoryid: categoryid, authorids: authorids, ratings: ratings, sortby: sortby}, function (data) {
        $('.append_products').html('');
        $('.append_products').append(data);
    });
});
</script>
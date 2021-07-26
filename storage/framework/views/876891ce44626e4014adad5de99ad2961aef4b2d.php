<?php if(count($authors)>0): ?>
<?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $author_product_count = DB::table('products')->where('manufacturers_id', $author->manufacturers_id)->count(); ?>
<div class="ps-checkbox">
    <input class="form-control authorids filterProducts1" type="checkbox" id="brand-<?php echo e($author->manufacturers_id); ?>" name="author[]" value="<?php echo e($author->manufacturers_id); ?>">
    <label for="brand-<?php echo e($author->manufacturers_id); ?>"><?php echo e($author->manufacturer_name); ?> (<?php echo e($author_product_count); ?>)</label>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
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
</script><?php /**PATH /home/adfsddf/public_html/library/resources/views/web/append_authors.blade.php ENDPATH**/ ?>
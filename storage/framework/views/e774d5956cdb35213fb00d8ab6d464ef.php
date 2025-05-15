<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Add New Product</h1>

    <form method="POST" action="<?php echo e(route('products.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo $__env->make('products.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\iamja\Downloads\PhpFinal\mini-ecommerce\resources\views/products/create.blade.php ENDPATH**/ ?>
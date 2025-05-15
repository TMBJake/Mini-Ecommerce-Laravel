<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Checkout</h1>

    <form method="POST" action="<?php echo e(route('checkout.process')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required value="<?php echo e(old('name')); ?>">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="<?php echo e(old('email')); ?>">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control" required><?php echo e(old('address')); ?></textarea>
        </div>

        <div class="mb-3">
            <label>Payment Type</label>
            <select name="payment_type" class="form-control" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="cash">Cash on Delivery</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Place Order</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\iamja\Downloads\PhpFinal\mini-ecommerce\resources\views/checkout/show.blade.php ENDPATH**/ ?>
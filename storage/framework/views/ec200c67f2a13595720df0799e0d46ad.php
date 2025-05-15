<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Your Cart</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php if(empty($cart)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price ($)</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo e($item['name']); ?></td>
                        <td>$<?php echo e(number_format($item['price'], 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.update')); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <input type="number" name="quantities[<?php echo e($id); ?>]" value="<?php echo e($item['quantity']); ?>" min="1" class="form-control d-inline" style="width: 80px;">
                                <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                            </form>
                        </td>
                        <td>$<?php echo e(number_format($subtotal, 2)); ?></td>
                        <td>
                            <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Remove this item?')">X</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>$<?php echo e(number_format($total, 2)); ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('checkout.show')); ?>" class="btn btn-success">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\iamja\Downloads\PhpFinal\mini-ecommerce\resources\views/cart/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="text-2xl font-bold mb-4">All Products</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-between mb-3">
        <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->user()->is_admin): ?>
                <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">Add New Product</a>
            <?php endif; ?>
        <?php endif; ?>

        <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-outline-secondary">View Cart</a>
    </div>

    <?php if($products->isEmpty()): ?>
        <p>No products available.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->category); ?></td>
                    <td>$<?php echo e($product->price); ?></td>
                    <td><?php echo e($product->stock_quantity); ?></td>
                    <td>
                        <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->user()->is_admin): ?>
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                                </form>
                            <?php endif; ?>
                        <?php endif; ?>

                        <!-- Add to Cart -->
                        <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-success">Add to Cart</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\iamja\Downloads\PhpFinal\mini-ecommerce\resources\views/products/index.blade.php ENDPATH**/ ?>
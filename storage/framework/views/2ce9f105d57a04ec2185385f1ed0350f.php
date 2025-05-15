<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $product->name ?? '')); ?>" required>
</div>

<div class="mb-3">
    <label>Category</label>
    <input type="text" name="category" class="form-control" value="<?php echo e(old('category', $product->category ?? '')); ?>" required>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control" required><?php echo e(old('description', $product->description ?? '')); ?></textarea>
</div>

<div class="mb-3">
    <label>Price ($)</label>
    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo e(old('price', $product->price ?? '')); ?>" required>
</div>

<div class="mb-3">
    <label>Stock Quantity</label>
    <input type="number" name="stock_quantity" class="form-control" value="<?php echo e(old('stock_quantity', $product->stock_quantity ?? '')); ?>" required>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
</div>
<?php /**PATH C:\Users\iamja\Downloads\PhpFinal\mini-ecommerce\resources\views/products/form.blade.php ENDPATH**/ ?>
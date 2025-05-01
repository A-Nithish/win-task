

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Add Country</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('countries.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="country_name" class="form-label">Country Name</label>
            <input type="text" class="form-control" id="country_name" name="country_name" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?php echo e(route('countries.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\win-task\resources\views/countries/create.blade.php ENDPATH**/ ?>
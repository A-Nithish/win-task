

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>City Details</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> <?php echo e($city->id); ?></p>
            <p><strong>Name:</strong> <?php echo e($city->city_name); ?></p>
            <p><strong>State:</strong> <?php echo e($city->state->state_name); ?></p>
            <p><strong>Country:</strong> <?php echo e($city->state->country->country_name); ?></p>
        </div>
        <div class="card-footer">
            <a href="<?php echo e(route('cities.index')); ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\win-task\resources\views/cities/show.blade.php ENDPATH**/ ?>
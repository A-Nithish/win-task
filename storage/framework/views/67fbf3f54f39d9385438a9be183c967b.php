

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h4>Country Details</h4>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo e($country->id); ?></p>
        <p><strong>Name:</strong> <?php echo e($country->country_name); ?></p>

        <hr>
        <h5>States in <?php echo e($country->country_name); ?></h5>
        <?php if($country->states->count()): ?>
            <ul class="list-group">
                <?php $__currentLoopData = $country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <?php echo e($state->state_name); ?> 
                        <?php if($state->cities->count()): ?>
                            <ul>
                                <?php $__currentLoopData = $state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($city->city_name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php else: ?>
            <p>No states found.</p>
        <?php endif; ?>
    </div>
    <div class="card-footer">
        <a href="<?php echo e(route('countries.index')); ?>" class="btn btn-secondary">Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\win-task\resources\views/countries/show.blade.php ENDPATH**/ ?>
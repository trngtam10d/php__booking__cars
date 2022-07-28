<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar'); ?>

    <p>This is appended to the master sidebar.</p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <p>This is my body content.</p>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('Admin::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php__booking\app\Modules/Admin/Views/index.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App - <?php echo $__env->yieldContent('title'); ?></title>

    
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
</head>

<body>
    <?php $__env->startSection('sidebar'); ?>
        This is the master sidebar.
    <?php echo $__env->yieldSection(); ?>

    <div class="container">
        <?php echo $__env->yieldContent('main'); ?>
    </div>

    <?php $__env->startSection('footer'); ?>
        This is the master footer.
    <?php echo $__env->yieldSection(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\php__booking\app\Modules/Admin/Views/base.blade.php ENDPATH**/ ?>
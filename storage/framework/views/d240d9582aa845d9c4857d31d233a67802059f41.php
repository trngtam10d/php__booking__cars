<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('Admin::parts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body data-topbar="dark">
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php $__env->startSection('side__bar'); ?>
            <?php echo $__env->make('Admin::parts.top__bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldSection(); ?>

        <div class="main-content">
            <?php echo $__env->yieldContent('main'); ?>

            <?php $__env->startSection('footer'); ?>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Viettheo.
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </footer>
            <?php echo $__env->yieldSection(); ?>
        </div>
    </div>
    <!-- end begin -->
    <?php $__env->startSection('right__bar'); ?>
        <?php echo $__env->make('Admin::parts.right__bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>

    <?php $__env->startSection('javascripts'); ?>
        <?php echo $__env->make('Admin::parts.vendor__js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\php__booking\app\Modules/Admin/Views/base.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="page-content">
        <div class="container-fluid">
            <?php echo $__env->make('Admin::parts.title__table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Tổng quát</h5>
                            <div class="row">
                                <div class="col-lg-12 border-right">
                                    <div class="card shadow-none mb-0">
                                        <div class="border-top">
                                            <div class="card-body border-bottom">
                                                <div class="">
                                                    <div class="row align-items-center">
                                                        <div class="col-4">
                                                            <div class="overview-content">
                                                                <div class="title-name">
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                    <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-8 text-end">
                                                            <p class="text-muted font-size-13 mb-1">Đang online</p>
                                                            <h4 class="mb-0 font-size-20"></h4>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->startSection('footer'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('footer'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right__bar'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('right__bar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('javascripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin::base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php__booking\app\Modules/Admin/Views/index.blade.php ENDPATH**/ ?>
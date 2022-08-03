<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('sidebar'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="page-content">
        <div class="container-fluid">
            <?php echo $__env->make('Admin::parts.title__table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <h5 class="card-title">List of suppliers</h5>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Tên xe</th>
                                            <th>Trạng thái</th>
                                            <th>Cập nhập</th>
                                            <th>Xóa bỏ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <h2>Null</h2>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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
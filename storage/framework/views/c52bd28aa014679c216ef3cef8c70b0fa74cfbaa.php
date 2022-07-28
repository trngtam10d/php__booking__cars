<section class="ftco-section testimony-section bg-light" id="location">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Booking</span>
                <h2 class="mb-3">Location</h2>
            </div>
        </div>
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($location)): ?>
                        <li style="background: url(./backend/uploads/images/<?= $location->image ?>) no-repeat center;" class="splide__slide snip0019">
                            <a href="<?php echo e(route('car.location',$location->id)); ?>">
                                <figcaption>
                                    <div>
                                        <h2></h2>
                                    </div>
                                    <div>
                                        <p><?php echo e($location->locat_name); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('car.location',$location->id)); ?>"></a>
                                </figcaption>
                            </a>
                        </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </ul>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\xampp\htdocs\php__booking\resources\views/partials/location.blade.php ENDPATH**/ ?>
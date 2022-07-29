<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>

    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/open-iconic-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/animate.css')); ?>">
    <!-- or the reference on CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- themify icon -->
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/css/themify-icons.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/magnific-popup.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/aos.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/ionicons.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/bootstrap-datepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/jquery.timepicker.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/icomoon.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/partner.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('ui/css/loader.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('ui/css/styles.css')); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Car<span>Book</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="<?php echo e(url('/')); ?>" class="nav-link">Home</a></li>
                        <!-- <li class="nav-item"><a href="<?php echo e(route('about')); ?>" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="<?php echo e(route('service')); ?>" class="nav-link">Services</a></li> -->
                        <!-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li> -->
                        <li class="nav-item"><a href="<?php echo e(route('car')); ?>" class="nav-link">Vehicle</a></li>
                        <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                        <li class="nav-item"><a href="<?php echo e(route('contacts')); ?>" class="nav-link">Contact</a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" href="#" role="button" id="language"> English</a>
                            <div class="dropdown-menu" aria-labelledby="language">
                                <a class="dropdown-item" onclick="doGTranslate('en|en');document.querySelector('#language').textContent='English'" href="#">
                                    <span class="flag-icon flag-icon-us"></span> English</a>
                                <a class="dropdown-item" onclick="doGTranslate('en|ja');document.querySelector('#language').textContent='Japan'" href="#"><span class="flag-icon flag-icon-jp"></span> Japanese</a>
                                <a class="dropdown-item" onclick="doGTranslate('en|vi');document.querySelector('#language').textContent='Việt Nam'" href="#"><span class="flag-icon flag-icon-vn"></span> Vietnamese</a>
                                <a class="dropdown-item" onclick="doGTranslate('en|zh-CN');document.querySelector('#language').textContent='Chinese'" href="#"><span class="flag-icon flag-icon-cn"></span> Chinese</a>
                            </div>
                            <div id="google_translate_element2"></div>
                        </li>
                        <?php if (Auth::user()) : ?>

                            <li class="nav-item dropdown d-flex">
                                <?php if (Auth()->user()->social_type == "google") : ?>
                                    <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;" class="img-fluid" src="<?php echo e(Auth()->user()->photo); ?>" alt="Header Avatar">
                                <?php else : ?>
                                    <?php if (Auth()->user()->photo) : ?>
                                        <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;" class="img-fluid" src="<?php echo e(asset('uploads/images/users/' . Auth()->user()->photo)); ?>" alt="Header Avatar">
                                    <?php else : ?>
                                        <img style="width: 36px;height: 36px;margin-right: 10px;border-radius: 50%;margin-top: 12px;" class="img-fluid" src="<?php echo e(asset('assets/images/users/user-1.jpg')); ?>" alt="Header Avatar">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <a class="dropdown-toggle nav-link" style="padding-left: 0px !important;" href="#" role="button" id="more"><?php echo e(Auth::user()->name); ?></a>
                                <div class="dropdown-menu" aria-labelledby="more">
                                    <!-- Quản trị viên -->
                                    <?php if (auth()->guard()->check()) : ?>
                                        <?php if (Auth::user()->role == "admin") : ?>
                                            <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Administrators</a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <!-- Người cho thuê xe -->
                                    <?php if (Auth::user()->role == "mod") : ?>
                                        <a class="dropdown-item" href="<?php echo e(route('admin')); ?>">Administrators</a>
                                    <?php endif; ?>
                                    <!-- Kết thúc -->
                                    <a class="dropdown-item" href="<?php echo e(route('user.profile', Auth::user()->id)); ?>">Account</a>
                                    <?php if (Auth::user()->id) : ?>
                                        <a class="dropdown-item" href="<?php echo e(route('wishlist')); ?>">Favorite</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('coupon')); ?>">Coupons</a>
                                    <a class="dropdown-item" href="<?php echo e(route('history')); ?>">Historys</a>
                                    <?php if (Auth::user()->role == 'user') : ?>
                                        <a class="dropdown-item" href="<?php echo e(route('referral')); ?>">Introduce friends</a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.change.password')); ?>">Change Password</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>">Logout</a>
                                </div>

                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.login')); ?>" class="nav-link btn">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('user.register')); ?>" class="nav-link btn btn-outline-white ">Sign Up</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\php__booking\resources\views/layouts/app.blade.php ENDPATH**/ ?>

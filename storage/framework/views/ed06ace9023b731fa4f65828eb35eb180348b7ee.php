<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">خانه</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">تماس</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="/adminlte/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                حسام موسوی
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">با من تماس بگیر لطفا...</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="/adminlte/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                پیمان احمدی
                                <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">من پیامتو دریافت کردم</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="/adminlte/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                سارا وکیلی
                                <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown" id="toggle-notify">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-warning navbar-badge">
                    <?php if($notifications !== 0): ?>
                             <?php echo e($notifications->count()); ?>

                    <?php endif; ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">
                    <?php if($notifications !== 0): ?>
                    <?php echo e($notifications->count()); ?>

                    <?php endif; ?>
                    نوتیفیکیشن
                </span>
                <div class="dropdown-divider"></div>
                <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#" class="dropdown-item">

                        <span><?php echo e($notification['data']['message']); ?></span>
                        <span class="float-left text-muted text-sm"><?php echo e(jdate($notification->created_at)->ago()); ?></span>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </li>

    </ul>
</nav>
<script>
        toggleNotify = document.getElementById('toggle-notify');
         toggleNotify.addEventListener('click',function(){
             $.ajax({
                 type: 'POST',
                 url: 'admin/notification/read-all',
                 data: {_token: "<?php echo e(csrf_token()); ?>" },
                 success:function(){
                     console.log('yes');
                 }
             })
         })
</script>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/layouts/nav.blade.php ENDPATH**/ ?>
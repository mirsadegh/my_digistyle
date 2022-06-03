<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?php echo e(url('/admin')); ?>" class="nav-link <?php echo e(isActive('admin.')); ?> ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                پنل مدیریت
                            </p>
                        </a>

                    </li>
                   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-users')): ?>
                        <li class="nav-item has-treeview <?php echo e(isActive(['admin.users.index','admin.users.create','admin.users.edit'],'menu-open')); ?>">
                            <a href="#" class="nav-link <?php echo e(isActive('admin.users.index')); ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo e(route('admin.users.index')); ?>" class="nav-link <?php echo e(isActive('admin.users.index')); ?>">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>لیست کاربران</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                   <?php endif; ?>

                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.products.index','admin.products.create','admin.products.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link <?php echo e(isActive('admin.products.index')); ?>">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                محصولات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.products.index')); ?>" class="nav-link <?php echo e(isActive('admin.products.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo e(isActive('admin.comments','menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                نظرات
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.comments')); ?>" class="nav-link <?php echo e(isActive('admin.comments')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست نظرات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.categories.index','admin.categories.create','admin.categories.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-database"></i>
                            <p>
                                دسته بندی ها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link <?php echo e(isActive('admin.categories.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست دسته بندی</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.discounts.index','admin.discounts.create','admin.discounts.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-percent"></i>
                            <p>
                                تخفیف
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.discounts.index')); ?>" class="nav-link <?php echo e(isActive('admin.discounts.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست تخفیفات</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.orders.index',] , 'menu-open')); ?>">
                        <a href="#" class="nav-link <?php echo e(isActive(['admin.orders.index'])); ?>">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                بخش سفارشات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index' , ['type' => 'unpaid'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'unpaid']))); ?> ">
                                    <i class="fa fa-circle-o nav-icon text-warning"></i>
                                    <p>پرداخت نشده
                                        <span class="badge badge-warning right"><?php echo e(\App\Models\Order::whereStatus('unpaid')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index' , ['type' => 'paid'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'paid']))); ?>">
                                    <i class="fa fa-circle-o nav-icon text-info"></i>
                                    <p>پرداخت شده
                                        <span class="badge badge-info right"><?php echo e(\App\Models\Order::whereStatus('paid')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index'  , ['type' => 'preparation'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'preparation']))); ?>">
                                    <i class="fa fa-circle-o nav-icon text-primary"></i>
                                    <p>در حال پردازش
                                        <span class="badge badge-primary right"><?php echo e(\App\Models\Order::whereStatus('preparation')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index' , ['type' => 'posted'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'posted']))); ?>">
                                    <i class="fa fa-circle-o nav-icon text text-light"></i>
                                    <p>ارسال شده
                                        <span class="badge badge-light right"><?php echo e(\App\Models\Order::whereStatus('posted')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index' , ['type' => 'received'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'received']))); ?>">
                                    <i class="fa fa-circle-o nav-icon text-success"></i>
                                    <p>دریافت شده
                                        <span class="badge badge-success right"><?php echo e(\App\Models\Order::whereStatus('received')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.orders.index' , ['type' => 'canceled'])); ?>" class="nav-link <?php echo e(isUrl(route('admin.orders.index' , ['type' => 'canceled']))); ?>">
                                    <i class="fa fa-circle-o nav-icon text-danger"></i>
                                    <p>کنسل شده
                                        <span class="badge badge-danger right"><?php echo e(\App\Models\Order::whereStatus('canceled')->count()); ?></span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.sliders.index','admin.sliders.create','admin.sliders.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-sliders"></i>
                            <p>
                                مدیریت اسلایدر
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.sliders.index')); ?>" class="nav-link <?php echo e(isActive('admin.sliders.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست تصاویر اسلاید</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.sliders.index','admin.sliders.create','admin.sliders.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-behance-square"></i>
                            <p>
                                 برندها
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.brands.index')); ?>" class="nav-link <?php echo e(isActive('admin.sliders.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p>لیست برندها</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.amazing_sales.index','admin.amazing_sales.create','admin.amazing_sales.edit'],'menu-open')); ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-buysellads"></i>
                            <p style="font-size: 12px">
                                 محصولات شگفت انگیز
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.amazing_sales.index')); ?>" class="nav-link <?php echo e(isActive('admin.amazing_sales.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p style="font-size: 10px">لیست محصولات شگفت انگیز</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php echo e(isActive(['admin.permissions.index','admin.permissions.create','admin.permissions.edit','admin.roles.index','admin.roles.create','admin.roles.edit'],'menu-open')); ?>">

                       <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-buysellads"></i>
                            <p style="font-size: 12px">
                                 بخش اجازه دسترسی
                                <i class="fa fa-angle-left right"></i>
                            </p>
                        </a>


                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-roles')): ?>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.roles.index')); ?>" class="nav-link <?php echo e(isActive('admin.roles.index')); ?>">
                                    <i class="fa fa-list nav-icon"></i>
                                    <p style="font-size: 10px">همه مقام ها</p>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-permissions')): ?>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.permissions.index')); ?>" class="nav-link <?php echo e(isActive('admin.permissions.index')); ?>">
                                <i class="fa fa-list nav-icon"></i>
                                <p style="font-size: 10px">همه دسترسی ها</p>
                            </a>
                        </li>
                    </ul>
                    <?php endif; ?>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>
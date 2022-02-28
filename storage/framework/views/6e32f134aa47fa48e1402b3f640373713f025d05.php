<?php $__env->startComponent('admin.content',['title' => 'لیست نظرات']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست نظرات</li>
    <?php $__env->endSlot(); ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نظرات</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <?php if(! request('approved') && ! request('unapproved')): ?>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['approved' => 1])); ?>" class="btn btn-warning">نظرات تایید شده</a>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['unapproved' => 1])); ?>" class="btn btn-success">نظرات تایید نشده</a>
                            <?php elseif(! request('unapproved')): ?>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['approved' => 1])); ?>" class="btn btn-warning">نظرات تایید شده</a>
                            <?php elseif(! request('approved')): ?>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['unapproved' => 1])); ?>" class="btn btn-success">نظرات تایید نشده</a>
                            <?php endif; ?>
                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px">
                                <input type="text" name="search" class="form-control" placeholder="جستجو" value="<?php echo e(request('search')); ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr class="text-center">
                            <th>ردیف</th>
                            <th>نام نظر دهنده</th>
                            <th>نام محصول</th>
                            <th>متن نظر</th>
                            <th>وضعیت نظر</th>
                            <th>اقدامات</th>
                        </tr>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($comment->id); ?></td>
                                <td><?php echo e($comment->user->name); ?></td>

                                <td><?php echo e($comment->commentable->name); ?></td>
                                <td><?php echo e($comment->comment); ?></td>

                                <?php if($comment->approved == 0): ?>
                               <td ><a href="<?php echo e(route('admin.changeApproved',$comment->id)); ?>" class="btn btn-sm btn-success" title="تایید">تایید نشده</a></td>
                                <?php else: ?>
                                 <td> <span onclick="changeUnApproved(<?php echo e($comment->id); ?>)"  class="btn btn-sm btn-warning" title="عدم تایید">تایید شده</span></td>
                                <?php endif; ?>


                                <td>
                                        <form action="<?php echo e(route('admin.comments.destroy',['comment' => $comment->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($comments->appends(['search' => request('search')])->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    <?php $__env->slot('script'); ?>
        <script>
            // function changeApproved(id){
            //     console.log(id)
            //     $.ajax({
            //         type: 'GET',
            //         url: '/admin/changeApproved/'+id,
            //         success:function (res){
            //             location.reload(true)
            //             console.log(res)
            //         }
            //     })
            //
            // }
            function changeUnApproved(id){
                console.log(id)
                $.ajax({
                    type: 'GET',
                    url: '/admin/changeUnApproved/'+id,
                    success:function (res){
                        location.reload(true)
                        console.log(res)
                    }
                })

            }


        </script>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/comments/all.blade.php ENDPATH**/ ?>
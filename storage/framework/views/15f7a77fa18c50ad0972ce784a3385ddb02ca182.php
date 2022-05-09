<?php if(session('toast-error')): ?>

    <section class="toast" data-delay="5000">

           <section class="toast-body py-3 d-flex bg-danger text-white">
                  <strong class="ml-auto"><?php echo e(session('toast-error')); ?></strong>

                  <button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
           </section>

    </section>

    <script>
         $(document).ready(function(){
             $('.toast').toast('show');
         })
    </script>
<?php endif; ?>

<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/alerts/toast/error.blade.php ENDPATH**/ ?>
<?php if(session('swal-error')): ?>

  <script>
       $(document).ready(function(){
        Swal.fire({
            title: 'خطا!',
            text: '<?php echo e(session('swal-error')); ?>',
            icon: 'error',
            confirmButtonText: 'باشه'
    });
       });
  </script>

<?php endif; ?>


<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/alerts/sweetalert/error.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">Edit User</div>
    <div class="card-body ">
        <form class="col-md-6" action="/admin/update-user/<?php echo e($user[0]->userId); ?>" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" value="<?php echo e($user[0]->username); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Permission</label>
                <input type="text" name="permission" value="<?php echo e($user[0]->permission); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Summary</label>
                <input type="text" name="summary" value="<?php echo e($user[0]->summary); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Education</label>
                <input type="text" name="education" value="<?php echo e($user[0]->education); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Work</label>
                <input type="text" name="work" value="<?php echo e($user[0]->work); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" value="<?php echo e($user[0]->email); ?>" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Experience</label>
                <input type="text" name="experience" value="<?php echo e($user[0]->experience); ?>" class="form-control" placeholder="">
            </div>
            
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/users/edit.blade.php ENDPATH**/ ?>
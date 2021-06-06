
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">Edit User</div>
        <div class="card-body ">
            <form class="col-md-6" action="/admin/update-job/<?php echo e($job[0]->postId); ?>" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" value="<?php echo e($job[0]->title); ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Deadline</label>
                    
                    <input type="text" id="datepicker" value="<?php echo e($job[0]->deadline); ?>"" name="deadline" width="276" />
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap4'
                        });

                    </script>
                </div>
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" value="<?php echo e($job[0]->location); ?>" class="form-control"
                        placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="text" name="salary" value="<?php echo e($job[0]->salary); ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <textarea name="content" id="editor">
                                <?php echo $job[0]->body; ?>

                            </textarea>
                </div>
                <div class="form-group">
                    <label for="title">Category</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <?php if(isset($category)): ?>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($c->catId); ?>"><?php echo e($c->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Edit</button>
            </form>
        </div>
        <div class="card-footer">

        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/jobs/edit.blade.php ENDPATH**/ ?>
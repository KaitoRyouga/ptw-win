
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body">
                
                <?php
                    if (isset($_SESSION['success'])) {
                        if ($_SESSION['success'] == 'add') {
                            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                            <strong>Bạn đã thêm thành công</strong>
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>';
                            unset($_SESSION['success']);
                        } elseif ($_SESSION['success'] == 'edit') {
                            echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>Bạn đã sửa thành công</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                            unset($_SESSION['success']);
                        } elseif ($_SESSION['success'] == 'delete') {
                            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                            <strong>Bạn đã xóa thành công</strong>
                                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>';
                            unset($_SESSION['success']);
                        }
                    }
                ?>
                <div class="table table-responsive table-bordered table-hover">
                    <table>
                        <thead>
                            <tr>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Deadline</th>
                                <th>Location</th>
                                <th>Salary</th>
                                <th>content</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($u->title); ?></td>
                                    <td><?php echo e($u->deadline); ?></td>
                                    <td><?php echo e($u->location); ?></td>
                                    <td><?php echo e($u->salary); ?></td>
                                    <td><?php echo $u->body; ?></td>
                                    <td><?php echo e($u->author); ?></td>
                                    <td><?php echo e($u->category); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/edit-job/<?php echo e($u->jobId); ?>">Edit</a>
                                        <a class="btn btn-dark" href="/admin/delete-job/<?php echo e($u->jobId); ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/jobs/index.blade.php ENDPATH**/ ?>
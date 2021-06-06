
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <a class="btn btn-success mb-3" href="/admin/add-user">Add</a>
            <?php
            if(isset($_SESSION['success'])) {
            if($_SESSION['success']=="add") {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bạn đã thêm thành công</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            unset($_SESSION['success']);
            } elseif ($_SESSION['success']=="edit") {
            echo ' <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Bạn đã sửa thành công</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
            unset($_SESSION['success']);
            }
            elseif ($_SESSION['success']=="delete") {
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
                            <th>Username</th>
                            <th>Permission</th>
                            <th>Summary</th>
                            <th>Education</th>
                            <th>Work</th>
                            <th>Email</th>
                            <th>Experience</th>
                            <th>ImgSrc</th>
                            <th>Action</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($u->userId); ?></td>
                            <td><?php echo e($u->username); ?></td>
                            <td><?php echo e($u->permission); ?></td>
                            <td><?php echo e($u->summary); ?></td>
                            <td><?php echo e($u->education); ?></td>
                            <td><?php echo e($u->work); ?></td>
                            <td><?php echo e($u->email); ?></td>
                            <td><?php echo e($u->experience); ?></td>
                            <td><?php echo e($u->imgSrc); ?></td>
                            <td>
                                <a class="btn btn-primary" href="/admin/edit-user/<?php echo e($u->userId); ?>">Edit</a>
                                <a class="btn btn-dark" href="/admin/delete-user/<?php echo e($u->userId); ?>">Delete</a>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/users/index.blade.php ENDPATH**/ ?>
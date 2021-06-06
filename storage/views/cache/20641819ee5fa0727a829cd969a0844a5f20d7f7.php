
<?php $__env->startSection('content'); ?>
<div class="container">
    <main class="page-content">

        <div class="row mr-0 ml-0   ">
    
            <?php if(isset($user)): ?>
            <div class="col-md-12 action-edit">
                <button class="btn btn-warning mb-3 edit-info">Edit</button>
                <a href="/change-pass" class="btn btn-secondary mb-3">Change Password</a>
            </div>
    
    
            <div class="col-md-4">
                <div class="card text-center p-2">
                    <img class="m-auto" width="100" height="100" src="
                    <?php if($user[0]->imgSrc == '' || $user[0]->imgSrc == NULL): ?>
                    https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg
                    <?php else: ?>
                    <?php echo e(BASE_URL . '/admin/img/' . $user[0]->imgSrc); ?>

                    <?php endif; ?>
                    " alt="">
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 20px;"><?php echo e($user[0]->username); ?></h4>
                    </div>
    
                    <form id="formAvatar" class="col-md-12" action="/edit-info" method="post" enctype="multipart/form-data">
                        <div class="avatar">
    
                        </div>
                    </form>
    
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Contract information
                    </div>
                    <div class="card-body">
                        <div class="contact_info">
                            <p class="card-text"><?php echo e($user[0]->email); ?></p>
                        </div>
                    </div>
    
                </div>
                <div class="card mt-3">
                    <div class="card-header">
                        Experience
                    </div>
                    <div class="card-body">
                        <div class="experience">
                            <p class="card-text"><?php echo e($user[0]->experience); ?></p>
                        </div>
                    </div>
    
                </div>
            </div>
            <div class="col-md-8">
                <div class="card ">
                    <div class="card-header">
                        Summary
                    </div>
                    <div class="card-body">
                        <div class="summary">
                            <p class="card-text">
                                <?php echo e($user[0]->summary); ?>

                            </p>
                        </div>
                    </div>
    
                </div>
                <div class="card mt-3 ">
                    <div class="card-header">
                        Education
                    </div>
    
                    <div class="card-body">
                        <div class="education">
                            <p class="card-text">
                                <?php echo e($user[0]->education); ?>

                            </p>
                        </div>
                    </div>
    
                </div>
                <div class="card mt-3 ">
                    <div class="card-header">
                        Work
                    </div>
                    <div class="card-body">
                        <div class="work">
                            <p class="card-text">
                                <?php echo e($user[0]->work); ?>

                            </p>
                        </div>
                    </div>
    
                </div>
    
            </div>
    
            <?php endif; ?>
    
        </div>
    
        </div>
    </main>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/info/index.blade.php ENDPATH**/ ?>
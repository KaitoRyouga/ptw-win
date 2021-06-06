
<?php $__env->startSection('content'); ?>
    <div class="container">
        <main class="page-content">
            <?php if(isset($job)): ?>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="name-job">
                                <?php echo e($job[0]->title); ?>

                            </h3>
                            <button data-id="<?php echo e($job[0]->author); ?>" class="btn btn-success contact">Apply now</button>

                            <hr>
                            <p class="mt-2 mb-0">Location: <?php echo e($job[0]->location); ?></p>
                            <p class="mt-2 mb-0 ">Deadline: <?php echo e($job[0]->deadline); ?> </p>
                            <p class="mt-2">Salary: <?php echo e($job[0]->salary); ?> </p>
                            <hr>
                            <div class="jop-detail-title">
                                <h5>Job Description</h5>
                            </div>
                            <div class="paragrap">
                                <div class="job-details__paragraph">
                                    <?php echo $job[0]->body ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center">
                            <img width="100" height="100"
                                src="<?php echo e(BASE_URL . '/admin/img/' . $job[0]->imgAuthor); ?>"
                                alt="" srcset="">
                            <p class="name mb-0"><?php echo e($job[0]->username); ?></p>
                            <p>Published On <?php echo e($job[0]->created_at); ?></p>
                        </div>
                    </div>

                </div>

            <?php endif; ?>
        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/job/description.blade.php ENDPATH**/ ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <main class="page-content">
    <div class="row mr-0 ml-0 p-3">
        <?php if(isset($events)): ?>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-12 mr-auto ml-auto mb-3 bd-radius">
            <div class="event">
                <div class="d-flex flex-row p-4">
                    <img src="<?php echo e('http://localhost/admin/img/' . $event->imgSrc); ?>" width="200" height="150" alt="" srcset="">
                    <div class="infor ml-5">
                        <?php echo $event->body ?>

                    </div>
                </div>
            </div>
            <button data-dismiss="modal" data-toggle="modal" data-target="#event-detail" data-id="<?php echo e($event->eventId); ?>" class="float-right btn btn-primary mb-2 description-button">chi tiết</button>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/event/index.blade.php ENDPATH**/ ?>
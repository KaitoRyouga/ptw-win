
<?php $__env->startSection('content'); ?>
    <div class="container">
        <main class="page-content">
            <form action="/jobs/search" class="col-md-6 mb-4" method="get">
                <div class="form-search-post">
                    <div class="form-group d-flex flex-row mb-0 ">
                        <label for=""></label>
                        <input type="text" name="search" value="<?php if(isset($search)): ?> <?php echo e($search); ?> <?php endif; ?>" id="" class="form-control mt-0 mb-0" placeholder="Tìm kiếm jobs"
                            aria-describedby="helpId">
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title">Danh mục việc làm:</div>
                        <div class="btn btn-primary mt-3 col-md-12 col-sm-5">Tất cả công việc</div>
                        <button onClick="window.location='/jobs/works'" class="btn btn-primary mt-3 col-md-12  col-sm-3">Việc làm</button>
                        <button onClick="window.location='/jobs/interns'" class="btn btn-primary mt-3 col-md-12 col-sm-3">Thực tập </button>
                    </div>
                    <div class="col-md-9 mt-2">
                        <?php if(!isset($_SESSION['code'])): ?>
                            <div class="card text-center p-4">
                                <p class="text">Công ty bạn muốn tuyển dụng? Hãy chia sẻ cơ hội nghề nghiệp với
                                    nguồn
                                    nhân lực
                                    chất lượng của cộng đồng</p>
                                <button data-toggle="modal" data-target="#upjob"
                                    class="btn btn-success m-auto col-md-8 openmodal">+ Đăng một công việc thực
                                    tập</button>
                            </div>
                        <?php endif; ?>

                        <?php if(isset($jobs)): ?>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card d-flex flex-row mt-3">
                                    <img src="<?php echo e(BASE_URL . '/admin/img/' . $job->imgAuthor); ?>" alt="" srcset="">

                                    <div class="content-job p-3">
                                        <h5 class="name-job"><?php echo e($job->title); ?> <?php if(isset($_SESSION['userId'])): ?>
                                                <?php if($job->author == $_SESSION['userId']): ?>
                                                    <a href="/edit-job/<?php echo e($job->jobId); ?>" style="margin-right: 0.5em"
                                                        class="btn btn-success float-right">Edit</a>
                                                    <a href="/delete-job/<?php echo e($job->jobId); ?>" style="margin-right: 0.5em"
                                                        class="btn btn-success float-right">Delete</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </h5>
                                        <h6 class="user-name"><?php echo e($job->username); ?></h6>
                                        <p><?php echo e($job->location); ?></p>
                                        <p>
                                            <?php
                                                
                                                $end = $job->deadline;
                                                $current = date('m/d/Y');
                                                
                                                $datetime1 = date_create($end);
                                                $datetime2 = date_create($current);
                                                $interval = date_diff($datetime1, $datetime2);
                                                if (strtotime($end) - strtotime($current)) {
                                                    echo 'Còn ' . $interval->days . ' ngày';
                                                } else {
                                                    echo 'Hết hạn.';
                                                }
                                            ?>
                                        </p>
                                        <a href="/job/<?php echo e($job->jobId); ?>">Click view salary</a>
                                    </div>

                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </main>

        <!-- modal -->
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/job/index.blade.php ENDPATH**/ ?>
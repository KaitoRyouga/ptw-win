
<?php $__env->startSection('content'); ?>
<div class="container">
    
    <main class="page-content">
        <form action="/posts/search" class="col-md-6 mb-4" method="post">
            <div class="form-search-post">
                <div class="form-group d-flex flex-row mb-0 ">
                    <label for=""></label>
                    <input type="text" name="search" value="<?php if(isset($search)): ?> <?php echo e($search); ?> <?php endif; ?>" id="" class="form-control mt-0 mb-0"
                        placeholder="Tìm kiếm post" aria-describedby="helpId">
                    <button type="submit"><i class="fas fa-search"></i></button>

                </div>

            </div>
        </form>
        <div class="container">
            
                
            <div class="row">
               
             
                <?php if(isset($posts)): ?>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key + (1 % 3) == 0): ?>
                            <br />
                        <?php endif; ?>
                        <div class="col-md-4 text-center">
                            <div class="box-content"> <img style="height: 10em; width: 10em"
                                    src="<?php echo e(BASE_URL . 'admin/img/' . $post->imgSrc); ?>" alt="" srcset="">
                                <p><?php echo e($post->title); ?></p><a class="btn btn-light"
                                    href="/post/<?php echo e($post->postId); ?>">more...</a>

                                <?php if(isset($_SESSION['userId'])): ?>
                                    <?php if($post->author == $_SESSION['userId']): ?>
                                        <div
                                            style="width: 100%; display: flex; justify-content: space-around; margin-top: 1em">
                                            <a href="/edit-post/<?php echo e($post->postId); ?>"
                                                class="btn btn-secondary float-right">Edit</a>
                                            <a href="/delete-post/<?php echo e($post->postId); ?>"
                                                class="btn btn-danger float-right">Delete</a>
                                        </div>

                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/home/index.blade.php ENDPATH**/ ?>
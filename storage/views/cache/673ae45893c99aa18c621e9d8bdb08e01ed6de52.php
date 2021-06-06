
<?php $__env->startSection('content'); ?>
<?php if(isset($post)): ?>
<div class="container">
    <main style="margin-bottom: 10px" class="page-content bg-light">
        <div class="row">

            <div class="col-md-8">
                <div class="post-image">
                    <img class="img-fluid" src="<?php echo e(BASE_URL . 'admin/img/' . $post[0]->imgSrc); ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-text">
                    <p class="d-block ">
                    <h6 class="title"><?php echo e($post[0]->title); ?></h6>
                    </p>
                    <p class="price"><?php echo e(number_format($post[0]->price, 0, '', ',')); ?> VND</p>
                    <form action="/cart" method="post">
                        <label for="quantity">Số lượng:</label>
                        <input type="number" name="quantity" value="1">
                        <input type="hidden" name="postId" value="<?php echo e($post[0]->postId); ?>">
                        <button class="mt-4 mb-4 btn btn-danger">Thêm vào giỏ hàng</button>
                    </form>

                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="col-md-12 p-2  bg-white ">
                    <img class="img-fluid" style="border-radius: 50%" width="50" height="50" src="<?php echo e(BASE_URL . 'admin/img/' . $post[0]->imgAuthor); ?>">
                    <strong><?php echo e($post[0]->username); ?></strong>
                    <br>
                    <button class="mt-2 d-inline-block btn btn-primary contact">liên hệ</button>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="col-md-12 p-2    bg-white ">
                    <h5>Mô tả sản phẩm</h5>
                    <p class="d-block"><?php echo $post[0]->body; ?></p>
                </div>
            </div>
        </div>
    </main>
</div>


<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/home/description.blade.php ENDPATH**/ ?>
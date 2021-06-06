
<?php $__env->startSection('content'); ?>
    <div class="container">
        <main class="page-content">
            <div class="container p-3">
                <?php if(isset($carts)): ?>
                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartRaw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="small-container cart-page">
                            <table>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>

                                <?php $__currentLoopData = unserialize($cartRaw->product); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="cart-info">

                                                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($p->postId == $cart['postId']): ?>
                                                        <img src="<?php echo e(BASE_URL . '/admin/img/' . $p->imgSrc); ?>" alt="" />
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <p>
                                                        <?php
                                                            foreach ($post as $key => $p) {
                                                                if ($p->postId == $cart['postId']) {
                                                                    echo $p->title;
                                                                    break;
                                                                }
                                                            }
                                                        ?>
                                                    </p>
                                                    <small>Price
                                                        <?php
                                                            foreach ($post as $key => $p) {
                                                                if ($p->postId == $cart['postId']) {
                                                                    echo number_format($p->price, 0, '', ',') . ' VND';
                                                                    break;
                                                                }
                                                            }
                                                        ?>
                                                    </small>
                                                    <br />
                                                    <a href="#">Remove</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input disabled type="number" class="quantityNumber-<?php echo e($cart['postId']); ?>"
                                                id="quantityNumber" data-id="<?php echo e($cart['postId']); ?>"
                                                value="<?php echo e($cart['quantity']); ?>" /></td>
                                        <td class="subtotal-<?php echo e($cart['postId']); ?>">
                                            <?php
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cart['postId']) {
                                                        echo number_format((int) $p->price * (int) $cart['quantity'], 0, '', ',') . ' VND';
                                                        break;
                                                    }
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>

                        <div class="total-price">
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="subtotal">
                                        <?php
                                            $sum = 0;
                                            foreach (unserialize($cartRaw->product) as $key => $cartTotal) {
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cartTotal['postId']) {
                                                        $sum = $sum + $p->price * $cartTotal['quantity'];
                                                        break;
                                                    }
                                                }
                                            }
                                            
                                            echo number_format($sum, 0, '', ',') . ' VND';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>15,000</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id="total">
                                        <?php
                                            $sum = 0;
                                            foreach (unserialize($cartRaw->product) as $key => $cartTotal) {
                                                foreach ($post as $key => $p) {
                                                    if ($p->postId == $cartTotal['postId']) {
                                                        $sum = $sum + $p->price * $cartTotal['quantity'];
                                                        break;
                                                    }
                                                }
                                            }
                                            
                                            echo number_format($sum + 15000, 0, '', ',') . ' VND';
                                            
                                        ?>

                                    </td>

                                </tr>
                            </table>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                <script>
                    var MenuItems = document.getElementById('MenuItems');
                    // MenuItems.style.maxHeight = '0px';

                    function menutoggle() {
                        if (MenuItems.style.maxHeight == '0px') {
                            MenuItems.style.maxHeight = '200px';
                        } else {
                            MenuItems.style.maxHeight = '0px';
                        }
                    }

                </script>
            </div>
        </main>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/user/cart/bought.blade.php ENDPATH**/ ?>
<?php
    $categories = null;
    $categoryRepository = app('Webkul\Category\Repositories\CategoryRepository');

    $keyIndex = array_key_first($category);
    $categoryList = ! is_numeric($keyIndex) ? array_values($category) : [];

    foreach($category as $index => $categoryDetail) {
        $categorySlug = $index;
        if (empty($categoryList)) {
            $categorySlug = $categoryDetail;
        }

        $categories[] = $categoryRepository->findByPath($categorySlug);
    }
?>

<?php if(! empty($categories)): ?>
    <div class="container-fluid category-with-custom-options">
        <div class="row">
            <div class="col pr15">
                <?php if(isset($categoryList[2])): ?>
                    <a href="<?php echo e($categoryList[2]); ?>" target="_blank">
                        <img data-src="<?php echo e($categories[2]->image_url); ?>" class="lazyload" alt="" />
                    </a>
                <?php else: ?>
                    <img data-src="<?php echo e($categories[2]->image_url); ?>" class="lazyload" alt="" />
                <?php endif; ?>
            </div>

            <div class="col">
                <div class="card-arrow-container">
                    <div class="card-arrow card-arrow-rt"></div>
                </div>

                <div class="categories-collection">
                    <div class="category-text-content">
                        <h2 class="text-uppercase">
                            <a href="<?php echo e($categories[0]->slug); ?>" class="remove-decoration normal-white-text">
                                <?php echo e($categories[0]->name); ?>

                            </a>
                        </h2>
                        <ul type="none" class="fs14">
                            <?php $__currentLoopData = $categories[0]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($categories[0]->slug . '/' . $subCategory->slug); ?>" class="remove-decoration normal-white-text">
                                        <?php echo e($subCategory->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col pr15">
                <?php if(isset($categoryList[0])): ?>
                    <a href="<?php echo e($categoryList[0]); ?>" target="_blank">
                        <img data-src="<?php echo e($categories[0]->image_url); ?>" class="lazyload" alt=""/>
                    </a>
                <?php else: ?>
                    <img data-src="<?php echo e($categories[0]->image_url); ?>" class="lazyload" alt=""/>
                <?php endif; ?>
            </div>

            <div class="col">
                <div class="card-arrow-container">
                    <div class="card-arrow card-arrow-bt"></div>
                </div>

                <div class="categories-collection">
                    <div class="category-text-content">
                        <h2 class="text-uppercase">
                            <a href="<?php echo e($categories[1]->slug); ?>" class="remove-decoration normal-white-text">
                                <?php echo e($categories[1]->name); ?>

                            </a>
                        </h2>
                        <ul type="none" class="fs14">
                            <?php $__currentLoopData = $categories[1]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($categories[1]->slug . '/' . $subCategory->slug); ?>" class="remove-decoration normal-white-text">
                                        <?php echo e($subCategory->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col mr15">
                <div class="card-arrow-container">
                    <div class="card-arrow card-arrow-tp"></div>
                </div>

                <div class="categories-collection">
                    <div class="category-text-content">
                        <h2 class="text-uppercase">
                            <a href="<?php echo e($categories[2]->slug); ?>" class="remove-decoration normal-white-text">
                                <?php echo e($categories[2]->name); ?>

                            </a>
                        </h2>
                        <ul type="none" class="fs14">
                            <?php $__currentLoopData = $categories[2]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($categories[2]->slug . '/' . $subCategory->slug); ?>" class="remove-decoration normal-white-text">
                                        <?php echo e($subCategory->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col mt15">
                <?php if(isset($categoryList[3])): ?>
                    <a href="<?php echo e($categoryList[3]); ?>" target="_blank">
                        <img data-src="<?php echo e($categories[3]->image_url); ?>" class="lazyload" alt=""/>
                    </a>
                <?php else: ?>
                    <img data-src="<?php echo e($categories[3]->image_url); ?>" class="lazyload" alt=""/>
                <?php endif; ?>
            </div>

            <div class="col mt15 mr15">
                <div class="card-arrow-container">
                    <div class="card-arrow card-arrow-lt"></div>
                </div>

                <div class="categories-collection">
                    <div class="category-text-content">
                        <h2 class="text-uppercase">
                            <a href="<?php echo e($categories[3]->slug); ?>" class="remove-decoration normal-white-text">
                                <?php echo e($categories[3]->name); ?>

                            </a>
                        </h2>
                        <ul type="none" class="fs14">
                            <?php $__currentLoopData = $categories[3]->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($categories[3]->slug . '/' . $subCategory->slug); ?>" class="remove-decoration normal-white-text">
                                        <?php echo e($subCategory->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <?php if(isset($categoryList[1])): ?>
                    <a href="<?php echo e($categoryList[1]); ?>" target="_blank">
                        <img data-src="<?php echo e($categories[1]->image_url); ?>" class="lazyload" alt=""/>
                    </a>
                <?php else: ?>
                    <img data-src="<?php echo e($categories[1]->image_url); ?>" class="lazyload" alt=""/>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div class="container-fluid category-with-custom-options vc-small-screen">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="smart-category-container">
                <div class="col-12">
                    <?php if(isset($categoryList[$key])): ?>
                        <a href="<?php echo e($categoryList[$key]); ?>" target="_blank">
                            <img data-src="<?php echo e($categoryItem->image_url); ?>" class="lazyload" alt="" />
                        </a>
                    <?php else: ?>
                        <img data-src="<?php echo e($categoryItem->image_url); ?>" class="lazyload" alt="" />
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <div class="card-arrow-container">
                        <div class="card-arrow card-arrow-tp"></div>
                    </div>

                    <div class="categories-collection">
                        <div class="category-text-content">
                            <h2 class="text-uppercase">
                                <a href="<?php echo e($categoryItem->slug); ?>" class="remove-decoration normal-white-text">
                                    <?php echo e($categoryItem->name); ?>

                                </a>
                            </h2>
                            <ul type="none" class="fs14">
                                <?php $__currentLoopData = $categoryItem->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($categoryItem->slug . '/' . $subCategory->slug); ?>" class="remove-decoration normal-white-text">
                                            <?php echo e($subCategory->name); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /home/ubuntu/volantiScottsdale/packages/Webkul/Velocity/src/Resources/views/shop/home/category-with-custom-option.blade.php ENDPATH**/ ?>
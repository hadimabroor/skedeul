
<?php include APPPATH.'views/include/banner2.php'; ?>

<?php if(empty($categories) && empty($services)): ?>
    <section class="bg-light">
        <div class="bg-light">
            <?php include APPPATH.'views/include/not_found_msg.php'; ?>
        </div>
    </section>
<?php endif; ?>

<!-- services -->
<?php if(!empty($categories)): ?>
<section class="bg-light pt-0">
    <div class="container p-0">
        <?php $c=1; foreach ($categories as $category): ?>
            <div class="d-flex justify-content-between align-items-center mb-0 mt-<?php if($c != 1){echo "8";} ?>">
                <h5 class="mb-0"><?php echo html_escape($category->name) ?></h5>
                <a href="<?php echo base_url('services/'.$slug) ?>" class="btn btn-light-dark btn-sm"> See More <?php echo trans('see-more') ?> <i class="lni lni-arrow-right"></i></a>
            </div> 

            <!-- Blog -->
            <div class="row">
                <?php $i=1; foreach ($category->services as $service): ?>
                    <?php include APPPATH.'views/include/service_items_2.php'; ?>
                <?php $i++; endforeach; ?>
            </div>
            <!-- End Blog -->
        <?php $c++; endforeach; ?>
    </div>
</section>
<?php endif; ?>




<!-- services -->
<?php if(!empty($services)): ?>
<section class="bg-light pt-0">
    <div class="container p-0">

        <div class="text-left mb-1 d-flex justify-content-between align-items-center">
            <h5 class="mb-1"><?php echo trans('services') ?></h5>
            <a href="<?php echo base_url('services/'.$slug) ?>" class="btn btn-light-dark btn-sm"> See More <?php echo trans('see-more') ?> <i class="lni lni-arrow-right"></i></a>
        </div> 

        <!-- Blog -->
        <div class="row">

            <?php $i=1; foreach ($services as $service): ?>
                <?php include APPPATH.'views/include/service_items_'.$template.'.php'; ?>
            <?php $i++; endforeach; ?>

        </div>
        <!-- End Blog -->

    </div>
</section>
<?php endif; ?>


<?php if($company->enable_testimonial && !empty($testimonials)): ?>
<section class="bg-gray border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center mb-5">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('testimonials') ?></p>
                <h1 class="text-dark w-40 mx-auto font-weight-bold"><?php echo trans('what-customers-say-about-us') ?></h1>
            </div>
            <div class="col-md-12">
                <div class="testimonial-carousel-2 owl-carousel owl-theme navCenter">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="col-6s item mb-5">
                            <div class="cards border-1 h-100 bg-white mr-2 round-2">
                                <div class="card-body testimonial-box text-centers">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center pt-3">
                                            <img src="<?php echo base_url($testimonial->image) ?>" class="rounded-circle md-avatar tes-img" alt="Name">
                                            <div class="ml-3">
                                                <h6 class="mb-0"><?php echo html_escape($testimonial->name) ?></h6>
                                                <span class="small">
                                                    <?php echo html_escape($testimonial->designation) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <h6 class="font-weight-normal"><?php echo html_escape($testimonial->feedback) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if($company->enable_brand == 1 && !empty($brands)): ?>
<section class="bg-white pt-10 pb-10">
    <div class="container">
        <div class="brand-carousel-5 owl-carousel owl-theme">
            <?php foreach ($brands as $brand): ?>
                <?php include APPPATH.'views/templates/common/brands.php'; ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif; ?>



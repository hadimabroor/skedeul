<section class="bannerimgs p-0 mb-0">
    <div class="container-fluid pl-0 pr-0">
        <?php if(!empty($sliders)): ?>
            <div class="carousel-1 owl-carousel owl-theme h-100 w-100 navjustify">
                <?php foreach ($sliders as $slider): ?>
                    <div class="item sliderimg overlay overlay-black overlay-50" style="background-image: url(<?php echo base_url($slider->image) ?>);">
                        <div class="container h-center">
                            <div class="row no-gutters">
                                <div class="col-12 pt-0" data-aos="fade-right" data-aos-delay="100">
                                    <h1 class="mb-4 display-4 w-md-50 line-height-sm text-light font-weight-bold"><?php echo html_escape($slider->title) ?></h1>
                                    <p class="text-light mb-5 mb-xl-6 line-height-lg w-md-50 fs-20"><?php echo strip_tags(character_limiter($slider->details, 150)) ?></p>

                                    <?php if (!empty($services) || !empty($categories)): ?>
                                        <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="btn btn-light btn-lg lift-sm fs-15 py-3"><?php echo trans('book-now') ?> <i class="bi bi-arrow-right ml-1"></i></a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <?php if (empty($company->image)):?>
                <?php $bg_image = base_url('assets/front/img/vericla-cover.jpg'); ?>
            <?php else: ?>
                <?php $bg_image = base_url($company->image);?>
            <?php endif; ?>
            <div class="item sliderimg overlay overlay-black overlay-40" style="background-image: url(<?php echo $bg_image ?>);">
                <div class="container h-center">
                    <div class="row no-gutters">
                        <div class="col-12 pt-8">
                            <h1 class="mb-4 display-5 w-lg-50 line-height-sm text-light font-weight-bold"><?php echo html_escape($company->title) ?></h1>
                            <p class="text-light mb-5 mb-xl-6 line-height-lg w-md-90 w-lg-50 fs-20"><?php echo strip_tags(character_limiter($company->description, 150)) ?></p>
                            <?php if (!empty($services) || !empty($categories)): ?>
                                <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="btn btn-light btn-lg lift-sm fs-15 py-3"><?php echo trans('book-now') ?> <i class="bi bi-arrow-right ml-1"></i></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
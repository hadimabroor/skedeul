<?php if ($template == 2): ?>
    <?php include APPPATH.'views/include/banner2.php'; ?>
<?php endif ?>

<section class="bg-light p-6">
    <div class="container">
        <div class="rows d-flex justify-content-center hide-xs">
            <h2 class="pt-2"><?php echo html_escape($page_title) ?></h2>
        </div>
    </div>
</section>

<section class="bg-lights pt-8 border-top-light">
    <div class="container <?php if (empty($galleries)){echo "h-100vh";} ?> mb-4 p-0">
        <div class="row justify-content-center">
            <div class="text-center">
                <h3 class="mb-5"><?php echo trans('gallerys') ?></h3>
            </div>
            <div class="col-lg-12 br-10">
                <?php if (empty($galleries)): ?>
                    <div class="text-center">
                        <p class="text-muted m-auto pt-4"><?php echo trans('no-data-found') ?></p>
                    </div>
                <?php else: ?>
                <div class="cus-gallery row">
                    <?php foreach ($galleries as $image): ?>
                        <div class="col-sm-4 lift-xs mb-5">
                            <div class="overlay">
                                <div class="overlay-wrapper">
                                    <div class="gallerybg" style="background-image: url(<?php echo base_url($image->image); ?>);"></div>
                                </div>
                                <div class="overlay-layer">
                                    <a class="btn btn-outline-light btn-md btn-pill" href="<?php echo base_url($image->image); ?>" data-lightbox="example-set" data-title="<?php echo html_escape($image->title); ?>"><i class="bi bi-arrows-angle-expand"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>



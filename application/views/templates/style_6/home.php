<?php include APPPATH.'views/templates/common/slider.php'; ?>


<?php if (!empty($service_categories)): ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center pl-0 mb-5">
                <p class="font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('scince') ?> <?php echo html_escape($company->company_established) ?></p>
                <h1 class="mb-3 font-weight-bold"> <?php echo html_escape($company->about_title) ?></h1>
            </div>
        </div>
    </div>
    <div class="container bg-gray brd-10">
        <div class="row justify-content-center">
            <div class="col-md-5 p-0">
                <div class="service_home_image" style="background-image: url(<?php echo base_url($company->about_image) ?>);"></div>

            </div>

            <div class="col-md-7 pl-8 pr-8">

                <div class="mt-5 mb-4">
                    <h2 class="mb-1"><?php echo trans('what-we-do') ?></h2>
                </div>

                <div class="row">
                    <?php foreach ($service_categories as $service_category): ?>
                        <div class="col-lg-6 col-md-6 mb-5">
                            <div class="py-3 px-4 bg-white brd-10 border-1 hover-border-primary d-flex justify-content-start align-items-center">
                                
                                <?php if ($service_category->is_active == 1): ?>
                                    <div class="category-icon d-flex justify-content-center align-items-center">
                                        <i class="<?php echo html_escape($service_category->icon) ?>"></i>
                                    </div>
                                <?php else: ?> 
                                    <div class="category-img-sm"><img src="<?php echo base_url($service_category->image); ?>"></div>
                                <?php endif ?>

                                <div class="font-weight-bolder mb-0 ml-3 fs-13"><?php echo html_escape($service_category->name) ?></div>

                            </div>
                        </div>
                    <?php endforeach;?>
                </div>

            </div>
        </div>
    </div>
</section>
<?php endif ?>


<section class="jarallax cusbg overlay overlay-black overlay-70 bottom-shape" style="background-image: url(<?php echo base_url($company->about_image) ?>);">
    <div class="container mb-60 mt-60">
        <div class="row justify-content-center align-items-centers">
            <div class="col-md-6 pt-0 pl-2 pr-md-10 mb-xs-5 border-right">
                <div class="text-left mx-auto mb-6 mb-lg-6">
                    <p class="fs-14 font-weight-bold text-uppercase badge badge-secondary mb-1"><?php echo trans('schedule') ?></p>
                    <h2 class="mb-2 font-weight-bold text-light"><?php echo trans('working-hours') ?></h2>
                </div>


                <ul class="list-group p-0">
                    <?php $days = get_days(); ?>
                    <?php if (empty($my_days)): ?>
                        <li class="py-1">
                            <div class="d-flex text-light">
                                <span class="list-style9 mr-3">
                                    <i class="fas fa-times"></i>
                                </span> <?php echo trans('schedule-is-not-setted') ?>
                            </div>
                        </li>
                    <?php else: ?>
                        
                        <?php $i=1; foreach ($days as $day): ?>

                            <?php foreach ($my_days as $asnday): ?>
                                <?php if ($asnday['day'] == $i) {
                                    $check = 'check';
                                    break;
                                } else {
                                    $check = 'times not';
                                }
                                ?>
                            <?php endforeach ?>
                        

                            <?php if($company->time_format == 'HH'){$mstart = $my_days[$i-1]['start'];}else{$mstart = date("h:i a", strtotime($my_days[$i-1]['start']));} ?>
                            <?php if($company->time_format == 'HH'){$mend = $my_days[$i-1]['end'];}else{$mend = date("h:i a", strtotime($my_days[$i-1]['end']));} ?>

                            <li class="list-group-item border-0 blur d-flex justify-content-between align-items-center">
                                <span>
                                    <span class="text-dark fs-15 font-weight-bold"><?php echo trans(strtolower($day)) ?></span>
                                </span> 

                                <?php if ($check == 'check'): ?>
                                    <?php if ($check == 'check'): ?>
                                        <?php if (!empty($my_days[$i-1]['start'])): ?>
                                            <span class="text-dark"> <?= $mstart.' - '.$mend ?></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php else: ?>
                                    <span class="text-light"><i class="bi bi-x-circle fs-12"></i> <?php echo trans('close') ?> </span>
                                <?php endif ?>
                            </li>

                            
                        <?php  $i++; endforeach ?>

                    <?php endif ?>
                </ul>
            </div>


            <div class="col-md-6 pt-0 pr-0 pl-md-10">
                <div class="text-left mx-auto mb-5 mb-lg-5">
                    <p class="fs-14 font-weight-bold text-uppercase badge badge-secondary mb-1"><?php echo trans('about-us') ?></p>
                    <h2 class="mb-2 font-weight-bold text-light"> <?php echo html_escape($company->about_title) ?></h2>
                </div>
                <p class="text-light text-justify"><?php echo strip_tags(character_limiter($company->details, 400)) ?></p>

                <div class="row mt-5 border-top-0">
                    <div class="text-left col-6 mb-5 mb-sm-0 border-0 pr-0">
                        <div class="about-count bg-white border-0 pl-5 py-5 brd-10 blur">
                            <div class="icon-style-two d-flex align-items-center">
                                <div class="icon bg-primary">
                                    <i class="bi bi-person fs-25 text-primary"></i>
                                </div>
                                <div class="ml-3 text-left">
                                    <h4 class="h3 mb-1"><?php echo count_company_info($company->uid, 'staffs') ?></h4>
                                    <p class="mb-0 text-dark"><?php echo trans('experts') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left col-6 mb-5 mb-sm-0 border-0">
                        <div class="about-count bg-white border-0 pl-5 py-5 brd-10 blur">
                            <div class="icon-style-two d-flex align-items-center">
                                <div class="icon bg-primary">
                                    <i class="bi bi-person-check fs-25 text-primary"></i>
                                </div>
                                <div class="ml-3 text-left">
                                    <h4 class="h3 mb-1"><?php echo count_company_info($company->uid, 'customers') ?>+</h4>
                                    <p class="mb-0 text-dark"><?php echo trans('happy-clients') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>




<?php if(!empty($services)): ?>
<section class="pt-12 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-3">
                    <p class="font-weight-bold fs-14 text-uppercase text-primary mb-1"><?php echo trans('what-we-provide') ?></p>
                    <h1 class="text-dark font-weight-bold mx-auto"><?php echo trans('services') ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-gray brd-2">
        <div class="pt-5">
            <div class="row carousel-3-nav owl-carousel owl-theme mb-5">
                <?php foreach ($services as $service): ?>
                    <?php $this->load->view('include/service_items_6',['service'=>$service , 'slider'=>TRUE]); ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if($company->enable_staff == 1 && !empty($staffs)): ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-left mx-md-auto mb-3 pl-0">
                <div class="badge badge-square badge-primary-soft mb-2">
                    <span><?php echo trans('teams') ?></span>
                </div>
                <h1 class="pull-left"><?php echo trans('meet-our-specialists') ?></h1>
            </div>

            <div class="team-carousel-4 owl-carousel owl-theme h-100 w-100 navTopRight">
                <?php foreach ($staffs as $staff): ?>
                    <?php $this->load->view('include/staff_items_3',['staff'=>$staff , 'slider'=>TRUE]); ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<section class="p-0 badge-primary-soft">
    <div class="container-fluid p-0">
        <div class="footer-about-2 py-5">

            <div class="container mx-auto row d-flex align-items-center">
                <div class="col-sm-12 col-md-6">
                    <h2 class="text-primary font-weight-bold mb-3 w-md-60"><?php echo trans('want-to-book-our-service') ?></h2>
                </div>

                <div class="col-sm-12 col-md-6 text-md-right pt-sm-3">
                    <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="btn btn-outline-primary btn-lg lift-sm fs-15"><?php echo trans('book-now') ?> <i class="ml-2 bi bi-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>


<?php if($company->enable_testimonial == 1 && !empty($testimonials)): ?>
<section class="bg-dark2 parent-shape">
    <div class="container counter-padding">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('testimonials') ?></p>
                <h1 class="text-light display-5 font-weight-bold"><?php echo trans('what-customers-say-about-us') ?></h1>
            </div>
            <div class="col-md-8 pl-5">
                <div class="testimonial-carousel-2 owl-carousel owl-theme navleft">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="col-6s item mb-5">
                            <div class="card border-0 shadow-lighth h-100 bg-dark-light mr-2 round-2">
                                <div class="card-body testimonial-box">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex align-items-center pt-3">
                                            <img src="<?php echo base_url($testimonial->thumb) ?>" class="rounded-circle md-avatar tes-img" alt="Name">
                                            <div class="ml-3">
                                                <h6 class="mb-0 text-light"> <?php echo html_escape($testimonial->name) ?></h6>
                                                <span class="text-gray">
                                                    <?php echo html_escape($testimonial->designation) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <h6 class="text-light font-weight-normal">“<?php echo html_escape($testimonial->feedback) ?>”</h6>
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
<section class="bg-grays pt-10 pb-10 bbm-1">
    <div class="container">
        <div class="brand-carousel-5 owl-carousel owl-theme">
            <?php foreach ($brands as $brand): ?>
                <?php include APPPATH.'views/templates/common/brands.php'; ?>
            <?php endforeach ?>
        </div>

    </div>
</section>
<?php endif; ?>






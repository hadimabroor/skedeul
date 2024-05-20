<?php include APPPATH.'views/templates/common/slider.php'; ?>


<section>
    <div class="container mb-60 mt-60">
        <div class="row justify-content-center align-items-centers">
            <div class="col-md-5 mt-1 p-2">
                <div class="about_image1" style="background-image: url(<?php echo base_url($company->about_image) ?>);">
                 
                </div>
            </div>


            <div class="col-md-7 pt-6 pl-5 pr-15">
                <p class="fs-16 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('about-us') ?></p>
                <h2 class="mb-2 font-weight-bold mt-3"> <?php echo html_escape($company->about_title) ?></h2>
                <p class="text-justify"><?php echo strip_tags(character_limiter($company->details, 460)) ?></p>

                <div class="row mt-8 border-top-0">
                    <div class="text-left col-6 mb-5 mb-sm-0 border-0 pr-0">
                        <div class="about-count bg-white shadow-light pl-5 py-5 brd-10">
                            <div class="icon-style-two d-flex align-items-center">
                                <div class="icon">
                                    <i class="bi bi-person fs-25"></i>
                                </div>
                                <div class="ml-3 text-left">
                                    <h4 class="h3 mb-1"><?php echo count_company_info($company->uid, 'staffs') ?></h4>
                                    <p class="mb-0"><?php echo trans('experts') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left col-6 mb-5 mb-sm-0 border-0">
                        <div class="about-count bg-white shadow-light pl-5 py-5 brd-10">
                            <div class="icon-style-two d-flex align-items-center">
                                <div class="icon">
                                    <i class="bi bi-person-check fs-25"></i>
                                </div>
                                <div class="ml-3 text-left">
                                    <h4 class="h3 mb-1"><?php echo count_company_info($company->uid, 'customers') ?>+</h4>
                                    <p class="mb-0"><?php echo trans('happy-clients') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<?php $days = get_days(); ?>
<?php if (!empty($my_days)): ?>
<section class="bg-gray mt--10">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-6 mb-lg-6">
                    <p class="font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('schedule') ?></p>
                    <h1 class="text-dark font-weight-bold mx-auto mb-5"><?php echo trans('working-hours') ?></h1>
                </div>


                <div class="row text-center">
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

                        <div class="col-md-3 mb-0 mt-5">
                            <div class="py-5 px-1 bg-white brd-10 border-1 text-center shadow-light">
                                <p class="font-weight-bolder mb-1 text-dark fs-16"><?php echo trans(strtolower($day)) ?></p>
                                <p class="mb-2">
                                    <?php if ($check == 'check'): ?>
                                        <?php if (!empty($my_days[$i-1]['start'])): ?>
                                            <?= $mstart.' - '.$mend ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                </p>

                                <?php if ($check != 'check'): ?>
                                    <p class="mb-0 text-danger"><?php echo trans('closed') ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    
                    <?php  $i++; endforeach ?>

                </div>
                
                
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<?php if(!empty($service_categories)): ?>
<section class="pb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-8">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('categories') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5"><?php echo trans('what-we-offer') ?></h1>
            </div>
            <?php foreach ($service_categories as $service_category): ?>
                <div class="col-md-3">
                    <a href="javascript:;">
                        <div class="dept-item t3 py-8 px-5 shadow-light text-center lift-sm">
                            <?php if ($service_category->is_active == 1): ?>
                                <div class="mb-5 category-icon d-flex justify-content-center align-items-center m-auto">
                                    <i class="<?php echo html_escape($service_category->icon) ?>"></i>
                                </div>
                            <?php else: ?> 
                                <div class="category-img"><img src="<?php echo base_url($service_category->image); ?>"></div>
                            <?php endif ?>
                            
                            <h5 class="mb-0 mt-5"><?php echo html_escape($service_category->name) ?></h5>
                            <p class="mb-0 mt-1 text-muted"><?php  echo count_service_by_category($service_category->id, $company->uid) ?> <?php echo trans('services') ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if(!empty($services)): ?>
<section class="pt-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mb-5">
                <div class="w-md-80 w-lg-50 text-center mx-auto mb-3">
                    <p class="font-weight-bold fs-14 text-uppercase text-primary mb-1"><?php echo trans('what-we-do') ?></p>
                    <h1 class="text-dark font-weight-bold mx-auto"><?php echo trans('our-services') ?></h1>
                </div>
            </div>

            <?php foreach ($services as $service): ?>
                <?php $this->load->view('include/service_items_3',['service'=>$service , 'slider'=>FALSE]); ?>
            <?php endforeach ?>
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
                    <span><?php echo trans('staff') ?></span>
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


<?php if($company->enable_testimonial == 1 && !empty($testimonials)): ?>
<section class="bg-light bbm-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('testimonials') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5"><?php echo trans('what-our-client-says-about') ?><b class="text-primary"><?php echo $company->name ?></b></h1>
            </div>
            <div class="col-md-12">
                <div class="carousel-2 owl-carousel owl-theme">
                    
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="card shadow-none border-1 h-100 bg-lights mr-2 brd-10 mb-8">
                            <div class="card-body testimonial-box py-10">
                                <div class="text-center">
                                    <div class="pl-4 pr-4">
                                        <h6 class="text-dark font-weight-normal"><?php echo html_escape($testimonial->feedback) ?></h6>
                                    </div>

                                    <div class="pt-3 d-flex justify-content-center align-items-center">
                                        <div class="mr-4">
                                            <img src="<?php echo base_url($testimonial->thumb) ?>" class="rounded-circle md-avatar tes-img m-auto" alt="">
                                        </div>
                                        <div class="pt-1 text-left">
                                            <h6 class="mb-0 text-dark bbm-1 pb-2"><?php echo html_escape($testimonial->name) ?></h6>
                                            <p class="text-muted mb-0 pt-1"><?php echo html_escape($testimonial->designation) ?>
                                            </p>
                                        </div>
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


<section class="p-0 badge-primary-soft bbm-1">
    <div class="container-fluid p-0">
        <div class="footer-about-2 py-8">

            <div class="container mx-auto row d-flex align-items-center">
                <div class="col-sm-12 col-md-5">
                    <h1 class="text-primary font-weight-bold mb-3 w-80 pl-lg-10"><?php echo trans('ready-to-book-our-service') ?></h1>
                </div>

                <div class="col-sm-12 col-md-3">
                    <?php if(!empty($company->address)): ?>
                        <p class="mb-2 fs-13 font-weight-bold text-primary icon-style-small"><i class="icon bi bi-geo text-primary mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->address) ?></p>
                    <?php endif; ?>

                    <?php if(!empty($company->phone)): ?>
                        <p class="mb-2 fs-13 font-weight-bold text-primary icon-style-small"><i class="icon bi bi-phone text-primary mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->phone) ?></p>
                    <?php endif; ?>
                    
                    <?php if(!empty($company->email)): ?>
                        <p class="mb-0 fs-13 font-weight-bold text-primary icon-style-small"><i class="icon bi bi-envelope text-primary mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->email) ?></p>
                    <?php endif; ?>  
                </div>

                <div class="col-sm-12 col-md-4 text-md-center pt-sm-3">
                    <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="btn btn-outline-primary btn-lg lift-sm fs-15"><?php echo trans('book-now') ?><i class="ml-2 bi bi-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </div>
</section>




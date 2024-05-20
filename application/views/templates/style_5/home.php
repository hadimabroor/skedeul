
<?php include APPPATH.'views/templates/common/slider.php'; ?>

<?php   if(!empty($my_days)): ?>
<section class="bg-lights p-0 pb-10">
    <div class="container shadow-light brd-10 schedule-content blur-md">
        <div class="row">
            <div class="col-12 bg-lights text-center py-3">
                <h5 class="badge badge-secondary mb-0"><i class="bi bi-calendar2-check"></i> <?php echo trans('working-hours') ?></h5>
            </div>

            <?php $days = get_days(); ?>
            <?php if (empty($my_days)): ?>
                
                <span> <?php echo trans('schedule-is-not-setted') ?> </span>
                  
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

                   
                    <div class="col text-left <?php if($i != 7){echo "border-sm-right";} ?> py-5 border-top">
                        <p class="text-dark mb-1"><?php echo trans(strtolower($day)) ?></p>
                        <?php if ($check == 'check'): ?>
                            <?php if (!empty($my_days[$i-1]['start'])): ?>
                                <span class="small badge badge-sm bg-success-soft fs-12 font-weight-normal"><i class="far fa-clock"></i> <?= $mstart.'-'.$mend ?></span>
                            <?php endif ?>
                        <?php else: ?>
                            <span class="small badge badge-sm badge-danger-soft fs-12 font-weight-normal"><i class="bi bi-x-circle"></i> <?php echo trans('close') ?> </span>
                        <?php endif ?>
                    </div>

                    
                <?php  $i++; endforeach ?>
               
            <?php endif ?>
        </div>
    </div>
</section>
<?php endif; ?>



<section class="bg-lights">
    <div class="container mb-60 mt-60">
        <div class="row justify-content-center align-items-centers">
            
            <div class="col-md-7 pt-5 pl-5 pr-15">
                <span class="badge badge-primary-soft rounded text-uppercase"><?php echo trans('about-us') ?></span>
                <h2 class="mb-3 font-weight-bold mt-3 fs-50"> <?php echo html_escape($company->about_title) ?></h2>
                <p><?php echo strip_tags(character_limiter($company->details, 500)) ?></p>

                <ul class="list-unstyled mb-5 p-0">
                    <li class="py-2">
                        <div class="d-flex">
                            <span class="list-style1 mr-3">
                                    <i class="fas fa-envelope"></i>
                                </span> <?php echo html_escape($company->email) ?>
                        </div>
                    </li>

                    <?php if (!empty($company->phone)): ?>
                    <li class="py-2">
                        <div class="d-flex">
                            <span class="list-style1 mr-3">
                                    <i class="fas fa-phone"></i>
                                </span> <?php echo html_escape($company->phone) ?>
                        </div>
                    </li>
                    <?php endif ?>

                    <?php if (!empty($company->address)): ?>
                    <li class="py-2">
                        <div class="d-flex">
                            <span class="list-style1 mr-3">
                                    <i class="fas fa-home"></i>
                                </span><?php echo html_escape($company->address) ?>
                        </div>
                    </li>
                    <?php endif ?>

                </ul>

            </div>

            <div class="col-md-5 mt-1 p-3">
                <div class="medical_about_image" style="background-image: url(<?php echo base_url($company->about_image) ?>);">
                    
                    <div class="about_img_content_top card d-none">
                        <div class="d-flex justify-content-start pt-1">
                            <div class="pt-1 pl-2 fs-18">
                                <i class="fas fa-comment"></i>
                            </div>
                            <div class="pl-2">
                                <p class="mb-0 mt-0 fs-12"><b>24/7</b></p>
                                <p class="mb-2 mt-0 fs-8"><?php echo trans('we-are-available-when-you-want') ?></p>
                            </div>
                        </div>
                        
                    </div>

                    <?php if(!empty($company->company_established)): ?>
                        <div class="about_img_content_bottom card d-none">
                            <div class="d-flex justify-content-start pt-1">
                                <div class="fs-14 pl-2">
                                    <i class="fas fa-clock"></i>
                                </div>

                                <?php 

                                $date1 = $company->company_established;
                                $date2 = date('Y');
                                $years = $date2 - $date1;

                                 ?>
                                <div class="pl-2">
                                    <p class="mb-0 mt-0 fs-12"><b><?php echo html_escape($years) ?><?php echo trans('years-experience') ?></b></p>
                                    <p class="mb-2 mt-0 fs-8"><?php echo trans('find-design-inspiration.-share-your-work.-join-the-1-creative-community-online') ?></p>
                                </div>
                            </div>
                            
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

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
                        <div class="dept-item t3 py-8 px-5 shadow-light text-left lift-sm">
                            <?php if ($service_category->is_active == 1): ?>
                                <div class="mb-5 category-icon d-flex justify-content-center align-items-center">
                                    <i class="<?php echo html_escape($service_category->icon) ?>"></i>
                                </div>
                            <?php else: ?> 
                                <div class="category-img mb-5"><img src="<?php echo base_url($service_category->image); ?>"></div>
                            <?php endif ?>
                            
                            <h5 class="mb-0 mt-3"><?php echo html_escape($service_category->name) ?></h5>
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
<section class="pb-20">
    <div class="container">
       
        <!-- Services -->
        <div class="row p-md-0">

            <div class="col-md-12 text-center mb-5">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('what-we-provide') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5">Our Services</h1>
            </div>
            
            <?php foreach ($services as $service): ?>
                <?php $this->load->view('include/service_items_5',['service'=>$service , 'slider'=>FALSE]); ?>
            <?php endforeach ?>

        </div>
        <!-- End Services -->
    </div>
</section>
<?php endif; ?>


<?php if($company->enable_staff == 1 && !empty($staffs)): ?>
<section class="border-top-1">
    <div class="container mb-10">

        <div class="text-center">
            <span class="mt-0 mb-3 badge badge-primary-soft"><?php echo trans('teams') ?></span>
            <h1 class="mb-6"><?php echo trans('our-specialists') ?></h1>
        </div>

        <div class="row">
            <div class="carousel-4 owl-carousel owl-theme pb-5">
                <?php foreach ($staffs as $staff): ?>
                    <?php $this->load->view('include/staff_items_5',['staff'=>$staff , 'slider'=>TRUE]); ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if($company->enable_testimonial && !empty($testimonials)): ?>
<section class="bg-primary-soft parent-shapes">
    <div class="container counter-padding">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <svg width="46px" height="46px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22.8 23.9">
                    <path class="fill-primary mx-auto" d="M661.6,3170.6c.3,0,.5.1.5.3s-1.3,1.3-2.8,2.6-3.7,4.1-3.7,6.8,3.8,5.3,3.8,9-2,5.1-5,5.1-5.7-1.8-5.7-7.3C648.7,3177.9,659,3170.6,661.6,3170.6Zm8,2.5a.4.4,0,0,1,.5.5c0,1.1-3,2.6-3,5.9s4.4,4.2,4.4,7.6a4.2,4.2,0,0,1-4.2,4.2c-3.2,0-5.2-2.5-5.2-5.9C662.1,3178,668.1,3173.1,669.6,3173.1Z" transform="translate(-648.7 -3170.6)"></path>
                </svg><br> <br>

                <h1 class="display-5 font-weight-bold"><?php echo trans('what-peoples-says-about-us') ?></h1>
            </div>
            <div class="col-md-8 pl-5">
                <div class="testimonial-carousel-2 owl-carousel owl-theme navleft">
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="col-6s item mb-5">
                            <div class="cards border-1 h-100 bg-white mr-2 round-2">
                                <div class="card-body testimonial-box">
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
<section class="bg-white pt-10 pb-10 border-top">
    <div class="container">
        <div class="brand-carousel-5 owl-carousel owl-theme">
            <?php foreach ($brands as $brand): ?>
                <?php include APPPATH.'views/templates/common/brands.php'; ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="py-9"></section>

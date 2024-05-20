<?php include APPPATH.'views/templates/common/slider.php'; ?>

<?php if(!empty($company->about_image)): ?>
<section class="p-0">
    <div class="container mb-60 mt-60">
        <div class="row justify-content-center align-items-centers">
            <div class="col-md-5 mt-1 p-2">
                <div class="about_image" style="background-image: url(<?php echo base_url($company->about_image) ?>);">
                 
                </div>
            </div>


            <div class="col-md-7 pt-5 pl-5 pr-15">
                <p class="fs-16 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('about-us') ?></p>
                <h2 class="mb-2 font-weight-bold mt-3"> <?php echo html_escape($company->about_title) ?></h2>
                <p><?php echo strip_tags(character_limiter($company->details, 400)) ?></p>

                <ul class="list-unstyled mb-5 p-0">
                    <?php if(!empty($company->email)): ?>
                    <li class="py-2">
                        <div class="d-flex align-items-center">
                            <span class="list-style1 mr-3"><i class="fas fa-envelope p-3"></i></span> 
                            <span><?php echo html_escape($company->email) ?></span>
                        </div>
                    </li>
                    <?php endif; ?> 

                    <?php if(!empty($company->phone)): ?>
                    <li class="py-2">
                        <div class="d-flex align-items-center">
                            <span class="list-style1 mr-3"><i class="fas fa-phone p-3"></i></span> 
                            <span><?php echo html_escape($company->phone) ?></span>
                        </div>
                    </li>
                    <?php endif; ?>

                    <?php if(!empty($company->address)): ?>
                    <li class="py-2">
                        <div class="d-flex align-items-center">
                            <span class="list-style1 mr-3"><i class="fas fa-home p-3"></i></span> 
                            <span><?php echo html_escape($company->address) ?></span>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(!empty($services)): ?>
<section>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12 text-center">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('services') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5"><?php echo trans('our-best-services') ?></h1>
            </div>
        </div>

        <div class="row carousel-3-nav owl-carousel owl-theme">
            <?php foreach ($services as $service): ?>
                <?php $this->load->view('include/service_items_4',['service'=>$service , 'slider'=>TRUE]); ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if($company->enable_portfolio == 1 && !empty($portfolios)): ?>
<section>
    <div class="container-fluid p-0">

        <div class="row no-gutters mb-5">
            <div class="col-md-12 text-center">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('projects') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5"><?php echo trans('our-latest-portfolios') ?></h1>
            </div>
        </div>

        <div class="project-carousel-3 owl-carousel owl-theme">
            <?php foreach ($portfolios as $portfolio): ?>
                <div class="mb-10 item brd-4">
                    <?php 

                        if(!empty($portfolio->link)){
                            $url = prep_url($portfolio->link);
                        }else{
                            $url = '#';
                        }
                    ?>
                    <a href="<?php echo $url ?>">
                        <div class="portfolios_img card border-0 text-white h-350 h-lg-500 overlay overlay-black overlay-40 border-radius-before" style="background-image: url(<?php echo base_url($portfolio->image) ?>);">
                            <div class="row no-gutters h-100 p-4 p-lg-6">
                                <div class="col-12 align-self-end">
                                    <div class="card-title h5 mb-3 ml-5">
                                        <p class="text-gray fs-16 mb-1"><?php echo html_escape($portfolio->category) ?></p>
                                        <p class="text-white fs-22 font-weight-bold mb-2" href=""><?php echo html_escape($portfolio->title) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
           
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
                <div class="testimonial owl-carousel owl-theme testimonial-carousel">
                    
                    <?php foreach ($testimonials as $testimonial): ?>
                        <div class="card shadow-none border-1 h-100 bg-lights mr-2 brd-10 mb-8">
                            <div class="card-body testimonial-box">
                                <div class="text-center mb-3">
                                    <div class="text-center pt-3">
                                        <img src="<?php echo base_url($testimonial->thumb) ?>" class="rounded-circle md-avatar tes-img m-auto" alt="">
                                        <div class="mt-3">
                                            <h5 class="mb-0 text-dark"><?php echo html_escape($testimonial->name) ?></h5>
                                            <p class="text-muted mb-2"><?php echo html_escape($testimonial->designation) ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="pl-4 pr-4 pt-0">
                                        <h6 class="text-dark font-weight-normal"><?php echo html_escape($testimonial->feedback) ?></h6>
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



<?php if($company->enable_staff == 1 && !empty($staffs)): ?>
<section class="border-top">
    <div class="container">
        
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('teams') ?></p>
                <h1 class="text-dark font-weight-bold w-lg-40 mx-auto mb-5"><?php echo trans('our-team-members') ?></h1>
            </div>
        </div>

        <div class="row">
            <?php foreach ($staffs as $staff): ?>
                <?php $this->load->view('include/staff_items_4',['staff'=>$staff , 'slider'=>FALSE]); ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- <section class="hide">
    <div class="container">
        <div class="text-center mx-auto">
            <div class="text-center mx-md-auto mb-5 mb-md-7 mb-lg-9 w-lg-40 mx-auto">
                <h1 class=""><?php echo trans('latest-from-our-blog') ?></h1>
            </div>
        </div>

        <div class="row">
                
            <div class="col-md-6 mb-3">
                <div class="card border-0 rounded-lg shadow-light h-100 br-10 overhidden lift-sm">
                    <a href="#">
                        <div class="blog-img-lg" style="background-image: url(https://images.unsplash.com/photo-1471107340929-a87cd0f5b5f3?q=80&w=1973&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);">
                        </div>
                    </a>
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <a class="bg-primary-soft badge badge-square" href="#">Data Science</a>
                            <span class="small">10 November 2023</span>
                        </div>

                        <div class="">
                            <a href="#"><h5>Data Science for beginer</h5></a>
                            <p><?= character_limiter('Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                            
                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 220) ?></p>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="col-md-6">
                <?php  for ($b=1; $b<4 ;): ?>
                        <a href="#">
                            <div class="blog-card shadow-light lift-sm mb-3 w-100">
                                <div class="blog_img" style="background-image: url(https://images.unsplash.com/photo-1471107340929-a87cd0f5b5f3?q=80&w=1973&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D);"></div>
                                <div class="blog-card-body text-left flex-grow-1">
                                    <p class="bg-primary-soft badge badge-square">Data Science</p>
                                    <span class="small pull-right text-dark pt-1">10 November, 2023</span>

                                    <h6 class="service-card-title mb-3">Data Science for beginer</h6>
                                </div>
                            </div>
                        </a>
                <?php $b++; endfor; ?>
            </div>
        </div>

        <div class="text-center mx-auto mt-15">
            <a href="#" class="btn btn-light-primary rounded-pill"><?php echo trans('more-blogs') ?></a>
        </div>

    </div>
</section> -->



<section class="bg-light border-top">
    <div class="container px-6">

        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <p class="fs-14 font-weight-bold text-uppercase text-primary mb-1"><?php echo trans('lets-talk') ?></p>
                <h1 class="text-dark font-weight-bold mb-5"><?php echo trans('request-a-free-quote') ?></h1>
            </div>
        </div>


        <div class="row">
            <div class="col-md-7 col-sm-12 pt-8 pb-12 px-8 card">
            
                <div class="cardf">
                    <form action="<?php echo base_url('company/contact_submit') ?>" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="<?php echo trans('name') ?>" required>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="<?php echo trans('e-mail') ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="form-group mb-1">
                                    <textarea rows="6" class="form-control" name="message" placeholder="<?php echo trans('your-message-here') ?>" ></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- csrf token -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="hidden" name="business_id" value="<?php echo html_escape($company->uid) ?>">
                        <input type="hidden" name="user_id" value="<?php echo html_escape(user()->id) ?>">
                        <button type="submit" class="btn btn-primary btn-md"> <?php echo trans('send-message') ?> <i class="bi bi-send ml-2 pt-1"></i></button>
                    </form>
                </div>
            </div>

            <div class="col-md-5 col-sm-12 bg-primary-soft pl-8 pt-8 pb-12 text-dark">

                <?php if(!empty($company->address)): ?>
                    <div class="d-flex justify-content-start mb-5 mt-3 align-items-center">
                        <div class="mr-5 contact-icon bg-primary mt-2">
                            <i class="bi bi-geo-alt fs-20 text-light"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-dark fs-16 font-weight-bold"><?php echo trans('address') ?></p>
                            <p class="text-muted mb-0 fs-13"><?php echo html_escape($company->address) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(!empty($company->phone) || !empty($company->email)): ?>
                    <div class="d-flex justify-content-start align-items-center mb-5">
                        <div class="mr-5 contact-icon bg-primary mt-2">
                           <i class="bi bi-envelope fs-20 text-light"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-dark fs-16 font-weight-bold"><?php echo trans('contact') ?></p>
                            <p class="text-muted mb-0 fs-13"><?php echo trans('phone') ?> <?php echo html_escape($company->phone) ?></p>
                            <p class="text-muted mb-0 fs-13"><?php echo trans('email') ?>: <?php echo html_escape($company->email) ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="d-flex justify-content-start align-items-center">
                    <div class="mr-5 contact-icon bg-primary mt-2">
                        <i class="fbi bi-briefcase fs-20 text-light"></i>
                    </div>
                    <div class="contact-service">
                        <p class="mb-0 text-dark fs-16 font-weight-bold"><?php echo trans('services') ?></p>
                        <a class="fs-13 text-hover-dark" href="<?php echo base_url('services/'.$slug) ?>"><?php echo trans('see-here') ?> <i class="bi bi-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="pt-8 jarallax cusbg overlay overlay-black overlay-90 bottom-shape pb-0" style="background-image: url(<?php echo base_url($company->about_image) ?>);">
            <div class="container">

        <div class="w-md-80 w-lg-50 text-center mx-auto mb-6 mb-lg-6">
            <p class="font-weight-bold text-uppercase badge badge-primary mb-3"><?php echo trans('schedule') ?></p>
            <h1 class="text-light font-weight-bold mx-auto mb-5"><?php echo trans('working-hours') ?></h1>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto pb-6">
                <div class="card border-0 rounded-lg shadow quick-contact">
                    <div class="card-body p-0 brd-20">
                        <ul class="list-group p-0">
                            <?php $days = get_days(); ?>
                            <?php if (empty($my_days)): ?>
                                <li class="py-1">
                                    <div class="d-flex">
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

                                    <li class="list-group-item blur d-flex justify-content-between align-items-center">
                                        <span>
                                            <span class="text-dark fs-16"><?php echo trans(strtolower($day)) ?></span>
                                        </span> 

                                        <?php if ($check == 'check'): ?>
                                            <?php if (!empty($my_days[$i-1]['start'])): ?>
                                                <span><i class="far fa-clock"></i> <?= $mstart.'-'.$mend ?></span>
                                            <?php endif ?>
                                        <?php else: ?>
                                            <span class="badge badge-danger-soft badge-smalls"><?php echo trans('close') ?> </span>
                                        <?php endif ?>
                                    </li>

                                    
                                <?php  $i++; endforeach ?>

                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form -->

    </div>

    <!-- Bg shape -->
    <div class="bg-round-shape reverse">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1900 115" preserveAspectRatio="none meet" class="ie-height-115">
            <path class="fill-white" d="M-1,0S447.9,95.6,960,95.6c0,0,432.5,9.8,959-95.6Z" transform="translate(1)"></path>
            <path class="fill-none" d="M-1,130V0S521.4,101.6,960,95.6c0,0,440,5.3,959-95.6V130Z" transform="translate(1)"></path>
        </svg>
    </div>
    <!-- End Bg shape -->

</section>









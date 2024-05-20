
<?php if ($template == 1 || $template == 2): ?>
    <footer class="bg-gray border-top border-light <?php if(isset($is_embed)){echo 'd-hide';} ?>">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-12 text-center">
                    <?php if (!empty($company->logo)): ?>
                        <img src="<?php echo base_url($company->logo) ?>" width="<?php echo html_escape($company->size) ?>" class="mb-2" alt="logo">
                    <?php endif ?>
                    <p class="mb-2 mt-2 w-40 m-auto"><?php echo html_escape($company->about_details) ?></p>
                </div>

                <div class="col-md-12 text-center">
                    <ul class="nav justify-content-center pb-3 pt-5 mb-3 m-auto">
                        <?php foreach (get_pages($company->uid) as $page): ?>
                            <li class="nav-items"><a href="<?php echo base_url('company/page/'.$slug.'/'.$page->slug) ?>" class="hover-text-primary text-dark px-2"><?php echo html_escape($page->title) ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="col-md-12 text-center">
                    <ul class="list-unstyled social-icon3 mt-3">
                        <?php if (!empty($company->facebook)) : ?>
                            <li><a href="<?= prep_url($company->facebook) ?>"><i class="lni lni-facebook-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->twitter)) : ?>
                            <li><a href="<?= prep_url($company->twitter) ?>"><i class="lni lni-twitter"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->instagram)) : ?>
                            <li><a href="<?= prep_url($company->instagram) ?>"><i class="lni lni-instagram-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->whatsapp)) : ?>
                            <li><a href="https://wa.me/<?= prep_url($company->whatsapp) ?>"><i class="lni lni-whatsapp"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>


            </div>
        </div>


        <div class="bg-white text-center border-top">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-12">
                        <p class="mb-0 fs-12"><?php echo trans('powered-by') ?> - <a target="_blank" href="<?php echo base_url() ?>"><?php echo html_escape(settings()->site_name) ?></a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?php elseif ($template == 3): ?>
    <footer class="border-top border-light <?php if(isset($is_embed)){echo 'd-hide';} ?>">
        <div class="container py-4">
            <div class="row pb-2">
                <div class="col-sm-5 col-md-4 mb-5 mb-lg-0">
                    <?php if (!empty($company->logo)): ?>
                        <img width="<?php echo html_escape($company->size) ?>" src="<?php echo base_url($company->logo) ?>" class="mb-2" alt="logo">
                    <?php endif; ?>
                    <p class=""><?php echo html_escape($company->about_details) ?></p>
                    <ul class="list-unstyled social-icon mb-0">
                        <?php if (!empty($company->facebook)) : ?>
                            <li class="hover-primary"><a target="_blank" href="<?= prep_url($company->facebook) ?>"><i class="text-muted lni lni-facebook-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->twitter)) : ?>
                            <li class="hover-primary"><a target="_blank" href="<?= prep_url($company->twitter) ?>"><i class="text-muted lni lni-twitter"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->linkedin)) : ?>
                            <li class="hover-primary"><a target="_blank" href="<?= prep_url($company->linkedin) ?>"><i class="text-muted lni lni-linkedin-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->whatsapp)) : ?>
                            <li class="hover-primary"><a target="_blank" href="<?= prep_url($company->whatsapp) ?>"><i class="text-muted lni lni-whatsapp"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>

                <?php if(!empty(get_footer_services($company->uid))): ?>
                    <div class="col-sm-3 col-md-3 mb-5 mb-lg-0 pt-3 pl-4">
                        <h3 class="h6 text-muted"><?php echo trans('services') ?></h3>
                        <ul class="list-unstyled p-0 m-0">
                            <?php foreach (get_footer_services($company->uid) as $service): ?>
                                <li class="pb-1"><a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>" class="text-dark hover-text-primary"><?php echo html_escape($service->name) ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="col-sm-3 col-md-2 mb-5 mb-sm-0 pt-3">
                    <?php if (!empty(get_pages($company->uid))): ?>
                    <h3 class="h6 text-muted"><?php echo trans('pages') ?></h3>
                    <ul class="list-unstyled p-0 m-0">
                        <?php foreach (get_pages($company->uid) as $page): ?>
                            <li><a class="text-dark hover-text-primary" href="<?php echo base_url('company/page/'.$slug.'/'.$page->slug) ?>"><?php echo html_escape($page->title) ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </div>

                <div class="col-sm-6 col-md-3 mb-5 mb-sm-0 pt-3">
                    <div class="pl-0 pl-lg-5 pl-xl-8">
                        <h6 class="font-weight-normals mb-3 text-muted"><?php echo trans('useful-links') ?></h6>
                        <ul class="list-unstyled p-0 m-0">
                            <li class="pb-1"><a href="<?php echo base_url('services'.$slug) ?>" class="text-dark hover-text-primary"><?php echo trans('services') ?></a></li>
                            <li class="py-1"><a href="<?php echo base_url('staffs'.$slug) ?>" class="text-dark hover-text-primary"><?php echo trans('experts') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('gallery'.$slug) ?>" class="text-dark hover-text-primary"><?php echo trans('gallery') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('login') ?>" class="text-dark hover-text-primary"><?php echo trans('login') ?></a></li>
                        </ul>
                    </div>
                </div>

                

                <div class="col-sm-3 col-md-3 mb-5 mb-lg-0 d-none">
                    <h3 class="h6"><?php echo trans('contact-info') ?></h3>
                    <ul class="list-unstyled p-0 m-0">
                        <?php if(!empty($company->phone)): ?>
                            <li class="pb-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-telephone text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->phone) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty($company->email)): ?>
                            <li class="py-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->email) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty($company->address)): ?>
                            <li class="pt-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->address) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>   
                        </ul>
                </div>

            </div>
        </div>

        <div class="text-center border-top">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-12 powered-by">
                        <p class="mb-0 fs-12"><?php echo trans('powered-by') ?> <a target="_blank" href="<?php echo base_url() ?>"><?php echo html_escape(settings()->site_name) ?></a> </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
<?php elseif ($template == 4): ?>
    <footer class="pt-8 border-top border-light <?php if(isset($is_embed)){echo 'd-hide';} ?>">
        <div class="container">
            <div class="row pb-6">
                <div class="col-sm-5 col-lg-4 mb-5 mb-lg-0">
                    <?php if (!empty($company->logo)): ?>
                        <img width="<?php echo html_escape($company->size) ?>" src="<?php echo base_url($company->logo) ?>" class="mb-2" alt="logo">
                    <?php endif; ?>

                    <p class=""><?php echo html_escape($company->about_details) ?></p>
                    <ul class="list-unstyled social-icon mb-0">
                        <?php if (!empty($company->facebook)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->facebook) ?>"><i class="lni lni-facebook-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->twitter)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->twitter) ?>"><i class="lni lni-twitter"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->linkedin)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->linkedin) ?>"><i class="lni lni-linkedin-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->whatsapp)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->whatsapp) ?>"><i class="lni lni-whatsapp"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>

                
                <div class="col-sm-6 col-lg-3 mb-5 mb-sm-0">
                    <div class="pl-0 pl-lg-5 pl-xl-8">
                        <h6 class="font-weight-normals mb-3 text-lightj"><?php echo trans('useful-links') ?></h6>
                        <ul class="list-unstyled p-0 m-0">
                            <li class="pb-1"><a href="<?php echo base_url('services'.$slug) ?>" class="text-muted hover-text-primary"><?php echo trans('services') ?></a></li>
                            <li class="py-1"><a href="<?php echo base_url('staffs'.$slug) ?>" class="text-muted hover-text-primary"><?php echo trans('experts') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('gallery'.$slug) ?>" class="text-muted hover-text-primary"><?php echo trans('gallery') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('login') ?>" class="text-muted hover-text-primary"><?php echo trans('login') ?></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-sm-3 col-lg-3 mb-5 mb-lg-0">
                    <h3 class="h6"><?php echo trans('contact-info') ?></h3>
                    <ul class="list-unstyled p-0 m-0">
                        <?php if (!empty($company->phone)) : ?>
                            <li class="pb-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-telephone text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->phone) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if (!empty($company->email)) : ?>
                            <li class="py-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->email) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>

                        <?php if (!empty($company->address)) : ?>
                            <li class="pt-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <span><?php echo html_escape($company->address) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif ?>
                        </ul>
                </div>

                <div class="col-sm-3 col-lg-2 mb-5 mb-sm-0">
                    <?php if (!empty(get_pages($company->uid))): ?>
                    <h3 class="h6"><?php echo trans('pages') ?></h3>
                    <ul class="footer-list-style-two">
                        <?php foreach (get_pages($company->uid) as $page): ?>
                            <li><a href="<?php echo base_url('company/page/'.$slug.'/'.$page->slug) ?>"><?php echo html_escape($page->title) ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </div>

            </div>
        </div>

        <div class="text-center border-top">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-12 powered-by">
                        <p class="mb-0 fs-12"><?php echo trans('powered-by') ?> <a target="_blank" href="<?php echo base_url() ?>"><?php echo html_escape(settings()->site_name) ?></a> </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
<?php elseif ($template == 5): ?>
    <footer class="bg-dark position-relative mt-0 <?php if(isset($is_embed)){echo 'd-hide';} ?>">
        <?php if (isset($page_title) && $page_title == 'Company Home'): ?>
            <div class="footer-about-5 position-absulate container mt-10 py-9 overlay overlay-primary overlay-100" data-jarallax="" data-speed="0.8" style="background-image: url(<?php echo base_url($company->about_image) ?>);">

                <div class="row d-flex align-items-center">
                    <div class="col-sm-12 col-md-5">
                        <h3 class="text-light font-weight-bold mb-3 w-70 pl-lg-10 mb-md-0"><?php echo trans('want-to-get-a-online-consultation') ?></h3>
                    </div>
                    <?php if(!empty($company->phone) || !empty($company->email)): ?>
                        <div class="col-sm-12 col-md-3">

                            <?php if (!empty($company->address)): ?>
                                <p class="mb-2 fs-13 font-weight-normal text-light"><i class="bi bi-geo text-white mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->address) ?></p>
                            <?php endif; ?>

                            <?php if (!empty($company->phone)): ?>
                                <p class="mb-2 fs-13 font-weight-normal text-light"><i class="bi bi-phone text-white mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->phone) ?></p>
                            <?php endif; ?>
                            
                            <p class="mb-0 fs-13 font-weight-normal text-light"><i class="bi bi-envelope text-white mr-2 my-1 my-sm-0"></i><?php echo html_escape($company->email) ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12 col-md-4 text-md-center">
                        <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="btn btn-light btn-lg lift-sm fs-14"> <?php echo trans('book-appointment') ?> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="container mt--50">
            <div class="row pb-6">

                <div class="col-sm-6 col-md-4 mb-3 mb-lg-0 pr-5">
                    <?php if(!empty($company->logo)): ?>
                        <img width="<?php echo html_escape($company->size) ?>" src="<?php echo base_url($company->logo) ?>" class="mb-2" alt="Logo">
                    <?php endif ; ?>

                    <p class="text-gray"><?php echo html_escape($company->about_details) ?></p>
                    

                    <div class="mt-3">
                        <ul class="list-unstyled medi_footer_icon3 p-0 m-0">
                            <?php if(!empty($company->facebook)): ?>
                                <li>
                                    <a href="<?php echo prep_url($company->facebook) ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                </li>
                            <?php endif ; ?>

                            <?php if(!empty($company->twitter)): ?>
                                <li>
                                    <a href="<?php echo prep_url($company->twitter) ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                            <?php endif ; ?>

                            <?php if(!empty($company->whatsapp)): ?>
                                <li>
                                    <a href="<?php echo prep_url($company->whatsapp) ?>" target="_blank"><i class="lni lni-whatsapp"></i></a>
                                </li>
                            <?php endif ; ?>

                            <?php if(!empty($company->instagram)): ?>
                                <li>
                                    <a href="<?php echo prep_url($company->instagram) ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                </li>
                            <?php endif ; ?>
                        </ul>
                    </div>
                </div>

                <?php if(!empty(get_footer_services($company->uid))): ?>
                    <div class="col-sm-6 col-md-4 mb-5 mb-lg-0 pt-2">
                        <h6 class="font-weight-normals mb-3 text-light"><?php echo trans('services') ?></h6>
                        <ul class="list-unstyled p-0 m-0">
                            <?php foreach (get_footer_services($company->uid) as $service): ?>
                                <li class="pb-1"><a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>" class="text-gray hover-white"><?php echo html_escape($service->name) ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>


                <div class="col-sm-3 col-md-2 mb-5 mb-sm-0 pt-2">
                    <?php if (!empty(get_pages($company->uid))): ?>
                    <h3 class="h6 text-light"><?php echo trans('pages') ?></h3>
                    <ul class="list-unstyled">
                        <?php foreach (get_pages($company->uid) as $page): ?>
                            <li><a class="text-gray hover-white" href="<?php echo base_url('company/page/'.$slug.'/'.$page->slug) ?>"><?php echo html_escape($page->title) ?></a></li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif ?>
                </div>

                <div class="col-sm-6 col-md-2 mb-5 mb-sm-0 pt-2">
                    <div class="pl-0 pl-lg-5 pl-xl-8">
                        <h6 class="font-weight-normals mb-3 text-light"><?php echo trans('useful-links') ?></h6>
                        <ul class="list-unstyled p-0 m-0">
                            <li class="pb-1"><a href="<?php echo base_url('services'.$slug) ?>" class="text-gray hover-white"><?php echo trans('services') ?></a></li>
                            <li class="py-1"><a href="<?php echo base_url('staffs'.$slug) ?>" class="text-gray hover-white"><?php echo trans('experts') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('gallery'.$slug) ?>" class="text-gray hover-white"><?php echo trans('gallery') ?></a></li>
                            <li class="pt-1"><a href="<?php echo base_url('login') ?>" class="text-gray hover-white"><?php echo trans('login') ?></a></li>
                        </ul>
                    </div>
                </div>

               
            </div>

        </div>

        <div class="text-center xs-font-size13 border-top py-2 border-light-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-0 fs-12"><?php echo trans('powered-by') ?> <a target="_blank" href="<?php echo base_url() ?>"><?php echo html_escape(settings()->site_name) ?></a> </p>
                    </div>
                </div>
            </div>
        </div>
    </footer> 

<?php elseif ($template == 6): ?>
    <footer class="bg-dark position-relative pt-8 <?php if(isset($is_embed)){echo 'd-hide';} ?>">

        <div class="container">
            <div class="row pb-4">
                <div class="col-sm-5 col-lg-5 mb-5 mb-lg-0 text-light">
                    <?php if(!empty($company->logo)): ?>
                        <img width="<?php echo html_escape($company->size) ?>" src="<?php echo base_url($company->logo) ?>" class="mb-2" alt="Logo">
                    <?php endif; ?>
                    
                    <p class=""><?php echo html_escape($company->about_details) ?></p>
                    <ul class="list-unstyled social-icon4 mb-0">
                        <?php if (!empty($company->facebook)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->facebook) ?>"><i class="lni lni-facebook-original"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->twitter)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->twitter) ?>"><i class="lni lni-twitter"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->whatsapp)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->whatsapp) ?>"><i class="lni lni-whatsapp"></i></a></li>
                        <?php endif ?>

                        <?php if (!empty($company->instagram)) : ?>
                            <li><a target="_blank" href="<?= prep_url($company->instagram) ?>"><i class="lni lni-instagram-original"></i></a></li>
                        <?php endif ?>
                    </ul>
                </div>

                <div class="col-sm-1 col-lg-1 mb-5 mb-sm-0"></div>

                <div class="col-sm-3 col-lg-3 mb-5 mb-lg-0 text-light">
                    <h3 class="h6 text-light pt-3"><?php echo trans('contact-info') ?></h3>
                    <ul class="list-unstyled p-0 m-0">
                        <?php if(!empty($company->address)): ?>
                            <li class="py-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-geo-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fs-13"><?php echo html_escape($company->address) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty($company->phone)): ?>
                            <li class="py-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-telephone text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fs-13"><?php echo html_escape($company->phone) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if(!empty($company->email)): ?>
                            <li class="py-2">
                                <div class="d-flex">
                                    <div class="mr-2">
                                        <i class="bi bi-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fs-13"><?php echo html_escape($company->email) ?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="col-sm-3 col-lg-3 mb-5 mb-sm-0 text-light">
                    <?php if (!empty(get_pages($company->uid))): ?>
                        <h3 class="h6 text-light pt-3"><?php echo trans('pages') ?></h3>
                        <ul class="footer-list-style-two">
                            <?php foreach (get_pages($company->uid) as $page): ?>
                                <li><a class="text-light" href="<?php echo base_url('company/page/'.$slug.'/'.$page->slug) ?>"><?php echo html_escape($page->title) ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </div>

            </div>
        </div>

        <div class="text-center border-top text-light">
            <div class="container">
                <div class="row py-2">
                    <div class="col-md-12 powered-by">
                        <p class="mb-0 fs-12"><?php echo trans('powered-by') ?> <a target="_blank" href="<?php echo base_url() ?>"><?php echo html_escape(settings()->site_name) ?></a> </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
<?php endif ?>
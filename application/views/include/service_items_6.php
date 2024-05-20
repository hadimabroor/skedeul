<div class="<?php if($slider != TRUE ){echo 'col-md-4';}else{echo "pt-5";} ?> mb-5" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">

    <div class="card overflow-hidden brd-20 shadow-light shadow-hover border-0 transition-hover h-100">
        <a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>">
            <div class="cop-bg-img h-300 position-relative" style="background-image: url(<?php echo base_url($service->image) ?>)">
                
                <?php $rating = get_ratings_info($service->id);?>

                <?php if (!empty($rating->total_point)): ?>
                    <div class="item_rating <?php if($company->enable_rating == 1){echo "d-show";}else{echo"d-hide";} ?>">
                        <?php $rating = get_ratings_info($service->id);?>
                        <?php if (empty($ratings)): ?>
                          <?php $average = 0 ?>
                        <?php else: ?>
                          <?php $average = number_format($rating->total_point/$rating->total_user, 1) ?>
                        <?php endif ?>

                            <?php if (isset($rating->total_point) && $rating->total_point != 0): ?>
                                <?php $average = number_format($rating->total_point/$rating->total_user, 1) ?>
                            <?php endif ?>

                            <?php if (!empty($rating->total_point)): ?>
                              <?php for($u = 1; $u <= 5; $u++):?>
                                <?php 
                                  if ( round($average - .25) >= $u) {
                                        $star = "fas fa-star";
                                    } elseif (round($average + .25) >= $u) {
                                        $star = "fas fa-star-half-alt";
                                    } else {
                                        $star = "far fa-star";
                                    }
                                ?>
                                <i class="<?php echo $star;?> text-warning fs-14"></i> 
                            <?php endfor;?>
                        <?php endif ?>
                    </div>
                <?php endif ?>
                
            </div>
        </a>

        <div class="card-body bg-none">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge badge-primary py-2 px-3 rounded-pill">
                        <?php if ($service->price == 0): ?>
                            <?php echo trans('free') ?>
                        <?php else: ?>
                            <?php if($company->curr_locate == 0){echo get_currency_by_country($company->country)->currency_symbol;} ?>
                            <?php echo number_format($service->price, $company->num_format) ?>
                            <?php if($company->curr_locate == 1){echo get_currency_by_country($company->country)->currency_symbol;} ?>
                        <?php endif ?>
                    </span>

                    <span class="ml-1 badge badge-primary py-2 px-2 rounded-pill">
                       <i class="far fa-clock"></i>  <?php echo html_escape($service->duration).' '.trans($service->duration_type); ?>
                    </span>
                </div>

                <div class="d-flex align-items-center">
                    <?php $staffs = json_decode($service->staffs);?>
                    <?php if (!empty($staffs)): ?>
                    <div class="staffs-list align-items-left pl-3">
                        <?php foreach ($staffs as $staff): ?>
                        <img class="staff-avatar <?php if(count($staffs) < 2){echo "ml-0";} ?>"
                            src="<?php echo base_url(get_by_id($staff, 'staffs')->thumb) ?>"
                            data-toggle="tooltip" data-placement="top"
                            title="<?php echo get_by_id($staff, 'staffs')->name; ?>">
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>
                </div>

            </div>


            <div class="mt-3">
                <h5 class=""><?php echo html_escape($service->name) ?></h5>
            </div>
            
            <a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>" class="btn btn-sm brd-10 px-3 mt-5 btn-light-secondary"><?php echo trans('read-more') ?> <i class="bi bi-arrow-right ml-1"></i></a>
        </div>

    </div>

</div>
<div class="<?php if($slider != TRUE ){echo 'col-sm-2 col-md-6 col-lg-4';} ?> mb-4 mb-md-5 lift-sm p-md-0">
    <div class="px-0 px-md-3">
        <a class="text-white" href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>">
        <div class="card docitem_bg border-0 text-white h-350 h-lg-400 jarallax overlay overlay-gradient border-radius-before" style="background-image: url(<?php echo base_url($service->image) ?>);">

            <div class="row no-gutters h-100 p-4 p-lg-6">
                
                <div class="col-12 align-self-end">
                    
                    <p class="mb-1">
                        <span class="mr-2 text-light">
                            <?php if($this->business->curr_locate == 0){echo $this->business->currency_symbol;} ?>
                            <?php echo number_format($service->price, $this->business->num_format) ?>
                            <?php if($this->business->curr_locate == 1){echo $this->business->currency_symbol;} ?>
                        </span>
                        <span class="text-light"><i class="bi bi-clock"></i>  <?php echo html_escape($service->duration) ?> <?php echo  html_escape($service->duration_type) ?></span>
                    </p>
                    <div class="<?php if($company->enable_rating == 1){echo "d-show";}else{echo"d-hide";} ?>">
                        <?php $rating = get_ratings_info($service->id);?>
                        <?php if (empty($ratings)): ?>
                          <?php $average = 0 ?>
                        <?php else: ?>
                          <?php $average = number_format($rating->total_point/$rating->total_user, 1) ?>
                        <?php endif ?>

                        <?php $rating = get_ratings_info($service->id);?>
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

                    <h3 class="card-title h5 mb-3 text-light">
                        <?php echo $service->name ?>
                    </h3>

                    

                    <div class="media align-items-center">
                        <?php $staffs = json_decode($service->staffs);?>
                        <?php if (!empty($staffs)): ?>
                            <div class="staffs-list align-items-left pl-3">
                                <?php foreach ($staffs as $staff): ?>
                                    <img class="staff-avatar <?php if(count($staffs) < 2){echo "ml-0";} ?>" src="<?php echo base_url(get_by_id($staff, 'staffs')->thumb) ?>" data-toggle="tooltip" data-placement="top" title="<?php echo get_by_id($staff, 'staffs')->name; ?>" data-original-title="Staff 2">
                                <?php endforeach ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </a>
    </div>
</div>
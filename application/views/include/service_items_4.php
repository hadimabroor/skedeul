<div class="<?php if($slider != TRUE ){echo 'col-md-4';}else{echo "pt-3";} ?> mb-5 lift-sm">
    <div class="card border-0 rounded-lg h-100 br-10 overhidden border-hover-primary">
        <a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>">
            <div class="service_img_4" style="background-image: url(<?php echo base_url($service->image) ?>);">
            </div>
        </a>

        <div class="card-body pl-4 pr-4 bbm-1">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="fs-14 mb-1 text-muted">
                    <span class="mr-2 badge border-1 badge-pill">
                        <?php if($this->business->curr_locate == 0){echo $this->business->currency_symbol;} ?>
                        <?php echo number_format($service->price, $this->business->num_format) ?>
                        <?php if($this->business->curr_locate == 1){echo $this->business->currency_symbol;} ?>
                    </span>
                    <span class="badge border-1 badge-pill"><i class="far fa-clock text-muted"></i>  <?php echo html_escape($service->duration) ?> <?php echo  html_escape($service->duration_type) ?> </span>
                </p>
            </div>

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

            <div>
                <a href="<?php echo base_url('service/'.$service->id.'/'.$slug) ?>"><p class="mb-0 fs-18 text-dark font-weight-bold"><?php echo html_escape($service->name) ?></p></a>
            </div>
        </div>

        <div class="shadow-none px-4 py-3">
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
    </div>
</div>
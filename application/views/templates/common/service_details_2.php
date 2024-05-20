<div class="cards px-0">
  <div class="card-bodys">
    <div class="row">
      
      <div class="col-md-5 text-center pt-2">
          <div class="service-banner-img border-1" style="background-image:url('<?php echo base_url($service->image) ?>')">
          </div>

          <a href="<?php echo base_url('booking/'.$company->slug) ?>" class="xs-mb-5 btn mt-4 btn-outline-primary btn-block position-absulate bottom-0 mb-sm-5"><?php echo trans('book-now') ?> <i class="bi bi-arrow-right ml-1"></i></a>
      </div>

      <div class="col-md-7 pl-5">

        <nav>
          <div class="service-tab nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><?php echo trans('overview') ?></a>

            <a class="nav-item nav-link" id="nav-rating-tab" data-toggle="tab" href="#nav-rating" role="tab" aria-controls="nav-rating" aria-selected="false"><?php echo trans('rating-review') ?></a>
          </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active mt-0 pt-0" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="mb-3 mt-5">
                <span class="pr-0">
                    <?php if ($company->enable_rating == 1 && get_total_rating_user($service->id) > 2): ?>
                        <?php $rating = get_ratings_info($service->id);?>
                        <?php $average = number_format($rating->total_point/$rating->total_user, 1) ?>

                        <?php if (get_total_rating_user($service->id) > 0): ?>
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
                            <i class="<?php echo $star;?> text-warning"></i> 
                          <?php endfor;?>
                          <span class="">(<?php echo get_total_rating_user($service->id) ?> <?php echo trans('ratings') ?>)</span>
                        <?php endif ?>
                    <?php endif ?>
                </span>
              </div>

              <div class="mb-2">
                <span class="pr-3 badge badge-secondary-soft">
                  <?php if ($service->price == 0): ?>
                      <?php echo trans('free') ?>
                  <?php else: ?>
                      <?php if($company->curr_locate == 0){echo get_currency_by_country($company->country)->currency_symbol;} ?> <?php echo number_format($service->price, $company->num_format) ?> <?php if($company->curr_locate == 1){echo get_currency_by_country($company->country)->currency_symbol;} ?>
                  <?php endif ?>
                  </span>
                  <span class="pr-3 badge badge-secondary-soft"><i class="bi bi-clock mr-2"></i><?php echo html_escape($service->duration).' '.trans($service->duration_type); ?></span>
              </div>

              <div class="pr-3 mb-5">
                <h2 class="h2 font-weight-bold mb-1"><?php echo html_escape($service->name) ?></h2>
                <p> <?php echo strip_tags($service->details) ?></p>
              </div>

              <div class="row">
                <div class="col-12 mt-3">
                  <h5 class="font-weight-bold mb-2"><?php echo trans('staff') ?></h5>
                </div>

                <?php $staffs = json_decode($service->staffs);?>
                <?php if (!empty($staffs)): ?>

                  <?php foreach ($staffs as $staff): ?>
                    <div class="col-lg-4 col-sm-6 mb-3 sd-staff">
                      <div class="staff-border-1">
                        <div class="staff_img mt-3 mb-0" style="background-image: url(<?php echo base_url(get_by_id($staff, 'staffs')->thumb) ?>);">
                        </div>
                        <div class="text-center py-2">
                          <p class="mt-1 mb-0 text-dark"><?php echo get_by_id($staff, 'staffs')->name; ?></p>
                          <p class="mt-0 mb-0 fs-12 <?php if(empty(get_by_id($staff, 'staffs')->designation)){echo "py-2 mb-1";} ?>"><?php echo get_by_id($staff, 'staffs')->designation; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                <?php endif; ?>
              </div>
          </div>

          <div class="tab-pane fade" id="nav-rating" role="tabpanel" aria-labelledby="nav-rating-tab">
            <?php if ($company->enable_rating == 1 && get_total_rating_user($service->id) > 2): ?>
              <h2 class="h4 font-weight-normal mt-5"></h2>
              
              <?php  
                $ratings = get_all_ratings($service->id);
                $rating = get_ratings_info($service->id);
                $report = get_single_ratings($service->id);
              ?>

              <?php $average = number_format($rating->total_point/$rating->total_user, 1) ?>
              <?php if ($average != 0): ?>
              <div class="row">
                  
                  <div class="col-sm-4">
                    <div class="rating-block">
                      <h6><?php echo trans('average-rating') ?></h6>
                       <?php for($i = 1; $i <= 5; $i++):?>
                        <?php 
                          if ( round($average - .25) >= $i) {
                                $star = "fas fa-star";
                            } elseif (round($average + .25) >= $i) {
                                $star = "fas fa-star-half-alt";
                            } else {
                                $star = "far fa-star";
                            }
                        ?>
                        <i class="<?php echo $star;?> text-warning"></i> 
                      <?php endfor;?>
                      <h5 class="bold"><?php echo $average; ?> <small>(<?php echo get_total_rating_user($service->id) ?> <?php echo trans('ratings') ?>)</small></h5>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <h6><?php echo trans('ratings-summary') ?></h6>
                    
                    <div class="d-flex justify-content-between">
                      <div class="pull-lefts" style="width:10%; line-height:1;">
                        <div style="height:9px; margin:5px 0;"> <span class="fa fa-star text-warning"> </span> 5</div>
                      </div>
                      <div class="pull-lefts" style="width:65%;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $report->five/$report->total_user*100; ?>%">
                          <span class="sr-only"></span>
                          </div>
                        </div>
                      </div>
                      <div class="pull-rights" style="width:15%;"><?php echo $report->five ?></div>
                    </div>

                    <div class="d-flex justify-content-between">
                      <div class="pull-lefts" style="width:10%; line-height:1;">
                        <div style="height:9px; margin:5px 0;"> <span class="fa fa-star text-warning"></span> 4</div>
                      </div>
                      <div class="pull-lefts" style="width:65%;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $report->four/$report->total_user*100; ?>%">
                          <span class="sr-only"></span>
                          </div>
                        </div>
                      </div>
                      <div class="pull-rights" style="width:15%"><?php echo $report->four ?></div>
                    </div>

                    <div class="d-flex justify-content-between">
                      <div class="pull-lefts" style="width:10%; line-height:1;">
                        <div style="height:9px; margin:5px 0;"> <span class="fa fa-star text-warning"></span> 3</div>
                      </div>
                      <div class="pull-lefts" style="width:65%;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $report->three/$report->total_user*100; ?>%">
                          <span class="sr-only"></span>
                          </div>
                        </div>
                      </div>
                      <div class="pull-rights" style="width: 15%"><?php echo $report->three ?></div>
                    </div>

                    <div class="d-flex justify-content-between">
                      <div class="pull-lefts" style="width:10%; line-height:1;">
                        <div style="height:9px; margin:5px 0;"> <span class="fa fa-star text-warning"></span> 2</div>
                      </div>
                      <div class="pull-lefts" style="width:65%;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $report->two/$report->total_user*100; ?>%">
                          <span class="sr-only"></span>
                          </div>
                        </div>
                      </div>
                      <div class="pull-rights" style="width: 15%"><?php echo $report->two ?></div>
                    </div>

                    <div class="d-flex justify-content-between">
                      <div class="pull-lefts" style="width:10%; line-height:1;">
                        <div style="height:9px; margin:5px 0;"> <span class="fa fa-star text-warning"></span> 1</div>
                      </div>
                      <div class="pull-lefts" style="width:65%;">
                        <div class="progress" style="height:9px; margin:8px 0;">
                          <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $report->one/$report->total_user*100; ?>%">
                          <span class="sr-only"></span>
                          </div>
                        </div>
                      </div>
                      <div class="pull-rights" style="width: 15%"><?php echo $report->one ?></div>
                    </div>
                  </div>  

              </div>      
        
              <div class="row mt-5">
                  <div class="col-sm-12">
             
                    <div class="review-block">
                      <?php foreach ($ratings as $rating): ?>
                        <div class="row bg-gray py-3 mb-2 brd-10">
                          <div class="col-sm-2 text-center">
                            <?php if (empty($rating->patient_thumb)): ?>
                              <?php $avatar = 'assets/front/img/avatar.png'; ?>
                            <?php else: ?>
                              <?php $avatar = $rating->customer_thumb; ?>
                            <?php endif ?>
                            <img width="80px" src="<?php echo base_url($avatar) ?>" class="img-thumbnail">
                            <div class="review-block-name mt-1 fs-14 font-weight-bold text-dark"><?php echo $rating->customer_name ?></div>
                          </div>
                          <div class="col-sm-10 pl-0">
                            <?php for($i = 1; $i <= 5; $i++):?>
                              <?php 
                              if($i > $rating->rating){
                                $star = 'far fa-star';
                              }else{
                                $star = 'fas fa-star';
                              }
                              ?>
                              <i class="<?php echo $star;?> text-warning"></i> 
                            <?php endfor;?>
                            <div class="review-block-description mt-2"><?php echo $rating->feedback ?></div>
                            <div class="review-block-date small mt-1"><i class="bi bi-calendar2"></i>  <?php echo my_date_show($rating->created_at) ?></div>
                          </div>
                        </div>
                      <?php endforeach ?>
                    </div>
                  </div>
              </div>
              <?php endif ?>
            <?php else: ?>
                <div class="col-md-12 text-left">
                  <p class="py-5"><?php echo trans('no-data-found') ?></p>
                </div>  
            <?php endif ?>

          </div>
        </div>

      </div>
    </div>

  </div>
</div>
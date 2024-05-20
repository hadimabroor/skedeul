<div class="<?php if($slider != TRUE ){echo 'col-md-3';}else{echo 'item';} ?> pt-5">
    <div class="team-card border-1 lift-sm brd-20">
        <div class="overlay">
            <div class="overlay-wrapper">
                <div class="team_img" style="background-image: url(<?php echo base_url($staff->image) ?>);"></div>
            </div>

            <div class="overlay-layer">
                <?php if(!empty($staff->facebook)): ?>
                    <a target="_blank" href="<?php echo prep_url($staff->facebook) ?>" class="btn fw-bolder btn-sm btn-outline-light mr-2"><i class="fab fa-facebook"></i></a>
                <?php endif; ?>

                <?php if(!empty($staff->twitter)): ?>
                    <a target="_blank" href="<?php echo prep_url($staff->twitter) ?>" class="btn fw-bolder btn-sm btn-outline-light mr-2"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>

                <?php if(!empty($staff->linkedin)): ?>
                    <a target="_blank" href="<?php echo prep_url($staff->linkedin) ?>" class="btn fw-bolder btn-sm btn-outline-light mr-2"><i class="fab fa-linkedin"></i></a>
                <?php endif; ?>

                <?php if(!empty($staff->whatsapp)): ?>
                    <a target="_blank" href="<?php echo prep_url($staff->whatsapp) ?>" class="btn fw-bolder btn-sm btn-outline-light mr-2"><i class="fab fa-whatsapp"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="text-center shadow-light py-4 px-4">
            <h5 class="mb-0 font-weight-normal font-weight-bold"><?php echo html_escape($staff->name) ?></h5>
            <p class="font-weight-normal text-muted mb-0 <?php if(empty($staff->designation)){echo "pb-4";} ?>"><?php echo html_escape($staff->designation) ?></p>
        </div>
    </div>
</div>
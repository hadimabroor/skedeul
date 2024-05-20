<div class="<?php if($slider != TRUE ){echo 'col-md-3';} ?> pb-5">
    <div class="team-card border-1 lift-sm my-12">
        <div class="doctor_img" style="background-image: url(<?php echo base_url($staff->image) ?>);"></div>

        <div class="docitem-footer py-4 text-center shadow-light">
            <h6 class="mb-1 font-weight-bold"><?php echo html_escape($staff->name) ?></h6>
            <p class="font-weight-normal text-primary mb-0 fs-14"><?php echo html_escape($staff->designation) ?></p>
        </div>
    </div>
</div>
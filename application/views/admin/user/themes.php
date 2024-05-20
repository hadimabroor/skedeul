<div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php $this->load->view('admin/include/breadcrumb'); ?>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <?php $this->load->view('admin/user/include/settings_menu.php'); ?>

            <div class="col-lg-9 pl-3">
                <div class="card">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/settings/update_theme') ?>" role="form" class="form-horizontal pl-20">
                        
                        <div class="row">
                            <div class="card-body mb-3">
                                <div class="row">
                                    <div class="col-6">
                                       <div class="form-group mb-4">
                                            <label><?php echo trans('fonts') ?></label>
                                            <select class="cus_lh select2" name="font" style="width: 100%;">
                                                <option value="0"><?php echo trans('default') ?></option>
                                                <?php foreach ($fonts as $font): ?>
                                                    <option value="<?php echo html_escape($font->id); ?>" 
                                                        <?php echo ($this->business->font == $font->id) ? 'selected' : ''; ?>>
                                                        <?php echo html_escape($font->name); ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <p><a class="badge badge-danger-soft mt-2" href="<?php echo base_url('admin/font') ?>"><i class="bi bi-gear"></i> <?php echo trans('create-new').' '.trans('fonts') ?></a></p>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group mb-4">
                                          <label class="ml-5"><?php echo trans('color') ?></label>
                                          <div class="d-flex justify-content-start">
                                            <i class="fas fa-square mr-3" style="color: #<?php echo $this->business->color; ?>; font-size: 40px; margin-top: -1px;"></i>
                                            <input type="text" name="color" value="<?php echo $this->business->color; ?>" class="form-control w-50 colorpicker d-block mb-3" autocomplete="off">
                                            
                                          </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                  <?php for ($i=1; $i < 7; $i++) { ?>
                                    <div class="col-md-3 p-2">
                                        <label class="add-pointer">
                                        <div class="icheck-primary text-left radio mt-2 pb-3">
                                          <input type="radio" id="radioPrimaryl_<?php echo $i ?>" value="<?php echo $i ?>" name="template_style" <?php if($this->business->template_style == $i){echo "checked";} ?>>
                                          <label class="fs-14 text-dark" for="radioPrimaryl_<?php echo $i ?>">
                                            <?php if ($i == 1): ?>
                                                <?php echo trans('multipurpose-one') ?>
                                            <?php elseif ($i == 2): ?>
                                                <?php echo trans('multipurpose-two') ?>
                                            <?php elseif ($i == 3): ?>
                                                <?php echo trans('barbar-stylists') ?> <span class="badge badge-danger-soft text-danger new_badge">New</span>
                                            <?php elseif ($i == 4): ?>
                                                <?php echo trans('law-consultancy') ?> <span class="badge badge-danger-soft text-danger new_badge">New</span>
                                            <?php elseif ($i == 5): ?>
                                                <?php echo trans('medical-health') ?> <span class="badge badge-danger-soft text-danger new_badge">New</span>
                                            <?php elseif ($i == 6): ?>
                                                <?php echo trans('beauty-wellness') ?> <span class="badge badge-danger-soft text-danger new_badge">New</span>
                                            <?php endif ?>
                                          </label>
                                        </div>
                                        <?php if ($i == 1 || $i == 2): ?>
                                            <div class="theme-img img-thumbnail <?php if($this->business->template_style == $i){echo "active";} ?>">
                                                <img width="100%" class="" src="<?php echo base_url('assets/admin/images/home'.$i.'.png') ?>">
                                            </div>
                                        <?php else: ?>
                                            <div class="theme-img img-thumbnail text-center <?php if($this->business->template_style == $i){echo "active";} ?>">
                                                <img width="73%" class="p-5" src="<?php echo base_url('assets/admin/images/home'.$i.'.png') ?>">
                                            </div>

                                        <?php endif ?>
                                        
                                        </label>
                                    </div>
                                  <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer pt-0 mt-0">
                            <input type="hidden" name="id" value="<?php echo html_escape($company->id); ?>">
                            <!-- csrf token -->
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <button type="submit" class="btn btn-primary fs-14 py-2 px-4 mt-3"><?php echo trans('save-changes') ?></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

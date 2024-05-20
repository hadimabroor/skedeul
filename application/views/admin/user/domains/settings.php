<div class="content-wrapper">
  <?php $this->load->view('admin/include/breadcrumb'); ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/domain/update_settings')?>" role="form" novalidate>
          <div class="card ">
            <div class="card-header with-border">
              <h3 class="card-title"><?php echo trans('domain-settings') ?></h3>
            </div>

            <div class="card-body">
              <div class="card">
               
                <div class="form-group">
                  <label><?php echo trans('title') ?></label>
                  <input type="text" class="form-control" name="title" value="<?php if(!empty($settings)){echo $settings->title;} ?>"  required>
                </div>

              
                <div class="form-group hide">
                  <label><?php echo trans('short-details') ?></label>
                  <input type="text" class="form-control" name="short_details" value="<?php   if(!empty($settings)){echo  $settings->short_details;} ?>"  required>
                </div>
              
              
                <div class="form-group">
                  <label><?php echo trans('details') ?></label>
                  <textarea class="form-control" id="summernote"  name="details"  rows="4"
                  ><?php  if(!empty($settings)){echo $settings->details;} ?></textarea>
                </div>

                <div class="form-group w-50">
                  <label class=""><?php echo trans('server-ip-address') ?></label>
                  <input type="text" class="form-control" name="ip" value="<?php   if(!empty($settings)){echo $settings->ip;} ?>" required>
                  <p class="badge badge-secondary-soft mb-1 mt-2 font-weight-normal fs-12"><i class="fas fa-info-circle"></i> <?php echo trans('ip-help-info') ?></p>
                </div>

                <div class="form-group mt-3">
                  <?php if (!empty($settings->thumb)): ?>
                      <a target="_blank" href="<?php echo base_url($settings->image) ?>"><img class="img-thumbnail" width="150px" src="<?php echo base_url($settings->thumb) ?>"></a> <br>
                  <?php endif ?>
                  
                  <label><?php echo trans('upload-an-example-screenshot') ?></label>

                  <div class="col-12 p-0">
                    <div class="custom-file w-50 mt-2">
                      <input type="file" class="custom-file-input" name="photo" id="customFileUp">
                      <label class="custom-file-label" for="customFileUp"><?php echo trans('upload-image') ?></label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="mt-5">
                <p class="badge badge-secondary-soft fs-14"><i class="fas fa-info-circle-fill"></i> <?php echo trans('user-dns-settings-types') ?> </p>
                <h6 class="fs-14"><?php echo trans('dns-settings').' '.ucfirst(trans('one')) ?></h6>
                <div class="card bg-light pt-3 pl-3">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('type') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->type1;} ?></span></p>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('host') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->host1;} ?></span></p>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('value') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php  echo get_current_domain() ?></span></p>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('ttl') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->ttl1;} ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>

                <h6 class="mt-2 fs-14"><?php echo trans('dns-settings').' '.ucfirst(trans('two')) ?></h6>
                <div class="card bg-light pt-3 pl-3">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('type') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->type2;} ?></span></p>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('host') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->host2;} ?></span></p>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('value') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->value2;} ?></span></p>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="form-group">
                        <label><?php echo trans('ttl') ?></label>
                        <p><span class="badge fs-14 font-weight-normal badge-primary-soft badge-pill"><?php if(!empty($settings)){echo $settings->ttl2;} ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="card ">
            <div class="card-footer">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              <input type="hidden" name="user_id" value="<?php  if(!empty($settings)){echo  $settings->id;} ?>" ?>
                <button type="submit" class="btn btn-primary pull-left"> <?php echo trans('save-changes') ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

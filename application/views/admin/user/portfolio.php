<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <?php $this->load->view('admin/include/breadcrumb'); ?>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">

            <div class="card add_area <?php if(!empty($page_title) && $page_title == "Edit"){echo "d-block";}else{echo "hide";} ?>">
              <div class="card-header with-border">
                <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                  <h3 class="card-title"><?php echo trans('edit') ?></h3>
                <?php else: ?>
                  <h3 class="card-title"><?php echo trans('create-new') ?> </h3>
                <?php endif; ?>

                <div class="card-tools pull-right">
                  <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                    <a href="<?php echo base_url('admin/portfolios') ?>" class="pull-right btn btn-secondary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a>
                  <?php else: ?>
                    <a href="#" class="text-right btn btn-secondary cancel_btn btn-sm"><?php echo trans('view') ?></a>
                  <?php endif; ?>
                </div>
              </div>


              <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/portfolios/add')?>" role="form" novalidate>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="card-body">
                      <div class="form-group">
                        <?php if (isset($page_title) && $page_title == "Edit"): ?>
                            <img width="200px" src="<?php echo base_url($portfolio->image) ?>"> <br><br>
                        <?php endif ?>

                        <div class="custom-file w-50 mt-2">
                          <input type="file" class="custom-file-input" name="photo" id="customFileUp">
                          <label class="custom-file-label" for="customFileUp"><?php echo trans('upload-image') ?></label>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label><?php echo trans('title') ?><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" value="<?php if(!empty($portfolio)){echo html_escape($portfolio->title);} ?>" required>
                      </div>

                      <div class="form-group">
                        <label><?php echo trans('portfolio-category') ?><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="category" value="<?php if(!empty($portfolio)){echo html_escape($portfolio->category);} ?>" required>
                      </div>

                      <div class="form-group">
                        <label><?php echo trans('link') ?></label>
                        <input type="text" class="form-control" name="link" value="<?php if(!empty($portfolio)){echo html_escape($portfolio->link);} ?>">
                      </div>
                
                      <div class="form-group">
                        <label><?php echo trans('details') ?></label>
                        <textarea class="form-control summernote"  name="details" rows="6"><?php  if(!empty($portfolio)){echo html_escape($portfolio->details);} ?></textarea>
                      </div>
                  
                      
                    </div>

                    <div class="card-body mt-3">
                      <div class="form-group mb-0">
                        <div class="icheck-primary radio radio-inline d-inline mr-4 mt-2">
                          <input type="radio" id="radioPrimary1" value="1" name="status" <?php if(!empty($portfolio) && $portfolio->status == 1){echo "checked";} ?> <?php if (!empty($page_title) && $page_title == "Edit"){echo "checked";} ?>>
                          <label for="radioPrimary1"> <?php echo trans('show') ?>
                          </label>
                        </div>

                        <div class="icheck-primary radio radio-inline d-inline">
                          <input type="radio" id="radioPrimary2" value="0" name="status" <?php if(!empty($portfolio) && $portfolio->status == 0){echo "checked";} ?>>
                          <label for="radioPrimary2"> <?php echo trans('hide') ?>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <input type="hidden" name="id" value="<?php if(!empty($portfolio)){echo html_escape($portfolio->id);} ?>">
                      <!-- csrf token -->
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                      <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                        <button type="submit" class="btn btn-primary btn-block pull-left"><?php echo trans('save-changes') ?></button>
                      <?php else: ?>
                        <button type="submit" class="btn btn-primary btn-block pull-left"> <?php echo trans('save') ?></button>
                      <?php endif; ?>
                    </div>
                  </div>
                </div> 
              </form>
            </div>


            <?php if (!empty($page_title) && $page_title != "Edit"): ?>
              <div class="card list_area">
                <div class="card-header with-border">
                  <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                    <h3 class="card-title pt-2"><?php echo trans('edit') ?> <a href="<?php echo base_url('admin/portfolios') ?>" class="pull-right btn btn-sm btn-primary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a></h3>
                  <?php else: ?>
                    <h3 class="card-title pt-2"><?php echo trans('portfolio') ?> </h3>
                  <?php endif; ?>

                  <div class="card-tools pull-right">
                   <a href="#" class="pull-right btn btn-sm btn-secondary add_btn"><i class="fa fa-plus"></i> <?php echo trans('create-new') ?></a>
                  </div>
                </div>

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap <?php if(is_countable($portfolios) && count($portfolios)  > 10){echo "datatable";} ?>">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php echo trans('image') ?></th>
                        <th><?php echo trans('title') ?></th>
                        <th><?php echo trans('category') ?></th>
                        <th><?php echo trans('status') ?></th>
                        <th><?php echo trans('action') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($portfolios as $portfolio): ?>
                        <tr id="row_<?php echo html_escape($portfolio->id); ?>">
                          <td><?= $i; ?></td>
                          <td><img width="80px" src="<?php echo base_url($portfolio->thumb) ?>"></td>
                          <td><?php echo html_escape($portfolio->title) ?></td>
                          <td><?php echo html_escape($portfolio->category) ?></td>
                          <td>
                            <?php if ($portfolio->status == 1): ?>
                              <span class="badge badge-success"><i class="fas fa-check-circle"></i> <?php echo trans('active') ?></span>
                            <?php else: ?>
                              <span class="badge badge-secondary"><i class="fas fa-eye-slash"></i> <?php echo trans('hidden') ?></span>
                            <?php endif ?>
                          </td> 
                          <td class="actions">
                            <div class="btn-group">
                              <button type="button" class="btn btn-tool" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu" >
                                <a href="<?php echo base_url('admin/portfolios/edit/'.html_escape($portfolio->id));?>" class="dropdown-item"><?php echo trans('edit') ?></a>

                                <a data-val="Category" data-id="<?php echo html_escape($portfolio->id); ?>" href="<?php echo base_url('admin/portfolios/delete/'.html_escape($portfolio->id));?>" class="dropdown-item delete_item"><?php echo trans('delete') ?></a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <?php endif; ?>
          </div>
      </div>
    </div>
  </div>
</div>

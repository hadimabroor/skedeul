<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <?php $this->load->view('admin/include/breadcrumb'); ?>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card add_area <?php if(!empty($page_title) && $page_title == "Edit"){echo "d-block";}else{echo "hide";} ?>">
              <div class="card-header with-border">
                <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                  <h3 class="card-title"><?php echo trans('edit') ?></h3>
                <?php else: ?>
                  <h3 class="card-title"><?php echo trans('create-new') ?> </h3>
                <?php endif; ?>

                <div class="card-tools pull-right">
                  <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                    <a href="<?php echo base_url('admin/domain') ?>" class="pull-right btn btn-secondary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a>
                  <?php else: ?>
                    <a href="#" class="text-right btn btn-secondary cancel_btn btn-sm"><?php echo trans('view') ?></a>
                  <?php endif; ?>
                </div>
              </div>

              <form method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/domain/add')?>" role="form" novalidate>
          
                <div class="card-body">
                    <div class="form-group">
                      <label><?php echo trans('current-url') ?></label>
                      <input disabled type="text" class="form-control" name="current_domain" value="<?php echo base_url() ?>" required>
                    </div>
                
                    <div class="form-group">
                      <label><?php echo trans('custom-domain') ?><span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="custom_domain" value="<?php if(!empty($domain)){echo $domain->custom_domain;} ?>" required>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="hidden" name="id" value="<?php if(!empty($domain)){echo html_escape($domain->id);} ?>">
                    <!-- csrf token -->
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                      <button type="submit" class="btn btn-primary pull-left"><?php echo trans('save-changes') ?></button>
                    <?php else: ?>
                      <button type="submit" class="btn btn-primary pull-left"> <?php echo trans('save') ?></button>
                    <?php endif; ?>
                </div>
              </form>
            </div>

            <?php if (!empty($page_title) && $page_title != "Edit"): ?>
              <div class="card list_area">
                <div class="card-header with-border">
                  <?php if (!empty($page_title) && $page_title == "Edit"): ?>
                    <h3 class="card-title pt-2"><?php echo trans('edit') ?> <a href="<?php echo base_url('admin/domain') ?>" class="pull-right btn btn-sm btn-primary btn-sm"><i class="fa fa-angle-left"></i> <?php echo trans('back') ?></a></h3>
                  <?php else: ?>
                    <h3 class="card-title pt-2"><?php echo trans('custom-domains') ?> </h3>
                  <?php endif; ?>

                  <div class="card-tools pull-right">
                    <a data-toggle="modal" href="#dnsIntrationHelp" class="pull-right btn btn-sm btn-danger mr-2"><i class="bi bi-gear"></i> <?php echo trans('dns-settings') ?></a>

                   <a href="#" class="pull-right btn btn-sm btn-secondary add_btn"><i class="bi bi-plus-circle"></i> <?php echo trans('create-new') ?></a>
                  </div>
                </div>

                <?php if (empty($domains)): ?>
                  <div class="card-body p-0 mb-3">
                    <div class="bg-danger-soft p-4 rounded">
                      <p class="mb-0"><i class="bi bi-info-circle fs-16"></i> <?php echo trans('custom-domain-user-warning-info') ?></p>
                    </div>
                  </div>
                <?php endif ?>

                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap <?php if(is_countable($domains) && count($domains)  > 10){echo "datatable";} ?>">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th><?php echo trans('custom-domain') ?></th>
                        <th><?php echo trans('default-url') ?></th>
                        <th><?php echo trans('status') ?></th>
                        <th><?php echo trans('date') ?></th>
                        <th><?php echo trans('action') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($domains as $domain): ?>
                        <tr id="row_<?php echo html_escape($domain->id); ?>">
                          <td><?= $i; ?></td>
                          <td><span class="badge badge-primary-soft"><i class="fas fa-globe"></i> <?php echo html_escape($domain->custom_domain) ?></span></td>
                          <td><span class="badge badge-secondary-soft"><?php echo html_escape($domain->current_domain) ?></span></td>
                          <td>
                            <?php if ($domain->status == 0): ?>
                              <span class="badge badge-warning-soft"><i class="fas fa-clock"></i> <?php echo trans('pending') ?></span>
                            <?php elseif($domain->status == 1): ?>
                              <span class="badge badge-success"><i class="fas fa-check-circle"></i> <?php echo trans('approved') ?></span>
                            <?php else: ?>
                               <span class="badge badge-danger"><i class="fas fa-times-circle"></i> <?php echo trans('rejected') ?></span>
                            <?php endif ?>
                          </td> 

                          <td><?php echo my_date_show($domain->date) ?></td>

                          <td class="actions">
                            <?php if ($domain->status != 1): ?>
                            <div class="btn-group">
                              <button type="button" class="btn btn-tool" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu">
                                
                                <a href="<?php echo base_url('admin/domain/edit/'.html_escape($domain->id));?>" class="dropdown-item"><?php echo trans('edit') ?></a>

                                <a data-val="Domain" data-id="<?php echo html_escape($domain->id); ?>" href="<?php echo base_url('admin/domain/delete/'.html_escape($domain->id));?>" class="dropdown-item delete_item"><?php echo trans('delete') ?></a>
                                
                              </div>
                            </div>
                            <?php endif ?>
                            
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



<!-- DNS Modal -->
<div class="modal fade" id="dnsIntrationHelp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php if(!empty($settings->title)){echo $settings->title;} ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="bi bi-x"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <p><?php if(!empty($settings->details)){echo $settings->details;} ?></p>

        <div class="mt-5">
          <?php if (is_admin()): ?>
            <p class="badge badge-secondary-soft fs-14"><i class="bi bi-info-circle-fill"></i> <?php echo trans('user-dns-settings-types') ?> </p>
          <?php endif ?>
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

      <div class="modal-footer text-left d-flex align-items-left justify-content-start">
        <?php if (!empty($settings->image)): ?>
        <a target="_blank" href="<?php echo base_url($settings->image) ?>" class="btn btn-primary btn-sm pull-left"><i class="bi bi-eye"></i> <?php echo trans('image') ?></a>
        <?php endif ?>
      </div>

    </div>
  </div>
</div>

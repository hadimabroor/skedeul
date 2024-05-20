<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <?php $this->load->view('admin/include/breadcrumb'); ?>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card list_area">
                <h3 class="card-title pt-2 mb-3"><?php echo trans('domain-requests') ?> </h3>

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
                              <span class="badge badge-warning"><i class="fas fa-clock"></i> <?php echo trans('pending') ?></span>
                            <?php elseif($domain->status == 1): ?>
                              <span class="badge badge-success"><i class="fas fa-check-circle"></i> <?php echo trans('approved') ?></span>
                            <?php else: ?>
                               <span class="badge badge-danger"><i class="fas fa-times-circle"></i> <?php echo trans('rejected') ?></span>
                            <?php endif ?>
                          </td> 
                          <td><?php echo my_date_show($domain->date) ?></td>
                          <td class="actions">
                            <div class="btn-group">
                              <button type="button" class="btn btn-tool" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right" role="menu" >

                                <?php if ($domain->status == 2 || $domain->status == 0): ?>
                                  <a href="<?php echo base_url('admin/domain/request_approve/'.html_escape($domain->id));?>" class="dropdown-item"><?php echo trans('approve') ?></a>
                                <?php endif ?>
                                
                                <?php if ($domain->status == 1 || $domain->status == 0): ?>
                                  <a href="<?php echo base_url('admin/domain/request_reject/'.html_escape($domain->id));?>" class="dropdown-item"><?php echo trans('reject') ?></a>
                                <?php endif ?>

                                <a data-val="Category" data-id="<?php echo html_escape($domain->id); ?>" href="<?php echo base_url('admin/domain/delete/'.html_escape($domain->id));?>" class="dropdown-item delete_item"><?php echo trans('delete') ?></a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php $i++; endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>

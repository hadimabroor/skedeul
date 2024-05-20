<div class="content-wrapper">
  <?php $this->load->view('admin/include/breadcrumb'); ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12 m-auto">
     
          <div class="card">
            <div class="card-header with-border justify-content-between">
              <h3 class="card-title"><?php echo trans('generate-ai-response') ?>  </h3>
            </div>

            <div class="card-body p-0">

              <div class="row p-0">
                <div class="col-md-5 pr-5 pl-5 pt-5 pb-5 bg-lightss bodr-1">
                    <form id="document_generate" method="post" enctype="multipart/form-data" class="validate-form" action="<?php echo base_url('admin/document/generate')?>" role="form" novalidate>
                      <div class="template-generate">
                         
                          <div class="form-group">
                            <label><?php echo trans('give-some-directions-about-your-topic') ?> <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control prompt" name="prompt" rows="3" required placeholder=""></textarea>
                          </div>


                          <p>
                            <a class="badge badge-secondary-soft p-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                              <i class="fas fa-arrow-down"></i> <?php echo trans('advanced-settings') ?>
                            </a>
                          </p>

                          <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                              <div class="more_settings">
                                <div class="form-group">
                                  <label class="control-label p-0" for="example-input-normal"><?php echo trans('content-creativity-level') ?></label>
                                  <select class="form-control" name="creativity_level">
                                    <option value="0.1"><?php echo trans('low') ?></option>
                                    <option value="0.5"><?php echo trans('medium') ?></option>
                                    <option value="1.0"><?php echo trans('high') ?></option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label class="control-label p-0" for="example-input-normal"><?php echo trans('output-variations') ?></label>
                                  <select class="form-control" name="output_variations">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label><?php echo trans('max-wrods') ?></label>
                                  <input type="number" class="form-control" name="max_tokens" value="256">
                                </div>

                                <div class="form-group d-hide">
                                  <label class="control-label p-0" for="example-input-normal"><?php echo trans('language') ?></label>
                                  <select class="form-control" name="language">
                                    <?php foreach (get_languages() as $language): ?>
                                      <option <?php if($language == 'English'){echo "selected";} ?> value="<?php echo html_escape($language) ?>"><?php echo html_escape($language) ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>

                              </div>
                            </div>
                          </div>

                          <!-- csrf token -->
                          <input type="hidden" name="<?php echo html_escape($this->security->get_csrf_token_name());?>" value="<?php echo html_escape($this->security->get_csrf_hash());?>">

                          <button type="submit" class="btn btn-primary btn-block pull-left mt-4 pt-2 pb-2 generate_btn"><?php echo trans('generate') ?></button>

                      </div>
                    </form>
                </div>

                <div class="col-md-7 pt-5 pr-3 bg-white bodr-1">

                  <div class="result_area">
                    <div class="result_head d-hide mb-3">
                      <div class="d-flex justify-content-between">
                        <div>
                          <h6><?php echo trans('ai-response') ?></h6>
                        </div>

                        <div class="d-none">
                          <span class="badge badge-success-soft"><i class="bi bi-check-circle-fill"></i><?php echo trans('saved') ?></span>
                        </div>
                      </div>
                    </div>

                    <div id="load_result" class="result-body">
                      <div class="result_loading center-contents text-center d-hide">
                        <img width="100px" src="<?php echo base_url('assets/images/pencil.gif') ?>">
                      </div>
                    </div>
                  </div>

                  <div class="empty_result_area center-contents text-center">
                    <div>
                      <img width="80px" src="<?php echo base_url('assets/images/error-page.png') ?>">
                      <h6 class="mt-3"><?php echo trans('no-content-yet') ?></h6>
                      <p class="text-muted"><?php echo trans('describe-your-topic-to-start-writing-some-compelling-copy') ?></p>
                    </div>
                  </div>
                </div>

              </div>
              
              
            </div>
          </div>
          
      </div>
    </div>
  </div>
</div>

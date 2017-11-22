<?php

//echo "<pre>";print_r(form_error());die;
//echo "<pre>";print_r($editdata);die;
//echo "<pre>";
//print_r($editdata); exit;
?>
<div class="page-content-wrapper">
  <div class="page-content">
      <h3 class="page-title">
          Add Business Ads
      </h3>
      <div class="page-bar">
      <?php echo set_breadcrumb(); ?>
      </div>
      <?php display_flashmsg($this->session->flashdata()); ?>
      <div class="row">
        <div class="col-md-12 ">
          <div class="portlet box green ">
              <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-table"></i> Business Form
                  </div>
              </div>
              <div class="portlet-body form">
                <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                      <h3 class="form-section"><strong>Business Details</strong></h3>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('title'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Title Name<span class="required">*</span>  </label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo set_value('title',$editdata['title']);?>">
                                <?php echo form_error("title"); ?>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('location'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Event Location<span class="required">*</span></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="location" id="location" placeholder="event loocation" value="<?php echo set_value('location',$editdata['location']);?>">
                                <?php echo form_error("location"); ?>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('from_date'))?'has-error':'';?>">
                              <label class="control-label col-md-3">From date<span class="required">*</span>  </label>
                              <div class="col-md-9">
                                <input type="text" autocomplete="off" class="form-control"  name="from_date" id="from_date" placeholder="yyyy/dd/mm"  value="<?php echo set_value('from_date',$editdata['from_date']);?>">
                                <?php echo form_error("from_date"); ?>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('to_date'))?'has-error':'';?>">
                              <label class="control-label col-md-3">To Date<span class="required">*</span></label>
                              <div class="col-md-9">
                                <input type="text" autocomplete="off" class="form-control" name="to_date" id="to_date" placeholder="yyyy/dd/mm" value="<?php echo set_value('to_date',$editdata['to_date']);?>">
                                <?php echo form_error("to_date"); ?>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('description'))?'has-error':'';?>">
                            <label class="control-label col-md-3">Description<span class="required">*</span></label>
                            <div class="col-md-9">
                              <textarea class="jqte-test form-control" name="description" id="description"><?php echo set_value('description',$editdata['description']);?></textarea>
                              <?php echo form_error('description'); ?>
                            </div>
                          </div>
                        </div>  
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('event_image'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Events Image</span></label>
                              <div class="col-md-9">
                                <input type="file"  name="event_image" size="20" />
                                <input type="hidden" name="added_files1" value="<?php echo (!empty($editdata['event_image']))?rtrim($editdata['event_image'],","):""; ?>" />
                                <input type="hidden" name="file_path" value="<?php echo (!empty($editdata['filepath']))?rtrim($editdata['filepath'],","):""; ?>" />
                                  <?php if(!empty($editdata["event_image"])){ ?>
                                    <br>
                                  <img src="<?=base_path()."assets/img/events/".$editdata["event_image"]; ?>" width="50" height="50" />
                                <?Php }?>
                              </div>
                              <?php echo form_error('event_image'); ?>
                          </div>
                        </div>
                      </div>
               			  <div class="row">
                        <div class="col-md-5">
                          <div class="form-group <?php echo (form_error('status'))?'has-error':'';?>">
                            <label class="control-label col-md-3">Status<span class="required">*</span></label>
                            <div class="col-md-9 radio-btn">
                              <input type="radio" class="form-control form-control-inline" name="status" id="status" value="Active" <?php echo set_radio('status',$editdata['status'],($editdata['status']=='Active')?True:False);?>> Active
                              <input type="radio" class="form-control form-control-inline" name="status" id="status" value="Inactive" <?php echo set_radio('status',$editdata['status'],($editdata['status']=='Inactive')?True:False);?>> Inactive
                                <?php echo form_error('status'); ?>
                            </div>
                          </div>
                        </div>                                 
                      </div>
                      <!--row-->                                            
                    </div>
                    <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                              <button type="submit" class="btn green">Submit</button>
                              <a href="<?php echo site_url('events');?>" class="btn default">Cancel</a>
                          </div>
                        </div>
                    </div>
                </form>
              </div>
          </div>
        </div>
      </div>
  </div>
</div>

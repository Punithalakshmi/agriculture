<?php

//echo "<pre>";print_r(form_error());die;
//echo "<pre>";print_r($editdata);die;
//echo "<pre>";
//print_r($editdata); exit;
?>
<div class="page-content-wrapper">
  <div class="page-content">
      <h3 class="page-title">
          Add Services
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
                  <i class="fa fa-table"></i>Services Form
                </div>
            </div>
              <div class="portlet-body form">
                <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post" enctype="multipart/form-data">
                    
                    <div class="form-body">
                      
                      <h3 class="form-section"><strong>Services Details</strong></h3>
                        <!--row start -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('name'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Title<span class="required">*</span></label>
                              <div class="col-md-9">
                                <?php echo form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '1', 'placeholder' =>'Title' ,'value' => set_value('first_name',$editdata['title'])]); ?> <?php echo form_error('title', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                  <div class="form-group <?php echo (form_error('description'))?'has-error':'';?>">
                    <label class="control-label col-md-3">Description<span class="required">*</span></label>
                    <div class="col-md-9">
                     <textarea class="jqte-test form-control" name="description" id="description"><?php echo set_value('description',$editdata['description']);?></textarea>
                     <?php echo form_error('description'); ?>
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
                        </div>
                    <!--/row-->                                            
                    </div>
                    <div class="form-actions">
                       <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                             <button type="submit" class="btn green">Submit</button>
                             <a href="<?php echo site_url('plans');?>" class="btn default">Cancel</a>
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



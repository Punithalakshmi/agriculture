
<div class="page-content-wrapper">
  <div class="page-content">
      <h3 class="page-title">
          Add Phots
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
                  <i class="fa fa-table"></i>Phots Form
                </div>
            </div>
              <div class="portlet-body form">

                <form action="#" class="mt-repeater form-horizontal" name="add_news" id="add_news" method="post" enctype="multipart/form-data">
                    
                    <div class="form-body">
                      
                        <!--row start -->
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('title'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Title<span class="required">*</span></label>
                              <div class="col-md-9">
                                <?php echo form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '3', 'placeholder' =>'Title' ,'value' => set_value('title',$editdata['title'])]); ?> <?php echo form_error('title', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>  
                              </div>
                            </div>
                          </div>
                            
                          <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('image_name'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Image</label>
                              <div class="col-md-9">
                               <?php echo form_upload(['name' => 'image_name', 'id' => 'image_name', 'class' => 'form-control', 'tabindex' => '4', 'placeholder' => $this->lang->line('image_name'), 'value' => set_value('image_name')]); ?> <?php echo form_error('image_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 

                                    <?php if($editdata['image_name']){ ?>
                                     <span style="vertical-align:left">Image Preview</span>
                                    
                                    <div style="padding-top: 12px;">
                             
                                      <img src="<?php echo base_url(); ?>uploads/agr_photos/<?php echo $editdata['image_name']; ?>" style="vertical-align:middle;" width="80" height="80">

                                     </div>
                                   <?php } ?> 
                              </div>
                            </div>
                          </div> 
                         
                          </div>

                          <div class="row">
                          <div class="col-md-6">
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
                        
                    <!--/row-->                                            
                    </div>
                    <div class="form-actions">
                       <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                             <button type="submit" class="btn green">Submit</button>
                             <a href="<?php echo site_url('agr_photos');?>" class="btn default">Cancel</a>
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



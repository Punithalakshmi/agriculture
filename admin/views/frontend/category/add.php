<?php

//echo "<pre>";print_r(form_error());die;
//echo "<pre>";print_r($editdata);die;
//echo "<pre>";
//print_r($editdata); exit;
?>
<div class="page-content-wrapper">
  <div class="page-content">
      <h3 class="page-title">
          Add Category
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
                    <i class="fa fa-table"></i> Category Form
                  </div>
              </div>
              <div class="portlet-body form">
                <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                      <h3 class="form-section"><strong>Business Details</strong></h3>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group <?php echo (form_error('name'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Category Name<span class="required">*</span>  </label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo set_value('name',$editdata['name']);?>">
                                <?php echo form_error("name"); ?>
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
                          <div class="form-group <?php echo (form_error('category_image'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Category Image</span></label>
                              <div class="col-md-9">
                                <input type="file"  name="category_image" size="20" />
                                  <?php if(!empty($editdata["category_img"])){ ?>
                                    <br>
                                  <img src="<?=base_path()."assets/img/category/".$editdata["category_img"]; ?>" width="50" height="50" />
                                <?Php }?>
                              </div>
                              <?php echo form_error('category_image'); ?>
                          </div>
                        </div>
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
                              <a href="<?php echo site_url('category');?>" class="btn default">Cancel</a>
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



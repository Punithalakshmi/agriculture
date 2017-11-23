<?php

//echo "<pre>";print_r(form_error());die;
//echo "<pre>";print_r($editdata);die;
//echo "<pre>";
//print_r($editdata); exit;
?>
<div class="page-content-wrapper">
  <div class="page-content">
      <h3 class="page-title">
          Add Product
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
                  <i class="fa fa-table"></i>Product Form
                </div>
            </div>
              <div class="portlet-body form">
                <form action="#" class="mt-repeater form-horizontal" name="add_project" id="add_new_project" method="post" enctype="multipart/form-data">
                    
                    <div class="form-body">
                      
                      <h3 class="form-section"><strong>Product Details</strong></h3>
                        <!--row start -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('name'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Product Name<span class="required">*</span></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo set_value('name',$editdata['name']);?>">
                                    <?php echo form_error("name"); ?>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('name'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Description<span class="required">*</span></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo set_value('name',$editdata['name']);?>">
                                    <?php echo form_error("name"); ?>
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
                             <a href="<?php echo site_url('product');?>" class="btn default">Cancel</a>
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



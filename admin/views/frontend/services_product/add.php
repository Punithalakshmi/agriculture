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
                <form action="#" class="mt-repeater form-horizontal" name="add_services_product" id="add_services_product" method="post" enctype="multipart/form-data">
                    
                    <div class="form-body">
                      
                      <h3 class="form-section"><strong>Services Details</strong></h3>
                        <!--row start -->
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('category_id'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Category<span class="required">*</span></label>
                              <div class="col-md-9">
                                <?php echo form_dropdown  ('category_id', $category, $editdata['category_id'], ['name' => 'category_id', 'tabindex' => '1', 'id' => 'category_id', 'class' => 'form-control']); ?> <?php echo form_error('category_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('seller_id'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Seller<span class="required">*</span></label>
                              <div class="col-md-9">
                              <?php if($s_id){ ?>

                                <?php echo form_dropdown('seller_id', $seller, $editdata['seller_id'], ['name' => 'seller_id', 'tabindex' => '2', 'id' => 'seller_id', 'class' => 'form-control']); ?> <?php echo form_error('seller_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>  

                                <?php }else{ ?>

                                <?php echo $seller_name; ?> 

                                <input type="hidden" name="seller_id" value="<?php echo $sell_id ?>">

                               <?php } ?> 
                              </div>
                            </div>
                          </div>
                          </div>

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
                             
                                      <img src="<?php echo base_url(); ?>uploads/services/<?php echo $editdata['image_name']; ?>" style="vertical-align:middle;" width="80" height="80">

                                     </div>
                                   <?php } ?> 
                              </div>
                            </div>
                          </div> 
                          </div>
                         
                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('price'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Price<span class="required">*</span></label>
                              <div class="col-md-9">
                                <?php echo form_input(['name' => 'price', 'id' => 'price', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '5', 'placeholder' =>'Price' ,'value' => set_value('price',$editdata['price'])]); ?> <?php echo form_error('price', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
                              </div>
                            </div>
                          </div>
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Event</label>
                              <div class="col-md-9">
                               <?php echo form_dropdown(array('name' => 'event_id', 'tabindex' => '1','class' => 'form-control', 'id' => 'events'), array('' => 'Select Events')+get_events(), set_value('events',$editdata['event_id']));?> 
                              </div>
                            </div>
                          </div>
                          </div>

                            <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Contact</label>
                              <div class="col-md-9">
                               <?php echo form_textarea(['name' => 'contact_details', 'id' => 'contact_details', 'class' => 'form-control', 'tabindex' => '8', 'value' => set_value('contact_details',$editdata['contact_details']), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?>  
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Addresss</label>
                              <div class="col-md-9">

                               <?php echo form_textarea(['name' => 'address', 'id' => 'address', 'class' => 'form-control', 'tabindex' => '6', 'value' => set_value('address',$editdata['address']), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?> 
                              </div>
                            </div>
                          </div>
                           
                          </div>
                          
                          <div class="row">
                           <div class="col-md-6">
                            <div class="form-group <?php echo (form_error('description'))?'has-error':'';?>">
                              <label class="control-label col-md-3">Description<span class="required">*</span></label>
                              <div class="col-md-9">
                               <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control mceEditor', 'tabindex' => '7', 'value' => set_value('description',$editdata['description']), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?> <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                              </div>
                            </div>
                          </div>

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
                             <a href="<?php echo site_url('services_product');?>" class="btn default">Cancel</a>
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



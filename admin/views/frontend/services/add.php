  
   <form id="servicesForm" method="post" action="" novalidate="novalidate">

     <input type="hidden" name="seller_id" value="<?=$editdata['seller_id'];?>">
      <div class="col-lg-6">
      <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">Company Name<span class="required">*</span></label>
      	<?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Company Name' ,'value' => set_value('company_name',$editdata['company_name'])]); ?> <?php echo form_error('company_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
      	</div>
      </div>

       <div class="form-group">  

            <div class="col-lg-7"> 
            <label class="control-label">Description<span class="required">*</span></label>
            
            <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control', 'tabindex' => '3', 'value' => set_value('description',$editdata['description']), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?> <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">Website<span class="required">*</span></label>
       
      	<?php echo form_input(['name' => 'website', 'id' => 'website', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Website' ,'value' => set_value('website',$editdata['website'])]); ?> <?php echo form_error('website', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
      	</div>
      </div>

     
      </div>
      <div class="clearfix"></div>
      <div class="clearfix"></div>
      <br/>
      <br/>
       <div class="col-md-offset-3 col-md-9">

       							
       								 <button type="button" class="btn green" onclick="tab_view('service','seller/add_service','servicesForm')">Submit</button>
											
											<a href="<?=site_url('seller');?>" class="btn default">Cancel</a>
										</div>
      </form>


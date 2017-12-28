  
   <form id="servicesForm" method="post" action="" novalidate="novalidate">

     <input type="hidden" name="seller_id" value="<?=$editdata['seller_id'];?>">


     <div class="col-lg-12">
     <div class="col-lg-6">
      <div class="form-group">
        <div class="col-lg-7">
       <label class="control-label">Business Name<span class="required">*</span></label>
        <?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '1', 'placeholder' =>'Company Name' ,'value' => set_value('company_name',$editdata['company_name'])]); ?> <?php echo form_error('company_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
     </div>
   </div>
   
  
       <div class="form-group">
        <div class="col-lg-7">
      <label class="control-label">Website<span class="required">*</span></label>
       
        <?php echo form_input(['name' => 'website', 'id' => 'website', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Website' ,'value' => set_value('website',$editdata['website'])]); ?> <?php echo form_error('website', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
     </div>
  
 </div>



       <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">Work Experience<span class="required">*</span></label>
            

            <?php echo form_input(['name' => 'experience', 'id' => 'experience', 'maxlength' => '258', 'class' => 'form-control','tabindex' => '2','value' => set_value('experience',$editdata['experience'])]); ?> <?php echo form_error('experience', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>

     </div>
   </div>
 

 
       <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">Primary services<span class="required">*</span></label>
            
            <?php echo form_input(['name' => 'primary_service_category', 'id' => 'primary_service_category', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '4', 'placeholder' =>'Primary Service Category' ,'value' => set_value('primary_service_category',$editdata['primary_service_category'])]); ?> <?php echo form_error('primary_service_category', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
     </div>
   </div>
 


       <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">Other related services</label>
            
             <?php echo form_textarea(['name' => 'other_related_category', 'id' => 'other_related_category', 'class' => 'form-control', 'tabindex' => '3', 'value' => set_value('other_related_category',$editdata['other_related_category']), 'rows' => 4, 'cols' => 8, 'tabindex' => '8']); ?> 
     </div>
   </div>
</div>

 <div class="col-lg-6">
       <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">Types of Experience</label>
            
            <?php echo form_input(['name' => 'experience_type', 'id' => 'experience_type', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '6', 'placeholder' =>'Experience Type' ,'value' => set_value('experience_type',$editdata['experience_type'])]); ?> <?php echo form_error('experience_type', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
     </div>
   </div>



       <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">QualifiCation Skills</label>
            
            <?php echo form_input(['name' => 'qualification', 'id' => 'qualification', 'maxlength' => '258', 'class' => 'form-control','tabindex' => '2','value' => set_value('qualification',$editdata['qualification'])]); ?> <?php echo form_error('qualification', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
     </div>
   </div>


 
       <div class="form-group">
        <div class="col-lg-7">
         <label class="control-label">Description<span class="required">*</span></label>
            
            <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control', 'tabindex' => '3', 'value' => set_value('description',$editdata['description']), 'rows' => 4, 'cols' => 8, 'tabindex' => '8']); ?> <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
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

     </div>


      
      </form>


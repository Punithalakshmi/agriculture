  
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
      <label class="control-label">Website</label>
       
        <?php echo form_input(['name' => 'website', 'id' => 'website', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Website' ,'value' => set_value('website',$editdata['website'])]); ?> 
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

   <div class="form-group">

        <div class="col-lg-7">
      <input type="checkbox" class="filled-in farming" name="farming_industry" id="filled-in-box1" value="farming_industry"/>
      <label for="filled-in-box1">Farming Industry</label>
     </div>

     <div class="row farming" style="display:none">
    <div class="col-lg-7">
        <label class="control-label">Name</label>
          
            <?php echo form_input(['name' => 'far_name', 'id' => 'far_name', 'class' => 'form-control','value' => set_value('far_name',$editdata['far_name'])]); ?> 
     </div>

     <div class="col-lg-7">
        <label class="control-label">Address</label>
          
            <?php echo form_input(['name' => 'far_address', 'id' => 'far_address','class' => 'form-control','value' => set_value('far_address',$editdata['far_address'])]); ?> 
     </div>
     <div class="col-lg-7">
        <label class="control-label">Description</label>
          
            <?php echo form_input(['name' => 'far_description', 'id' => 'far_description','class' => 'form-control','value' => set_value('far_description',$editdata['far_description'])]); ?> 
     </div>
  </div>
   </div>

    <div class="form-group">
        <div class="col-lg-7">
      <input type="checkbox" class="filled-in custom" name="custom_farmer" id="filled-in-box2" value="custom_farmer"/>
      <label for="filled-in-box2">Custom Farmer</label>
     </div>
     <div class="row custom" style="display:none">
    <div class="col-lg-7">
        <label class="control-label">Name</label>
          
            <?php echo form_input(['name' => 'cus_far_name', 'id' => 'cus_far_name', 'class' => 'form-control','value' => set_value('cus_far_name',$editdata['cus_far_name'])]); ?> 
     </div>

     <div class="col-lg-7">
        <label class="control-label">Description</label>
          
            <?php echo form_input(['name' => 'cus_description', 'id' => 'cus_description','class' => 'form-control','value' => set_value('cus_description',$editdata['cus_description'])]); ?> 
     </div>
  
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

   <div class="form-group">
        <div class="col-lg-7">
        <label class="control-label">Position</label>
            
            <?php echo form_input(['name' => 'position', 'id' => 'position', 'maxlength' => '258', 'class' => 'form-control','tabindex' => '2','value' => set_value('position',$editdata['position'])]); ?> <?php echo form_error('position', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
     </div>
   </div>

<div class="form-group">
        <div class="col-lg-7">
      <input type="checkbox" class="filled-in acreage" name="own_acreage" id="filled-in-box3" value="own_acreage"/>
      <label for="filled-in-box3">Own Acreage</label>
     </div>
    
     <div class="row acreage" style="display:none">
    <div class="col-lg-7">
        <label class="control-label">Land Type</label>
          
            <?php echo form_input(['name' => 'land_type', 'id' => 'land_type', 'class' => 'form-control','value' => set_value('land_type',$editdata['land_type'])]); ?> 
     </div>

     <div class="col-lg-7">
        <label class="control-label">Number of Acreage</label>
          
            <?php echo form_input(['name' => 'number_of_acreage', 'id' => 'number_of_acreage','class' => 'form-control','value' => set_value('number_of_acreage',$editdata['number_of_acreage'])]); ?> 
     </div>
  
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


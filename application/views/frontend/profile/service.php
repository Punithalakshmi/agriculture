 <div class="row">
    <form id="servicesForm" method="post" action="" novalidate="novalidate">
      <div class="row">
        <div class="col s6">
        
          <label for="icon_prefix">Business Name<span class="required">*</span></label>
          <?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('company_name',$servicedata['company_name'])]); ?> <?php echo form_error('company_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        <div class="col s6">
         <label for="icon_telephone">Website</label>
         <?php echo form_input(['name' => 'website', 'id' => 'website', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('website',$servicedata['website'])]); ?> 
          
        </div>
      </div>

      <div class="row">

        <div class="col s6">

                
          <label for="icon_telephone">Work Experience<span class="required">*</span></label>
         <?php echo form_input(['name' => 'experience', 'id' => 'experience', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('experience',$servicedata['experience'])]); ?> <?php echo form_error('experience', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>

                 
              </div>

        <div class="col s6">
         <label for="icon_telephone">Types of Experience</label>
          <?php echo form_input(['name' => 'experience_type', 'id' => 'experience_type', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '4', 'placeholder' =>'Experience Type' ,'value' => set_value('experience_type',$servicedata['experience_type'])]); ?> <?php echo form_error('experience_type', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          
        </div>
      </div>

      <div class="row">
        <div class="col s6">
        
          <label for="icon_prefix">Primary services<span class="required">*</span></label>
           <?php echo form_input(['name' => 'primary_service_category', 'id' => 'primary_service_category', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('primary_service_category',$servicedata['primary_service_category'])]); ?> <?php echo form_error('primary_service_category', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>

        <div class="col s6">
        
          <label for="icon_prefix">QualifiCation</label>
           <?php echo form_input(['name' => 'qualification', 'id' => 'qualification', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('qualification',$servicedata['qualification'])]); ?> 
        </div>


        
      </div>

      <div class="row">
        
        <div class="col s6">
         <label for="icon_telephone">Description<span class="required">*</span></label>
           <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'maxlength' => '258', 'tabindex' => '8','class' => 'materialize-textarea','value' => set_value('description',$servicedata['description'])]); ?>  <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          
        </div>

        <div class="col s6">
         <label for="icon_telephone">Other related services</label>
          
           <?php echo form_textarea(['name' => 'other_related_category', 'id' => 'other_related_category', 'maxlength' => '258', 'tabindex' => '8','class' => 'materialize-textarea','value' => set_value('other_related_category',$servicedata['other_related_category'])]); ?>  <?php echo form_error('other_related_category', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          
        </div>
      </div>

      <div class="row">
        
        <div class="col s6">
         <label for="icon_telephone">How did you hear about us</label>

          <?php
                    $qualification  = array(
                        'News paper' => 'News paper',
                        'Website' => 'Website',
                        'Tv' => 'Tv',
                        'Others' => 'Others',
                    );
                    ?>
                  <?php echo form_dropdown('how_did_you_hear_about_us', $qualification, $servicedata['how_did_you_hear_about_us'], ['name'=>'how_did_you_hear_about_us', 'id'=>'how_did_you_hear_about_us', 'tabindex'=> '8','class' => 'browser-default']); ?>
  </div>

      <div class="col s6">
         <label for="">Position<span class="required"></span></label>
           <?php echo form_input(['name' => 'position', 'id' => 'position','value' => set_value('position',$servicedata['position'])]); ?> 
          
        </div>
          
        </div>

      <p>
      <input type="checkbox" class="filled-in farming" name="farming_industry" id="filled-in-box" value="farming_industry" <?php echo set_checkbox('farming_industry', $servicedata['farming_industry'], ($servicedata['farming_industry']==$servicedata['farming_industry'])?TRUE:FALSE);?>"/>
      <label for="filled-in-box">Farming Industry</label>
     </p>
      
      <div class="row farming" style="display:none">
        
        <div class="col s6">
         <label for="far_name">Name<span class="required"></span></label>
           <?php echo form_input(['name' => 'far_name', 'id' => 'far_name','value' => set_value('far_name',$servicedata['far_name'])]); ?> 
          
        </div>
    
      <div class="col s6">
         <label for="">Address</label>
          
           <?php echo form_input(['name' => 'far_address', 'id' => 'far_address','value' => set_value('far_address',$servicedata['far_address'])]); ?> 

        </div>

        <div class="col s6">
         <label for="">Description</label>
          
            <?php echo form_input(['name' => 'far_description', 'id' => 'far_description','value' => set_value('far_description',$servicedata['far_description'])]); ?>  

        </div>

      </div>

      

      <p>
      <input type="checkbox" class="filled-in acreage" name="own_acreage" id="filled-in-box3" value="own_acreage" <?php echo set_checkbox('own_acreage', $servicedata['own_acreage'], ($servicedata['own_acreage']==$servicedata['own_acreage'])?TRUE:FALSE);?> />
      <label for="filled-in-box3">Own Acreage</label>
     </p>

    <div class="row acreage" style="display:none">
        
        <div class="col s6">
         <label for="">Land Type<span class="required"></span></label>
           <?php echo form_input(['name' => 'land_type', 'id' => 'land_type','value' => set_value('land_type',$servicedata['land_type'])]); ?> 
          
        </div>

          <div class="col s6">
         <label for="">Number of Acreage<span class="required"></span></label>
           <?php echo form_input(['name' => 'number_of_acreage', 'id' => 'number_of_acreage','value' => set_value('number_of_acreage',$servicedata['number_of_acreage'])]); ?> 
          
        </div>
  
      </div>
        
        <p>
      <input type="checkbox" class="filled-in custom" name="custom_farmer" id="filled-in-box4" value="custom_farmer" <?php echo set_checkbox('custom_farmer', $servicedata['custom_farmer'], ($servicedata['custom_farmer']==$servicedata['custom_farmer'])?TRUE:FALSE);?> />
      <label for="filled-in-box4">Custom Farmer</label>
     </p>

    <div class="row custom" style="display:none">
        <div class="col s6">
         <label for="">Name<span class="required"></span></label>
           <?php echo form_input(['name' => 'cus_far_name', 'id' => 'cus_far_name','value' => set_value('cus_far_name',$servicedata['cus_far_name'])]); ?> 
        </div>

        <div class="col s6">
         <label for="">Description</label>
          
            <?php echo form_input(['name' => 'cus_description', 'id' => 'cus_description','value' => set_value('cus_description',$servicedata['cus_description'])]); ?>  

        </div>
      </div>

       <button type="button" onclick="tab_view('service','profile/service_update','servicesForm')" class="btn-large z-depth-0" name="seller_data">Update</button>
    </form>
  </div>
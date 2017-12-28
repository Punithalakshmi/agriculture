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
          
        </div>
      </div>
       <button type="button" onclick="tab_view('service','profile/service_update','servicesForm')" class="btn-large z-depth-0" name="seller_data">Update</button>
    </form>
  </div>
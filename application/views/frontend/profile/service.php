 
     <form id="servicesForm" method="post" action="" novalidate="novalidate">
      <div class="row">
        <div class="input-field col s12">
        <?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Company Name' ,'value' => set_value('company_name',$servicedata['company_name'])]); ?> <?php echo form_error('company_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="disabled">Company Name <span class="required">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <?php echo form_textarea(['name' => 'description', 'id' => 'description','class' => 'materialize-textarea', 'tabindex' => '3', 'value' => set_value('description',$servicedata['description']),'tabindex' => '10']); ?> <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="password">Description<span class="required">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <?php echo form_input(['name' => 'website', 'id' => 'website','maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Website' ,'value' => set_value('website',$servicedata['website'])]); ?> <?php echo form_error('website', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="email">Website<span class="required">*</span></label>
        </div>
      </div>
      <p>
      <p>
        <button type="button" onclick="tab_view('service','profile/service_update','servicesForm')" class="btn-large z-depth-0" name="seller_data">Submit</button>
                     
  <a href="<?=site_url('profile');?>" class="btn-large z-depth-0">Cancel</a>

      <input type="submit" value="Update" class="btn-large z-depth-0">
  </form>

    
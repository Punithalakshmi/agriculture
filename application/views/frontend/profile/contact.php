 

  <form id="formContact" role="form" method="post">
    
      <div class="row">
     
         <div class="col s12 m6">
      <label for="FirstName"> First Name <span class="required">*</span></label>
     <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('first_name',$editdata['first_name'])]); ?> <?php echo form_error('first_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
    </div>

    <div class="col s12 m6">
      <label for="LastName"> Last Name <span class="required">*</span></label>
     <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('last_name',$editdata['last_name'])]); ?> <?php echo form_error('last_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
    </div>
  </div>

  <div class="row">
      <div class="col s12 m6">
    <label for="Email"> Email <span class="required">*</span></label>
    <?php echo form_input(['name' => 'email', 'id' => 'email','maxlength' => '258', 'tabindex' => '3','value' => set_value('email',$editdata['email'])]); ?> <?php //echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6">
    <label for="CreatePassword"> Password </label>
   <?php echo form_input(['name' => 'password', 'id' => 'password', 'maxlength' => '258', 'tabindex' => '4','value' => set_value('password')]); ?> <?php echo form_error('password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>
</div>

 <div class="row">
   <div class="col s12 m6">
    <label for="FirstName"> Address 1 <span class="required">*</span></label>

   <?php echo form_input(['name' => 'address', 'id' => 'address', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('address',$editdata['address'])]); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

   <div class="col s12 m6">
    <label for="FirstName"> Address 2</label>

   <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'maxlength' => '258', 'tabindex' => '6','value' => set_value('address2',$editdata['address2'])]); ?> 
  </div>

</div>

 <div class="row">
  <div class="col s12 m6">
    

   <?php echo form_dropdown('country_id', get_country_all(), (set_value('country_id')) ? set_value('country_id') : 231,
['name' => 'country_id', 'id' => 'country_id', 'tabindex' => '7','class' => 'browser-default']); ?> 
  </div>


  <div class="col s12 m6">

    <?php echo form_dropdown('state_id', get_state_all(), $editdata['state_id'], ['name'=>'state_id', 'id'=>'state_id', 'tabindex'=> '8','class' => 'browser-default']); ?>
<?php echo form_error('state_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>
 </div>

 <div class="row">
  <div class="col s12 m6">
    <label for="FirstName">City<span class="required">*</span></label>

    <?php echo form_input(['name' => 'city', 'id' => 'city', 'maxlength' => '258', 'tabindex' => '9','value' => set_value('city',$editdata['city'])]); ?> <?php echo form_error('city', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6">
    <label for="FirstName"> Phone <span class="required">*</span></label>

   <?php echo form_input(['name' => 'phone', 'id' => 'phone','maxlength' => '258', 'tabindex' => '10','value' => set_value('phone',$editdata['phone'])]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>
</div>

 <div class="row">
  <div class="col s12 m6">
    <label for="FirstName"> Zip<span class="required">*</span></label>

   <?php echo form_input(['name' => 'zip', 'id' => 'zip','maxlength' => '258', 'tabindex' => '11','value' => set_value('zip',$editdata['zip'])]); ?> <?php echo form_error('zip', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

 <div class="col s12 m6">

  <label>Plans</label>
  <select class="browser-default" disabled>
     <option value="" disabled selected><?=$plans[0]['name']?></option>
  </select>
  
  </div>
</div>
  <p>
   
    <button type="button" onclick="tab_view('contact','profile/update_contact','formContact')" class="btn-large z-depth-0" name="seller_data">Update</button> 
  </p>
      
  </form> 
   

   
   
 

    
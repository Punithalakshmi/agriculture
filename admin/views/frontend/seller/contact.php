
 <form id="formContact" role="form" method="post">
     <div class="col-lg-12">
     <div class="col-lg-6">

      <div class="form-group">
      <div class="col-lg-7">
       <label class="control-label">First Name<span class="required">*</span></label>
            
            <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '1', 'placeholder' =>'First Name' ,'value' => set_value('first_name',$editdata['first_name'])]); ?> <?php echo form_error('first_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
            
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">Email<span class="required">*</span></label>
           
            <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '3', 'placeholder' =>'Email' ,'value' => set_value('email',$editdata['email'])]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">Address 2</label>
            <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '7', 'placeholder' =>'Address 2' ,'value' => set_value('address2',$editdata['address2'])]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>

         <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">Country</label>
       <?php echo form_dropdown('country_id', $country, (set_value('country_id')) ? set_value('country_id') : 231,
        ['name' => 'country_id', 'id' => 'country_id', 'tabindex' => '9', 'class' => 'form-control']); ?> <?php echo form_error('country_id',
                    '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>
        <div class="form-group">
      <div class="col-lg-7">
      <label class="control-label">State</label>
            <?php echo form_dropdown('state_id', $state, $editdata['state_id'], ['name' => 'state_id', 'tabindex' => '10', 'id' => 'state_id', 'class' => 'form-control']); ?> <?php echo form_error('state_id ', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
        </div>
        </div> 

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1" class="col-lg-4 control-label text-semibold">Status<span class="required">*</span></label>
            <div class="col-lg-7 radio">

                <label class="form-radio form-icon active form-text">

                 <input type="radio" name="status" <?php if ($editdata['status'] == "Active") { ?>checked <?php } ?> value="Active">

                    Active </label>

                   

                <label class="form-radio form-icon active form-text">

                 <input type="radio" name="status" <?php if ($editdata['status'] == "Inactive") { ?>checked <?php } ?> value="Inactive">

                    Inactive </label>

                <?php echo form_error('status', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> </div>
        </div>
        </div>
     </div>

     <div class="col-lg-6">
  <div class="form-group">
  <div class="col-lg-7">
          <label class="control-label">Last Name<span class="required">*</span></label>
              
             <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Last Name' ,'value' => set_value('last_name',$editdata['last_name'])]); ?> <?php echo form_error('last_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
              <label class="control-label">Password<span class="required">*</span></label>
              
             <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '4', 'placeholder' =>'Password' ,'value' => set_value('password')]); ?> <?php echo form_error('password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
   <label class="control-label">Address 1<span class="required">*</span></label>
              
             <?php echo form_input(['name' => 'address', 'id' => 'address', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '6', 'placeholder' =>'Address' ,'value' => set_value('address',$editdata['address'])]); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
  <label class="control-label">City<span class="required">*</span></label>
             
             <?php echo form_input(['name' => 'city', 'id' => 'city', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '8', 'placeholder' =>'City' ,'value' => set_value('city',$editdata['city'])]); ?> <?php echo form_error('city', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>

           <div class="form-group">
  <div class="col-lg-7">
              <label class="control-label">Phone<span class="required">*</span></label>
              
             <?php echo form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '11', 'placeholder' =>'Phone' ,'value' => set_value('phone',$editdata['phone'])]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
           <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Zip</label>
             <?php echo form_input(['name' => 'zip', 'id' => 'zip', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '12', 'placeholder' =>'Zip' ,'value' => set_value('zip',$editdata['zip'])]); ?> <?php echo form_error('zip', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>

       </div>
     <div class="clearfix"></div>
       <div class="col-md-offset-3 col-md-9">
                      <button type="button" onclick="tab_view('contact','seller/add','formContact')" class="btn green" name="seller_data">Submit</button>
                      <?php $admin_data=get_user_type();if($admin_data["role"]==1){ ?>
                      <a href="<?=site_url('seller');?>" class="btn default">Cancel</a>
                      <?php }?>
                    </div>
     </div>

     </form>


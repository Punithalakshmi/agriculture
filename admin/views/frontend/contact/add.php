                     
     <form class="form-horizontal" role="form" method="post" action="">
     <div id="profile"> </div>
     <div class="col-lg-12">
     <div class="col-lg-6">

      <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">First Name</label>
            <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '1', 'placeholder' =>'First Name' ,'value' => set_value('first_name',$editdata['first_name'])]); ?> <?php echo form_error('first_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
            
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">Email</label>
            <?php echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Email' ,'value' => set_value('email',$editdata['email'])]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">Confirm Password</label>
          <?php echo form_password(['name'=>'confirm_password', 'id'=>'confirm_password','placeholder' =>'Confirm Password','tabindex'=>'6', 'class'=>'form-control', 'maxlength'=>'232']); ?>
        <?php echo form_error('confirm_password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">Address 2</label>
            <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Address 2' ,'value' => set_value('address2',$editdata['address2'])]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">Country</label>
           <?php echo form_dropdown('country_id ', $country, set_value('country_id'), ['name' => 'country_id ', 'tabindex' => '2', 'id' => 'country_id', 'class' => 'form-control']); ?> <?php echo form_error('country_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
        </div>
        </div>
        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1">State</label>
            <?php echo form_dropdown('state_id ', $state, set_value('state_id'), ['name' => 'state_id', 'tabindex' => '2', 'id' => 'state_id', 'class' => 'form-control']); ?> <?php echo form_error('state_id ', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> 
        </div>
        </div>

        <div class="form-group">
      <div class="col-lg-7">
            <label for="exampleInputEmail1" class="col-lg-4 control-label text-semibold">Status</label>
            <div class="col-lg-7 radio">

                <label class="form-radio form-icon active form-text">

                    <input type="radio" checked="checked" name="status" value="Active">

                   Active</label>

                <label class="form-radio form-icon active form-text">

                    <input type="radio"   name="status" value="Suspended">

                    Suspended </label>

                <?php echo form_error('status', '<small class="help-block text-danger">&nbsp;', '</small>'); ?> </div>
        </div>
        </div>
     </div>

     <div class="col-lg-6">
  <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Last Name</label>
             <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Last Name' ,'value' => set_value('last_name',$editdata['last_name'])]); ?> <?php echo form_error('last_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Password</label>
             <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Password' ,'value' => set_value('password',$editdata['password'])]); ?> <?php echo form_error('password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Address 1</label>
             <?php echo form_input(['name' => 'address', 'id' => 'address', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Address' ,'value' => set_value('address',$editdata['address'])]); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
          <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">City</label>
             <?php echo form_input(['name' => 'city', 'id' => 'city', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'City' ,'value' => set_value('city',$editdata['city'])]); ?> <?php echo form_error('city', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>

           <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Phone</label>
             <?php echo form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Phone' ,'value' => set_value('phone',$editdata['phone'])]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>
           <div class="form-group">
  <div class="col-lg-7">
              <label for="exampleInputEmail1">Zip</label>
             <?php echo form_input(['name' => 'zip', 'id' => 'zip', 'class' => 'form-control', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Zip' ,'value' => set_value('zip',$editdata['zip'])]); ?> <?php echo form_error('zip', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          </div>
          </div>

       </div>
     <div class="clearfix"></div>
       <div class="col-md-offset-3 col-md-9">
                      <button type="submit" class="btn green" name="seller_data">Submit</button>
                      <a href="<?=site_url('seller');?>" class="btn default">Cancel</a>
                    </div>
     </div>
</form>


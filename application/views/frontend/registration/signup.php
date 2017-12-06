
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="#!" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="#!" class="breadcrumb">Login</a>
                      </div>
                  </div>
                </div>
            </nav>
            <!-- Content Area -->

            <div class="interior-wrap">
                <div class="interior-container">
                    <div class="container">    
                      <div class="row">
                          <div class="col s12 m8 offset-m2">
                            <div class="card login-wrapper hoverable">
                              <div class="card-content">
                              <?php echo form_open('registration/createnew_account/', 'class="form-horizontal form-padding" id="form_customer_add"'); ?>
                                <form method="post" action="" id="create_customer" accept-charset="UTF-8">
                                  <h4 class="center">Create Account</h4>
                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName"> First Name <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('first_name')]); ?> <?php echo form_error('first_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    <label for="LastName"> Last Name <span class="required">*</span></label>
                                   <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('last_name')]); ?> <?php echo form_error('last_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    <label for="Email"> Email <span class="required">*</span></label>
                                    <?php echo form_input(['name' => 'email', 'id' => 'email','maxlength' => '258', 'tabindex' => '3','value' => set_value('email')]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    <label for="CreatePassword"> Password <span class="required">*</span></label>
                                   <?php echo form_input(['name' => 'password', 'id' => 'password', 'maxlength' => '258', 'tabindex' => '4','value' => set_value('password')]); ?> <?php echo form_error('password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                   <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 1 <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'address', 'id' => 'address', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('address')]); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                   <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 2</label>

                                   <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'maxlength' => '258', 'tabindex' => '6','value' => set_value('')]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    

                                    <?php echo form_dropdown('country_id', get_country_all(), (set_value('country_id')) ? set_value('country_id') : 231,
                              ['name' => 'country_id', 'id' => 'country_id', 'tabindex' => '7']); ?> <?php echo form_error('country_id',
                                          '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">

                                    <?php echo form_dropdown('state_id', get_state_all(), set_value('state_id'), ['name'=>'state_id', 'id'=>'state_id', 'tabindex'=> '8']); ?>
                                <?php echo form_error('state_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>


                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName">City<span class="required">*</span></label>

                                    <?php echo form_input(['name' => 'city', 'id' => 'city', 'maxlength' => '258', 'tabindex' => '9','value' => set_value('city')]); ?> <?php echo form_error('city', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Phone <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'phone', 'id' => 'phone','maxlength' => '258', 'tabindex' => '10','value' => set_value('phone')]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 input-field">
                                    <label for="FirstName"> Zip<span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'zip', 'id' => 'zip','maxlength' => '258', 'tabindex' => '11','value' => set_value('zip')]); ?> <?php echo form_error('zip', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <p>
                                    <input type="submit" value="Create" class="btn-large z-depth-0">
                                  </p>
                                 <?php echo form_close(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

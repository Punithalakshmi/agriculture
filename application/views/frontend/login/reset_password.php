            <div class="interior-wrap">
                <div class="interior-container">
                    <div class="container">   
                    
                      <div class="row">

                          <div class="col s12 m8 offset-m2">
                            <?=display_flashmsg($this->session->flashdata());?>

                            <div class="card login-wrapper hoverable">
                              <div class="card-content">
                              <?php echo form_open('login/reset_password/'.$encrypted_email, 'class="form-horizontal form-padding" id="form_reset_password"'); ?>
                                <form method="post" action="" id="create_customer" accept-charset="UTF-8">
                                  <h5 class="center">Reset Password</h5>
                                  <div class="col s12 m12 input-field">
                                    <label for="FirstName"> Password <span class="required">*</span></label>

                                   <?php  echo form_password(['name'=>'password', 'id'=>'password', 'class'=>'form-control', 'maxlength'=>'50', 'value'=>set_value('password')]); 
                                  ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m12 input-field">
                                    <label for="FirstName"> Password <span class="required">*</span></label>

                                   <?php  echo form_password(['name'=>'confirm_password', 'id'=>'confirm_password', 'class'=>'form-control', 'maxlength'=>'50', 'value'=>set_value('confirm_password')]); 
                                  ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>
                                  <p>
                                    <input type="submit" value="Submit" class="btn-large z-depth-0">
                                  </p>
                                 <?php echo form_close(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="interior-wrap">
                <div class="interior-container">
                   <?php $this->load->view('_partials/business_ads');?>
                    <div class="container">   
                    
                      <div class="row">

                          <div class="col s12 m8 offset-m2">
                            <?=display_flashmsg($this->session->flashdata());?>

                            <div class="card login-wrapper hoverable">
                              <div class="card-content">
                              <?php echo form_open('login/forgot_password/', 'class="form-horizontal form-padding" id="form_customer_add"'); ?>
                                <form method="post" action="" id="create_customer" accept-charset="UTF-8">
                                  <h5 class="center">Forgot Password</h5>
                                  <div class="col s12 m12 input-field">
                                    <label for="FirstName"> Email <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'email', 'id' => 'email', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('email')]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
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

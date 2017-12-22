
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=site_url('home')?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=site_url('home/feedback')?>" class="breadcrumb">Feedback</a>
                      </div>
                  </div>
                </div>
            </nav>
            
            
            
            <!-- Content Area -->
            <div class="interior-wrap">
                <div class="interior-container">
                    <div class="container">
                        
                      
                        <div class="row">
                        
                            <div class="col s12 m8 offset-m3">

                            <div class="card login-wrapper hoverable">

                            <div class="card-content">

                              <div id="FeedbackForm">
                              <form class="login-form" method="POST" action="<?=site_url('home/feedback')?>" enctype="multipart/form-data">
                                  <h4 class="center">Feedback</h4>
                                  <?=display_flashmsg($this->session->flashdata());?>
                                  <div class="input-field">
                                   <label for="Name" class="">Name<span class="required">*</span></label>
                              <?php echo form_input(['name' => 'name', 'id' => 'name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('name')]); ?> <?php echo form_error('name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  
                                    <div class="file-field input-field">
                                  <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="image_name">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload photo"><?php echo form_error('image_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>
                                </div>

                                     <div class="input-field">
                                     <label for="Address" class="">Address<span class="required">*</span></label>
                                 <?php echo form_textarea(['name' => 'address', 'id' => 'address', 'class' => 'materialize-textarea', 'tabindex' => '6', 'value' => set_value('address'), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                    </div>

                                     

                                     <div class="input-field">
                                     <label for="Comments" class="">Comments<span class="required">*</span></label>

                         <?php echo form_textarea(['name' => 'comments', 'id' => 'comments', 'class' => 'materialize-textarea', 'tabindex' => '6', 'value' => set_value('comments'), 'rows' => 4, 'cols' => 8, 'tabindex' => '10']); ?> <?php echo form_error('comments', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                    </div>
                                  
                                    <input type="submit" class="btn-large z-depth-0" value="Submit">
                                  
                                   
                                  
                                </form>

                              </div>
                               
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                        
                    </div>
                </div>
            </div>


           


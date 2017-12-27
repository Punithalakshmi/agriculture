
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url()?>home" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url()?>login" class="breadcrumb">Login</a>
                      </div>
                  </div>
                </div>
            </nav>
            
            <!-- Content Area -->
           
                    <div class="container">
                        
                      
                        <div class="row">
                          
                            <div class="col s12 m6 offset-m3">

                            <div class="card login-wrapper hoverable">

                            <div class="card-content">

                              <div id="CustomerLoginForm">
                              <form class="login-form" method="POST">
                                  <h4 class="center">Login</h4>
                                  <?=display_flashmsg($this->session->flashdata());?>
                                  <div class="input-field">
                                    <label for="CustomerEmail"> Email </label>
                                    <input type="email" value="<?=set_value('email');?>" name="email" class="" spellcheck="false" autocomplete="off" autocapitalize="off" autofocus>
                                    <?=form_error('email');?>
                                  </div>

                                  
                                    <div class="input-field">
                                      <label for="CustomerPassword"> Password </label>
                                      <input type="password" name="password" id="password" class="">
                                      <?=form_error('password');?>
                                    </div>
                                  
                                    <input type="submit" class="btn-large z-depth-0" value="Sign In">
                                  
                                    <a href="<?=base_url();?>login/forgot_password" id="RecoverPassword">Forgot your password?</a>
                                  
                                </form>

                              </div>

                             
                               
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                        
                    </div>
              

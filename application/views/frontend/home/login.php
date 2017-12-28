
            <!-- breadcrumb -->
            <nav class="clearfix breadcrumb-wrapper">
                <div class="nav-wrapper green lighten-4 black-text">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>home" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>login" class="breadcrumb">Login</a>
                      </div>
                  </div>
                </div>
            </nav>

            <!-- Content Area -->
            <div class="interior-wrap">
                <div class="interior-container">
                    <div class="container">
                        <!-- <div class="row">
                            <div class="col l6 s12 test">
                              <form class="">
                                 
                                  
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <input id="password" type="password" class="validate">
                                      <label for="password">Password</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <input id="email" type="email" class="validate">
                                      <label for="email">Email</label>
                                    </div>
                                  </div>
                                </form>
                            </div>
                            <div class="col l6 s12 test">
                                <img src="" alt="">
                            </div>
                        </div> -->

                        <div class="row">
                              <?php $this->load->view('_partials/business_ads');?>

                            <div class="col s12 m6 offset-m3">
                            <div class="card login-wrapper hoverable">
                            <div class="card-content">
                              <div id="CustomerLoginForm">
                                <form method="post" action="/account/login" id="customer_login" accept-charset="UTF-8"><input type="hidden" value="customer_login" name="form_type" /><input type="hidden" name="utf8" value="✓" />
                                  <h4 class="center">Login</h4>

                                  

                                  <div class="input-field">
                                    <label for="CustomerEmail"> Email </label>
                                    <input type="email" name="customer[email]" id="CustomerEmail" class="" spellcheck="false" autocomplete="off" autocapitalize="off" autofocus>
                                  </div>

                                  
                                    <div class="input-field">
                                      <label for="CustomerPassword"> Password </label>
                                      <input type="password" name="customer[password]" id="CustomerPassword" class="">
                                    </div>
                                  
                                    <input type="submit" class="btn-large z-depth-0" value="Sign In">
                                  
                                    <a href="#recover" id="RecoverPassword">Forgot your password?</a>
                                  
                                </form>

                              </div>

                              <div id="RecoverPasswordForm" class="hide">
                                <h4 class="center">Reset your password</h4>
                                <p>We will send you an email to reset your password.</p>

                                <form method="post" action="/account/recover" accept-charset="UTF-8"><input type="hidden" value="recover_customer_password" name="form_type" /><input type="hidden" name="utf8" value="✓" />
                                  
                                  <div class="input-field">
                                    <label for="RecoverEmail"> Email </label>
                                    <input type="email" name="email" id="RecoverEmail" spellcheck="false" autocomplete="off" autocapitalize="off">
                                  </div>

                                  <input type="submit" class="btn-large z-depth-0" value="Submit">

                                  <a href="#" id="HideRecoverPasswordLink"> Cancel </a>
                                </form>

                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                        
                    </div>
                </div>
            </div>

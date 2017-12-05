
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aggricultural</title>
        <!-- Favicons-->
        <!-- <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32"> -->
        <!--  Android 5 Chrome Color-->
        <meta name="theme-color" content="#25a642">
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no"/>
        <!-- CSS-->
        <link href="assets/css/materialize.css" rel="stylesheet" media="screen,projection"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- <link href="assets/css/ghpages-materialize.css" rel="stylesheet" /> -->
        <link href="assets/css/_theme.css" rel="stylesheet" media="screen,projection"/>

        <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

        <!--  -->

    </head>

        <body>
            
            <nav class="white" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="#" class="brand-logo center">Logo</a>
                    <!-- <ul class="right hide-on-med-and-down">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">About Us </a></li>
                        <li><a href="#">Services </a></li>
                        <li><a href="#">Events </a></li>
                        <li><a href="#">Contact Us </a></li>
                        <li><a href="#">Register </a></li>
                        <li><a href="#">Login </a></li>
                    </ul>

                    <ul id="nav-mobile" class="side-nav">
                        <li><a href="#">Home </a></li>
                        <li><a href="#">About Us </a></li>
                        <li><a href="#">Services </a></li>
                        <li><a href="#">Events </a></li>
                        <li><a href="#">Contact Us </a></li>
                        <li><a href="#">Register </a></li>
                        <li><a href="#">Login </a></li>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a> -->
                </div>
            </nav>

            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green black-text">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?php echo base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?php echo site_url('home/login');?>" class="breadcrumb">Login</a>
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

            <footer class="page-footer">
                <div class="container">
                  <div class="row">
                    <div class="col l12 s12">
                        <ul class="social center">
                            <li><a href="#!"><img src="assets/images/facebook.png" alt=""></a></li>
                            <li><a href="#!"><img src="assets/images/twitter.png" alt=""></a></li>
                            <li><a href="#!"><img src="assets/images/google-plus.png" alt=""></a></li>
                            <li><a href="#!"><img src="assets/images/youtube.png" alt=""></a></li>
                            <li><a href="#!"><img src="assets/images/trivago.png" alt=""></a></li>
                        </ul>
                      <div class="center">
                          <img src="assets/images/footer-bg.png" class="responsive-img" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="footer-copyright">
                  <div class="container center">
                  &copy; 2017 Company Name. All rights Reserved. | <a class="brown-text text-lighten-3" href="#">Terms of Use</a> | <a class="brown-text text-lighten-3" href="#">Privacy Policy</a>
                  </div>
                </div>
            </footer>

    

            <!-- Footer Scripts -->
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
                if (!window.jQuery) { 
                    document.write('<script src="assets/js/lib/3.2.1/jquery-3.2.1.min.js"><\/script>'); 
                }
            </script>


            <script src="assets/js/jquery.matchHeight.js"></script>
            <script src="assets/js/materialize.min.js"></script>
            <script src="assets/js/slick.min.js"></script>
            <script src="assets/js/init.js"></script>
            <script> window.theme = { }; </script>
        </body>

    </html>

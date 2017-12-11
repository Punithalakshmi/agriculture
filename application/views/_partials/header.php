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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- <link href="assets/css/ghpages-materialize.css" rel="stylesheet" /> -->
        <!--  -->     
    </head>
        <body>
          <?php $user_data = get_user_type();
               
          ?>
            <nav class="white home-nav" role="navigation">
                <div class="nav-wrapper container">
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                      <li><a href="<?=base_url();?>services">Services</a></li>
                      <li><a href="#!">Properties</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">Finance &amp; Loans</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">Equipment</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">Weather</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">Forum</a></li>
                      <li class="divider"></li>
                      <li><a href="#!">Resources</a></li>
                    </ul>


                    <ul id="pUser" class="dropdown-content"> 
                      <li><a href="welcome.html"><i class="material-icons dp48 user-icon">account_circle</i>Welcome   <?=$user_data['first_name']?></a></li> 
                      <li><a href="<?=base_url();?>profile">Profile</a></li>
                      <li class="divider"></li> 
                      <li><a href="<?=base_url();?>login/logout">Log Out</a></li> 
                      <li class="divider"></li>
                    </ul>


                    <a id="logo-container" href="index.html" class="brand-logo">Logo</a>
                    <ul class="right hide-on-med-and-down desk-nav">
                        <li><a href="<?=base_url();?>">Home </a></li>
                        <li><a href="<?=base_url();?>home/about">About Us </a></li>
                        <li><a class="dropdown-button" href="<?=base_url();?>home/services" data-activates="dropdown1">Services <i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="<?=base_url();?>events">Events </a></li>
                        <li><a href="<?=base_url();?>home/contact">Contact Us </a></li>
                         <?php if(!is_logged_in()) { ?>
                        <li><a href="<?=base_url();?>registration">Register </a></li>
                        <li><a href="<?=base_url();?>login">Login </a></li>
                        <?php }else { ?>  
                        <li><a class="dropdown-button" href="welcome.html" data-activates="pUser"><i class="material-icons dp48 user-icon">account_circle</i>Welcome <?=$user_data['first_name']?> <i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php } ?>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
                         <li><a href="<?=base_url();?>">Home </a></li>
                        <li><a href="<?=base_url();?>home/about">About Us </a></li>
                        <li><a class="dropdown-button" href="<?=base_url();?>services" data-activates="dropdown2">Services <i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a href="<?=base_url();?>events">Events </a></li>
                        <li><a href="<?=base_url();?>home/contact">Contact Us </a></li>
                        <?php if(!is_logged_in()) { ?> 
                        <li><a href="<?=base_url();?>home/register">Register </a></li>
                        <li><a href="<?=base_url();?>home/login">Login </a></li>

                        <?php }else { ?>
                            <li><a href="">Profile </a></li>
                        <li><a href="">Logout</a></li>
                        <?php } ?>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                </div>
            </nav>

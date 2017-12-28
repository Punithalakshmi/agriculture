
    <head>   
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
      
          <?php $user_data = get_user_type();
             $category = categories1();  
             $uri = $this->uri->segment(1);
             $uri1 = $this->uri->segment(2); 
          ?>
            <nav class="white home-nav" role="navigation">
                <div class="nav-wrapper container">
                    <!-- Dropdown Structure -->
                    <ul id="dropdown1" class="dropdown-content">
                      <li><a href="<?=base_url();?>services">Services</a></li>
                      <?php foreach ($category as $key => $value): ?>
                      <li><a href="<?=site_url('services/show_search');?>/<?=$value["id"]?>"><?=$value["name"]?></a></li>
                      <li class="divider"></li>
                    <?php endforeach;?>
                    </ul>


                    <ul id="pUser" class="dropdown-content"> 
                      <li><a href="welcome.html"><i class="material-icons dp48 user-icon">account_circle</i>Welcome   <?=$user_data['first_name']?></a></li> 
                      <li><a href="<?=base_url();?>profile">Profile</a></li>
                      <li class="divider"></li> 
                      <li><a href="<?=base_url();?>login/logout">Log Out</a></li> 
                      <li class="divider"></li>
                    </ul>


                    <a id="logo-container" href="<?=base_url();?>home" class="brand-logo"><img class="activator" src="<?=base_url();?>assets/images/logo.png"></a>
                    <ul class="right hide-on-med-and-down desk-nav">
                        <li class="<?=($uri=='')?'active':'';?>"><a href="<?=base_url();?>">Home </a></li>
                        
                        <li class="<?=($uri1=='about')?'active':'';?>"><a href="<?=base_url();?>home/about">About Us </a></li>
                        <li class="<?=($uri=='services')?'active':'';?>"><a class="dropdown-button" href="<?=base_url();?>home/services" data-activates="dropdown1">Services <i class="material-icons right">arrow_drop_down</i></a></li>
                        
                        <li class="<?=($uri=='events')?'active':'';?>"><a href="<?=base_url();?>events">Events </a></li>
                        
                        <li class="<?=($uri1=='contact')?'active':'';?>"><a href="<?=base_url();?>home/contact">Contact Us </a></li>
                       
                         <?php if(!is_logged_in()) { ?>
                        <li class="<?=($uri=='registration')?'active':'';?>"><a href="<?=base_url();?>registration">Register </a></li>
                        <li class="<?=($uri=='login')?'active':'';?>"><a href="<?=base_url();?>login">Login </a></li>
                        <li class="<?=($uri1=='feedback')?'active':'';?>"><a href="<?=base_url();?>home/feedback">Feedback</a></li>
                        <?php }else { ?>  
                         <li class="<?=($uri1=='feedback')?'active':'';?>"><a href="<?=base_url();?>home/feedback">Feedback</a></li>
                        <li class="<?=($uri=='profile')?'active':'';?>"><a class="dropdown-button" href="welcome.html" data-activates="pUser"><i class="material-icons dp48 user-icon">account_circle</i>Welcome <?=$user_data['first_name']?> <i class="material-icons right">arrow_drop_down</i></a></li>
                        
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
                        <li class="<?=($uri1=='feedback')?'active':'';?>"><a href="<?=base_url();?>home/feedback">Feedback</a></li>

                        <?php }else { ?>
                             <li class="<?=($uri1=='feedback')?'active':'';?>"><a href="<?=base_url();?>home/feedback">Feedback</a></li>
                            <li><a href="">Profile </a></li>
                        <li><a href="">Logout</a></li>
                        
                        <?php } ?>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse">
                        <i class="material-icons">menu</i>
                    </a>
                </div>
            </nav>

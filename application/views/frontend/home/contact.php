
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=site_url('home')?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=site_url('home/contact')?>" class="breadcrumb">Contact Us</a>
                      </div>
                  </div>
                </div>
            </nav>
            
            
            <!--- map-->
            
            <div id="map" class="">
                    <img src="<?=base_url()?>assets/images/map.jpg" style="width:100%;">
            </div>

            <!-- Content Area -->
<div class="interior-wrap contact-wrap">
<div class="interior-container">
    <?php $this->load->view('_partials/business_ads');?>
<div class="container">

<div class="row contact c-info green darken-1">
        <div class="col s12 m8 e-height">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Send us a message
                    </span>
                <div class="">
                <div class="rte">
                </div>
                    <form method="post" action="<?=site_url('home/contact')?>" id="contact_form" class="contact-form" accept-charset="UTF-8"><input value="contact" name="form_type" type="hidden"><input name="utf8" value="✓" type="hidden">
                    <div class="input-field">
                    <label for="ContactFormName " class="">Name</label>
                       <?php echo form_input(['name' => 'contact_name', 'id' => 'first_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('contact_name')]); ?> <?php echo form_error('contact_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                    </div>
                    <div class="input-field">
                    <label for="ContactFormEmail" class="">Email</label>
                        <?php echo form_input(['name' => 'email', 'id' => 'email', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('email')]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                    </div>
                    
                    <div class="input-field">
                    <label for="ContactFormPhone">Phone Number</label>
                    <?php echo form_input(['name' => 'phone', 'id' => 'phone', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('phone')]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                    </div>
                    
                    <div class="input-field">
                    <label for="ContactFormMessage">Message</label>
                        <?php echo form_textarea(['name' => 'message', 'id' => 'message', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('message')]); ?> <?php echo form_error('message', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                    </div>
                    <input class="btn" value="Send" type="submit">
                    </form>
                <br>
                </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4 e-height">
            <div class="card green darken-1">
                <div class="card-content white-text">
                <span class="card-title">Contact Information
                    </span><br>
                
               
                
             <div class="address-group">  
             <div class="home-icon"><i class="material-icons dp48">home</i></div>
             <div class="address">  DieSachbearbeiter<br>
                Choriner Straße 49<br>
                10435 Berlin</p><br></div>
             </div>
                
                <p><i class="material-icons dp48 phone">local_phone</i>Phone: 900000000</p> <br>
               <p> <i class="material-icons dp48 mail">mail</i>E-Mail: moinsen@blindtextgenerator.com</p>
                <br></div>
                
                </div>
            </div>
            
            </div>
        </div>
</div>

<div class="row">


</div>
</div>
</div>
</div>


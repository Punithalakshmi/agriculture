  
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url()?>home" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url()?>registration" class="breadcrumb">Register</a>
                      </div>
                  </div>
                </div>
            </nav>
            <div class="interior-wrap contact-wrap">
               
                <div class="interior-container">
                
                    <div class="container">

                         <div class="row">
                            <div class="section col s12 m12 l12">
                              
                               <div class="section scrollspy" id="horizontal-stepper">
                                  <div class="row">
                                     <div class="col s12">
                                        <div class="card">

                                           <div class="card-content">
                                              
                                             
                                               <?php echo form_open('registration/createnew_account/', 'class="form-horizontal form-padding" id="form_customer_add"'); ?>

                                              <ul class="stepper horizontal" id="horizontal">

                                                 <li class="step active">
                                                    <div data-step-label="" class="step-title waves-effect waves-dark">Step 1</div>
                                                    <div class="step-content">
                                                       <div class="row">

                                    <div class="plans-container">

                                      <p class="text-center">
                                        <b>Choose Plan</b>

                                         <input name="plans" type="hidden"  class="validate" required />
                                      </p>
                                      <div class="clearfix"></div>
                                      
                                      <?php

                                          $color  = array("red","blue","purple" ,"cyan","green");
                                          $palncount = count($plandata);
                                          $width = "m12";
                                          if ($palncount % 2 == 0)
                                             $width = "m6";

                                        foreach($plandata as $key => $plans):
                                          $len = "m6";

                                          if($key==$palncount-1)
                                            $len = $width;
                                        ?>
                                        
                                      <div class="col s12 <?=$len;?>">
                                        <input name="plans" type="radio" id="test<?=$key+1;?>" class="validate" required value="<?=$plans['id']?>"/>
                                        <label for="test<?=$key+1;?>">
                                          <div class="card">
                                            <div class="card-image <?=$color[$key];?> waves-effect">

                                                <div class="card-title"><?=$plans['name']?></div>
                                                <div class="price"><sup>$</sup><?=$plans['amount']?>
                                                  <?php if($key!=0): ?>
                                                  <sub>/mo</sub>
                                                <?php endif;?>
                                                </div>
                                                <div class="price-desc"> <?=$plans['description']?></div>
                                            </div>
                                          </div>
                                        </label>
                                      </div>
                                    <?php endforeach;?>

                                    

                                      <div class="clearfix"></div>
                                    </div>

                                    
                                    <br/>
  
                                  </div>
                                                       <div class="step-actions">
                                                          <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                                                       </div>
                                                    </div>
                                                 </li>
                                                  

                                                 <li class="step">
                                                   <div class="">Step 2</div>
                                                    <div class="step-content">
                                                       <div class="row">
                                                          <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> First Name <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('first_name'),'class' => 'validate','required'=>'required']); ?> 
                                                        </div>
                                                        <div class="col s12 m6 input-field">
                                    <label for="LastName"> Last Name <span class="required">*</span></label>
                                   <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('last_name'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>

                                     <div class="col s12 m6 input-field">
                                                             <input name="email" type="email" class="validate" required>
                                                             <label for="email">Email</label>
                                                          </div>

                                   
                                  <div class="col s12 m6 input-field">
                                    <label for="CreatePassword"> Password <span class="required">*</span></label>
                                   <?php echo form_password(['name' => 'password', 'id' => 'password', 'maxlength' => '258', 'tabindex' => '4','value' => set_value('password'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>
                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 1 <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'address', 'id' => 'address', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('address'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>

                                   <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 2</label>

                                   <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'maxlength' => '258', 'tabindex' => '6','value' => set_value('')]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  
                                   <div class="col s12 m6">

                                        <?php echo form_dropdown('country_id', get_country_all(), (set_value('country_id')) ? set_value('country_id') : 231,
    ['id' => 'country_id', 'tabindex' => '7','class' => 'browser-default validate']); ?>
                                  </div>

                                  <div class="col s12 m6 ">

                                        <?php echo form_dropdown('state_id',  get_state_all(231),  (set_value('state_id')) ? set_value('state_id') : 3924,
    ['id' => 'state_id', 'tabindex' => '8','class' => 'browser-default validate']); ?>

                                   
                                                
                                  </div>

                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName">City<span class="required">*</span></label>

                                    <?php echo form_input(['name' => 'city', 'id' => 'city', 'maxlength' => '258', 'tabindex' => '9','value' => set_value('city'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>
                                      

                                      <div class="col s12 m6 input-field">
                                                             <input name="phone" type="number" pattern="\d{3}[\-]\d{3}[\-]\d{4}"  class= "validate" required>
                                                    <label for="phone">Phone</label>
                                        </div>

                                    

                                  <div class="col s12 input-field">
                                    <label for="FirstName"> Zip<span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'zip', 'id' => 'zip','maxlength' => '258', 'tabindex' => '11','value' => set_value('zip'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>
                                                       </div>
                                                       <div class="step-actions">

                                                         <button class="waves-effect waves-dark btn blue next-step" type="submit">CONTINUE</button>
                                                          
                                                          <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>

                                                          
                                                       </div>
                                                    </div>
                                                 </li>

                                                
                                          

                                                 <li class="step">
                                                    <div class="">Step 3</div>
                                                    <div class="step-content">
                                                      <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Business Name <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('company_name'),'class' => 'validate','required'=>'required']); ?>
                                                        </div>

                                                         <div class="col s12 m6 input-field">
                                                             <input name="website" type="url" class="validate" required>
                                                             <label for="website">Website</label>
                                                          </div>
  
                                                      

                                                        <div class="col s12 m6 input-field">
                                                         
                                                         <label for="icon_telephone">Work Experience<span class="required">*</span></label>
                                                  <?php echo form_input(['name' => 'experience', 'id' => 'experience', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('experience')]); ?> <?php echo form_error('experience', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                                        </div>
                                                        
                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Primary services <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'primary_service_category', 'id' => 'primary_service_category', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('primary_service_category'),'class' => 'validate','required'=>'required']); ?>
                                                        </div>


                                                        

                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName">  Types of Experience<span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'experience_type', 'id' => 'experience_type', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('experience_type'),'class' => 'validate','required'=>'required']); ?> 
                                                        </div>

                                                         <div class="col s12 m6 input-field">
                                                          
                                                         <label for="icon_prefix">QualifiCation</label>
                                              <?php echo form_input(['name' => 'qualification', 'id' => 'qualification', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('qualification')]); ?>  
                                                        </div>

                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Description <span class="required">*</span></label>
                                                          
                                                           <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'maxlength' => '258', 'tabindex' => '8','class' => 'materialize-textarea validate','value' => set_value('description')]); ?>  <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>

                                      
                                                        </div>

                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Other related services </label>

                                                           <?php echo form_textarea(['name' => 'other_related_category', 'id' => 'other_related_category', 'maxlength' => '258', 'tabindex' => '8','class' => 'materialize-textarea','value' => set_value('other_related_category')]); ?>  <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>

                                                
                                                        </div>

                                                       <div class="step-actions">
                                                          <button class="waves-effect waves-dark btn blue" type="submit">SUBMIT</button>
                                                       </div>
                                                    </div>
                                                 </li>
                                                <?php echo form_close() ?>
                                               
                                              </ul>
                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="toc-wrapper" style="top: 0px;"> </div>                           
                         </div>
                    </div>   
                </div>
            </div>

            <!-- Footer Scripts -->
           
            <script>
               function someFunction() {
                  setTimeout(function(){$('#feedbacker').nextStep();},1000);
               }

               function someOtherFunction() {
                   return true;
               }
               


            </script>



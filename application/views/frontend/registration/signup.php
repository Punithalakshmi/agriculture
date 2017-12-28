  
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
                                                    <div data-step-label="To step-title!" class="step-title waves-effect waves-dark">Step 1</div>
                                                    <div class="step-content">
                                                       <div class="row">

                                    <div class="plans-container">

                                      <p class="text-center">
                                        <b>Choose Plan</b>
                                         <input name="plans" type="hidden"  class="validate" required />
                                      </p>
                                      <div class="clearfix"></div>
                                      
                                      <div class="col s12 m6">
                                        <input name="plans" type="radio" id="test1" class="validate" required value="1"/>
                                        <label for="test1">
                                          <div class="card">
                                            <div class="card-image purple waves-effect">

                                                <div class="card-title">Free</div>
                                                <div class="price"><sup>$</sup>00<sub>/mo</sub></div>
                                                <div class="price-desc">Free 1 month</div>
                                            </div>
                                          </div>
                                        </label>
                                      </div>

                                      <div class="col s12 m6">
                                        <input name="plans" type="radio" id="test2" value="2"/>
                                        <label for="test2">
                                        <div class="card">
                                          <div class="card-image cyan waves-effect">
                                              <div class="card-title">Standard</div>
                                              <div class="price"><sup>$</sup>99<sub>/mo</sub></div>
                                              <div class="price-desc">Most Popular</div>
                                          </div>
                                        </div>
                                      </label>
                                      </div>

                                     <div class="col s12 m12">
                                        <input name="plans" type="radio" id="test3" value="3"/>
                                        <label for="test3">
                                        <div class="card">
                                          <div class="card-image green waves-effect">
                                              <div class="card-title">Pro</div>
                                              <div class="price"><sup>$</sup>1188<sub>/mo</sub></div>
                                              <div class="price-desc">Get 20% off</div>
                                          </div>
                                        </div>
                                         </label>
                                      </div>  <!---->
                                     

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
                                                    <div class="waves-dark">Step 2</div>
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
                                   <?php echo form_input(['name' => 'password', 'id' => 'password', 'maxlength' => '258', 'tabindex' => '4','value' => set_value('password'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>
                                  <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 1 <span class="required">*</span></label>

                                   <?php echo form_input(['name' => 'address', 'id' => 'address', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('address'),'class' => 'validate','required'=>'required']); ?> 
                                  </div>

                                   <div class="col s12 m6 input-field">
                                    <label for="FirstName"> Address 2</label>

                                   <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'maxlength' => '258', 'tabindex' => '6','value' => set_value('')]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  
                                   <div class="col s12 m6 input-field">

                                    <?php echo form_dropdown('country_id', get_country_all(), (set_value('country_id')) ? set_value('country_id') : 231,
                              ['name' => 'country_id', 'id' => 'country_id', 'tabindex' => '7']); ?> <?php echo form_error('country_id',
                                          '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
                                  </div>

                                  <div class="col s12 m6 input-field">

                                    <?php echo form_dropdown('state_id', get_state_all(), set_value('state_id'), ['name'=>'state_id', 'id'=>'state_id', 'tabindex'=> '8']); ?>
                                <?php echo form_error('state_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
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
                                                    <div class="waves-dark">Step 3</div>
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
                                                          <label for="FirstName"> Description <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'description', 'id' => 'description', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('description'),'class' => 'validate','required'=>'required']); ?> 
                                                        </div>

                                                        <div class="col s12 m6 input-field">
                                                         
                                                         <?php echo form_dropdown('experience_id', get_experience_all(), ['name' => 'experience_id', 'tabindex' => '3', 'id' => 'experience_id']); ?>
                                                        </div>
                                                        
                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Primary service category <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'primary_service_category', 'id' => 'primary_service_category', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('primary_service_category'),'class' => 'validate','required'=>'required']); ?>
                                                        </div>
                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Other related category <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'other_related_category', 'id' => 'other_related_category', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('other_related_category'),'class' => 'validate','required'=>'required']); ?> 
                                                        </div>

                                                        <div class="col s12 m6 input-field">
                                                          <label for="FirstName"> Experience Type <span class="required">*</span></label>

                                                         <?php echo form_input(['name' => 'experience_type', 'id' => 'experience_type', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('experience_type'),'class' => 'validate','required'=>'required']); ?> 
                                                        </div>

                                                         <div class="col s12 m6 input-field">
                                                          
                                                         <?php echo form_dropdown('qualification_id', get_qualification_all(), ['name' => 'qualification_id', 'tabindex' => '7', 'id' => 'experience_id']); ?> 
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



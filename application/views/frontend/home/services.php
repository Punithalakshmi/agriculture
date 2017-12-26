            <?php //$this->session->unset_userdata('var_search_term');?>
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>services" class="breadcrumb">Services</a>
                      </div>
                  </div>
                </div>
            </nav>
            <!-- Content Area -->
            <div class="interior-wrap inner-page-search">
                <div class="interior-container">
                <?php if(isset($_SESSION["var_search_term"]) && !empty($_SESSION["var_search_term"]))
                {  
                    $category = $_SESSION["var_search_term"]["category"]?$_SESSION["var_search_term"]["category"]:''; 
                }
                else
                {
                  $category ='';
                }

                ?>
                  <!-- Product Filter -->
                    <div class="filter-search teal lighten-5 cf">
                        <div class="container">
                            <form class="col s12 white filter-sec" id="search_form"  action="<?=site_url('services/show_search');?>" method="post" >
                                <div class="row">
                                    <div class="col m3 s12">
                                        <div class="input-field col s12">
                                        <?php echo form_dropdown(array('name' => 'category', 'id' => 'category','class'=>'categories'), array('' => 'Select Category')+categories(), set_value('category', $category));?>
                                        <!--<label><b>Filter Option</b></label>-->
                                      </div>
                                    </div>
                                    
                                    <div class="col m9 s12">
                                        <div class="search-container">
                        <div class="row center home-search">
                            
                                <div class="col l6 s12">
                                  <input name="location" id="location" onfocus="if(this.value == 'Enter Location') { this.value = ''; }" value="" placeholder="Enter Location" aria-label="Search through site content" type="search">
                                </div>

                                <div class="col l6 s12">
                                  <input name="keyword" id="keyword" onfocus="if(this.value == 'Enter Keyword') { this.value = ''; }" value="" placeholder="Enter Keyword" type="search">
                                </div>

                                <!-- <div class=" col l3 s12">
                                    <input type="submit" class="btn-large waves-effect waves-light lgreen lighten-1" value="Search">
                                </div> -->
                           
                        </div>
                    <!-- <br><br> -->

                    </div>
                                        
                                    </div>

                                </div>
                                <div class="row center">
                            <!-- <input type="submit" class="btn-large waves-effect waves-light lgreen lighten-1 search-btn" value="Search"> -->

                            <button id="btns" class="btn-large waves-effect waves-light lgreen lighten-1 search-btn">Search</button>
                            <a href="<?=site_url('services/clear_records')?>" class="btn-large waves-effect waves-light red lighten-1 search-btn">Clear</a>
                        </div>
                            </form>
                        </div>
                    </div>
                    <?php $ads_image = get_business('Horizontal'); 
                       if($ads_image):?> 
                      <div class="add__vertical text-center" id="add__vertical">
                        
                        <ul>
                          <span id="closeadvt3" style="cursor:pointer;">X</span>
                          <?php foreach($ads_image as $images): ?>
                          <li>
                            <a href="#">
                               <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="720" height="90" alt="" "> </a>
                          </li>
                          <?php endforeach;?>
                        </ul>
                      </div>
                    </div>
                    <?php endif;?>
                    <div class="container">
                        <div class="row center">
                          <h1 class="page-title">Explore The Worldwide <span>Farmers</span></h1>
                        </div>
                        <div class="row farmers-list">                       
                            <!-- Single loop -->
                          <?php if($editdata){?>  
                               <?php  foreach($editdata as $services):?>
                              <div class="col l4 m6 s12">
                                <div class="card sticky-action hoverable" style="overflow: visible;">
                                  <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="262" width="300" src="<?=base_url();?>assets/images/products/<?=$services["image_name"]?>">
                                  </div>
                                  <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?=$services["title"];?></span>

                                    <p> <small>by Ashiana Housing</small> <br /><?=$services["address"];?></p>
                                  </div>

                                  <div class="card-action right-align">
                                    <a href="<?=base_url()?>services/details/<?=$services["id"];?>">More Details </a>
                                  </div>

                                  <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                    <span class="card-title grey-text text-darken-4"><?=$services["title"]?><i class="material-icons right">close</i></span>
                                    <p><?=$services["description"];?></p>
                                  </div>
                                </div>
                              </div>
                            <?php endforeach;?>
                            <?php 
                            }
                            else
                            {
                                echo "<h1 style='text-align:center;'>No Records Found.</h1>";
                            }
                            ?>
                        </div>
                        <!-- pagination -->
                        <div class="row center">
                         <ul class="pagination">
                           <li class="waves-effect"><a href="#!"><?=$links;?></a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>

            
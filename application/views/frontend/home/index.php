    

            <div id="index-banner" class="parallax-container">

                <div class="section no-pad-bot">

                    <h1 class="header center">Explore Farmers</h1>

                    <div class="search-container">

                    

                        <div class="row center home-search">

                            <form id="form_search" class="col s12" action="<?=site_url('services/show_search');?>" method="post">

                                <div class="col l6 s12">

                                  <input name="location" id="location"  onfocus="if(this.value == 'Enter Location') { this.value = ''; }"  value="<?php echo set_value('location',"Califoria"); ?>" placeholder="Enter Location" aria-label="Search through site content" type="search">

                                </div>
                                


                                <div class="col l6 s12">

                                  <input name="keyword" id="keyword" onfocus="if(this.value == 'Enter Keyword') { this.value = ''; }" value="" placeholder="Enter Keyword" type="search">

                                </div>



                                <!-- <div class=" col l3 s12">

                                    <input type="submit" class="btn-large waves-effect waves-light lgreen lighten-1" value="Search">

                                </div> -->

                           

                        </div>



                        <div class="row center">

                            <!-- <input type="submit" class="btn-large waves-effect waves-light lgreen lighten-1 search-btn" value="Search"> -->



                            <button class="btn-large waves-effect waves-light lgreen lighten-1 search-btn">Search</button>

                        </div>

                           </form>



                    </div>

                </div>
                <?php 

                $ag_photos = get_ag_photos();
              
                if($ag_photos):?>
               <?php foreach($ag_photos as $images): ?>
                <div class="parallax">

                    <img src="<?=base_url()?>admin/uploads/agr_photos/<?=$images["image_name"];?>" alt="Unsplashed background img 1">

                </div>
              <?php endforeach;?>

              <?php endif;?>
            </div>



            <!-- add vertical -->

            <?php $ads_image = get_business('Horizontal'); 
                if($ads_image):?> 
                <div class="add__vertical text-center" id="add__vertical">
                        
                <ul>
                    <span id="closeadvt3" style="cursor:pointer;">X</span>
                    <?php foreach($ads_image as $images): ?>
                    <li>
                    <a href="#">
                        <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="720" height="90" alt="" > </a>
                    </li>
                    <?php endforeach;?>
                </ul>
                </div>
            </div>
            <?php endif;?>

            <div class="farmers-list">

                <h1 class="center">Explore The Worldwide <span>Farmers</span></h1>



                <div class="row">



                    <div class="container">

                        <div class="slider multiple-items">



                          <!-- Single Slide -->

                          <?php  foreach($editdata as $services):?>

                              <div class="col l4 m6 s12">

                                <div class="card sticky-action hoverable" style="overflow: visible;">

                                  <div class="card-image waves-effect waves-block waves-light">

                                    <img class="activator" height="262" width="300" src="<?=base_url();?>admin/uploads/services/<?=!empty($services['image_name'])?$services['image_name']:'dummy_img.jpg' ?>">

                                  </div>

                                  <div class="card-content">

                                    <span class="card-title activator grey-text text-darken-4"><?=$services["title"];?></span>



                                    <p> <small>by Ashiana Housing</small> <br /><?=$services["address"];?></p>

                                  </div>



                                  <div class="card-action right-align">

                                    <a href="<?=base_url()?>services/details/<?=$services['id']?>">More Details </a>

                                  </div>



                                  <div class="card-reveal" style="display: none; transform: translateY(0px);">

                                    <span class="card-title grey-text text-darken-4"><?=$services["title"]?><i class="material-icons right">close</i></span>

                                    <p><?=$services["description"];?></p>

                                  </div>

                                </div>

                              </div>

                            <?php endforeach;?>

                        </div>

                    </div>

                </div>



                <script>



                </script>



                <div class="row center">

                  <a href="<?=site_url('services')?>" id="" class="btn-large waves-effect waves-light teal lighten-1 no-caps">

                    More Farmers</a>

                </div>

            </div>



            <div class="about-wrap">

                <div class="container">

                    <div class="row">

                        <div class="col m6 s12">

                            <h2 class="custom-title"> About <span>Agriculture</span> </h2>



                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine.</p>



                            <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet I feel that I never was a greater artist than now.</p>





                            <div class="row center">

                              <a href="<?=site_url('home/about')?>" id="" class="btn-large waves-effect waves-light teal lighten-1 no-caps">

                                More About</a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            <!--  Feed Wrap -->

            <div class="feed-wrap">

                <div class="row">

                    <div class="col m6 s12 feed-tweets feed-e-height"> 

                        <h2 class="center custom-title"> Twitter <span>Feeds</span> </h2>

                        <p class="center">

                            Lorem ipsum avatar  THREE Territory Manager positions available with @Agriculture in Florida, the Northeast and North Central (…

                        </p>



                        <p class="center">

                            <a href="#">https://t.co/ReQXRa1rnW</a>

                        </p>

    

                    </div>

                    <div class="col m6 s12 feed-clients feed-e-height">

                        <h2 class="center custom-title"> Clients <span>Feeds</span> </h2>

                        <!--  -->
                        <div class="carousel carousel-feeds carousel-slider center" data-indicators="true">

                         <?php foreach($feedback as $feedbacks):?>
                          <div class="carousel-item black-text" href="#one!">
                            <div class="feed-text"><?=$feedbacks['comments'];?></div>
                            <ul class="feed-avatar">
                              <li>
                                <span class="title"><?=$feedbacks['name']?></span>
                                <p> <?=$feedbacks["address"]?> </p>
                              </li>
                            </ul>
                          </div>
                           <?php endforeach;?>

                         

                          <!-- <div class="carousel-item black-text" href="#three!">
                            <div class="feed-text">Quasi, pariatur! Voluptates quasi necessitatibus, aliquam fugiat culpa, veniam quae, nobis soluta corporis rerum quas</div>
                            <ul class="feed-avatar">
                              <li>
                                <span class="title">Rachel Vasquez</span>
                                <p> France </p>
                              </li>
                            </ul>
                          </div> -->
                          <!--<div class="carousel-item black-text" href="#four!">
                            <div class="feed-text">Dolore nemo voluptatibus, minima quisquam. Consequuntur libero nobis, voluptas quia sapiente nostrum ab suscipit necessitatibus unde quas quo</div>
                            <ul class="feed-avatar">
                              <li>
                                <span class="title">Rachel Vasquez</span>
                                <p> France </p>
                              </li>
                            </ul>
                          </div> -->
                        </div>
                        <!--  -->




            
                   <?php //if($feedback) {?>
                      
                      
                         <!-- <div class="carousel carousel-slider center" data-indicators="true"> -->

                      <?php  //foreach($feedback as $feedbacks):?>
                        <!-- <div>
                          <a class="waves-effect white grey-text darken-text-2"></a>
                        </div>
                        <div class="carousel-item white-bg block-text" href="#one!">
                          <h2><?=$feedbacks['name']?></h2>
                          <p class="block-text"><?=$feedbacks["address"]?></p>
                        </div> -->
                        
                         <?php //endforeach;?>

                          <?php 

                            //}else{

                               // echo "<h1 style='text-align:center;'>No Records Found.</h1>";

                           // }

                            ?>
                      <!-- </div> -->
                    

                    </div>

                </div>

            </div>



            <!-- Subscription Plan -->



            <div class="subscriptionplan">

                <div class="container">



                    <div class="row">

                        <h2 class="custom-title"> Subscription <span>Plan</span> </h2>

                    </div>

                    <div class="row">
                     
                      <?php  foreach($plandata as $plans):?>
                       <div class="col m4 s12">

                            <div class="card-panel hoverable center">

                                <h3><?=$plans['name']?></h3>

                                <span class="description-text">

                                      <?=$plans['description']?> 

                                </span>

                                <h4>$<?=$plans['amount']?></h4>

                                <!--<span class="days">30 Days</span> -->

                                <div class="center">

                                    <a href="<?=site_url('registration')?>" class="btn-large waves-effect waves-light white lighten-1 no-caps z-depth-4">Subscribe</a>                                

                                </div>

                            </div>
                          
                        </div>
                       <?php endforeach;?>
                        


                    </div>

                </div>

            </div>



           <div class="top-footer">

                <div class="row">

                  <div class="col m6 s12 whats-new-wrap feed-e-height">

                      <h3 class="custom-title no-decoration whats-new-icon">What’s <span>New</span></h3>

                     

                      <ul>

                        

                      <?php if($newsdata) { ?>

                       <?php  foreach($newsdata as $news):?>

                          <li class="hoverable">

                           

                            <a href="<?=base_url()?>news/details/<?=$news['id'];?>"><?=$news['title']?></a>

                            <p><?=date("l, F j, Y", strtotime($news['created_on']))?></p>

                            



                        <?php endforeach;?>

                          <?php 

                            }

                            else

                            {

                                echo "<h1 style='text-align:center;'>No Records Found.</h1>";

                            }

                            ?>

                        </li>

                          <div class="row right" style="margin-top: 15px;">

                          <a href="<?=site_url('news/view')?>" id="" class="btn-large waves-effect waves-light teal lighten-1 no-caps">

                            More News</a>

                        </div>

                      </ul>

                      

                  </div>

                  <div class="col m6 s12 events-wrap feed-e-height">

                      <h3 class="custom-title no-decoration events-icon"><span>Events</span></h3>

                    <ul>
                      <?php if($eventdata) { ?>

                       <?php  foreach($eventdata as $events):?>

                          <li class="hoverable">

                           

                            <a href="<?=base_url()?>events/details/<?=$events['id'];?>"><?=$events['title']?></a>

                            <p><?=date("l, F j, Y", strtotime($events['from_date']))?></p>

                        <?php endforeach;?>

                          <?php 

                            }

                            else

                            {

                                echo "<h1 style='text-align:center;'>No Records Found.</h1>";

                            }

                            ?>

                        </li>

                          <div class="row right" style="margin-top: 15px;">

                          <a href="<?=site_url('events/view')?>" id="" class="btn-large waves-effect waves-light teal lighten-1 no-caps">

                            More Events</a>

                        </div>

                      </ul>

                  </div>  

                </div>

            </div>
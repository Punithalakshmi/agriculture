                    <nav class="clearfix breadcrumb-wrapper">
                        <div class="nav-wrapper green">
                          <div class="container">
                            <div class="col s12">      
                              <a href="<?=base_url();?>home" class="breadcrumb"><i class="material-icons">home</i></a>
                              <a href="<?=base_url();?>events" class="breadcrumb">Events</a>
                              </div>
                          </div>
                        </div>
                    </nav>
                    
                    <div class="container">



                        <div class="row center">

                          

                          <h1 class="page-title">Events</h1>

                        </div>

                    

                        <div class="row farmers-list-list">  


                    <div class="input-field">
                    <form action="<?=site_url('events');?>" method="POST">
                  <?php   
                        $options = array(
                         ''             => 'Sort by',
                        'today'         => 'Today',
                        'tomorrow'      => 'Tomorrow',
                        'thisweek'      => 'This Week',
                        'nextweek'      => 'Next Week',
                        'thismonth'     => 'This Month',
                        'thisyear'      => 'This Year',
                        'allevents'     => 'All Events'
                        ); ?>

                    <?php echo form_dropdown('filter_by', $options, set_value('filter_by'),['onchange'=>'this.form.submit()']); ?>
                    </form>
                    </div>                      

                            <!-- Single loop -->

                          <?php if($events){?>  



                               <?php  foreach($events as $value):?>

                                 

                              <div class="col l4 m6 s12">

                                <div class="card sticky-action hoverable" style="overflow: visible;">

                                  <div class="card-image waves-effect waves-block waves-light">

                                    <img class="activator" height="262" width="300" src="<?=base_url();?>assets/img/events/<?=!empty($value->event_image)?$value->event_image:'dummy_img.jpg'?>">

                                  </div>

                                  <div class="card-content">

                                    <span class="card-title activator grey-text text-darken-4"><?=$value->title;?></span>

                                    <p> <small><i class="material-icons">location_on</i><span><?=$value->location;?></small> <br /><i class="material-icons">event</i><span><?=date("l, M j", strtotime($value->from_date));?>, <?=date('h:i A',strtotime($value->start_time)) ?> -- <?=date("l, M j", strtotime($value->to_date));?>, <?=date('h:i A',strtotime($value->end_time)) ?></p>

                                  </div>

                                  

                                 

                                  <div class="card-action right-align">

                                    <a href="<?=base_url()?>events/details/<?=$value->id;?>">More Details </a>

                                  </div>

                                  

                                  <div class="card-reveal" style="display: none; transform: translateY(0px);">

                                    <span class="card-title grey-text text-darken-4"><?=$value->title ?><i class="material-icons right">close</i></span>

                                    <p><?=$value->description;?></p>

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
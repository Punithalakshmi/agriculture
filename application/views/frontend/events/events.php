<div class="container">

                        <div class="row center">
                          <h1 class="page-title">Events</h1>
                        </div>
                        <div class="row farmers-list">                       
                            <!-- Single loop -->
                          <?php if($events){?>  

                               <?php  foreach($events as $value):?>
                               
                              <div class="col l4 m6 s12">
                                <div class="card sticky-action hoverable" style="overflow: visible;">
                                  <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="262" width="300" src="<?=base_url();?>assets/img/events/<?=$value->event_image?>">
                                  </div>
                                  
                                  <div class="card-content">

                                    <a href="<?=base_url()?>events/details/<?=$value->id;?>"><?=$value->title;?> </a>
                                    <br/>

                                   <i class="material-icons">event</i><span><?=date("l, M j", strtotime($value->from_date));?></span>
                                   <br/>
                                   <i class="material-icons">location_on</i><span><?=$value->location;?></span>
                                    <p> <?=$value->description;?></p>
                                  </div>

                                  <div class="card-action right-align">
                                    <a href="<?=base_url()?>events/details/<?=$value->id;?>">More Details </a>
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
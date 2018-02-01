



  <!-- breadcrumb -->







            <nav>







                <div class="nav-wrapper green">







                  <div class="container">







                      <div class="col s12">







                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>







                        <a href="<?=base_url();?>events" class="breadcrumb">Events</a>







                        <a href="#!" class="breadcrumb">Events</a>







                      </div>







                  </div>







                </div>







            </nav>







             <div class="interior-wrap contact-wrap">







                <div class="interior-container">







                    <div class="container">







                      <div class="row">



                        <?php if($eventsdata) { ?>







                        <?php  foreach($eventsdata as $event):?>





                        

                        <!--  Style Start -->



                        <div class="media hoverable"> 



                            <a class="media-left" href="">



                              <i class="material-icons dp48" style=" font-size: 64px; ">date_range</i>



                            </a> 



                                



                            <div class="media-body">



                                <h4>



                                  <a href="<?=base_url()?>events/details/<?=$event->id;?>"><?=$event->title?></a>



                                </h4>



                                <div class="entry-meta">



                                    <ul class="list-inline">



                                        <li>



                                            <!-- <a class="url fn n" href="#">materialize</a> -->



                                            <?=date("l", strtotime($event->from_date))?>



                                        </li>







                                        <li><?=date("j M", strtotime($event->from_date))?></li>



                                    </ul>



                                </div>



                          </div> <!-- /.media-body -->



                        </div> <!-- /.media -->



                        <!-- Style End -->







                        <?php endforeach;?>







                          <?php  } else { echo "<h1 style='text-align:center;'>No Records Found.</h1>"; } ?>

                    

                       <div class="row center">



                         <ul class="pagination">



                           <li class="waves-effect"><a href="#!"><?=$links;?></a></li>



                          </ul>



                        </div>





                      </div>







                    </div>







                  </div>







                </div>



            <!--- map-->



            <!-- Content Area -->
















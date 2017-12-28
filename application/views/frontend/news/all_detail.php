
  <!-- breadcrumb -->
             <nav class="clearfix breadcrumb-wrapper">
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">      
                      <a href="<?=base_url();?>home" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>news/view" class="breadcrumb">News</a>
                      </div>
                  </div>
                </div>
            </nav>
             <div class="interior-wrap contact-wrap">



                <div class="interior-container">



                    <div class="container">



                      <div class="row">

                        <?php if($newsdata) { ?>



                        <?php  foreach($newsdata as $news):?>



                        <!--  Style Start -->

                        <div class="media hoverable"> 

                            <a class="media-left" href="">

                              <i class="material-icons dp48" style=" font-size: 64px; ">date_range</i>

                            </a> 

                                

                            <div class="media-body">

                                <h4>

                                  <a href="<?=base_url()?>news/details/<?=$news['id'];?>"><?=$news['title']?></a>

                                </h4>

                                <div class="entry-meta">

                                    <ul class="list-inline">

                                        <li>

                                            <!-- <a class="url fn n" href="#">materialize</a> -->

                                            <?=date("l", strtotime($news['created_on']))?>

                                        </li>



                                        <li><?=date("j M", strtotime($news['created_on']))?></li>

                                    </ul>

                                </div>

                          </div> <!-- /.media-body -->

                        </div> <!-- /.media -->

                        <!-- Style End -->



                        <?php endforeach;?>



                          <?php  } else { echo "<h1 style='text-align:center;'>No Records Found.</h1>"; } ?>



                      </div>



                    </div>



                  </div>



                </div>

            <!--- map-->

            <!-- Content Area -->










  <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>events" class="breadcrumb">News</a>
                        <a href="#!" class="breadcrumb">News</a>
                      </div>
                  </div>
                </div>
            </nav>


             <div class="interior-wrap contact-wrap">
                <div class="interior-container">
                    <div class="container">
                      <div class="row center">
                      
                      </div>
                      <div class="row">

                        <ul>
                        <?php if($newsdata) { ?>
                       <?php  foreach($newsdata as $news):?>

                         <li><i class="material-icons">chevron_right</i><a href="<?=base_url()?>news/details/<?=$news['id'];?>"><?=$news['title']?></a>
                       <li><?=date("l, F j, Y", strtotime($news['created_on']))?>
                           
                        <?php endforeach;?>
                          <?php 
                            }
                            else
                            {
                                echo "<h1 style='text-align:center;'>No Records Found.</h1>";
                            }
                            ?>
                        </li>
                       </li>
                      </ul>
                        
                      </div>

                  
                    </div>
                  </div>
                </div>

          
            <!--- map-->
            
            <!-- Content Area -->


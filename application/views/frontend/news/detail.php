

  <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>events" class="breadcrumb">News</a>
                        <a href="#!" class="breadcrumb">Page Title</a>
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
                        <div class="row card hoverable detail-page">
                          <div class="col m6">
                            <div class="img-box">
                              <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" height="262" width="300" src="<?=base_url();?>admin/uploads/news/<?=$newsdata['image_name'];?>">
                                
                              </div>
                            </div>
                          </div>
                          <div class="col m6">
                            <div class="event-detail-box">
                                <div class="event-detail-list">
                                  <p class="collection-item">
                                      <?=date("l, F j, Y", strtotime($newsdata['created_on']))?>
                                  </p>
                                  <span>Author&nbsp : &nbsp<?=$newsdata['author']?></span>
                                 
                                </div>
           
  
                            </div>
                          </div>
                        </div>
                      </div>

                     

                      <div class="row">
                        <div class="col m12">
                          <h4><?=$newsdata['title']?></h4>
                          <p><?=$newsdata['description'];?></p>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>

          
            <!--- map-->
            
            <!-- Content Area -->


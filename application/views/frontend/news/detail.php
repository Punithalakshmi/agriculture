
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



                      <div class="row center">



                      </div>



                      <div class="row card hoverable">

                        <div class="event-datail">

                          <div class="col m3">

                            <div class="card-image waves-effect waves-block waves-light">

                                <img class="activator" height="262" width="300" src="<?=base_url();?>admin/uploads/news/<?=$newsdata['image_name'];?>">

                              </div>

                          </div>

                          <div class="col m9">



                            <h4><?=$newsdata['title']?></h4>

                            

                            <span class="detail-information"><?=date("l, F j, Y", strtotime($newsdata['created_on']))?> Author&nbsp; : &nbsp;<?=$newsdata['author']?></span>



                          <p><?=$newsdata['description'];?></p>

                          </div>

                        </div>

                      </div>



                      <div class="row">



                        <div class="row card hoverable detail-page">



                          <div class="col m6">



                            <div class="img-box">



                              



                            </div>



                          </div>



                        </div>



                      </div>



                    </div>



                  </div>



                </div>



            <!--- map-->



            <!-- Content Area -->








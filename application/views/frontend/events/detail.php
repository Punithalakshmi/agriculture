  <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>events" class="breadcrumb">Events</a>
                        <a href="#!" class="breadcrumb">Page Title</a>
                      </div>
                  </div>
                </div>
            </nav>


             <div class="interior-wrap contact-wrap">
                <div class="interior-container">
                    <div class="container">
                      <div class="row center">
                      <h4 class="page-title"><?=$events['title'];?></h4>
                      </div>
                      <div class="row">
                        <div class="row card hoverable detail-page">
                          <div class="col m6">
                            <div class="img-box">
                              <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" height="262" width="300" src="<?=base_url();?>assets/img/events/<?=$events['event_image'];?>">
                                
                              </div>
                            </div>
                          </div>
                          <div class="col m6">
                            <div class="event-detail-box">
                                <div class="event-detail-list">
                                  <p class="collection-item">
                                      <i class="material-icons dp48">location_on</i> <?=$events['location'];?>
                                  </p>

                                  <hr>
                                  <?php 

                                          $from_date = date('Ymd', strtotime(str_replace('-', '/', $events['from_date'])));
                                          
                                           $to_date = date('Ymd', strtotime(str_replace('-', '/', $events['to_date'])));
                                    ?>

                                  <p class="collection-item">
                                      <i class="material-icons dp48">today</i> <b>From</b>: Saturday, Nov 18, 10:00 am <br /><b>To</b>: Sunday, Dec 17, 7:00 pm <br />

                                      <a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?=urlencode($events['title'])?>&dates=<?=$from_date;?>/<?=$to_date;?>&details=<?=urlencode($events['description'])?>&location=<?=$events['location']?>&sf=true&output=xml" target="_blank">Add to calendar</a>

                                      
                                  </p>
                                  
                                  
                                </div>
           
  
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row card hoverable">
                        <div class="map-wrapper">
                          <div id="googleMap" style="width:100%;height:400px;"></div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col m12">
                          <h4><?=$events['title']?></h4>
                          <p><?=$events['description'];?></p>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>

          
            <!--- map-->
            
            <!-- Content Area -->

<script>
function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>


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
                                      <i class="material-icons dp48">today</i> <b>From</b>: <?=date("l, M j", strtotime($events['from_date']))?>, <?=date('h:i A',strtotime($events['start_time'])) ?><br /><b>To</b>:  <?=date("l, M j", strtotime($events['to_date']))?>, <?=date('h:i A',strtotime($events['end_time'])) ?> <br />

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

<script type="text/javascript">

   function init_map() {

            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng( <?=$lati;?>, <?php echo $longi; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $lati; ?>, <?php echo $longi; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }

        google.maps.event.addDomListener(window, 'load', init_map);


 </script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDM0nAZg20zzOQd45MF2qXe_H0j0QRWMlE&callback=init_map"></script>
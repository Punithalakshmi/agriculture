<!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="<?=base_url();?>" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="<?=base_url();?>services" class="breadcrumb">Services</a>
                        <a href="#!" class="breadcrumb">Page Title</a>
                      </div>
                  </div>
                </div>
            </nav>
            
            
            <!--- map-->
            
            

            <!-- Content Area -->

            <div class="interior-wrap contact-wrap">
                <div class="interior-container">
                
                    <div class="container">
                        <div class="row center">
                          <h1 class="page-title"><?=$service_row['title']; ?></span></h1>
                        </div>

                        <div class="row card hoverable detail-page">
                            <div class="col m6">

                                <div class="card" style="overflow: visible;">
                                  <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="403" width="461" src="<?=base_url();?>assets/images/products/<?=$service_row['image_name']; ?>">
                                  </div>
                                 
                                </div>

                            </div>
                           

                            <div class="col m6">
                                <div class="single-car-prices">
                                    <div class="single-regular-price text-center green">
                                        <span class="labeled">price</span>
                                        <span class="h3"><?="$".$service_row['price']; ?></span>
                                    </div>
                                </div>

                               <!-- <div class="price-description-single green darken-1">
                                    Sale Price: <b class="price--tag">$0.00</b>
                                </div>
                                <div class="price-description-single green darken-2">
                                    You Save:  <b class="">$87,500.00</b>
                                </div>-->

                                <table class="responsive-table highlight">
                                    <tbody><tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><b><?=$service_row['address']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td><b><?=$service_row['status']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td>:</td>
                                        <td> <b><?=$service_row['contact_details']; ?></b></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Phone </td>
                                        <td>:</td>
                                        <td><b><?=$service_row['phone']; ?></b></td>
                                    </tr>

                                    <tr>
                                        <td>State</td>
                                        <td>:</td>
                                        <td> <b><?=$service_row['city']; ?></b></td>
                                    </tr>

                                </tbody>
                            </table>
                            </div>

                            <div class="col m12">
                            
                            
                            
  <div class="row">
    <div class="col s12">
      <ul class="tabs green">
        <li class="tab col s3"><a href="#test1"  class="active white-text">Product Description</a></li>
        <li class="tab col s3"><a href="#test2" class="white-text">Additional Information</a></li>
        <li class="tab col s3"><a href="#test3" class="white-text">Related Products</a></li>
        <li class="tab col s3"><a href="#test4" class="white-text">Product Review's</a></li>
      
      </ul>
    </div>
    <div id="test1" class="col s12">
                                <p><?=$service_row['description']; ?>!</p>
                                <p<?=$service_row['description'];?></p>
                                <p><?=$service_row['description'];?></p></div>
    <!--<div id="test2" class="col s12"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt libero laboriosam voluptatum quos a sit sint recusandae eius explicabo sed fugiat ipsam consequatur, illum asperiores labore dolor, quidem error !</p>
                                <p>Hic dolores quibusdam perferendis fugiat totam asperiores laborum. Corporis, sed eius laudantium, laborum voluptas eligendi animi blanditiis repellendus aperiam est quam! Expedita necessitatibus magni dolorum velit harum architecto, nemo consequuntur.</p></div>-->
    <div id="test3" class="col s12">

<?php  foreach($related_product as $services):?>

        <?php if($services['id']!=$service_row['id']) { ?>
                              <div class="col l4 m6 s12">
                                <div class="card sticky-action hoverable" style="overflow: visible;">
                                  <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" height="262" width="300" src="<?=base_url();?>assets/images/products/<?=$services["image_name"]?>">
                                  </div>
                                  <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4"><?=$services["title"];?></span>

                                    <p> <small>by Ashiana Housing</small> <br /><?=$services["address"];?></p>
                                  </div>

                                  <div class="card-action right-align">
                                    <a href="<?=base_url()?>services/details/<?=$services["id"];?>">More Details </a>
                                  </div>

                                  <div class="card-reveal" style="display: none; transform: translateY(0px);">
                                    <span class="card-title grey-text text-darken-4"><?=$services["title"]?><i class="material-icons right">close</i></span>
                                    <p><?=$services["description"];?></p>
                                  </div>
                                </div>
                              </div>
                              <?php } ?>
                            <?php endforeach; ?>
                      </div>
    
  </div>
        
                            </div>
                        </div>
                    </div>

                </div>
            </div>
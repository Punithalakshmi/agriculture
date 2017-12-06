            
            <!-- breadcrumb -->
            <nav>
                <div class="nav-wrapper green">
                  <div class="container">
                      <div class="col s12">
                        <a href="#!" class="breadcrumb"><i class="material-icons">home</i></a>
                        <a href="#!" class="breadcrumb">Services</a>
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
                          <h1 class="page-title">Page <span>Title</span></h1>
                        </div>

                        <div class="row card hoverable detail-page">
                            <div class="col m6">

                                <div class="card" style="overflow: visible;">
                                  <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="<?=base_url();?>assets/images/products/<?=$service_row["image_name"]; ?>">
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

                                <div class="price-description-single green darken-1">
                                    Sale Price: <b class="price--tag"><?="$".$service_row['price']; ?></b>
                                </div>
                                <div class="price-description-single green darken-2">
                                    You Save:  <b class=""><?="$".$service_row['price']; ?></b>
                                </div>

                                <table class="responsive-table highlight">
                                    <tbody><tr>
                                        <td>Lorem ipsum </td>
                                        <td>:</td>
                                        <td><b>dolor sit amet</b></td>
                                    </tr>
                                    <tr>
                                        <td>Consectetuer</td>
                                        <td>:</td>
                                        <td><b>--</b></td>
                                    </tr>
                                    <tr>
                                        <td>Adipiscing</td>
                                        <td>:</td>
                                        <td> <b>Dummy Text</b></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Dummy text </td>
                                        <td>:</td>
                                        <td><b>4</b></td>
                                    </tr>

                                    <tr>
                                        <td>Sleeps</td>
                                        <td>:</td>
                                        <td> <b>6</b></td>
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
                                <p><?=$service_row["description"]; ?></p>
                                <p><?=$service_row["description"]; ?></p>
                                <p><?=$service_row["description"]; ?></p></div>
    <!--<div id="test2" class="col s12"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt libero laboriosam voluptatum quos a sit sint recusandae eius explicabo sed fugiat ipsam consequatur, illum asperiores labore dolor, quidem error similique!</p>
                                <p>Hic dolores quibusdam perferendis fugiat totam asperiores laborum. Corporis, sed eius laudantium, laborum voluptas eligendi animi blanditiis repellendus aperiam est quam! Expedita necessitatibus magni dolorum velit harum architecto, nemo consequuntur.</p></div>
    <div id="test3" class="col s12"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt libero laboriosam voluptatum quos a sit sint recusandae eius explicabo sed fugiat ipsam consequatur, illum asperiores labore dolor, quidem error similique!</p>
                                <p>Hic dolores quibusdam perferendis fugiat totam asperiores laborum. Corporis, sed eius laudantium, laborum voluptas eligendi animi blanditiis repellendus aperiam est quam! Expedita necessitatibus magni dolorum velit harum architecto, nemo consequuntur.</p></div>
    <div id="test4" class="col s12"> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt libero laboriosam voluptatum quos a sit sint recusandae eius explicabo sed fugiat ipsam consequatur, illum asperiores labore dolor, quidem error similique!</p>
                                <p>Hic dolores quibusdam perferendis fugiat totam asperiores laborum. Corporis, sed eius laudantium, laborum voluptas eligendi animi blanditiis repellendus aperiam est quam! Expedita necessitatibus magni dolorum velit harum architecto, nemo consequuntur.</p></div>-->
    
  </div>
        
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            

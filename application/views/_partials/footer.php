        <?php $uri = $this->uri->segment(1);
          $uri1 = $this->uri->segment(2);
        ?>
            <footer class="page-footer">
                <div class="container">
                  <div class="row">
                    <div class="col l12 s12">
                        <ul class="social center">
                            <li><a href="#!"><img src="<?=base_url();?>assets/images/facebook.png" alt=""></a></li>
                            <li><a href="#!"><img src="<?=base_url();?>assets/images/twitter.png" alt=""></a></li>
                            <li><a href="#!"><img src="<?=base_url();?>assets/images/google-plus.png" alt=""></a></li>
                            <li><a href="#!"><img src="<?=base_url();?>assets/images/youtube.png" alt=""></a></li>
                            <li><a href="#!"><img src="<?=base_url();?>assets/images/trivago.png" alt=""></a></li>
                        </ul>
                      <div class="center">
                          <img src="<?=base_url();?>assets/images/footer-bg.png" class="responsive-img" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="footer-copyright">
                  <div class="container center">
                  &copy; 2017 Company Name. All rights Reserved. | <a class="brown-text text-lighten-3" href="#">Terms of Use</a> | <a class="brown-text text-lighten-3" href="#">Privacy Policy</a>
                  </div>
                </div>
            </footer>
            <?php if(!empty($user_msg)){ ?>
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <?=$user_msg;?>
            </div>
          <?php } ?>
            <!-- businesss ads -->
             <?php $ads_image = get_business('Vertical'); 
              // /echo "<pre>"; print_r($ads_image); exit;
               $ads_image1 = get_business('Vertical'); 
             if(($uri!='' && $uri!='home'&&$uri!='services'&&$uri!='contact' && $ads_image && $ads_image1 )|| $uri=='details'):?> 
            <div class="add__left" id="left_ads">
              <span id="closeadvt" style="cursor:pointer;">X</span>
              <ul>
                <?php foreach($ads_image as $images): ?>
                <li>
                 <a href="#">
                     <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="160" height="400" alt="" ">
                  </a>
                </li>
              <?php endforeach;?>
              </ul>
              </div>
            </div>

            <div class="add__right" id="right_ads">
               <span id="closeadvt1" style="cursor:pointer;">X</span>
            <!-- add right -->
            <ul>
              <?php foreach($ads_image1 as $images): ?>
                <li>
                  <a href="#">
                     <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="160" height="400" alt="" ">
                  </a>
                </li>
                <?php endforeach;?>
              </ul>
            </div>
            <?php endif;?>
            <!-- <div class="add__vertical">
            add vertical
            add__vertical
            </div> -->
            <!-- Footer Scripts -->
            <script>
                if (!window.jQuery) { 
                    document.write('<script src="assets/js/lib/3.2.1/jquery-3.2.1.min.js"><\/script>'); 
                }
            </script>
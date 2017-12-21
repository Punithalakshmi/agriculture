            

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

            <!-- businesss ads -->
            <div class="add__left">
             <?php $ads_image = get_business(); if($ads_image):?> 
              <ul>
                <?php foreach($ads_image as $images): ?>
                <li>
                 <a href="#"> <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="160" height="200" alt="" "></a>
                </li>
              <?php endforeach;?>
              </ul>
            </div>

            <div class="add__right">
            <!-- add right -->
            <ul>
              <?php foreach($ads_image as $images): ?>
                <li>
                  <a href="#"> <img src="<?=base_url()?>assets/img/business/<?=$images["ads_image"];?>" border="0" width="160" height="200" alt="" "></a>
                </li>
                <?php endforeach;?>
              </ul>
            <?php endif;?>
            </div>

            <div class="add__vertical">
            <!-- add vertical -->
            add__vertical
            </div>



            <!-- Footer Scripts -->
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script>
                if (!window.jQuery) { 
                    document.write('<script src="assets/js/lib/3.2.1/jquery-3.2.1.min.js"><\/script>'); 
                }
            </script>
        </body>
    </html>

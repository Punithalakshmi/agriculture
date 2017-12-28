 
<?php display_flashmsg($this->session->flashdata()); ?>
 <div class="container">
<div class="row">

    <div class="col s4">
      <ul class="tabs green profile-info">

        
        <li class="tab col s12"><a href="#contact" class="active white-text">Contact Information</a></li>

        
          <li class="tab col s12"><a href="#service" onclick="tab_view('service','profile/service_update','')" class="white-text">Seller Services</a></li>

        <li class="tab col s12"><a href="#photos" onclick="tab_view('photos','profile/update_photos','')" class="white-text">photos</a></li>
      </ul>
    </div>
     <input type="hidden" name="seller_id" value="<?=$editdata['id'];?>">

    <div id="contact" class="col s8">
     
    </div>

    <div id="service" class="col s8">
       
    </div>
 

    <div id="photos" class="col s8">
   
       
  
   </div>

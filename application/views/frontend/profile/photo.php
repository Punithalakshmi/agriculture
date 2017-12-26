
 <form action="/" enctype="multipart/form-data" class="dropzone" id="photoForm">

 <input type="hidden" name="seller_id" value="<?=$editdata['id'];?>">
     
   </form>
  
   <br /><br />
   
   <br /><br />

    <?php if($photodata) { ?
    
    <?php
    if(isset($photodata) && is_array($photodata) && count($photodata)): $i=1;
    foreach ($photodata as $key => $data) {  
    ?>
       <div class="imagelocation<?php echo $data->id ?> seller-img">
        
        <a href="<?php echo base_url(); ?>admin/uploads/seller/<?php echo $data->image_name; ?>" data-fancybox="images"><img src="<?php echo base_url(); ?>admin/uploads/seller/<?php echo $data->image_name; ?>" style="vertical-align:middle;" width="80" height="80"></a>
       <span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data->id ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
      </div>
      <?php } endif; ?>
    
   <?php } ?>
   
   <br /><br />


 
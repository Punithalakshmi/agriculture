
 <form action="/" enctype="multipart/form-data" class="dropzone" id="photoForm">

   </form>
  
   <br /><br />
   
   <br /><br />

    
    <?php
    if( is_array($editdata) && count($editdata)): 

    foreach ($editdata as $key => $data):  ?>

       <div class="imagelocation<?php echo $data->id ?> seller-img">
        
        <a href="<?php echo base_url(); ?>admin/uploads/seller/<?php echo $data->image_name; ?>" data-fancybox="images"><img src="<?php echo base_url(); ?>admin/uploads/seller/<?php echo $data->image_name; ?>" style="vertical-align:middle;" width="80" height="80"></a>
       <span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data->id ?>)"><i class="material-icons">delete_forever</i></span>
      </div>

    <?php endforeach; endif; ?>  


    <script type="text/javascript">
      dropzone();
      deleteimage(image_id);
    </script>
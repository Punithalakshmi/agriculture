 
  
   <form action="/" enctype="multipart/form-data" class="dropzone" id="photoForm">
     
   </form>
  
   <br /><br />
   
   <br /><br />

    <?php if($editdata) { ?>

    <table style="width:45%">
    
    

    <?php
    if(isset($editdata) && is_array($editdata) && count($editdata)): $i=1;
    foreach ($editdata as $key => $data) {  
    ?>
       <div class="imagelocation<?php echo $data->id ?> seller-img">
        
        <a href="<?php echo base_url(); ?>uploads/seller/<?php echo $data->image_name; ?>" data-fancybox="images"><img src="<?php echo base_url(); ?>uploads/seller/<?php echo $data->image_name; ?>" style="vertical-align:middle;" width="80" height="80"></a>
        <span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data->id ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
      </div>
      <?php } endif; ?>
    
  
<?php } ?>
   
   <br /><br />
   
<script type="text/javascript">
  dropzone();
  deleteimage(image_id);

/* function deleteimage(image_id)
{
    var answer = confirm ("Are you sure you want to delete this image?");
    if (answer)
    {
        $.ajax({
                type: "POST",
                url: "<?php //echo site_url('seller/deleteimage');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                     // window.location.reload();
                  };
                  
                }
            });
      }
} */

</script>
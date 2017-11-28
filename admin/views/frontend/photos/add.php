 <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>

   <form action="/" enctype="multipart/form-data" class="dropzone" id="photoForm">
     
   </form>
   <br /><br />
   
   <br /><br />

    <?php if($editdata) { ?>

    <table style="width:45%">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php
    if(isset($editdata) && is_array($editdata) && count($editdata)): $i=1;
    foreach ($editdata as $key => $data) {  
    ?>
       <tr class="imagelocation<?php echo $data->id ?>">
        <td><?php echo $i++ ?></td>
        <td align="center"><a href="<?php echo base_url(); ?>uploads/seller/<?php echo $data->image_name; ?>" data-fancybox data-caption=""><img src="<?php echo base_url(); ?>uploads/seller/<?php echo $data->image_name; ?>" style="vertical-align:middle;" width="80" height="80"></a></td>
        <td><span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $data->id ?>)">X</span></td>
      </tr>
      <?php } endif; ?>
    </tbody>
  </table>
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
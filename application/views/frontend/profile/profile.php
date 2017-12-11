 
<?php display_flashmsg($this->session->flashdata()); ?>
 <div class="container">
<div class="row">

    <div class="col s4">
      <ul class="tabs green profile-info">
        <li class="tab col s12"><a href="#test1" class="active white-text">Contact Information</a></li>
        <li class="tab col s12"><a href="#test2" class="white-text">Seller Services</a></li>
        <li class="tab col s12"><a href="#test3" class="white-text">photos</a></li>
      </ul>
    </div>
     <input type="hidden" name="seller_id" value="<?=$editdata['id'];?>">
    <div id="test1" class="col s8">
      <?php echo form_open('profile/update/'.$editdata['id'], 'class="form-horizontal form-padding" id="form_seller_update"'); ?>
  <form id="formContact" role="form" method="post">
      <div class="row">
         <div class="col s12 m6 input-field">
      <label for="FirstName"> First Name <span class="required">*</span></label>
     <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'maxlength' => '258', 'tabindex' => '1','value' => set_value('first_name',$editdata['first_name'])]); ?> <?php echo form_error('first_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
    </div>

    <div class="col s12 m6 input-field">
      <label for="LastName"> Last Name <span class="required">*</span></label>
     <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'maxlength' => '258', 'tabindex' => '2','value' => set_value('last_name',$editdata['last_name'])]); ?> <?php echo form_error('last_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
    </div>
      <div class="col s12 m6 input-field">
    <label for="Email"> Email <span class="required">*</span></label>
    <?php echo form_input(['name' => 'email', 'id' => 'email','maxlength' => '258', 'tabindex' => '3','value' => set_value('email',$editdata['email'])]); ?> <?php echo form_error('email', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6 input-field">
    <label for="CreatePassword"> Password </label>
   <?php echo form_input(['name' => 'password', 'id' => 'password', 'maxlength' => '258', 'tabindex' => '4','value' => set_value('password')]); ?> <?php echo form_error('password', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

   <div class="col s12 m6 input-field">
    <label for="FirstName"> Address 1 <span class="required">*</span></label>

   <?php echo form_input(['name' => 'address', 'id' => 'address', 'maxlength' => '258', 'tabindex' => '5','value' => set_value('address',$editdata['address'])]); ?> <?php echo form_error('address', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

   <div class="col s12 m6 input-field">
    <label for="FirstName"> Address 2</label>

   <?php echo form_input(['name' => 'address2', 'id' => 'address2', 'maxlength' => '258', 'tabindex' => '6','value' => set_value('address2',$editdata['address2'])]); ?> <?php echo form_error('address2', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6 input-field">

    <?php echo form_dropdown('country_id', get_country_all(), (set_value('country_id')) ? set_value('country_id') : 231,
['name' => 'country_id', 'id' => 'country_id', 'tabindex' => '7']); ?> <?php echo form_error('country_id',
          '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6 input-field">

    <?php echo form_dropdown('state_id', get_state_all(), $editdata['state_id'], ['name'=>'state_id', 'id'=>'state_id', 'tabindex'=> '8']); ?>
<?php echo form_error('state_id', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>


  <div class="col s12 m6 input-field">
    <label for="FirstName">City<span class="required">*</span></label>

    <?php echo form_input(['name' => 'city', 'id' => 'city', 'maxlength' => '258', 'tabindex' => '9','value' => set_value('city',$editdata['city'])]); ?> <?php echo form_error('city', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 m6 input-field">
    <label for="FirstName"> Phone <span class="required">*</span></label>

   <?php echo form_input(['name' => 'phone', 'id' => 'phone','maxlength' => '258', 'tabindex' => '10','value' => set_value('phone',$editdata['phone'])]); ?> <?php echo form_error('phone', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>

  <div class="col s12 input-field">
    <label for="FirstName"> Zip<span class="required">*</span></label>

   <?php echo form_input(['name' => 'zip', 'id' => 'zip','maxlength' => '258', 'tabindex' => '11','value' => set_value('zip',$editdata['zip'])]); ?> <?php echo form_error('zip', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
  </div>
  <p>
   <input type="submit" value="Update" class="btn-large z-depth-0">
  </p>
      </div>
    <?php echo form_close(); ?> 
    </div>

    <div id="test2" class="col s8">
       <?php echo form_open('profile/service_update/'.$editdata['id'], 'class="form-horizontal form-padding" id="form_seller_update"'); ?>
       <input type="hidden" name="seller_id" value="<?=$editdata['id'];?>">
      <div class="row">
        <div class="input-field col s12">
        <?php echo form_input(['name' => 'company_name', 'id' => 'company_name', 'maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Company Name' ,'value' => set_value('company_name',$servicedata['company_name'])]); ?> <?php echo form_error('company_name', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="disabled">Company Name <span class="required">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <?php echo form_textarea(['name' => 'description', 'id' => 'description','class' => 'materialize-textarea', 'tabindex' => '3', 'value' => set_value('description',$servicedata['description']),'tabindex' => '10']); ?> <?php echo form_error('description', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="password">Description<span class="required">*</span></label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
         <?php echo form_input(['name' => 'website', 'id' => 'website','maxlength' => '258', 'tabindex' => '2', 'placeholder' =>'Website' ,'value' => set_value('website',$servicedata['website'])]); ?> <?php echo form_error('website', '<small class="help-block text-danger">&nbsp;', '</small>'); ?>
          <label for="email">Website<span class="required">*</span></label>
        </div>
      </div>
      <p>
      <p>
      <input type="submit" value="Update" class="btn-large z-depth-0">
      </p>
  
     </p>
   <?php echo form_close(); ?> 
    </div>
 

    <div id="test3" class="col s8">
    
        <div class="input-field col s12">
       <form action="/" enctype="multipart/form-data" class="dropzone" id="photoForm">

       <input type="hidden" name="seller_id" value="<?=$editdata['id'];?>">
     
   </form>
  
   <br /><br />
   
   <br /><br />

    <?php if($photodata) { ?>

    <table style="width:45%">
    
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


    </div>
  </div>
</div>
<!--
<script type="text/javascript">
$(document).ready(function(){
  alert();
});
  $("#photoForm").dropzone({
    
    maxFiles: 5,
    addRemoveLinks:true,
    acceptedFiles: ".png, .jpg",//is this correct? I got an error if im using this
    dictRemoveFile:"Remove",
    dictDefaultMessage:"Drag or Drop Image here<br>(Or)<br>Browse File (Click)",  

    url:base_url+'profile/update_photos',
    
    
    sending: function(file, xhr, formData) {
       formData.append("seller_id", $('input[name="seller_id"]').val());
     },    
    success: function (response) {

      window.location.href = base_url+'profile/index';
    },    

  addRemoveLinks: true,
  removedfile: function(file) {
            var _ref;  // Remove file on clicking the 'Remove file' button
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;  
          }   

  });

function deleteimage(image_id){

   var answer = confirm ("Are you sure you want to delete this image?");
    if (answer)
    {
        $.ajax({
                type: "POST",
                url:base_url+'profile/deleteimage',
                
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                     // window.location.reload();
                  };
                  
                }
            });
      }
}
  //your code here
  
</script>-->

function dropzone()
{
 
  $("#photoForm").dropzone({
   
    maxFiles: 5,
    addRemoveLinks:true,
    acceptedFiles: ".png, .jpg",//is this correct? I got an error if im using this
    dictRemoveFile:"Remove",
    dictDefaultMessage:"Drag or Drop Image here<br>(Or)<br>Browse File (Click)",  

    url:base_url+'seller/add_photos',
    
    
    sending: function(file, xhr, formData) {
       formData.append("seller_id", $('input[name="seller_id"]').val());
     },    
    success: function (response) {

      window.location.href = base_url+'seller/index';
    },    

  addRemoveLinks: true,
  removedfile: function(file) {
            var _ref;  // Remove file on clicking the 'Remove file' button
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;  
          }   

  });
  if($("input[name='seller_id']").val()=='' )
  {

    alert("Please Enter Contact Form");
    $("ul.sellertabs li a#tab1").trigger('click');
    return false;
  }
}

function tab_view(url,formid='')
{

   var sell_id = ($("input[name='seller_id']").val())?$("input[name='seller_id']").val():0;
   var form_data = $("#"+formid).serializeArray();
   
   var formData = new FormData();

   $(form_data).each(function (index, element) {

     formData.append(element.name, element.value);
    });
   formData.append('seller_id', sell_id);   
    $.ajax({
        type:"POST",
        url:base_url+url+'/'+sell_id,
        processData: false,
        data:formData,
        contentType: false,
        dataType:'json',
        success:function(data)
        {  

          console.log(data);      
          
          if(data.msg)
            alert(data.msg);

          if(data.status=="edit")
            window.location.href = base_url+'profile/update/'+data.edit_id;
            //service_message(data.status,data.msg);
        }
    });
  
}

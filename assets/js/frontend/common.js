

function dropzone()
{
  
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
      location.reload();

    },    

  addRemoveLinks: true,
  removedfile: function(file) {
            var _ref;  // Remove file on clicking the 'Remove file' button
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;  
          }   
  });

}

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

function tab_view(id,url,formid='')
{

  
   var form_data = [];

   if(formid)
     form_data = $("#"+formid).serializeArray();

   var formData = new FormData();

   $(form_data).each(function (index, element) {

     formData.append(element.name, element.value);
    });

    $.ajax({
        type:"POST",
        url:base_url+url,
        processData: false,
        data:formData,
        contentType: false,
        dataType:'json',
        success:function(data)
        { 

          
         
          $("#"+id).html(data.output);
        
          if(data.msg)
            alert(data.msg);

          /* if(data.status=="add")
            window.location.href = base_url+'profile/profile/'+data.edit_id;?*/
          
        }
    });
  
}

/* function tab_view(id,url,formid='')
{

   var sell_id = ($("input[name='seller_id']").val())?$("input[name='seller_id']").val():0;

   var form_data = $("#"+formid).serializeArray();
   console.log();
   var formData = new FormData();  

    $.ajax({
        type:"POST",
        url:base_url+url+'/'+sell_id,
        processData: false,
        data:formData,
        contentType: false,
        dataType:'json',
        success:function(data)
        {   
          alert('tesr');
          $("#"+id).html(data.output);

          if(data.msg)
            alert(data.msg);
        }
    });
  
} */

function alerttab(id)
{
  if($("input[name='seller_id']").val() == 0 && (id=="service" || id=="photos"))
  {
    alert("Please Enter palns Form");
    //$("ul.sellertabs li a#tab1").trigger('click');
    return false;
  }
 
   
}

$(document).ready(function(){

 $('#country_id').change(function() {

    var id = $('#country_id').val();

    if( $(id).val() !='' ){          
      $.post(base_url+'country_state_manager/get_state/'+id,{id:$(id).val()}, function(data){
        $('#state_id').html(data);
      }); 
    } 
  });

  tab_view("contact","profile/update_contact",'');

    $("#search_form").submit(function(){
      var f1 = $('#category').val();
      var f2 = $('#location').val();
      var f3 = $('#keyword').val();
        if( f1== '' &&  f2== '' && f3 == '')
          return false;    
        else
           return true;
    });
     $("#form_search").submit(function(){
      var s2 = $('#location').val();
      var s3 = $('#keyword').val();
        if(s2== '' && s3 == '')
          return false;    
        else
           return true;
    });

     
});

$(document).ready(function(){

  $("#left_ads > ul > li:gt(0)").hide();
setInterval(function() {
  $('#left_ads > ul > li:first')
    .fadeOut(1)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#left_ads ul');
}, 3000);

$("#right_ads > ul > li:gt(0)").hide();
setInterval(function() {
  $('#right_ads > ul > li:first')
    .fadeOut(1)
    .next()
    .fadeIn(800)
    .end()
    .appendTo('#right_ads ul');
}, 2800);

$("#add__vertical > ul > li:gt(0)").hide();
setInterval(function() {
  $('#add__vertical > ul > li:first')
    .fadeOut(1)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#add__vertical ul');
}, 3000);

$('#closeadvt').on('click', function(e) { 
        $('#left_ads').fadeOut(); 
    });
$('#closeadvt1').on('click', function(e) { 
        $('#right_ads').fadeOut(); 
    });
$('#closeadvt3').on('click', function(e) { 
        $('#add__vertical').fadeOut(); 
    });
});

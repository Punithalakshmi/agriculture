

$(document).ready(function() {

  $("#next").click(function(){

    var output = validate();
      
    if(output) {

      var current = $(".step active");

      var next = $(".step active").next("li");

      if(next.length>0) {
        $("#"+current.attr("id")+"-field").hide();
        $("#"+next.attr("id")+"-field").show();
        $("#back").show();
        $("#finish").hide();
        $(".active").removeClass("active");
        next.addClass("active");
        if($(".active").attr("id") == $("li").last().attr("id")) {
          $("#next").hide();
          $("#finish").show();        
        }
      }
    }

  });
  $("#back").click(function(){ 
    var current = $(".active");
    var prev = $(".active").prev("li");
    if(prev.length>0) {
      $("#"+current.attr("id")+"-field").hide();
      $("#"+prev.attr("id")+"-field").show();
      $("#next").show();
      $("#finish").hide();
      $(".active").removeClass("active");
      prev.addClass("active");
      if($(".active").attr("id") == $("li").first().attr("id")) {
        $("#back").hide();      
      }
    }
  });
});


function validate() {

var output = true;

$(".signup-error").html('');

if($("#personal-field").css('display') != 'none') {

  if(!($("#name").val())) {
    output = false;
    $("#name-error").html("Name required!");
  }
  if(!($("#email").val())) {
    output = false;
    $("#email-error").html("Email required!");
  } 
  if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
    $("#email-error").html("Invalid Email!");
    output = false;
  }
}

if($("#password-field").css('display') != 'none') {
  if(!($("#user-password").val())) {
    output = false;
    $("#password-error").html("Password required!");
  } 
  if(!($("#confirm-password").val())) {
    output = false;
    $("#confirm-password-error").html("Confirm password required!");
  } 
  if($("#user-password").val() != $("#confirm-password").val()) {
    output = false;
    $("#confirm-password-error").html("Password not matched!");
  } 
}
return output;
}

dropzone();

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

          /*$("input[name='seller_id']").val(data.edit_id);
          
          $selid = $("input[name='seller_id']").val();

          if(data.edit_id != 0 || id=='contact'){
            $("#"+id).html(data.output);
          }
          else
           alerttab(id);*/

          if(data.msg)
            alert(data.msg);

          if(data.status=="add")
            window.location.href = base_url+'registration/createnew_account/'+data.edit_id;
          
            //service_message(data.status,data.msg);
        }
    });
  
}

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
    $('button').click(function(){
      var f1 = $('#category').val();
      var f2 = $('#location').val();
      var f3 = $('#keyword').val();

      //var search_value = [f1, f2, f3];

   if( f1== '' &&  f2== '' && f3 == '')
   {
     return false;    
   }
   else
   {
      return true;
   }
  
   
    });

});

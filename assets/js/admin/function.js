$(document).ready(function(){

 //  //tab_view("contact","seller/add",'');
 // $("#formtabs li").not(":first").click(function() {
      
 //   $('.nav-tabs li ').removeClass('active');
 //   $('.nav-tabs li').eq(1).addClass('active'); 
 //  });


$('#country_id').change(function() {

    var id = $('#country_id').val();

    if( $(id).val() !='' ){          
      $.post(base_url+'seller/get_state/'+id,{id:$(id).val()}, function(data){
        $('#state_id').html(data);
      }); 
    } 
  }); 
  

  $("#from_date").datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#to_date').datepicker('setStartDate', "12/12/1994");
    }).on('clearDate', function (selected) {
    $('#to_date').datepicker('setStartDate', null);
});

    $("#to_date").datepicker({
       format: 'yyyy-mm-dd',
       autoclose: true,
    }).on('changeDate', function (selected) {
       var endDate = new Date(selected.date.valueOf());
       $('#from_date').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
   $('#from_date').datepicker('setEndDate', null);
});


 })
 

$(function()
{

  
   
    $(".mt-repeater-add2").click(function()
    {
        if($(".mt-repeater-cust-item").length >= 1)
            $(".room-del").removeClass("hide");
        var mt_repeater_div = $('.mt-repeater-cust-item').first().clone();
        mt_repeater_div.find("input,textarea").val("");
        $(".mt-repeater-room-dtl").append(mt_repeater_div);

    });

}); 

//to delete selected record from list.
function delete_record(del_url,elm){

  $("#div_service_message").remove();
    
      retVal = confirm("Are you sure to remove?");

        if( retVal == true ){
   
            $.post(base_url+del_url,{},function(data){           
                
                if(data.status == "success"){
                //success message set.
                service_message(data.status,data.message);
                
                //grid refresh
                refresh_grid();
    
            }
            else if(data.status == "error"){
                 //error message set.
                service_message(data.status,data.message);
            }
            
            },"json");
       }       
      
}


/* refresh grid after ajax submitting form */
function refresh_grid(data_tbl){
     data_tbl =(data_tbl)?data_tbl:"data_table";
     var cur_page = $("#base_url").val()+$("#cur_page").val();
     $.fn.init_progress_bar();
     $.fn.display_grid(cur_page,data_tbl);
}

function service_message(err_type,message,div_id){
    
    div_id = (div_id)?div_id:false;   

    $("#div_service_message").remove();
    
    var str  ='<div id="div_service_message" class="Metronic-alerts alert alert-'+err_type+' fade in">';
        str +='<button class="close" aria-hidden="true" data-dismiss="alert" type="button"><i class="fa-lg fa fa-warning"></i></button>';
      str   +='<strong>'+capitaliseFirstLetter(err_type)+':&nbsp;</strong>';
      str   += message;
        str +='</div>';
        
    if(div_id){
         $("#"+div_id).html(str);
    }
    else
    {
        $(".blue-mat").after(str);
        scroll_to("div_service_message");
    }
            
}

function scroll_to(jump_id){
    //page scroll
    if(jump_id !=""){
       $(window).scrollTop($('#'+jump_id).offset().top); 
    }
}


function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function change_status(id='',type='')
{
  if(type=='0')
  {
    $(".label-"+id).addClass("hide");
    $(".select-status-"+id).removeClass("hide");
  }
  else if(type=='1')
  {
    val = $("select.select-status-"+id).val();
    $.ajax({
        type:"POST",
        url:base_url+'milestone/change_status',
        data:{id:id,status:val},
        success:function(data)
        {
          refresh_grid();
        }
    });
  }
}


function tab_view(id,url,formid='')
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
          $("input[name='seller_id']").val(data.edit_id);
          
          $selid = $("input[name='seller_id']").val();

          if(data.edit_id != 0 || id=='contact'){
            $("#"+id).html(data.output);
          }
          else
           alerttab(id);

          if(data.msg)
            alert(data.msg);

          if(data.status=="add")
            window.location.href = base_url+'seller/add/'+data.edit_id;
          
            //service_message(data.status,data.msg);
        }
    });
  
}

function alerttab(id)
{
  if($("input[name='seller_id']").val() == 0 && (id=="service" || id=="photos"))
  {
    alert("Please Enter Contact Form");
    $("ul.sellertabs li a#tab1").trigger('click');
    return false;
  }
 
   
} 

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

function deleteimage(image_id){

   var answer = confirm ("Are you sure you want to delete this image?");
    if (answer)
    {
        $.ajax({
                type: "POST",
                url:base_url+'seller/deleteimage',
                
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


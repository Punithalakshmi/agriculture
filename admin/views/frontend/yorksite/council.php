<div class="portlet box green ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-table"></i> Council
		</div>
	</div>
	<div class="portlet-body form">
<form class="mt-repeater form-horizontal" name="add_council" id="add_council" method="post" enctype="multipart/form-data">
           <div class="form-body">
               <!--/row-->
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('council_name'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Council Name<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="council_name" id="council_name" value="<?php echo set_value('council_name',$editdata['council_name']);?>"> 
                          <?php echo form_error('council_name'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('top_line_signer'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Council Top Line Singer:<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control form-control-inline" name="top_line_signer" id="top_line_signer" value="<?php echo set_value('top_line_signer',$editdata['top_line_signer']);?>"> 
                          <?php echo form_error('top_line_signer'); ?>
                       </div>
                    </div>
                 </div>
              </div>
               <div class="row">
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('council_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Council No<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="council_no" id="council_no" value="<?php echo set_value('council_no',$editdata['council_no']);?>"> 
                          <?php echo form_error('council_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group <?php //echo (form_error('second_line_signer'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Second Line Singer:</label>
                       <div class="col-md-9">
                          <input type="text" class="form-control form-control-inline" name="second_line_signer" id="second_line_signer" value="<?php echo (isset($editdata['second_line_signer']))?$editdata['second_line_signer']:""; ?>"> 
                          <?php //echo form_error('second_line_signer'); ?>
                       </div>
                    </div>
                 </div>
              </div>
               <div class="row">
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">District No<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="district_no" id="district_no" value="<?php echo set_value('district_no',$editdata['district_no']);?>"> 
                          <?php echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Date Joined:</label>
                       <div class="col-md-9">
                          <input type="text" class="form-control form-control-inline" name="date_joined_council" id="date_joined_council" value="<?php echo (isset($editdata['date_joined']))?$editdata['date_joined']:"";?>"> 
                          <?php echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php echo (form_error('most_il_master'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Most Il Master?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="most_il_master" id="most_il_master" value="<?php //echo set_value('most_il_master',$editdata['most_il_master']);?>">
-->
                           <select name="most_il_master" id="most_il_master">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('most_il_master','yes',(isset($editdata['most_il_master'])&&($editdata['most_il_master']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('most_il_master','no',(isset($editdata['most_il_master'])&&($editdata['most_il_master']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php echo form_error('most_il_master'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Deputy Master?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="deputy_master" id="deputy_master" value="<?php //echo (isset($editdata['deputy_master']))?$editdata['deputy_master']:"";?>">
-->
                          <select name="deputy_master" id="deputy_master">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('deputy_master','yes',(isset($editdata['deputy_master'])&&($editdata['deputy_master']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('deputy_master','no',(isset($editdata['deputy_master'])&&($editdata['deputy_master']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Steward?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="steward" id="steward" value="<?php //echo (isset($editdata['steward']))?$editdata['steward']:"";?>">
-->
                          <select name="steward" id="steward">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('steward','yes',(isset($editdata['steward'])&&($editdata['steward']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('steward','no',(isset($editdata['steward'])&&($editdata['steward']=='no'))?true:false);?>>No</option>  
                           </select>  
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div> 
               <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Year</label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="year1" id="year1_council" value="<?php echo (isset($editdata['year1']))?$editdata['year1']:"";?>"> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Princ. Cond. of Work?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="princ_cond_of_work" id="princ_cond_of_work" value="<?php //echo (isset($editdata['princ_cond_of_work']))?$editdata['princ_cond_of_work']:"";?>">
-->
                          <select name="princ_cond_of_work" id="princ_cond_of_work">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('princ_cond_of_work','yes',(isset($editdata['princ_cond_of_work'])&&($editdata['princ_cond_of_work']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('princ_cond_of_work','no',(isset($editdata['princ_cond_of_work'])&&($editdata['princ_cond_of_work']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Chaptain?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="chaptain" id="chaptain" value="<?php //echo (isset($editdata['chaptain']))?$editdata['chaptain']:"";?>">
-->
                          <select name="chaptain" id="chaptain">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('chaptain','yes',(isset($editdata['chaptain'])&&($editdata['chaptain']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('chaptain','no',(isset($editdata['chaptain'])&&($editdata['chaptain']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>  
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">District Il Master?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="district_il_master" id="district_il_master" value="<?php //echo (isset($editdata['district_il_master']))?$editdata['district_il_master']:"";?>">
-->
                           <select name="district_il_master" id="district_il_master">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('district_il_master','yes',(isset($editdata['district_il_master'])&&($editdata['district_il_master']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('district_il_master','no',(isset($editdata['district_il_master'])&&($editdata['district_il_master']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Recorder?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="recorder" id="recorder" value="<?php //echo (isset($editdata['recorder']))?$editdata['recorder']:"";?>">
-->
                          <select name="recorder" id="recorder">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('recorder','yes',(isset($editdata['recorder'])&&($editdata['recorder']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('recorder','no',(isset($editdata['recorder'])&&($editdata['recorder']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Sentinel?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="sentinel" id="sentinel" value="<?php //echo (isset($editdata['sentinel']))?$editdata['sentinel']:"";?>">

-->                        <select name="sentinel" id="sentinel">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('sentinel','yes',(isset($editdata['sentinel'])&&($editdata['sentinel']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('sentinel','no',(isset($editdata['sentinel'])&&($editdata['sentinel']=='no'))?true:false);?>>No</option>  
                           </select>              
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div> 
              
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Year</label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="year2" id="year2_council" value="<?php echo (isset($editdata['year2']))?$editdata['year2']:"";?>"> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Treasurer?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="treasurer" id="treasurer" value="<?php //echo (isset($editdata['treasurer']))?$editdata['treasurer']:"";?>">
-->
                        <select name="treasurer" id="treasurer">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('treasurer','yes',(isset($editdata['treasurer'])&&($editdata['treasurer']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('treasurer','no',(isset($editdata['treasurer'])&&($editdata['treasurer']=='no'))?true:false);?>>No</option>  
                       </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Marshal?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="marshal" id="marshal" value="<?php //echo (isset($editdata['marshal']))?$editdata['marshal']:"";?>">
-->
                        <select name="marshal" id="marshal">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('marshal','yes',(isset($editdata['marshal'])&&($editdata['marshal']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('marshal','no',(isset($editdata['marshal'])&&($editdata['marshal']=='no'))?true:false);?>>No</option>  
                        </select>  
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Illustrious Master?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="illustrious_master" id="illustrious_master" value="<?php //echo (isset($editdata['illustrious_master']))?$editdata['illustrious_master']:"";?>">
-->
                       <select name="illustrious_master" id="illustrious_master">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('illustrious_master','yes',(isset($editdata['illustrious_master'])&&($editdata['illustrious_master']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('illustrious_master','no',(isset($editdata['illustrious_master'])&&($editdata['illustrious_master']=='no'))?true:false);?>>No</option>  
                        </select> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Capt. of the Guard?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="capt_of_guard" id="capt_of_guard" value="<?php //echo (isset($editdata['capt_of_guard']))?$editdata['capt_of_guard']:"";?>">
-->
                       <select name="capt_of_guard" id="capt_of_guard">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('capt_of_guard','yes',(isset($editdata['capt_of_guard'])&&($editdata['capt_of_guard']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('capt_of_guard','no',(isset($editdata['capt_of_guard'])&&($editdata['capt_of_guard']=='no'))?true:false);?>>No</option>  
                        </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Year</label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="year3" id="year3_council" value="<?php echo (isset($editdata['year3']))?$editdata['year3']:"";?>"> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Cond. Of the Council?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="cond_of_council" id="cond_of_council" value="<?php //echo (isset($editdata['cond_of_council']))?$editdata['cond_of_council']:"";?>" />
-->
                        <select name="cond_of_council" id="cond_of_council">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('cond_of_council','yes',(isset($editdata['cond_of_council'])&&($editdata['cond_of_council']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('cond_of_council','no',(isset($editdata['cond_of_council'])&&($editdata['cond_of_council']=='no'))?true:false);?>>No</option>  
                        </select>  
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                  <div class="col-md-4">
                  </div>
              </div> 
           </div>
              <div class="form-actions">
                 <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                       <button type="button" class="btn green" onclick="tab_view('council','council/add','add_council')">Submit</button>
                       <a href="<?php echo site_url('chapter');?>" class="btn default">Cancel</a>
                    </div>
                 </div>
              </div>

        </form>
   </div>
  </div> 
 <script>
  $(document).ready(function(){
 $("#date_joined_council").datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
     });
      $('#year1_council').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year2_council').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year3_council').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
   });  
 </script> 
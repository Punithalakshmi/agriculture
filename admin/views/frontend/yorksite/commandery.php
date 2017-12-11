  <div class="portlet box green ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-table"></i> Commendary
		</div>
	</div>
	<div class="portlet-body form">
   <form class="mt-repeater form-horizontal" name="add_commandery" id="add_commandery" method="post" enctype="multipart/form-data">
           <div class="form-body">
               <!--/row-->
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('comm_name'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Commandery Name<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="comm_name" id="comm_name" value="<?php echo set_value('comm_name',$editdata['comm_name']);?>"> 
                          <?php echo form_error('comm_name'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('top_line_signer'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Commandery Top Line Singer:<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control form-control-inline" name="top_line_signer" id="top_line_signer" value="<?php echo set_value('top_line_signer',$editdata['top_line_signer']);?>"> 
                          <?php echo form_error('top_line_signer'); ?>
                       </div>
                    </div>
                 </div>
              </div>
               <div class="row">
                 <div class="col-md-6">
                    <div class="form-group <?php echo (form_error('comm_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Commandery No<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control" name="comm_no" id="comm_no" value="<?php echo set_value('comm_no',$editdata['comm_no']);?>"> 
                          <?php echo form_error('comm_no'); ?>
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
                       <label class="control-label col-md-3">Commandery Date Joined:<span class="required">*</span></label>
                       <div class="col-md-9">
                          <input type="text" class="form-control form-control-inline" name="date_joined_commandery" id="date_joined_commandery" value="<?php echo set_value('date_joined',$editdata['date_joined']);?>"> 
                          <?php echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="clearfix"></div>
              <div class="clearfix"></div>
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php echo (form_error('master_emi_cmdr'))?'has-error':'';?>">
                       <label class="control-label col-md-3">M. Emin. Priest?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="master_emi_cmdr" id="master_emi_cmdr" value="<?php //echo (isset($editdata['master_emi_cmdr']))?$editdata['master_emi_cmdr']:"";?>">
-->
                          <select name="master_emi_cmdr" id="master_emi_cmdr">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('master_emi_cmdr','yes',(isset($editdata['master_emi_cmdr'])&&($editdata['master_emi_cmdr']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('master_emi_cmdr','no',(isset($editdata['master_emi_cmdr'])&&($editdata['master_emi_cmdr']=='no'))?true:false);?>>No</option>  
                          </select>  
                          <?php echo form_error('master_emi_cmdr'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Generalsmo?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="generalsmo" id="generalsmo" value="<?php //echo (isset($editdata['generalsmo']))?$editdata['generalsmo']:"";?>">
-->
                          <select name="generalsmo" id="generalsmo">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('generalsmo','yes',(isset($editdata['generalsmo'])&&($editdata['generalsmo']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('generalsmo','no',(isset($editdata['generalsmo'])&&($editdata['generalsmo']=='no'))?true:false);?>>No</option>  
                          </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Prebate?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="prebate" id="prebate" value="<?php //echo (isset($editdata['prebate']))?$editdata['prebate']:"";?>">
-->
                           <select name="prebate" id="prebate">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('prebate','yes',(isset($editdata['prebate'])&&($editdata['prebate']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('prebate','no',(isset($editdata['prebate'])&&($editdata['prebate']=='no'))?true:false);?>>No</option>  
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
                          <input type="text" class="form-control" name="year1" id="year1_commandery" value="<?php echo (isset($editdata['year1']))?$editdata['year1']:"";?>"> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Capt. General?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="capt_general" id="capt_general" value="<?php //echo (isset($editdata['capt_general']))?$editdata['capt_general']:"";?>">
-->
                           <select name="capt_general" id="capt_general">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('capt_general','yes',(isset($editdata['capt_general'])&&($editdata['capt_general']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('capt_general','no',(isset($editdata['capt_general'])&&($editdata['capt_general']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Sword Bearer?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="sword_bearer" id="sword_bearer" value="<?php //echo (isset($editdata['sword_bearer']))?$editdata['sword_bearer']:"";?>" />
-->
                          <select name="sword_bearer" id="sword_bearer">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('sword_bearer','yes',(isset($editdata['sword_bearer'])&&($editdata['sword_bearer']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('sword_bearer','no',(isset($editdata['sword_bearer'])&&($editdata['sword_bearer']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>  
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Dist. Emin. Master?</label><span class="required">*</span>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="district_emi_cmdr" id="district_emi_cmdr" value="<?php //echo (isset($editdata['district_emi_cmdr']))?$editdata['district_emi_cmdr']:"";?>">
-->
                          <select name="district_emi_cmdr" id="district_emi_cmdr">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('district_emi_cmdr','yes',(isset($editdata['district_emi_cmdr'])&&($editdata['district_emi_cmdr']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('district_emi_cmdr','no',(isset($editdata['district_emi_cmdr'])&&($editdata['district_emi_cmdr']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php echo form_error('district_emi_cmdr'); ?>
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
                       <label class="control-label col-md-3">Stand Bearer?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="stand_bearer" id="stand_bearer" value="<?php //echo (isset($editdata['stand_bearer']))?$editdata['stand_bearer']:"";?>">
-->
                          <select name="stand_bearer" id="stand_bearer">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('stand_bearer','yes',(isset($editdata['stand_bearer'])&&($editdata['stand_bearer']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('stand_bearer','no',(isset($editdata['stand_bearer'])&&($editdata['stand_bearer']=='no'))?true:false);?>>No</option>  
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
                          <input type="text" class="form-control" name="year2" id="year2_commandery" value="<?php echo (isset($editdata['year2']))?$editdata['year2']:"";?>"> 
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
                       <label class="control-label col-md-3">Warden?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="warden" id="warden" value="<?php //echo (isset($editdata['warden']))?$editdata['warden']:"";?>">
-->
                          <select name="warden" id="warden">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('warden','yes',(isset($editdata['warden'])&&($editdata['warden']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('warden','no',(isset($editdata['warden'])&&($editdata['warden']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Eminent Cmdr?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control" name="emi_cmdr" id="emi_cmdr" value="<?php //echo (isset($editdata['emi_cmdr']))?$editdata['emi_cmdr']:"";?>">
-->
                          <select name="emi_cmdr" id="emi_cmdr">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('emi_cmdr','yes',(isset($editdata['emi_cmdr'])&&($editdata['emi_cmdr']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('emi_cmdr','no',(isset($editdata['emi_cmdr'])&&($editdata['emi_cmdr']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Senior Warden?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="sr_warden" id="sr_warden" value="<?php //echo (isset($editdata['sr_warden']))?$editdata['sr_warden']:"";?>">
-->
                          <select name="sr_warden" id="sr_warden">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('sr_warden','yes',(isset($editdata['sr_warden'])&&($editdata['sr_warden']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('sr_warden','no',(isset($editdata['sr_warden'])&&($editdata['sr_warden']=='no'))?true:false);?>>No</option>  
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
-->
                           <select name="sentinel" id="sentinel">
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
                          <input type="text" class="form-control" name="year3" id="year3_commandery" value="<?php echo (isset($editdata['year3']))?$editdata['year3']:"";?>"> 
                          <?php //echo form_error('district_no'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4">
                    <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                       <label class="control-label col-md-3">Junior Warden?</label>
                       <div class="col-md-9">
                          <!--
<input type="text" class="form-control form-control-inline" name="jr_warden" id="jr_warden" value="<?php //echo (isset($editdata['jr_warden']))?$editdata['jr_warden']:"";?>">
-->
                          <select name="jr_warden" id="jr_warden">
                              <option>select</option>
                              <option value="yes" <?php echo set_select('jr_warden','yes',(isset($editdata['jr_warden'])&&($editdata['jr_warden']=='yes'))?true:false);?>>Yes</option>
                              <option value="no" <?php echo set_select('jr_warden','no',(isset($editdata['jr_warden'])&&($editdata['jr_warden']=='no'))?true:false);?>>No</option>  
                           </select> 
                          <?php //echo form_error('date_joined'); ?>
                       </div>
                    </div>
                 </div>
                 <div class="col-md-4"></div>
              </div> 
           </div>
              <div class="form-actions">
                 <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                       <button type="button" class="btn green" onclick="tab_view('commandery','commandery/add','add_commandery')">Submit</button>
                       <a href="<?php echo site_url('chapter');?>" class="btn default">Cancel</a>
                    </div>
                 </div>
              </div>

        </form>
   </div>
   </div>
 <script>
  $(document).ready(function(){
    
 $("#date_joined_commandery").datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
     });
      $('#year1_commandery').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year2_commandery').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year3_commandery').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
   });  
 </script>  
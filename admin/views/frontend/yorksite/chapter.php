<div class="portlet box green ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-table"></i> Chapter
		</div>
	</div>
	<div class="portlet-body form">
    <form class="form-horizontal" name="add_chapter" id="add_chapter" method="post" enctype="multipart/form-data">
      <div class="form-body">
         <!--/row-->
        <div class="row">
           <div class="col-md-6">
              <div class="form-group <?php echo (form_error('chapter_name'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Chapter Name<span class="required">*</span></label>
                 <div class="col-md-9">
                    <input type="text" class="form-control" name="chapter_name" id="chapter_name" value="<?php echo set_value('chapter_name',$editdata['chapter_name']);?>"> 
                    <?php echo form_error('chapter_name'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-6">
              <div class="form-group <?php echo (form_error('top_line_signer'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Chapter Top Line Singer:<span class="required">*</span></label>
                 <div class="col-md-9">
                    <input type="text" class="form-control form-control-inline" name="top_line_signer" id="top_line_signer" value="<?php echo set_value('top_line_signer',$editdata['top_line_signer']);?>"> 
                    <?php echo form_error('top_line_signer'); ?>
                 </div>
              </div>
           </div>
        </div>
         <div class="row">
           <div class="col-md-6">
              <div class="form-group <?php echo (form_error('chapter_no'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Chapter No<span class="required">*</span></label>
                 <div class="col-md-9">
                    <input type="text" class="form-control" name="chapter_no" id="chapter_no" value="<?php echo set_value('chapter_no',$editdata['chapter_no']);?>"> 
                    <?php echo form_error('chapter_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-6">
              <div class="form-group <?php //echo (form_error('second_line_signer'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Second Line Singer:<span class="required">*</span></label>
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
                 <label class="control-label col-md-3">Date Joined:<span class="required">*</span></label>
                 <div class="col-md-9">
                    <input type="text" class="form-control form-control-inline" name="date_joined_chapter" id="date_joined_chapter" value="<?php echo set_value('date_joined',$editdata['date_joined']);?>" /> 
                    <?php echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
        </div>
        <div class="row">
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Most High Priest?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control" name="most_high_priest" id="most_high_priest" value="<?php //echo (isset($editdata['most_high_priest']))?$editdata['most_high_priest']:"";?>" />
-->
                    <select name="most_high_priest" id="most_high_priest">
                      <option>select</option>
                      <option value="yes" <?php echo set_select('most_high_priest','yes',(isset($editdata['most_high_priest'])&&($editdata['most_high_priest']=='yes'))?true:false);?>>Yes</option>
                      <option value="no" <?php echo set_select('most_high_priest','no',(isset($editdata['most_high_priest'])&&($editdata['most_high_priest']=='no'))?true:false);?>>No</option>
                    </select> 
                    <?php //echo form_error('district_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">King?<span class="required">*</span></label>
                 <div class="col-md-9">
                    
                     <select name="king" id="king">
                      <option>select</option>
                      <option value="yes" <?php echo set_select('king','yes',(isset($editdata['king'])&&($editdata['king']=='yes'))?true:false);?>>Yes</option>
                      <option value="no" <?php echo set_select('king','no',(isset($editdata['king'])&&($editdata['king']=='no'))?true:false);?>>No</option>
                    </select>  
                    <?php //echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">R.A Captain?</label>
                 <div class="col-md-9">
                    
                     <select name="ra_captain" id="ra_captain">
                      <option>select</option>
                      <option value="yes" <?php echo set_select('ra_captain','yes',(isset($editdata['ra_captain'])&&($editdata['ra_captain']=='yes'))?true:false);?>>Yes</option>
                      <option value="no" <?php echo set_select('ra_captain','no',(isset($editdata['ra_captain'])&&($editdata['ra_captain']=='no'))?true:false);?>>No</option>
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
                    <input type="text" class="form-control" name="year1" id="year1" value="<?php echo (isset($editdata['year1']))?$editdata['year1']:"";?>"> 
                    <?php //echo form_error('district_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Scribe?</label>
                 <div class="col-md-9">
                    <select name="scribe" id="scribe">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('scribe','yes',(isset($editdata['scribe'])&&($editdata['scribe']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('scribe','no',(isset($editdata['scribe'])&&($editdata['scribe']=='no'))?true:false);?>>No</option>  
                    </select>
                    <!--
<input type="text" class="form-control form-control-inline" name="scribe" id="scribe" value="<?php //echo (isset($editdata['scribe']))?$editdata['scribe']:"";?>">
--> 
                    <?php //echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Master 3rd Vef?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="master_vef_3" id="master_vef_3" value="<?php //echo (isset($editdata['master_vef_3']))?$editdata['master_vef_3']:"";?>">
-->
                     <select name="master_vef_3" id="master_vef_3">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('master_vef_3','yes',(isset($editdata['master_vef_3'])&&($editdata['master_vef_3']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('master_vef_3','no',(isset($editdata['master_vef_3'])&&($editdata['master_vef_3']=='no'))?true:false);?>>No</option>  
                    </select>
                    <?php //echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
        </div>  
        <div class="row">
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                 <label class="control-label col-md-3">District High Priest?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control" name="district_high_priest" id="district_high_priest" value="<?php //echo (isset($editdata['district_high_priest']))?$editdata['district_high_priest']:"";?>">
-->
                     <select name="district_high_priest" id="district_high_priest">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('district_high_priest','yes',(isset($editdata['district_high_priest'])&&($editdata['district_high_priest']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('district_high_priest','no',(isset($editdata['district_high_priest'])&&($editdata['district_high_priest']=='no'))?true:false);?>>No</option>  
                    </select> 
                    <?php //echo form_error('district_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Secretary?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="secretary" id="secretary" value="<?php //echo (isset($editdata['secretary']))?$editdata['secretary']:"";?>">
-->
                     <select name="secretary" id="secretary">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('secretary','yes',(isset($editdata['secretary'])&&($editdata['secretary']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('secretary','no',(isset($editdata['secretary'])&&($editdata['secretary']=='no'))?true:false);?>>No</option>  
                    </select> 
                    <?php //echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Master 2nd Vef?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="master_vef_2" id="master_vef_2" value="<?php //echo (isset($editdata['master_vef_2']))?$editdata['master_vef_2']:"";?>">
-->
                    <select name="master_vef_2" id="master_vef_2">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('master_vef_2','yes',(isset($editdata['master_vef_2'])&&($editdata['master_vef_2']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('master_vef_2','no',(isset($editdata['master_vef_2'])&&($editdata['master_vef_2']=='no'))?true:false);?>>No</option>  
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
                    <input type="text" class="form-control" name="year2" id="year2" value="<?php echo (isset($editdata['year2']))?$editdata['year2']:"";?>"> 
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
                 <label class="control-label col-md-3">Master 1st Vef?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="master_vef_1" id="master_vef_1" value="<?php //echo (isset($editdata['master_vef_1']))?$editdata['master_vef_1']:"";?>">
-->
                    <select name="master_vef_1" id="master_vef_1">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('master_vef_1','yes',(isset($editdata['master_vef_1'])&&($editdata['master_vef_1']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('master_vef_1','no',(isset($editdata['master_vef_1'])&&($editdata['master_vef_1']=='no'))?true:false);?>>No</option>  
                    </select> 
                    <?php //echo form_error('date_joined'); ?>
                 </div>
              </div>
           </div>
        </div>
        <div class="row">
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('district_no'))?'has-error':'';?>">
                 <label class="control-label col-md-3">High Priest?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control" name="hight_priest" id="hight_priest" value="<?php //echo (isset($editdata['hight_priest']))?$editdata['hight_priest']:"";?>">
-->
                     <select name="hight_priest" id="hight_priest">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('hight_priest','yes',(isset($editdata['hight_priest'])&&($editdata['hight_priest']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('hight_priest','no',(isset($editdata['hight_priest'])&&($editdata['hight_priest']=='no'))?true:false);?>>No</option>  
                    </select>
                    <?php //echo form_error('district_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Capt.Host?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="capt_host" id="capt_host" value="<?php //echo (isset($editdata['capt_host']))?$editdata['capt_host']:"";?>">
-->
                    <select name="capt_host" id="capt_host">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('capt_host','yes',(isset($editdata['capt_host'])&&($editdata['capt_host']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('capt_host','no',(isset($editdata['capt_host'])&&($editdata['capt_host']=='no'))?true:false);?>>No</option>  
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
                 <label class="control-label col-md-3">Year</label>
                 <div class="col-md-9">
                    <input type="text" class="form-control" name="year3" id="year3" value="<?php echo (isset($editdata['year3']))?$editdata['year3']:"";?>"> 
                    <?php //echo form_error('district_no'); ?>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="form-group <?php //echo (form_error('date_joined'))?'has-error':'';?>">
                 <label class="control-label col-md-3">Principal Sojourner?</label>
                 <div class="col-md-9">
                    <!--
<input type="text" class="form-control form-control-inline" name="principal_sojourner" id="principal_sojourner" value="<?php //echo (isset($editdata['principal_sojourner']))?$editdata['principal_sojourner']:"";?>">
-->
                    <select name="principal_sojourner" id="principal_sojourner">
                          <option>select</option>
                          <option value="yes" <?php echo set_select('principal_sojourner','yes',(isset($editdata['principal_sojourner'])&&($editdata['principal_sojourner']=='yes'))?true:false);?>>Yes</option>
                          <option value="no" <?php echo set_select('principal_sojourner','no',(isset($editdata['principal_sojourner'])&&($editdata['principal_sojourner']=='no'))?true:false);?>>No</option>  
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
      </div>
      <div class="form-actions">
         <div class="row">
            <div class="col-md-offset-3 col-md-9">
               <button type="button" class="btn green" onclick="tab_view('chapter','chapter/add','add_chapter')">Submit</button>
               <a href="<?php echo site_url('chapter');?>" class="btn default">Cancel</a>
            </div>
         </div>
      </div>
    </form>
  </div>
</div>
<script>
 $(document).ready(function(){
    
     $('#date_joined_chapter').datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
     }); 
      $('#year1').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year2').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
      $('#year3').datepicker({
        autoclose: true,  
         minViewMode: 2,
        format: "yyyy"
     }); 
 });
 
</script>     
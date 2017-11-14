<div class="portlet box green ">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-table"></i> Personal Info Form
		</div>
	</div>

	<div class="portlet-body form">
		<form class="form-horizontal" id="add_profile" name="add_profile" method="post" action="" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$editdata['info']['user_id'];?>">
			<div class="form-body">
				<div class="row">
					<div class="col-md-3 <?=(form_error('mason'))?'has-error':'';?>">
						<label class="control-label">Mason<span class="required">*</span></label>
						<?php echo form_dropdown('mason', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('mason', $editdata['personal']['mason']), 'class="form-control width_select"');?>
						<?=form_error('mason');?>
					</div>
					<div class="col-md-3 <?=(form_error('status'))?'has-error':'';?>">
						<label class="control-label">Status<span class="required">*</span></label>
						<?php echo form_dropdown('status', array('' => '-None-',"Active"=>"Active","Inactive"=>"Inactive"), set_value('status', $editdata['info']['status']), 'class="form-control width_select"');?>
						<?=form_error('status');?>
					</div>
					<div class="col-md-3 <?=(form_error('is_admin'))?'has-error':'';?>">
						<label class="control-label">Is Admin?<span class="required">*</span></label>
						<?php echo form_dropdown('is_admin', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('is_admin', $editdata['info']['is_admin']), 'class="form-control width_select"');?>
						<?=form_error('is_admin');?>
					</div>
					<div class="col-md-3">
						<label class="control-label">Password</label>
						<input class="form-control" placeholder="" type="password" name="password" value="<?=set_value('password');?>">
					</div>
				</div>
				<h3>Personal Details</h3>
				<div class="row">
					<div class="col-md-4 <?=(form_error('first_name'))?'has-error':'';?>">
						<label class="control-label">First Name<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="first_name" value="<?=set_value('first_name',$editdata['info']['first_name']);?>">
						<?=form_error('first_name');?>
					</div>
					<div class="col-md-4">
						<label class="control-label">Middle Name</label>
						<input class="form-control" placeholder="" type="text" name="middle_name" value="<?=set_value('middle_name',$editdata['info']['middle_name']);?>">
						<?=form_error('middle_name');?>
					</div>
					<div class="col-md-4 <?=(form_error('last_name'))?'has-error':'';?>">
						<label class="control-label">Last Name<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="last_name" value="<?=set_value('last_name',$editdata['info']['last_name']);?>">
						<?=form_error('last_name');?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">Mobile</label>
						<input class="form-control" placeholder="" type="text" name="mobile" value="<?=set_value('mobile',$editdata['personal']['mobile']);?>">
					</div>
					<div class="col-md-4 <?=(form_error('phone'))?'has-error':'';?>">
						<label class="control-label">Home<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="phone" value="<?=set_value('phone',$editdata['info']['phone']);?>">
						<?=form_error('phone');?>
					</div>
					<div class="col-md-4">
						<label class="control-label">Work</label>
						<input class="form-control" placeholder="" type="text" name="work" value="<?=set_value('work',$editdata['personal']['work']);?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">Office Email</label>
						<input class="form-control" placeholder="" type="text" name="off_email" value="<?=set_value('off_email',$editdata['personal']['off_email']);?>">
					</div>
					<div class="col-md-4 <?=(form_error('email'))?'has-error':'';?>">
						<label class="control-label">Personal Email<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="email" value="<?=set_value('email',$editdata['info']['email']);?>">
						<?=form_error('email');?>
					</div>
					<div class="col-md-4 <?=(form_error('dob'))?'has-error':'';?>">
						<label class="control-label">D.O.B<span class="required">*</span></label>
						<input class="form-control singledate" type="text" name="dob" value="<?=set_value('dob',date("m/d/Y",strtotime($editdata['personal']['dob'])));?>">
						<?=form_error('dob');?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 <?=(form_error('b_state'))?'has-error':'';?>">
						<label class="control-label">Birth (City)<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="b_city" value="<?=set_value('b_city',$editdata['personal']['b_city']);?>">
						<?=form_error('b_city');?>
					</div>
					<div class="col-md-4 <?=(form_error('b_state'))?'has-error':'';?>">
						<label class="control-label">Birth (State)<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="b_state" value="<?=set_value('b_state',$editdata['personal']['b_state']);?>">
						<?=form_error('b_state');?>
					</div>
					<div class="col-md-4">
						<label class="control-label">Home Blue Lodge</label>
						<input class="form-control" placeholder="" type="text" name="home_blue_lodge" value="<?=set_value('home_blue_lodge',$editdata['info']['home_blue_lodge']);?>">
					</div>
					<div class="col-md-4">
						<label class="control-label">Photo</label>
						<input class="form-control" placeholder="" type="file" name="userfile" id="userfile">
					</div>
				</div>
				<h3>Home Address</h3>
				<div class="row">
					<div class="col-md-4 <?=(form_error('address1'))?'has-error':'';?>">
						<label class="control-label">Address 1<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="address1" value="<?=set_value('address1',$editdata['home_address']['address1']);?>">
						<?=form_error('address1');?>
					</div>
					<div class="col-md-4">
						<label class="control-label">Address 2</span></label>
						<input class="form-control" placeholder="" type="text" name="address2" value="<?=set_value('address2',$editdata['home_address']['address2']);?>">
					</div>
					<div class="col-md-4 <?=(form_error('city'))?'has-error':'';?>">
						<label class="control-label">City<span class="required">*</span></label>
						<input class="form-control" type="text" name="city" value="<?=set_value('city',$editdata['home_address']['city']);?>">
						<?=form_error('city');?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 <?=(form_error('state'))?'has-error':'';?>">
						<label class="control-label">State<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="state" value="<?=set_value('state',$editdata['home_address']['state']);?>">
						<?=form_error('state');?>
					</div>
					<div class="col-md-4 <?=(form_error('zip'))?'has-error':'';?>">
						<label class="control-label">Zipcode<span class="required">*</span></label>
						<input class="form-control" placeholder="" type="text" name="zip" value="<?=set_value('zip',$editdata['home_address']['zip']);?>">
						<?=form_error('state');?>
					</div>
				</div>
				<h3>Work Address</h3>
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">Address 1</label>
						<input class="form-control" placeholder="" type="text" name="w_address1" value="<?=set_value('w_address1',$editdata['work_address']['w_address1']);?>">
					</div>
					<div class="col-md-4">
						<label class="control-label">Address 2</span></label>
						<input class="form-control" placeholder="" type="text" name="w_address2" value="<?=set_value('w_address2',$editdata['work_address']['w_address2']);?>">
					</div>
					<div class="col-md-4">
						<label class="control-label">City</label>
						<input class="form-control" type="text" name="w_city" value="<?=set_value('w_city',$editdata['work_address']['w_city']);?>">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label class="control-label">State</label>
						<input class="form-control" placeholder="" type="text" name="w_state" value="<?=set_value('w_state',$editdata['work_address']['w_state']);?>">
					</div>
					<div class="col-md-4">
						<label class="control-label">Zipcode</label>
						<input class="form-control" placeholder="" type="text" name="w_zip" value="<?=set_value('w_zip',$editdata['work_address']['w_zip']);?>">
					</div>
				</div>
				<h3>Affiliations</h3>
				<div class="row">
					<div class="col-md-3 <?=(form_error('york_rite'))?'has-error':'';?>">
						<label class="control-label">York Rite?<span class="required">*</span></label>
						<?php echo form_dropdown('york_rite', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('york_rite', $editdata['affiliations']['york_rite']), 'class="form-control width_select"');?>
						<?=form_error('york_rite');?>
					</div>
					<div class="col-md-3">
						<label class="control-label">Scottish Rite?</label>
						<?php echo form_dropdown('scottish_rite', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('scottish_rite', $editdata['affiliations']['scottish_rite']), 'class="form-control width_select"');?>
						<?=form_error('scottish_rite');?>
					</div>
					<div class="col-md-3">
						<label class="control-label">Shriner?</label>
						<?php echo form_dropdown('shriner', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('shriner', $editdata['affiliations']['shriner']), 'class="form-control width_select"');?>
					</div>
					<div class="col-md-3">
						<label class="control-label">Grotto?</label>
						<?php echo form_dropdown('grotto', array('' => '-None-',"Yes"=>"Yes","No"=>"No"), set_value('grotto', $editdata['affiliations']['grotto']), 'class="form-control width_select"');?>
					</div>
				</div>
				<h3>Family</h3>
				<div class="row">
					<div class="col-md-3">
						<label class="control-label">Spouse</label>
						<input class="form-control" placeholder="" type="text" name="spouse" value="<?=set_value('spouse',$editdata['family']['spouse']);?>">
					</div>
					<div class="col-md-3">
						<label class="control-label">Kids</label>
						<input class="form-control" placeholder="" type="text" name="kids1" value="<?=set_value('kids1',$editdata['kids1']);?>">
					</div>
					<div class="col-md-3">
						<label class="control-label">&nbsp;</label>
						<input class="form-control" placeholder="" type="text" name="kids2" value="<?=set_value('kids2',$editdata['kids2']);?>">
					</div>
					<div class="col-md-3">
						<label class="control-label">&nbsp;</label>
						<input class="form-control" placeholder="" type="text" name="kids3" value="<?=set_value('kids3',$editdata['kids3']);?>">
					</div>
				</div>
			</div>
			<div class="form-actions">
					<div class="row">
						<div class="col-md-offset-3 col-md-9">
							<button type="button" class="btn green" onclick="tab_view('personal_info','personal_info/add','add_profile')">Submit</button>
							<a href="<?=site_url('personal_info');?>" class="btn default">Cancel</a>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	init_datepicker();
</script>
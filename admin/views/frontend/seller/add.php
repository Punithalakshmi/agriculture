<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Add Seller
			</h3>
			<div class="page-bar">
				 <?php echo set_breadcrumb(); ?>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 ">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table"></i> Seller Form
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form" method="post" action="">
								

						<div class="col-lg-6">

                         <div class="form-group">
										<label class="col-md-3 control-label">First Name</label>
										<div class="col-md-5 <?=(form_error('first_name'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="First Name" name="first_name"
											 value="<?php echo set_value('first_name',$editdata['first_name']);?>">
											<?=form_error('first_name');?>
										</div>
									</div>

									 <div class="form-group">
										<label class="col-md-3 control-label">Last Name</label>
										<div class="col-md-5 <?=(form_error('last_name'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="First Name" name="last_name"
											 value="<?php echo set_value('last_name',$editdata['last_name']);?>">
											<?=form_error('last_name');?>
										</div>
									</div>
									 <div class="form-group">
										<label class="col-md-3 control-label">Zip </label>
										<div class="col-md-5 <?=(form_error('zip'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Zip" name="zip"
											 value="<?php echo set_value('zip',$editdata['zip']);?>">
											<?=form_error('zip');?>
										</div>
									</div>
									 <div class="form-group">
										<label class="col-md-3 control-label">Address</label>
										<div class="col-md-5 <?=(form_error('address'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Address" name="address"
											 value="<?php echo set_value('address',$editdata['address']);?>">
											<?=form_error('address');?>
										</div>
									</div>

                         </div>
                         <div class="col-lg-6">

                          <div class="form-group">
										<label class="col-md-3 control-label">Address2</label>
										<div class="col-md-5 <?=(form_error('address2'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Address2" name="address2"
											 value="<?php echo set_value('address2',$editdata['address2']);?>">
											<?=form_error('address2');?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-5 <?=(form_error('email'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="email" name="email"
											 value="<?php echo set_value('email',$editdata['email']);?>">
											<?=form_error('email');?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Phone</label>
										<div class="col-md-5 <?=(form_error('phone'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="Phone" name="first_name"
											 value="<?php echo set_value('phone',$editdata['phone']);?>">
											<?=form_error('phone');?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">City</label>
										<div class="col-md-5 <?=(form_error('city'))?'has-error':'';?>">
											<input type="text" class="form-control" placeholder="City" name="first_name"
											 value="<?php echo set_value('phone',$editdata['city']);?>">
											<?=form_error('city');?>
										</div>
									</div>

                         </div>

								<input type="hidden" name="edit_id" class="form-control" id="edit_id" value="<?php //echo $editdata['id'];?>">

								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<a href="<?=site_url('seller');?>" class="btn default">Cancel</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>



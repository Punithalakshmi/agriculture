		<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Profile
			</h3>
			<div class="page-bar">
				 <?php echo set_breadcrumb(); ?>
			</div>
			<div class="blue-mat"></div>
			<!-- END PAGE HEADER-->
		
			<?php display_flashmsg($this->session->flashdata()); ?>
			<div class="row">
				<div class="col-md-3">
				<div class="portlet light profile-sidebar-portlet">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="<?=base_path();?><?=($editdata['info']['photo']!='')?$editdata['info']['photo']:"assets/img/photo3.jpg";?>" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?=$editdata['info']['first_name']." ".$editdata['info']['last_name'];?>
						</div>
					</div>
					<div class="row padding-10">
						<div class="col-md-12">
							<div class="profile-usermenu">						
								<ul class="nav">
									<li>
										<div class="form-group">
											<label class="control-label">Phone</label><br>
											<b><?=$editdata['info']['phone'];?></b>
										</div>
									</li>
									<li>
										<div class="form-group">
											<label class="control-label">Email</label><br>
											<b><?=$editdata['info']['email'];?></b>
										</div>
									</li>
									<li>
										<div class="form-group">
											<label class="control-label">Home Blue Lodge</label><br>
											<b><?=$editdata['info']['home_blue_lodge'];?></b>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- END MENU -->
				</div>
				</div>	
				<div class="col-md-9">
					<ul class="nav nav-tabs">
		        <li class="active"><a data-toggle="tab" id="tab1" href="#personal_info" onclick="tab_view('personal_info','personal_info/add','')">Profile</a></li>
		        <?php
						$user = get_user_info();
						if($user['info']['role_id']=="5"){?>
		        <li><a data-toggle="tab" href="#york" onclick="tab_view('council','council/add','')">York Rite</a></li>
		        <li><a data-toggle="tab" href="#scottish" onclick="tab_view('scottish','commandery/add','')">Scottish Rite</a></li>
		        <li><a data-toggle="tab" href="#shriners" onclick="tab_view('shriners','commandery/add','')">Shriners</a></li>
		        <li><a data-toggle="tab" href="#grotto" onclick="tab_view('grotto','commandery/add','')">Grotto</a></li>
		        <li><a data-toggle="tab" href="#lodge" onclick="tab_view('lodge','commandery/add','')">Blue Lodge</a></li>
		        <?php }?>
		      </ul>
		      <div class="tab-content">
		      	<div id="personal_info" class="tab-pane fade in active">		      		
		      	</div>
		      	<div id="york" class="tab-pane">
		      		<ul class="nav nav-tabs">
	              <li class="active"><a data-toggle="tab" id="tab1" href="#chapter" onclick="tab_view('chapter','chapter/add','')">Chapter</a></li>
	              <li><a data-toggle="tab" href="#council" onclick="tab_view('council','council/add','')" >Council</a></li>
	              <li><a data-toggle="tab" href="#commandery" onclick="tab_view('commandery','commandery/add','')">Commendary</a></li>
	            </ul>
	            
		      	</div>
		      	<div id="scottish" class="tab-pane">
		      	</div>
		      	<div id="shriners" class="tab-pane">
		      	</div>
		      	<div id="grotto" class="tab-pane">
		      	</div>
		      	<div id="lodge" class="tab-pane">
		      	</div>
		      </div>
		    </div>
		</div>
	</div>	

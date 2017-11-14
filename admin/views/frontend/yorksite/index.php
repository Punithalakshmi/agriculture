<div class="page-content-wrapper">
		<div class="page-content">
            <!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			 Yorksite
			</h3>
			<div class="page-bar">
				 <?php echo set_breadcrumb(); ?>
			</div>
			<div class="blue-mat"></div>
			<!-- END PAGE HEADER-->
		
			<?php display_flashmsg($this->session->flashdata()); ?>	
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" id="tab1" href="#chapter" onclick="tab_view('chapter','chapter/add','')">Chapter</a></li>
              <li><a data-toggle="tab" href="#council" onclick="tab_view('council','council/add','')" >Council</a></li>
              <li><a data-toggle="tab" href="#commandery" onclick="tab_view('commandery','commandery/add','')">Commendary</a></li>
            </ul>
            
            <div class="tab-content">
             <div id="chapter" class="tab-pane fade in active">
               
             </div>
             <div id="council" class="tab-pane">
             
             </div>
             <div id="commandery"  class="tab-pane">
             
             </div>
            </div>
        </div>
 </div>           

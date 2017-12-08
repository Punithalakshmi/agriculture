  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
     
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
                <i class="fa fa-table"></i> Subscription View
              </div>
            </div>
            <div class="portlet-body form">
              
                <div class="form-body">
                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Seller Name : </label>
                    <span class="bold"> Sathish M</span>
                  </div>

                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Plan : </label>
                    <span class="bold"> Test Plan</span>                   
                  </div>

                  <div class="form-group col-md-4" style="padding-top:20px;">
                    <label class="control-label">Account Id : </label>
                    <span class="bold"> #25</span>                   
                  </div>

              
              <hr/>
            <hr>
            <div class="form-group"><h4>Payment Information</h4></div>
            <hr>
            <table class="table table-striped" cellpadding="0" cellspacing="0" id="table-orders">
                <thead>
                <th>#</th>
                <th>Payment Id</th>
                <th>Amount</th>
                <th>Status</th>
                </thead>
              
                        <tbody>
                        <tr>
                        <td>1</td>
                        <td>20</td>
                        <td>$ 500</td>
                        <td>Paid</td>
                        </tr> 
                         <tr>
                        <td>2</td>
                        <td>21</td>
                        <td>$ 1000</td>
                        <td>Paid</td>
                        </tr> 
                         <tr>
                        <td>3</td>
                        <td>22</td>
                        <td>$ 2000</td>
                        <td>Paid</td>
                        </tr> 

                        </tbody>
               
            </table>

            <div class="form-actions">
              <div class="row">
                    <div class="col-md-offset-0 col-md-9">
                      <a href="<?=site_url('Subscription');?>" class="btn default">Back</a>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT -->
    </div>
  </div>




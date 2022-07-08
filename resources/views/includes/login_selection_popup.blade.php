<!--Start: Model popup box for login selection-->

<div class="modal fade" role="dialog" id="login_selection_popup">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Login</h3>
        </div>
        <div class="modal-body m-loginbox">

            <div class="col-lg-6 text-center">
              <a href="{{ asset('customer/login'); ?>">  
                <img src="{{ asset('images/customer.png'); ?>">  
                <p>Are you a customer ? </p>
               </a>
             </div>
             <div class="col-lg-6 text-center">
              <a href="{{ asset('counselor/login'); ?>">   
              <img src="{{ asset('images/counselor.png'); ?>">   
              <p>Are you a Counselor ? </p>
              </a>
             </div>
             <div class="col-lg-12 text-center">
              <a href="{{ asset('healthcare_professional/login'); ?>">   
              <img src="{{ asset('images/provider.png'); ?>">   
              <p>Are you a Provider ? </p>
              </a>
               </div>            
        </div>
        <div class="modal-footer bor-none">
<!--          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<!--End: Model popup box --> 
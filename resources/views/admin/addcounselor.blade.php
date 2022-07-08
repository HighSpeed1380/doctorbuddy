@extends('layouts.adminlayout')
@section('content')

<div class="">
<!--    <div class="page-title">
        <div class="title_left">
            <h3>Add Counselor</h3>
        </div>
    </div>-->
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Counselor <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">

                    <form action="javascript:add_counselor();" class="form-horizontal form-label-left" novalidate  method="post"  id="add_counselor_form">
                        
                        <div  class="col-md-12 col-sm-12 col-xs-12">
                            <div id="message"  class="hide  col-md-12 col-sm-12 col-xs-12 m-b-lg">
                                <div id="message-text"></div>
                            </div>
                            <div  class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_firstname" name="counselors_firstname"  required="required" title="First Name" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Middle Name 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_middlename" name="counselors_middlename"   title="Middle Name" class="form-control" type="text">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_lastname" name="counselors_lastname"  required="required" title="Last Name" class="form-control" type="text">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="counselors_email_id" name="counselors_email_id" required="required" title="Email" class="form-control" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Password<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="password" name="password" required="required" title="Password" class="form-control" type="password"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Repeat Password<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="password2"  data-validate-linked="password" name="password2"  required="required" title="Repeat Password" class="form-control"  type="password">
                                    </div>
                                </div>                                 
                                  
 
                                
                            
                            </div>
                            
                            
                            <div  class="col-md-6 col-sm-6 col-xs-12">
 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <?php if(count($data['countries'])>0){ ?>
                                            <select class="required form-control" name="counselor_country" title="Country"  id="counselor_country" onchange="javascript:getCountryState(this);">
                                            <option value="" >Select Country</option>
                                            <?php 
                                            foreach($data['countries'] as $country){  ?>
                                                <option value="<?php echo $country->country_id ;?>" phone_code="<?php echo $country->phoneCode ;?>"><?php echo $country->countryname;?></option>
                                            <?php } ?>
                                            </select>
                                        <?php } ?> 
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        State <span class="required">*</span>
                                    </label>
                                    <div id="state_1" class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <select class="form-control" name="counselor_state_select" title="State"  id="counselor_state_select"></select>
                                    </div>
                                    <div id="state_2" style="display:none" class="col-md-6 col-sm-6 col-xs-12 item "></div>                                    
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        City/Area <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="counselors_city" name="counselors_city" title="City" class="form-control" type="text" required="required">
                                    </div>
                                </div>                                

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="col-md-4 col-sm-4 col-xs-4 item no-padding">
                                            <input id="counselors_phone_code" name="counselors_phone_code" value=""    required="required" title="code" class="form-control" type="text"> 
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 item left-padr0">
                                            <input id="counselors_phone" name="counselors_phone" value="" max="9999999999999"  maxlength="13" required="required" title="Phone" class="form-control" type="number"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Zipcode<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_zip" name="counselors_zip"  required="required" title="Zipcode" class="form-control"  maxlength="11"  type="text">
                                    </div>
                                </div>                                
                           
                            </div>
                            <div  class="col-md-12 col-sm-12 col-xs-12">
                                <div class="ln_solid"></div>
                                <div class="form-group text-right">
                                        <a href="<?php echo $data['site_url'] ?>/admin/counselor">
                                            <button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-success" name="add" id="add" href="add_counselor">Add</button>
                                        <input type="hidden" name="form_submit" value="save">                                
                                </div>
                            </div>                             
                            
                        </div>    

                    </form>


                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/admin/add_counselor.js'); ?>"></script>

@stop

@extends('layouts.adminlayout')
@section('content')

<div class="">
<!--    <div class="page-title">
        <div class="title_left">
            <h3>Edit Customer</h3>
        </div>
    </div>-->
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Customer <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">

                    <form action="javascript:update_customer();" class="form-horizontal form-label-left" novalidate  method="post"  id="edit_customer_form">
                        
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
                                        <input id="customer_fname" name="customer_fname" value="<?php echo $data['customer_fname'];?>" title="First Name" required="required" class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="customer_lname" name="customer_lname" value="<?php echo $data['customer_lname'];?>" title="Last Name" required="required" class="form-control" type="text">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="customer_email_id" name="customer_email_id" value="<?php echo $data['customer_email_id'];?>" title="Email"  disabled="true"  class="form-control" type="text" required="required">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <?php if(count($data['countries'])>0){ ?>
                                            <select class="required form-control" name="customer_country" title="Country"  id="customer_country" onchange="javascript:getCountryState(this);">
                                            <option value="" >Select Country</option>
                                            <?php 
                                            foreach($data['countries'] as $country){  ?>
                                                <option value="<?php echo $country->country_id ;?>" phone_code="<?php echo $country->phoneCode ;?>" <?php if($data['customer_country']==$country->country_id ){ echo "selected" ;} ?> ><?php echo $country->countryname;?></option>
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
                                        <select class="form-control" name="customer_state_select" title="State"  id="customer_state_select"></select>
                                    </div>
                                    <div id="state_2" style="display:none" class="col-md-6 col-sm-6 col-xs-12 item "></div>                                    
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        City <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="customer_city" name="customer_city" value="<?php echo $data['customer_city'];?>" title="City" required="required" class="form-control" type="text">
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Zip<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="customer_zip" name="customer_zip" value="<?php echo $data['customer_zip'];?>" title="Zip" required="required" class="form-control" type="text" maxlength="9">
                                    </div>
                                </div>                                
                            
                            </div>
                            <div  class="col-md-6 col-sm-6 col-xs-12">
 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Address<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <textarea rows="5"  id="customer_area" name="customer_area" value="" title="Address" class="form-control" required="required"><?php echo $data['customer_area'];?></textarea>
                                    </div>
                                </div>  
                                  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="col-md-4 col-sm-4 col-xs-4 item no-padding">
                                            <input id="customer_phone_code" name="customer_phone_code" value="<?php echo $data['customer_phone_code'];?>"   maxlength="13" required="required" title="code" class="form-control" type="text"> 
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 item left-padr0">
                                            <input id="customer_phone" name="customer_phone" value="<?php echo $data['customer_phone'];?>" max="9999999999999"  maxlength="13" required="required" title="Phone" class="form-control" type="number"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="password" name="password" value=""  title="Password" class="form-control" type="password">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Repeat Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="password2" name="password2"  value=""  title="Repeat Password" class="form-control" type="password">
                                    </div>
                                </div>                            
                            </div>
                            <div  class="col-md-12 col-sm-12 col-xs-12">
                                <div class="ln_solid"></div>
                                <div class="form-group text-right">
                                        <a href="<?php echo $data['site_url'] ?>/admin/customer">
                                            <button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-success" name="add" id="add" href="update_customer">Save</button>
                                        <input type="hidden" name="form_submit" value="save">     
                                        <input type="hidden" name="customer_id" value="<?php echo $data['customer_id'];?>">
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
    var countryId = "<?php echo $data['customer_country']?>";
    var stateName = "<?php echo $data['customer_state']?>";
    var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/admin/edit_customer.js'); ?>"></script>

@stop

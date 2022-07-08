@extends('layouts.adminlayout')
@section('content')

<?php 
$counselor = $data['counselor']; 
$countries = $data['countries'];
$languages = $data['languages']; 
$specilizations = $data['specilizations']; 
$insurances = $data['insurances']; 

$selectedLanguages = $data['selectedLanguages'];
$selectedSpecilizations = $data['selectedSpecilizations'];

?>
<div class="">
<!--    <div class="page-title">
        <div class="title_left">
            <h3>Edit Counselor</h3>
        </div>
    </div>-->
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Counselor <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">

                    <form action="javascript:edit_counselor();" class="form-horizontal form-label-left" novalidate  method="post"  id="edit_counselor_form">
                        
                        <div  class="col-md-12 col-sm-12 col-xs-12">
                            <div id="message"  class="hide  col-md-12 col-sm-12 col-xs-12 m-b-lg">
                                <div id="message-text"></div>
                            </div>
                            <?php if(Session::has('flash_msg')){?>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="alert alert-success" ><?php echo Session::get('flash_msg');?></div>
                                </div>                               
                            <?php } ?>                            
                            <div  class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_firstname" name="counselors_firstname"  required="required" title="First Name" class="form-control" type="text" value="<?php echo $counselor->counselors_firstname ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Middle Name 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_middlename" name="counselors_middlename"   title="Middle Name" class="form-control" type="text" value="<?php echo $counselor->counselors_middlename ?>">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Last Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_lastname" name="counselors_lastname"  required="required" title="Last Name" class="form-control" type="text" value="<?php echo $counselor->counselors_lastname ?>">
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Email<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="counselors_email_id" name="counselors_email_id" disabled="true" title="Email" class="form-control" type="email" value="<?php echo $counselor->counselors_email_id ?>">
                                    </div>
                                </div>
                                 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <?php if(count($data['countries'])>0){ ?>
                                            <select class="required form-control" name="counselor_country" title="Country"  id="counselor_country" onchange="javascript:getCountryState(this);">
                                            <option value="" >Select Country</option>
                                            <?php foreach ($countries as $country):?>
                                                 <?php 
                                                    $selected ='';
                                                    if($country->country_id == $counselor->country_id){
                                                        $selected ='selected="selected"';
                                                    }
                                                 ?>
                                            <option value="<?php echo $country->country_id ?>"  phone_code="<?php echo $country->phoneCode ;?>" <?php echo  $selected ?> ><?php echo ucfirst($country->countryname) ?></option>
                                            <?php endforeach ; ?>
                                            </select>
                                        <?php } ?> 
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        State <span class="required">*</span>
                                    </label>
                                    <div id="state_1" class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <select class="form-control" name="counselors_state_select" title="State"  id="counselors_state_select"></select>
                                    </div>
                                    <div id="state_2" style="display:none" class="col-md-6 col-sm-6 col-xs-12 item "></div>                                    
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        City/Area <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="counselors_city" name="counselors_city" title="City" class="form-control" type="text" required="required" value="<?php echo $counselor->counselors_city ?>">
                                    </div>
                                </div>                                  
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                                        <div class="col-md-4 col-sm-4 col-xs-4 item no-padding">
                                            <input id="counselors_phone_code" name="counselors_phone_code" value="<?php echo $counselor->counselors_phone_code ?>"   required="required" title="code" class="form-control" type="text"> 
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 item left-padr0">
                                            <input id="counselors_phone" name="counselors_phone" value="<?php echo $counselor->counselors_phone ?>" max="9999999999999"  maxlength="13" required="required" title="Phone" class="form-control" type="number"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Zipcode<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_zip" name="counselors_zip"  required="required" title="Zipcode" class="form-control"  maxlength="11"  type="text" value="<?php echo $counselor->counselors_zip ?>">
                                    </div>
                                </div> 
                                
                            
                            </div>
                            
                            
                            <div  class="col-md-6 col-sm-6 col-xs-12">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Designation
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_designation" name="counselors_designation"  title="Designation" class="form-control" type="text" value="<?php echo $counselor->counselors_designation ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Nick Name
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_nickname" name="counselors_nickname"   title="Nick Name" class="form-control" type="text" value="<?php echo $counselor->counselors_nickname ?>">
                                    </div>
                                </div>
                                <?php
                                if($counselor->counselors_dob != '' && $counselor->counselors_dob != '0000-00-00 00:00:00'){
                                    $datetime = new DateTime();
                                    $datetime = $datetime->createFromFormat('Y-m-d H:i:s', $counselor->counselors_dob);
                                    $dob = $datetime->format('m-d-Y');
                                }else{
                                    $dob ="";
                                }
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Date Of Birth
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="counselors_dob" name="counselors_dob"   title="Date Of Birth" class="form-control" type="text" value="<?php echo $dob ?>" readonly="true" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Languages
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <select multiple="true" name="language_id[]" id="language_id" title="Languages" class="form-control">
                                            <option value="" >Select Languages</option>
                                            <?php foreach ($languages as $language):?>
                                                 <?php 
                                                    $selected ='';
                                                    if(in_array($language->language_id, $selectedLanguages)){
                                                        $selected ='selected="selected"';
                                                    }
                                                 ?>
                                            <option value="<?php echo $language->language_id ?>" <?php echo  $selected ?> ><?php echo ucfirst($language->language_name) ?></option>
                                            <?php endforeach ; ?>                                                       
                                                    </select>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Specilizations
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <select multiple="true" name="specilization_id[]" id="specilization_id" title="Specilizations" class="form-control">
                                            <option value="" >Select Specilizations</option>
                                             <?php foreach ($specilizations as $specilization):?>
                                                     <?php 
                                                     $selected ='';
                                                     if(in_array($specilization->specilization_id, $selectedSpecilizations)){
                                                         $selected ='selected="selected"';
                                                     }
                                                  ?>

                                                 <option value="<?php echo $specilization->specilization_id ?>" <?php echo  $selected ?> ><?php echo ucfirst($specilization->specilization_name) ?></option>
                                             <?php endforeach ; ?>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        About me
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <textarea  id="counselors_aboutme" name="counselors_aboutme"  title="Profile" class="form-control"><?php echo $counselor->counselors_aboutme ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input id="password" name="password"  title="Password" class="form-control" type="password"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-3" >
                                        Repeat Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12 item ">
                                        <input  id="password2"   name="password2"   title="Repeat Password" class="form-control"  type="password">
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div id="files" class="files">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9 ">
                                         <span class="btn btn-red fileinput-button">   
                                         <span  class="btn btn-red fileinput-button">
                                             <i class="glyphicon glyphicon-plus"></i>Upload Image <input id="fileupload" type="file" name="files"  />
                                         </span>
                                        </span>
                                        </div>
                                        
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-9">
                                        <?php if($counselor->counselors_photo !=''): ?>
                                         <div class="col-lg-9  ">   
                                        <img src="<?php echo $data['site_url'].'/uploads/counselor/thumbnail/'.$counselor->counselors_photo ?>">
                                        </div>
                                            <div class="col-lg-3  ">
                                                <a  onclick="remove_stored_image()" href="javascript:void(0);">
                                                    <img src="{{ asset('images/delete.png'); ?>">
                                                </a>
                                            </div>
                                        <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="col-md-3 col-sm-3 col-xs-3"></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                            <div id="upfiles" class="files"></div>
                                            <input type="hidden" name="document" id="document" value="">                                             
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div  class="col-md-12 col-sm-12 col-xs-12">
                                <div class="ln_solid"></div>
                                <div class="form-group text-right">
                                        <a href="<?php echo $data['site_url'] ?>/admin/counselor">
                                            <button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button>
                                        </a>
                                        <button type="submit" class="btn btn-success" name="add" id="add" href="add_counselor">Save</button>
                                        <input type="hidden" name="form_submit" value="save">   
                                        <input type="hidden" name="counselor_id"  id="counselor_id"value="<?php echo $counselor->counselors_id ?>"> 
                                        
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
    var counselorId = "<?php echo $counselor->counselors_id ?>";
    var countryId = "<?php echo $counselor->country_id ?>";
    var stateName = "<?php echo $counselor->counselors_state?>";
    var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<link rel="stylesheet" href="{{ asset('css/jquery.fileupload.css');?>" />
<script src="{{ asset('js/vendor/jquery.ui.widget.js');?>"></script>
<script src="{{ asset('js/jquery.iframe-transport.js');?>"></script>
<script src="{{ asset('js/jquery.fileupload.js');?>"></script>
<script src="{{ asset('js/admin/counselor_image_upload.js');?>"></script>
<script src="{{ asset('js/admin/edit_counselor.js'); ?>"></script>

@stop

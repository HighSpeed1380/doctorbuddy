@extends('layouts.counselorlayout')
@section('content')


<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('counselor.dashboardmenu')
    <div class="content-wrapper col-lg-9 col-sm-9 col-xs-12">
        <div  class="text-center" style="width:50%;margin:auto;">
        <h3>Change Password</h3>
        <form action="javascript:void(0);" id="change_password_from" name="hpform"  method="post"  role="form" >
            <div class="ibox float-e-margins">

                <div id="custom_message_wrapper">    
                    <div id="message"  class="hide">
                        <div id="message-text"></div>
                    </div>
                     <?php if(Session::get('flash_msg')) : ?>
                    <div class="success-alert"><?php echo Session::get('flash_msg') ?></div>
                    <?php endif ;?>
                </div>

                <div class="form-group item">
                    <input  id="counselors_password" name="counselors_password"  required="required" title="New Password" class="form-control" type="password" placeholder="New Password">
                </div>
                <div class="form-group item">
                    <input  data-validate-linked="counselors_password"  id="counselors_password2" name="counselors_password2"  required="required" title="Confirm Password" class="form-control" type="password"  placeholder="New Password">
                </div>             

                <div class="form-group">
                     <button  onclick="return change_password();"type="submit"  title="Register"  class="btn btn-red" role="button">Submit</button>
                     <input type="hidden" name="form_submit" value="save">                       
                </div>

            </div>
        </form> 
        </div>        
    </div>
</main>

<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/counselor/change_password.js'); ?>"></script>
@stop
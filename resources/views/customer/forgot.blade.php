@extends('layouts.customerlayout')
@section('content')
<div class="text-center" id="login-wrap">
    <h3>Forgot Password </h3>
    <form class="m-t" role="form" action="javascript:finish();"  id="loginform">
        <div>
            <div class="hide alert alert-danger" id="em" >This email doesn't exist in our records.</div>
            <?php if($dataoutput['msg'] != ''){?>
            <div class="success-alert" id="nm" ><?php echo $dataoutput['msg'];?></div>
            <?php } ?>
        </div>                
        <div class="form-group item">
             <input id="user_email_id" name="user_email_id"  value="" title="Email" required="required" class="form-control" type="email" placeholder="Email">
         </div> 
        <div class="form-group item">
           <button type="submit" class="btn btn-red block full-width m-b"   href="finish" role="button">Submit</button>
           <a href="{{ asset('customer/login/'); ?>"><small>Login?</small></a>
        </div>
        
    </form>
</div>

<script>
 var SITE_URL = "{{ asset(''); ?>";
</script>
<script src="{{ asset('js/customer/forgotpassword.js'); ?>"></script>
@stop
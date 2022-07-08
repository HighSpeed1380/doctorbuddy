@extends('layouts.counselorlayout')
@section('content')


<div class="form-group col-lg-12 col-xs-12">
    <div id="message"  class="hide">
                <div id="message-text"></div>
    </div>
</div>

<div class="middle-box text-center loginscreen ">
        <div>
           
            <h3>Forgot Password</h3>
            
            <form class="m-t" role="form" action="javascript:void(0);"  id="forgotpassword_form">
                <div class="form-group item">
                    <input id="user_email_id" name="user_email_id" value="" title="Email" required="required" class="form-control" type="email" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" onclick="return validate_forgotpassword();">Submit</button>

                <a href="{{ asset('counselor/login'); ?>"><small>Login?</small></a>
            </form>
        </div>
</div>

<script>
 var SITE_URL = "{{ asset(''); ?>";
</script>
<script src="{{ asset('js/counselor/forgotpassword.js'); ?>"></script>
@stop
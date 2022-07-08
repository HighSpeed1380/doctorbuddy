<?php
$currentActionName='';
$currentActionArr = explode('@',Request::route()->getActionName());
$currentActionName = $currentActionArr[1];

$myDashboard = '';
$myAccountClass='';
$changePasswordClass='';
if(in_array($currentActionName,array('anyDashboard')))
{
    $myDashboard= 'active';    
}else if(in_array($currentActionName,array('anyEditprofile')))
{
    $myAccountClass= 'active';    
}else if(in_array($currentActionName,array('anyChangepassword')))
{
    $changePasswordClass= 'active';    
}

?>

<nav class="cd-side-nav col-lg-2 col-sm-2 col-xs-12">
<ul>
    <li class="overview">
        <a href="javascript:void(0);">Welcome back <?php echo ucfirst($data['counselor']->counselors_firstname) ?></a>
    </li>
    <li class="overview <?php echo $myDashboard ?>">
        <a href="{{ asset('counselor/dashboard')?>">My Dashboard</a>
    </li>
    <li class="notifications <?php echo $myAccountClass ?>">
        <a href="{{ asset('counselor/editprofile')?>"> My Account</a>
    </li>

    <li class="comments <?php echo $changePasswordClass ?>">
        <a href="{{ asset('counselor/changepassword')?>">Change Password</a>
    </li>
</ul>

</nav>

<link href="{{ asset('css/dashboard-leftmenu.css'); ?>" rel="stylesheet" type="text/css">
<script src="{{ asset('js/jquery.menu-aim.js'); ?>"></script>
<script src="{{ asset('js/main.js'); ?>"></script>

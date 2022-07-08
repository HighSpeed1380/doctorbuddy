<?php
$currentActionName='';
$currentActionArr = explode('@',Request::route()->getActionName());
$currentActionName = $currentActionArr[1];

$myDashboard = '';
$caseFiles= '';
$myAccountClass='';
$changePasswordClass='';
if(in_array($currentActionName,array('anyDashboard')))
{
    $myDashboard= 'active';    
}else if(in_array($currentActionName,array('anyCasefiles','anyCasefileview')))
{
    $caseFiles= 'active';    
}else if(in_array($currentActionName,array('anyEditprofile')))
{
    $myAccountClass= 'active';    
}else if(in_array($currentActionName,array('anyChangepassword')))
{
    $changePasswordClass= 'active';    
}


// Get logined Counselor
$counselorId = $_SESSION['counselor_id'];
$loginedCounselor = DB::table('counselors')->where('counselors_id', '=', $counselorId)->first(); 


?>

<nav class="cd-side-nav col-lg-2 col-sm-2 col-xs-12">
<ul>
    <li class="overview p5">
        <div class="text-center bg ">
            <?php if ($loginedCounselor->counselors_photo !='') : ?>
                <img src="{{ asset('uploads/counselor/icon/'.$loginedCounselor->counselors_photo);?>"  alt="image" >
            <?php else : ?>
                <img src="{{ asset('images/counselor.png')?>"  alt="image">
            <?php endif ;?> 
            <h3>
                <?php echo ucfirst($loginedCounselor->counselors_firstname).' '.$loginedCounselor->counselors_lastname ?>
            </h3>
             <div class="des">Counselor</div>
        </div>                
    </li>   

    <li class="overview <?php echo $myDashboard ?>">
        <a href="{{ asset('counselor/dashboard')?>">My Dashboard</a>
    </li>
     <li class="notifications <?php echo $caseFiles ?>">
        <a href="{{ asset('counselor/casefiles')?>">Case Files</a>
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

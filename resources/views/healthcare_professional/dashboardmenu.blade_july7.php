<?php
$currentActionName='';
$currentActionArr = explode('@',Request::route()->getActionName());
$currentActionName = $currentActionArr[1];

$myDashboard = '';
$myAccountClass='';
$myTemplateClass='';
$assignedCases='';
$searchCases='';
$changePasswordClass='';
if(in_array($currentActionName,array('anyDashboard','anyCasefileview')))
{
    $myDashboard= 'active';    
}else if(in_array($currentActionName,array('anyEditprofile')))
{
    $myAccountClass= 'active';    
}else if(in_array($currentActionName,array('anyTemplates')))
{
    $myTemplateClass= 'active';    
}else if(in_array($currentActionName,array('anyAssignedcases')))
{
    $assignedCases= 'active';    
}else if(in_array($currentActionName,array('anySearchcases')))
{
    $searchCases= 'active';    
}
else if(in_array($currentActionName,array('anyChangepassword')))
{
    $changePasswordClass= 'active';    
}


// Get logined Healthcare Professional
$hpId = Session::get('hp_id');
$loginedHp = DB::table('healthcare_professional')->where('healthcare_professional_id', '=', $hpId)->first(); 

?>





<?php if($loginedHp->healthcare_professional_status ==4) :?>
    <nav class="cd-side-nav col-lg-2 col-sm-2 col-xs-12">
    <ul>
    <li class="overview p5">
        <div class="text-center bg ">
            <img src="{{ asset('images/provider.png')?>"  alt="image">
            <h3>
                Guest
            </h3>
             <div class="des">Provider </div>
        </div>                
    </li>
        <li class="overview active">
            <a href="{{ asset('healthcare_professional/editprofile')?>">Continue Registration</a>
        </li>
        <li class="notifications">
            <a href="{{ asset('healthcare_professional/logout')?>"> Logout</a>
        </li>
    </ul>

    </nav>

<?php else : ?>
    <nav class="cd-side-nav col-lg-2 col-sm-2 col-xs-12">
<ul>
    <li class="overview p5">
        <div class="text-center bg ">
            <img src="{{ asset('images/provider.png')?>"  alt="image">
            <h3>
                <?php echo ucfirst($loginedHp->healthcare_professional_first_name).' '.$loginedHp->healthcare_professional_last_name ?>
            </h3>
             <div class="des">Provider </div>
        </div>                
    </li>
    <li class="overview <?php echo $myDashboard ?>">
        <a href="{{ asset('healthcare_professional/dashboard')?>">My Dashboard</a>
    </li>
    <li class="notifications <?php echo $myAccountClass ?>">
        <a href="{{ asset('healthcare_professional/editprofile')?>"> My Account</a>
    </li>
    <li class="notifications <?php echo $myTemplateClass ?>">
        <a href="{{ asset('healthcare_professional/templates')?>"> My Templates</a>
    </li>
    <li class="notifications <?php echo $assignedCases ?>">
        <a href="{{ asset('healthcare_professional/assignedcases')?>">Assigned Cases</a>
    </li>
    <li class="notifications <?php echo $searchCases ?>">
        <a href="{{ asset('healthcare_professional/searchcases')?>">Search Cases</a>
    </li>    
    <li class="comments <?php echo $changePasswordClass ?>">
        <a href="{{ asset('healthcare_professional/changepassword')?>">Change Password</a>
    </li>

    <!--<li class="comments">
        <a href="{{ asset('healthcare_professional/logout')?>">Logout</a>
    </li>-->
</ul>

</nav>
<?php endif ;?>


<link href="{{ asset('css/dashboard-leftmenu.css'); ?>" rel="stylesheet" type="text/css">
<script src="{{ asset('js/jquery.menu-aim.js'); ?>"></script>
<script src="{{ asset('js/main.js'); ?>"></script>
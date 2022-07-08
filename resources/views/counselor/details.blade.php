@extends('layouts.counselorlayout')
@section('content')

<?php $counselorObject = $data['counselorObject']; // echo '<pre>';print_r($hpObjects);die();?>



    <?php if ( $counselorObject) : ?>
    <div class="container nopad">
    <div class="col-lg-12 col-sm-12 col-xs-12">
    	<div class="row m-b-lg m-t-lg">
                <div class="col-lg-6 col-sm-12 col-xs-12">

                    <div class=" col-lg-5 col-sm-5 col-xs-12 text-center p-block">
                        <?php if(isset($counselorObject->counselors_photo) && $counselorObject->counselors_photo !='') : ?>
                            <img src="{{ asset("uploads/counselor/thumbnail")."/".$counselorObject->counselors_photo ?>"  class="img-circle circle-border m-b-md" alt="profile">
                        <?php else: ?>
                            <img src="{{ asset("public/images")."/user.png"?>" width="80" height="80" class="img-circle circle-border m-b-md" alt="profile"> 
                        <?php endif ;?>
                        <div>
                            <h3>
                                <?php
                                $nameArr=array();
                                if(isset($counselorObject->counselors_firstname) && $counselorObject->counselors_firstname !='') {
                                 $nameArr[] = $counselorObject->counselors_firstname;
                                }
                                if(isset($counselorObject->counselors_middlename) && $counselorObject->counselors_middlename !='') {
                                 $nameArr[] = $counselorObject->counselors_middlename;
                                }
                                if(isset($counselorObject->counselors_lastname) && $counselorObject->counselors_lastname !='') {
                                 $nameArr[] = $counselorObject->counselors_lastname;
                                }
                                echo $counselorName = ucfirst(implode(" ", $nameArr));
                                ?>
                            </h3>
                            <div class="font-bold">
                                Counselor
                            </div>
                        <address class="m-t-md address">
                            <?php 
                                if(isset($counselorObject->counselors_zip) && $counselorObject->counselors_zip !=""){
                                    echo $counselorObject->counselors_zip."<br>";
                                }
                                if(isset($counselorObject->counselors_city) && $counselorObject->counselors_city !=""){
                                    echo $counselorObject->counselors_city."<br>";
                                }
                                $addressArr =array();

                                if(isset($counselorObject->counselors_state) && $counselorObject->counselors_state !=""){
                                     $addressArr[]= $counselorObject->counselors_state;
                                 }

                                if(isset($counselorObject->countryname) && $counselorObject->countryname !=""){
                                     $addressArr[]= $counselorObject->countryname;
                                 }                                        
                                echo implode(",", $addressArr)."<br>";
                            ?>                             

                            
<!--                            <abbr title="Phone">P:</abbr> 
                                <?php //echo $counselorObject->counselors_phone_code ?>
                            &nbsp; 
                                <?php //echo $counselorObject->counselors_phone ?>
                            <br>
                            <abbr title="Phone">Email:</abbr> 
                                <?php //echo $counselorObject->counselors_email_id ?>  -->
                        </address>
                        </div>
                                                
                    </div>
                    <div class="col-lg-7 col-sm-7 col-xs-12">
						<div class="ibox">
                        <div class="ibox-content">
                            <h4>About <?php echo $counselorName ?></h4>

                            <p class="small">
                                <?php
                                    if(isset($counselorObject->counselors_aboutme) && $counselorObject->counselors_aboutme !=""){
                                        echo $counselorObject->counselors_aboutme;
                                    } 
                                ?>                               
                            </p>    
                        </div>
                    </div>  
                    <?php
                        if(isset($counselorObject->counselors_designation) && $counselorObject->	counselors_designation !=""){
                    ?> 
                        <div class="ibox">
                        <div class="ibox-content">
                            <h4>Designation</h4>
                            <p class="small">
                                <?php echo $counselorObject->counselors_designation;?>  
                            </p>
                        </div> 
                    </div>      
                    
                    <?php } ?>       
                        <div class="ibox">
                        <div class="ibox-content">
                            <h4>Specialisation</h4>
                            <p class="small"><?php echo implode(",", $data['specilizations']); ?></p>    
                        </div> 
                    </div> 
 
                    <div class="ibox">
                        <div class="ibox-content">
                            <h4>Languages</h4>
                            <p class="small">
                                <?php echo implode(",", $data['languages']); ?>  
                            </p>
                        </div> 
                    </div>      
                    
                            
                      
                             
                    </div>
                </div>

            </div>
         
    </div>
</div>
    <?php endif ;?>

<script>
    var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
@stop

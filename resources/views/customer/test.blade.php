<!DOCTYPE html>
<html>
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>DoctorBuddy</title>
    
    <link href="{{ asset('css/custom.css'); ?>" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom_extra.css'); ?>" rel="stylesheet" type="text/css" />
    
 
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

     <!--End:Help Tool tip -->
    </head>
    <body>

<div>
    <table>
    <tr>
        <td><div style="width:100%">
     <img src="{{ asset("images/logo-xs.png");?>">                          
	</div></td>
    </tr> 
  
    </table>
 
    <table>
    <tr>
        <td><label>File No :<?php echo $report['customer_fileno'];?></label></td>
    </tr>  
    </table>   
    
    <!-- Start :Basic Info -->
    <div>
        <h4>Basic Information</h4>
        <table class="list-casefile">
            <tr>
                <td><label class="label-left" >Nick Name :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_nickname']);?></label></td>
            </tr>
            <?php if($report['customer_for_whom'] != ''){ ?>
            <tr>
                <td><label class="label-left" >For :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_for_whom']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_age'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Age :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_age']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_sex'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Sex :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_sex']);?></label></td>
            </tr>
            <?php } ?>
            
            <?php if($report['customer_country'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Country :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_country']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_state'] != ''){ ?>
            <tr>
                <td><label class="label-left" >State :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_state']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_city'] != ''){ ?>
            <tr>
                <td><label class="label-left" >State :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_city']);?></label></td>
            </tr>
            <?php } ?>            
            <?php if($report['customer_zip'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Zip :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_zip']);?></label></td>
            </tr>
            <?php } ?>
                         
        </table>
    </div>
    <!--End:Basic Info-->
   <!-- Start :Symptoms Info --> 
    <div>
        <h4>Symptoms</h4>
        <table class="list-casefile">
            <?php if($report['known_disease'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Known Disease :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['known_disease']);?></label></td>
            </tr>
            <?php } ?>  
            
            <?php if($report['customer_past_illness_history'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Past Illness History :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_past_illness_history']);?></label></td>
            </tr>
            <?php } ?>   
            
            <?php
            $customerDetailId = $report['customer_detail_id'];
            $files = DB::table('customer_files')->where('customer_detail_id', '=', $customerDetailId)->get();
            if(count($files)>0){ 
            ?>            
            <tr>
                <td><label class="label-left" >Files :</label></td>
                        <td>
                            <label class="label-ans">
                                <?php foreach($files as $file) { ?>
                                <p>
                                    <a href="{{ asset("uploads/files/".$file->file_name);?>" target="_blank">
                                    <?php echo $file->file_name ?>
                                    </a>    
                                </p>
                                <?php } ?>                                
                    
                            </label>
                        </td>
            </tr>
            <?php } ?>
            
            <?php if($report['customer_hereditary_disease'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Hereditary Disease :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_hereditary_disease']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_present_medication'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Present Medication :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_present_medication']);?></label></td>
            </tr>
            <?php } ?>
            <?php if($report['customer_allergic_reaction'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Allergic Reaction :</label></td>
                <td><label class="label-ans"> <?php echo ucfirst($report['customer_allergic_reaction']);?></label></td>
            </tr>
            <?php } ?>
            
            <?php if($report['customer_height_unit'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Height :</label></td>
                <td><label class="label-ans"><?php echo $report['customer_height'];?> &nbsp; <?php echo ucfirst($report['customer_height_unit']);?></label></td>
            </tr>
            <?php } ?>
            
            <?php if($report['customer_weight_unit'] != ''){ ?>
            <tr>
                <td><label class="label-left" >Weight :</label></td>
                <td><label class="label-ans"> <?php echo $report['customer_weight'];?>&nbsp; <?php echo ucfirst($report['customer_weight_unit']);?></label></td>
            </tr>
            <?php } ?>  
            
            <tr>
                <td><label class="label-left" >Created On :</label></td>
                <td><label class="label-ans"> <?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($report['created_at']));?></label></td>
            </tr>
            <tr>
                <td><label class="label-left" >Updated On :</label></td>
                <td><label class="label-ans"> <?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($report['updated_at']));?></label></td>
            </tr>
            
        </table>
    </div>    
   <!-- End :Symptoms Info -->  
   
   
    <!-- Start :Physicial Symptom -->
    <?php if(isset($report['symptoms_his']) && count($report['symptoms_his'])>0 ){
        $j=1;
    ?>
    <div>
        <h5>Physical Symptoms</h5>
        <table class="list-casefile">
            
            <tr><td><b> Name</b></td><td><b> Rate</b></td><td><b> Customer Note</b></td><td><b> Date</b></td></tr>
            <?php 
                $l=0;$key_mod = array();
                foreach($report['symptoms_his'] as $key=>$symptomshis){                                    
            ?> 
                <?php $l++; $key_mod[] = $key; $m =0;?>
                <?php foreach($symptomshis as  $symptoms){ ?>
            <tr>
                <td><?php if($m==0){ ?><label class="label-left" ><?php echo $symptoms['symptom_name'];?></label><?php } ?></td>
                <td><label class="label-ans">  <?php if($symptoms['symptom_rate'] !=''){ echo $symptoms['symptom_rate'];} ?></label></td>
                <td><label class="label-ans">  <?php if($symptoms['customer_note'] !=''){ echo $symptoms['customer_note'];} ?></label></td>
                <td><label class="label-ans">  <?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($symptoms['created_date']));?></label></td>
                
            </tr>
            
            <?php $m++; }  //2nd foreach ?> 
           <?php }  //1st foreach ?>  
                         
        </table>
    </div>
    <?php } ?>
    <!--End:Physicial Symptom-->
    
    <!-- Start :Questionaire  -->
    <?php if(isset($report['answers']) && count($report['answers'])>0){ ?>
    <div>
        <h4>Questionnaire</h4>
        <table class="list-casefile">
        <?php 
        $group_idarr = array();
        foreach($report['answers'] as $answers){

             if(!in_array($answers->group_id,$group_idarr) && $answers->group_name!=''){
                 $group_idarr[] = $answers->group_id;
                echo '<tr><td colspan="2"><h5>'.$answers->group_name.'</h5></td></tr>';
             }
             
             if (strpos($answers->question,'OPTION') !== false) {
               $pos = strpos($answers->question,'OPTION');
               $questionFirstPart = substr($answers->question,0,$pos-1);
               $answer = '<em style="color:#c84c4c; font-weight:500;">'.$answers->option_val.'</em>';
               $questionLastPart = substr($answers->question,$pos+8);
               $fullLine = $questionFirstPart." ".$answer." ".$questionLastPart;
               echo '<tr><td>'.$fullLine.'</td></tr>';
             }else{
                  echo '<tr><td>'.$answers->question.'</td></tr><tr><td style="font-style: italic;
    color:#c84c4c; font-weight:500;">'.$answers->option_val.'</td></tr>';
             }
        ?>
        
        <?php } ?>
        </table>     

    </div>
    <?php } ?>
    <!--End:Questionaire-->    
</div>

    </body>
    </html>
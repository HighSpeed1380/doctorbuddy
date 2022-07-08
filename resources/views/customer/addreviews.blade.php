@extends('layouts.customerlayout')
@section('content')
<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('customer.dashboardmenu')    
    <div class="content-wrapper col-lg-9 col-sm-9 col-xs-12">
    <h3>Add Review
    </h3>
    <form action="javascript:void(0);" id="addreviews" name="addreviews" class="form-label-left" method="post"  role="form" >
    <div class="col-lg-12 col-sm-12  col-xs-12 m-t-xl registration-wrap  no-pad">
        
        <?php if(Session::get('flash_msg')): ?>
            <div id="message"  class="warning-alert col-lg-12 col-sm-12 col-xs-12">
                <div id="message-text"><?php echo Session::get('flash_msg') ?></div>
            </div>
            <?php else : ?>
            <div id="message"  class="hide warning-alert col-lg-12 col-sm-12 col-xs-12">
                <div id="message-text"></div>
            </div>
        <?php endif ?> 
        
        <div class="col-lg-12 col-sm-12 col-xs-12 no-pad">
            <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad item right-pad">
                <label>Provider Name</label> 
                <select id="healthcare_professional_id" title="Provider Name" name="healthcare_professional_id" class="form-control" required="required">
                    
                    <?php 
                        $hp_arr=DB::table('casefile_to_healthcare')
                                ->leftjoin('healthcare_professional', 'casefile_to_healthcare.healthcare_professional_id', '=', 'healthcare_professional.healthcare_professional_id')
                                ->where('casefile_to_healthcare.customer_id', '=',$_SESSION['customer_id'])
                                ->where('healthcare_professional.healthcare_professional_status', '=',1)
                                ->select('healthcare_professional.healthcare_professional_id','healthcare_professional.healthcare_professional_first_name','healthcare_professional.healthcare_professional_middle_name','healthcare_professional.healthcare_professional_last_name')
                                ->distinct()
                                ->get();
                                if(count($hp_arr)>0)
                                {
                    ?>
                                        <option value=''>---Select---</option>
                    <?php
                                foreach ($hp_arr as $hp)
                                {
                                        $name = $hp->healthcare_professional_first_name;
                                        if($hp->healthcare_professional_first_name !=''){
                                            $name .= " ".$hp->healthcare_professional_middle_name;
                                        }
                                        $name .= " ".$hp->healthcare_professional_last_name;
                    ?>
                                        <option value="{{$hp->healthcare_professional_id}}">{{$name}}</option>
                    <?php      
                                }
                                }
                                else
                                {
                    ?>
                                       <option value=''>---No provider(s) found---</option> 
                    <?php
                                    
                                }
                    ?>
                </select>
            </div>
            
        </div>
        
         <div class="col-lg-12 col-sm-12 col-xs-12 no-pad">
            <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad item right-pad">
                <label>Review Score</label> 
                <select id="review_score" name="review_score" title="Review Score" required="required" class="form-control">                                                                       
                                                                <option value="">Select</option><option value="1" data-html="Terrible">1</option>
                    <option value="2" data-html="Poor">2</option>
                    <option value="3" data-html="Average">3</option>
                    <option value="4" data-html="Very Good">4</option>
                    <option value="5" data-html="Excellent">5</option>
              </select>
            </div>
        </div>
        
        <div class="col-lg-12 col-sm-12 col-xs-12 no-pad">
            <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad item right-pad">
                <label>Comments</label> 
                <textarea placeholder="Please share your consultation experience here..." rows="7" id="comments" name="comments" title="Comments"  class="form-control"></textarea>                                                                      
            </div>
            
        </div>
        
        <div class="col-lg-12 col-sm-12 col-xs-12 no-pad text-right">
            <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad item right-pad">
            <button type="submit" title="Add" onclick="return add();"  class="btn btn-red" role="button">Add</button> 
            <input type="hidden" name="form_submit" value="save"> 
            </div>
        </div>
    </div>
</form>
</div> <!-- .content-wrapper -->        
</main>    

<script>
    var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/review/jquery.barrating.min.js'); ?>"></script>
<script src="{{ asset('js/customer/addreviews.js'); ?>"></script>
@stop

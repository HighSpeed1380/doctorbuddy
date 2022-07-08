@extends('layouts.healthcarelayout')
@section('content')

<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('healthcare_professional.dashboardmenu')
    <div class="content-wrapper col-lg-9 col-sm-9 col-xs-12">
        <h3>View Review</h3>
        <form action="javascript:void(0);" id="review_form" name="review_form"  method="post"  role="form" >
           <div class="col-lg-12 col-sm-12  col-sx-12 registration-wrap  no-pad"> 
               <div id="custom_message_wrapper">    
                   <div id="message"  class="hide">
                       <div id="message-text"></div>
                   </div>
                    <?php if(Session::get('flash_msg')) : ?>
                   <div class="success-alert"><?php echo Session::get('flash_msg') ?></div>
                   <?php endif ;?>
               </div>

               <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                   <div class="form-group  col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                       <label>Customer Name</label> 
                       <input  disabled="disabled" class="form-control" type="text" value=" {{$data['customer_name']}}">
                   </div>
               </div>
              <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                   <div class="form-group  col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                       <label>Review Score</label> 
                        <select disabled="disabled" id="review_score" name="review_score" title="Review Score"  class="form-control">                                                                       
                        <option value="1" data-html="Terrible" <?php if($data['review_score']=="1"){ echo "selected='selected'";}?>>1</option>
                        <option value="2" data-html="Poor" <?php if($data['review_score']=="2"){ echo "selected='selected'";}?>>2</option>
                        <option value="3" data-html="Average" <?php if($data['review_score']=="3"){ echo "selected='selected'";}?>>3</option>
                        <option value="4" data-html="Good" <?php if($data['review_score']=="4"){ echo "selected='selected'";}?>>4</option>
                        <option value="5" data-html="Excellent" <?php if($data['review_score']=="5"){ echo "selected='selected'";}?>>5</option>
                  </select>                   
                   </div>
               </div>
               
                <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                   <div class="form-group  col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                       <label>Comments</label> 
                       <textarea rows="7" disabled="disabled" id="comments" name="comments" title="Comments"  class="form-control" type="text"><?php echo $data['comments'];?> </textarea>                                                                      
                   </div>
               </div>
               <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                   <div class="form-group  col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                       <label>Review Date</label> 
                       <input  disabled="disabled" class="form-control" type="text" value="<?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($data['date']));?>">
                   </div>
               </div>
               
               
               
               <div class="col-lg-12 col-sm-12 col-sx-12 no-pad text-right">
                   <button onclick="history.back();" type="button"  title="Back"  class="btn btn-red" role="button">Back</button>
               </div> 

           </div>    

        </form>        
    </div>
</main>


<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/review/jquery.barrating.min.js'); ?>"></script>
<script type="text/javascript">
   $(function() {
      $('#review_score').barrating({
        theme: 'fontawesome-stars',
        readonly:'true'
      });
   });
</script>
@stop

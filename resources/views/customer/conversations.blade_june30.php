@extends('layouts.customerlayout')
@section('content')
<div class="col-lg-12  col-sm-12 col-sx-12">
@include('customer.dashboardmenu')
<div class="col-lg-12  col-sm-12 col-sx-12">
<h3>Conversation History</h3>
 <div class="margin-top-20" style="border:1px solid grey;border-radius:10px;padding:10px;" >

    <div id="conversation_listing">
        <?php foreach ($data['conversations'] as $conversation):  ?>

        <?php
        $hpObj = DB::table('healthcare_professional')->where('healthcare_professional_id','=',$conversation->healthcare_professional_id)->first();
        $hpNamArr = array();
        if($hpObj->healthcare_professional_first_name)
            $hpNamArr[] =$hpObj->healthcare_professional_first_name;
        if($hpObj->healthcare_professional_middle_name)
            $hpNamArr[] =$hpObj->healthcare_professional_middle_name;
        if($hpObj->healthcare_professional_last_name)
            $hpNamArr[] =$hpObj->healthcare_professional_last_name;                            
        ?>
        <?php if($conversation->customer_comment): ?>
            <div class="row  m-b m-l" >
                <div class="form-group">
                    <div class="col-lg-6  col-sm-6 col-sx-6 c_h_rows">
                        <p><b>You</b></p> 
                        <div class="col-lg-8  col-sm-8 col-sx-8 no-pad"><?php echo  $conversation->customer_comment ?></div>
                        <div class="col-lg-4  col-sm-4 col-sx-4 text-right"><?php echo date(Config::get('constants.DATE_TIME_FORMAT'),  strtotime($conversation->date)); ?></div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row  m-b m-r">
                <div class="form-group">
                    <div class="col-lg-6  col-sm-6 col-sx-6">
                    </div>
                    <div class="col-lg-6  col-sm-6 col-sx-6 c_h_rows">
                        <p style="color:#00243F"><b><?php echo implode(" ", $hpNamArr); ?></b></p>
                        <div class="col-lg-8  col-sm-8 col-sx-8 no-pad"><?php echo  $conversation->healthcare_comment ?></div>
                        <div class="col-lg-4  col-sm-4 col-sx-4 text-right"><?php echo date(Config::get('constants.DATE_TIME_FORMAT'),  strtotime($conversation->date)); ?></div>
                    </div>                                                                        
                </div>
            </div>
        <?php endif;?>
        <?php endforeach ;?>
    </div>
     
    <form action="javascript:void(0);" id="conversation_comment" name="conversation_comment"  method="post"  role="form" >

        <div class="row  m-b hide" id="openion-message">
            <div class="form-group">
                <div class="col-lg-12  col-sm-12 col-sx-12" id="openion-message-text"></div>
            </div>
        </div>

        <div class="row  m-b">
            <div class="form-group">
                <div class="col-lg-8  col-sm-8 col-sx-8  m-b item">
                    <textarea  title="Message" name="customer_comment" id="customer_comment" class="form-control" placeholder="Message...." required="true"></textarea>
                </div>
                <div class="col-lg-12  col-sm-12 col-sx-12">
                    <button type="button"  title="Send" onclick="return send_comment();"  class="btn btn-red" role="button">Send</button>
                </div>
            </div>
        </div>

        <input type="hidden" name="customer_detail_id" value="<?php echo $data['customer_detail_id'] ?>" >
        <input type="hidden" name="healthcare_professional_id" value="<?php echo $data['healthcare_professional_id'] ?>" >
 </form>
            </div>  
    
</div>
</div>
<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea',
              height: 240,
              theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ]
  }
              );
 </script>
<script src="{{ asset('js/customer/conversation.js'); ?>"></script>
@stop
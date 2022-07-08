@extends('layouts.adminlayout')
@section('content')
<script type="text/javascript">
function selecttype(seltype)
{
   if(seltype.value == 'text' || seltype.value =='textarea'){           
        document.getElementById('disp_option').style.display='none';    
        document.getElementById('disp_req').style.display='block';
   }else{
        document.getElementById('disp_option').style.display='block';
        document.getElementById('disp_req').style.display='none';
   }
   if(seltype.value == 'select' || seltype.value == 'check'){
       document.getElementById('disp_req').style.display='block';
   }
}
function selectdepend(seltype)
{
   if(seltype.value == '0'){           
        document.getElementById('dependQnid').style.display='none';    
   }else{
        document.getElementById('dependQnid').style.display='block';
   }
}
 var currvar =0;
function getoption(id)
{
    var qnid = document.getElementById('depend_option').value;
	currvar++;
    if(id != '1'){
        document.getElementById('dsp').style.display='none';           
        if(currvar >0){
            for(i = 0; i < currvar; i++) {        
                if (document.getElementById('condition_'+i) != null) {
                document.getElementById('condition_'+i).style.display='none';
                document.getElementById('depend_ans_'+i).disabled='disabled';
                }
            }
        }
    }
    var updvar = currvar+1;
    if(qnid > 0){
      $.ajax({
            type: "POST",
            url: "option",
            data: {qnid: qnid,divid:updvar},
            success: function(data) {
                if(currvar == 1){
                    document.getElementById('dsp').style.display='block';    
                    document.getElementById('dependoption').innerHTML=data;
                }else{
                    document.getElementById('dsp').style.display='block';
                    document.getElementById('dependoption_'+updvar).innerHTML=data;
                }
            }
        });
    }else{
        document.getElementById('dsp').style.display='none';           
        if(currvar >0){
            for(i = 0; i < currvar; i++) {        
                if (document.getElementById('condition_'+i) != null) {
                document.getElementById('condition_'+i).style.display='none';
                document.getElementById('depend_ans_'+i).disabled='disabled';
                }
            }
            currvar = currvar-i;
        }
    }
}
</script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Questions</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Questions <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    <br></br>

                    <form novalidate="" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" method="post">

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input data-parsley-id="3638" id="question" name="question" title="question" required="required" class="form-control col-md-7 col-xs-12" type="text"><ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Display Order <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="display_order" >
                                                    <?php for($i=1;$i<99;$i++){ ?>
                                                    <option value="<?php echo $i;?>"><?php echo $i;?></option> <?php } ?>
                                                </select>
                                               
                                                <ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Question Group <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="question_group_id">
                                                     <?php if(isset($data['questiongroups'])){
                                                if(count($data['questiongroups'])>0){
                                            foreach($data['questiongroups'] as $questiongroup){ 
                                            ?>
                                                    <option value="<?php echo $questiongroup->group_id;?>" ><?php echo $questiongroup->group_name;?></option> 

                                            <?php } } }?>
                                                </select>
                                                <ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Question Type <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="radio">
                                                    <label>
                                                        <input checked="checked" value="text" id="question_type" onchange="javascript:selecttype(this);" name="question_type" type="radio"> Text</label><label>
                                                        <input  value="radio" id="question_type" onchange="javascript:selecttype(this);" name="question_type" type="radio"> Radio Button</label><label>
                                                        <input  type="radio" id="question_type" onchange="javascript:selecttype(this);" name="question_type" value="select"> Select Box</label><label>
                                                        <input  type="radio" id="question_type" onchange="javascript:selecttype(this);" name="question_type" value="check"> Check Box</label><label>
                                                        <input  type="radio" id="question_type" onchange="javascript:selecttype(this);" name="question_type" value="textarea"> Text Area</label>
                                                    </label>
                                                </div>
                                               
                                            </div>
                                        </div>
                        <div class="form-group" id="disp_option" style="display: none;">
                                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Answer Options </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <textarea id="options" name="options" class="form-control col-md-7 col-xs-12"></textarea>Give each value as comma separated.(ex: Yes, No)<ul id="parsley-id-8125" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                                 <div id="disp_req" >
                                     <div class="form-group"  >
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Required question? <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="radio">
                                                    <label>
                                                        <input  value="1"  name="field_required" type="radio"> Yes</label><label>
                                                        <input checked="checked" value="0" name="field_required" type="radio"> No</label>
                                                </div>
                                               
                                            </div>
                                         </div>
                                         <div class="form-group"  >
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Validate Message? <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                                
                                               <input name="validator_title" />
                                            </div>
                                         </div>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Is Depend question? <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="radio">
                                                    <label>
                                                        <input  value="1" onchange="javascript:selectdepend(this);" id="dependable_question" name="dependable_question" type="radio"> Yes</label><label>
                                                        <input checked="checked" onchange="javascript:selectdepend(this);"  value="0" id="dependable_question" name="dependable_question" type="radio"> No</label>
                                                </div>
                                               
                                            </div>
                                        </div>
                        
                        <div id="dependQnid" style="display: none;">
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Depend question <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" id="depend_option" name="depend_option" onchange="javascript:getoption(this);" >
                                                    <option value="" >Select depend question</option> 
                                            <?php if(isset($data['questions'])){
                                                if(count($data['questions'])>0){
                                            foreach($data['questions'] as $question){ 
                                            ?>
                                                    <option value="<?php echo $question->question_id;?>" ><?php echo $question->question;?></option> 

                                            <?php } } }?>
                                                    </select>
                                               
                                                <ul id="parsley-id-3638" class="parsley-errors-list"></ul>
                                            </div>
                                        </div>
                            <div id="dependoption"></div>
                            <div class="form-group" id="dsp" style="display: none;"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                            </label><div class="col-md-6 col-sm-6 col-xs-12"><a href="javascript:void(0);" onclick="javascript: getoption('1');">Add more conditions </a></div>
                                        </div>
                                                     
                        </div>           
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="../admin/questions"><button type="button" class="btn btn-primary">Cancel</button></a>
                                                <button type="submit" class="btn btn-success" name="add" id="update">Add</button>
                                        </div>
                                        </div>
                                    </form>
                    
                 
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<script>
$('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

$('.multi.required')
    .on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });
    $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;            
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });
</script>
@stop

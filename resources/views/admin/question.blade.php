@extends('layouts.adminlayout')
@section('content')

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
                    <h3 class="pagehd">Questions <small></small></h3>
                    <h2 class="pagehdbtn"><a href="{{URL::to('/')}}/admin/add-question"><i class="fa fa-plus fa-6" aria-hidden="true">&nbsp;Add Question</i></a> </h2>
                    <div class="clearfix"> </div>
                </div>
                <?php if(Session::get('flash_msg') != ''){?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-success" id="" ><?php echo Session::get('flash_msg');?></div>
                    </div>                               
                <?php } ?> 
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>
                                <th class="edit">Order</th>
                                <th> Question </th>
                                <th> Group</th>
                                <th class="edit">Depend</th>
<!--                            <th class="edit">Edit</th>
                                <th class="edit">Delete</th>
-->
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($questions as $question){ 
                            ?>
                                <tr class="even pointer">
                                    <td class=" ">{{++$i}}</td>
                                    <td class=" ">{{$question->display_order}}</td>
                                    <td class=" "><?php echo substr($question->question,0,30);?></td>
                                    <td class=" last">{{$question->group_name}}</td>      
                                    <td class=" "><?php echo $type =  ($question->dependable_question == '1') ?  'Yes': 'No';?> </td> 
                                    
                                    <td>
                                        <a href="{{URL::to('/')}}/admin/edit-question/{{$question->question_id}}">
                                             <i aria-hidden="true" class="fa fa-pencil fa-4" title="Edit"></i>
                                        </a>
                                        &nbsp;
                                        <?php if(!isset($question->depend_id)){?>
                                        <a href="{{URL::to('/')}}/admin/del-question/{{$question->question_id}}" onclick="return confirm('Are you sure to delete this Question?')">
                                            <i class="fa fa-trash-o fa-4" aria-hidden="true" title="Delete"></i>
                                        </a>
                                        <?php }?>
                                    </td>
                                </tr>    
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>

<script type="text/javascript">
//    $('.unassigned').on('click', function(){
//        if(confirm('Are you sure to assign this to you?') == true){
//            var idArr = $(this).attr('id').split('_');
//            var counsid = <?php echo Session::get('admin_id'); ?>;
//                    
//            $.ajax({
//                type: "POST",
//                url:  "assign",
//                data: {answer: idArr[1], counsellor: counsid},
//                success: function(){
//                    alert("Assigned Successfully.");
//                },
//                error: function() {
//                    alert('Error occured');
//                },
//            });
//            
//            $(this).removeClass().addClass("assigned fa fa-bookmark");
//            $(this).html(" (Me)");
//        }
//        else{
//            alert("Not assigned!");
//        }
//    });
</script>    
@stop
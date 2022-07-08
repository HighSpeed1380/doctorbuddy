@extends('layouts.adminlayout')
@section('content')

<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <?php if(Session::get('flash_msg') != ''){?>
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="alert alert-success" id="" ><?php echo Session::get('flash_msg');?></div>
            </div>                               
        <?php } ?>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <h3 class="pagehd">Insurances</h3>
                    <h2 class="pagehdbtn"><a href="<?php echo $data['site_url'] ?>/admin/insurance/add">Add Insurance</a> </h2>
                    <div class="clearfix">  </div>
                    
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>       
                                <th>Insurance Name</th>
                                <th>Insurance Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($insurances as $insurance){ 
                            ?>

                                <tr class="even pointer">
                                    <td class=" ">{{++$i}}</td>
                                    <td class=" ">{{$insurance->insurance_name}}</td>
                                    <td class=" ">{{$insurance->insurance_description}}</td>
                                    <?php if($insurance->insurance_status): ?>
                                    <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$insurance->insurance_id}}" title="Change Status" ><img src="../images/active.png"></a>    
                                    </td>
                                    <?php else : ?>
                                     <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$insurance->insurance_id}}" title="Change Status" ><img src="../images/inactive.png"></a>    
                                    </td>
                                    <?php endif ?>  
                                   
                                    <td><a href="<?php echo $data['site_url'] ?>/admin/insurance/edit/{{$insurance->insurance_id}}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                                    <td>
                                        <button delete_id ="{{$insurance->insurance_id}}" type="button" class="btn btn-delete">Delete</button>
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
<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/admin/list_insurance.js'); ?>"></script>
@stop


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
                    
                    <h3 class="pagehd">Languages</h3>
                    <h2 class="pagehdbtn">
                        <a href="<?php echo $data['site_url'] ?>/admin/language/add">
                            <i class="fa fa-plus fa-6" aria-hidden="true">&nbsp;Add Language</i>
                        </a> 
                        
                    </h2>
                    <div class="clearfix">  </div>
                    
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>       
                                <th>Language Name</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($languages as $language){ 
                            ?>

                                <tr class="even pointer">
                                    <td class=" ">{{++$i}}</td>
                                    <td class=" ">{{$language->language_name}}</td>
                                    <?php if($language->language_status): ?>
                                    <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$language->language_id}}" title="Change Status" ><img src="../images/active.png"></a>    
                                    </td>
                                    <?php else : ?>
                                     <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$language->language_id}}" title="Change Status" ><img src="../images/inactive.png"></a>    
                                    </td>
                                    <?php endif ?> 
                                    
                                    <td>
                                        <a href="<?php echo $data['site_url'] ?>/admin/language/edit/{{$language->language_id}}">
                                             <i aria-hidden="true" class="fa fa-pencil fa-4" title="Edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="javascript:void(0);" delete_id ="{{$language->language_id}}" class="link-delete">
                                            <i class="fa fa-trash-o fa-4" aria-hidden="true" title="Delete"></i>
                                        </a>
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
<script src="{{ asset('js/admin/list_language.js'); ?>"></script>
@stop


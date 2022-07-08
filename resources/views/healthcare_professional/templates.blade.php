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
        
        <?php if($hpObj->healthcare_professional_status ==4) : ?>
        <div class="col-lg-12">
            <div class="warning-alert">Warning : Please complete your registration to access other areas.</div>
        </div>
        <?php endif ?>    
        
        <div class="col-lg-12">
        <div class="m-b">
          <h3>My Templates</h3>
        </div>
        <div class="m-b text-right">
            <a href="<?php echo $data['site_url'] ?>/healthcare_professional/templates/Add">
                <button type="button" class="btn btn-red m-b"> Add new</button>
            </a>            
        </div>
        <?php if(Session::get('flash_msg')) : ?>
            <div class="m-b">
                <div class="success-alert alert"><?php echo Session::get('flash_msg') ?></div>
            </div>    
        <?php endif ;?>
            
        <?php if(Session::get('error_msg')) : ?>
            <div class="m-b">
                <div class="alert-danger alert"><?php echo Session::get('error_msg') ?></div>
            </div>    
        <?php endif ;?>    
            
        <div id="message"  class="hide m-b">
            <div id="message-text"></div>
        </div>        
                
        <div id="template_table_cover">
        <div class="table-responsive">
            <table class="table display" width="100%" cellspacing="0" id="customer_casefile">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =0 ;?>
                <?php if(isset($data['templates'])&& count($data['templates']) > 0){ ?>
                    <?php foreach($data['templates'] as $template){ ?>
                        <?php $templateId = $template->communication_template_id ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo ucfirst($template->template_title) ;?></td>                           
                            <td><?php echo date(Config::get('constants.DATE_FORMAT'),  strtotime($template->create_date));?></td>                            
                            <td class="links">
                                <a href="javascript:void(0);" class="view_template" view_id="<?php echo $templateId ?>" >
                                    <i class="fa fa-eye fa-4" aria-hidden="true" title="View Template"></i>
                                </a>
                                <?php 
                                //Edit,Delete options for my own templates
                                if($template->create_user_type =='HP' && $template->create_user_id == $hpObj->healthcare_professional_id): ?>
                                &nbsp;
                                <a href="<?php echo $data['site_url'] ?>/healthcare_professional/templates/Edit/<?php echo $templateId ?>">
                                    <i aria-hidden="true" class="fa fa-pencil fa-4" title="Edit"></i>
                                </a>
                                
                                &nbsp;
                                <a href="javascript:void(0);" class="delete" delete_id="<?php echo $templateId ?>">
                                    <i class="fa fa-trash-o fa-4" aria-hidden="true" title="Delte"></i>
                                </a>
                                <?php endif;?>
                            </td>
                        </tr>
                    <?php } ?>                        
                <?php }else{ ?>
                       <tr><td colspan="5" class="text-center">No templates available</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
            </div>
        </div>        
        
    </div>
</main>

<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/healthcare_professional/templates.js'); ?>"></script>
@stop

@section('modal_popup_area')
<!-- START :Template view  Pop up -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="template_popup">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="template_modal_title"></h4>
        </div>
          <div class="modal-body" id="template_modal_body">
          
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
 <!-- END :Template view  Pop up -->    
@stop 
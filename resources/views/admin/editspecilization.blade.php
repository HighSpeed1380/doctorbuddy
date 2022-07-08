@extends('layouts.adminlayout')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Specilization</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Specilization <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    <br><br>
                    <form action="javascript:edit_specilization();" class="form-horizontal form-label-left" novalidate  method="post"  id="edit_specilization_form">
                        
                        <div id="message"  class="hide item form-group">
                            <div id="message-text"></div>
                        </div>                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Specilization <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="specilization_name" class="form-control col-md-7 col-xs-12"  name="specilization_name" title="Specilization name" required="required" type="text" value="<?php echo $data['specilizationObj']->specilization_name ?>">
                            </div>
                        </div>
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="specilization_description" class="form-control col-md-7 col-xs-12"  name="specilization_description" title="Specilization Description" required="required" ><?php echo $data['specilizationObj']->specilization_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="radio">
                                     <label>
                                         <input <?php if($data['specilizationObj']->specilization_status == 1){?>checked="checked" <?php } ?>value="1" id="specilization_status" name="specilization_status" type="radio"> Enable</label><label>
                                         <input <?php if($data['specilizationObj']->specilization_status == 0){?>checked="checked" <?php } ?> value="0" id="specilization_status" name="specilization_status" type="radio"> Disable</label>
                                 </div>

                             </div>
                         </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo $data['site_url'] ?>/admin/specilization"><button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button></a>
                                <button type="submit" class="btn btn-success" name="edit" id="edit" href="edit_specilization">Update</button>
                                
                                <input type="hidden" name="form_submit" value="save">
                                <input type="hidden" name="specilization_id" id="specilization_id" value="<?php echo $data['specilizationObj']->specilization_id ?>">
                                
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
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="{{ asset('js/admin/edit_specilization.js'); ?>"></script>

@stop

@extends('layouts.customerlayout')
@section('content')
<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('customer.dashboardmenu')
     
    <div class="content-wrapper col-lg-10 col-sm-10 col-xs-12">
        
        <div class="m-b">
          <h3>My Case Files</h3>
        </div>
        
        <div class="col-lg-12 no-pad">
        <div class="table-responsive">
            <table class="table display" width="100%" cellspacing="0" id="customer_casefile">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nick Name</th>
                    <th>Last Updated</th>
                    <th>Provider</th>
                    <th>Counselor</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =0 ;?>
                <?php if(isset($data['customerinfo'])&& count($data['customerinfo']) > 0){ ?>
                    <?php foreach($data['customerinfo'] as $customerinfo){ ?>
                <?php //echo '<pre>';print_r($customerinfo);?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo ucfirst($customerinfo->customer_nickname) ;?></td>
                            <td><?php echo date(Config::get('constants.DATE_FORMAT'),strtotime($customerinfo->updated_at));?></td>
                            <td></td>
                            <td></td>
                            <td class="links">
                                 
                                <a href="{{ asset('customer/reports/'.$customerinfo->customer_detail_id );?>" >Case File</a>&nbsp;l&nbsp;
                                <a href="{{ asset('customer/symptom/'.$customerinfo->customer_detail_id );?>" >Symptoms</a><br>
                                <a href="{{ asset('customer/uploadfiles/'.$customerinfo->customer_detail_id );?>" >Documents</a><br>
                                <a href="{{ asset('customer/assignedproviders/'.$customerinfo->customer_detail_id );?>" >Assigned Providers</a>
                            </td>
                        </tr>
                    <?php } ?>                        
                <?php }else{ ?>
                       <tr><td colspan="6" class="text-center">No reports to View</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
        </div>        
    </div>
</main>    

<script>
$(document).ready(function() {
    $('#customer_casefile').DataTable();
} );
</script>
@stop
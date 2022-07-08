@extends('layouts.adminlayout')
@section('content')

<div class="">

    <div class="clearfix"></div>

    <div class="row">
        
            <?php if(Session::has('flash_msg')){?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-success" ><?php echo Session::get('flash_msg');?></div>
                </div>                               
            <?php } ?>
        
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3 class="pagehd">Customers</h3>
                    <h2 class="pagehdbtn">
                        <a href="<?php echo $data['site_url'] ?>/admin/customer/add">
                            <i class="fa fa-plus fa-6" aria-hidden="true">&nbsp;Add Customer</i>
                        </a> 
                    </h2>
                    <div class="clearfix">  </div>
                </div>                
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>    
                                <th>Customer Email</th>
                                <th>Customer Name</th>                                
                                <th>Added Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($customers as $customer){ 
                            ?>

                                <tr class="even pointer">
                                    <td class=" "><?php echo ++$i?></td>
                                    <td class=" "><?php echo $customer->customer_email_id?></td>
                                    <td class=" "><?php echo $customer->customer_fname." ".$customer->customer_lname; ?></td>   
                                    <td class=" "><?php echo date(Config::get('constants.DATE_TIME_FORMAT'),  strtotime($customer->created_at));?> </td>  
                                    <td>
                                        <a href="{{ asset('admin/viewcustomer/'.$customer->customer_id)?>">
                                            <i class="fa fa-eye fa-4" aria-hidden="true" title="Customer Details"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ asset('admin/casefiles/customer/'.$customer->customer_id)?>">
                                            <i class="fa fa-bars fa-4" aria-hidden="true" title="Case File Lists"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ asset('admin/customer/edit/'.$customer->customer_id)?>">
                                            <i aria-hidden="true" class="fa fa-pencil fa-4" title="Edit"></i>
                                        </a>                                         
                                        &nbsp;
                                        <a href="javascript:void(0);" delete_id ="{{ $customer->customer_id}}" class="link-delete">
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
<script src="{{ asset('js/admin/list_customer.js'); ?>"></script>
@stop
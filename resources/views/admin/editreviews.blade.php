@extends('layouts.adminlayout')
@section('content')
<?php //print_r($data);exit;?>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Customer Reviews</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Review <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    <br></br>

                    <form action="javascript:void(0);" novalidate="" id="editreviews" data-parsley-validate="" class="form-horizontal form-label-left" method="post">

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_id">Customer Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select disabled="disabled" class="form-control" id="customer_id" name="customer_id"  title="customer name">
                                           
                                            <?php
                                                $customers = DB::table('customers')
                                                            ->where('is_deleted','=',0)
                                                            ->where('customer_fname','!=','')       
                                                            ->orderBy('customer_fname', 'ASC')->get();
                                                if(count($customers)>0) 
                                                { ?>
                                                        <option value="">---Select---</option>
                                                <?php
                                                
                                                foreach ($customers as $customer) {
                                           ?>
                                                    <option value="<?php echo $customer->customer_id;?>" <?php if($customer->customer_id==$data['customer_id']){ echo "selected='selected'";}?>><?php echo $customer->customer_fname.' '.$customer->customer_lname;?></option>                                                 
                                           <?php
                                                }
                                                }
                                                else
                                                {
                                            ?>
                                                     <option value=''>---No customer(s) found---</option> 
                                            <?php
                                                    
                                                }
                                           ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="healthcare_professional_id">Provider Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select disabled="disabled" class="form-control" id="healthcare_professional_id" name="healthcare_professional_id" title="provider name">
<!--                                            <option value="">---Select---</option>-->
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="review_score">Review Score<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="review_score" name="review_score" title="Review Score" required="required" class="form-control">                                                                       
                                            <option value="1" data-html="Terrible" <?php if($data['review_score']=="1"){ echo "selected='selected'";}?>>1</option>
                                            <option value="2" data-html="Poor" <?php if($data['review_score']=="2"){ echo "selected='selected'";}?>>2</option>
                                            <option value="3" data-html="Average" <?php if($data['review_score']=="3"){ echo "selected='selected'";}?>>3</option>
                                            <option value="4" data-html="Good" <?php if($data['review_score']=="4"){ echo "selected='selected'";}?>>4</option>
                                            <option value="5" data-html="Excellent" <?php if($data['review_score']=="5"){ echo "selected='selected'";}?>>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="comments">Comments
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea placeholder="Please share your consultation experience here...(as chosen customer)" rows="7" class="form-control" name="comments" title="comments"><?php if($data['comments']){ echo $data['comments'];}?></textarea>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                      <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad item right-pad">
                                            <a href="../admin/reviews"><button class="btn btn-primary" title="Cancel" type="button">Cancel</button></a>
                                            <button type="submit" title="Update" onclick="return edit(<?php echo $data['id']; ?>);"  class="btn btn-success" role="button">Update</button>
                                            <input type="hidden" name="form_submit" value="save"> 
                                      </div>
                                </div>
                                </div>
                                <input type="hidden" value="<?php echo $data['customer_id'];?>" name="customer_id">
                                <input type="hidden" value="<?php echo $data['healthcare_professional_id'];?>" name="healthcare_professional_id">
                            </form>
                    
                 
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>

<script src="{{ asset('js/admin/editreviews.js'); ?>"></script>
<script src="{{ asset('js/review/jquery.barrating.min.js'); ?>"></script>
<script type="text/javascript">
   var SITE_URL = "<?php echo $data['site_url'] ?>";
   var customerId = $('#customer_id').val();
   var healthcareProfessionalId="<?php echo $data['healthcare_professional_id'];?>";
</script>
@stop

@extends('layouts.homelayout')
@section('content')

<section id="home" class="banner">
    <img id='random' class="img-responsive"/>

    <div class="banner-leftwrap">
        <div class="container">
            <div class="start">
                <p >Doctor Buddy helps you<br>
                to take the right decision on <strong>treatments</strong>,<br>
                Our numerous<span class="red"> <strong>experts</strong></span> can guide<br>
                you for a better <strong>health</strong> !</p>
                <div class="start-btn-box">
                <p>Get it in just &nbsp; &nbsp; &nbsp;<strong>steps</strong>! Click here to <a href="{{ asset('home/basic'); ?>" class="start-btn"></a></p>
                <span class="test">3</span></div>
            </div>
            <div class="highlights">
                <h2>Our <strong class="redcolor">highlights</strong></h2>
                    <div class="highlights-box col-lg-8 pull-right">
                        <ul>
                            <li>+ Check your symptoms</li>
                            <li>+ Ask for medical opinions</li>
                            <li>+ Choose the best medicines</li>
                            <li>+ Meet the best Doctors</li>
                            <li>+ Best medical packages</li>
                            <li>+ Best Facilities</li>
                            <li>+ Holistic Medications </li>
                       </ul>
                   </div>
                   <div class="col-lg-8 pull-right text-right m-t no-pad"> <img src="{{ asset('images/chat-icon.png'); ?>" alt="Chat"></div></div>
            </div>
        </div>
    <div class="bottom-wrap">
        <img src="{{ asset('images/banner-shade.png'); ?>" class="img-responsive" alt="shade">
    </div>    
    

</section>


<section class="show-mob">
  <div class="container">
    <div class="col-lg-12"><span><span class="grey-dark">Doctor Buddy helps you
to take the right decision on <strong>treatments</strong>,Our numerous</span><span class="red"> <strong>experts</strong></span> can guide
you for a better <strong>health</strong> !</span>
<div class="start-btn-box">
<span>Click here to <a href="{{ asset('home/basic'); ?>"><img src="{{ asset('images/start-btn.png'); ?>"></a></span>
</div>
</div>
    
  </div>
</section>


<section class="pinkbg col-lg-12">
    <div class="container">

        <div class="col-lg-6 col-xs-8 col-sm-12 row ISO">
        <div class="col-lg-8"><img src="{{ asset('images/ISO.png'); ?>" class="img-responsive">
        <p>As we consider our life precious, it is important seeks second opinion on matters related to physical and mental health</p>
        <small>* You have options to choose more indepth </small>
        </div>
        </div>
      
        <div class="col-lg-6 col-xs-12 col-sm-12 row">
        <div class="features">
                <span><img src="{{ asset('images/identity-icon.png'); ?>"></span>
            <span><strong>Protect</strong> your <strong>identity</strong>! <br>
        (Only a nickname required)</span>
        </div>
        <div class="features">
                <span><img src="{{ asset('images/BM-icon.png'); ?>"></span>
          <span>Many <strong>experts</strong> can help you to decide <br>
        the <strong>best medication</strong> for your health!</span>
        </div>
        <div class="features">
                <span><img src="{{ asset('images/ESQ-icon.png'); ?>"></span>
            <span><strong>Easy and simple</strong> questions !	<br>
        (Scientifically designed for a hassle free use)</span> </div>
        <div class="features">
                <span><img src="{{ asset('images/sug-icon.png'); ?>"></span>
            <span><strong>You can choose</strong> the best <strong>medical packages</strong><br>
        from the <strong>suggested list of replies!</strong></span>
        </div>
        </div>
    </div>
</section>

<section class="pinkCbg col-lg-12">
<div class="container">
  <h2><strong>How</strong> it works...in <strong>3 simple steps?</strong></h2>
  <div class="col-lg-12 row">
  <div class="col-lg-8 row">
  <img src="{{ asset('images/steps.png'); ?>" class="img-responsive" alt="Steps">
  <div class="steps">
          <ul>
          <li>1 - <strong>BASIC INFO</strong> -  Nickname / Age / Sex / Height / Weight</li>
          <li>2 - <strong>ADD SYMPTOMS</strong> -  Symptoms / Allergies / Treatment History</li>
          <li>3 - <strong>QUESTIONS</strong> - Issues / Psycological hurdles</li>
          <li class="red_col"><strong>Receive</strong> expert opinions and packages for treatments!</li>
      </ul>
  </div>
  </div>
  <div class="col-lg-4 our-con text-right"><img src="{{ asset('images/our-counselors.png'); ?>" class="img-responsive"></div>
  </div>
</div>

</section>

<section id="testimonial" class="pink-dark-bg testimonial col-lg-12">
       <div class="container">
       <h2>Read <strong>my story</strong> and how <strong>it changed my life!</strong></h2>
       
       
       <div class="col-lg-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10000">
             
            <!-- Indicators -->
             <?php
                $testimonials = DB::table('testimonials')->where('testimonial_status','=',1)->orderBy('display_order')->get();
             ?>

            <?php if(count($testimonials)>0){ ?>
               <ol class="carousel-indicators">
                 <?php for($j=0;$j< ceil(count($testimonials)/2);$j++) { ?>  
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $j ?>"  <?php if ($j==0) { ?>class="active" <?php } ?>></li>
                 <?php } ?>
               </ol>
            <?php } ?>

            <!-- Wrapper for slides -->

            <?php if(count($testimonials)>0){ ?>
            <div class="carousel-inner" role="listbox">
                <?php $i=1; ?>
                <?php foreach($testimonials as $testimonial) { ?>
                
                    <?php if($i%2 == 1) { $margin = "m-b";?>  <!-- if it is odd number -->
                    <div class="item <?php if($i==1) { echo "active"; } ?>"   >
                    <?php } else { $margin = ""; } ?>    

                        <div class="col-md-12 row <?php echo $margin ?>">

                            <div class="profile-image">
                                <img alt="profile" class="m-b-md" src="{{ asset('uploads/testimonial'); ?>/<?php echo $testimonial->image ?>">
                            </div>
                            <div class="profile-info">
                                <div class="">
                                    <div>
                                        <?php echo $testimonial->testimonial_content ?>                                       
                                        <h4><?php echo $testimonial->user_name ?> - <?php echo $testimonial->user_location ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($i%2 == 0) { ?>
                            </div>
                        <?php } ?> 


                <?php $i=$i+1; } //end forach ?>
                    
                <?php if(($i-1)%2 == 1) { ?>
                    </div>
                <?php } ?>    

            </div>

            <?php } //end if ?>

        </div>
       </div>
    
    
    
       <div class="col-lg-4 text-right testi-rg">
         <img src="{{ asset('images/testi-right-img.png'); ?>" class="img-responsive" alt="Testimonial -rightpart"></div>
       <div class="start-b"><p class="text-center">Click here to <a href="{{ asset('home/basic'); ?>" class="start-btn"></a></p></div>
       </div>
</section>


<section id="symptoms" class="grey-bg symptoms col-lg-12">
  <div class="container">
  <h2>Basic <strong>symptoms</strong> and remedies<strong>!</strong></h2>
     <?php
     $symptomsAndRemedies = DB::table('contents')->where('contents_position','=',5)->where('contents_status','=',1)->orderBy('display_order')->get();
     if(count($symptomsAndRemedies)>0){
         foreach($symptomsAndRemedies as $symptomsAndRemedy)
         echo $symptomsAndRemedy->contents_description;
     }
     ?>
  </div>
</section>
@stop
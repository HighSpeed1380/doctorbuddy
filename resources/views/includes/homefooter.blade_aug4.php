<?php

    $footermenus1 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',1)->where('contents_status','=',1)->get();

    $footermenus2 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',2)->where('contents_status','=',1)->get();

    $footermenus3 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',3)->where('contents_status','=',1)->get();

    $footermenus4 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',4)->where('contents_status','=',1)->get();

    $footerText = DB::table('contents')->where('contents_position','=',6)->where('contents_status','=',1)->get();

?>



<section id="footer" class="col-lg-12">

    <footer>

            <div class="container">

            <div class="nav-footer-wrap col-lg-2 col-sm-3">

                    <ul class="footer-nav">

                     <?php if(count($footermenus1)>0){

                         foreach($footermenus1 as $footermenu1){

                             

                            echo "<li><a href='".asset("home/contents/$footermenu1->contents_key")."'>".$footermenu1->contents_title."</a></li>" ;

                         }

                     }

                     ?>

                    <li><a href="{{ asset('healthcare_professional/listing')?>">Providers</a></li>

                    <li><a href="{{ asset('counselor/listing')?>">Counselors</a></li>                         

                </ul>

            </div>

            <div class="nav-footer-wrap col-lg-2 col-sm-3 ">

                    <ul class="footer-nav">

                     <?php if(count($footermenus2)>0){

                         foreach($footermenus2 as $footermenu2){

                            echo "<li><a href='".asset("home/contents/$footermenu2->contents_key")."'>".$footermenu2->contents_title."</a></li>" ;

                         }

                     }

                     ?>
                    <li><a href="https://www.youtube.com/watch?v=bYKOjrcSaZ8&feature=youtu.be" target="_blank">Free Demo</a></li>
                </ul>

            </div>

            <div class="nav-footer-wrap col-lg-2 col-sm-3 ">

                    <ul class="footer-nav">

                   <?php if(count($footermenus3)>0){

                         foreach($footermenus3 as $footermenu3){

                            echo "<li><a href='".asset("home/contents/$footermenu3->contents_key")."'>".$footermenu3->contents_title."</a></li>" ;

                         }

                     }

                     ?>
                    <li><a href="{{ asset('home/contactus')?>">Contact Us</a></li>
                    </ul>

            </div>

            <div class="nav-footer-wrap col-lg-2 col-sm-3">

                    <ul class="footer-nav">

                   <?php if(count($footermenus4)>0){

                         foreach($footermenus4 as $footermenu4){

                            echo "<li><a href='".asset("home/contents/$footermenu4->contents_key")."'>".$footermenu4->contents_title."</a></li>" ;

                         }

                     }

                     ?>

                    </ul>

            </div>
            <div class="nav-footer-wrap col-lg-2 col-sm-3 col-xs-12">

                    <ul class="footer-nav">
						<h4>Terms &amp; Conditions</h4>
                   		<li><a href="{{ asset('home/content/terms-conditions-customer')?>">Customer</a></li>

                    <li><a href="{{ asset('home/content/terms-conditions-provider')?>">Counselors</a></li>
                    <li><a href="{{ asset('home/content/terms-conditions-provider')?>">Provider</a></li>  

                    </ul>

            </div>

             <div class="nav-footer-wrap col-lg-2 col-sm-3 col-xs-12">

                    <div class="text-center m-b-sm">

                        <a href="{{ asset(''); ?>"><img src="{{ asset('images/footer-log.png'); ?>" alt="Footer Logo"></a></div>

                <div class="text-center"><a href="{{ asset('customer/register'); ?>"><img src="{{ asset('images/register-btn.png'); ?>" alt="Footer Logo"></a></div>

            </div>

        </div>

    </footer>

</section>

<div class="copyright dark-pink col-lg-12">

          <div class="container">

           <?php if(count($footerText)>0)   {

               echo $footerText[0]->contents_description;

           }

           ?>

      </div>

</div>





<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<script src="{{ asset('js/bootstrap.min.js'); ?>" type="text/javascript"></script>

    

<script>

var image = new Array ();

image[0] = "{{ asset('images/banner-img1.jpg'); ?>";

image[1] = "{{ asset('images/banner-img2.jpg'); ?>";

image[2] = "{{ asset('images/banner-img3.jpg'); ?>";

image[3] = "{{ asset('images/banner-img4.jpg'); ?>";

var size = image.length

var x = Math.floor(size*Math.random())

$('#random').attr('src',image[x]);

</script>

<script>

 /* ----------------------------------------------------------- */

   /*  Fixed header

   /* ----------------------------------------------------------- */



$(window).on('scroll', function(){



    if( $(window).scrollTop()>100 ){



    $('.header2').addClass('animated fadeInDown');

    } 

    else {



    $('.header2').removeClass('animated fadeInDown');



    }



}); 



</script>



<script src="{{ asset('js/make_modal_popup_center.js'); ?>"></script>
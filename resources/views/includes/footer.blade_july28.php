<?php

    $footermenus1 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',1)->where('contents_status','=',1)->get();

    $footermenus2 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',2)->where('contents_status','=',1)->get();

    $footermenus3 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',3)->where('contents_status','=',1)->get();

    $footermenus4 = DB::table('contents')->where('contents_position','=',3)->where('display_order','=',4)->where('contents_status','=',1)->get();

    $footerText = DB::table('contents')->where('contents_position','=',6)->where('contents_status','=',1)->get();

?>

<section id="footer" class="col-lg-12 m-t-lg">

    <footer>

            <div class="container">

            <div class="col-lg-2 col-sm-2 col-sx-3">

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

            <div class="col-lg-2 col-sm-2 col-xs-12">

                    <ul class="footer-nav">

                     <?php if(count($footermenus2)>0){

                         foreach($footermenus2 as $footermenu2){

                            echo "<li><a href='".asset("home/contents/$footermenu2->contents_key")."'>".$footermenu2->contents_title."</a></li>" ;

                         }

                     }

                     ?>

                </ul>

            </div>

            <div class="col-lg-2 col-sm-2 col-xs-12">

                    <ul class="footer-nav">

                   <?php if(count($footermenus3)>0){

                         foreach($footermenus3 as $footermenu3){

                            echo "<li><a href='".asset("home/contents/$footermenu3->contents_key")."'>".$footermenu3->contents_title."</a></li>" ;

                         }

                     }

                     ?>

                    </ul>

            </div>

            <div class="col-lg-2 col-sm-2 col-xs-12">

                    <ul class="footer-nav">

                   <?php if(count($footermenus4)>0){

                         foreach($footermenus4 as $footermenu4){

                            echo "<li><a href='".asset("home/contents/$footermenu4->contents_key")."'>".$footermenu4->contents_title."</a></li>" ;

                         }

                     }

                     ?>

                    </ul>

            </div>
                  <div class="col-lg-2 col-sm-2 col-xs-12">

                    <ul class="footer-nav">
						<h4>Terms &amp; Conditions</h4>
                   		<li><a href="{{ asset('home/content/terms-conditions-customer')?>">Customer</a></li>

                    <li><a href="{{ asset('home/content/terms-conditions-provider')?>">Counselors</a></li>
                    <li><a href="{{ asset('home/content/terms-conditions-provider')?>">Provider</a></li>  

                    </ul>

            </div>

             <div class="col-lg-2 col-sm-2 col-xs-12">

                    <div class="text-right m-b-sm">

                        <a href="{{ asset(''); ?>"><img src="{{ asset('images/footer-log.png'); ?>" alt="Footer Logo"></a></div>

                <div class="text-right"><a href="{{ asset('customer/register'); ?>"><img src="{{ asset('images/register-btn.png'); ?>" alt="Footer Logo"></a></div>

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
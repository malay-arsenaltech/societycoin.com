<?php $this->load->view('header'); ?>

 <link rel="stylesheet" href="<?php echo frontThemeUrl; ?>css/accordion.css" type="text/css" media="screen" />
        <style type="text/css">
            .accordion { position: relative; float:left;}
        </style>
<script> 	
            var selid ='';
            $(document).ready(function(){
            	var selid ='';
            
                $('.tab').click(function(){
										 
            		var selid = $(this).attr('id');
					$('.content').hide();
					
					$('.show'+selid).show("slow");
					
				
					

            	});
            		   
            	$('.content ul li').click(function(){					 
            				var uu = 	$(this).attr('id');
            				$('.view-content').hide();
            				$('#'+uu+'-right').show();
            				$(this).parents('div').show();
            										 });
            		   });
                                                  
                   
        </script>




<div class="row-fluid mid-outer">

  <div class=" container mid-inner">

    <!--left-->

    <?php  $this->load->view('left_1'); ?>
    
     

    <!--left//-->

    <!-- mob navigation-->

    <?php $this->load->view('mob_nav'); ?>

    <!--right-->

    <div class="right">

    <?php $this->load->view('menu'); ?>

    

    <div id="vertical_container" >

   <!-- <div class="faq">-->
      
            <!--acc-->
            <div id="tab-right">
                <!--greeting-->
                <div style="display:block;" id="gs1-right" class="view-content">
                    <h4>Getting Started</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">General</p>
                        <section id="vertabout">
                            <h2><a href="#vertabout"><span>&#8226;</span> Why SocietyCoin.com?</a></h2>
                            <p>SocietyCoin.com provides an easy way to pay your residential & commercial housing societies. For example bills for electricity, water and any other maintenance charges. We offer a hassle free experience so you can pay your bills around the clock from the comfort of your personal computer or mobile. Our streamlined payment saves you a trip to your RWA office or maintenance payment pick up drop box</p>
                        </section>
                        <section id="vertservices">
                            <h2><a href="#vertservices"> <span>&#8226;</span> Do I have to payextra charges for using SocietyCoin.com?</a></h2>
                            <p>All services on SocietyCoin.com are subject to a service charge, that service charge will depend on the mode of payment you choose</p>
                        </section>
                        <section id="vertblog">
                            <h2><a href="#vertblog"> <span>&#8226;</span> Can I use SocietyCoin.com to pay someone else&lsquo;s bill?</a></h2>
                            <p>Absolutely, that&lsquo;s one of the advantages of using SocietyCoin.com. You can pay for any registered housing society bill using your SocietyCoin.com Account.</p>
                        </section>
                        <section id="vertportfolio">
                            <h2><a href="#vertportfolio"> <span>&#8226;</span> How do I get my housing society registered with Society coin.com?</a></h2>
                            <p>Simply click on the Recommend your society button from the Home Page.Your feedback and recommendations go a long way in helping us improve your experience with SocietyCoin.com.  </p>
                        </section>
                    </div>
                </div>
                <!---------------------------greeting //------------------->                
                <div id="gs2-right" class="view-content">
                    <h4>Getting Started</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Payment</p>
                        <section id="vert_payment_1">
                            <h2><a href="#vert_payment_1"> <span>&#8226;</span> How can I pay my housing society bills?</a></h2>
                          <p>By three easy steps</p>
                            <p> 1). Choose your residential/commercial complex from the drop down menu and enter amount.</p>
                            <p> 2). Choose either to login as user (or if visiting for the first time register)or continue as guest</p>
                            <p> 3). Finally select your payment method (Credit Card, Debit Card or netbanking)</p>
                        </section>
                        <section id="vert_payment_2">
                            <h2><a href="#vert_payment_2"> <span>&#8226;</span> Can I do a third party payment (send payment link to another party)?</a></h2>
                            <p>.     Absolutely, this nifty feature enables users to make their bill payments without having to send bills to your offices or looking for a drop box for your cheques. All this convenience under a few minutes</p>
                        </section>
                    </div>
                </div>
                <!---------------------------Payment//-------------------->   
                <div id="gs3-right" class="view-content">
                    <h4>Getting Started</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Feedback</p>
                        <section id="vert_feedback_1">
                            <h2><a href="#vert_feedback_1"> <span>&#8226;</span>  How can I pay my housing society bills?</a></h2>
                          <p>By three easy steps</p>
                            <p> 1). Choose your residential/commercial complex from the drop down menu and enter amount.</p>
                            <p> 2). Choose either to login as user (or if visiting for the first time register)or continue as guest</p>
                            <p> 3). Finally select your payment method (Credit Card, Debit Card or netbanking)</p>
                        </section>
                        <section id="vert_feedback_2">
                            <h2><a href="#vert_feedback_2"> <span>&#8226;</span>  I have a question about SocietyCoin.com that is not answered on this page. What do I do now?</a></h2>
                            <p>Please email your query to care@societycoin.com. We will revert to your email as soon as we can</p>
                        </section>
                        <section id="vert_feedback_3">
                            <h2><a href="#vert_feedback_3"> <span>&#8226;</span>  How much time will you take to reply to my query?</a></h2>
                            <p>.     Your Feedback is important to us. You should hear from us in 6 hours of sending your query at care@societycoin.com.</p>
                        </section>
                        <section id="vert_feedback_4">
                            <h2><a href="#vert_feedback_4"> <span>&#8226;</span>  I want to give feedback!</a></h2>
                            <p>Absolutely, Your feedback is very valuable to us. Please write to us at care@societycoin.com Thanks.</p>
                        </section>
                        <section id="vert_feedback_5">
                            <h2><a href="#vert_feedback_5"> <span>&#8226;</span>  I would like to suggest some ideas like a great new feature. How can I give a feature request or suggest ideas?</a></h2>
                            <p>We love to hear from our customers always. Your feedback and ideas helps us grow and offer you back more. Please write to us at care@societycoin.com. Thanks.</p>
                        </section>
                    </div>
                </div>
                <!---------------------------feedback //-------------------->   
                <div id="gs4-right" class="view-content">
                    <h4>Getting Started</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Contact</p>
                        <section id="vert_contact_1">
                            <h2><a href="#vert_contact_1">  <span>&#8226;</span>  I would like to work for your company. Whom should I contact?</a></h2>
                            <p>.     SocietyCoin.com is always looking for new and enthusiastic talent. If you would like to work for us, kindly email us at careers@societycoin.com</p>
                        </section>
                        <section id="vert_contact_2">
                            <h2><a href="#vert_contact_2">  <span>&#8226;</span>  I have a business proposition. Whom should I contact?</a></h2>
                            <p>Please keep your ideas rolling in. You can write to use at leagueoflegends@societycoin.com</p>
                        </section>
                        <section id="vert_contact_3">
                            <h2><a href="#vert_contact_3">  <span>&#8226;</span>  How long does is take for my bill payment to occur from SocietyCoin.com?</a></h2>
                            <p>Societycoin.com provides immediate bill payment. Just in case your payment fails due to a technical error at the client&lsquo;s end. We try making payment for the next two hours. If that does not work, we immediately initiate a refund for your transaction</p>
                        </section>
                    </div>
                </div>
                <!---------------------------contact //-------------------->   
                <div id="gs5-right" class="view-content">
                    <h4>Getting Started</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Payment Related</p>
                        <section id="vert_p-related_1">
                            <h2><a href="#vert_p-related_1">  <span>&#8226;</span> How will I know whether my payment has been successful?</a></h2>
                          <p>Once you complete your three step process for paying bills with SocietyCoin.com, you will receive the following from us:</p>
                            <p>	1). Immediate response on your screen</p>
                            <p>	2). Receipt in your email</p>
                            <p>	3). SMS from your bank on payment details</p>
                        </section>
                        <section id="vert_p-related_2">
                            <h2><a href="#vert_p-related_2">  <span>&#8226;</span> What If I do not receive any notification from my RWA or Residential complex operation for my successful transaction on SocietyCoin.com?</a></h2>
                            <p>.     Usually, you should get your payment details in an email in less than a minute after completing the transaction. In case it takes more than 4 hours. Please mail us at care@societycoin.com </p>
                        </section>
                        <section id="vert_p-related_3">
                            <h2><a href="#vert_p-related_3">  <span>&#8226;</span> My payment was successful, but I have not yet received my confirmation!</a></h2>
                            <p>At societycoin.com all bill payments are processed immediately. If you do not receive any confirmation email in four hours, then kindly email to us at care@societycoin.com mentioning your order number. We will be happy to help you.   </p>
                        </section>
                        <section id="vert_p-related_4">
                            <h2><a href="#vert_p-related_4">  <span>&#8226;</span> When I was doing the payment on SocietyCoin.com, I got a response that my payment was unsuccessful. What does this mean?</a></h2>
                            <p>Sometimes, it so happens that we that we are unable to connect to the housing society due to a temporary network problem. Please email us at care@societycoin.com with your order number and we will be happy to help you</p>
                        </section>
                    </div>
                </div>
                <!---------------------------Payment-related //-------------------->
                <!--my account-->
                <div id="ac1-right" class="view-content">
                    <h4>My Dashboard</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Sign Up</p>
                        <section id="vert_ac_1">
                            <h2><a href="#vert_ac_1">  <span>&#8226;</span> I don&lsquo;t have an account of SocietyCoin.com. Can I still pay my bills?</a></h2>
                            <p>Absolutely, you are welcome to checkout as our guest. At SocietyCoin.com we strive to make your life easier. Please feel free to try out our other features by registering with us</p>
                        </section>
                        <section id="vert_ac_3">
                            <h2><a href="#vert_ac_3">  <span>&#8226;</span>  So why should I sign up to use SocietyCoin.com?</a></h2>
                            <p>Signing up has its advantages. You can save all your past orders and transactions. SocietyCoin.com will also get your future bills for you so you can view them anytime at your convenience. You can also all download detailed reports and charts for all your bills.</p>
                        </section>
                    </div>
                </div>
                <!---------------------------sign in //-------------------->
                <div id="ac2-right" class="view-content">
                    <h4>My Dashboard</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Change Information</p>
                        <section id="vert_info_1">
                            <h2><a href="#vert_info_1">  <span>&#8226;</span>  I want to change my registered e-mail address?</a></h2>
                            <p>Go to your &lsquo;settings&lsquo; under My Dashboard, key in your new email address and click on &quot;Update&quot;. Your new email address will be updated real-time. It&lsquo;s important to use a valid and preferably your own email address as we send your bill payment to this email address</p>
                        </section>
                        <section id="vert_info_2">
                            <h2><a href="#vert_info_2">  <span>&#8226;</span>  How can I change my password?</a></h2>
                            <p>Go to your &lsquo;settings&lsquo; under My Dashboard, key in your old password and your new password and click on “Update”. Your new password will be updated real-time</p>
                        </section>
                    </div>
                </div>
                <!---------------------------change information//-------------------->
                <div id="ac3-right" class="view-content">
                    <h4>My Dashboard</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Add Properties</p>
                        <section id="vert_prop_1">
                            <h2><a href="#vert_prop_1">  <span>&#8226;</span>  Why should I add properties to my SocietyCoin.com Account?</a></h2>
                            <p>. This nifty feature allows you to save time in making payments for bills and also viewing detailed reports on these roperties.ahead try it out!</p>
                        </section>
                        <section id="vert_prop_2">
                            <h2><a href="#vert_prop_2">  <span>&#8226;</span>  How do I add a new property to my account?</a></h2>
                          <p>Once you are a registered user, you can add properties to save time in making your regular payments, you can add properties by following these easy steps</p>
                            <p>Click on My Properties under &quot;My Account&lsquo; tab and choose add a property </p>
                            <p>Fill in the details and click submit, you have successfully saved your properties </p>
                        </section>
                        <section id="vert_prop_3">
                            <h2><a href="#vert_prop_2">  <span>&#8226;</span>  What happens if I delete a property from my account?</a></h2>
                            <p>if you delete a property don&lsquo;t worry all you transactions will be saved as also past bills that you viewed. Nothing but the property name will be deleted</p>
                        </section>
                    </div>
                </div>
                <!---------------------------Add Properties/-------------------->
                <div id="ac4-right" class="view-content">
                    <h4>My Dashboard</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Reports</p>
                        <section id="vert_report_1">
                            <h2><a href="#vert_report_1">  <span>&#8226;</span>  How do I view my reports?</a></h2>
                            <p>once you add my properties and receive my bill for the following month, you will be able to view detailed charts and reports for your regular bills and download them for your perusal</p>
                        </section>
                    </div>
                </div>
                <!---------------------------Report-------------------->
                
                <!--make a payment-->
<div id="m1-right" class="view-content">
                    <h4>Make a Payment</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Payment</p>
                        <section id="vert_pay_1">
                            <h2><a href="#vert_pay_1">  <span>&#8226;</span>  How do I make a payment?</a></h2>
                           <p> By three easy steps</p>
                            
                            <p>1). Choose your residential/commercial complex from the drop down menu and enter amount.</p>
                            
                            <p>2). Choose either to login as user (or if visiting for the first time register)or continue as guest</p>
                            
                          <p>  3). Finally select your payment method (Credit Card, Debit Card or netbanking)</p>
                        </section>
                        <section id="vert_pay_2">
                            <h2><a href="#vert_pay_2">  <span>&#8226;</span> Can I Print?</a></h2>
                            <p>After a successful transaction you will receive a printer friendly email</p>
                        </section>
                        <section id="vert_pay_3">
                            <h2><a href="#vert_pay_3">  <span>&#8226;</span> Can I make changes once payment has completed?</a></h2>
                            <p>Sorry, After your transaction is successful you cannot alter any details</p>
                        </section>
                    </div>
                </div>  
                <!---------------------------Make A Payment-------------------->
<div id="m2-right" class="view-content">
                    <h4>Make a Payment</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Cancellation</p>
                        <section id="vert_can_1">
                            <h2><a href="#vert_can_1">  <span>&#8226;</span>    How can I cancel a payment?</a></h2>
                           <p>To cancel a payment please contact us at care@societycoin.com and we will reverse the tranasaction</p>
                            
                        </section>
                        <section id="vert_can_2">
                            <h2><a href="#vert_can_2">  <span>&#8226;</span> How do I check if my payment has been cancelled?</a></h2>
                            <p>You will receive an email within two hours</p>
                        </section>
                        <section id="vert_can_3">
                            <h2><a href="#vert_can_3">  <span>&#8226;</span> I cancelled my payment. How much of a refund can I expect after cancellation charges?</a></h2>
                            <p>The convenience charge will not be refunded</p>
                        </section>
                    </div>
                </div>  
                <!--------------------------Cancellation------------------->
<div id="s1-right" class="view-content">
                    <h4>Security</h4>
                    <div class="acco_rdion vertical">
                        <p class="bold">Security</p>
                        <section id="vert_sec_1">
                            <h2><a href="#vert_sec_1">  <span>&#8226;</span> Is my Credit/Debit Card information completely safe on your website?</a></h2>
                           <p></p>
                            
                        </section>
                        <section id="vert_sec_2">
                            <h2><a href="#vert_sec_2">  <span>&#8226;</span> What is Verified by Visa or VBV?</a></h2>
                            <p>VBV is an additional protection offered by Visa in conjunction with your credit card issuing bank. VBV protects your Visa card with a VBV password (also referred to as the 3D secure password) that has been created by you. It also provides the added assurance that only you can use your Visa card online. You can simply register your card and choose a 3D secure PIN. This PIN will be required whenever you use your card to make Internet purchases. It prevents unauthorised usage of your card on the Internet, ensuring greater security on online purchases</p>
                        </section>
                        <section id="vert_sec_3">
                            <h2><a href="#vert_sec_3">  <span>&#8226;</span> What is MasterCard Secure Code?</a></h2>
                            <p>MasterCard Secure Code is a service offered by banks in partnership with MasterCard. This service provides a way to PIN-protect your card usage on the Internet. You can simply register your card and choose a 3D secure PIN. This PIN will be required whenever you use your card to make Internet purchases. It prevents unauthorized usage of your card on the Internet, ensuring greater security on online purchases</p>
                        </section>
                    </div>
                </div>  
                <!--------------------------Security------------------>
              </div>
            <!--my account-->
        <!--</div>-->

    

    </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>
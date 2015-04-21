<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="<?php echo frontThemeUrl; ?>css/accordion.css" type="text/css" media="screen" />
<style type="text/css">
.accordion {
	position: relative;
	float:left;
}
</style>
<script> 	
            var selid ='';
            $(document).ready(function(){
            	var selid ='';
            
            	$('.tab').click(function(){
										 
            		var selid = $(this).attr('id');
					
					
					$('.show'+selid).show("slow");
					
//                 alert('show'+selid);
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
    <?php  $this->load->view('left_2'); ?>
    <!--left//-->
    <!-- mob navigation-->
    <?php $this->load->view('mob_nav'); ?>
    <!--right-->
    <div class="right">
      <?php $this->load->view('menu'); ?>
      <div id="vertical_container" >
        <!--<div class="faq">-->
          <!--acc-->
          <div id="tab-right">
            <div style="display:block;" id="po1-right" class="view-content">
              <h4>Payments options</h4>
              <div class="acco_rdion vertical">
                <p class="bold">Payment related</p>
                <section id="vert_p-opt_1">
                  <h2><a href="#vert_p-opt_1"> <span>&#8226;</span> How do I make a payment?</a></h2>
                  <p>By three easy steps</p>
                  <p> 1). Choose your residential/commercial complex from the drop down menu and enter amount.</p>
                  <p>2). Choose either to login as user (or if visiting for the first time register)or continue as guest.</p>
                  <p> 3). Finally select your payment method (Credit Card, Debit Card or netbanking)</p>
                </section>
                <section id="vert_p-opt_2">
                  <h2><a href="#vert_p-opt_2"> <span>&#8226;</span> What are the internet banking options on SocietycCoin.com?</a></h2>
                  <p></p>
                </section>
                <section id="vert_p-opt_3">
                  <h2><a href="#vert_p-opt_3"> <span>&#8226;</span> We offer as many as 45 net banking options on SocietyCoin.com: These include</a></h2>
                  <p>Allahabad Bank, Andhra Bank, Airtel Money, Axis bank, Bank of Bahrain and Kuwait, Bank of Baroda, Bank of India, Bank of Maharashtra, Bank of Rajasthan, Canara Bank, Catholic Syrian Bank, Central bank of India, Citibank, City Union Bank, Corporation Bank, Deutsche Bank, Development Credit Bank, Federal Bank, HDFC Bank, ICICI Bank, IDBI Bank, Indian Overseas Bank, IndusInd Bank, ING Vysya Bank, ITZ Card, Jammu and Kashmir Bank, Karnataka Bank, Karur Vyasya Bank, Kotak Bank, Lakshmi Vilas Bank, Oriental Bank of Commerce, Punjab National Bank, Ratnakar Bank, Royal Bank of Scotland, South Indian Bank, Standard Chartered Bank, State Bank of Bikaner and Jaipur, State Bank of Hyderabad, State Bank of India, State Bank of Indore, State Bank of Mysore, State Bank of Patiala, State Bank of Saurashtra, State Bank of Travancore, Syndicate Bank, Tamilnad Mercantile Bank, Union Bank of India, United Bank of India, Vijaya Bank, Yes Bank</p>
                </section>
                <section id="vert_p-opt_4">
                <h2>
                <a href="#vert_p-opt_4"> <span>&#8226;</span>How can I use Net/Internet Banking?</a>
                <h2>
                <p> You can follow three simple steps:</p>
                <p> First, select your bank and you will be redirected to your bank's secure Internet banking website.</p>
                <p> Enter your banking user name and password.</p>
                <p> Confirm your payment and you will be redirected back to Paytm.com.</p>
                </section>
                <section id="vert_p-opt_5">
                <h2>
                <a href="#vert_p-opt_5"> <span>&#8226;</span> Why do I see &quot;PayU&quot; in my bank account statement?</a>
                <h2>
                <p> There's no need to worry at all. We have partnered with above vendors who provide online payment services to ecommerce portals so that we can offer you the Internet banking payment option. They debit My Account on our behalf when you make a payment at Paytm.com</p>
                </section>
                <section id="vert_p-opt_6">
                <h2>
                <a href="#vert_p-opt_6"> <span>&#8226;</span> My bank is not in your net banking list. How do I pay for my recharge?</a>
                <h2>
                <p>We have many other options as well on SocietyCoin.com to ease your payments: </p>
                <p>Credit cards (MasterCard/Visa cards)</p>
                <p>Debit cards (MasterCard/Visa cards)</p>
                <p> ATM-cum-Debit cards (Maestro cards)</p>
                <p> American Express cards</p>
                <p>We are in the process of adding new banks to our net banking list and we will keep your information safe</p>
                </section>
                <section id="vert_p-opt_7">
                  <h2><a href="#vert_p-opt_7"><span>&#8226;</span> Bill Payment</a></h2>
                  <p>Sometimes due to technical reasons, we may not receive a response from the bank for your payment request. As a result, we do not get to know the status of your payment transaction and hence assume it to be a failed payment. In such cases, the Bill payments are not processed by us. Many times, the banks give us a response that your payment transaction has failed, even if the payment is successfully done. For these cases, we do not initiate bill payments and assume it to be a failed payment.
                    b.     Refunds </p>
                </section>
              </div>
            </div>
            <!-----------------------------Payment option-------------------->
            <div id="rf1-right" class="view-content">
              <h4>Refunds</h4>
              <div class="acco_rdion vertical">
                <p class="bold">Refunds</p>
                <section id="vert_rf1">
                  <h2><a href="#vert_rf1"> <span>&#8226;</span> My payment failed. Can I get my money back?</a></h2>
                  <p>Of course you can. Your money is yours unless you get what you asked for. When your recharge fails, the money automatically gets added back your Bank account. This is only if the payment has been successfully processed with your bank.</p>
                </section>
                <section id="vert_rf2">
                  <h2><a href="#vert_rf2"> <span>&#8226;</span> I entered a wrong address. How can I get my money back?</a></h2>
                  <p>Please contact us under 24 hours to get your money back at care@societycoin.com </p>
                </section>
              </div>
            </div>
            <!-----------------------------Payment option-------------------->
          </div>
          <!--my account-->
        <!--</div>-->
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>

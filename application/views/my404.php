<?php $this->load->view('header'); ?>

<script type="text/javascript">

$(document).ready(function() {

$.validator.addMethod('lNamealpha', 
	function (value, element) 
	{
		var name=$('#name').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	

$.validator.addMethod('subjectf', 
	function (value, element) 
	{
		var name=$('#subject').val();
			var ENGLISH = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		//alert(name.length);
		for (var index = name.length - 1; index >= 0; --index) 
		{
        	if (ENGLISH.indexOf(name.substring(index, index + 1)) < 0) 
			{
            return false;
        	}
    	}
    	return true;
	},'Please enter only alphabet');
	



$("#contact").validate({

    rules: {
			name:{
				required:true,
				maxlength:25,
				lNamealpha:true
				
				},
			
			email:{
			required:true,
			email:true
			
			},
			subject:{
			required:true,
			maxlength:25,			
			subjectf:true
			},
			message:{
			required:true,		
			maxlength:25
			}
	   }
    
});
});



</script>

<!--mid-portion-->

<div class="row-fluid mid-outer">

  <div class=" container mid-inner">

    <!--left-->

    <?php $this->load->view('left'); ?>

    <!--left//-->

    <!-- mob navigation-->

    <?php $this->load->view('mob_nav'); ?>

    <!--right-->

    <div class="right">

    <?php $this->load->view('menu'); ?>

	<div class="texthome">
        <h1 class="society-text-home">404 Page not Found </h1>
        <div class="descriptionhome">
 <p>It seems we can&rsquo;t find what you&rsquo;re looking for</p>

<p>&nbsp;</p>
        </div>
       
      </div>

      <div class="clearfix"></div>

    </div>

  </div>

</div>

    <?php $this->load->view('footer'); ?>
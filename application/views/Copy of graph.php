<?php   $ccdata=NULL;

foreach($graph as $item)
   {
$date=$item['sdate'];
//$date=date($date);


$date=date('M',$date);





     $ccdata .='[\''.$date.'\','.$item['totalamount'].'],';

	   
	   }


	   ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <?php if(@$_REQUEST['billid']!='')
	   {?>
       
    <script type="text/javascript">
	function	getsocietyid()
	  {
		  var x=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?soid="+x;
		  
		  }
	
     function getaddressid()
	  {
		  var x=document.getElementById('propertyid').value;
 		  var x2=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?addid="+x+"&soid="+x2;
		  
		  }
		  function getbillid()
		   {
	 
	      var x=document.getElementById('billid').value;
  		  var x1=document.getElementById('propertyid').value;
		  var x2=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?addid="+x1+"&billid="+x+"&soid="+x2;
			   }
			  
		  
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '<?php  echo @$graph[0]['bill_name']; ?>'],<?php echo $ccdata; ?>
        ]);

        var options = {
          title: '<?php // echo @$graph[0]['bill_name']; ?>',
		  hAxis: {title: '', titleTextStyle: {color: 'red'},
 colors: ['red'],
      is3D:true


		  }
        };


       var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
//        chart.draw(data, options); 

chart.draw(data, {isStacked: true, vAxis: {title: 'Year', titleTextStyle: {color: 'blue'}},                              series: [{color: 'red', visibleInLegend: true}, {color: 'red', visibleInLegend: false}]                             });

		
	
      }
    </script>
     
     <?php } else
	   {?>
    
    <script type="text/javascript">
	
	
	function	getsocietyid()
	  {
		  var x=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?soid="+x;
		  
		  }
	
     function getaddressid()
	  {
		  var x=document.getElementById('propertyid').value;
 		  var x2=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?addid="+x+"&soid="+x2;
		  
		  }
		  function getbillid()
		   {
	 
	      var x=document.getElementById('billid').value;
  		  var x1=document.getElementById('propertyid').value;
		  var x2=document.getElementById('societyid').value;
		  
		  window.location.href="<?php echo base_url();?>user/graph?addid="+x1+"&billid="+x+"&soid="+x2;
			   }
			   
			  
		  
		  
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '<?php 	 echo "All Bills"; ?>'],<?php echo $ccdata; ?>
        ]);

      /*  var options = {
          title: 'Society Coin All Bills Graphs',hAxis: {title: '', titleTextStyle: {color: 'red'}}
        }; */
		
		var options = {
          title: '',
          hAxis: {title: '',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };


        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        
chart.draw(data, {isStacked: true, vAxis: {title: 'Year', titleTextStyle: {color: 'blue'}},                              series: [{color: 'red', visibleInLegend: true}, {color: 'red', visibleInLegend: false}]                             });

		
		
      }
    </script>
    
    <?php }?>
    
    
    <style type="text/css">
	
.gselect {
    height: 28px;
    margin: 5px 5px 5px 0;
    padding-top: 4px;
    width: 160px;
}
	</style>
  </head>
  <body>  
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo frontThemeUrl; ?>/js/html2canvas.js"></script>
    <!--<script type="text/javascript">
        $(document).ready(function(){
            $('#screenshot').on('click', function(e){
                e.preventDefault();
                html2canvas($('html'), {
                    onrendered: function(canvas){
                        var imgString = canvas.toDataURL();
                        window.open(imgString);
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                file: imgString
                            },
                            success: function(response){
                               // alert(response);
                            },
                            error: function(response){
                                //alert('Server response error.');
                            }
                        });
                    }
                });
            }); 

        });
    </script>-->
    
    <script type="text/javascript" src="http://canvg.googlecode.com/svn/trunk/rgbcolor.js"></script> 
<script type="text/javascript" src="https://canvg.googlecode.com/svn-history/r157/trunk/canvg.js"></script>
<script>
  function getImgData(chartContainer) {
    var chartArea = chartContainer.getElementsByTagName('svg')[0].parentNode;
    var svg = chartArea.innerHTML;
    var doc = chartContainer.ownerDocument;
    var canvas = doc.createElement('canvas');
    canvas.setAttribute('width', chartArea.offsetWidth);
    canvas.setAttribute('height', chartArea.offsetHeight);

    canvas.setAttribute(
        'style',
        'position: absolute; ' +
        'top: ' + (-chartArea.offsetHeight * 2) + 'px;' +
        'left: ' + (-chartArea.offsetWidth * 2) + 'px;');
    doc.body.appendChild(canvas);
    canvg(canvas, svg);
    var imgData = canvas.toDataURL("image/png");
    canvas.parentNode.removeChild(canvas);
    return imgData;
  }

  function saveAsImg(chartContainer) {
    var imgData = getImgData(chartContainer);

    // Replacing the mime-type will force the browser to trigger a download
    // rather than displaying the image in the browser window.
    window.location = imgData.replace("image/png", "image/octet-stream");
  }

  function toImg(chartContainer, imgContainer) { 
    var doc = chartContainer.ownerDocument;
    var img = doc.createElement('img');
    img.src = getImgData(chartContainer);

    while (imgContainer.firstChild) {
      imgContainer.removeChild(imgContainer.firstChild);
    }
    imgContainer.appendChild(img);
	
	
	    html2canvas($('#imageget'), {
                    onrendered: function(canvas){
                        var imgString = canvas.toDataURL();
                        window.open(imgString);
                        $.ajax({
                            url: '',
                            type: 'POST',
                            data: {
                                file: imgString
                            },
                            success: function(response){
                               // alert(response);
                            },
                            error: function(response){
                                //alert('Server response error.');
                            }
                        });
                    }
                });
  }
</script>

<div id="imageget" >
      <button onclick="toImg(document.getElementById('chart_div'), document.getElementById('chart_div'));">PDF</button>

    <select class="gselect" onChange="getsocietyid()" id="societyid" name="societyid">
  <option  value="">All Society</option>
  <?php foreach($society as $spro)
    {
		?>
        
        <option <?php if(@$_REQUEST['soid']==$spro['id']){ echo 'selected="selected"'; }?> value="<?php echo $spro['id']; ?>"><?php echo $spro['society_title']; ?></option>
        <?php
		
		}?>
  
  </select>

  <select class="gselect" onChange="getaddressid()" id="propertyid" name="propertyid">
  <option  value="">All Property</option>
  <?php foreach($data as $pro)
    {
		?>
        
        <option <?php if(@$_REQUEST['addid']==$pro['id']){ echo 'selected="selected"'; }?> value="<?php echo $pro['id']; ?>"><?php echo $pro['address']; ?></option>
        <?php
		
		}?>
  
  </select>
  
  
    <select class="gselect" onChange="getbillid()" id="billid" name="billid">
  <option value="">Total Bills</option>
  <?php foreach($billdata as $bill)
    {
		?>
        
        <option <?php if(@$_REQUEST['billid']==$bill['id']){ echo 'selected="selected"'; }?> value="<?php echo $bill['id']; ?>"><?php echo $bill['bill_name']; ?></option>
        <?php
		
		}?>
  
  </select>
  <a href="<?php echo base_url();?>user/graph?addid=<?php echo @$_REQUEST['addid']; ?>&billid=<?php echo @$_REQUEST['billid']; ?>&soid=<?php echo @$_REQUEST['soid']; ?>&df=DF&m=3M" >3M</a>
  
   <a href="<?php echo base_url();?>user/graph?addid=<?php echo @$_REQUEST['addid']; ?>&billid=<?php echo @$_REQUEST['billid']; ?>&soid=<?php echo @$_REQUEST['soid']; ?>&df=DF&m=6M" >6M</a>
   
    <a href="<?php echo base_url();?>user/graph?addid=<?php echo @$_REQUEST['addid']; ?>&billid=<?php echo @$_REQUEST['billid']; ?>&soid=<?php echo @$_REQUEST['soid']; ?>&df=DF&m=12M" >1 Year</a>
    
     <a href="<?php echo base_url();?>user/graph?addid=<?php echo @$_REQUEST['addid']; ?>&billid=<?php echo @$_REQUEST['billid']; ?>&soid=<?php echo @$_REQUEST['soid']; ?>&pdf=pdf" >PDF</a>
    
   
    
  
  <?php if(count($graph)==0)
      {
		  echo ' <div id="chart_div1" style="width: 680px; height: 200px;"><h1>Bills are not available on this Property !!</h1></div>';
		  
		  }else
		    {?>
      
      <div id="chart_div" style="width: 680px; height: 330px;"></div>
        <?php } ?>
        

  </div>
   
  </body>
</html>



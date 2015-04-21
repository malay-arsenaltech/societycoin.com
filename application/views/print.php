	<?php



$filename=$this->session->userdata('userid').'_12.png';

echo	$content='<div style="background:url('.frontThemeUrl.'images/watermark.jpg); height:1000px;" ><div style="text-align: center;"><img src="'.frontThemeUrl.'images/society-coin-logo-white.png" /></div><div  id="watermark"><h1 style="text-align: right; margin-right: 13px;">Bills Report</h1><br/><img style=" width:696; margin-lift:10px;" src="'.dirname(__FILE__).'/pdf/'.$filename.'"/></div></div>'; 

//exit();

	ob_end_clean();

    require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');

    $html2pdf = new HTML2PDF('P','A4','fr');

	

//echo '<pre>';	print_r($html2pdf); exit();

  $html2pdf->WriteHTML($content);

  $html2pdf->Output('graph.pdf');





?>









   
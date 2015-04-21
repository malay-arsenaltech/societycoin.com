<?php 	
	
  /*  require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($data);
   $html2pdf->Output('exemple.pdf');
*/
   ?>
   
   <?php

if(@$_POST['file'] != "") {
    header('Content-Type: application/json');
    $file = base64_decode(str_replace('data:image/png;base64,','',$_POST['file']));
    $im = imageCreateFromString($file);
    if($im){
		
        $save = imagepng($im, dirname(__FILE__).'/pdf/'.$this->session->userdata('userid').'_12.png');
        echo json_encode(array('file' => true));
    }
    else {
        echo json_encode(array('error' => 'Could not parse image string.'));
    }
    exit();
}

?>
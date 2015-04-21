<?php 



//echo '<pre>'; print_r($graph); exit();



if(count($graph)>0)

 {

    $headers = array('countryid','stateid','cityid','areaid','societyid','SocietyTitle','address','status');

    $fp = fopen('php://output', 'w');

    if ($fp && $graph)

    {

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="properties_'.time().'.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            fputcsv($fp, $headers);
            foreach($graph as $row) 

            {

              fputcsv($fp, array($row['countryid'],$row['stateid'],$row['cityid'],$row['areaid'],$row['id'],$row['society_title'],'',1));

            }



            die;

     }

 }else

   {

	   echo 'Bills Not available. <a href="'.base_url().'admin/allsociety">Back</a>';

	   

	   }



?>


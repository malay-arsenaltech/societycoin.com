<?php 



//echo '<pre>'; print_r($graph); exit();



if(count($graph)>0)

 {

    $headers = array('SocietyName','society_id','PropertyAddress','property_id','sdate','edate','billname','bill_id','amount','totalamount','addbyid','status');


 


   

    $fp = fopen('php://output', 'w');

    if ($fp && $graph)

    {

            header('Content-Type: text/csv');

            header('Content-Disposition: attachment; filename="bill_'.time().'.csv"');

            header('Pragma: no-cache');

            header('Expires: 0');

            fputcsv($fp, $headers);



            foreach($graph as $row) 

            {

                 fputcsv($fp, array($row['SocietyName'],$row['society_id'],$row['PropertyAddress'],$row['property_id'],'','',$row['billname'],$row['bill_id'],'','',$this->session->userdata('userid'),1));

            }



            die;

     }

 }else

   {

	   echo 'Bills Not available. <a href="'.base_url().'admin/allsociety">Back</a>';

	   

	   }



?>


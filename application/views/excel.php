<?php 

//echo '<pre>'; print_r($graph); exit();

  ?>



<?php 

if(@$_REQUEST['excel']==1)
 {
    $headers = array('Date','Address','Bill Name','Amount');

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
//				print_r($row); exit();
                 fputcsv($fp, array(date("Y/m/d",$row['sdate']),$row['uaddress'],$row['bill_name'],$row['totalamount']));
            }

            die;
     }
	 }

?>
<a href="<?php echo $_SERVER['PHP_SELF'];?>?excel=1" >Excel</a>
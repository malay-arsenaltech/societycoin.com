<!DOCTYPE html>
<html>
    <head>
        <title>SocietyCoin.com</title>
        <style>

            @media print {

                table, th, td {
                    border: 1px solid black;
                }

                body{  background: #fff;
                       font-family:Arial, Helvetica, sans-serif;
                       font-size: 12px;
                       line-height: 1.4;
                       margin: 0 auto;
                       padding: 0;
                       text-transform: capitalize;
                }


                .reference {color: #333 !important; margin-left:20px;   font-size: 12px; }
                table.reference, table.tecspec {border-collapse:collapse}
                th{ background-color: #575757 !important;    border: 1px solid #373737;    color: #ffffff;    padding: 3px;    text-align: center;	height:33px;   }

                table.reference td  { border: 1px solid #d4d4d4;    padding: 7px 5px; }
                table.reference tr:nth-child(2n+1){background-color:#e9eef2}

                table.reference th span {margin:0 !important; padding:0 !important;}

            }

            @media screen {
                table, th, td {
                    border: 1px solid black;
                }

                body{  background: #fff;
                       font-family:Arial, Helvetica, sans-serif;
                       font-size: 12px;
                       line-height: 1.4;
                       margin: 0 auto;
                       padding: 0;
                       text-transform: capitalize;
                }


                .reference {color: #333 !important; margin-left:20px;   font-size: 12px; }
                table.reference, table.tecspec {border-collapse:collapse}
                th{ background-color: #575757 !important;    border: 1px solid #373737;    color: #ffffff;    padding: 3px;    text-align: center;	height:33px;   }

                table.reference td  { border: 1px solid #d4d4d4;    padding: 7px 5px; }
                table.reference tr:nth-child(2n+1){background-color:#e9eef2}

                table.reference th span {margin:0 !important; padding:0 !important;}


            }
        </style>
        <script>
            // Popup window code
            function newPopup(url) {
                popupWindow = window.open(
                        url, 'popUpWindow', 'height=700,width=600,left=100,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
            }
        </script>
    </head>
    <body  onLoad="window.print();">
        <div id="logo" style="margin-left:25px;"><img src="<?php echo base_url(); ?>front/images/society-coin-logo-white.png" alt="society coin logo"></div>

        <table border="1" class="reference">

            <tr>
                <th>Society Name</th><th>Name</th>    <th>Email Address</th>	 <th>Flat</th>	  <th>Total</th> <th>Generated On</th>    <th>Due Date</th>
            </tr>

            <?php
            if (count($records) > 0) {

                foreach ($records AS $r) {
                    ?>
                    <tr> 
                        <td><?php echo (isset($r->society_title)) ? $r->society_title : ""; ?></td>
                        <td><?php echo (isset($r->fname)) ? $r->fname ." ". $r->lname : ""; ?></td>
                        <td><?php echo (isset($r->email)) ? $r->email : ""; ?></td>
                        <td><?php echo (isset($r->flat)) ? $r->flat : ""; ?></td>
                        <td><?php echo (isset($r->total)) ? "INR ".$r->total : ""; ?></td>
                        <td><?php echo (isset($r->sdate)) ? DateTime::createFromFormat('d/m/Y', $r->sdate)->format('l, jS \of F, Y') : ""; ?></td>
                        <td><?php echo (isset($r->edate)) ? DateTime::createFromFormat('d/m/Y', $r->edate)->format('l, jS \of F, Y')  : ""; ?></td>
                    </tr>
                <?php }
            }
            ?>
        </table>
    </body>
</html>
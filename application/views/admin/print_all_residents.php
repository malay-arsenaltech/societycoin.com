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

        <table border="1" class="reference" width="95%">

            <tr>
                <th>Name</th>    <th>Email Address</th>	 <th>Address</th>	  <th>City</th> <th>State</th>  
            </tr>

            <?php
            if (count($records) > 0) {

                foreach ($records AS $r) {
                    ?>
                    <tr> 
                        <td><?php echo (isset($r->first_name)) ? $r->first_name ." ". $r->last_name : ""; ?></td>
                        <td><?php echo (isset($r->email_address)) ? $r->email_address : ""; ?></td>
                        <td><?php echo (isset($r->flat_address)) ? $r->flat_address : ""; ?></td>
                        <td><?php echo (isset($r->city)) ? $r->city : ""; ?></td>
                        <td><?php echo (isset($r->state)) ? $r->state : ""; ?></td>
                    </tr>
                <?php }
            }
            ?>
        </table>
    </body>
</html>
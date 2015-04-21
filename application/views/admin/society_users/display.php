<table  align="center" width="100%" cellpadding="2" cellspacing="0" class="TableBox" style="background:#fafafa;"> 

  <tr class="wt_color">
    <td  width="20%"><img src="<?php echo $this->config->item("base_url");?>images/bulet.jpg" alt="img" /><strong>User Details: </strong></td>
    <td >&nbsp;</td>
  </tr> 

  
  <tr style="background-color:#F3F3F3;">
    <td><b>Benutzer ID &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['id']; ?>
      </td>
  </tr>
    <tr style="background-color:#F3F3F3;">
    <td><b>Kunden-Nr. &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['cust_id']; ?>
      </td>
  </tr>
  
  <tr style="background-color:#F3F3F3;">
    <td><b>Typ &nbsp;</b></td>
    <td>&nbsp;<?php  if($data['user_type']==2) echo "Seller"; else echo "Buyer(Garage)"; ?>
      </td>
  </tr>
  <?php  if($data['user_type']==3) { ?>
  <tr style="background-color:#F3F3F3;"><td><b>Händlerart &nbsp;</b></td>
 <td>&nbsp;<?php  echo $data['handlerart'] ; ?> </td> </tr>
 <?php } ?>
 
  <?php if($data['user_type']==3){?>
  <tr style="background-color:#F3F3F3;">
    <td><b>Firma &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['company1']; ?>
      </td>
  </tr>
    <tr style="background-color:#F3F3F3;">
    <td><b>Firma Zusatz &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['company2']; ?>
      </td>
  </tr>
  <?php }?>
 <tr style="background-color:#F3F3F3;">
    <td><b>Strasse &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['address'] .' ' . $data['number'] ; ?>
      </td>
  </tr>
   <tr style="background-color:#F3F3F3;">
    <td><b>Ort &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['city_id'].' '. $data['zip_code']; ?>
      </td>
  </tr>
    <tr style="background-color:#F3F3F3;">
    <td><b>Kanton &nbsp;</b></td>
    <td><?php echo ($data['kanton']!='') ? "Kanton ".$data['kanton'] : ""; ?>    </td>
  </tr>
 <tr style="background-color:#F3F3F3;"><td><b>Verantwortlich &nbsp;</b></td>
 <td >&nbsp;<?php  if($data['title']==1) echo "Herr"; else echo "Frau"; ?>&nbsp;<?php  echo $data['first_name']; ?>&nbsp;<?php  echo $data['last_name']; ?>
 </td> 
  </tr>
  
  <tr style="background-color:#F3F3F3;">
    <td><b>Geburtsdatum &nbsp;</b></td>
    <td>&nbsp;<?php  echo ($data['date_of_birth'] !='0000-00-00') ? date('d.m.Y',strtotime($data['date_of_birth'])) : ""; ?>
      </td>
  </tr>
  
  
  <tr style="background-color:#F3F3F3;">
    <td><b>Telefon &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['phone_no']; ?>
      </td>
  </tr>  
  <tr style="background-color:#F3F3F3;">
    <td><b>E-Mail &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['email']; ?>     </td>
  </tr>
  
   <tr style="background-color:#F3F3F3;">
    <td><b>Akquise durch &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['hear_about_atuopreis_text']; ?>
      </td>
  </tr>
  
  <tr style="background-color:#F3F3F3;">
    <td><b>Registrierungsdatum &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['creation_date']; ?>
      </td>
  </tr>
 <tr style="background-color:#F3F3F3;">
    <td><b>IP Adresse &nbsp;</b></td>
    <td>&nbsp;<?php  echo $data['ip']; ?>
      </td>
  </tr>
 
  
  <tr style="background-color:#F3F3F3;">
    <td><b>Status &nbsp;</b></td>
    <td>&nbsp;<?php  if($data['status']==1) echo "Enable"; else echo "Disable"; ?>
      </td>
  </tr>
  
  
 </table>
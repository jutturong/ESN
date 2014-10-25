<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=$title?></title>

<?=$this->load->view('import_ext')?>
<?=$this->load->view('import_jquery')?>
<?=$this->load->view('send_system')?>


</head>

<body>

<?=form_open('appendix/update_appendix_table')?>
<table width="901" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="303" align="right">HN :</td>
    <td width="588">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"  value="<?=$HN?>" />   
    
     <input name="id_appendix1" type="hidden" id="id_appendix1" value="<?=$id_appendix1?>" size="5" maxlength="5"  readonly="readonly"/> 
    <input name="appendix" type="hidden" id="appendix" value="3" />
    
    </td>
  </tr>

  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" value="<?=$person_id?>"  />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="588">
    <input name="ep_no" type="text" id="ep_no" size="5" maxlength="5" readonly="readonly" value="<?=$ep_no?>"  />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="588">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25" value="<?=$name?>"   />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  value="<?=$surname?>"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="588">
      
      <input name="sex" type="radio"  value="2"  <? if( $sex== 2 ) { ?>  checked="checked"   <? }  ?>  />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" <? if( $sex== 1 ) { ?>  checked="checked"   <? }  ?>  />
      (M) ชาย      </td>
  </tr>

        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="588" height="2">
    <input name="birthdate" type="text"  value="<?=$birthdate?>" id="birthdate" size="10" maxlength="15"  >     </td>
  </tr>

        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="588" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" value="<?=$age?>"  />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">วัน/เดือน/ปี ที่เข้านอนรักษา :</td>
    <td width="588" height="2">
      <input name="date_admit" type="text" id="date_admit" size="10" maxlength="12" readonly="readonly" value="<?=$date_admit?>"  />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">วัน/เดือน/ปี ที่จำหน่าย :</td>
    <td width="588" height="2">
      <input name="date_pay" type="text" id="date_pay" size="10" maxlength="12" readonly="readonly" value="<?=$date_pay?>"  />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา :</td>
    <td width="588" height="2">
              <select name="id_admit"  id="id_admit">
              <?
			       $ad=$this->db->get('admit_epilepsy');
				   foreach($ad->result() as $row)
				   {
				     $id_admit_tb=$row->id_admit;
					 $admit_detail_tb=$row->admit_detail;
								 if( $id_admit == $id_admit_tb )
								   {
						  ?>
							<option value="<?=$id_admit_tb?>" selected="selected"><?=$admit_detail?></option>
						  <?
						           }
								   else
								   {
						  ?>
							<option value="<?=$id_admit_tb?>"><?=$admit_detail?></option>
						  <?
								   
								   }
			        }
					
			  ?>  
                
              </select>
              
             <textarea name="detail_admit" cols="40" rows="1"  id="detail_admit"><?=$detail_admit?>
             </textarea>
 
              
       </td>
  </tr>
  
 
 
 
<tr>
      <td align="right" valign="top">สรุปการรักษาที่ได้รับ :</td>
    <td width="588" height="2">
     <textarea name="preservation" cols="45" rows="1"  id="preservation"><?=$preservation?>
             </textarea>
       </td>
  </tr>


          <tr>
      <td align="right" valign="top">สถานะการจำหน่าย :</td>
    <td width="588" height="2">
 <select name="id_pay" id="id_pay" >
      <?
	       $pa=$this->db->get('pay_status');
		   foreach($pa->result() as $row)
		   {
		       $id_pay_tb=$row->id_pay;
			   $detail_tb=$row->detail;
			   if( $id_pay_tb == $id_pay)
			    {
					  ?>
							 <option value="<?=$id_pay_tb?>" selected="selected"><?=$detail?></option>
					  <?       
                }
				else
				{
				   ?>
                   		    <option value="<?=$id_pay_tb?>"><?=$detail?></option>
                   <?
				}
		   }		
	  ?>	     
         </select>
       </td>
  </tr>


          <tr>
      <td align="right" valign="top">รายละเอียดเพิ่มเติม :</td>
    <td width="588" height="2">
     <textarea name="detail_pay" cols="45" rows="1"  id="detail_pay"><?=$detail_pay?>
            </textarea>
       </td>
  </tr>

          <tr>
      <td align="right" valign="top">ประเภทจำหน่าย :</td>
    <td width="588" height="2">
<select name="id_type_pay"  id="id_type_pay">
        <?
		      $ty=$this->db->get('type_pay');
			  foreach($ty->result() as $row)
			  {
			    $id_type_pay_tb=$row->id_type_pay;
				$type_pay_tb=$row->type_pay;
				     if($id_type_pay_tb==$id_type_pay)
					 {
						?>
								<option value="<?=$id_type_pay_tb?>" selected="selected"><?=$type_pay_tb?></option>
						 <?
					 }
					 else
					 {
						 ?>
								<option value="<?=$id_type_pay_tb?>"><?=$type_pay_tb?></option>
				 <?
	 
					 }	 
              }
	     ?>
            </select>
            
            
                        <textarea name="other_id_type_pay"  id="other_id_type_pay"><?=$other_id_type_pay?>
            </textarea>

       </td>
  </tr>


                     <tr>
                     <td colspan="2" align="center">
                              <button>Update</button>
                     </td>
                     </tr>



</table>
<?=form_close()?>

</body>
</html>

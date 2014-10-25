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
<table width="811" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="303" align="right">HN :</td>
    <td width="498">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"  value="<?=$HN?>" />   
    
     <input name="id_appendix1" type="hidden" id="id_appendix1" value="<?=$id_appendix1?>" size="5" maxlength="5"  readonly="readonly"/> 
    <input name="appendix" type="hidden" id="appendix" value="2" />
    
    </td>
  </tr>

  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" value="<?=$person_id?>"  />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="498">
    <input name="ep_no" type="text" id="ep_no" size="5" maxlength="5" readonly="readonly" value="<?=$ep_no?>"  />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="498">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25" value="<?=$name?>"   />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  value="<?=$surname?>"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="498">
      
      <input name="sex" type="radio"  value="2"  <? if( $sex== 2 ) { ?>  checked="checked"   <? }  ?>  />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" <? if( $sex== 1 ) { ?>  checked="checked"   <? }  ?>  />
      (M) ชาย      </td>
  </tr>

        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="498" height="2">
    <input name="birthdate" type="text"  value="<?=$birthdate?>" id="birthdate" size="10" maxlength="15"  >     </td>
  </tr>

        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="498" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" value="<?=$age?>"  />       </td>
  </tr>


        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี ที่ติดตามผู้ป่วย :</td>
    <td width="498" height="2">
    <input name="date_follow_patient" type="text"  value="<?=$date_follow_patient?>" id="date_follow_patient" size="10" maxlength="15"  >     </td>
  </tr>


        <tr>
      <td align="right" valign="top" >จำนวนครั้งของอาการชักในช่วง 1 เดือนที่ผ่านมา :</td>
    <td width="498" height="2">
    <input name="count_ep" type="text"  value="<?=$count_ep?>" id="count_ep" size="10" maxlength="15" >     </td>
  </tr>

        <tr>
      <td align="right" valign="top" >ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน :</td>
    <td width="498" height="2">
    <input name="compare_lasttime" type="text"  value="<?=$compare_lasttime?>" id="compare_lasttime" size="10" maxlength="15"  >     </td>
  </tr>

        <tr>
      <td align="right" valign="top" >ระดับความรุนแรงของอาการชักเมื่อเีทียบกับครั้งก่อน :</td>
    <td width="498" height="2">
    <input name="ep_lasttime" type="text"  value="<?=$ep_lasttime?>" id="ep_lasttime" size="10" maxlength="15"  >     </td>
  </tr>
  
         <tr>
      <td align="right" valign="top" >น้ำหนัก (กิโลกรัม) :</td>
    <td width="498" height="2">
    <input name="weight" type="text"  value="<?=$weight?>" id="weight" size="10" maxlength="15"  >     </td>
  </tr>
 
          <tr>
      <td align="right" valign="top" >ระดับยาในเลือด :</td>
    <td width="498" height="2">
    <input name="medicine_level" type="text"  value="<?=$medicine_level?>" id="medicine_level" size="10" maxlength="15"  >     </td>
  </tr>

          <tr>
      <td align="right" valign="top" >ยาที่ได้รับ :</td>
    <td width="498" height="2">
    <input name="medicine" type="text"  value="<?=$medicine?>" id="medicine" size="10" maxlength="15"  >     </td>
  </tr>

          <tr>
      <td align="right" valign="top" >ปัญหาการแพ้ยาที่เกิดขึ้น :</td>
    <td width="498" height="2">
    <input name="problem" type="text"  value="<?=$problem?>" id="problem" size="10" maxlength="15"  >     </td>
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

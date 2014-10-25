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


<table width="811" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="303" align="right">HN :</td>
    <td width="498">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"  value="<?=$HN?>" readonly="readonly"   disabled="disabled"/>   </td>
  </tr>

  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" value="<?=$person_id?>" disabled="disabled" />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="498">
    <input name="ep_no" type="text" id="ep_no" size="5" maxlength="5" readonly="readonly" value="<?=$ep_no?>" disabled="disabled" />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="498">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25" value="<?=$name?>" disabled="disabled"  />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  value="<?=$surname?>" disabled="disabled" /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="498">
      
      <input name="sex" type="radio"  value="2"  <? if( $sex== 2 ) { ?>  checked="checked"   <? }  ?> disabled="disabled" />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" <? if( $sex== 1 ) { ?>  checked="checked"   <? }  ?> disabled="disabled" />
      (M) ชาย      </td>
  </tr>

        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="498" height="2">
    <input name="birthdate" type="text"  value="<?=$birthdate?>" id="birthdate" size="10" maxlength="15" disabled="disabled" >     </td>
  </tr>

        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="498" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" value="<?=$age?>" disabled="disabled" />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">วัน/เดือน/ปี ที่เข้านอนรักษา :</td>
    <td width="498" height="2">
      <input name="age" type="text" id="age" size="10" maxlength="12" readonly="readonly" value="<?=$date_admit?>" disabled="disabled" />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">วัน/เดือน/ปี ที่จำหน่าย :</td>
    <td width="498" height="2">
      <input name="age" type="text" id="age" size="10" maxlength="12" readonly="readonly" value="<?=$date_pay?>" disabled="disabled" />       </td>
  </tr>

        <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา :</td>
    <td width="498" height="2">
              <select disabled="disabled">
                  <option><?=$admit_detail?></option>
              </select>
       </td>
  </tr>
  
 
         <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา :</td>
    <td width="498" height="2">
             <textarea cols="45" rows="1" disabled="disabled">
                <?=$detail_admit?>
             </textarea>
       </td>
  </tr>
 
 
          <tr>
      <td align="right" valign="top">สรุปการรักษาที่ได้รับ :</td>
    <td width="498" height="2">
             <textarea cols="45" rows="1" disabled="disabled">
                <?=$preservation?>
             </textarea>
       </td>
  </tr>


          <tr>
      <td align="right" valign="top">สถานะการจำหน่าย :</td>
    <td width="498" height="2">
         <select disabled="disabled">
             <option><?=$detail?></option>
         </select>
       </td>
  </tr>


          <tr>
      <td align="right" valign="top">รายละเอียดเพิ่มเติม :</td>
    <td width="498" height="2">
            <textarea cols="45" rows="1" disabled="disabled">
             <?=$detail_pay?>
            </textarea>
       </td>
  </tr>

          <tr>
      <td align="right" valign="top">ประเภทจำหน่าย :</td>
    <td width="498" height="2">
            <select disabled="disabled">
               <option><?=$type_pay?></option>
            </select>
            
            
                        <textarea disabled="disabled">
              <?=$other_id_type_pay?>
            </textarea>

       </td>
  </tr>




</table>

</body>
</html>

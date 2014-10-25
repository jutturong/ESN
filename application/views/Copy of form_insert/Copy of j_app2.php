<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
</head>

<body>


<!--         ##################### appendix2                    1-->
          <?=form_open('appendix.php/insert_appendix2')?>
         <table width="898" class="bordertable1">
         
<tr >
    <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>
       
         <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />         
           <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" readonly="readonly" />
           
           </td>
         </tr>
         
         <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="person_id_ap2" type="text" id="person_id_ap2" size="15" maxlength="13" />           </td>
         </tr>
         
         
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="ep_no_ap2" type="text" id="ep_no_ap2" value="<?=$num_?>" />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="name_ap2" type="text" id="name_ap2" value="" />
           -
           <input name="surname_ap2" type="text" id="surname_ap2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="prov_id_ap2">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="amphur_id_ap2">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="district_id_ap2">
             </select>         </td>
         </tr>


                                             <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="788">
      <label>
      <input name="zipcodea_ap2" type="text" id="zipcodea_ap2" value="40000" size="5" maxlength="5" />
      </label>      </td>
     </tr>


                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="address_ap2" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><input name="telephone_ap2" type="text" maxlength="10" size="5" ></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="birthdate_ap2" id="birthdate_ap2" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="age_ap2" id="age_ap2" />
          </td>
         </tr>

        
                                             <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่ติดตามผู้ป่วย :                </td>
         <td>
           <input type="text" name="date_follow_patient" id="date_follow_patient" />
         </td>
         </tr>

         
                                                      <tr>
         <td align="right" valign="top">
         จำนวนของอาการชักในช่วง 1 เดือนที่ผ่านมา (ครั้ง/เดือน) :                </td>
         <td>
           <input type="text" name="count_ep" id="count_ep" />
          </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input type="text" name="compare_lasttime" id="compare_lasttime" />
          </td>
         </tr>



                                                      <tr>
         <td align="right" valign="top">
         ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input type="text" name="ep_lasttime" id="ep_lasttime" />
           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         น้ำหนัก (กิโลกรัม) :                </td>
         <td>
           <input type="text" name="weight" id="weight" />
           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระดับยาในเลือด :                </td>
         <td>
           <input type="text" name="medicine_level" id="medicine_level" />
           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ยาที่ได้รับ :                </td>
         <td>
           <input type="text" name="medicine" id="medicine" />
           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ปัญหาการใช้ยาที่เกิดขึ้น :                </td>
         <td>
           <input type="text" name="problem" id="problem" />
           </td>
         </tr>

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button >Save</button>
                      <button type="reset" >Reset</button>
                      
                      </td>
                     </tr>



</table> 
         <?=form_close('')?>                  
 <!--         ##################### appendix2                    1-->                            



</body>
</html>

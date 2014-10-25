<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script type="text/javascript">
$(function()
{

	   $("#birthdate_ap2").datepicker(
	       {
		     
			 			                      changeMonth: true,
								   changeYear: true,
								   dateFormat:'yy-mm-dd',
								 //  showButtonPanel:true,
								  // appendText:'(yyyy-mm-dd)',
								 // minDate:0,
								   onSelect:function(dateText)
			                                  { 
														 var  o=$(this).val().split("-");
														 var  current=new Date();
														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
														 var  ans= parseInt( current_year ) -  parseInt(o[0])  ;  
													    $('#age_ap2').val(ans);
											   }

		   
		   }
		 );
    
	
	  //========================= คำนวณวัน เดือน ปี เกิด
		      function  calAge(e,y)  //คำนวณอายุ
			{
					// alert('t');
					  var  ex=document.getElementById(e);
					  var  o=ex.value;
					 var  tmp=o.split('-');
					 var  current=new Date();
					 var   current_year=current.getFullYear(); //ปีปัจจุบัน
					   var  ans= parseInt( current_year ) -  parseInt(tmp[0])  ;  
				    return	document.getElementById(y).value=ans;
			}	
			
			//calAge('birthdate_ap2','age_ap2');

}
);


<?
if( @$id_appendix1 > 0  ) //บันทึกข้อมูลจาก appendix 1 แล้ว
{
?>
 $(function()
 {
		   //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id':'<?=$prov_id?>' });
		   //load_select()   //id,tb,id_field,name_field ใช้สำหรับเลือก จังหวัด  ตำบล  อำเภอ
$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_select',{ 'id':'<?=$prov_id?>','tb':'province','id_field':'prov_id','name_field':'prov_name' });//โหลดแบบผ่าน app1
$('#amphur_id_ap2').load('<?=base_url()?>index.php/home/load_select',{ 'id':'<?=$amphur_id?>','tb':'main_amphur','id_field':'amphur_id','name_field':'amphur_name'});  
     	 
$('#district_id_ap2').load('<?=base_url()?>index.php/home/load_select',{ 'id':'<?=$district_id?>','tb':'main_district','id_field':'district_id','name_field':'district_name'}); 
	
	
 }
   );
<?  
 } 
 else //ยังไม่บันทึกข้อมูลจาก appendix 1
 {
   ?>
       $(function()
	      {
		      $("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province');
			 //amphur_id_ap2  //load_amphur
			  $("#amphur_id_ap2").load('<?=base_url()?>index.php/home/load_amphur');
			 //district_id_ap2  //load_district
			  $("#district_id_ap2").load('<?=base_url()?>index.php/home/load_district');
		  }
		 ); 
   <?
 }
?>  
   
</script>

</head>

<body>



<table>
         <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text"   value="<?=@$HN?>" id="HN_ap2" size="10" maxlength="5" />         
           <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" value="<?=@$id_appendix1?>" readonly="readonly" />
           
           </td>
         </tr>
         
         <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="person_id_ap2" value="<?=@$person_id?>"  type="text" id="person_id_ap2" size="15" maxlength="13" />           </td>
         </tr>
         
         
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="ep_no_ap2" type="text" value="<?=@$ep_no?>" id="ep_no_ap2"  />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="name_ap2" type="text" id="name_ap2" value="<?=@$name?>" size="10" maxlength="45" />
           -
           <input name="surname_ap2" type="text" id="surname_ap2" value="<?=@$surname?>" size="15" maxlength="45" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select" value="2" <? if( @$sex == 2 ){ ?>  checked="checked"  <? } ?> />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select" value="1" <? if( @$sex == 1 ){ ?>  checked="checked"  <? } ?> />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
         
         
             <select name="prov_id_ap2" id="prov_id_ap2">
             </select>
             
             
<!--             <div id="prov_id_ap2">
             </div>
-->                      
             </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="amphur_id_ap2" id="amphur_id_ap2">
             </select>       
               </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="district_id_ap2" id="district_id_ap2">
             </select>         </td>
         </tr>


                                             <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="788">
      <label>
      <input name="zipcodea_ap2" type="text" id="zipcodea_ap2" value="<?=@$zipcode?>" size="5" maxlength="5" />
      </label>      </td>
     </tr>


                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="address_ap2" cols="50" rows="2"><?=@$address?></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><input name="telephone_ap2" type="text" maxlength="10" size="10" value="<?=@$telephone?>"></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input name="birthdate_ap2" type="text" id="birthdate_ap2"  value="<?=@$birthdate?>" size="10" maxlength="10"/>
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input name="age_ap2" id="age_ap2" type="text"  value="<?=@$age?>" size="5" maxlength="3"  readonly="readonly"/>
          </td>
         </tr>
</table>



</body>
</html>

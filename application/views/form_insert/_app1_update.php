<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<script type="text/javascript">

   $(function()
   {
       //alert('t');
	   $('#HN_app').click(function()
	   {
	       $(this).val('');
	   }
	   );
   }
   );


 //=========================> ค้นหา HN  
   function lookup_(inputString)
	{ 
	    if( $('#HN_app').val().length == 0 )
		{
		   $('#suggestions_').hide();
		}
		else{
		    $.ajax({
			    type:'POST'
			  // ,url:'<?=base_url()?>index.php/project/autocomplete'
			  // ,url:'<?=base_url()?>index.php/home/autocomplete_HN'
			   
			   ,url:'<?=base_url()?>index.php/home/app_autocomplete_HN'
			   
			   ,data:'HN=' + $('#HN_app').val()
			   ,success:function(data){
			     	$('#suggestions_').show();
					$('#autoSuggestionsList_').html(data); 
			   }
			});
		}
	}
	
	
	function fill_(thisValue,c_id,person_id,ep_no,name,surname,sex,zipcode,address,telephone,birthdate,age) {
		$('#HN_app').val(thisValue);
		$('#id_appendix1_hid').val(c_id);
		$('#person_id_ap2').val(person_id);
		$('#ep_no_ap2').val(ep_no);
		$("#name_ap2").val(name);
		$('#surname_ap2').val(surname);
		// $('#sex_ap2_select').checked()=true;
		
		
		if( sex == 1 )  //1=ชาย
		{
		    $('#sex_ap2_select_1').attr('checked',true);
	    }
		else if(sex == 2 ) //หญิง
		{
		    $('#sex_ap2_select_2').attr('checked',true);
		}		
		
		
		$('#zipcodea_ap2').val(zipcode);
		//$('#address_ap2').val(address);
		
		$('#address_ap2').attr('value',address);
		
		//id_appendix1_hid
		
		//$telephone
		$('#telephone_ap2').val(telephone);
		
		//$birthdate
		$('#birthdate_ap2').val(birthdate);
		
		//$age
		$('#age_ap2').val(age);
		
		setTimeout("$('#suggestions_').hide();", 200);
		//$('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':$("#search_id_appendix1").val() });  
	}



</script>



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
         <td width="525"><input name="HN_app" type="text"    id="HN_app" onblur="fill_();" onkeyup="lookup_(this.value);" value="<?=@$HN?>" size="10" maxlength="5" />
           <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" value="<?=@$id_appendix1?>"  readonly="readonly" />
           
           
           


       <!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_" style="display: none; margin-left:400px;" align="left" >
				         <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_">
&nbsp;                </div>
      </div>
  <!--============================= autocomplete-->           <input name="appendix" type="hidden" id="appendix" value="<?=@$appendix?>" /></td>
         </tr>
         
         <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="person_id_ap2"  type="text" id="person_id_ap2" value="<?=@$person_id?>" size="15" maxlength="13"  readonly="readonly" />           </td>
         </tr>
         
         
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="ep_no_ap2" type="text" id="ep_no_ap2" value="<?=@$ep_no?>"  readonly="readonly" />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="name_ap2" type="text" id="name_ap2" value="<?=@$name?>"  size="10" maxlength="45" readonly="readonly" />
           -
           <input name="surname_ap2" type="text" id="surname_ap2" value="<?=@$surname?>"  size="15" maxlength="45" readonly="readonly" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
          
           <input type="radio" name="sex_ap2" id="sex_ap2_select_1"  <? if( @$sex==2 ) { ?>  checked="checked"   <? } ?>  />
          
           (F) หญิง 
         
           <input type="radio" name="sex_ap2" id="sex_ap2_select_2" <? if( @$sex==1 ) { ?>  checked="checked"   <? } ?>  />
           
           (M) ชาย           </td>
         </tr>

          <!--<tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
         
         
             <select name="prov_id_ap2" id="prov_id_ap2">
             </select>
             
             
           
             </td>
         </tr>-->

          <!--<tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="amphur_id_ap2" id="amphur_id_ap2">
             </select>       
               </td>
         </tr>-->

                   <!--<tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="district_id_ap2" id="district_id_ap2">
             </select>         </td>
         </tr>-->


                                             <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="788">
      <label>
      <input name="zipcodea_ap2" type="text" id="zipcodea_ap2" value="<?=@$zipcode?>"  size="5" maxlength="5" readonly="readonly" />
      </label>      </td>
  </tr>


                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="address_ap2" id="address_ap2" cols="50" rows="2" readonly="readonly"><?=@$address?></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><input name="telephone_ap2" type="text" id="telephone_ap2" value="<?=@$telephone?>" size="10" maxlength="10"  readonly="readonly"></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input name="birthdate_ap2" type="text" id="birthdate_ap2" value="<?=@$birthdate?>"   size="10" maxlength="10" readonly="readonly"/>          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input name="age_ap2" type="text" id="age_ap2" value="<?=@$age?>"   size="5" maxlength="3"  readonly="readonly" />          </td>
         </tr>
</table>



</body>
</html>

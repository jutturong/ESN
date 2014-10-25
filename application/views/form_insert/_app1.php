<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>


<script type="text/javascript">

  
  
    $('#HN_app').click(function()
	{
							    $(this).val('');
								$('#diagnosis').val('');
								$('#ep_no_ap2').val('');
								$('#name_ap2').val('');
								$('#surname_ap2').val('');
								$("#sex_ap2").val('');
								$("#birthdate_ap2").val('');
								$("#age_ap2").val('');
								
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
	
	
/*echo '<li onClick="fill_(\''.$HN.'\',\''.$id_appendix1.'\',\''.$person_id.'\',\''.$ep_no.'\',\''.$name.'\',\''.$surname.'\',\''.$sex.'\',\''.$zipcode.'\',\''.$address.'\',\''.$telephone.'\',\''.$send_year.'\',\''.$cal_age.'\',\''.$d.'\');">'.$full.'</li>'; 
*/
	
	
	
	function fill_(thisValue,c_id,person_id,ep_no,name,surname,sex,zipcode,address,telephone,birthdate,age,diagnosis) {
		$('#HN_app').val(thisValue);
		
		
		$('#id_appendix1_hid').val(c_id);
		
		if( person_id != '' )
		{
		   $('#person_id_ap2').val(person_id);
		}
		
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
		if( age != '' )
		{
		$('#age_ap2').val(age);
		}
		
		//ดึงมาจาก access  ของข้อมูลเดิม
		$('#diagnosis').val(diagnosis);
		
		setTimeout("$('#suggestions_').hide();", 200);
		//$('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':$("#search_id_appendix1").val() });  
	
	    
		//alert('t');
		  if( $('div').find('load_progress_note') )
		  {
		     //alert('t');
			 	  if( $('#id_appendix1_hid').val() != '' ) 
				   {
				   			
							//โหลด  progress note ของ monitoring
							$('#load_progress_note').load('<?=base_url()?>index.php/home/load_progress_note',{ 'HN':$('#HN_app').val() });
							//โหลดค่า  Frequency (time/month) :
							//$('#monitoring_04_value').load('<?=base_url()?>index.php/monitoring/load_last_visit',{ 'HN':$('#HN_app').val() });
							$('#div_ADR').load('<?=base_url()?>index.php/monitoring/load_ADR',{  'HN':$('#HN_app').val() });
				   }

		  }
		
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
	  /*
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
		*/	

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


<script type="text/javascript">
//################  ปรับปรุง script ใหม่ 1/12/55
   /*
     $(function()
	 			    {
									 $("#tab-monitoring-2").click(function()  //**********EEG
																		{
																			   //if(     $('#HN_app').val()   != '' )
																			   //  {
												  $("#EEG_tab").load('<?=base_url()?>index.php/monitoring/EEG',{ 'HN':$('#HN_app').val()  });
																			  
																			    //  }
																		 }
													                         	);
					  }
	   );	 
  */
</script>


</head>

<body>



<table>
         <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_app" type="text" onblur="fill_();" onkeyup="lookup_(this.value);"    id="HN_app" size="10" maxlength="6" />         
           <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid"  readonly="readonly" />


       <!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_" style="display: none; margin-left:400px;" align="left" >
				         <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_">
			             &nbsp;				
                </div>
      </div>
  <!--============================= autocomplete-->

           
           </td>
         </tr>
         
         <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="person_id_ap2"  type="text" id="person_id_ap2" size="15" maxlength="13" />           </td>
         </tr>
         
         
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="ep_no_ap2" type="text" id="ep_no_ap2"  />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="name_ap2" type="text" id="name_ap2"  size="10" maxlength="45" />
           -
           <input name="surname_ap2" type="text" id="surname_ap2"  size="15" maxlength="45" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select_1"  />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="sex_ap2" id="sex_ap2_select_2"  />
           </label>
           (M) ชาย</td>
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
      <input name="zipcodea_ap2" type="text" id="zipcodea_ap2"  size="5" maxlength="5" />
      </label>      </td>
     </tr>


                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="address_ap2" id="address_ap2" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><input name="telephone_ap2" id="telephone_ap2" type="text" maxlength="10" size="10" ></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input name="birthdate_ap2" type="text" id="birthdate_ap2"   size="10" maxlength="10"/>
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input name="age_ap2" id="age_ap2" type="text"   size="5" maxlength="3" readonly="true"  />
          </td>
         </tr>
         
                  <tr>
         <td align="right">Diagnosis :</td>
         <td> <input name="diagnosis" type="text" id="diagnosis" size="50" maxlength="100" /></td>
         </tr>



</table>



</body>
</html>

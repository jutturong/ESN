<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>


<script type="text/javascript">

//---------------> event  appendix1
$(function()
   { 
      
	  
	   //----------->รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน : 	
//	   $("#epilepsy_first_id").click(function()
//	       {  
//		         if($('#epilepsy_first_id').val() == 8 ) 
//				     { 
//					    // alert('t'); 
//						  $('#detail_epilepsy_first').attr('disabled',false);
//						    $('#detail_epilepsy_first').select();
//						 // $('#detail_epilepsy_first').focus();
//						  //alert(''+$("#detail_epilepsy_first").val());
//					 }      
//		   });
		   
	 
	  //-----------------> function  for  select and  textarea
//		function  select_other(id_select,value,text)
//		{
//					 $(id_select).click(function()
//						  { 
//								if( $(id_select).val() == value )
//								{
//									 $(text).attr('disabled',false);
//									 $(text).select();
//								}
//						  }
//					  );	
//		}  
		
			
			
		    select_other('#epilepsy_first_id',8,'#detail_epilepsy_first');
			//รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :	current_epilepsy_id	  other_current_epilepsy
		    select_other('#current_epilepsy_id',8,'#other_current_epilepsy');
		   //  ลักษณะความผิดปกติจาก CT/MRI :  nature_CT_MRI_id  other_Nature_CT_MRI 
		    select_other('#nature_CT_MRI_id',14,'#other_Nature_CT_MRI');
			//ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา
		    select_other('#drug_id',9,'#drug_other');
			//โรคร่วมอื่่นๆ ของผู้ป่วย
			select_other('#disease_drug_id',5,'#disease_drug_other');
			
			//-- radio ประวัติการแพ้ยา  allergic_detail
			//  $("#allergic_id_2").click(function(){ alert('t'); } );
			select_other('#allergic_id_2',2,'#allergic_detail');
			
			
			//ยากันชักที่แพ้ :
			select_other('#drug_epilepsy_id',9,'#drug_epilepsy_detail');
			
			//ลักษณะการแพ้ยากันชัก :
			select_other('#nature_drug_epilepsy_id',6,'#nature_drug_epilepsy_other');
			
			//สิ่งกระตุ้นให้เกิดอาการชัก :
			select_other('#stimulate_epilepsy_id',5,'#stimulate_epilepsy_other');
   });


 //####-------------------appendix 1 function---------- 
   
       		  function   makeUpperCase(e) //HN เพื่อ upper HN
			  {
			      //alert('t');
				  //document.getElementById(e).value.toUpperCase();
				  var   vx=document.getElementById(e);
			      return  vx.value=vx.value.toUpperCase();
			  }  
			  
		        

	   $(document).ready(function()
	   {  
	        //alert('t'); 
			//$('#amphur').hide();
			//$('#div_amphur').hide();
			
				$('#loader').hide();
				$('#show_heading').hide();
				 $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2',{ 'amphur_id': $('#province').val() });
				 $('#district').load('<?=base_url()?>index.php/home/select_district2',{ 'district_id': $('#amphur_id').val()  });
				 
	//     $('#drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select',{ 'tb':'drug','name':'drug_epilepsy_id','id_field':'drug_id','name_field':'drug' }); //ยากันชักที่แพ้ :
		 
		 	     $('#drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'drug','id_field':'drug_id','name_field':'drug' }); //ยากันชักที่แพ้ :



$('#nature_drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'nature_drug_epilepsy','id_field':'nature_drug_epilepsy_id','name_field':'nature_drug_epilepsy' });//ลักษณะการแพ้ยากันชัก 


$('#stimulate_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'stimulate_epilepsy','id_field':'stimulate_epilepsy_id','name_field':'stimulate_epilepsy' }); //สิ่งกระตุ้นให้เกิดอาการชัก :


			$('#province').change(function() //load  จังหวัด
			      {
                          $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id': $('#province').val() });

				  });
				  
			$('#amphur').change(function()
						  {
							   //var  value=$('#amphur_id').val();
							  //alert(''+value);
							 $('#district').load('<?=base_url()?>index.php/home/select_district2',{ 'district_id': $('#amphur_id').val()  });
						  }
				  );	  

				  
				  
	   });
	   
	   
	      $(function()
      {
	      $('#btn_Save').button({ icons:{ primary:'ui-icon-folder-collapsed' } });
		  $('#btn_Reset').button({ icons:{ primary:'ui-icon-refresh' } });
	  });


 $(function()
      {
	       
		   
		   // $datepicker.formatDate('yy-mm-dd');
		      function  calAge(e,y)  //คำนวณอายุ
			{
					  var  ex=document.getElementById(e);
					  var  o=ex.value;
					 var  tmp=o.split('-');
					 var  current=new Date();
					 var   current_year=current.getFullYear(); //ปีปัจจุบัน
					   var  ans= parseInt( current_year ) -  parseInt(tmp[0])  ;  
				    return	document.getElementById(y).value=ans;
			}	

		   
		   
		   
			$('#birthdate').datepicker({
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
													    $('#age').val(ans);
											   }
										});
										
										
										
			$('#interview_date').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								//   showButtonPanel:true,
							    	dateFormat:'yy-mm-dd',
								   appendText:'(yyyy-mm-dd)',
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});
							
	  
	  }
	           );
  
  //####-------------------appendix 1 function----------

</script>
</head>

<body>


<!--############################################################# form appendix1  -->
<?=form_open('appendix/insert_appendix1')?>
<table width="968" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="334" align="right">HN :</td>
    <td width="624">
    <input name="HN" type="text" id="HN" value="HS1553" size="10" maxlength="6"   onkeyup="makeUpperCase('HN')"/>   </td>
  </tr>
  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" value="1111111111111" size="15" maxlength="13" />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="624">
    <input name="ep_no" type="text" id="ep_no" value="<?=$num_?>" size="5" maxlength="5" readonly="readonly" />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="624">
      <input name="firstname" type="text" id="firstname" value="กนกพจน์" size="10" maxlength="25"  />-      
      <input name="surname" type="text" id="surname" value="บุญทวี" size="15" maxlength="25"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="624">
      
      <input name="sex" type="radio"  value="2" checked="checked" />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" />
      (M) ชาย      </td>
  </tr>

        <tr>
    <td align="right">จังหวัด :</td>
    <td width="624">
      <select name="province" id="province">
      <?
	      foreach($province->result() as $row)
		  {
		     $prov_id=$row->prov_id;
			 $prov_name=$row->prov_name;
				  ?>
					<option value="<?=$prov_id?>"><?=$prov_name?></option>
				  <?
	      }
	  ?>
      </select>      </td>
  </tr>
       
       
               <tr>
    <td align="right">อำเภอ :</td>
    <td width="624">
                   
      <div id="amphur"></div>                
       </td>
  </tr>
                
                               <tr>
                               
                               
    <td align="right">ตำบล :</td>
    <td width="624">
                 
                  
      <div id="district"></div>                  </td>
  </tr>
              
              
  <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="624">
     
      <input name="zipcodea" type="text" id="zipcodea" value="40000" size="5" maxlength="5" />           </td>
  </tr>
  
  
       <tr>
      <td align="right" valign="top">ที่อยู่ :</td>
    <td width="624" height="2">
      <textarea name="address" id="address" cols="50" rows="2">546/8 ถ.มิตรภาพ ต.ศิลา อ.เมือง จ.ขอนแก่น</textarea>      </td>
  </tr>
      
      <tr>
      <td align="right" valign="top">เบอร์โทรศัพท์ :</td>
    <td width="624" height="2">
      <input name="telephone" type="text" id="telephone" value="0819656882" size="10" maxlength="10" />          </td>
  </tr>
  
        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="624" height="2">
    <input name="birthdate" type="text" id="birthdate" size="15" maxlength="15" >     </td>
  </tr>


        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="624" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" />       </td>
  </tr>
        
              <tr>
      <td align="right" valign="top">อาชีพ :</td>
    <td width="624" height="2">
<select name="occupational_id" id="occupational_id">
                     <?
					    foreach($occupational->result() as $row)
						{
						     $occupational_id=$row->occupational_id;
							 $occupational=$row->occupational;
							   ?>
                                    <option value="<?=$occupational_id?>"><?=$occupational_id?>.<?=$occupational?></option>
                               <?
						}
					 ?>
                </select>    </td>
  </tr>  
      
      
                  <tr>
      <td align="right" valign="top">ระดับการศึกษา :</td>
    <td width="624" height="2">
<select name="education_id" id="education_id">
                                 <?
                              		 foreach($education->result() as $row)
                                            {
                                                  $education_id=$row->education_id;
                                                  $education=$row->education;
                                                        ?>       
                                                           <option value="<?=$education_id?>"><?=$education_id?>.<?=$education?></option>
                                                        <?
                                            }
                                ?> 
      </select>                 </td>
  </tr>  
                 
                       
                        <tr>
      <td align="right" valign="top">สิทธิทางการรักษา :</td>
    <td  width="624" height="2">                       
<select name="payment_id" id="payment_id">
                                              <?
                              		 foreach($payment->result() as $row)
                                            {
                                                  $payment_id=$row->payment_id;
                                                  $payment=$row->payment;
                                                        ?>       
                                                           <option value="<?=$payment_id?>"><?=$payment_id?>.<?=$payment?></option>
                                                        <?
                                            }
                                ?> 
             </select>    </td>
  </tr>
              
              
                                      <tr>
      <td align="right" valign="top">เริ่มมีอาการชักเมื่อ(ปี) :</td>
    <td  width="624" height="2">  
       
      <input name="age_payment" type="text" id="age_payment" value="2" size="5" maxlength="2" />              </td>
  </tr>
          
          
                                                <tr>
      <td align="right" valign="top">ชักมาแล้ว :</td>
    <td  width="624" height="2">  
      
      <input name="age_sick" type="text" id="age_sick" value="1" size="5" maxlength="2" />                 </td>
  </tr>


                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นครั้งแรก :</td>
    <td  width="624" height="2" align="left" valign="top">  
<select id="epilepsy_first_id" name="epilepsy_first_id">
                                              <?
                              		 foreach($epilepsy_first->result() as $row)
                                            {
                                                  $epilepsy_first_id=$row->epilepsy_first_id;
                                                  $epilepsy_first_content=$row->epilepsy_first_content;
                                                        ?>       
                    <option value="<?=$epilepsy_first_id?>" ><?=$epilepsy_first_id?>.<?=$epilepsy_first_content?></option>
                                                        <?
                                            }
											?> 
      </select>
                
                อื่นๆ ระบุ  <textarea name="detail_epilepsy_first" cols="35" rows="2" id="detail_epilepsy_first" disabled="disabled">รูปแบบการชักที่เป็นครั้งแรก</textarea>                 </td>
  </tr>
          
                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :</td>
    <td  width="624" height="2" align="left" valign="top"> 
    
   <!-- select_other(id_select,value,text)-->
     
<select id="current_epilepsy_id" name="current_epilepsy_id">
                                              <?
                              		 foreach($epilepsy_first->result() as $row)
                                            {
                                                  $epilepsy_first_id=$row->epilepsy_first_id;
                                                  $epilepsy_first_content=$row->epilepsy_first_content;
                                                        ?>       
                    <option value="<?=$epilepsy_first_id?>" ><?=$epilepsy_first_id?>.<?=$epilepsy_first_content?></option>
                                                        <?
                                            }
											?> 
      </select>
                
                อื่นๆ ระบุ  <textarea name="other_current_epilepsy" cols="35" rows="2" id="other_current_epilepsy" disabled="disabled">รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน</textarea>                 </td>
  </tr>
          
                                                  <tr>
      <td align="right" valign="top">เคยตรวจ EEG มาก่อนหรือไม่ :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="ever_EEG" type="radio"  value="1" checked="checked" />
    
      เคย 
      
      <input type="radio" name="ever_EEG"  value="2" />
      </label>ไม่เคย                                                  </tr>
        

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ EEG่ :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="results_EEG" type="radio"  value="1" />
  
      เคย 
      
      <input name="results_EEG" type="radio"  value="2" checked="checked" />
     ไม่เคย                                                  </tr>


                                                  <tr>
      <td align="right" valign="top">เคยตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="ever_CT_MRI" type="radio"  value="1" />
  
      เคย 
      
      <input name="ever_CT_MRI" type="radio"  value="2" checked="checked" />
     ไม่เคย                                                  </tr>

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="result_CT_MRI" type="radio"  value="1" />
      ปกติ 
      <input name="result_CT_MRI" type="radio"  value="2" checked="checked" />
     ไม่ปกติ                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ลักษณะความผิดปกติจาก CT/MRI :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="nature_CT_MRI_id" name="nature_CT_MRI_id">
                                              <?
                              		 foreach($CTMRI->result() as $row)
                                            {
                                                  $id_CTMRI=$row->id_CTMRI;
                                                  $CTMRI=$row->CTMRI;
                                                        ?>       
                    <option value="<?=$id_CTMRI?>" ><?=$id_CTMRI?>.<?=$CTMRI?></option>
                                                        <?
                                            }
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="other_Nature_CT_MRI" cols="35" rows="2" id="other_Nature_CT_MRI" disabled="disabled">ลักษณะความผิดปกติจาก CT/MRI :</textarea>                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="drug_id" name="drug_id">
                                              <?
                              		 foreach($drug->result() as $row)
                                            {
                                                  $drug_id=$row->drug_id;
                                                  $drug=$row->drug;
                                                        ?>       
                    <option value="<?=$drug_id?>" ><?=$drug_id?>.<?=$drug?></option>
                                                        <?
                                            }
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="drug_other" cols="35" rows="2" id="drug_other" disabled="disabled">ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา</textarea>                                                </td>
  </tr>


                                                  <tr>
      <td align="right" valign="bottom">โรคร่วมอื่่นๆ ของผู้ป่วย :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="disease_drug_id" name="disease_drug_id">
                                              <?
                              		 foreach($disease_drug->result() as $row)
                                            {
                                                  $disease_drug_id=$row->disease_drug_id;
                                                  $disease_drug=$row->disease_drug;
                                                        ?>       
                    <option value="<?=$disease_drug_id?>" ><?=$disease_drug_id?>.<?=$disease_drug?></option>
                                                        <?
                                            }
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="disease_drug_other" cols="35" rows="2" id="disease_drug_other" disabled="disabled">โรคร่วมอื่่นๆ ของผู้ป่วย</textarea>                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="top">ประวัติการแพ้ยา :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="allergic_id" type="radio" id="allergic_id_1" value="1" checked="checked"/>
      ไม่เคย
      <input name="allergic_id" type="radio" id="allergic_id_2" value="2"  />
     เคย
                                              
        ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)..<textarea name="allergic_detail" cols="30" rows="2" id="allergic_detail" disabled="disabled"> ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)</textarea>                                                </td>
  </tr>



                                                  <tr>
    											  <td align="right" valign="bottom" >ยากันชักที่แพ้ :</td>
                                                       
   												  <td align="left" valign="top">
                                                       
                                                               
                                                               
                                                               <select id="drug_epilepsy_id" name="drug_epilepsy_id">
                                                               </select>
                                                      
                                                      
                                             อื่นๆ ...
                                             <textarea name="drug_epilepsy_detail" cols="35" rows="2" id="drug_epilepsy_detail" disabled="disabled">ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)..</textarea></td>
                                                  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >ลักษณะการแพ้ยากันชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                    <select id="nature_drug_epilepsy_id" name="nature_drug_epilepsy_id" >
                                                    </select>
                                             อื่นๆ ...
                                             <textarea name="nature_drug_epilepsy_other"  cols="35" rows="2" disabled="disabled" id="nature_drug_epilepsy_other">ลักษณะการแพ้ยากันชัก</textarea></td>
  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >สิ่งกระตุ้นให้เกิดอาการชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                       <select id="stimulate_epilepsy_id" name="stimulate_epilepsy_id" >
                                                      </select>
                                             อื่นๆ ...
                                             <textarea name="stimulate_epilepsy_other" cols="35" rows="2" id="stimulate_epilepsy_other" disabled="disabled">สิ่งกระตุ้นให้เกิดอาการชัก</textarea></td>
                                                  </tr>
                                                  
                                                  
                     <tr>
                     <td align="right" valign="top">
                     วัน/เดือน/ปี ที่สัมภาษณ์ :                       </td>
                     <td>                     
                     <input name="interview_date" type="text" id="interview_date" size="15" maxlength="15" />                     </td>
                     </tr>  
                     
                     <tr>
                     <td align="right" valign="top">
                     ผู้กรอกข้อมูล :                       </td>
                     <td>                     
                     <input name="interview_name" type="text" id="interview_name" size="15" maxlength="30"  value="ป้องจิต"/>
                     -
                     <input name="interview_lastname" type="text" id="interview_lastname" size="20" maxlength="60"  value="คำสิงห์"/>                     </td>
                     </tr>  
                     
                     
<tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="btn_Save">Save</button>
                      <button type="reset"  id="btn_Reset" >Reset</button>                      </td>
                     </tr>
</table>

<?=form_close()?>
<!--############################################################# form appendix1  -->



</body>
</html>

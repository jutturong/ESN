<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>



<?=$this->load->view('import_jquery')?>


<script type="text/javascript">
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
				 
	     $('#drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select',{ 'tb':'drug','name':'drug_epilepsy_id','id_field':'drug_id','name_field':'drug' });

			$('#province').change(function() //load  จังหวัด
			      {
                          $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/drug/drug_epilepsy_id/drug_id/drug',{ 'amphur_id': $('#province').val() });

				  });
				  
			$('#amphur').change(function()
						  {
							   //var  value=$('#amphur_id').val();
							  //alert(''+value);
							 $('#district').load('<?=base_url()?>index.php/home/select_district2',{ 'district_id': $('#amphur_id').val()  });
						  }
				  );	  

				  
				  
	   });
  
  //####-------------------appendix 1 function---------- 
   
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
								   appendText:'(yyyy-mm-dd)',
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});
							
	  
	  }
	           );
 
  $(function()
        {
		       $('#hardcopy').accordion();
		}
		);
 
  $(function()
        {
		       $('#form_system').accordion();
		}
	);	
 
  $(function()
  {
       $('#report').accordion();
  }
  );

$(function() //operation
 {
      $('#admin').accordion();
 }
            );
			

 $(function(){  $('#ui-widget-content').accordion();  });
			
 
$(function() //tab appendix1
   {
      $('#tab-app1').tabs();
      $('#tab-app2').tabs();
	  $('#tab-app3').tabs();
	  $('#tab-app4').tabs();
	  $('#tab-app5').tabs();
	  $('#tab-app6').tabs();
   }
  );

//##---------------- button  search
$(function() {
		  // $("button, input:submit, a", ".demo").button();
		  // $("a", ".demo").click(function() { return false; });
		   $('#btn_Search').button({ icons:{ primary:'ui-icon-search' } });
		   $('#btn_Logout').button({ icons:{ primary:'ui-icon-locked'} });
	});


//##------------------------ menu
$(function() 
		{
		var availableTags = ["AA0096", "AA0105", "BC5692", "coldfusion", "javascript", "asp", "ruby", "python", "c", "scala", "groovy", "haskell", "perl"];
		$("#tags").autocomplete({
			source: availableTags
								});
	     });


//##------------------------ content
 $(function() 
        {
		   // $("#accordion").accordion({  event:"mouseover" });
			  $("#accordion").accordion();
		}
  );



</script>
</head>

<body>


<table width="1164" align="right">

<tr>
<td colspan="2" align="left" valign="top" class="ui-widget-header">
                    <?=nbs(5)?> 
                    <label for="tags">HN : </label>
                    <input id="tags" />
                    <button id="btn_Search">Search</button>
                    <button id="btn_Logout">Logout</button>
</td>
</tr>

<tr>
<td colspan="2" align="left" valign="top">




<div id="accordion" class="ui-widget-content">

<h3><a href="#">(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา</a></h3>
		<div id="tab-app1">
                             <ul>
                             <li><a href="#app1-insert">บันทึกข้อมูล</a></li>
                             <li><a href="#app1-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app1-insert">
                             
<!--############################################################# form appendix1  -->
<?=form_open('appendix/insert_appendix1')?>
<table width="1132" border="0">
  <tr>
    <td width="334" align="right">HN :</td>
    <td width="788">
      <input name="HN" type="text" id="HN" value="HS1553" size="10" maxlength="6"   onkeyup="makeUpperCase('HN')"/>   </td>
  </tr>
  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" value="1111111111111" size="15" maxlength="13" />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="788">
      <input name="ep_no" type="text" id="ep_no" value="<?=$num_?>" size="5" maxlength="5" readonly="readonly" />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="788">
      <input name="firstname" type="text" id="firstname" value="กนกพจน์" size="10" maxlength="25"  />-      
      <input name="surname" type="text" id="surname" value="บุญทวี" size="15" maxlength="25"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="788">
      
      <input name="sex" type="radio"  value="2" checked="checked" />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" />
      (M) ชาย      </td>
      </tr>

        <tr>
    <td align="right">จังหวัด :</td>
    <td width="788">
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
    <td width="788">
                   
                       <div id="amphur"></div>    
    
    
                                        
                 </td>
              </tr>
                
                               <tr>
                               
                               
    <td align="right">ตำบล :</td>
    <td width="788">
                 
                  
                  <div id="district"></div>
                  
                  
                  </td>
              </tr>
              
              
                                             <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="788">
      <label>
      <input name="zipcodea" type="text" id="zipcodea" value="40000" size="5" maxlength="5" />
      </label>      </td>
     </tr>
  
  
       <tr>
      <td align="right" valign="top">ที่อยู่ :</td>
    <td width="788" height="2">
      <textarea name="address" id="address" cols="50" rows="2">546/8 ถ.มิตรภาพ ต.ศิลา อ.เมือง จ.ขอนแก่น</textarea>      </td>
       </tr>
      
      <tr>
      <td align="right" valign="top">เบอร์โทรศัพท์ :</td>
    <td width="788" height="2">
      <input name="telephone" type="text" id="telephone" value="0819656882" size="10" maxlength="10" />          </td>
      </tr>
  
        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="788" height="2">
    <input name="birthdate" type="text" id="birthdate" size="15" maxlength="15" >     </td>
     </tr>


        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="788" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" />       </td>
        </tr>
        
              <tr>
      <td align="right" valign="top">อาชีพ :</td>
    <td width="788" height="2">
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
    <td width="788" height="2">
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
    <td  width="788" height="2">                       
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
    <td  width="788" height="2">  
       
        <input name="age_payment" type="text" id="age_payment" value="2" size="5" maxlength="2" />              </td>
          </tr>
          
          
                                                <tr>
      <td align="right" valign="top">ชักมาแล้ว :</td>
    <td  width="788" height="2">  
      
        <input name="age_sick" type="text" id="age_sick" value="1" size="5" maxlength="2" />                 </td>
          </tr>


                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นครั้งแรก :</td>
    <td  width="788" height="2" align="left" valign="top">  
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
                
                อื่นๆ ระบุ  <textarea name="detail_epilepsy_first" cols="35" rows="2" id="detail_epilepsy_first" disabled="disabled"></textarea>                 </td>
          </tr>
          
                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :</td>
    <td  width="788" height="2" align="left" valign="top">  
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
                
                อื่นๆ ระบุ  <textarea name="other_current_epilepsy" cols="35" rows="2" id="other_current_epilepsy" disabled="disabled"></textarea>                 </td>
          </tr>
          
                                                  <tr>
      <td align="right" valign="top">เคยตรวจ EEG มาก่อนหรือไม่ :</td>
    <td  width="788" height="2" align="left" valign="top"><label>
      <input name="ever_EEG" type="radio"  value="1" checked="checked" />
    </label> 
      เคย 
      <label>
      <input type="radio" name="ever_EEG"  value="2" />
      </label>ไม่เคย                                                  </tr>
        

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ EEG่ :</td>
    <td  width="788" height="2" align="left" valign="top">
      <input name="results_EEG" type="radio"  value="1" />
  
      เคย 
      
      <input name="results_EEG" type="radio"  value="2" checked="checked" />
     ไม่เคย                                                  </tr>


                                                  <tr>
      <td align="right" valign="top">เคยตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="788" height="2" align="left" valign="top">
      <input name="ever_CT_MRI" type="radio"  value="1" />
  
      เคย 
      
      <input name="ever_CT_MRI" type="radio"  value="2" checked="checked" />
     ไม่เคย                                                  </tr>

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="788" height="2" align="left" valign="top">
      <input name="result_CT_MRI" type="radio"  value="1" />
      ปกติ 
      <input name="result_CT_MRI" type="radio"  value="2" checked="checked" />
     ไม่ปกติ                                                </td>
                                                 </tr>

                                                  <tr>
      <td align="right" valign="bottom">ลักษณะความผิดปกติจาก CT/MRI :</td>
    <td  width="788" height="2" align="left" valign="top">
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
                                             
                                             อื่นๆ ...<textarea name="other_Nature_CT_MRI" cols="35" rows="2" id="other_Nature_CT_MRI" disabled="disabled"></textarea>                                                </td>
                                                  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา :</td>
    <td  width="788" height="2" align="left" valign="top">
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
                                             
                                             อื่นๆ ...<textarea name="drug_other" cols="35" rows="2" id="drug_other" disabled="disabled"></textarea>                                                </td>
                                                  </tr>


                                                  <tr>
      <td align="right" valign="bottom">โรคร่วมอื่่นๆ ของผู้ป่วย :</td>
    <td  width="788" height="2" align="left" valign="top">
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
                                             
                                             อื่นๆ ...<textarea name="disease_drug_other" cols="35" rows="2" id="disease_drug_other" disabled="disabled"></textarea>                                                </td>
                                                  </tr>

                                                  <tr>
      <td align="right" valign="top">ประวัติการแพ้ยา :</td>
    <td  width="788" height="2" align="left" valign="top">
      <input name="allergic_id" type="radio"  value="1" />
      ไม่เคย
      <input name="allergic_id" type="radio"  value="2" checked="checked" />
     เคย
                                              
        ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)..<textarea name="allergic_detail" cols="30" rows="2" id="allergic_detail" disabled="disabled"></textarea>                                                </td>
                                                 </tr>



                                                  <tr>
    											  <td align="right" valign="bottom" >ยากันชักที่แพ้ :</td>
                                                       
   												  <td align="left" valign="top">
                                                       
                                                               <span id="drug_epilepsy_id"></span>
<!--                                                       <select id="drug_epilepsy_id" name="drug_epilepsy_id" >
                                                      </select>
-->                                                      
                                                      
                                                      
                                             อื่นๆ ...
                                             <textarea name="drug_other" cols="35" rows="2" id="drug_other" disabled="disabled"></textarea></td>
                                                  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >ลักษณะการแพ้ยากันชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                       <select id="nature_drug_epilepsy_id" name="nature_drug_epilepsy_id" >
                                                         <?
														    foreach($nature_drug_epilepsy->result() as $row)
															{
															    $nature_drug_epilepsy_id=$row->nature_drug_epilepsy_id;
																$nature_drug_epilepsy=$row->nature_drug_epilepsy;
														 ?>
                                                                    <option id="<?=$nature_drug_epilepsy_id?>"><?=$nature_drug_epilepsy?></option>
                                                         <?
														     }
														 ?>
                                                      </select>
                                             อื่นๆ ...
                                             <textarea name="drug_epilepsy_detail" cols="35" rows="2" id="drug_epilepsy_detail" disabled="disabled"></textarea></td>
                                                  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >สิ่งกระตุ้นให้เกิดอาการชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                       <select id="stimulate_epilepsy_id" name="stimulate_epilepsy_id" >
                                                         <?
														        
														    foreach($stimulate_epilepsy->result() as $row)
															{
															    $stimulate_epilepsy_id=$row->stimulate_epilepsy_id;
																$stimulate_epilepsy=$row->stimulate_epilepsy;
														 ?>
                                                                <option id="<?=$stimulate_epilepsy_id?>"><?=$stimulate_epilepsy_id?>.<?=$stimulate_epilepsy?></option>
                                                         <?
														     }
														 ?>
                                                    </select>
                                             อื่นๆ ...
                                             <textarea name="stimulate_epilepsy_other" cols="35" rows="2" id="stimulate_epilepsy_other" disabled="disabled"></textarea></td>
                                                  </tr>
                                                  
                                                  
                     <tr>
                     <td align="right" valign="top">
                     วัน/เดือน/ปี ที่สัมภาษณ์ :
                       </td>
                     <td>                     
                     <input name="interview_date" type="text" id="interview_date" size="15" maxlength="15" />
                     </td>
                     </tr>  
                     
                     <tr>
                     <td align="right" valign="top">
                     ผู้กรอกข้อมูล :
                       </td>
                     <td>                     
                     <input name="interview_name" type="text" id="interview_name" size="15" maxlength="30" />
                     -
                     <input name="interview_lastname" type="text" id="interview_lastname" size="20" maxlength="60" />
                     </td>
                     </tr>  
                     
                     
                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="btn_Save">Save</button>
                      <button type="reset"  id="btn_Reset" >Reset</button>
                      
                      </td>
                     </tr>

                                                
</table>

<?=form_close()?>
<!--############################################################# form appendix1  -->
                             </div> 
          <div id="app1-data">2</div> 
        </div>
                    
                    
	<h3><a href="#">(Appendix 2) แบบบันทึกการติดตามการรักษา</a></h3>
						<div id="tab-app2">
					         <ul>
                                 <li><a href="#app2-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app2-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app2-insert">
<!--         ##################### appendix2                    1-->
          <?=form_open('appendix.php/insert_appendix2')?>
         <table>
         
         
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
                          </div> 
                             <div id="app2-data">2</div> 

        </div>
	<h3><a href="#">(Appendix 3) แบบบันทึกการนอนรักษาพยาบาลในโรงพยาบาล</a></h3>
						<div id="tab-app3">
					         <ul>
                                 <li><a href="#app3-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app3-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app3-insert">
                             
                             
<!--  ############  appendex3-->   




<table>



         <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
          <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="textfield" type="text" id="textfield" size="15" maxlength="13" />           </td>
         </tr>
       
        
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="<?=$num_?>" />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="" />
           -
           <input name="textfield2" type="text" id="textfield2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="radio" id="radio" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="radio2" id="radio2" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>


                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่เข้านอนรักษา :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่จำหน่าย :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา :                </td>
         <td>
           <select name=""></select>
          </td>
         </tr>
         
         
                                              <tr>
         <td align="right" valign="top">
         สรุปการรักษาที่ได้รับ :                </td>
         <td>
           <textarea name="" cols="30" rows="2"></textarea>
          </td>
         </tr>

         
                                              <tr>
         <td align="right" valign="top">
         สถานะจำหน่าย :                </td>
         <td>
           <select></select>
          </td>
         </tr>


                                              <tr>
         <td align="right" valign="top">
         รายละเอียดเพิ่มเติม :                </td>
         <td>
           <textarea name="" cols="30" rows="2"></textarea>
          </td>
         </tr>
         
         
         
                                                       <tr>
         <td align="right" valign="top">
         ประเภทจำหน่าย :                </td>
         <td>
           <select></select>
          </td>
         </tr>

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button >Save</button>
                      <button type="reset" >Reset</button>
                      
                      </td>
                     </tr>


</table>
                         
                             
                             </div> 
                             <div id="app3-data">2</div> 

        </div>
                    
                    
                    
                    
	<h3><a href="#">(Appendix 4) แบบบันทึกการรักษาในห้องฉุกเฉิน</a></h3>
						<div id="tab-app4">
					         <ul>
                                 <li><a href="#app4-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app4-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app4-insert">
                             
<!-- ################################# appendix4-->                          
         <table>
          
          
          <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
           </tr>
         
          
          <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="textfield" type="text" id="textfield" size="15" maxlength="13" />           </td>
         </tr>
 
 
          <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="<?=$num_?>" />         </td>
         </tr>
 
 
                   <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="" />
           -
           <input name="textfield2" type="text" id="textfield2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="radio" id="radio" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="radio2" id="radio2" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

 
                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>


                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่เข้ารักษาในห้องฉุกเฉิน :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฉิน :                
         
         </td>
         <td>
           <select name=""></select>
          </td>
         </tr>
      
      
      
                                       <tr>
         <td align="right" valign="top">
         สรุปการรักษาที่ได้รับผลการรักษา :                
         
         </td>
         <td>
           <select name=""></select>
          </td>
         </tr>
    
                      <tr>
                     <td colspan="2" align="center" valign="top">
                      <button >Save</button>
                      <button type="reset" >Reset</button>
                      
                      </td>
                     </tr>
     
         
       </table>                     
                          
                             
<!-- ################################# appendix4-->
                              
                             </div> 
                             <div id="app4-data">2</div> 

        </div>
   
    <h3><a href="#">(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย</a></h3>
						<div id="tab-app5">
					         <ul>
                                 <li><a href="#app5-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app5-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app5-insert">
                             
<!--  ####################### appendix5  --> 
 <table>
 
 
          <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
           </tr>
         
          
          <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="textfield" type="text" id="textfield" size="15" maxlength="13" />           </td>
         </tr>
 
 
          <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="<?=$num_?>" />         </td>
         </tr>
 
 
                   <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="" />
           -
           <input name="textfield2" type="text" id="textfield2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="radio" id="radio" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="radio2" id="radio2" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

 
                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>


                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่เยี่ยมบ้าน :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ปัญหาที่พบ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
                    
                    
                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button >Save</button>
                      <button type="reset" >Reset</button>
                      
                      </td>
                     </tr>


 
 </table>                    
<!--  ####################### appendix5  -->                             
                             
                             </div> 
                             <div id="app5-data">2</div> 

        </div>
    <h3><a href="#">(Appendix 6ุ) แบบบันทึกการเสียชีวิต</a></h3>
						<div id="tab-app6">
					         <ul>
                                 <li><a href="#app6-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app6-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app6-insert">
                             
 <!--  ####################### appendix6  -->                              
  <table>
 
 
          <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
           </tr>
         
          
          <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="textfield" type="text" id="textfield" size="15" maxlength="13" />           </td>
         </tr>
 
 
          <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="<?=$num_?>" />         </td>
         </tr>
 
 
                   <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="" />
           -
           <input name="textfield2" type="text" id="textfield2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="radio" id="radio" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="radio2" id="radio2" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

 
                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>


                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่เสียชีิวิต :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         สาเหตุการเสียชีวิต :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
                    
                    
                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button >Save</button>
                      <button type="reset" >Reset</button>
                      
                      </td>
                     </tr>


 
 </table>                    
                            
                     
  <!--  ####################### appendix6  -->                               
                             
                             
                             </div> 
                             <div id="app6-data">2</div> 

        </div>

    
</div>




                    
                    
                    
</div>
</td>
</tr>

<tr>
<td width="643" align="left" valign="top">
<div id="admin" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Admin  ผู้ดูแลระบบ</a></h3>
         <div>
             testing  admin
         </div>

</div>
</td>

<td width="509" align="left" valign="top">
<div id="report" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Report  การรายงานผล</a></h3>
                        <div>
                             testing  report
                        </div>
</div>
</td>
</tr>


<tr>

<td  align="left" valign="top">
<div  id="form_system" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">แบบฟอร์มต่าง ๆ</a></h3>
          <div>
                  form system
          </div>

</div>
</td>



<td align="left" valign="top">
<div  id="hardcopy" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Hard Copy</a></h3>
         <div>
            Hard copy
         </div>
</div>

</td>
</tr>




</table>

</body>


</html>

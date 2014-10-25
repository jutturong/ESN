<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=$title?></title>

<script type="text/javascript">
   $(function()
   {
			
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

   }
   );
</script>


</head>

<body>

<? //$prov_id ?>

<!--############################################################# form appendix1  -->
<?=form_open('appendix/update_appendix_table')?>
<table width="887" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="268" align="right">HN :</td>
    <td width="609">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"  value="<?=@$HN?>"  />
    <input name="id_appendix1" type="hidden" id="id_appendix1" value="<?=@$id_appendix1?>" size="5" maxlength="5"  readonly="readonly"/> 
        
     <input name="appendix" type="hidden" id="appendix" value="1" /></td>
  </tr>
  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" value="<?=@$person_id?>"  />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="609">
    <input name="ep_no" type="text" id="ep_no" size="5" maxlength="5" readonly="readonly" value="<?=@$ep_no?>"  />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="609">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25" value="<?=@$name?>"   />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  value="<?=@$surname?>"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="609">
      
      <input name="sex" type="radio"  value="2"  <? if( @$sex== 2 ) { ?>  checked="checked"   <? }  ?>  />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" <? if( @$sex== 1 ) { ?>  checked="checked"   <? }  ?> />
      (M) ชาย      </td>
  </tr>

        <tr>
    <td align="right">จังหวัด :</td>
    <td width="609">
       
      <select name="prov_id" id="prov_id" >
<?
	     foreach($province->result() as $row)
	     {
		     $prov_id_tb=$row->prov_id;
			 $prov_name=$row->prov_name;
			     if( $prov_id_tb == $prov_id )
				 {
					 ?>
						 <option value="<?=@$prov_id_tb?>" selected="selected"><?=@$prov_name?></option>
					 <?
			     }
				 else
				 {
					 ?>
						 <option value="<?=@$prov_id_tb?>" ><?=@$prov_name?></option>
					 <?
				 }
		 }
	  ?>
      </select>      </td>
  </tr>
       
       
               <tr>
    <td align="right">อำเภอ :</td>
    <td width="609">
       <select name="amphur_id" id="amphur_id">
           <?
		       $this->db->select('*');
			   $main_amphur=$this->db->get('main_amphur');
			   foreach($main_amphur->result() as $row)
			   {
			      $amphur_id_tb=$row->amphur_id;
				  $amphur_name_tb=$row->amphur_name;
				  if( @$amphur_id == $amphur_id_tb )
				  {
		   ?>
                   <option value="<?=$amphur_id_tb?>" selected="selected"><?=$amphur_name_tb?></option>
           <?
		          }
				  else
				  {
				     ?>
				         <option value="<?=$amphur_id_tb?>" ><?=$amphur_name_tb?></option>
                     <?
				  }
			   }
		   ?>
       </select>    </td>
  </tr>
                
                               <tr>
                               
                               
    <td align="right">
    
    ตำบล :    </td>
    <td width="609">
                  
   <select id="district_id" name="district_id" >
   <?
     foreach($main_district->result() as $row)
	 {
	     $district_id_tb=$row->district_id;
		 $district_name_tb=$row->district_name;
		  if( @$district_id == $district_id_tb )
		  {
			   ?>
				   <option value="<?=$district_id_tb?>" selected="selected"><?=$district_name_tb?></option>
				<?
	      }
		  else
		  {
		      ?>
		  	       <option value="<?=$district_id_tb?>"><?=$district_name_tb?></option>
              <?
		  }
	 } 
	?>
    </select>      </td>
  </tr>
              
              
  <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="609">
     
    <input name="zipcodea" type="text" id="zipcodea" value="<?=@$zipcode?>"   size="5" maxlength="5" />           </td>
  </tr>
  
  
       <tr>
      <td align="right" valign="top">ที่อยู่ :</td>
    <td width="609" height="2">
      <textarea name="address" id="address" cols="50" rows="1" ><?=@$address?></textarea>      </td>
  </tr>
      
      <tr>
      <td align="right" valign="top">เบอร์โทรศัพท์ :</td>
    <td width="609" height="2">
      <input name="telephone" type="text" id="telephone" size="10" maxlength="10"   value="<?=@$telephone?>"/>          </td>
  </tr>
  
        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="609" height="2">
    <input name="birthdate" type="text"  value="<?=@$birthdate?>" id="birthdate" size="10" maxlength="15"  >     </td>
  </tr>


        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="609" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2"  value="<?=@$age?>"  />       </td>
  </tr>
        
              <tr>
      <td align="right" valign="top">อาชีพ :</td>
    <td width="609" height="2">
<select id="occupational_id" name="occupational_id">
<?
    $this->db->select('*');
	$oc=$this->db->get('occupational');
	foreach($oc->result() as $row)
	{
	      $occupational_id_tb=$row->occupational_id;
	      $occupational_tb=$row->occupational;
		  if( @$occupational_id == $occupational_id_tb )
		  { 
?>
           <option value="<?=$occupational_id_tb?>" selected="selected"><?=$occupational_tb?></option>
<?
	      }
		  else
		  {
		  ?>
           <option value="<?=$occupational_id_tb?>" ><?=$occupational_tb?></option>
		  <?
		  }
	}             
?>              
       </select>                </td>
  </tr>  
      
      
                  <tr>
      <td align="right" valign="top">ระดับการศึกษา :</td>
    <td width="609" height="2">
<select name="education_id" id="education_id" >
           <?
		      $ed=$this->db->get('education');
			  foreach($ed->result() as $row)
			  {
			    $education_id_tb=$row->education_id;
				$education_tb=$row->education;
				 if( @$education_id == $education_id_tb )
				 {
		   ?> 
                 <option value="<?=$education_id_tb?>" selected="selected"><?=$education_tb?></option>
           <?
		         }
				 else
				 {
				 	  ?> 
                 <option value="<?=$education_id_tb?>" ><?=$education_tb?></option>
          			 <?

				 }
			  } 
		   ?>                                             
      </select>      </td>
  </tr>  
                 
                       
                        <tr>
      <td align="right" valign="top">สิทธิทางการรักษา :</td>
    <td  width="609" height="2">                       
<select name="payment_id" id="payment_id" >
             <?
			    $p=$this->db->get('payment');
				foreach($p->result() as $row)
				{
				    $payment_id_tb=$row->payment_id; 	
					$payment_tb=$row->payment;
					if( $payment_id_tb == @$payment_id )
					{
				   ?>
                       <option value="<?=$payment_id_tb?>" selected="selected"><?=$payment_tb?></option>
                   <?
				    }
					else
					{
					  ?>
                         <option  value="<?=$payment_id_tb?>" ><?=$payment_tb?></option>
                      <?
					}
				}
			 ?>                                            
             </select>    </td>
  </tr>
              
              
                                      <tr>
      <td align="right" valign="top">เริ่มมีอาการชักเมื่อ(ปี) :</td>
    <td  width="609" height="2">  
       
      <input name="age_payment" type="text" id="age_payment" size="5" maxlength="2" value="<?=@$age_payment?>"  />              </td>
  </tr>
          
          
                                                <tr>
      <td align="right" valign="top">ชักมาแล้ว :</td>
    <td  width="609" height="2">  
      
      <input name="age_sick" type="text" id="age_sick" size="5" maxlength="2" value="<?=@$age_sick?>"  />                 </td>
  </tr>


                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นครั้งแรก :</td>
    <td  width="609" height="2" align="left" valign="top">  
<select id="epilepsy_first_id" name="epilepsy_first_id" >

                 <?
				     $ep=$this->db->get('epilepsy_first');
					 foreach($ep->result() as $row)
					 {
					    $epilepsy_first_id_tb=$row->epilepsy_first_id;
						$epilepsy_first_content_tb=$row->epilepsy_first_content;
						if(  $epilepsy_first_id_tb == @$epilepsy_first_id  )
						{
				 ?>
                            <option value="<?=$epilepsy_first_id_tb?>" selected="selected"><?=$epilepsy_first_content_tb?></option>  
                 <?
				         }
						 else
						 {
						 	?>
                            <option value="<?=$epilepsy_first_id_tb?>" selected="selected"><?=$epilepsy_first_content_tb?></option>  
                            <?
						 }
					 }
				 ?>
      </select>
                
                อื่นๆ ระบุ  <textarea name="detail_epilepsy_first" cols="35" rows="1" id="detail_epilepsy_first" ><?=@$detail_epilepsy_first?></textarea>                 </td>
  </tr>
          
                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :</td>
    <td  width="609" height="2" align="left" valign="top"> 
    
   <!-- select_other(id_select,value,text)-->
     
<select id="current_epilepsy_id" name="current_epilepsy_id" >

                 <?
				     $ep_2=$this->db->get('epilepsy_first');
					 foreach($ep_2->result() as $row)
					 {
					    $epilepsy_first_id_tb=$row->epilepsy_first_id;
						$epilepsy_first_content_tb=$row->epilepsy_first_content;
						if(  $epilepsy_first_id_tb == @$epilepsy_first_id  )
						{
				 ?>
                            <option value="<?=$epilepsy_first_id_tb?>" selected="selected"><?=$epilepsy_first_content_tb?></option>  
                 <?
				         }
						 else
						 {
						 	?>
                            <option value="<?=$epilepsy_first_id_tb?>" selected="selected"><?=$epilepsy_first_content_tb?></option>  
                            <?
						 }
					 }
				 ?>
      </select>
                
                อื่นๆ ระบุ  <textarea name="other_current_epilepsy" cols="35" rows="1" id="other_current_epilepsy" ><?=@$other_current_epilepsy?></textarea>                 </td>
  </tr>
          
                                                  <tr>
      <td align="right" valign="top">เคยตรวจ EEG มาก่อนหรือไม่ :</td>
    <td  width="609" height="2" align="left" valign="top">
      <input name="ever_EEG" type="radio"  value="1" <? if (@$ever_EEG== 1) { ?> checked="checked"  <?  } ?>   />
    
      เคย 
      
      <input type="radio" name="ever_EEG"  value="2" <? if (@$ever_EEG== 2) { ?> checked="checked"  <?  } ?>   />
      ไม่เคย      </tr>
        

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ EEG่ :</td>
    <td  width="609" height="2" align="left" valign="top">
      <input name="results_EEG" type="radio"  value="1"  <? if( @$results_EEG==1 ) { ?> checked="checked"  <? } ?>  />
  
      เคย 
      
      <input name="results_EEG" type="radio"  value="2"  <? if( @$results_EEG==2 ) { ?> checked="checked"  <? } ?>  />
     ไม่เคย                                                  </tr>


                                                  <tr>
      <td align="right" valign="top">เคยตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="609" height="2" align="left" valign="top">
      <input name="ever_CT_MRI" type="radio"  value="1" <? if( @$ever_CT_MRI==1 ) { ?> checked="checked"  <? } ?>  />
  
      เคย 
      
      <input name="ever_CT_MRI" type="radio"  value="2" <? if( @$ever_CT_MRI==2 ) { ?> checked="checked"  <? } ?> />
     ไม่เคย                                                  </tr>

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="609" height="2" align="left" valign="top">
      <input name="result_CT_MRI" type="radio"  value="1" <? if( @$result_CT_MRI==1 ) { ?> checked="checked"  <? } ?>  />
      ปกติ 
      <input name="result_CT_MRI" type="radio"  value="2" <? if( @$result_CT_MRI==2 ) { ?> checked="checked"  <? } ?>   />
     ไม่ปกติ                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ลักษณะความผิดปกติจาก CT/MRI :</td>
    <td  width="609" height="2" align="left" valign="top">
<select id="nature_CT_MRI_id" name="nature_CT_MRI_id" >


     <?
	     $ct=$this->db->get('ctmri');
		 foreach($ct->result() as $row)
		 {
		    $id_CTMRI_tb=$row->id_CTMRI;
			$CTMRI_tb=$row->CTMRI;
			  if( $id_CTMRI_tb == @$nature_CT_MRI  )
			  {
			?>
                  <option value="<?=$id_CTMRI_tb?>" selected="selected"><?=$CTMRI_tb?></option>  
            <?
			  }
			  else
			  {
			?>
                  <option value="<?=$id_CTMRI_tb?>" ><?=$CTMRI_tb?></option>  
            <?

			  }
		 }
	 ?>
                  </select>
                                             
                                             อื่นๆ ...<textarea name="other_Nature_CT_MRI" cols="20" rows="1" id="other_Nature_CT_MRI" ><?=@$other_Nature_CT_MRI?>
                                             </textarea>                                                </td>
  
  
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา :</td>
    <td  width="609" height="1" align="left" valign="top">
  
    
<select id="drug_id" name="drug_id" >
      <?
	       $dr=$this->db->get('drug');
		   foreach($dr->result() as $row)
	       { 
		      $drug_id_tb=$row->drug_id;
			  $drug_tb=$row->drug;
			  if( @$drug_id  == $drug_id_tb)
			  {
	  ?>
                    <option value="<?=$drug_id_tb?>" selected="selected"><?=$drug_tb?></option>
        <?
		      }
			  else
			  {
			    ?>
                    <option value="<?=$drug_id_tb?>"><?=$drug_tb?></option>
                <?
			  }
		    }
		?>
</select>
                                             
                                          
                                          
                                          
                                             อื่นๆ ...
                                             <textarea name="drug_other" cols="20" rows="1" id="drug_other" ><?=@$drug_other?>
                                             </textarea></td>
  </tr>


                                                  <tr>
      <td align="right" valign="bottom">โรคร่วมอื่่นๆ ของผู้ป่วย :</td>
    <td  width="609" height="2" align="left" valign="top">
<select id="disease_drug_id" name="disease_drug_id" >
              <?
			      //echo $drug_id;
				  //echo br();
				  $di=$this->db->get('disease_drug');
				  foreach($di->result() as $row)
				  {
				       $disease_drug_id_tb=$row->disease_drug_id;
					   $disease_drug_tb=$row->disease_drug;
					   if( @$disease_drug_id == $disease_drug_id_tb )
					   {
					 ?>
				        <option value="<?=$disease_drug_id_tb?>" selected="selected"><?=$disease_drug_tb?></option>
                     <?
					   } 
					   else
					   {
					 ?>
				        <option value="<?=$disease_drug_id_tb?>" ><?=$disease_drug_tb?></option>
                     <?
					   
					   }
				  }
			  ?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="disease_drug_other" cols="20" rows="1" id="disease_drug_other" >										 <?=@$disease_drug_other?>
                                             </textarea>                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="top">ประวัติการแพ้ยา :</td>
    <td  width="609" height="2" align="left" valign="top">
      <input name="allergic_id" type="radio" id="allergic_id_1" value="1" <? if( @$allergic == 1 ) { ?>  checked="checked" <? } ?>  />
      ไม่เคย
      <input name="allergic_id" type="radio" id="allergic_id_2" value="2" <? if( @$allergic == 2 ) { ?>  checked="checked" <? } ?>  />
     เคย
        <br />                                   
        ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)..
     <textarea name="allergic_detail" cols="20" rows="1" id="allergic_detail" ><?=@$allergic_detail?>
        </textarea>        </td>
  </tr>



                                                  <tr>
    											  <td align="right" valign="bottom" >ยากันชักที่แพ้ :</td>
                                                       
   												  <td align="left" valign="top">
                                                       
                                                               
                                                               
                                                               <select id="drug_epilepsy_id" name="drug_epilepsy_id" >
                                                               
                                                               
                                                              <?
															      $dr=$this->db->get('drug');
																  foreach($dr->result() as $row)
																  {
																     $drug_id_tb=$row->drug_id;
																	 $drug_tb=$row->drug;
																	 if( @$drug_id == $drug_id_tb )
																	 {
															  ?>
                                                                      <option value="<?=$drug_id_tb?>" selected="selected"><?=$drug_tb?></option>
                                                               <?
															         }
																	 else
																	 {
															  ?>
                                                                      <option value="<?=$drug_id_tb?>" ><?=$drug_tb?></option>
                                                               <?
													 
																	 }
																   }
															   ?>
                                                               </select>
                                                      
                                                      
                                             อื่นๆ ...
                                             <textarea name="drug_epilepsy_detail" cols="20" rows="1" id="drug_epilepsy_detail" ><?=@$drug_epilepsy_detail?>
                                             </textarea></td>
                                                  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >ลักษณะการแพ้ยากันชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                    <select id="nature_drug_epilepsy_id" name="nature_drug_epilepsy_id"  >
                                                    
                                                    
                                                       <?
													       $na=$this->db->get('nature_drug_epilepsy');
														   foreach($na->result() as $row)
														   {
														      $nature_drug_epilepsy_id_tb=$row->nature_drug_epilepsy_id;
															  $nature_drug_epilepsy_tb=$row->nature_drug_epilepsy;
															  if( @$nature_drug_epilepsy_id == $nature_drug_epilepsy_id_tb )
															  {
															  ?>
                                                             <option value="<?=$nature_drug_epilepsy_id_tb?>" selected="selected"><?=$nature_drug_epilepsy_tb?></option>
                                                              <?
															  }
															  else
															  {
															    ?>
                                                                 <option value="<?=$nature_drug_epilepsy_id_tb?>" ><?=$nature_drug_epilepsy_tb?></option>
    
                                                                <?
															  }
														   }
													   ?>
                                                    </select>
                                             อื่นๆ ...
                                             <textarea name="nature_drug_epilepsy_other"  cols="20" rows="1"  id="nature_drug_epilepsy_other"><?=@$Nature_drug_epilepsy_other?>
                                             </textarea></td>
  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >สิ่งกระตุ้นให้เกิดอาการชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                       
                                                       
                                                       <select id="stimulate_epilepsy_id" name="stimulate_epilepsy_id"  >
                                                      <?
													      $st=$this->db->get('stimulate_epilepsy');
														  foreach($st->result() as $row)
														  {
														       $stimulate_epilepsy_id_tb=$row->stimulate_epilepsy_id;
															   $stimulate_epilepsy_tb=$row->stimulate_epilepsy;
															   if( $stimulate_epilepsy_id_tb == @$stimulate_epilepsy_id  )
															   {
															 ?>
                                                                <option value="<?=$stimulate_epilepsy_id_tb?>" selected="selected"><?=@$stimulate_epilepsy_tb?></option>
                                                             <?
															    }
																else
																{
															?>
                                                            <option value="<?=$stimulate_epilepsy_id_tb?>" ><?=@$stimulate_epilepsy_tb?></option>
                                                            <?	
																}
														  }
													  ?>
                                                      </select>
                                                      
                                                      
                                             อื่นๆ ...
                                             <textarea name="stimulate_epilepsy_other" cols="20" rows="1" id="stimulate_epilepsy_other" ><?=@$stimulate_epilepsy_other?>
                                             </textarea></td>
                                                  </tr>
                                                  
                                                  
                     <tr>
                     <td align="right" valign="top">
                     วัน/เดือน/ปี ที่สัมภาษณ์ :                       </td>
                     <td>                     
                     <input name="interview_date" type="text" id="interview_date" size="15" maxlength="15" value="<?=@$interview_date?>"  />                     </td>
                     </tr>  
                     
                     <tr>
                     <td align="right" valign="top">
                     ผู้กรอกข้อมูล :                       </td>
                     <td>                     
                     <input name="interview_name" type="text" id="interview_name" value="<?=@$interview_name?>" size="15" maxlength="30"  />
                     -
                     <input name="interview_lastname" type="text" id="interview_lastname" size="20" maxlength="60" value="<?=@$interview_lastname?>"  />                     </td>
                     </tr>  
                     
                     
<tr>
                     <td colspan="2" align="center" valign="top">
                     
                     
<!--                      <button id="btn_Save">Save</button>
                      <button type="reset"  id="btn_Reset" >Reset</button>                     
-->                       </td>
                     </tr>
                     
                     
                     <tr>
                     <td colspan="2" align="center">
                              <button>Update</button>                     </td>
                     </tr>
</table>

<?=form_close()?>
<!--############################################################# form appendix1  -->



</body>
</html>

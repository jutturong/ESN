<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
   
   $(function()
   {
       		     
	   
	   
	   $("#date_follow_patient").datepicker(
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
													    $('#age').val(ans);
											   }

		   
		   }
		 );
		 
		 
		 	   $("#monitoring_date").datepicker(
	       {
		     
			 			                      changeMonth: true,
								   changeYear: true,
								   dateFormat:'yy-mm-dd',
								 //  showButtonPanel:true,
								  // appendText:'(yyyy-mm-dd)',
								 // minDate:0,
								 
								 /*
								   onSelect:function(dateText)
			                                  { 
														 var  o=$(this).val().split("-");
														 var  current=new Date();
														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
														 var  ans= parseInt( current_year ) -  parseInt(o[0])  ;  
													    $('#age').val(ans);
											   }
								*/			   
											   

		   
		   }
		 );

		 
		 
		 
   }
   );
   
    $(function()
	{
	       
		  //$('#show_app1').load('<?=base_url()?>index.php/appendix/call_appendix1/',{ 'appendix':2,'id_appendix1':'<?=$id_appendix1?>' });
		  $("#save_app2").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });	
		  $("#reset_app2").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });	
		  $("#Chart_view").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  $("#Monitoring_History").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  $("#View_Frequency_of_Seizure_Chart").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  $("#Add").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  $("#View").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  
		   
		   /*  ปุ่มคลิกเพื่อโหลด ตาราง การรักษา progress note
		   $("#load_progress").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } }).click(function()
		       {
			       if( $('#id_appendix1_hid').val() != '' )
				   {
				   			$('#load_progress_note').load('<?=base_url()?>index.php/home/load_progress_note',{ 'HN':$('#HN_app').val() });
				   }
				  
				   return false;
			   }
			);
		    */
			
		  
		   $("#Click_To_Add_Intervention").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
	}
	);
	
	
	


</script>

</head>

<body>

<?
     $fr1=array('ESev1'=>'Same','ESev2'=>'Increase','ESev3'=>'Decrease');  
?>


<!--         ##################### appendix2                    1-->
          <?=form_open('appendix/insert_appendix2')?>
         <table width="898" class="bordertable1">
         
<tr >
    <td height="31" colspan="2" align="center" class="bordertable1"><?=@$heading?>    </td>
  </tr>
       
        
        
        <tr>
        <td colspan="2" align="center" valign="middle">
        
          &nbsp;&nbsp;
          <span id="show_app1">          </span>
          
        
        <?=$this->load->view('form_insert/_app1')?>        </td>
        </tr>         
         
         
         
         
         

 <!--       
                                             <tr>
         <td width="513" align="right" valign="top">
         วัน-เดือน-ปี ที่่ติดตามผู้ป่วย :                </td>
         <td width="373">
           <input name="date_follow_patient" type="text" id="date_follow_patient" size="10" maxlength="10" /></td>
         </tr>

         
                                                      <tr>
         <td align="right" valign="top">
         จำนวนของอาการชักในช่วง 1 เดือนที่ผ่านมา (ครั้ง/เดือน) :                </td>
         <td>
           <input name="count_ep" type="text" id="count_ep" size="10" maxlength="4" />          </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input name="compare_lasttime" type="text" id="compare_lasttime" size="10" maxlength="4" />          </td>
         </tr>



                                                      <tr>
         <td align="right" valign="top">
         ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input name="ep_lasttime" type="text" id="ep_lasttime" size="10" maxlength="5" />           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         น้ำหนัก (กิโลกรัม) :                </td>
         <td>
           <input name="weight" type="text" id="weight" size="10" maxlength="4" />           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระดับยาในเลือด :                </td>
         <td>
           <input name="medicine_level" type="text" id="medicine_level" size="10" maxlength="50" />           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ยาที่ได้รับ :                </td>
         <td>
           <input name="medicine" type="text" id="medicine" size="10" maxlength="50" />           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ปัญหาการใช้ยาที่เกิดขึ้น :                </td>
         <td>
           <input name="problem" type="text" id="problem" size="10" maxlength="50" />
		              </td>
         </tr>
		--> 
		 

		 <tr>
		 <td colspan="2" align="left" valign="middle">
		 <font size="+1">
		 &nbsp;&nbsp;&nbsp;<font color="#FF0000">Appendix 2.1 Monitoring</font>
		 </font>
		 </td>
		 <td align="center" valign="middle">
		 </td>
		 </tr>
		 
		 		 <tr>
		     <td colspan="2" align="center">		
		         <button id="View_Frequency_of_Seizure_Chart" >View Frequency of Seizure Chart</button>
			
			
			</td>
			
		 </tr>
		 
		 <tr>

		
		<!--
		 <tr>
		     <td colspan="2">		
			</td>
		 </tr>
		 -->
		 
		 <tr>
		      <td colspan="2">
			  Frequency (time/month) :	
			  <input type="text" size="10" maxlength="1" />	
 		   </td>
		 </tr>
		 
		 				 		 <tr>
		      <td colspan="2" align="center">
			  Clinical Response
 		   </td>
		 </tr>

				
				 <tr>
		      <td colspan="2">
			  Duration of Attack :	
			  <select id="Duration_of_Attack" name="Duration_of_Attack">
			         <option value="" id="Duration_of_Attack" >:: select ::</option>
					 <?
					     while(list($key,$value) = each($fr1) )
						 {
						    ?>
							    <option value="<?=$key?>"><?=$value?></option>
							<?
						 }
					 ?>
			  </select>
 		   </td>
		 </tr>
		 
		 		 		 <tr>
		      <td colspan="2">
			  Severity of Attack :	
			  			  <select id="Severity of Attack" name="Severity of Attack">
			         <option value="">:: select ::</option>
					 <option value="ESev1">Same</option>
					 <option value="ESev2">Increase</option>
					 <option value="ESev3">Decrease</option>
			  </select>
	
 		   </td>
		 </tr>


		 <tr>
		 <td colspan="2" align="left" valign="middle">
		 <font size="+1">
		 &nbsp;&nbsp;&nbsp;<font color="#FF0000">Appendix 2.2 Progress and Action</font>
		 </font>
		 </td>
		 <td align="center" valign="middle">
		 </td>
		 </tr>
		 
		 
		 		 <tr>
		 <td colspan="2" align="left" valign="middle" >
		 <font size="+1">
		 &nbsp;&nbsp;&nbsp;Progress Note
		 </font>
		 </td>
		 </tr>

		 
		 
		 <tr>
		     <td colspan="2">		
		       <textarea cols="30" rows="3"></textarea>
			
			
			</td>
			
		 </tr>
		 
		 		 <tr>
		     <td colspan="2" align="center">	
			 
			 <!-- //ปุ่มโหลด progress note
			 <button id="load_progress" >load progres note</button>
			  -->	
				
				
			   <!--
		       <table width="638" border="1" style="border-collapse:collapse ">
			   <tr>
			   <td width="122" height="25" align="center">Date</td>
			    <td width="198" height="25" align="center">Form</td>
				  <td width="240" height="25" align="center">Progress Note</td>
			   </tr>
			   
						   
						   <tr>
			   <td width="122" height="25" align="center">&nbsp;</td>
			    <td width="198" height="25" align="center">&nbsp;</td>
				  <td width="240" height="25" align="center">&nbsp;</td>
			   </tr>
			   
			   </table>
			   -->
			   
			   <span id="load_progress_note"></span>
			    
			
			
			
			</td>
			
		 </tr>

		 
		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		 <font size="+1">
		 &nbsp;&nbsp;&nbsp;ADRs
		 </font>
		 </td>
		 </tr>
		 
		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;ADRs : &nbsp;
		 
		 <select id="ADRs" name="ADRs">
		      <?
			      foreach($adr->result() as $row)
				  {
				          $ADRs=$row->ADRs;
					      $ADRsType=$row->ADRsType
					  ?>
					     <option value="<?=$ADRs?>"><?=$ADRs?> -- <?=$ADRsType?></option>
					  <?
				  }
			  ?>
		 </select>   
		 
		 <button id="View" >View</button>  <button id="Add" >Add</button>
		
		 </td>
		 </tr>
		 
		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Detail : &nbsp; <input type="text" size="100" maxlength="100" />	  
		
		 </td>
		 </tr>


		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Action : &nbsp;  <input type="radio" id="" name="" /> Prevent <input type="radio" id="" name="" /> Correct
		
		 </td>
		 </tr>
		 
		 
		 		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Intervention : &nbsp; <button id="Click_To_Add_Intervention" >Click To Add Intervention</button>  
		
		 </td>
		 </tr>
		 
		 
		 		 		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Result : &nbsp; <input type="radio" id="" name="" /> Resolved  <input type="radio" id="" name="" /> Improved 
		 <br />
		 <input type="radio" id="" name="" /> Not Improved   <input type="radio" id="" name="" /> N/A 
		 <br />
		 <textarea cols="50" rows="3"></textarea>
		
		 </td>
		 </tr>







		 


		       
		 

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="save_app2" >Save</button>
                      <button type="reset"  id="reset_app2">Reset</button>                      </td>
                     </tr>
</table> 
<?=form_close('')?>                  
 <!--         ##################### appendix2                    1-->                            



</body>
</html>

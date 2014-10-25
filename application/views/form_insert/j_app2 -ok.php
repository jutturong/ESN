<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
    function  calculate_frequency() //คำนวณ ค่าความถี่ในการชัก
	{
		 
		// if( $('#hid_value').val() > 0 )  //query จาก  select * from   `04-monitoring`   where   `Clinic`  ='Epilepsy C'  and `Lab`=64  and  HN='$HA' order by `MonitoringDate` asc  ;


				// var   a1=$('#hid_value').val()  - $('#frequency').val();
				// var   a2=Math.abs( a1/$('#hid_value').val() )  * 100 ;
				// var   a2=a1/$('#hid_value').val()   * 100 ;
				 //var    a3=a2*100;
				 // alert('Clinical Response : ' + a2.toFixed(0) + '%' );
				 
				 //$('#hid_value').val();  ---> เป็นค่าในครั้งก่อน
				 //$('#frequency').val() -->เป็นค่าครั้งหลัง
				 
				
				 var  a1=$('#frequency').val()/$('#hid_value').val();
				 var  a2=a1*100;
				 var  a3=100-a2;
				 
				 var   v1= $('#frequency').val() - $('#hid_value').val();
				 
				 //alert(''+v1);
				 
				      if( $('#frequency').val() == 0  &&  $('#hid_value').val() == 0 )
					  {
					     v1=0;
					  }
				 
				 /*
				 วิธีคิดของก็อปไม่ถูกครับ......ต้องใช้วิธีคิดแบบนี้
วิธีที่ 1. ใช้ เิดิม 80 ใหม่ 20 แสดงว่าดีขึ้น วิธีคิด ให้คิด 80-20 = 60
= 60/80*100 = 75%
สรุปว่า ดีขึ้น 75 %

วิธีที่ 2. ใช้เิดิม 80 ใหม่ 20 แสดงว่าดีขึ้น วิธี่คิด ให้คิด ดังนี้ 
20/80*100 = 25 % (ใน 100 %)
ต้องเอา 100% - 25% =75 % 
(ต้องเทีัยบใน 100% ของการชักทั้งหมด)

แล้วใช้ค่าที่ได้ไปเทียบตารางว่าคืออะไร
				 */
				 
				 if( v1 == 0 )
				 {
				       $('#clinic_response').val('Seizure free');
					   // $('#clinic_response').innerHTML='Seizure free';
						//alert(''+v1);
					 //$('#a_c').innerHTML='Seizure free';
				 }
				 
				else
				{				
						 if( a3 >=0   )
						 {
							 if( a3 > 50 )
							 {
								  $('#clinic_response').val('Marked Improvement');
								  // $('#clinic_response').innerHTML='Marked Improvement';
								  
							 }
							 else if( a3 >= 25 ||  a3 <= 50 )
							 {
								  $('#clinic_response').val('Moderated Improvement');
								 // $('#clinic_response').innerHTML='Moderated Improvement';
							 }
							 else
							 {
								  $('#clinic_response').val('Same');
								  //$('#clinic_response').innerHTML='Same';
							 }
						 }
						 else
						 {
							 if( a3 < - 25   )
							 {
								 $('#clinic_response').val('Worse'); 
								  //$('#clinic_response').innerHTML='Worse';
							 }
							 else
							 {
								 $('#clinic_response').val('Same');
								//$('#clinic_response').innerHTML='Same';
							 }
						 }
				}				 
				  
				  
				  /*
				  if( a2 == 0 )
				  {
				     $('#clinic_response').val('Seizure free');
				  }
				  else if( a2 < 25 )
				  {
					  $('#clinic_response').val('Same');
				  }
				  else if( a2 >= 25 || a2   <= 50 )
				  {
					   $('#clinic_response').val('Moderated Improvement');
				  }
				   else if( a2 > 50 )
				  {
					   $('#clinic_response').val('Marked Improvement');
				  }
				  */
				  
				  
		  
		  

	}
	
	$(function()  // event กด enter สำหรับ   ความถี่ในการชักของผู้ป่วย
	     {
		    $('#frequency').keypress(function(event)
			   {
					if( event.which == 13 )
					{
					   if( $(this).val() >= 0 )
					   {
					      
						  calculate_frequency();
						 
					   }	
					   
					   
					    return false;
					}
					
			   });
						 
		 }
	  );
	  
	  $(function()
	  {
	     $('#frequency').click(function(){   $('#frequency').val('');  })
	  }
	  );	 
   
    $(function() //เพิ่ม function ใหม่ปรับปรุงโปรแกรม 16/9/55 
	   {
	      $( "#tabs-progess" ).tabs(); //tab progress
		  $( "#tab-monitoring" ).tabs();
	   }
	  );  

   
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
		 &nbsp;&nbsp;&nbsp;<font color="#FF0000">Monitoring</font>
		 </font>
		 </td>
		 </tr>
			 
			 <tr>
			 <td>
			 <div id="tab-monitoring">
	<ul>
		<li><a href="#tab-monitoring-1">Epilepsy clinic</a></li>
		
		<!--
		<li><a href="#tab-monitoring-2">Proin dolor</a></li>
		<li><a href="#tab-monitoring-3">Aenean lacinia</a></li>
		-->
		
	</ul>
	<div id="tab-monitoring-1">
<table width="842">
<tr>
<td width="681" colspan="2" align="center">		
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
			  <input name="frequency" type="text" id="frequency" style="text-align:center " size="5" maxlength="3"/>  <span id="monitoring_04_value"></span>	
 		   </td>
		 </tr>
		 
		 				 		 <tr>
		      <td colspan="2" align="left">
			  Clinical Response
: 
			   
			    <input name="clinic_response" type="text" id="clinic_response" readonly="true" size="30" maxlength="20" style="color:#009999 " />
				
				
				<!--
				<span  id="a_c" name="a_c"></span>
				-->
				
				
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
</table>
	
	
	</div>
	
	<!--
	<div id="tab-monitoring-2">
2
	</div>
	<div id="tab-monitoring-3">
3
	</div>
	-->
	
</div>
			</td>
			 </tr>



		
		 
		 
		 
		 		 


		 <tr>
		 <td colspan="2" align="left" valign="middle">
		 <font size="+1">
		 &nbsp;&nbsp;&nbsp;<font color="#FF0000">Progress and Action</font>
		 </font>
		 </td>
		 <td align="center" valign="middle">
		 </td>
		 </tr>
		 
		 <tr>
		 <td>
		<div id="tabs-progess">
	<ul>
		
		<li>
		<a href="#tabs-progess-1">
					ADRs
		</a>
		</li>
		
		
		<li><a href="#tabs-progess-2">
		             Progress Note
		</a></li>
		
	</ul>
	<div id="tabs-progess-1">
	
<!--  ADR --->	
    <!-- <div id="div_ADR">-->
 <!--  ADR --->		
 
 <table>

<tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;ADRs : &nbsp;
		 
		 <select id="ADRs" name="ADRs">
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

	
	</div>
	<div id="tabs-progess-2">
          
		<table>
		<tr>
		  <td>
		  <button id="add_progess">
		      เพิ่มข้อมูล
		   </button>
		  </td>
		 </tr>
		 <tr>
		    
			<td>
			 <span id="load_progress_note"></span>
			 </td>
		</tr>
		</table> 
		
	</div>
</div>
		 </td>
		 </tr>
		 
		 
		 		

		 
		 
		
		 
		 		 

		 
		 		 
		 
		 		 		 
</table> 




<?=form_close('')?>                  
 <!--         ##################### appendix2                    1-->                            



</body>
</html>

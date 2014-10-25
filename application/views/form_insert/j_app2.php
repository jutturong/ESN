<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<?
  $this->load->view('monitoring/epilepsy');
  ?>


<script type="text/javascript">
 
/*
  function  fill2_()
  {
          $('#clinic_response').val('test');
  
  }
*/

$(function()
   {
            
			
/*			   $('#load_form1').click(function()
			               {
								  window.open('<?=base_url()?>index.php/monitoring/load_ep2','popup','toolbar=0,location=0,resizeable=0,directories=0,menubar=0,scrollbars=0,status=0,width=500,height=500');
						   }
				 );
*/				 
				 
   }
   );

   $(function()
   {
//------------------------------------- การคำนวณค่าของ clinic response ----------------------------------------------------------------------
					  $(function()
					  {
						 $('#frequency').click(function(){   $('#frequency').val('');  })
					  }
	  );	 

	$(function()  // event กด enter สำหรับ   ความถี่ในการชักของผู้ป่วย
	     {
		    $('#frequency').keypress(function(event)
			   {
					
					/*
					if( event.which == 13 )
					{
									
												  if( $(this).val() >= 0 )
												   {
													  
														   // calculate_frequency();
														   //var  a1;
														   //  var   a1=$("#value_epi").val();  //คร้้งเดิม
														   //var  a2;
														   //var   a2=$("#frequency").val();   //ครั้งนี้
														   
														   //cal_free2();
															 alert('t');
													 
												   }	
									 
					  							  alert('t');
					   
					    return false;
					}
					*/
						  alert('t');
					
			   });
						 
		 }
	  );

    
	function  cal_free2()
	{
	           alert('tesing alert');
	
	}
	
	function  calculate_frequency() //คำนวณ ค่าความถี่ในการชัก
	{
				
			   //value_epi    = a1  เดิม
			   //frequency   = a2   ใหม่
			   
			   
				/*
				 var  a1=$('#frequency').val()/$('#hid_value').val();
				 var  a2=a1*100;
				 var  a3=100-a2;
				 var   v1= $('#frequency').val() - $('#hid_value').val();
				      if( $('#frequency').val() == 0  &&  $('#hid_value').val() == 0 )
					  {
					     v1=0;
					  }
				 if( v1 == 0 )
				 {
				       $('#clinic_response').val('Seizure free');
				 }
				 
				else
				{				
						 if( a3 >=0   )
						 {
							 if( a3 > 50 )
							 {
								  $('#clinic_response').val('Marked Improvement');
							 }
							 else if( a3 >= 25 ||  a3 <= 50 )
							 {
								  $('#clinic_response').val('Moderated Improvement');
							 }
							 else
							 {
								  $('#clinic_response').val('Same');
							 }
						 }
						 else
						 {
							 if( a3 < - 25   )
							 {
								 $('#clinic_response').val('Worse'); 
							 }
							 else
							 {
								 $('#clinic_response').val('Same');
							 }
						 }
				}	
				*/		
				
				
							   //value_epi    = a1  เดิม
			   //frequency   = a2   ใหม่
                            //     var   a1=$("#value_epi").val();  //คร้้งเดิม
							//	 var   a2=$("#frequency").val();   //ครั้งนี้
								  
								 /*
								 var   cal2;
								 cal1=  (a2/a1)*100;
								 cal2=100-cal1;
								 */
								 
							//	 var   cal1;
								// cal1=a2-a1;
								
								//cal1  =   a2.parseInt(a2) -  a1.parseInt(a1);
								
								//alert('test');
								 
								 /*
							 if(  cal1 == 0 )  //ไม่มีการชัก
								 {
								       //$('#clinic_response').val('Seizure free');
										$('#clinic_response').val(''+a2);
						         }
								 */
					 
	}
//--------------------------------------------------------------------------------------------------------------------------------------------------------	 
	 
	 
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
		  //$("#save_app2").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });	
		  //$("#reset_app2").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });	
		  $("#Chart_view").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		 // $("#Monitoring_History").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  
		   $("#View_Frequency_of_Seizure_Chart").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } }); // chart   epilepsy
		   


                //$("#load_epilepsy").button({ text:true,icons:{  } }).click(function()
		    $("#load_epilepsy").click(function()
			                  {  
														if(  $('#HN_app').val()   != '' )
														 {
															 $('#load_epilepsy').load('<?=base_url()?>index.php/monitoring/load_epilepsy',{ 'HN':$('#HN_app').val() });
														 }
													 else
													 {
														   $( "#dia_confirm1" ).dialog(
																 {
																		 autoOpen:true,
																		 show:"blind",
																		 hide:"explode",
																		 height:200,
																		 modal:true,
																								 buttons:{
																												"ตกลง":function(){
																													  $(this).dialog("close");
																													  $("#HN_app").focus();
																													
																												}
																					  }
																 }
																 
																									);
													 }	
									  		 $('#load_epilepsy').load('<?=base_url()?>index.php/monitoring/load_epilepsy',{ 'HN':$('#HN_app').val() });
									return  false;
							   });  // โหลดหน้า epilepsy		      
			                         

			
	   		   
		  
		//  $("#Add").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  //$("#View").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  
		   
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

	

/*
	$("#load_epilepsy").click(function()
	                   {  
					          //alert('t'); 
							     $('#load_epilepsy').load('<?=base_url()?>index.php/monitoring/load_epilepsy',{ 'HN':$('#HN_app').val() });
					    }
						                         );		
*/
	
	
	$("#load_epilepsy").click(function()
	         {
			       
				if(  $('#HN_app').val()   != '' )
									 {   
														  $('#dialog-epilepsy').dialog(
																 {
																		  width:700,
																		  height:350,
																		  modal:true,
																		  resizable:false,
																		  buttons:{
																		  
																		  
																						 }
																 }
															  );
														                         //    $('#load_epilepsy').load('<?=base_url()?>index.php/monitoring/load_epilepsy',{ 'HN':$('#HN_app').val() });
																				
																				
																				 $.ajax({  
																				                     type:'POST',
																									 url:'<?=base_url()?>index.php/monitoring/load_epilepsy',
																									 data:{   'HN':$('#HN_app').val()   },
																									 dataType:'json',
																									 success:function(data)
																									 {
																									        $.each(data,function(index,element)
																											                     {
																																       $('body').appen($('<span>',{  text:element.test1 }));
																																 }
																														 );		 
																									 }
																				 
																				 			 });
																							 
																							 
					          			}
				else
															 {
																   $( "#dia_confirm1" ).dialog(
																		 {
																				 autoOpen:true,
																				 show:"blind",
																				 hide:"explode",
																				 height:200,
																				 modal:true,
																				 buttons:{
																								"ตกลง":function(){
																																						 		 $("#dia_confirm1").dialog("close");
																																								 $("#HN_app").focus();
																								}
																							  }
																		 }
																		 
																											);
															 }						
										
					 
			 }
	   );
	   
	   		 
		  
		   $("#Click_To_Add_Intervention").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
	}
	);
	

//-------------------------- function  tab  ปรับปรุง 2/12/55
$(function() 
					{
						$( "#tabs-monitorong" ).tabs();
						$('#tabs-progress').tabs();
					}
);


</script>

</head>

<body>

<?	  //ค่า query  ใน epilepsy  ของการ select   Duration of Attack,Severity of  Attack
    		  $ep_select=$this->db->query("SELECT * from   `labcode`      where     `Code`  in('ESev1','ESev2','ESev3');");
			  foreach(  $ep_select->result() as $row)
			  {
			          $code_tb[]=$row->Code;
				      $lab_tb[]= $row->LabDetail;
			  }
?>

<div id="dia_confirm1" title="ESN check!!" style="display:none">
     ให้ระบุ HN ของคนไข้ก่อน
</div>

<?
     $fr1=array('ESev1'=>'Same','ESev2'=>'Increase','ESev3'=>'Decrease');  
?>


<!--         ##################### appendix2                    1-->
          <?=form_open('appendix/insert_appendix2')?>
         <table width="898" class="bordertable1" >
         
<tr >
    <td height="31" colspan="2" align="center" class="bordertable1"><?=@$heading?>    </td>
  </tr>
       
        
        
        <tr>
        <td colspan="2" align="center" valign="middle">
        
          &nbsp;&nbsp;
          <span id="show_app1">          </span>
          
        
        <?=$this->load->view('form_insert/_app1')?>       
         </td>
        </tr>         
         
         
         
         
         

		 
             
			 <tr>
                                 <td colspan="2" align="left" valign="middle">
                                 <font size="+1">
                                 &nbsp;&nbsp;&nbsp;<font color="#FF0000">Monitoring</font>
                                 </font>
                                 </td>
		 </tr>
			 
        <tr>
                   <td>
                   
                   
                   <div id="tabs-monitorong">
                                        <ul>
                                            <li><a href="#tabs-1" id="load_epilepsy">Epilepsy Clinic</a></li>
                                            <li><a href="#tabs-2-EEG">EEG</a></li>
                                            <li><a href="#tabs-3-Imaging">Imaging</a></li>
                                             <li><a href="#tabs-4-General">General</a></li>
                                             <li><a href="#tabs-5-Blood">Blood</a></li>
                                             <li><a href="#tabs-6-chem1">Chem.1</a></li>
                                              <li><a href="#tabs-7-chem2">Chem.2</a></li>
                                        </ul>
                                        <div id="tabs-1">
                                        
                                         <!--  <a href="#" id="load_form1">Load form</a>-->
														   <?   
                                                                  // $this->load->view('monitoring/load_epi');
																  //epilepsy
																 // $this->load->view('monitoring/epilepsy');
                                                            ?>

                                                 <?  
												// echo anchor('monitoring/load_epilepsy', 'Load Epilepsy', array('target' => '_blank', 'class' => 'new_window'));   
												$atts = array(
																					  'width'      => '800',
																					  'height'     => '600',
																					  'scrollbars' => 'yes',
																					  'status'     => 'no',
																					  'resizable'  => 'no',
																					  'screenx'    => '50',
																					  'screeny'    => '50'
          															  ); 
																			
																			
																			 echo anchor_popup('monitoring/form_epilepsy/', 'Load Epilepsy', $atts);
												 
												 ?>         
                                     			 <!--  <span id="load_epilepsy"></span>-->
                                                 <form action="<?=base_url()?>index.php/monitoring/load_ep" method="get">
                                                       <button>test</button>
                                                 </form>
                                                 
                                        </div>
                                     <div id="tabs-2-EEG">
												 <?=$this->load->view('monitoring/EEG')?>                                          
                                     </div>
                    				 <div id="tabs-3-Imaging">
													<?=$this->load->view('monitoring/imaging')?>
                    				 </div>
                                      <div id="tabs-4-General">
												    <?=$this->load->view('monitoring/general')?>	
                    				 </div>
                                      <div id="tabs-5-Blood">
												    <?=$this->load->view('monitoring/blood')?>	
                    				 </div>
                                     <div id="tabs-6-chem1">
                                     			    <?=$this->load->view('monitoring/chem1')?>	
                                     </div>
                                     <div id="tabs-7-chem2">
                                     			    <?=$this->load->view('monitoring/chem2')?>	
                                     </div>

                    </div>
                   
                   </td>
        </tr>


		
		 
		 
		 
		 		 


		 <tr>
                             <td colspan="2" align="left" valign="middle">
                             <font size="+1">
                             &nbsp;&nbsp;&nbsp;<font color="#FF0000">Progress and Action</font>
                             </font>
                             </td>
            </tr>                 
                             <td colspan="2">
                             
                             
                             
  <div id="tabs-progress">
    <ul>
        <li><a href="#tabs-p1">Progress Note</a></li>
       <!-- <li><a href="#tabs-p2">Proin dolor</a></li>-->
       <!-- <li><a href="#tabs-p3">Aenean lacinia</a></li>-->
    </ul>
    <div id="tabs-p1">
           <span id="load_progress_note"></span>
	 </div>
<!--    <div id="tabs-p2">
2    
</div>
    <div id="tabs-p3">
3    
</div>
-->

</div>                           
                             
                             
                             </td>
		 </tr>
		 
		 		 

		 
		 		 
		 
		 		 		 
</table> 




<?=form_close('')?>                  



</body>
</html>

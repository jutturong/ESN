<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>


<script type="text/javascript">
	$(function() {
		$("#tabs_monitoring").tabs();
	});
</script>

<script type="text/javascript">

	
	
	 $('#HN_ep').click(function()
				{
											$(this).val('');
											$('#frequency').val('');
				}
	);
	
	$('#call_ep').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------epilepsy clinic  tab1
	      { 
		         // alert('t');   
				//$('#load_log_ep_value').load('<?=base_url()?>index.php/loadtable/load_epi');
				
//				$.post('<?=base_url()?>index.php/loadtable/load_epi',{HN:$('#HN_ep').val()  },function(data,success)
//				{    
//				        // $('#load_log_ep_value').load('<?=base_url()?>index.php/loadtable/load_epi  #log_ep');
//				}
//				);
				
				
				//$("#load_log_ep_value").load('<?=base_url()?>index.php/loadtable/load_epi/'+  $('#HN_ep').val()  +'  #log_ep');
				$("#load_log_ep_value").load('<?=base_url()?>index.php/loadtable/load_epi/'+  $('#HN_ep').val());  //ปรับปรุง
		       	//	$("#load_ep_value").load('<?=base_url()?>index.php/epi/query_ep',{  'HN':$("#HN_ep").val() }); //อันเดิมที่จะโหลดไปหน้า tab EP
				    return false; 
		   }
	);
	
	
		$('#call_eeg').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------EEG  tab2
	      { 
		         //alert('t');   
				//load_log_eeg_value
				//load_eeg
				//$("#load_log_eeg_value").load('<?=base_url()?>index.php/loadtable/load_epi/'+  $('#HN_ep').val());
					//$("#load_log_eeg_value").load('<?=base_url()?>index.php/loadtable/load_eeg/'+  $('#HN_ep').val()); //function ที่ปรับปรุง
								  //===== เพิ่ม function ใหม่================
									var  link_='<?=base_url()?>index.php/epi/query_imaging'; //ของเดิม
									//var  link_='//epi//query_eeg/';
									var   id_div='#load_eeg_value';
									//$("#load_log_eeg_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div );  //ของเดิม
									$("#load_log_eeg_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  });

				    return false; 
		   }
	);



		$('#call_image').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				//$("#load_image_value").load('<?=base_url()?>index.php/epi/query_imaging',{  'HN':$("#HN_ep").val() });//ของเดิม
					//$("#load_log_image_value").load('<?=base_url()?>index.php/loadtable/load_image/'+  $('#HN_ep').val());  //ของปรับปรุง
					//===== เพิ่ม function ใหม่================
									var  link_='<?=base_url()?>index.php/epi/query_imaging';
									var   id_div='#load_image_value';
								//	$("#load_log_image_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div );  //ของเดิม
				            	$("#load_log_image_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  });
				    return false; 
		   }
	);


		$('#call_general').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				//$("#load_general_value").load('<?=base_url()?>index.php/epi/query_general',{  'HN':$("#HN_ep").val() });//--ของเดิม
				var  link_='<?=base_url()?>index.php/epi/query_general';
				var   id_div='#load_general_value';
					   //alert(''+link_);
						//alert(''+ id_div  );
				//$("#load_log_general_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div ); //ของเดิม
				//  $("#load_log_general_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); //ของเดิม
				   $("#load_log_general_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); 
				    return false; 
		   }
	);
	
	
			$('#call_blood').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				//$("#load_blood_value").load('<?=base_url()?>index.php/epi/query_blood',{  'HN':$("#HN_ep").val() });//ของเดิม
								var  link_='<?=base_url()?>index.php/epi/query_blood';
			                	var   id_div='#load_blood_value';
									//$("#load_log_blood_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div );//ของเดิม
								$("#load_log_blood_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); 
				    return false; 
		   }
	);
	

				$('#call_chem1').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
				  { 
						 //alert('t');   
						//$("#load_chem1_value").load('<?=base_url()?>index.php/epi/query_chem1',{  'HN':$("#HN_ep").val() }); //ของเดิม
										var  link_='<?=base_url()?>index.php/epi/query_chem1';
										var   id_div='#load_chem1_value';
										//$("#load_log_chem1_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div );//ของเดิม
										$("#load_log_chem1_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); 
							return false; 
				   }
				);


		$('#call_chem2').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				//$("#load_chem2_value").load('<?=base_url()?>index.php/epi/query_chem2',{  'HN':$("#HN_ep").val() }); //ของเดิม
										var  link_='<?=base_url()?>index.php/epi/query_chem2';
										var   id_div='#load_chem2_value';
										//$("#load_log_chem2_value").load('<?=base_url()?>index.php/loadtable/load_switch/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div );//ของเดิม
									$("#load_log_chem2_value").load('<?=base_url()?>index.php/loadtable/load_switch/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); 	
				    return false; 
		   }
	);
	
	
	
	$('#drug_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				//$("#drug_span").load('<?=base_url()?>index.php/epi/drug_load',{  'HN':$("#HN_ep").val() }); //ของเดิม
					                var  link_='<?=base_url()?>index.php/epi/drug_load';
									var   id_div='#drug_span';
								  // $("#drug_log_span").load('<?=base_url()?>index.php/loadtable/load_drug/'+  $('#HN_ep').val()  + '/'+ link_  +  '/' + id_div ); //ของเดิม
								//$("#drug_log_span").load('<?=base_url()?>index.php/loadtable/load_drug/',{  'HN':$('#HN_ep').val(),'link_': link_,'id_div':id_div  }); 	 //ของเดิมก่อนเพิ่ม HN_tdm	
								   $("#drug_log_span").load('<?=base_url()?>index.php/loadtable/load_drug/',{  'HN':$('#HN_tdm').val(),'link_': link_,'id_div':id_div  }); 	 //ของเดิมก่อนเพิ่ม HN_tdm	
				    return false; 
		   }
	);




</script>


<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#noncompliance_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#compliance_log_span").load('<?=base_url()?>index.php/loadtable/load_noncompliance/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>


<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#adr_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#adr_log_span").load('<?=base_url()?>index.php/loadtable/load_adr/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>


<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#medication_error_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#medication_error_log_span").load('<?=base_url()?>index.php/loadtable/load_medication_error/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>



<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#other_drps_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#other_drps_log_span").load('<?=base_url()?>index.php/loadtable/load_other_drps/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>

<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#progress_note_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#progress_note_log_span").load('<?=base_url()?>index.php/loadtable/load_progress_note/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>



<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#give_information_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#give_information_log_span").load('<?=base_url()?>index.php/loadtable/load_give_information/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>





<script type="text/javascript">
$(function()
{
//$('#noncompliance_button').button({});
$('#epilepsy_history_button').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	   { 
		 $("#epilepsy_history_log_span").load('<?=base_url()?>index.php/loadtable/load_epilepsy_history/'+  $('#HN_ep').val()); //ตัวอย่างสำหรับการทดสอบ
		 return false; 
	   }
	);
});
</script>


 <script>
$(function() {
$( "#accordion" ).accordion();
});
</script>
    
<script type="text/javascript">

//=============================== autocomplete ==Epilepsy clinic=========================================
//			function fill_ep(thisValue,frequency) 
//			{
//					$('#HN_ep').val(thisValue);
//					//$('#frequency').val(frequency);
//				    setTimeout("$('#suggestions_ep').hide();", 200);
//			}	
			
		function fill_ep(thisValue) 
			{
					$('#HN_ep').val(thisValue);
					//$('#frequency').val(frequency);
				    setTimeout("$('#suggestions_ep').hide();", 200);
			}		
	
	
 function lookup_ep(inputString)
	{ 
				if( $('#HN_ep').val().length == 0 )
				{
				   $('#suggestions_ep').hide();
				}
						else{
												$.ajax({
													type:'POST'
												  // ,url:'<?=base_url()?>index.php/project/autocomplete'
												  // ,url:'<?=base_url()?>index.php/home/autocomplete_HN'
												   //,url:'<?=base_url()?>index.php/home/app_autocomplete_HN'
													,url:'<?=base_url()?>index.php/epi/auto_epi'
												   ,data:'HN=' + $('#HN_ep').val()
												   ,success:function(data){
														$('#suggestions_ep').show();
														$('#autoSuggestionsList_ep').html(data); 
												   }
												}
												);
									}
	}					  		
//=============================== autocomplete ==Epilepsy clinic=========================================
</script>    


<script type="text/javascript">
$(function()  //=============================HN TDM
{
	 $('#HN_tdm').click(function()
				{
											$(this).val('');
										//	$('#frequency').val('');
				}
	);
}
);
</script>



<script type="text/javascript">   //==============auto complete TDM======================
		function fill_tdm(thisValue) 
			{
					$('#HN_tdm').val(thisValue);
					//$('#frequency').val(frequency);
				    setTimeout("$('#suggestions_tdm').hide();", 200);
			}		
	
	
 function lookup_tdm(inputString)
	{ 
				if( $('#HN_tdm').val().length == 0 )
				{
				   $('#suggestions_tdm').hide();
				}
						else{
												$.ajax({
													type:'POST'
												  // ,url:'<?=base_url()?>index.php/project/autocomplete'
												  // ,url:'<?=base_url()?>index.php/home/autocomplete_HN'
												   //,url:'<?=base_url()?>index.php/home/app_autocomplete_HN'
													,url:'<?=base_url()?>index.php/epi/auto_tdm'
												   ,data:'HN=' + $('#HN_tdm').val()
												   ,success:function(data){
														$('#suggestions_tdm').show();
														$('#autoSuggestionsList_tdm').html(data); 
												   }
												}
												);
									}
	}					  		
</script>



 
</head>

<body>


<?
echo form_fieldset(' ระบบค้นผู้ป่วย ');
?>

<table>
                        <tr>
                        <td width="410" > <?=nbs(3)?>  HN  : 
                          <input name="HN_ep" type="text" onblur="fill_ep();" onkeyup="lookup_ep(this.value);"    id="HN_ep" size="20" maxlength="6" class="search" />  
                        </td>
  </tr>
<tr>
                        <td>
<!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_ep" style="display: none; margin-left:400px;" align="left" >
				 <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_ep">
                </div>
 </div>
<!--============================= autocomplete-->
                        </td>
                        </tr>
                        
                        
</table>

<?
echo form_fieldset_close(); 
?>

<!-- end div tab-->



<div id="accordion">

<h3>Monitoring</h3>
<div>


<!--####section1-->



<div id="tabs_monitoring">
                                                                    <ul>
                                                                        <li><a href="#Epilepsy_Clinic">Epilepsy Clinic</a></li>
                                                                        <li><a href="#EEG">EEG</a></li>
                                                                         <li><a href="#Imaging">Imaging</a></li>
                                                                         <li><a href="#General">General</a></li>
                                                                         <li><a href="#Blood">Blood</a></li>
                                                                        <li><a href="#chem1">Chem.1</a></li>
                                                                        <li><a href="#chem2">Chem.2</a></li>
                                                                        <li><a href="#drug_div">Drug level</a></li>
                                                                        <li><a href="#non_compliance">Non Compliance</a></li>
																		<li><a href="#adr">ADRs</a></li>
																		<li><a href="#medication_error">Medication error</a></li>
																		<li><a href="#other_drps">Other DRPs</a></li>
																		<li><a href="#progress_note">Progress Note</a></li>
																		<li><a href="#give_information">Give Information</a></li>
																		<li><a href="#epilepsy_history">Epilepsy History</a></li>
                                                                    </ul>
																	
																	
																	
                                                                    
<div id="Epilepsy_Clinic">
<table width="842">
                         <tr>
                         <td><button id="call_ep">Load Epilesy Clinic</button></td>
                         </tr>               
                        <tr>
                        <td>
                           <span id="load_log_ep_value"></span>
                           <span id="load_ep_value"></span>
                        </td>
                        </tr>
 </table>
</div>


    
    
  
    
                               
<div id="EEG">
                                
<table width="842">
                         <tr>
                         <td><button id="call_eeg">Load EEG</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                         <span id="load_log_eeg_value"></span> 
                          <span id="load_eeg_value"></span>
                        </td>
                        </tr>
 </table>
                             
</div>
                                
                                
                                
<div id="Imaging">

<table width="842">
                         <tr>
                         <td><button id="call_image">Load Imaging</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                        <span id="load_log_image_value"></span>
                          <span id="load_image_value"></span>
                        </td>
                        </tr>
 </table>

 </div>
                                
                                
<div id="General">
<table width="842">
                         <tr>
                         <td><button id="call_general">Load General</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                          <span id="load_log_general_value"></span>
                          <span id="load_general_value"></span>
                        </td>
                        </tr>
 </table>

</div>
                               
                               
<div id="Blood">
<table width="842">
                         <tr>
                         <td><button id="call_blood">Load Blood</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                           <span id="load_log_blood_value"></span>
                          <span id="load_blood_value"></span>
                        </td>
                        </tr>
 </table>
</div>
                                
                                
<div id="chem1">
<table width="842">
                         <tr>
                         <td><button id="call_chem1">Load Chem1</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                         <span id="load_log_chem1_value"></span>
                          <span id="load_chem1_value"></span>
                        </td>
                        </tr>
 </table>
</div>
 
     
    
<div id="chem2">
                                
<table width="842">
                         <tr>
                         <td><button id="call_chem2">Load Chem2</button></td>
                         </tr>               
                        
                        <tr>
                        <td>
                          <span id="load_log_chem2_value"></span>
                          <span id="load_chem2_value"></span>
                        </td>
                        </tr>
 </table>

 </div>
                              
                            
                               
  
<div id="drug_div"><!-- begin drug div-->
<table>
					   <tr>
							  <td width="410" > <?=nbs(3)?>  HN  (TDM) : 
								  <input name="HN_tdm" type="text" onblur="fill_tdm();" onkeyup="lookup_tdm(this.value);"    id="HN_tdm" size="20" maxlength="6" class="search" />  
							  </td>
					   </tr>
						<tr>
					<!--=================TDM============ autocomplete-->              
					<div class="suggestionsBox" id="suggestions_tdm" style="display: none; margin-left:400px;" align="left" >
						 <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
							 <div class="suggestionList" id="autoSuggestionsList_tdm">
							 </div>
					 </div>
					<!--============================= autocomplete-->
						</tr>
				<tr>
					<td>
						 <button id="drug_button">Load Drug level</button> 
							
										   <span id="drug_log_span"></span>
										   <span id="drug_span"></span>          
					</td>      
				</tr>  
</table>        
               
</div><!-- begin drug div-->  
  
  

	
<div id="adr">
    <button id="adr_button">Load ADRs</button>
	<br />
	<span id="adr_log_span"></span>
	<span id="ard_value"></span>          

</div> 

<div id="medication_error">
    <button id="medication_error_button">Load Medication error</button>
	<br />
	<span id="medication_error_log_span"></span>
	<span id="medication_error_value"></span>          

</div> 

<div id="other_drps">
    <button id="other_drps_button">Load Ohter DRPs</button>
	<br />
	<span id="other_drps_log_span"></span>
	<span id="other_drps_value"></span>          

</div>

<div id="progress_note">
    <button id="progress_note_button">Load Progress Note</button>
	<br />
	<span id="progress_note_log_span"></span>
	<span id="progress_note_value"></span>          

</div>



<div id="give_information">
    <button id="give_information_button">Load Give Information</button>
	<br />
	<span id="give_information_log_span"></span>
	<span id="give_information_value"></span>          

</div>
 
 
 
 <div id="epilepsy_history">
    <button id="epilepsy_history_button">Epilepsy History</button>
	<br />
	<span id="epilepsy_history_log_span"></span>
	<span id="epilepsy_history_value"></span>          

</div>
                                
</div>
<!--####section1-->

</div>
<h3>Progress and Action</h3>
<div>
<p>

<!--####section2-->
<div id="tabs_progress_and_action">
  <ul>
    <li><a href="#tabs-1">Nunc tincidunt</a></li>
    <li><a href="#tabs-2">Proin dolor</a></li>
    <li><a href="#tabs-3">Aenean lacinia</a></li>
  </ul>
  <div id="tabs-1">
    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus. Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
  </div>
  <div id="tabs-2">
    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
  </div>
  <div id="tabs-3">
    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
    <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
  </div>
</div>
<!--####section2-->

</p>
</div>



</div>
</div>


</body>
</html>

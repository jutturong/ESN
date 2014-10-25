<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>




<script type="text/javascript">
	$(function() {
		$("#tabs_monitoring").tabs();
	});
	
	
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
  
  
<div id="non_compliance">                                
    <button id="noncompliance_button">Load Non Compliance</button>
</div>	
	
                                
</div><!-- end div tab-->


</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?=$this->load->view('import_hightchart')?>

<?php
//$str = '{ "name":"Weerachai Nukitram", "email":"is_php@hotmail.com"} ';
$str = '[ {"CustomerID":"C001", "Name":"Weerachai Nukitram", "Email":"win.weerachai@thaicreate.com", "CountryCode":"TH", "Budget":"1000000", "Used":"600000"} ] ';
?>

<title>Untitled Document</title>
<script type="text/javascript">

$(document).ready(function(){
								$("#btn_graph").button(  { text:true,icons:{ primary:'ui-icon-folder-collapsed' } } ).click(function(){
								               var   arr1_gp=new Array();
											   var   ex_arr1;
												$.ajax({
												url: "<?=base_url()?>index.php/epi/ep_chart" ,
												type: "POST",
												//cache:true,
												dataType:'json',
												data:"HN="+$("#HN_ep").val(),
												success:function(results)
												{  
														 	 var  dmy_arr=new Array();
															  var   value_arr=new Array();
														  $.each(results,function(key,val)
														       {   
															         // console.log(val.HN);  
																	//  console.log(val.MonitoringDate);  
																	  dmy_arr.push(val.MonitoringDate);
																	//  console.log(val.Value);  
																	  value_arr.push(val.Value);
																} );
															//	console.log(value_arr[0]);	   
														    //console.log(dmy_arr.length);  //ตรวจสอบความยาวของ array
															//console.log(dmy_arr[0]);	
															// chart1('contain',value_arr);
													//	 var  t1=[7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6];
														 	//  alert(dmy_arr[5]);	
															// alert(t1);	
															
															
															if(  jQuery.isArray( value_arr ) )
															{
															  // ###########  ใช้งานได้  ok 
/*																 var  ta=[];
																 var  tb=[4,86,12]
																//  ta.push(1,4);  //ใช้งานได้แล้ว ok
																  var   tc=$.merge(ta,tb);
																  chart1('container', tc); 
																 alert(value_arr[0]+'  '+value_arr[1]);  //ทอสอบการดึงค่า array จาก  key  ค่าที่แสดงมาคือ value
*/																  
																				var  ta=[];
																			
																						  $.each(value_arr,function(k,v)
																						  {  
																								  ta.push(parseInt(v));
																						  }
																									);
																			
																			 var  tb=[1,3,6];
																			 var   tc=[];
																			 tc=$.merge(ta,tb);
																		  //  alert(tc);
																		     alert('ta is '+ta+'  tb is '+tb);
																			 chart1('container', ta); 		
																									
																  
															}
															
														 
												}
															})
								});
								                });
												
													
//########################################################
function    chart1(contain,arr_gp)
{
    //var chart;
	//var  arr1=new  Array();
	//arr1.push(arr_gp,7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
	var  arr1=arr_gp;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
               // renderTo: 'container',
			   renderTo:contain ,
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Frequency of Seizure Chart',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: Epilepsy clinic database',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Time/Month'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
						name: 'Frequency (time/month)',
					  //  data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					  //  data:arr1
						data:arr_gp
            }
/*			, 
			{
                name: 'New York',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }
			, 
			{
                name: 'Berlin',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }
			, 
			{
                name: 'London',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }
*/			
]
        });
    });
	
}	




//########################################################													
</script>





<!--ในส่วนนี้จะเป็นรายการคำนวณ ในค่า Frequency (time/month) กับ Clinical Response-->
<script type="text/javascript">
//$(function()
//{ 
    //alert('t'); 
	//frequency
//$('#frequency').keypress(function(e) 
  // {
 		    //  http://www.asquare.net/javascript/tests/KeyCode.html
			//http://www.webonweboff.com/tips/js/event_key_codes.aspx
			//e.which == 13   enter
			//e.which == 48   0
			//e.which == 57   9
			
			//   if(e.which == 13    )   กด enter  JavaScript Event KeyCode
			  	// {
						/*					  if(  $(this).val('')  ||  $(this).val() < 0  )
											  {
													alert('Fail enter  :: Frequency :: ');
													$(this).focus();
													$(this).val('');
													return  false;
												}
												else  if( e.which  >= 48   )
												{
														alert('ok');
														return  false;
												}	
						*/		
			//    }
//});
//});


$(function()  //รายการคำนวณ  Clinical Response
{
	$("#frequency").click(function(){   $("#clinic_response").val('');    });
	
/*	$("#View_Frequency_of_Seizure_Chart").button(  { text:true,icons:{ primary:'ui-icon-signal' } } ).click(function()   //jquery  graph
	          {  
			         //alert('t');  
					 $("#chart_ep").load('<?=base_url()?>index.php/epi/graph_ep',{  'HN':$("#HN_ep").val() });
				    return false; 
			  });
*/	

	/*
	$('#call_chem1').button(  { text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } } ).click(function()  //-------------------Imaging  tab3
	      { 
		         //alert('t');   
				$("#load_chem1_value").load('<?=base_url()?>index.php/epi/query_chem1',{  'HN':$("#HN_ep").val() });
				    return false; 
		   }
	);
*/
	
	$('#cal_Clinical_Response').button(  { text:true,icons:{ primary:'ui-icon-power' } } ).click(function()  //-------------------epilepsy clinic  tab1
	      { 
					   var    a=parseInt($('#value_epi').val());  //ชักครั้งก่อน
					   var    b=parseInt($('#frequency').val());  //ชักครั้งนี้  (ปัจุบัน)
					   
					   /*
					   	ECli1=Marked Improvement  หมายถึง จำนวนครั้งของการชักลดลงมากกว่า 50 % เมื่อเทียบกับครั้งที่แล้ว
						ECli2=Moderated Improvement หมายถึง จำนวนครั้งของการชักลดลง25-50 % เมื่อเทียบกับครั้งที่แล้ว  //ok
						ECli3=Same ลดลงไม่ถึง 25 % ok
						ECli4=Worse มีอาการชักเพิ่มขึ้น มากกว่า 25 % เมื่อเทียบกับครั้งที่แล้ว
						ECli5=Seizure free หมายถึง ไม่ชักเลย
------ ค่าลดลง ----------
ECli1=Marked Improvement หมายถึง จำนวนครั้งของการชักลดลงมากกว่า 50 % เมื่อเทียบกับครั้งที่แล้ว
ECli2=Moderated Improvement หมายถึง จำนวนครั้งของการชักลดลง25-50 % เมื่อเทียบกับครั้งที่แล้ว


ECli3=Same ลดลงหรือเพิ่มขึ้นไม่ถึง 25 %

----- ค่าเพิ่มขึ้น------
ECli4=Worse มีอาการชักเพิ่มขึ้น มากกว่า 25 % เมื่อเทียบกับครั้งที่แล้ว

----- ไม่ลดไม่เพิ่ม เท่าเดิม
ECli5=Seizure free หมายถึง ไม่ชักเลย ต้องเป็น 0
                      */
					  
					 //  a=80;
					//	b=20;
						
						if(  b >=  0   &&  a >= 0  )
						{		  
								if(  b >	 a  )  //เพิ่ม
								{
								       //alert("เพิ่ม");
									   ya=(100*b)/a;
									   y2=ya-100;
									   if(  y2  <= 25 )
									   {
									      $("#clinic_response").val('Same');
									   }
									   else if (    y2  > 25 )
									   {
									      $("#clinic_response").val('Worse');
									   }
								}
								else if ( b< a ) // ลด
								{
								        //alert("ลด");
										ya=(100*b)/a;
										y2=100-ya;
										if( y2 > 25  &&  y2 <=50 )
										{
										    $("#clinic_response").val('Moderated Improvement');
										}
										else if ( y2 > 50  )
										{
										     $("#clinic_response").val('Marked Improvement');
										}
										else if  ( y2 <= 25 )
										{
									       	$("#clinic_response").val('Same');
										}
								}
								else  if  ( b = a  ) // ไม่เพิ่มไม่ลด  ECli5=Seizure free หมายถึง ไม่ชักเลย ต้องเป็น 0  เท่าเดิม
								{
										$("#clinic_response").val('Seizure free');
								 
								}
						}
					    else
						{
						      alert("ระบุค่า Frequency (time/month) ให้ถูกต้อง !!");
						      $("#frequency").val('');
							  $("#frequency").focus();
						}		
					
								 
		   }
	);
}
);


</script>
</head>

<body>

<?
##  query  select
  //ค่า query  ใน epilepsy  ของการ select   Duration of Attack,Severity of  Attack
			  foreach(  $epi_select->result() as $row)
			  {
			          $code_tb[]=$row->Code;
				      $lab_tb[]= $row->LabDetail;
			  }
			  
			  /*  เพิ่มสำหรับการกำหนดค่า  Duration of Attack กับ  Severity of Attack
			  ESev1 =Same
			ESev2=Increase
			ESev3=Decrease
			  */
			  
			 // $esev_array=array('ESev1'=>'Same','ESev2'=>'Increase','ESev3'=>'Decrease');
			  
			 
			  
?>


<table>

                        <tr>
                                    <td width="681" colspan="2" align="center">

                                    
 <?
									$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '50',
              'screeny'    => '0'
            );

//echo anchor_popup('../jpgraph/src/ESN/ep_graph.php', '[ Click  View Frequency of Seizure Chart ]', $atts);
?>


                                    		
<!--                                          <button id="View_Frequency_of_Seizure_Chart" >View Frequency of Seizure Chart</button>
                                          <br />
                                          <span id="chart_ep"></span>
-->     



<div id="container" style="width: 100%; height: 400px"></div>

                                     
                                    </td>
                        <tr>

<tr>
<td>
  <button id="btn_graph">graph</button> 
</td>
</tr>

<tr>
    <td colspan="2" align="left">
                                            
                                            ชักครั้งก่อน : <input name="value_epi" id="value_epi"   size="5" maxlength="3"  style="text-align:center" value="<?=$value64?>"/>
                                            ครั้ง
    <!-- <font color="#FF0000"></font>-->
                                             ( Last Visit :
                                              <font color="#FF0000">
                                             <?=$date_last_visit?>  
                                             </font>  
                                             )                                     
     </td>
</tr>
         
         <tr>
    <td colspan="2" align="left">
                                                                  Frequency (time/month) :	
                                            <input name="frequency" type="text" id="frequency" style="text-align:center " size="5" maxlength="3" /> 
                                            
     </td>
</tr>
                        

                      



                        <tr>
                                      <td colspan="2" align="left">
                                      
 <?
echo form_fieldset(' Calculate Clinical Response ');
?>
                                     
                                      
                                      <button id="cal_Clinical_Response">Calculate Clinical Response</button> 
                                      
                                      Clinical Response :
          <input name="clinic_response" type="text" id="clinic_response" readonly="true" size="23" maxlength="100" style="color:#009999 " value="<?=$cr_tran?>" />
                                        
                                        
<?
echo form_fieldset_close(); 
?>
                                        
                                        
                                        </td>
                        </tr>
                        
                        
                        
                        <tr>
                                      <td colspan="2" align="left">
                                      Duration of Attack :	
                                 <select id="Duration_of_Attack" name="Duration_of_Attack">
                                                 <option value="">:: select ::</option>
                                  <?
								                     if(   $value67 ==  $code_tb[0]   )
													 {
													       ?>
													         <option value="<?=$code_tb[0]?>" selected="selected"><?=$lab_tb[0]?></option>
                                                             <?
													 }
													 else
													 {
								    ?>
                                                         <option value="<?=$code_tb[0]?>"><?=$lab_tb[0]?></option>
                                    <?
									                }
									?>                     
                                                         
                                                      <?
													         if(   $value67 ==  $code_tb[1]   )
													  				 {
													       ?>
													         <option value="<?=$code_tb[1]?>" selected="selected"><?=$lab_tb[1]?></option>
                                                             <?
																	 }
																	 else
																	 {
									    ?>
                                                         <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
                                      <?
																	 }
      
													  ?>
                                                      
                                                                                                      <?
													         if(   $value67 ==  $code_tb[2]   )
													  				 {
													       ?>
													         <option value="<?=$code_tb[2]?>" selected="selected"><?=$lab_tb[2]?></option>
                                                             <?
																	 }
																	 else
																	 {
									    ?>
                                                         <option value="<?=$code_tb[2]?>"><?=$lab_tb[2]?></option>
                                      <?
																	 }
      
													  ?>
                                      </select> 	
                                      
                                      
                                      	   
                                      </td>
                        </tr>
                        <tr>
                                   <td colspan="2" align="left">
                                      Severity of Attack :	
                               <select id="Severity_of_Attack" name="Severity_of_Attack">
                                                               <option value="">:: select ::</option>
                                                               
                                                               
                                                               
<!--                                                    <option value="<?=$code_tb[0]?>"><?=$code_tb[0]?></option>
                                                          <option value="<?=$code_tb[1]?>"><?=$code_tb[1]?></option>
                                                          <option value="<?=$code_tb[2]?>"><?=$code_tb[2]?></option>
-->                                                          

                                  <?
								                     if(   $value101 ==  $code_tb[0]   )
													 {
													       ?>
													         <option value="<?=$code_tb[0]?>" selected="selected"><?=$lab_tb[0]?></option>
                                                             <?
													 }
													 else
													 {
								    ?>
                                                         <option value="<?=$code_tb[0]?>"><?=$code_tb[0]?></option>
                                    <?
									                }
									?>                     
                                                         
                                                      <?
													         if(   $value101 ==  $code_tb[1]   )
													  				 {
													       ?>
													         <option value="<?=$code_tb[1]?>" selected="selected"><?=$lab_tb[1]?></option>
                                                             <?
																	 }
																	 else
																	 {
									    ?>
                                                         <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
                                      <?
																	 }
      
													  ?>
                                                      
                                                                                                      <?
													         if(   $value101 ==  $code_tb[2]   )
													  				 {
													       ?>
													         <option value="<?=$code_tb[2]?>" selected="selected"><?=$lab_tb[2]?></option>
                                                             <?
																	 }
																	 else
																	 {
									    ?>
                                                         <option value="<?=$code_tb[2]?>"><?=$lab_tb[2]?></option>
                                      <?
																	 }
      
													  ?>
                                                          
                                                          
                                                          
                                      </select> 		 
                                      </td>
                        </tr>
</table>                        
                        
</body>
</html>

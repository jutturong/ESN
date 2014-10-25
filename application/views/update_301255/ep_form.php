<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<?PHP  //$this->load->view('import_ext')?>
<?PHP $this->load->view('import_jquery'); ?>
<?PHP //$this->load->view('send_system'); ?>
<?PHP //$this->load->view('import_dhtml'); ?>
<?PHP //$this->load->view('import_hightchart'); ?>




<?php
//$str = '{ "name":"Weerachai Nukitram", "email":"is_php@hotmail.com"} ';
$str = '[ {"CustomerID":"C001", "Name":"Weerachai Nukitram", "Email":"win.weerachai@thaicreate.com", "CountryCode":"TH", "Budget":"1000000", "Used":"600000"} ] ';
?>




<title><?PHP echo $title; ?></title>

<script type="text/javascript">
$(function()
{
 $("#btn_graph").button( { text:true,icons:{ primary:'ui-icon-folder-collapsed' } }  ).click(function()
   {
				//$.getScript('<?=base_url()?>index.php/epi/get_script'); //ใช้ไดผล
				/*
				$('#container2').load('<?=base_url()?>index.php/epi/ep_chart2/<?=$HN?>',function(responseTxt,statusTxt,xhr){
				             if( statusTxt=='success')
							 {
							      alert('success');
							 }
							 if( statusTxt='error')
							 {
							       alert('error');
							 }
				});
				*/				
		//$.ajax({  statusCode:{  404:function(){   'page not found!!' } } });	 //test แล้วไม่ error
		$.ajax({
  // url: "<?PHP  echo  base_url();  ?>index.php/epi/ep_chart2/<?=$HN?>" ,
   //demo_ajax_json
     url: "<?PHP  echo  base_url();  ?>index.php/epi/demo_ajax_json" ,
   type:'POST',
   // dataType: 'json',
  // data:"HN="+ '<?PHP  echo  $HN;  ?>', 
			   success:function(results)
			   {  
					 //alert('t'); 
					 //chart2();  //ตัวอย่างใช้ในการทดสอบ
//##====================== ทดสอบในการดึงตัวอย่างเก่า=============================================
                                $.each(results,function(i,field)
								{
								          //alert(field);
										  //console.log('i=>'+i,' : field=>'+field);
									//	 $('#container2').html(val.Value);
										//console.log(val.Value);
								
								});
//##====================== ทดสอบในการดึงตัวอย่างเก่า=============================================					 
				}
});  //end  ajax
   });//end  btn_graph
});//end function
</script>
<br />

<script type="text/javascript">  //ทดสอบการใช้ each
//	$(function()  //ทดสอบการใช้ each
//	{	 
//		  	 $("#btn_g").click(function(){
//								var arr = ["Goergie", "Johnson", "Agile", "Harrison", "Gaurav"];
//								$.each(arr, function (index, value) {
//									alert('Position is : '+ index + '  And  Value is : ' + value);
//								});
//			      });
//	}
//	);		
</script>



<script>
$(document).ready(function(){
  $("#btn_g").click(function(){
		var arr = ["Goergie", "Johnson", "Agile", "Harrison", "Gaurav"];
		  $.ajax({
		        url:'<?=base_url()?>index.php/epi/ep_chart2',
				type:'POST',
				data:{
				      HN:'<?=$HN?>'
				},
				//dataType:'json',
				success:function(data)
				{
					$.each(data,function(index,value)
										{
												alert('t'+data);
										}
								);
				}
		  
		  });
  });
});
</script>

<script type="text/javascript">

//#################  click button 

/* begin  document
$(document).ready(function(){
								$("#btn_graph").button(  { text:true,icons:{ primary:'ui-icon-folder-collapsed' } } ).click(function(){
											  //alert('t');
											   var   arr1_gp=new Array();
											   var    hn_send= '' +  '<?PHP  echo  $HN;  ?>';
											   var   ex_arr1;
												$.ajax({
												url: "<?=base_url()?>index.php/epi/ep_chart" ,
												type: "POST",
												//cache:true,
												dataType:'json',
												//data:"HN="+$("#HN_ep").val(),  //ของเดิมก่อน modify
												data:"HN="+ '<?PHP  echo  $HN;  ?>',  //ของเดิมก่อนแยกทำ popup
											     // data:"HN="+hn_send ,  //ของเดิมก่อน modify
												//  data:"HN=ha2815" ,  //ของเดิมก่อน modify
												success:function(results)
												{  
														 	 // ปัญหาคือการส่งไม่สำเร็จ
															  
															  var  dmy_arr=new Array();
															  var   value_arr=new Array();
															 
														  $.each(results,function(key,val)
														       {   
																   var   sp_dmy=val.MonitoringDate.split('-');
																	var  year_= sp_dmy[0];   //split  มีค่าเป็น ปี
																	var  month_= sp_dmy[1];  //split  มีค่าเป็น เดือน
																	
																	
																	
																	//###   switch  เดือน 
																	var    tr_month; 
																	switch( parseInt( month_) )
																	{
																	       case   1 :
																		   {
																		        tr_month="ม.ค.";
																		        break;
																		   }
																		    case   2 :
																		   {
																		        tr_month="ก.พ.";
																		        break;
																		   }
																		   case   3 :
																		   {
																		        tr_month="มี.ค.";
																		        break;
																		   }
																		   case   4 :
																		   {
																		        tr_month="เม.ย.";
																		        break;
																		   }
																		    case   5 :
																		   {
																		        tr_month="พ.ค.";
																		        break;
																		   }
																		   case   6 :
																		   {
																		        tr_month="มิ.ย.";
																		        break;
																		   }
																		    case   7 :
																		   {
																		        tr_month="ก.ค.";
																		        break;
																		   }
																		   case    08 :
																		   {
																		        tr_month="ส.ค.";
																		        break;
																		   }
																		    case   09 :
																		   {
																		        tr_month="ก.ย.";
																		        break;
																		   }
																		   case   10 :
																		   {
																		        tr_month="ต.ค.";
																		        break;
																		   }
																		    case   11 :
																		   {
																		        tr_month="พ.ย.";
																		        break;
																		   }
																		   case   12 :
																		   {
																		        tr_month="ธ.ค.";
																		        break;
																		   }
																	}
																	 var  date_=  sp_dmy[2];
																	// var   dmy_split=date_+'/'+month_+'/'+year_
																	var  convert_year=parseInt(   year_  ) + 543;
																	//var   dmy_split_convert=date_+'-'+tr_month+'-'+convert_year;
																	// var   dmy_split_convert=date_+'-'+month_+'-'+convert_year;   // 07-05-2555  (format วัน-เดือน-ปี)
																	// var   dmy_split_convert=month_+'-'+convert_year;   //   05-2555  (format  เดือน-ปี)
																	 
																	 
																	  var    cut_year=parseInt(convert_year-2500);
																	  var   dmy_split_convert=month_+'/'+cut_year;   //   05-2555  (format  เดือน-ปี)
																	 
																    //dmy_arr.push(val.MonitoringDate);  //ค่าวันเดือนปี    //ของเดิม
																     dmy_arr.push(dmy_split_convert);
																	 value_arr.push(val.Value);  //ค่าความถี่ของการชัก
																} );
																
											//#################### แสดงค่า value ความถี่ของการชัก							
																										if(    jQuery.isArray( value_arr )   &&  dmy_arr  )
																										{
																												  // ######## code สำหรับทดสอบตัวเลข																			  
																														  var  ta=[];
																														   var  dmy_push=[];
											//																			    var   tc=[];
											//																				tc=$.merge(ta,tb);
																															      //####  push  ค่า value
																																	  $.each(value_arr,function(k,v)
																																	  {  
																																			  ta.push(parseInt(v));
																																	  }
																																				);
																																 				
																														        //####  push  ค่า เดือน
																																$.each(dmy_arr,function(k,v)
																																{    
																																       dmy_push.push(v);
																																}
																																		   );
																														   	       //console.log( dmy_push); 
																																   //alert(dmy_push);
																																   
																														   console.clear();   //clear  ค่า						
																														   chart1('container2', ta, dmy_push);   //function  ของ  hightchart	

																														 	
																										}
											//####### ทดสอบค่า  dmy
													//alert(dmy_arr);											
														
														
														
														
														  chart2();//#===   GARPH แสดง
															
														 
												}  //end success
															}) // end click
								}); //end function ready
								                }); //end document
*/  //end  document												
													
//#####################CHART=> higthchart  ##########################
function    chart1(contain,arr_gp,arr_dmy)
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
			
/*                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
*/					
			   categories: arr_dmy

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



  function   chart2()
  {   //begin  function
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Monthly Average Temperature',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: WorldClimate.com',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
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
                name: 'Tokyo',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            },


//			 {
//                name: 'New York',
//                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
//            }, {
//                name: 'Berlin',
//                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
//            }, {
//                name: 'London',
//                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
//            }

			
			]
        });
    });
	
}//end  function   	




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

<?PHP
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

                                    
 <?PHP
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



<!--<div id="container2" style="width: 100%; height: 400px"></div>-->


<!--<div id="container2" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
-->

<!--
<div id="container3" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
-->
                                     
                                    </td>
                        <tr>

<tr>
<td>

<!--<button id="btn_g">Get JSON data</button>-->

 <!-- <button id="btn_graph">graph</button>-->
  
  
  <?PHP   
  $atts = array(
              'width'      => '900',
              'height'     => '900',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );

           //  $encodeHN=base64_encode($HN);	
             //echo anchor_popup('../jpgraph/src/Examples/epi_graph.php?HN='.$encodeHN.'', 'GRAPH', $atts);
  ?>
  
   
</td>
</tr>

<tr>
    <td colspan="2" align="left">
                                            
                                          <font color="#FF0000">
                                            ชักครั้งก่อน : <input name="value_epi" id="value_epi"   size="3" maxlength="3"  style="text-align:center" value="<?PHP  //$value64?>" readonly="readonly"/>
                                            ครั้ง
                                           </font>
    
                                             ( Last Visit :
                                              <font color="#FF0000">
                                             <?PHP //$date_last_visit?>  
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
                                      
 <?PHP
echo form_fieldset(' Calculate Clinical Response ');
?>
                                     
                                      
                                      <button id="cal_Clinical_Response">Calculate Clinical Response</button> 
                                      
                                      Clinical Response :
          <input name="clinic_response" type="text" id="clinic_response" readonly="true" size="23" maxlength="100" style="color:#009999 " value="<?PHP //@$cr_tran?>" />
                                        
                                        
<?PHP
echo form_fieldset_close(); 
?>
                                        
                                        
                                        </td>
                        </tr>
                        
                        
                        
                        <tr>
                                      <td colspan="2" align="left">
                                      Duration of Attack :	
                                 <select id="Duration_of_Attack" name="Duration_of_Attack">
                                                 <option value="">:: select ::</option>
                                  <?PHP
                                  /*
								                     if(   $value67 ==  $code_tb[0]   )
													 {
		      
                                   */ 
                                    ?>
                                   
													         <option value="<?=$code_tb[0]?>" selected="selected"><?PHP //$lab_tb[0]?></option>
                                     <?PHP
                                     /*
													 }
													 else
		*/											 {
		       ?>
                                                         <option value="<?PHP //$code_tb[0]?>"><?PHP  //$lab_tb[0]?></option>
                                    <?PHP
                                    /*
									                }
		        
                                     */ 
                                    ?>                     
                                     
                                                         
                                     <?PHP
			/*										         if(   $value67 ==  $code_tb[1]   )
			
                         										  				 {
                         */
		        ?>
													         <option value="<?=$code_tb[1]?>" selected="selected"><?=$lab_tb[1]?></option>
                                     <?PHP
			/*														 }
																	 else
			*/														 {
		        ?>
                                                         <option value="<?PHP //$code_tb[1]?>"><?PHP //$lab_tb[1]?></option>
                                      <?PHP
			/*														 }
      
                         
                         */
		         ?>
                                                      
                                       <?PHP
			/*										         if(   $value67 ==  $code_tb[2]   )
			
                         										  				 {
                         */
		           ?>
													         <option value="<?=$code_tb[2]?>" selected="selected"><?=$lab_tb[2]?></option>
                                       <?PHP
			/*														 }
																	 else
			*/														 {
		          ?>
                                                         <option value="<?PHP //$code_tb[2]?>"><?PHP //$lab_tb[2]?></option>
                                      <?PHP
			/*														 }
      
                         
                         */
		          ?>
                                      </select> 	
                                      
                                      
                                      	   
                                      </td>
                        </tr>
                        <tr>
                                   <td colspan="2" align="left">
                                      Severity of Attack :	
                               <select id="Severity_of_Attack" name="Severity_of_Attack">
                                                               <option value="">:: select ::</option>
                                                               
                                                               
                                                               
                                                       

                                  <?PHP
                                  /*
								                     if(   $value101 ==  $code_tb[0]   )
			
                                   */ 										 {
                                   
		      ?>
													         <option value="<?=$code_tb[0]?>" selected="selected"><?=$lab_tb[0]?></option>
                                   <?PHP
		/*											 }
													 else
		*/											 {
		       ?>
                                                         <option value="<?PHP //$code_tb[0]?>"><?PHP //$code_tb[0]?></option>
                                    <?PHP
                                    /*
									                }
                                     
                                     */
		       ?>                     
                                                         
                                    <?PHP
			/*										         if(   $value101 ==  $code_tb[1]   )
			
                         										  				 {
                         */
	                      ?>
													         <option value="<?=$code_tb[1]?>" selected="selected"><?=$lab_tb[1]?></option>
                                    <?PHP
			/*														 }
																	 else
			*/														 {
		       ?>
                                                         <option value="<?PHP //$code_tb[1]?>"><?PHP //$lab_tb[1]?></option>
                                      <?PHP
			/*														 }
      
                         
                         */
		         ?>
                                                      
                                    <?PHP
			/*										         if(   $value101 ==  $code_tb[2]   )
			
                         										  				 {
                         */
		        ?>
													         <option value="<?PHP //$code_tb[2]?>" selected="selected"><?PHP //$lab_tb[2]?></option>
                                   <?PHP
			/*														 }
																	 else
			*/														 {
		        ?>
                                                         <option value="<?PHP //$code_tb[2]?>"><?PHP //$lab_tb[2]?></option>
                                    <?PHP
			/*														 }
      
                         
                                          */
		       ?>
                                                          
                                                          
                                                          
                                      </select> 		 
                                      </td>
                        </tr>
</table>                        
                        
</body>
</html>

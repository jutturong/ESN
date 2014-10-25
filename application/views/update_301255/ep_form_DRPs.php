<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
     
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?PHP $this->load->view('import_jquery'); ?>      
        <script>
        $(function()
        {
              $("#View_Frequency_of_Seizure_Chart").button(  { text:true,icons:{ primary:'ui-icon-signal' } } ).click(function()   //jquery  graph
	  {  
	      $("#chart_ep").load('<?=base_url()?>index.php/epi/graph_ep',{  'HN':$("#HN_ep").val() });
	        return false; 
	  });
        });
        </script>
        <script>
            $(function()
            {
              
                $("#frequency").click(function(){   $("#clinic_response").val('');    });
            });
        </script>
        
        <script>
            $(function(){
                 $('#cal_Clinical_Response').button({ text:true,icons:{ primary:'ui-icon-power' } }).click(function()
                 {
                   if( $('#frequency').val() >= 0   )
                   {
                         //$('#clinic').text('a');
                        // var    a=parseInt($('#value_epi').val());  //ชักครั้งก่อน
                           var  vx=<?PHP echo @$Lab64; ?>;
                          // alert(''+vx);
                            var   a=parseInt(vx);
                           
                             //alert(''+a);
                             
		 var    b=parseInt($('#frequency').val());  //ชักครั้งนี้  (ปัจุบัน)								
                       // if(  b >=  0   &&  a >= 0  )
			//{
                           
                        if(  b == a )
                        {
                           $("#clinic_response").text('Same'); 
                        }
                        else if( b == 0 )
                       {
                          $("#clinic_response").text('Seizure free');
                       }
			else if(  b > a  )  //เพิ่ม
				{
									   ya=(100*b)/a;
									   y2=ya-100;
									   if(  (y2  <= 25)   ||  (b == a)  )
									   {
									      $("#clinic_response").text('Same');
									   }
									   else if (    y2  > 25 )
									   {
									      $("#clinic_response").text('Worse');
									   }
				}
			else if ( b< a ) // ลด
			{
										ya=(100*b)/a;
										y2=100-ya;
										if( y2 > 25  &&  y2 <=50 )
										{
										    $("#clinic_response").text('Moderated Improvement');
										}
										else if ( y2 > 50  )
										{
										     $("#clinic_response").text('Marked Improvement');
										}
										else if  ( y2 <= 25 )
										{
									       	$("#clinic_response").text('Same');
										}
		       }
								                                                             
                                                                
		       // }
                       /*
					    else
						{
						      alert("ระบุค่า Frequency (time/month) ให้ถูกต้อง !!");
						      $("#frequency").text('');
							 // $("#frequency").focus();
						}
                       */                         
					
                   }
                   
                   /*
                   else if(  b == a )
                       {
                          $("#clinic_response").text('Same');
                       }
                   else if( a == 0 )
                       {
                          $("#clinic_response").text('Seizure free');
                       }
                    */   
                       
                 });             
            });
        </script>
    <!--    
        <script>
  $(function()
  {         
        $('#cal_Clinical_Response').button(  { text:true,icons:{ primary:'ui-icon-power' } } ).click(function()
	      { 
		 var    a=parseInt($('#value_epi').val());  //ชักครั้งก่อน
		 var    b=parseInt($('#frequency').val());  //ชักครั้งนี้  (ปัจุบัน)						
			if(  b >=  0   &&  a >= 0  )
			{		  
			if(  b >	 a  )  //เพิ่ม
				{
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
  });
</script>
 -->       

        </script>
    </head>
    <title><?PHP echo $title; ?></title>
    
    <body>
        
        
  <?PHP     echo    form_fieldset($fieldset);    ?>     
        <!--
        <ul>
            <button id="View_Frequency_of_Seizure_Chart">View Frequency of Seizure Chart</button>
        </ul>
        -->
        
        <!--
        <ul>
           <font color="#FF0000">
                                            ชักครั้งก่อน : <input name="value_epi" id="value_epi"   size="3" maxlength="3"  style="text-align:center" value="<?PHP  //$value64?>" readonly="readonly"/>
                                            ครั้ง
                                           </font>
    
                                             ( Last Visit :
                                              <font color="#FF0000">
                                             <?PHP //$date_last_visit?>  
                                             </font>  
                                             )  
            
        </ul>
        -->
        
        <ul>
            Frequency (time/month) :	
            <input name="frequency" type="text" id="frequency" style="text-align:center " size="5" maxlength="3" /> <?PHP echo nbs(); ?> <?PHP echo @$Lab64; ?> times/mo. (<?PHP echo @$MonitoringDate; ?>) 
        </ul>
        
        <ul>
            <?PHP
echo form_fieldset(' Calculate Clinical Response ');
?>
                                     
                                      
                                      <button id="cal_Clinical_Response">Calculate Clinical Response</button> 
                                      
                                      Clinical Response : <span id="clinic_response"></span>
                                      <!--
          <input name="clinic_response" type="text" id="clinic_response" readonly="true" size="15" maxlength="100" style="color:#009999 "  value="<?PHP echo @$Lab66; ?>" />
            -->                            
                                        

        </ul>
        
        <ul>
           
            <!--
            Duration of Attack :
            <select id="Duration_of_Attack" name="Duration_of_Attack">
                <option value=""> เลือก </option>
                <option value="ESev1">Same</option>
                <option value="ESev2">Increase</option>
                <option value="ESev3">Decrease</option>
            </select>
            -->
             Duration of Attack :
            <?PHP  $this->epiquerymodel->select_Duration($Lab67,$name);  ?>
             <?PHP echo nbs(); ?>
             (<?PHP echo @$MonitoringDate; ?>)
        </ul>
        <ul>
            Severity of Attack :
            
            <!--
            <select id="Severity_of_Attack" name="Severity_of_Attack">
                 <option value=""> เลือก </option>
                <option value="ESev1">Same</option>
                <option value="ESev2">Increase</option>
                <option value="ESev3">Decrease</option>
            </select>
            -->
            <?PHP  $this->epiquerymodel->select_Duration($Lab101,$name);  ?>
            <?PHP echo nbs(); ?>
             (<?PHP echo @$MonitoringDate; ?>)
        </ul>
        
        <ul>
            
    วัน - เดือน - ปี : <?PHP  $this->imagemodels->nextpage($select_name,$HN_val,$query_dmy,$url); ?>    
    
        </ul>
        
        
 <?PHP    echo form_close();  ?>       
    </body>
</html>



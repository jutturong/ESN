<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
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

        </script>
    </head>
    <title><?PHP echo $title; ?></title>
    <body>
        <?PHP
	       $atts = array(
	        'width'      => '800',
	         'height'     => '600',
	          'scrollbars' => 'yes',
	          'status'     => 'yes',
	          'resizable'  => 'yes',
	          'screenx'    => '0',
	          'screeny'    => '0'
		         );
	//echo anchor_popup('loadtable/load_form_medication_error_view/'.$HN.'/'.$MonitoringDate, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
	echo anchor_popup('epi2/call_data/'.$HN, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
        ?>
        
  <?PHP     echo    form_fieldset($fieldset);    ?>     
        <ul>
            <button id="View_Frequency_of_Seizure_Chart">View Frequency of Seizure Chart</button>
        </ul>
        <ul>
          
            <!--
            <font color="#FF0000">            
              ชักครั้งก่อน : <input name="value_epi" id="value_epi"   size="3" maxlength="3"  style="text-align:center" value="<?PHP  //$value64?>" readonly="readonly"/>
             ครั้ง
            </font>    
                                         
            ( Last Visit :
                                              <font color="#FF0000">
                                             <?PHP //$date_last_visit?>  
                                             </font>  
                                             )  
              -->                               
            
        </ul>
        <ul>
            Frequency (time/month) :	
                                            <input name="frequency" type="text" id="frequency" style="text-align:center " size="5" maxlength="3" /> 
        </ul>
        
        <ul>
            <?PHP
echo form_fieldset(' Calculate Clinical Response ');
?>
                                     
                                      <!--
                                      <button id="cal_Clinical_Response">Calculate Clinical Response</button> 
                                      -->
                                      
                                      Clinical Response :
          <input name="clinic_response" type="text" id="clinic_response"  size="23" maxlength="100" style="color:#009999 " value="<?PHP //@$cr_tran?>" />
                                        
                                        

        </ul>
        
        <ul>
            Duration of Attack :
            <select id="Duration_of_Attack" name="Duration_of_Attack">
                <option value="">:: select ::</option>
                <!--
                <option value="ESev1">Same</option>
                <option value="ESev2">Increase</option>
                <option value="ESev1">Decrease</option>
                -->
                <?PHP $this->epiquerymodel->select_epi(); ?>
            </select>
        </ul>
        <ul>
            Severity of Attack :
            <select id="Severity_of_Attack" name="Severity_of_Attack">
                <option value="">:: select ::</option>
                <!--
                <option value="ESev1">Same</option>
                <option value="ESev2">Increase</option>
                <option value="ESev1">Decrease</option>
                -->
                 <?PHP $this->epiquerymodel->select_epi(); ?>
            </select>
        </ul>
        
        <ul>
            <button>บันทึก</button>
              <button>ยกเลิก</button>
        </ul>
 <?PHP    echo form_close();  ?>       
    </body>
</html>



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
		 
		 
		 
   }
   );
   
    $(function()
	{
	       
		  $('#show_app1').load('<?=base_url()?>index.php/appendix/call_appendix1/',{ 'appendix':2,'id_appendix1':'<?=$id_appendix1?>' });
		  $("#save_app2").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });	
		  $("#reset_app2").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
		  
	}
	);

</script>

</head>

<body>


<!--         ##################### appendix2                    1-->
          <?=form_open('appendix/insert_appendix2')?>
         <table width="898" class="bordertable1">
         
<tr >
    <td height="31" colspan="2" align="center" class="bordertable1"><?=@$heading?>
     
  
    
    </td>
  </tr>
       
        
        
        <tr>
        <td colspan="2" align="center" valign="middle">
        
          &nbsp;&nbsp;
          <span id="show_app1"></span>      
          
          </td>
        </tr>         
         
         
         
         
         

        
                                             <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่ติดตามผู้ป่วย :                </td>
         <td>
           <input name="date_follow_patient" type="text" id="date_follow_patient" size="10" maxlength="10" />
         </td>
         </tr>

         
                                                      <tr>
         <td align="right" valign="top">
         จำนวนของอาการชักในช่วง 1 เดือนที่ผ่านมา (ครั้ง/เดือน) :                </td>
         <td>
           <input name="count_ep" type="text" id="count_ep" size="10" maxlength="4" />
          </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input name="compare_lasttime" type="text" id="compare_lasttime" size="10" maxlength="4" />
          </td>
         </tr>



                                                      <tr>
         <td align="right" valign="top">
         ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน :                </td>
         <td>
           <input name="ep_lasttime" type="text" id="ep_lasttime" size="10" maxlength="5" />
           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         น้ำหนัก (กิโลกรัม) :                </td>
         <td>
           <input name="weight" type="text" id="weight" size="10" maxlength="4" />
           </td>
         </tr>

                                                      <tr>
         <td align="right" valign="top">
         ระดับยาในเลือด :                </td>
         <td>
           <input name="medicine_level" type="text" id="medicine_level" size="10" maxlength="50" />
           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ยาที่ได้รับ :                </td>
         <td>
           <input name="medicine" type="text" id="medicine" size="10" maxlength="50" />
           </td>
         </tr>


                                                      <tr>
         <td align="right" valign="top">
         ปัญหาการใช้ยาที่เกิดขึ้น :                </td>
         <td>
           <input name="problem" type="text" id="problem" size="10" maxlength="50" />
           </td>
         </tr>

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="save_app2" >Save</button>
                      <button type="reset"  id="reset_app2">Reset</button>
                      
                      </td>
                     </tr>



</table> 
         <?=form_close('')?>                  
 <!--         ##################### appendix2                    1-->                            



</body>
</html>

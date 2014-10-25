<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<script type="text/javascript">
  $(function()
   {
      // alert('t');
	    $('#show_app1').load('<?=base_url()?>index.php/appendix/call_appendix1/',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });
	    $("#save_app3").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });
	    $("#reset_app3").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });
   
//===================================================date   
   	   $("#date_admit").datepicker(
	       {
		     
			 			                      changeMonth: true,
								   changeYear: true,
								   dateFormat:'yy-mm-dd',
								 //  showButtonPanel:true,
								  // appendText:'(yyyy-mm-dd)',
								 // minDate:0,
								   onSelect:function(dateText)
			                                  { 
														
														
//														 var  o=$(this).val().split("-");
//														 var  current=new Date();
//														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
//														 var  ans= parseInt( current_year ) -  parseInt(o[0])  ;  
//													    $('#age').val(ans);
														
														
											   }

		   
		   }
		 );

    	   $("#date_pay").datepicker(
	       {
		     
			 			                      changeMonth: true,
								   changeYear: true,
								   dateFormat:'yy-mm-dd',
								 //  showButtonPanel:true,
								  // appendText:'(yyyy-mm-dd)',
								 // minDate:0,
								   onSelect:function(dateText)
			                                  { 
														
														
//														 var  o=$(this).val().split("-");
//														 var  current=new Date();
//														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
//														 var  ans= parseInt( current_year ) -  parseInt(o[0])  ;  
//													    $('#age').val(ans);
														
														
											   }

		   
		   }
		 );
  
   
//===================>select  
          $('#id_admit').load('<?=base_url()?>index.php/appendix/admit_epilepsy'); //รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา  
		  $('#id_admit').change(function()
		         { 
				      //alert('t'); 
					 if( $(this).val() == 9 )
					 {
					        $('#detail_admit').attr('disabled',false);
						    $('#detail_admit').focus();
				     }		   
					 
				 });    
   
          $('#id_pay').load('<?=base_url()?>index.php/appendix/pay_status'); //สถานะจำหน่าย
          $('#id_pay').change(function()
		                      {
							      if( $(this).val() == 5 )
								  {
								        $("#detail_pay").attr('disabled',false);
										$("#detail_pay").focus();
									  // alert('t');  
								  }
							  });
   
   
   
        //type_pay  
           $('#id_type_pay').load('<?=base_url()?>index.php/appendix/type_pay'); //ประเภทจำหน่าย
		   $('#id_type_pay').change(function()
		       {
			         if( $(this).val() == 6 )  
					 {
					    $('#other_id_type_pay').attr('disabled',false);
					    $('#other_id_type_pay').focus();
					 }  
			   });
          // other_id_type_pay
   });
</script>

</head>





<body>
<!--  ############  appendex3-->   


<?=form_open('appendix/insert_appendix3')?>

<table class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

       
       
       
<!--         <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
          <tr>
         <td align="right" valign="top">เลขที่บ้ัตรประชาชน :</td>
         <td>
         
           
           <input name="textfield" type="text" id="textfield" size="15" maxlength="13" />           </td>
         </tr>
       
        
         <tr>
         <td align="right" valign="top">
         Epilepsy No :         </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="<?=$num_?>" />         </td>
         </tr>
         
                  <tr>
         <td align="right" valign="top">
         ชื่อ - นามสกุล :                  </td>
         <td>
           <input name="textfield2" type="text" id="textfield2" value="" />
           -
           <input name="textfield2" type="text" id="textfield2" value="" />         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         เพศ :                </td>
         <td>
           <label>
           <input type="radio" name="radio" id="radio" value="radio" />
           </label>
           (F) หญิง 
           <label>
           <input type="radio" name="radio2" id="radio2" value="radio2" />
           </label>
           (M) ชาย</td>
         </tr>

          <tr>
         <td align="right" valign="top">
         จังหวัด :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

          <tr>
         <td align="right" valign="top">
         อำเภอ :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ตำบล :                </td>
         <td>
             <select name="">
             </select>         </td>
         </tr>

                   <tr>
         <td align="right" valign="top">
         ที่อยู่ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>
         
                            <tr>
         <td align="right" valign="top">
         เบอร์โทรศัพท์ :                </td>
         <td><textarea name="textarea" cols="50" rows="2"></textarea></td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่่เกิด :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         อายุ (ปี) :                </td>
         <td>
           <input type="text" name="textfield3" id="textfield3" />
          </td>
         </tr>
-->         
         
        
        <tr>
        <td colspan="2" align="center" valign="middle">
          &nbsp;&nbsp;
          <span id="show_app1"></span>      
          
          </td>
        </tr>         
 
         
         


                                     <tr>
         <td width="295" align="right" valign="top">
         วัน-เดือน-ปี ที่เข้านอนรักษา :                </td>
         <td width="683">
           <input name="date_admit" type="text" id="date_admit" size="10" maxlength="12" readonly="readonly" />
          </td>
  </tr>

                                     <tr>
         <td align="right" valign="top">
         วัน-เดือน-ปี ที่จำหน่าย :                </td>
         <td>
           <input name="date_pay" type="text" id="date_pay" size="10" maxlength="12" readonly="readonly" />
          </td>
         </tr>

                                     <tr>
         <td align="right" valign="top">
         รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา :                </td>
         <td align="left" valign="top">
           <select name="id_admit" id="id_admit">
           
           </select>
           
           <textarea name="detail_admit" id="detail_admit" cols="45" rows="2" disabled="disabled"></textarea>                    </td>
  </tr>
         
         
                                              <tr>
         <td align="right" valign="top">
         สรุปการรักษาที่ได้รับ :                </td>
         <td>
           <textarea name="preservation" cols="45" rows="1" id="preservation"></textarea>
          </td>
         </tr>

         
                                              <tr>
         <td align="right" valign="top">
         สถานะจำหน่าย :                </td>
         <td>
           <select id="id_pay" name="id_pay"></select>
          
           <textarea name="detail_pay" id="detail_pay" cols="45" rows="5" disabled="disabled"></textarea>
           </td>
         </tr>


                                              <!--<tr>
         <td align="right" valign="top">
         รายละเอียดเพิ่มเติม :                </td>
         <td>
           <textarea name="" cols="30" rows="2"></textarea>
          </td>
         </tr>-->
         
         
         
                                                       <tr>
         <td align="right" valign="top">
         ประเภทจำหน่าย :                </td>
         <td>
           <select name="id_type_pay" id="id_type_pay">
           </select>
          
           <textarea name="other_id_type_pay" id="other_id_type_pay" cols="45" rows="1" disabled="disabled"></textarea>
               
                 </td>
         </tr>

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="save_app3">Save</button>
                      <button id="reset_app3" type="reset" >Reset</button>
                      
                      </td>
                     </tr>


</table>

<?=form_close()?>

</body>
</html>

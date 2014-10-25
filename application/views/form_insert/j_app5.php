<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
  $(function()
  {
      // $('#show_app1').load('<?=base_url()?>index.php/appendix/call_appendix1/',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });

		   $("#save_app5").button({ text:true,icons:{ primary:'ui-icon-transferthick-e-w' } });
	       $("#reset_app5").button({ text:true,icons:{ primary:'ui-icon-arrowrefresh-1-w' } });

 //===================================================date   
   	   $("#date_visit").datepicker(
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


  }
  );
</script>
</head>

<body>


<?=form_open('appendix/insert_appendix5')?>    
 <table class="bordertable1">
 

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

 
       
<!--          <tr>
         <td width="431" align="right" valign="top">HN :</td>
         <td width="525">
           <input name="HN_ap2" type="text" id="HN_ap2" size="10" maxlength="5" />
                    </td>
         </tr>
         
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
          <span id="show_app1">          </span>
          
        &nbsp;
        <?=$this->load->view('form_insert/_app1')?>        </td>
        </tr>         





<tr>
         <td width="513" align="right" valign="top">
    วัน-เดือน-ปี ที่เยี่ยมบ้าน :                </td>
<td width="389">
  <input name="date_visit" type="text" id="date_visit" size="10" maxlength="13" readonly="readonly" />          </td>
   </tr>

                   <tr>
         <td align="right" valign="top">
         ปัญหาที่พบ :                </td>
         <td><textarea name="problem" cols="50" rows="2" id="problem"></textarea></td>
         </tr>
                    
                    
                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="save_app5">Save</button>
                      <button  id="reset_app5" type="reset" >Reset</button>                      </td>
                     </tr>
 </table>                    
<?=form_close()?>


</body>
</html>

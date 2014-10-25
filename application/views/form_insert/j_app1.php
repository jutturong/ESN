<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>


<script type="text/javascript">   //กำหนด mask format javascript

<?PHP
   	  $format_hn="0-9";
?>
       //$("#person_id").mask("<?=$format_hn?>");
	   
</script>



<!--  ปรับ id ของ จังหวัด อำเภอ ตำบล
id_prov_auto   
amphur_auto_id
district_auto_id
-->


<script type="text/javascript">
//------------> ค้นหา จังหวัดแบบ auto complete

   $(function()  // search_province  สร้างค่าว่าง  => จังหวัด
   {
        $('#search_province').click(function()
		{
		     $(this).val('');
		}
		);
		
		$('#amphur_auto').click(function()
		   {
		       $(this).val('');
		   }
		  ); 
		  
		$('#district_auto').click(function()
		   {
		       $(this).val('');
		   }
		  );    
		
   }
   );





$(function()
   { 
      
	  
		
			
			
		    select_other('#epilepsy_first_id',8,'#detail_epilepsy_first');
			//รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :	current_epilepsy_id	  other_current_epilepsy
		    select_other('#current_epilepsy_id',8,'#other_current_epilepsy');
		   //  ลักษณะความผิดปกติจาก CT/MRI :  nature_CT_MRI_id  other_Nature_CT_MRI 
		    select_other('#nature_CT_MRI_id',14,'#other_Nature_CT_MRI');
			//ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา
		    select_other('#drug_id',9,'#drug_other');
			//โรคร่วมอื่่นๆ ของผู้ป่วย
			select_other('#disease_drug_id',5,'#disease_drug_other');
			
			//-- radio ประวัติการแพ้ยา  allergic_detail
			//  $("#allergic_id_2").click(function(){ alert('t'); } );
			select_other('#allergic_id_2',2,'#allergic_detail');
			
			
			//ยากันชักที่แพ้ :
			select_other('#drug_epilepsy_id',9,'#drug_epilepsy_detail');
			
			//ลักษณะการแพ้ยากันชัก :
			select_other('#nature_drug_epilepsy_id',6,'#nature_drug_epilepsy_other');
			
			//สิ่งกระตุ้นให้เกิดอาการชัก :
			select_other('#stimulate_epilepsy_id',5,'#stimulate_epilepsy_other');
   });


 //####-------------------appendix 1 function---------- 
   
       		  function   makeUpperCase(e) //HN เพื่อ upper HN
			  {
			      //alert('t');
				  //document.getElementById(e).value.toUpperCase();
				  var   vx=document.getElementById(e);
			      return  vx.value=vx.value.toUpperCase();
			  }  
			  
		        

	   $(document).ready(function()
	   {  
	        //alert('t'); 
			//$('#amphur').hide();
			//$('#div_amphur').hide();
			
				$('#loader').hide();
				$('#show_heading').hide();
				
				
//-----------------------------> load อำเภอ				
			
/*				if(  $('#id_prov_auto').val > 0  )
				{
				    $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2',{ 'amphur_id': $('#id_prov_auto').val() });
				}  
*/				
				
/*			 if(  $("#province").val() > 0 )
				{
				     $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2',{ 'amphur_id': $("#province").val() });
				}
*/				
			//	  $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2',{ 'amphur_id': $("#province").val() });
//-----------------------------> load อำเภอ	


				 
			//	 $('#district').load('<?=base_url()?>index.php/home/select_district2',{ 'district_id': $('#amphur_id').val()  });
			
			
				 
	     $('#drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select',{ 'tb':'drug','name':'drug_epilepsy_id','id_field':'drug_id','name_field':'drug' }); //ยากันชักที่แพ้ :
		 
		 	     $('#drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'drug','id_field':'drug_id','name_field':'drug' }); //ยากันชักที่แพ้ :



$('#nature_drug_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'nature_drug_epilepsy','id_field':'nature_drug_epilepsy_id','name_field':'nature_drug_epilepsy' });//ลักษณะการแพ้ยากันชัก 


$('#stimulate_epilepsy_id').load('<?=base_url()?>index.php/report/call_select2',{ 'tb':'stimulate_epilepsy','id_field':'stimulate_epilepsy_id','name_field':'stimulate_epilepsy' }); //สิ่งกระตุ้นให้เกิดอาการชัก :


			$('#province').click(function() //load  จังหวัด
			      {
                          $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id': $('#province').val() });

				  });
				  
				  
				  
/*			$('#amphur').click(function()
						  {
							   //var  value=$('#amphur_id').val();
							  //alert(''+value);
							 $('#district').load('<?=base_url()?>index.php/home/select_district2',{ 'district_id': $('#amphur_id').val()  });
						  }
				  );	  
*/
				  
				  
	   });
	   
	   
	      $(function()
      {
//------------------------>event  
   function  checkErr(e,head,content)
   {
        if( $(e).val('')   )
		{
		   
			//alert('false');
			Ext.onReady(function(){  Ext.MessageBox.confirm(head,content);  })
			$(e).addClass('ui-state-error');
			$(e).focus();
			return  false;
			
		}
   }
   
    function   mess(m2)
	{  
	      Ext.onReady(function()
		     {
			     // Ext.MessageBox.confirm(' แจ้งข้อผิดพลาดในการบันทึกข้อมูล!! ',m2);
				   Ext.MessageBox.show({
				               title:'แจ้งข้อผิดพลาดในการบันทึกข้อมูล!!',
							   msg:m2,
							   width:300,
							   buttons:Ext.MessageBox.OK
				                       });
			 }
			          );
	}    
	    
		
/*		  $('#btn_Save').button({ icons:{ primary:'ui-icon-folder-collapsed' } }).click(function()
		    {
				     checkErr('#HN','แจ้งข้อผิดพลาด','กรุณาระบุ HN'); //HN
					 checkErr('#firstname','แจ้งข้อผิดพลาด','กรุณาระบุ ชื่อ'); //HN
					 checkErr('#surname','แจ้งข้อผิดพลาด','กรุณาระบุ ชื่อ'); //HN
					 
			});
*/			
			
			 $('#btn_Save').button({ icons:{ primary:'ui-icon-folder-collapsed' } }).click(function()
			   {
								   // alert('t');
								//	return  false;
					
									   //  checkErr('HN','แจ้งข้อผิดพลาด','กรุณาระบุ HN'); //HN
									   
						     if( $('#HN').val() == '' )
							 {
							 
							    		$('#HN').addClass('ui-state-error');
										$('#HN').focus();
										 mess('ระบุ HN !!');
										return false;
							 } 
							 	else  if( $('#firstname').val() == '' )
							 {
							 
							    		$('#firstname').addClass('ui-state-error');
										$('#firstname').focus();
										 mess('ระบุ ชื่อ !!');
										return false;
							 } 
							 	else  if( $('#surname').val() == '' )
							 {
							 
							    		$('#surname').addClass('ui-state-error');
										$('#surname').focus();
										 mess('ระบุ นามสกุล !!');
										return false;
							 } 			   
			   
			   

			   }
			   );
			
			
		  $('#btn_Reset').button({ icons:{ primary:'ui-icon-refresh' } });
		  
		  
		  
	  });


 $(function()
      {
	       
		   
		   // $datepicker.formatDate('yy-mm-dd');
		      function  calAge(e,y)  //คำนวณอายุ
			{
					  var  ex=document.getElementById(e);
					  var  o=ex.value;
					 var  tmp=o.split('-');
					 var  current=new Date();
					 var   current_year=current.getFullYear(); //ปีปัจจุบัน
					  // var  ans= parseInt( current_year ) -  parseInt(tmp[0])  ;  
					    var  ans= parseInt( current_year ); 
				    return	document.getElementById(y).value=ans;
			}	

		   
		   
		   
			$('#birthdate').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								    showOn: 'button', 
								   buttonImage: '<?=base_url()?>images/calendar.gif',
								    buttonImageOnly: false,  
									 dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
									 monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
								   dateFormat:'dd/mm/yy',
								    changeMonth: true, 
									  changeYear: true ,  
								  showButtonPanel:true,
								   appendText:'(dd/mm/yyyy)',
								  minDate:0,
								   onSelect:function(dateText)
			                                  { 
														 var  o=$(this).val().split("/");
														 var  current=new Date();
														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
														 var  ans= parseInt( current_year ) -  parseInt(o[2])  ;  
													    $('#age').val(ans);
											   }
										});
										
										
										
			$('#interview_date').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								    showOn: 'button', 
								   buttonImage: '<?=base_url()?>images/calendar.gif',
								    buttonImageOnly: false,  
									 dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
									 monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
								   dateFormat:'dd/mm/yy',
								    changeMonth: true, 
									  changeYear: true ,  
								  showButtonPanel:true,
								   appendText:'(dd/mm/yyyy)',
								  minDate:0,
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});
							
	  
	 			$('#dmy_EEG').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								    showOn: 'button', 
								   buttonImage: '<?=base_url()?>images/calendar.gif',
								    buttonImageOnly: false,  
									 dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
									 monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
								   dateFormat:'dd/mm/yy',
								    changeMonth: true, 
									  changeYear: true ,  
								  showButtonPanel:true,
								   appendText:'(dd/mm/yyyy)',
								  minDate:0,
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});

	 			$('#dmy_results_EEG').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								    showOn: 'button', 
								   buttonImage: '<?=base_url()?>images/calendar.gif',
								    buttonImageOnly: false,  
									 dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
									 monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
								   dateFormat:'dd/mm/yy',
								    changeMonth: true, 
									  changeYear: true ,  
								  showButtonPanel:true,
								   appendText:'(dd/mm/yyyy)',
								  minDate:0,
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});

	 			$('#dmy_ever_CT_MRI').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								    showOn: 'button', 
								   buttonImage: '<?=base_url()?>images/calendar.gif',
								    buttonImageOnly: false,  
									 dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'], 
									 monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
								   dateFormat:'dd/mm/yy',
								    changeMonth: true, 
									  changeYear: true ,  
								  showButtonPanel:true,
								   appendText:'(dd/mm/yyyy)',
								  minDate:0,
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});

	 
	 
	 
	  }
			   );
  
  //####-------------------appendix 1 function----------
//=========================> ค้นหา อำเภอแบบ auto complete  
     function lookup_amphur(inputString)
	{ 
						if( $('#amphur_auto').val().length == 0 )
						{
						   $('#suggestions_amphur').hide();
						}
						else{
							$.ajax({
								type:'POST'
							  // ,url:'<?=base_url()?>index.php/project/autocomplete'
							   ,url:'<?=base_url()?>index.php/home/select_amphur3'
							   ,data:'amphur_id=' +  $('#id_prov_auto').val() + '&&amphur_name='  +   $('#amphur_auto').val()
							   ,success:function(data){
									$('#suggestions_amphur').show();
									$('#autoSuggestionsList_amphur').html(data); 
							   }
							});

						}
	}
		
	function fill_amphur(thisValue,c_id) {
		$('#amphur_auto').val(thisValue);
		$('#amphur_auto_id').val(c_id);
		setTimeout("$('#suggestions_amphur').hide();", 200);
	  
	    // $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':c_id });
		// $('#amphur_auto').load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':40 });  //select ของอำเภอ 2
		
	}


  //####-------------------appendix 1 function----------
//=========================> ค้นหา ตำบล auto complete  
     function lookup_district(inputString)
	{ 
						if( $('#district_auto').val().length == 0 )
						{
						   $('#suggestions_district').hide();
						}
						else{
							$.ajax({
								type:'POST'
							  // ,url:'<?=base_url()?>index.php/project/autocomplete'
							   ,url:'<?=base_url()?>index.php/home/select_district3'
							   ,data:'district_id=' +  $('#amphur_auto_id').val() + '&&district_name='  +   $('#district_auto').val()
							   ,success:function(data){
									$('#suggestions_district').show();
									$('#autoSuggestionsList_district').html(data); 
							   }
							});

						}
	}
		
	function fill_district(thisValue,c_id) {
		$('#district_auto').val(thisValue);
		$('#district_auto_id').val(c_id);
		setTimeout("$('#suggestions_district').hide();", 200);
	  
	    // $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':c_id });
		// $('#amphur_auto').load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':40 });  //select ของอำเภอ 2
		
	}

  
 //=========================> ค้นหา จังหวัดแบบ auto complete
   function lookup_province(inputString)
	{ 
						if( $('#search_province').val().length == 0 )
						{
						   $('#suggestions_province').hide();
						}
						else{
							$.ajax({
								type:'POST'
							  // ,url:'<?=base_url()?>index.php/project/autocomplete'
							   ,url:'<?=base_url()?>index.php/home/province_autocomplete'
							   ,data:'prov_name=' + $('#search_province').val()
							   ,success:function(data){
									$('#suggestions_province').show();
									$('#autoSuggestionsList_province').html(data); 
							   }
							});

						}
	}
	function fill_province(thisValue,c_id) {
		$('#search_province').val(thisValue);
		$('#id_prov_auto').val(c_id);
		setTimeout("$('#suggestions_province').hide();", 200);
	  
	  
	  // $("#amphur").load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':c_id });
	  // $('#amphur_auto').load('<?=base_url()?>index.php/home/select_amphur2/',{ 'amphur_id':40 });  //select ของอำเภอ 2
		
	}



//---------------> event  appendix1
  

</script>
</head>

<body>


<!--############################################################# form appendix1  -->
<?PHP echo form_open('appendix/insert_appendix1')?>
<table width="968" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

  <tr>
    <td width="334" align="right">HN :</td>
    <td width="624">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"   onkeyup="makeUpperCase('HN')"/>
    
    </td>
  </tr>
  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" />   </td>
  </tr>
    
    <!--
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="624">
    <input name="ep_no" type="text" id="ep_no" value="<?=@$num_?>" size="5" maxlength="5" readonly="readonly" /> 
  
    </td>
  </tr>
  -->
  
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="624">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25"  />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="624">
      
      <input name="sex" type="radio"  value="2"  />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" />
      (M) ชาย      </td>
  </tr>

        <tr>
    <td align="right">จังหวัด :</td>
    <td width="624">
    
    
      <!--<select name="province" id="province">
      <?
	      foreach($province->result() as $row)
		  {
		     $prov_id=$row->prov_id;
			 $prov_name=$row->prov_name;
				  ?>
					<option value="<?=$prov_id?>"><?=$prov_name?></option>
				  <?
	      }
	  ?>
      </select>-->
      
      
      
     <!-- หรือ-->
      
 <input type="text" id="search_province" name="search_province" onblur="fill_province();" onkeyup="lookup_province(this.value);" size="15" maxlength="5"/>     
 <input type="hidden" name="id_prov_auto" id="id_prov_auto" />   
      
<!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_province" style="display: none; margin-left:400px;" >
				         <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_province">
&nbsp;                </div>
      </div>
<!--============================= autocomplete-->
      
      
      
           
            
            <!--( เลือกจังหวัดใ้ช้งานได้ 2 แบบ )   -->         
            
            </td>
  </tr>
       
       
               <tr>
    <td align="right">อำเภอ :</td>
    <td width="624">
                   
      <!--<div id="amphur"></div>-->       
      
      <input type="text" id="amphur_auto" name="amphur_auto" onkeyup="lookup_amphur();" onblur="fill_amphur(this.value);"  value="" size="15" maxlength="5"/>
	  <input type="hidden" name="amphur_auto_id" id="amphur_auto_id" maxlength="" />

      <!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_amphur" style="display: none; margin-left:400px;" >
				         <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_amphur">
&nbsp;                </div>
      </div>
<!--============================= autocomplete-->

      
            </td>
  </tr>
                
                               <tr>
                               
                               
    <td align="right">ตำบล :</td>
    <td width="624">
                 
                  
     <!-- <div id="district"></div>-->                 
      

      <input type="text" id="district_auto" name="district_auto" onkeyup="lookup_district();" onblur="fill_district(this.value);"  value="" size="15" maxlength="5"/>
	  <input type="hidden" name="district_auto_id" id="district_auto_id" maxlength="" />


      <!--============================= autocomplete-->              
<div class="suggestionsBox" id="suggestions_district" style="display: none; margin-left:400px;" >
				         <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList_district">
&nbsp;                </div>
      </div>
<!--============================= autocomplete-->
      
      
       </td>
  </tr>
              
              
  <tr>
    <td align="right">รหัสไปรษณีย์ :</td>
    <td width="624">
     
      <input name="zipcodea" type="text" id="zipcodea" size="5" maxlength="5" />           </td>
  </tr>
  
  
       <tr>
      <td align="right" valign="top">ที่อยู่ :</td>
    <td width="624" height="2">
      <textarea name="address" id="address" cols="50" rows="2"></textarea>      </td>
  </tr>
      
      <tr>
      <td align="right" valign="top">เบอร์โทรศัพท์ :</td>
    <td width="624" height="2">
      <input name="telephone" type="text" id="telephone" size="10" maxlength="10" />          </td>
  </tr>
  
        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="624" height="2">
    <input name="birthdate" type="text" id="birthdate" size="15" maxlength="15" >     </td>
  </tr>


        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="624" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" />       </td>
  </tr>
        
              <tr>
      <td align="right" valign="top">อาชีพ :</td>
    <td width="624" height="2">
<select name="occupational_id" id="occupational_id">
            <option  value="" >:: select ::</option>
                     <?PHP
					    foreach($occupational->result() as $row)
						{
						     $occupational_id=$row->occupational_id;
							 $occupational=$row->occupational;
							   ?>
                                    <option value="<?=$occupational_id?>"><?=$occupational_id?>.<?=$occupational?></option>
                               <?PHP
						}
					 ?>
                </select>    </td>
  </tr>  
      
      
                  <tr>
      <td align="right" valign="top">ระดับการศึกษา :</td>
    <td width="624" height="2">
<select name="education_id" id="education_id">
                  <option value="">:: select ::</option>
                                 <?PHP
                              		 foreach($education->result() as $row)
                                            {
                                                  $education_id=$row->education_id;
                                                  $education=$row->education;
                                                        ?>       
                                                           <option value="<?=$education_id?>"><?=$education_id?>.<?=$education?></option>
                                                        <?PHP
                                            }
                                ?> 
      </select>                 </td>
  </tr>  
                 
                       
                        <tr>
      <td align="right" valign="top">สิทธิทางการรักษา :</td>
    <td  width="624" height="2">                       
<select name="payment_id" id="payment_id">
                      <option value="">:: select ::</option>
                                              <?PHP
                              		 foreach($payment->result() as $row)
                                            {
                                                  $payment_id=$row->payment_id;
                                                  $payment=$row->payment;
                                                        ?>       
                                                           <option value="<?=$payment_id?>"><?=$payment_id?>.<?=$payment?></option>
                                                        <?PHP
                                            }
                                ?> 
             </select>    </td>
  </tr>
              
              
                                      <tr>
      <td align="right" valign="top">เริ่มมีอาการชักเมื่อ(ปี) :</td>
    <td  width="624" height="2">  
       
      <input name="age_payment" type="text" id="age_payment" size="5" maxlength="2" />              </td>
  </tr>
          
          
                                                <tr>
      <td align="right" valign="top">ชักมาแล้ว :</td>
    <td  width="624" height="2">  
      
      <input name="age_sick" type="text" id="age_sick" size="5" maxlength="2" />                 </td>
  </tr>


                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นครั้งแรก :</td>
    <td  width="624" height="2" align="left" valign="top">  
<select id="epilepsy_first_id" name="epilepsy_first_id">
                      <option value="">:: select ::</option>
                                              <?PHP
                              		 foreach($epilepsy_first->result() as $row)
                                            {
                                                  $epilepsy_first_id=$row->epilepsy_first_id;
                                                  $epilepsy_first_content=$row->epilepsy_first_content;
                                                        ?>       
                    <option value="<?=$epilepsy_first_id?>" ><?=$epilepsy_first_id?>.<?=$epilepsy_first_content?></option>
                                                        <?PHP
                                            }
											?> 
      </select>
                
                อื่นๆ ระบุ  <textarea name="detail_epilepsy_first" cols="35" rows="2" id="detail_epilepsy_first" disabled="disabled"></textarea>                 </td>
  </tr>
          
                                                <tr>
      <td align="right" valign="top">รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน :</td>
    <td  width="624" height="2" align="left" valign="top"> 
    
   <!-- select_other(id_select,value,text)-->
     
<select id="current_epilepsy_id" name="current_epilepsy_id">
                                  <option value="">:: select ::</option>
                                              <?PHP
                              		 foreach($epilepsy_first->result() as $row)
                                            {
                                                  $epilepsy_first_id=$row->epilepsy_first_id;
                                                  $epilepsy_first_content=$row->epilepsy_first_content;
                                                        ?>       
                    <option value="<?=$epilepsy_first_id?>" ><?=$epilepsy_first_id?>.<?=$epilepsy_first_content?></option>
                                                        <?PHP
                                            }
											?> 
      </select>
                
                อื่นๆ ระบุ  <textarea name="other_current_epilepsy" cols="35" rows="2" id="other_current_epilepsy" disabled="disabled"></textarea>                 </td>
  </tr>
          
                                                  <tr>
      <td align="right" valign="top">เคยตรวจ EEG มาก่อนหรือไม่ :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="ever_EEG" type="radio"  value="1"  />
    
      เคย 
      
      / วัน-เดือน-ปี 
      <input name="dmy_EEG" type="text" id="dmy_EEG" size="10" maxlength="10" readonly="readonly" />
      <input type="radio" name="ever_EEG"  value="2" />
      
      ไม่เคย                                                  
      
      </tr>
        

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ EEG่ :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="results_EEG" type="radio"  value="1" />
  
      เคย 
      
            / วัน-เดือน-ปี 
      <input name="dmy_results_EEG" type="text" id="dmy_results_EEG" size="10" maxlength="10" readonly="readonly"/>
      

      
      <input name="results_EEG" type="radio"  value="2"  />
     ไม่เคย                                                  </tr>


                                                  <tr>
      <td align="right" valign="top">เคยตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="ever_CT_MRI" type="radio"  value="1" />
  
      เคย 
      
                  / วัน-เดือน-ปี 
      <input name="dmy_ever_CT_MRI" type="text" id="dmy_ever_CT_MRI" size="10" maxlength="10" readonly="readonly" />
     

      <input name="ever_CT_MRI" type="radio"  value="2" />
     ไม่เคย                                                  </tr>

                                                  <tr>
      <td align="right" valign="top">ผลการตรวจ CT/MRI มาก่อนหรือไม่</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="result_CT_MRI" type="radio"  value="1" />
      ปกติ 
      <input name="result_CT_MRI" type="radio"  value="2"  />
     ไม่ปกติ                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ลักษณะความผิดปกติจาก CT/MRI :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="nature_CT_MRI_id" name="nature_CT_MRI_id">
	     <option value="">:: select ::</option>
                   <?PHP
                              		 foreach($CTMRI->result() as $row)
                                            {
                                                  $id_CTMRI=$row->id_CTMRI;
                                                  $CTMRI=$row->CTMRI;
                                                        ?>       
                    <option value="<?=$id_CTMRI?>" ><?=$id_CTMRI?>.<?=$CTMRI?></option>
                                                        <?
                                            }                                
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="other_Nature_CT_MRI" cols="35" rows="2" id="other_Nature_CT_MRI" disabled="disabled"></textarea>                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="bottom">ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความแรงและแบบแผนการใช้ยา :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="drug_id" name="drug_id">
							<option value="">:: select ::</option>
                                              <?
                              		 foreach($drug->result() as $row)
                                            {
                                                  $drug_id=$row->drug_id;
                                                  $drug=$row->drug;
                                                        ?>       
                    <option value="<?=$drug_id?>" ><?=$drug_id?>.<?=$drug?></option>
                                                        <?
                                            }
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="drug_other" cols="35" rows="2" id="drug_other" disabled="disabled"></textarea>                                                </td>
  </tr>


                                                  <tr>
      <td align="right" valign="bottom">โรคร่วมอื่่นๆ ของผู้ป่วย :</td>
    <td  width="624" height="2" align="left" valign="top">
<select id="disease_drug_id" name="disease_drug_id">
                                      <option value="">:: select ::</option>       
                                              <?
                              		 foreach($disease_drug->result() as $row)
                                            {
                                                  $disease_drug_id=$row->disease_drug_id;
                                                  $disease_drug=$row->disease_drug;
                                                        ?>       
                    <option value="<?=$disease_drug_id?>" ><?=$disease_drug_id?>.<?=$disease_drug?></option>
                                                        <?
                                            }
											?> 
                  </select>
                                             
                                             อื่นๆ ...<textarea name="disease_drug_other" cols="35" rows="2" id="disease_drug_other" disabled="disabled"></textarea>                                                </td>
  </tr>

                                                  <tr>
      <td align="right" valign="top">ประวัติการแพ้ยา :</td>
    <td  width="624" height="2" align="left" valign="top">
      <input name="allergic_id" type="radio" id="allergic_id_1" value="1" />
      ไม่เคย
      <input name="allergic_id" type="radio" id="allergic_id_2" value="2"  />
     เคย
                                              
        ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่่นที่ไม่ใช่ยากันชัก)..<textarea name="allergic_detail" cols="30" rows="2" id="allergic_detail" disabled="disabled"></textarea>                                                </td>
  </tr>



                                                  <tr>
    											  <td align="right" valign="bottom" >ยากันชักที่แพ้ :</td>
                                                       
   												  <td align="left" valign="top">
                                                       
                                                               
                                                               
                                                    <select id="drug_epilepsy_id" name="drug_epilepsy_id">
                                                           
                                                                
                                                    </select>
                                                    
                                                    
                                             อื่นๆ ...
                                             <textarea name="drug_epilepsy_detail" cols="35" rows="2" id="drug_epilepsy_detail" disabled="disabled"></textarea></td>
  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >ลักษณะการแพ้ยากันชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                    <select id="nature_drug_epilepsy_id" name="nature_drug_epilepsy_id" >
                                                    </select>
                                             อื่นๆ ...
                                             <textarea name="nature_drug_epilepsy_other"  cols="35" rows="2" disabled="disabled" id="nature_drug_epilepsy_other"></textarea></td>
  </tr>


                                                  <tr>
    											  <td align="right" valign="bottom" >สิ่งกระตุ้นให้เกิดอาการชัก :</td>
                                                       
   												  <td align="left" valign="top">
                                                       <select id="stimulate_epilepsy_id" name="stimulate_epilepsy_id" >
                                                      </select>
                                             อื่นๆ ...
                                             <textarea name="stimulate_epilepsy_other" cols="35" rows="2" id="stimulate_epilepsy_other" disabled="disabled"></textarea></td>
                                                  </tr>
                                                  
                                                  
                     <tr>
                     <td align="right" valign="top">
                     วัน/เดือน/ปี ที่สัมภาษณ์ :                       </td>
                     <td>                     
                     <input name="interview_date" type="text" id="interview_date" size="15" maxlength="15" />                     </td>
                     </tr>  
                     
                     <tr>
                     <td align="right" valign="top">
                     ผู้กรอกข้อมูล :                       </td>
                     <td>                     
                     <input name="interview_name" type="text" id="interview_name" size="15" maxlength="30" />
                     -
                     <input name="interview_lastname" type="text" id="interview_lastname" size="20" maxlength="60"  />                     </td>
                     </tr>  
                     
                     
<tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="btn_Save">บันทึกข้อมูล</button>
                      <button type="reset"  id="btn_Reset" >ล้างข้อมูล</button>                      </td>
                     </tr>
</table>

<?=form_close()?>
<!--############################################################# form appendix1  -->



</body>
</html>

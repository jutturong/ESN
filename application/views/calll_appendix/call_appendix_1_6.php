<?
     $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');  //ประเภทของ user
	//echo br();
?>


<script type="text/javascript">
$(function()
{
        $('#sub_all_page').change(function()
		 {
		     // alert('t');
			  // $('#result').load('<?=base_url()?>index.php/appendix/call_appendixALL',{ 'select_page':$(this).val() });
			  //page_call_appendixALL
			  $('#call_appendixALL').load('<?=base_url()?>index.php/appendix/page_call_appendixALL',{  'id_appendix1':$("#id_appendix1_hid").val(),'tb_appendix':$(this).val(),'send_page':$(this).val(),'tb_appendix':$('#call_appendix').val() });	
		 }
		 );

}
);
</script>




<script type="text/javascript">
   $(function()
   {
       
	   
	   
			$('#date_follow_patient').datepicker({
			                      changeMonth: true,
								   changeYear: true,
								//   showButtonPanel:true,
							    	dateFormat:'yy-mm-dd',
								   appendText:'(yyyy-mm-dd)',
								   onSelect:function(e)
			                                  { 
											     //lert('t'); 
												   //e.value('5');
											   }
										});
	   
	   
	   
	   
	   
   }
   );
</script>



<script type="text/javascript">
     $(function()
	 {
	     
		 $('#preview_appendix').button( { text:true,icons:{ primary:'ui-icon-print' } } ).click(function()
	     {
		        
						  if(  $('#sub_id_appendix').val() > 0  &&  $('#tb_appendix_index').val() > 0  )
						    {
							   // alert('t');  
								
	window.open("<?=base_url()?>../report_pdf/appendix_report/report_app_modify1.php?appen="  +  $('#tb_appendix_index').val() + "&id_appendix=" + $('#sub_id_appendix').val() ,"resizable=1");
							
							}
		 }
		 );
		 
		  $('#sub_ap_update').button({ text:true,icons:{ primary:'ui-icon-wrench'} }).click(function()
		      {
			  
			               if(  $('#sub_id_appendix').val() > 0   )
						   {
						       //alert('t');
							   $('#show_sub_appnedix').dialog(
									{ 
										width:1000
									   ,modal:true
										 
									}
								 );
								 
								 //call_form_appendix
								      var sub_id_appendix=$('#sub_id_appendix').val();
				    $('#show_sub_appnedix').load('<?=base_url()?>index.php/appendix/call_form_appendix',{ 'sub_id_appendix':sub_id_appendix,'tb_name':'<?=$tb_name?>' });
						   }
			  
			  
			  }
			 );
		  
		  
		   $('#sub_ap_delete').button({ text:true,icons:{ primary:'ui-icon-trash'} }).click(function()
		      {
			  
							   if(  $('#sub_id_appendix').val() > 0   )
										   {
										   
											  var  tb_appendix_index=$('#tb_appendix_index').val();
											  var  sub_id_appendix=$('#sub_id_appendix').val();
											  
											    Ext.MessageBox.confirm('สถานะการลบข้อมูล',' คุณต้องการลบข้อมูลหรือไม่ ',function(e)
														 {      
														       if( e=='yes') //ต้องการลบข้อมูล
															   {
															      //alert('t');
						 window.location="<?=base_url()?>index.php/appendix/delete_tb_appendix/" +  tb_appendix_index + "/" + sub_id_appendix;  
															   }
															   
														 }); 
										   }
			  
			   }
			 );	 
	 }
	  );

</script>

<?
    echo  br();
	echo br();
?>
<table>




<tr>
<td height="40" align="left" bgcolor="#00FFFF">

  <?=nbs(2)?>
  
  จำนวนทั้งหมด  <?=@$num?>  รายการ
  
  <?=nbs(50)?>
  
  | <a href="#" id="sub_first">&lt;&lt; First</a> |
  
       <select id="sub_all_page" name="sub_all_page">
          
            <option value="0">- - Page - -</option>
            <?
			    for($i=1;$i<=@$all_page;$i++)
				{
			?>
                   <option value="<?=$i?>"><?=$i?></option> 
            <?
			    } 
			?>
            
           
       </select>
   |     
       
  <a href="#" id="sub_last">Last &gt;&gt;</a> |
     <?=nbs(2)?>
  </td>
</tr>






<tr>
<td width="811" align="left">
   ( วัน เดือน ปี )  <?=$head_title?>
   
          
     <input name="sub_id_appendix"  id="sub_id_appendix" type="hidden"  />
     
 <?
    if( $sess_id_typeuser == 1 )
   {
 ?>    
     <button id="sub_ap_update">Update</button>
     <button id="sub_ap_delete">Delete</button>
 <?
    }
?>

	  <button id="preview_appendix">Preview Appendix</button>
      
      
        
   
   </td>
   
</tr>
<?
   foreach($tb_query->result() as $row)
   {
      //echo  $tb_name;
	  //echo br();
	    switch($tb_name)
		{
		      case 2:
		   {
		         $id_appendix_update=$row->id_appendix2;
				  $Diagnosis=$row->Diagnosis;
				//echo br();
		      break;
		   }
		   	  case 3:
		   {
		        $id_appendix_update=$row->id_appendix3;
				// echo br();
		      break;
		   }
		   	  case 4:
		   {
		        $id_appendix_update=$row->id_appendix4;
				// echo br();
		      break;
		   }
		   	  case 5:
		   {
		        $id_appendix_update=$row->id_appendix5;
				// echo br();
		      break;
		   }
              case 6:
		   {
		        $id_appendix_update=$row->id_appendix6;
				// echo br();
		      break;
		   }


		
		}
	  
	   $date_record=$row->date_record;
?>
<tr>
      <td>
         <input type="radio"  name="id_appendix1" id="sub_<?=$id_appendix_update?>" value="<?=$id_appendix_update?>"/>
         <?=$date_record?>&nbsp;<?=$Diagnosis?>
         
      </td>
</tr>



  <script type="text/javascript">
       $(function()
	   {
	      //alert(''+ $('#<?=$id_appendix1?>').val() );
		  $('#sub_<?=$id_appendix_update?>').click(function()
		      {  
			         // alert('' + <?=$id_appendix_update?>); 
						$('#sub_id_appendix').val(<?=$id_appendix_update?>);
			  }
		   );
	   }
	   );
  </script>



<?
   } 
?>

</table>


<div id="show_sub_appnedix" title=" Update appendix ">
</div>


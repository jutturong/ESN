<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>



<script type="text/javascript">
    $(function()
	{
		
		 $('#first').click(function()
		 {
		    // alert('t');
			 $('#result').load('<?=base_url()?>index.php/appendix/select_page_appendix1',{ 'select_page':1 });
		 }
		 );  //first
		 
		
		 $('#last').click(function()
		 {
		    $('#result').load('<?=base_url()?>index.php/appendix/select_page_appendix1',{ 'select_page':<?=$all_page?> });
		 }
		 );  //last
		 
		
		 $('#all_page').change(function()
		 {
		      //alert('t');
			   $('#result').load('<?=base_url()?>index.php/appendix/select_page_appendix1',{ 'select_page':$(this).val() });
		 }
		 );
		 
		 
		 
		 

	}
	);
</script>



<script type="text/javascript">
  $(function()
  {
      
	 
	  
	 // alert('t');
	  
	  $('#preview_app1').button( { text:true,icons:{ primary:'ui-icon-print' } } ).click(function()
	     {
		         
					 if(  $("#id_appendix1_hid").val() > 0  )  //alert('t');
										  { 
										      //alert('t');
						   // var  appen=$("#call_appendix").val();
					        var  id_appen=$("#id_appendix1_hid").val();

							//window.open("<?=base_url()?>../report_pdf/appendix_report/report_app.php?appen="  +  1 + "&id_appendix=" + id_appen ,"resizable=1");
							window.open("<?=base_url()?>../report_pdf/appendix_report/report_app.php?appen="  +  1 + "&id_appendix=" + id_appen ,"resizable=1");
							
//		window.open("<?=base_url()?>../report_pdf/appendix_report/report_app_modify1.php?appen="  +  $('#tb_appendix_index').val() + "&id_appendix=" + $('#sub_id_appendix').val() ,"resizable=1");	
		
						

										  }
										   
		 });
	  
	    $("#show_appnedix").dialog("destroy");
	  
	    $('#call_appendix').load('<?=base_url()?>index.php/appendix/select_appendix');  //select option appendix 2-6
		
		$('#call_appendix').change(function() //select option appendix 2-6
		{
		     //if(   $("#id_appendix1_hid").val() > 0   && $(this).val() > 0 )  //alert('t');
					 // {
								// alert('t');
								$('#tb_appendix_index').val($(this).val());
							    $('#call_appendixALL').load('<?=base_url()?>index.php/appendix/call_appendixALL',{  'id_appendix1':$("#id_appendix1_hid").val(),'tb_appendix':$(this).val() });	//******  query ไปยัง 
							
							
					//  }			 
		});
		
		



/*
$('#update').button({ text:true,icons:{ primary:'ui-icon-wrench'} }).click(function()
	   {
		   window.open('<?=base_url()?>index.php/appendix/update_appendix/' + $('#id_appendix1_hid').val() +'/1'   ,'',
			'left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
	   }
   );  //end click button update
   
*/   	


//-------------------------------------update  	
		
		
		$('#update').button({ text:true,icons:{ primary:'ui-icon-wrench'} }).click(function()
		            {
					  if(   $("#id_appendix1_hid").val() > 0  )  //alert('t');
					  { 
		
 
 								$('#show_appnedix').dialog(
									{ 
										width:1000
									   ,modal:true
										 
									}
								 ); 

                  // $("#show_appnedix").load('<?=base_url()?>index.php/appendix/update_appendix',{'id_appendix1':$('#id_appendix1_hid').val(),'appendix':1 });  
                   $("#show_appnedix").load('<?=base_url()?>index.php/appendix/update_appendix1_modify',{'id_appendix1':$('#id_appendix1_hid').val(),'appendix':1 });
						 
					  }	 
						 
						 
					 }
					        );
							
							
							
							
							
							
							
		$('#delete').button({ text:true,icons:{ primary:'ui-icon-trash'} }).click(function()
		{
   
		}
		);
		
		
		
/*		$('#report').button({ text:true,icons:{ primary:'ui-icon-print' } }).click(function()
		   {
		     
			    if( $("#call_appendix").val() > 0  &&  $("#id_appendix1_hid").val() > 0  )
				{
			 		  var  appen=$("#call_appendix").val();
					  var  id_appen=$("#id_appendix1_hid").val();
					    // window.location="<?=base_url()?>../report_pdf/appendix_report/report_app1.php";
		      			   window.open("<?=base_url()?>../report_pdf/appendix_report/report_app.php?appen="  +  appen + "&id_appendix=" + id_appen ,"resizable=1");
			    }    
				 
		   });
*/		   
		   
		   
		   
/*		 $('#preview').button({ text:true,icons:{ primary:'ui-icon-clipboard'} }).click(function()
		  {
		  
		  
			    if( $("#call_appendix").val() > 0  &&  $("#id_appendix1_hid").val() > 0  )
				{
			 		  var  appen=$("#call_appendix").val();
					  var  id_appen=$("#id_appendix1_hid").val();
					    // window.location="<?=base_url()?>../report_pdf/appendix_report/report_app1.php";
		      			   window.open("<?=base_url()?>../report_pdf/appendix_report/preview.php?appen="  +  appen + "&id_appendix=" + id_appen ,"resizable=1");
			    }    
		  
		  
		  
		  
		  }
		  ); 
*/		  
		   
		
		//รายละเอียดของ detail appendix
		
/*		$('#detail').button({ text:true,icons:{ primary:'ui-icon-flag'} }).click(function()
		 {
		        if( $("#call_appendix").val() > 0  &&  $("#id_appendix1_hid").val() > 0  )
				{
			         $('#show_appnedix').dialog(
					    { 
						    width:1000
						   ,modal:true
						     
						}
					   ); 
					   
					   $("#show_appnedix").load('<?=base_url()?>index.php/appendix/show_appnedix',{ 'id_appendix1':$('#id_appendix1_hid').val(),'appendix':$('#call_appendix').val()  });
					  
				}     
		 }
		);
*/		
		
		
		
		<?
		   if( @$call_page =="true_call" )
		   {
		      ?>
			       $('#all_page_app').load('<?=base_url()?>index.php/appendix/all_page_app'); 
			  <?
		   }
		?>
  }
  );
</script>
</head>

<body>


<?=br()?>
<?=br()?>
<?=br()?>
<?=br()?>
<?=br()?>


<table width="963">

<!--<tr>

<td width="327" height="30" align="right">&nbsp;Appendix &nbsp; <select id="call_appendix"></select>
  
  <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" size="5" maxlength="3" />
 
 <button id="detail">Detail</button>
 
 </td>
 
  <td width="299" align="left">
      <button id="report">Print</button> 
       <button id="preview">Preview 1-6</button> 
  </td> 






-->


<!--<td width="327" height="30" align="right">&nbsp;Appendix &nbsp; <select id="call_appendix"></select>-->


<tr>
<td width="683" align="center">

    <?
	
/*	$atts = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
			
	     echo anchor_popup('appendix/update_appendix/3209/1', 'Click Me!', $atts);
*/	
	
	?>
    
    
    <button id="preview_app1">preview appendix 1</button>
    
    
    
     <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" size="7" maxlength="10" />
     
&nbsp;Appendix &nbsp; <select id="call_appendix" name="call_appendix">

</select>   
    
    
     <input name="tb_appendix_index" type="hidden" id="tb_appendix_index" size="5" maxlength="5" />

     
 <?
   if( $sess_id_typeuser == 1 )
   {
?>
<td width="123" height="30" align="center"><button id="update">Update</button></td>
<td width="141" height="30" align="center"><button id="delete">Delete</button></td>

<!--<td width="114" align="center">
<span id="all_page_app"></span>
</td>
-->
  
<?
    }
?>
    
     

</tr>

</table>

<table width="671" class="bordertable1">

<tr>
<td height="40" align="left" bgcolor="#00FFFF">

  <?=nbs(2)?>
  
  จำนวนทั้งหมด  <?=@$num?>  คน 
  
  <?=nbs(50)?>
  
  | <a href="#" id="first">&lt;&lt; First</a> |
  
       <select id="all_page" name="all_page">
          
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
       
  <a href="#" id="last">Last &gt;&gt;</a> |
     <?=nbs(2)?>
  </td>
</tr>
<?
foreach($tb_appendix->result() as $row)
{
    $id_appendix1=$row->id_appendix1;
	$name=$row->name;
	$ep_no=$row->ep_no;
	$surname=$row->surname;
	$HN=$row->HN;
?>
<tr>
<td width="672" height="30" colspan="4" align="left" valign="middle">&nbsp;&nbsp;

     
  <input type="radio"  name="id_appendix1" id="<?=$id_appendix1?>" value="<?=$HN?>"/>&nbsp;&nbsp;
  
  (Epilepsy No.<?=$ep_no?>)
  <?=nbs(2)?>
  <?=$name?>&nbsp;&nbsp;<?=$surname?>&nbsp;[<?=$HN?>]
  
  
  </td>
</tr>

  <script type="text/javascript">
       $(function()
	   {
	      //alert(''+ $('#<?=$id_appendix1?>').val() );
		  $('#<?=$id_appendix1?>').click(function()
		      {  
			       //  alert('' + <?=$id_appendix1?>); 
					$('#id_appendix1_hid').val('<?=$HN?>');
			  }
		   );
	   }
	   );
  </script>

<?
}
?>






</table>

<div id="show_appnedix" title=" แสดงรายละเอียดของ appendix ">
</div>

<div id="call_appendixALL">
</div>

</body>
</html>

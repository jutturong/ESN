<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
  $(function()
  {
      //alert('t');
	    $("#show_appnedix").dialog("destroy");
	  
	    $('#call_appendix').load('<?=base_url()?>index.php/appendix/select_appendix');
		$('#update').button({ text:true,icons:{ primary:'ui-icon-wrench'} }).click(function()
		            {
					  if( $("#call_appendix").val() > 0  &&  $("#id_appendix1_hid").val() > 0  )  //alert('t');
					  { 
								$('#show_appnedix').dialog(
									{ 
										width:1000
									   ,modal:true
										 
									}
								 ); 
		
								 $("#show_appnedix").load('<?=base_url()?>index.php/appendix/update_appendix',{'id_appendix1':$('#id_appendix1_hid').val(),'appendix':$('#call_appendix').val() });  
						 
					  }	 
						 
						 
					 }
					        );
							
		$('#delete').button({ text:true,icons:{ primary:'ui-icon-trash'} }).click(function(){});
		
		$('#report').button({ text:true,icons:{ primary:'ui-icon-print' } }).click(function()
		   {
		     
			    if( $("#call_appendix").val() > 0  &&  $("#id_appendix1_hid").val() > 0  )
				{
			 		  var  appen=$("#call_appendix").val();
					  var  id_appen=$("#id_appendix1_hid").val();
					    // window.location="<?=base_url()?>../report_pdf/appendix_report/report_app1.php";
		      			   window.open("<?=base_url()?>../report_pdf/appendix_report/report_app.php?appen="  +  appen + "&id_appendix=" + id_appen ,"resizable=1");
			    }    
				 
		   });
		   
		 $('#preview').button({ text:true,icons:{ primary:'ui-icon-clipboard'} }).click(function()
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
		
		//รายละเอียดของ detail appendix
		$('#detail').button({ text:true,icons:{ primary:'ui-icon-flag'} }).click(function()
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

<tr>
<!--<td width="150" height="30" align="center">ชื่อ - นามสกุล</td>-->
<td width="327" height="30" align="right">&nbsp;Appendix &nbsp; <select id="call_appendix"></select>
  
  <input name="id_appendix1_hid" type="hidden" id="id_appendix1_hid" size="5" maxlength="3" />
 
 <button id="detail">Detail</button>
 
 </td>
 
  <td width="299" align="left">
      <button id="report">Print</button> 
       <button id="preview">Preview 1-6</button> 
  </td> 


<?
   if( $sess_id_typeuser == 1 )
   {
?>
<td width="114" height="30" align="center"><button id="update">Update</button></td>
<td width="85" height="30" align="center"><button id="delete">Delete</button></td>

<td width="114" align="center">
<span id="all_page_app"></span></td>
  
<?
    }
?>



<!--<td width="81" height="30" align="center"><button>Search</button></td>
-->

</table>

<table class="bordertable1">
<?
foreach($tb_appendix->result() as $row)
{
    $id_appendix1=$row->id_appendix1;
	$name=$row->name;
	$surname=$row->surname;
	$HN=$row->HN;
?>
<tr>
<td width="585" height="30" colspan="4" align="left" valign="middle">&nbsp;&nbsp;
  <input type="radio"  name="id_appendix1" id="<?=$id_appendix1?>" value="<?=$id_appendix1?>"/>&nbsp;&nbsp;<?=$name?>&nbsp;&nbsp;<?=$surname?>&nbsp;[<?=$HN?>]</td>
</tr>

  <script type="text/javascript">
       $(function()
	   {
	      //alert(''+ $('#<?=$id_appendix1?>').val() );
		  $('#<?=$id_appendix1?>').click(function()
		      {  
			        //alert('' + <?=$id_appendix1?>); 
					$('#id_appendix1_hid').val(<?=$id_appendix1?>);
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

</body>
</html>

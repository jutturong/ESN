   <?
        $send_sys=$this->uri->segment(3);
	    $id_appendix1=$this->uri->segment(4);
		
		   $sess_num = $this->session->userdata('sess_num'); 
		//echo br();
   ?>
<script type="text/javascript">
$(function()
{
<?
    if(  $send_sys == 'appendix1_false'  )  //'appendix1_false' appendix 1 มีการบันทึกข้อมูลซ้ำ
	{
?>
       //alert('false insert appendix1');
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
				             {      
							     $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':1 });		
							 });
			});
<?
    }
	elseif(  $send_sys == 'appendix1_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	     
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 1 แล้ว ',function(e)
				             {      
							    // $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':2,'id_appendix1':'<?=$id_appendix1?>' }); //ของเดิม
								  
								  $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
								  
							 });
			});
	  
	  
	  
	  
	  
	   <?
	}
	elseif(  $send_sys == 'appendix2_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาบันทึกข้อมูลใน Appendix 2 อีกครั้ง !! ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':2,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix2_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 2 แล้ว  ',function(e)
				             {      
							      //$('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								    $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix3_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาบันทึกข้อมูลใน Appendix 3 อีกครั้ง !! ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix3_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 3 แล้ว  ',function(e)
				             {      
							     // $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':4,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								    $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix4_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาบันทึกข้อมูลใน Appendix 4 อีกครั้ง !! ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix4_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 4 แล้ว  ',function(e)
				             {      
							     // $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':5,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								    $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix5_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาบันทึกข้อมูลใน Appendix 5 อีกครั้ง !! ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':5,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix5_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 5 แล้ว ',function(e)
				             {      
							     // $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':6,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								    $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix6_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' เกิดข้อผิดพลาดในการบันทึกข้อมูล กรุณาบันทึกข้อมูลใน Appendix 6 อีกครั้ง !! ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':5,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix6_true'  &&  $id_appendix1 > 0 ) //'appendix1_true' appendix 1 มีการบันทึกข้อมูล
	{
	   ?>
	      Ext.onReady(function()
		    { 
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูล Appendix 6 แล้ว ',function(e)
				             {      
							     // $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								    $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 });
							 });
			});
	   <?
	}
   elseif( $send_sys == 'update_tb_appendix1' &&  $id_appendix1 > 0 ) //หลังจาก update appendix1,2,3,4
	{
		   ?>
		       Ext.onReady(function()
			   {
			    //alert('t');
				//$('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1 });
				// $('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':'<?=$id_appendix1?>' });
				     Ext.MessageBox.confirm('สถานะการปรับปรุงข้อมูล',' ปรังปรุงข้อมูล appendix  แล้ว ',function(e)
				             {      
							     // $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								   $('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':'<?=$id_appendix1?>' });
							 }); 
				}
				);
		   <?
	  }
	elseif( $send_sys == 'all_user_true'  )
	{
	      ?>
					  Ext.onReady(function()
						   {
						      // alert('t');
							  
									 Ext.MessageBox.confirm('สถานะการปรับปรุงข้อมูล',' ปรังปรุงข้อมูลของผู้ใช้ระบบแล้ว(user)',function(e)
											 {      
											 			$('#result').load('<?=base_url()?>index.php/home/load_home_admin/',{ 'admin':'home_admin' });	
											 }); 
							  
							  
							  
						   }
						                   );
		  <?
	} 
	elseif( $send_sys == 'update_tb_appendix_true'  )  //update  tb_appendix2
	{
	   ?> 
						  Ext.onReady(function()
						   {
						      // alert('t');
							  
									 Ext.MessageBox.confirm('สถานะการปรับปรุงข้อมูล',' ปรังปรุงข้อมูลของ Appendix  แล้ว',function(e)
											 {      
											 		//	$('#result').load('<?=base_url()?>index.php/home/load_home_admin/',{ 'admin':'home_admin' });	
						 $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 }); //ปรับปรุงข้อมูลของ tb_appendix2 แล้ว
											 }); 
							  
							  
						   }
						                   );

	   <? 
	}
	
		elseif( $send_sys == 'update_tb_appendix_false'  )  //update  tb_appendix2
	{
	   ?> 
						  Ext.onReady(function()
						   {
						      // alert('t');
							  
									 Ext.MessageBox.confirm('สถานะการปรับปรุงข้อมูลผิดพลาด',' ปรังปรุงข้อมูลของ Appendix 2 ผิดพลาด',function(e)
											 {      
											 		//	$('#result').load('<?=base_url()?>index.php/home/load_home_admin/',{ 'admin':'home_admin' });	
									 $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1 }); //ปรับปรุงข้อมูลของ tb_appendix2 แล้ว
											 }); 
							  
							  
						   }
						                   );

	   <? 
	} 
	
			elseif( $send_sys == 'delete_tb_appendix'  )  //update  tb_appendix2
	{
	   ?> 
						  Ext.onReady(function()
						   {
						      // alert('t');
							  
									 Ext.MessageBox.confirm('สถานะการลบข้อมูลใน Appendix',' ลบข้อมูลใน Appendix',function(e)
											 {      
											 		//	$('#result').load('<?=base_url()?>index.php/home/load_home_admin/',{ 'admin':'home_admin' });	
									               $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 }); //ปรับปรุงข้อมูลของ tb_appendix2 แล้ว
											 }); 
							  
							  
						   }
						                   );

	   <? 
	} 

 
	?>
  
}
); 
    
</script>  
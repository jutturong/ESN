   <?
        $send_sys=$this->uri->segment(3);
	    $id_appendix1=$this->uri->segment(4);
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลแล้ว ไปยัง appendix 2  ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':2,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
								  
							 });
			});
	  
	  
	  
	  
	  
	   <?
	}
	elseif(  $send_sys == 'appendix2_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลแล้ว ไปยัง appendix 3  ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':3,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix3_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลแล้ว ไปยัง appendix 4  ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':4,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix4_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลแล้ว ไปยัง appendix 5  ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':5,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix5_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลแล้ว ไปยัง appendix 6 ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/home/load_appendix',{ 'appendix':6,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
							 });
			});
	   <?
	}
	elseif(  $send_sys == 'appendix6_false'   ) 
	{
	   ?>
	      Ext.onReady(function()
		    { 
			      Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' มีการบันทึกข้อมูลซ้ำ หรือ เกิดข้อผิดพลาดในการบันทึกข้อมูล ระบุ ขื่อ-นามสกุล HN !! ',function(e)
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
			       Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล',' บันทึกข้อมูลครบทุก appendix แล้ว ',function(e)
				             {      
							      $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1,'id_appendix1':'<?=$id_appendix1?>' });
								  //$("#prov_id_ap2").load('<?=base_url()?>index.php/home/load_province',{ 'prov_id': 1023 });
							 });
			});
	   <?
	}
    ?>
	
	
	

}
  );       
  
 
 
//===============> uddate appendix 1  =   $send_sys=$this->uri->segment(3); update_appendix1
$(function()
{
    //alert('t');
	<?
	    if( $send_sys == 'update_tb_appendix1' )
		{
		   ?>
		        alert('t');
				//$('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1 });
				// $('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':'<?=$id_appendix1?>' });
		   <?
		}
	?>
	//$('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':1 });
}
); 
    
</script>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<script type="text/javascript">
  $(function() //dialog user
    {
	    $('#dia_update_user').dialog('destroy');
		
	
	}
   );
  
  
   $(function()
   {
       //alert('t');
	     $('#btn_adduser').button({ text:true,icons:{ primary:'ui-icon-circle-plus'} }).click(function()
		   {
		      //alert('t');
			      $('#dia_insert_user').load("<?=base_url()?>index.php/admin/load_form_insert/");	
				  
				  
				  	      $('#dia_insert_user').load("<?=base_url()?>index.php/admin/load_form_user/");					
			  
									 $('#dia_insert_user').dialog(
											{
												 modal:true,
												 width:700
												// heigth:500
											}
																  );



				  
		   }
		  );
		
		 
		 
		  $('#up_update').button({ text:true,icons:{ primary:'ui-icon-wrench'} }).click(function()
		  {
		      
			  		 if( $('#id_user_hide').val() > 0 )
						{		
							  // var  id_user=$('#id_user_hide').val();
							  $('#dia_update_user').load("<?=base_url()?>index.php/admin/load_form_user_forupdate/",{ id_user:$('#id_user_hide').val() });					
			  
									 $('#dia_update_user').dialog(
											{
												 modal:true,
												 width:700
												// heigth:500
											}
																  );
												  
						 }						  
			    
		  }
		    );
		  $('#up_delete').button({ text:true,icons:{ primary:'ui-icon-power'} }).click(function()
		     {
			    //alert('t');
						if( $('#id_user_hide').val() > 0 )
						{		
								
								 Ext.onReady(function()
								 {
									  // Ext.MessageBox.confirm('Delete user in System','คุณต้องการลบ user หรือไม่');
									  Ext.MessageBox.show({
													  title:'Delete user in System',
													  //width:100
													  msg:' คุณต้องการ block User ใช่หรือไม่ ',
													  buttons:Ext.MessageBox.YESNO,
													  fn:function(btn)
													    {
														   if( btn == 'yes' )
														   {
																	 //alert('t');
																	 var  id_user=$('#id_user_hide').val();
																	 window.location='<?=base_url()?>index.php/admin/block_user_jquery/' + id_user;
														   } 	 
													    }
														   });
								 }
									          );
									   
						 }
						 
						 			   
			 }); 


		  $('#up_allow').button({ text:true,icons:{ primary:'ui-icon-check'} }).click(function()
		     {
						if( $('#id_user_hide').val() > 0 )
						{		
								
								 Ext.onReady(function()
								 {
									  // Ext.MessageBox.confirm('Delete user in System','คุณต้องการลบ user หรือไม่');
									  Ext.MessageBox.show({
													  title:'Allow user in System',
													  //width:100
													  msg:' คุณต้องการอนุญาต user ใช่หรือไม่ ',
													  buttons:Ext.MessageBox.YESNO,
													  fn:function(btn)
													    {
													         //alert('t');
															
															if( btn == 'yes' )
															{
																	 var  id_user=$('#id_user_hide').val();
																	 window.location='<?=base_url()?>index.php/admin/allow_user_jquery/' + id_user;
															 }
															 
															 
													    }
														   });
								 }
									          );
									   
						 }
						 
						 			   
			 }); 


			 
   }
    );
</script>

</head>

<body>

<?
   echo br();
   echo	br();
?>

<table width="978" border="0" cellpadding="1" cellspacing="1" class="bordertable1">
   
   <tr>
      <td height="30" colspan="3" align="center" valign="middle">
      &nbsp;    
     
      <input name="id_user_hide" type="hidden" id="id_user_hide" size="5" maxlength="5" />
      
     <button id="btn_adduser">Add User</button>
     <button id="up_update">Update</button>
      <button id="up_delete">Block</button>
      <button id="up_allow">Allow</button>
      
      </td>
   </tr>

  <tr class="bordertable1">
    <td width="322" height="35" align="center" valign="middle">&nbsp;ชื่อ - นามสกุล </td>
    <td width="274" height="30" align="center" valign="middle">&nbsp;สิทธิ์การใช้งาน(&nbsp;<img src="<?=base_url()?>images/admin.png" width="20" border="1" />&nbsp;admin/&nbsp;<img src="<?=base_url()?>images/user.png" width="20"  border="1"/>user)</td>
    
    
    <td width="372" height="30" align="center" valign="middle">&nbsp;  
    สถานะการเข้าใช้งาน ( Yes อนุญาติ / No ไม่อนุญาติ )    </td>
    
    
<!--    <td width="71" height="30">&nbsp;  delete</td>
-->    
    
  </tr>
  
 <?
     //$a=0;
    foreach($tb_->result() as $row )
	{
	    // echo  ++$a;
		// echo br();
	   $id_user=$row->id_user;
	  //echo br();
	   $id_typeuser=$row->id_typeuser; //1=admin,2=user
	   $user=$row->user;
	   $password=$row->password;
	   $name=$row->name;
	   $id_province=$row->id_province;
	   $prov_name=$row->prov_name;
	   $enable_user=$row->enable_user;  //อนุญาติการใช้งาน t=อนุญาต
	   
	   
	   
 ?> 
  <tr <?php if( $sess_id_user == $id_user ) { ?>  bgcolor="#FF00FF" <?php } else{ ?> bgcolor="#FFFFFF" <?php } ?> >
    <td height="30">
          &nbsp;
          
          
          <input name="id_user" type="radio"  id="<?=$id_user?>" value="<?=$id_user?>" />
          
          <?=$name?>    
          &nbsp;
          [
          <?=$user?>
          ]
          &nbsp;
          <font color="#FF0000">
          <?=$prov_name?>
          </font>
          </td>
    <td height="30" align="center" valign="middle">&nbsp;
     <?
	     switch($id_typeuser)
		 {
	           case 1:
			   {
			         ?>
                          <img src="<?=base_url()?>images/admin.png" width="25" border="1" />
                     <?
					 break;
			   }
			   case 2:
			   {
			        ?>
                   		 <img src="<?=base_url()?>images/user.png" width="25" border="1"/>
                    <?
					break;
			   }
	     }
	 ?>    </td>
     
     
     
    <td height="30" align="center" valign="middle">&nbsp;
      <?
           switch($enable_user)
		   {
		        case 't':
				{
				    echo"Yes";
				   break;
				}
				default :
				{
				    echo "No";
				   break;
				}
		   
		   }
	  ?>    </td>
    
    
<!--    <td height="30">&nbsp;
    </td>
-->    
    
    
  </tr>
  
   <script type="text/javascript">
       $(function()
	   {
	     // alert('t');
		  $('#<?=$id_user?>').click(function()
		     { 
			     // alert(''+<?=$id_user?>); 
				  $('#id_user_hide').val('<?=$id_user?>');
			 });
	   }
	   );
  </script>
  
  <?
    }
  ?>
  
</table>



<!--dialog  update user-->
<div id="dia_update_user" title=" Update ข้อมูลของ user ">
</div>

<!--dialog  insert user-->
<div id="dia_insert_user" title=" insert ข้อมูลของ user ">
</div>


</body>
</html>

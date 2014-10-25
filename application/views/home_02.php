<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>images/favicon.ico">


<link href="<?=base_url()?>styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
 @import url("<?=base_url()?>style_table.css");
</style>

<title><?=$title?></title>

<?PHP //$this->load->view('import_ext')?>
<?PHP $this->load->view('import_jquery')?>
<?PHP //$this->load->view('send_system')?>
<?PHP //$this->load->view('import_dhtml')?>

<!--
<script type="application/javascript" src="<?=base_url()?>jquery.maskedinput-1.3.js"></script>
-->

<script type="text/javascript">
    $(function()
	   {
      		  <?
					 if( $begin_load != "" )
					 {
						 ?>
						    //  $("#result").load('<?=base_url()?>index.php/home/load_begin_page');
						 <?
					 }
			  ?>    
	    }
	  );
	  
<!--##################################  select disable  textarea-->
		function  select_other(id_select,value,text)
		{
		
					 $(id_select).click(function()
						  { 
								if( $(id_select).val() == value )
								{
									   alert(''+ value );
									 $(text).attr('disabled',false);
									 $(text).select();
								}

						  }
					  );	

                    // alert(''+  id_select);
		}  
<!--##################################  select disable  textarea-->	  
	  	  
/*	  
    Ext.onReady(function(){
		   var  online=new Ext.form.FormPanel({
		          title:'จำนวนสมาชิก online : <?=$num_online?>  คน'
				  //,renderTo:Ext.get('online')
				  ,renderTo:Ext.get('result')
		          ,width:270
		          ,heigth:30
				  ,cls:'label1'
				  ,items:[
				       {     
				              xtype:'fieldset'
							 ,title:'ข้อมูลสมาชิก'
							 ,checkboxToggle:true
							 ,collapsed:false
							 ,width:250
							 ,labelWidth:80
							 ,autoHeight:false
							 ,items:[
							          {
												xtype:'compositefield'
											   ,fieldLabel:'ชื่อสมาชิก '
												,items:
												   [
													 {
														 xtype:'displayfield'
														,value:'<?=$sess_name?>'
													 }
												   ]
										}   
							        ]
				       }
				         ]
		                                       });

	          });
			  
*/			  
	  
</script>



</head>
<!--
<body bgcolor="#CCCCCC"  onLoad="show_clock()" >
-->
    <body bgcolor="#CCCCCC"   >
<table width="1231" border="0" >
  <tr>
    <td width="1225" align="center" valign="top">
    <?PHP
         $this->load->view('topMenu/topMenu');
     ?>    
    </td>
  </tr>
  
 
 
  <tr>
  <td height="30" align="left" valign="middle" >
  &nbsp;&nbsp;
 <!--============================= autocomplete-->  
<div class="suggestionsBox" id="suggestions" style="display: none; margin-left:400px;" >
	 <img src="<?=base_url()?>images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
	    <div class="suggestionList" id="autoSuggestionsList">
        </div>
</div>
  <!--============================= autocomplete-->
  </td>
  </tr>
  
  
  
  
  <tr>
    <td height="607" align="center" valign="top" class="bordertable1">
    &nbsp;
      <div id="result"></div>
          </td>
  </tr>
</table>
</body>
</html>

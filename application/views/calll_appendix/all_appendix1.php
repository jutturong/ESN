<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
    Ext.onReady(function()
	  {
	      //alert('t');
		  
		   var  all_content=new Ext.form.FormPanel({
		          renderTo:'content',
				  width:1000,
				  title:'<?=$title?>',
				  plain:true,
					items: 
										   new Ext.TabPanel({
															autoTabs:true,
															activeTab:0,
															deferredRender:false,
															border:false
														}),		
				   
		   });
	  }
	);
</script>
</head>

<body>
<div id="content"></div>
</body>
</html>

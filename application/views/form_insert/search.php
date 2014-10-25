<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<script type="text/javascript">
  Ext.onReady(function()
  {
      
	  var  combo_auto=new Ext.form.ComboBox({
							   displayField:'state',
							   fieldLabel:'ระบบค้นหาติดตาม ',
							  // store:[[1,'HN'],[2,'เลขที่บัตรประชาชน'],[3,'ชื่อ'],[4,'นามสกุล']],
							   id:'combo_auto',
							   name:'combo_auto',
							   typeAhead:true,
							   mode:'local',
							   forceSelect:true,
							   triggerAction:'all',
							   emptyText:'Search..',
							   selectOnFocus:true
	  });
	  
	  
	   var  combo=new Ext.form.ComboBox({
	           displayField:'state',
			   fieldLabel:'ระบบค้นหาติดตาม ',
			   store:[[1,'HN'],[2,'เลขที่บัตรประชาชน'],[3,'ชื่อ'],[4,'นามสกุล']],
			   id:'combo',
			   name:'combo',
	           typeAhead:true,
	           mode:'local',
			   forceSelect:true,
			   triggerAction:'all',
			   emptyText:'Search..',
			   selectOnFocus:true,
	           listeners:{ 
			   				'select':function()
							         { 
												
												var  win=new Ext.Window({
												              title:' .:: ระบบค้นหา EEC System ::. ',
															  layout:'form',
															  closeAction:'hide',
															  labelWidth:110,
															//  plain:true,
												              width:500,
															  frame:true,
															  height:150,
															  defaults:{ width:100 },
															 // defaultType:'textfield',
															  items:[
//															           {
//																	      fieldLabel:'Search'
//																	   }
																			combo_auto
															        ]
															         ,
																buttons:[
																          {
																             text:'ค้นหา ',
																			 iconCls:'Add16',
																			 scale:'medium'    
																          }
																		  ,
																		  {
																		     text:'ปิดหน้าต่าง ',
																			 iconCls:'add-close',
																			 scale:'medium',
																			 handler:function()
																			 {
																			   //alert('t');
																			   win.close();
																			 }
																		  }
																]		 
												
																		});	
													win.show();					 
									 }
			   			  } 
								
								   });
								
 
	   var  sr1=new Ext.FormPanel({
	           title:'ค้นหาประวัติคนไข้ HN,เลขที่บัตรประชาชน,Appendix1,Appendix2',
	           renderTo:Ext.get('search'),
			   width:500,
			   frame:true,
			   id:'select_itmes',
			  // defaultType:'radio',
			   items:[
                        {
						    xtype:'fieldset',
						    title:'HN,เลขที่บัตรประจำตัวประชาชน,ชื่อ,นามสกุล',
							checkboxToggle:true,
							collapsible:false,
							autoHeight:true,
							autoWidth:true,
							defaults:{ width:100 },
							defaultType:'radio',
							waitMsgTarget:true,
						     waitMsg:'Loading',
							 items:[
                                     combo
							       ]
						}
	                  ]//--items sr1
	  							 });//--- end sr1
  
 
 
 
 //----------------end  onready
  });

</script>

</head>

<body>
<div id="search"></div>
</body>
</html>

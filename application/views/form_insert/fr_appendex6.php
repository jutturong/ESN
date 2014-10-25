<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
     Ext.onReady(function(){
	 	              var  app4=new Ext.FormPanel({
				         renderTo:Ext.get('fr_appendix6'),
				         title:'<?=$appendix?> <?=$name?>',
						 border:true,
						 frame:true,
						 width:800,
						 labelWidth:300,
				         url:'<?=base_url()?>index.php/appendix/insert_appendix4/',
						 defaultType:'textfield',
						 items:[
						     {
					     xtype:'compositefield'
						,fieldLabel:'จำนวนผู้ป่วยในฐานข้อมูล '
					    ,items:[
								  {
								      xtype:'displayfield'
									  ,value:'<?=$total_?> คน'
								  }
						       ] 
					}
					,		 
							 {
							    fieldLabel:'HN '
							    ,name:'HN'
								,width:60
								,maxLength:6
								,minLength:2
								,allowBlank:false
								,msgTarget:'side'
							 } 
							 ,
							 {
							     fieldLabel:'เลขที่บัตรประชาชน ',
								 name:'',
								 width:100,
								 maxLength:13,
								 minLength:3,
								 width:100,
								 msgTarget:'side',
								 allowBlank:false
							 
							 }
							 ,
							 {
							      xtype:'fieldset'
								 ,title:'ชื่อ - นามสกุล '
								 ,checkboxToggle:true
								 ,collapsed:false
								 ,autoHeight:false
								 ,items:[
                                          {
										      xtype:'compositefield'
											  ,fieldLabel:'ชื่อ - นามสกุล'
											  ,msgTarget:'under'
											  ,items:[
											      {
												      xtype:'textfield'
													  ,name:''
													  ,width:100
													  ,maxLength:20
													  ,minLength:3
													  ,allowBlank:false
												  }
												  ,
												  {
												       xtype:'displayfield'
													  ,value:' - '
												  }
												  ,
												  {
												        xtype:'textfield'
													   ,name:''
													   ,width:150
													   ,maxLength:30
													   ,minLength:10
													   ,allowBlank:false
												  }
											  ]
										  }
							            ]
							 }
							 							 ,
							 {
							     xtype:'fieldset'
								,title:'เพศ'
								,checkboxToggle:true
								,collapsed:false
								,autoHeight:false
								,items:
								[
								   {
								       xtype:'radiogroup'
									   ,fieldLabel:'เพศ'
									   ,items:[
									             {
												     boxLabel:'ชาย',
													  name:'',
													  inputValue:1
													 // msgTarget:'under'
									              }
												  ,
												  {
												     boxLabel:'หญิง'
													 ,name:''
													 ,inputValue:2
												  }
									          ]
								   }
								]
							 }
							 ,
							 {
							     xtype:'textarea'
								 ,name:''
								 ,fieldLabel:'ที่อยู่ '
								 ,width:400
								 ,height:40
							 }
							 ,
							 {
							     xtype:'textfield'
								,fieldLabel:'เบอร์โทรศัพท์ '
								,width:90
								,maxLength:10
								,minLength:9
								,emptyText:'(08X)-XXXXXXX'
								,maskRe:/[0-9]/i
							 }
							 ,
							 {
							             xtype:'compositefield'
							            ,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด (dd/mm/25yy)' 
										,items:
							               [
										        {
							    xtype:'datefield'
								,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด (dd/mm/25yy) '
								,name:''
								                 }
//												 ,
//												 {
//												     xtype:'displayfield'
//													 ,value:'อายุ '
//												 }
//												 ,
//												 {
//												     xtype:'textfield'
//													 		,width:30
//													,maxLength:10
//													,minLength:9
//													,maskRe:/[0-9]/i
//												 }
//												 ,
//												 {
//												      xtype:'displayfield'
//													 ,value:'ปี'
//												 }
								            ]
							 }
							 ,
					 {
						 xtype:'compositefield'
						 ,fieldLabel:'อายุ (ปี-เดือน-วัน)'
						 ,items:[
						     {
									    xtype:'textfield'
			//						   ,fieldLabel:'อายุ (ปี-เดือน-วัน) '
									   ,maxLength:3
									   ,minLength:1
									   ,width:30
									   ,maskRe:/[0-9]/i
						      }
							  ,
							  {
							     xtype:'displayfield'
								 ,value:'-'
							  }
							  ,
							  {
					   				    xtype:'textfield'
			//						   ,fieldLabel:'อายุ (ปี-เดือน-วัน) '
									   ,maxLength:2
									   ,minLength:1
									   ,width:30
									   ,maskRe:/[0-9]/i
							  }
						       							  ,
							  {
							     xtype:'displayfield'
								 ,value:'-'
							  }
 								,
 							  {
					   				    xtype:'textfield'
			//						   ,fieldLabel:'อายุ (ปี-เดือน-วัน) '
									   ,maxLength:2
									   ,minLength:1
									   ,width:30
									   ,maskRe:/[0-9]/i
							  }

								 ]
						   
						   
						  
					 }
							 							 ,
							 {
							    xtype:'datefield'
								,fieldLabel:'วัน-เดือน-ปี พ.ศ. (dd/mm/25yy) ที่เสียชีวิต '
								,name:''
							 }
							 ,
							 {
							     xtype:'textarea'
								 ,fieldLabel:'สาเหตุการเสียชีวิต '
							     ,width:300
								 ,height:40
							 }
//------------------end  items
                                   ]
								   ,						
								    buttons:[
						       {
							       text:'บันทึก',
								   scale:'medium',
								   iconCls:'add16',
								   handler:function(){
								       app3.getForm().submit({
									   
									   
									   
									                         })
								   
								   
								   }
							   }
							   ,
							   {
							        text:'ล้าง',
									scale:'medium',
									iconCls:'add-close'
									,handler:function(){
									
									     app3.getForm().reset();
									}
							   }
				                  ]
								                                         });
											});							 
</script>
</head>

<body>
 <div id="fr_appendix6"></div>
</body>
</html>

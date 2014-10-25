<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>


<script type="text/javascript">
Ext.onReady(function()
{
          var   app2=new Ext.FormPanel({
		         labelWidth:330
				 ,border:true
				 ,frame:true
				 ,width:750
				 ,renderTo:Ext.get('fr_appendix2')
				 ,title:'<?=$appendix?> <?=$name?>'
				 ,url:'<?=base_url()?>index.php/appendix/insert_appendix2/'
				 ,defaultType:'textfield'
				  ,cls:'label1'
				 ,items:[
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
																		   fieldLabel:'HN ',
																	       xtype:'textfield',
																		   name:'HN',
																		   allowBlank:false,
																		   msgTarget:'side',
																		   minLength:3,
																		   maxLength : 6,
																		   width: 50
					  }
					  ,
					  {
					        fieldLabel:'เลขที่บัตรประชาชน ',
										   msgTarget:'side',
																		   minLength:3,
																		   maxLength : 13,
																		   width: 100,
																		    allowBlank:false,
																			msgTarget:'side'
					  }
					  ,
					  {
					      					      xtype:'fieldset'
						  ,title:'ชื่อ - นามสกุล'
                          ,collapsible:false
						  ,checkboxToggle:true
						  ,msgTarget:'side'
						  ,items:[
						  						          {
								      xtype: 'compositefield'
									  ,fieldLabel:'ชื่อ - นามสกุล '
									 ,msgTarget:'under'
									 ,items:[
									       { xtype:'textfield',name:'',allowBlank:false ,width:100,maxLength:20,minLength:2} 
										   ,{ xtype:'displayfield',value:'-'  }  
										   ,{  xtype:'textfield',name:'',allowBlank:false,width:150,maxLength:25,minLength:2 }
									         ]
								  } 
						  ]

					  }
,					  
					 {
//						     xtype:'fieldset',
//							 checkboxToggle:true,
//							 title:'เพศ',
//							 autoHeight:false,
//							  collapsed:false,
//							  items:[
//							           {
									      xtype:'radiogroup',
									      fieldLabel:'เพศ ',
										  items:[
										           {
												      boxLabel:'F หญิง',
													  name:'sex',
													  inputValue:2,
													  msgTarget:'under'
												   },
												   {
										               boxLabel:'M ชาย',
													   name:'sex',
													   inputValue:1,
													   msgTarget:'side'
										           } 
										         ]
//									    }
										
//									]
						   
					 }
					 ,
					 					 {
					     xtype:'textarea',
						 fieldLabel:'ที่อยู่ ',
					     name:'',
						// maxLength:500,
						 width:300,
						 height:40,
						 allowBlank:false,
						 msgTarget:'side'
					 }
					 ,
					 {
					    fieldLabel:'เบอร์โทรศัพท์ '
						,emptyText:'(08X)-XXXXXXX'
						,maskRe:/[0-9]/i
						//,maskRe:/[a-z]/i
						,msgTarget:'side'
						,minLength:3
						,maxLength:10
					    ,allowBlank:false
						
					 }
					 ,
					 {
					     xtype:'datefield'
						 ,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด (dd/mm/25yy) '
						//,anchor:'100%'
					     ,allowBlank:false
						 ,msgTarget:'side'
					 }
//					 ,
//					 {
//					       xtype:'combo'
//						  ,fieldLabel:'อายุ (ปี) '
//						  ,width:50
//						  ,store:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100]
//						  ,modal:'local'
//						  ,displayField:'value'
//						  ,allowBlank:false
//						  ,msgTarget:'side'
//						  ,triggerAction:'all'
//					 }
                        
						
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
						       	    fieldLabel:'จำนวนครั้งของอาการชักในช่วง 1 เดือนที่ผ่านมา ( ครั้ง / เดือน ) '
						             ,width:30
									 ,minLength:1
									 ,maxLength:3
									 ,maskRe:/[0-9]/i
						  }
						                            ,
						  {
						       	    fieldLabel:'ระยะเวลาที่เป็นเมื่อเทียบกับครั้งก่อน '
						             ,width:50
									 ,minLength:1
									 ,maxLength:3
									// ,maskRe:/[0-9]/i
						  }
						  						                            ,
						  {
						       	      xtype:'textarea'
									 ,fieldLabel:'ระดับความรุนแรงของอาการชักเมื่อเทียบกับครั้งก่อน '
						             ,width:300
									 ,height:40
									// ,minLength:1
									// ,maxLength:3
									// ,maskRe:/[0-9]/i
						  }
						  						                            ,
						  {
						       	     // xtype:'textarea'
									 fieldLabel:'น้ำหนัก ( กิโลกรัม ) '
						             ,width:30
									 ,minLength:1
									 ,maxLength:3
									 ,maskRe:/[0-9]/i
						  }
						  						                            ,
						  {
						       	      xtype:'textarea'
									 ,fieldLabel:'ระดับยาในเลือด '
						             ,width:300
									 ,height:40
									// ,minLength:1
									// ,maxLength:3
									// ,maskRe:/[0-9]/i
						  }
						  						  						                            ,
						  {
						       	      xtype:'textarea'
									 ,fieldLabel:'ยาที่ได้รับ '
						             ,width:300
									 ,height:40
									// ,minLength:1
									// ,maxLength:3
									// ,maskRe:/[0-9]/i
						  }
						  						  						                            ,
						  {
						       	      xtype:'textarea'
									 ,fieldLabel:'ปัีญหาการใ้ช้ยาที่เกิดขึ้น '
						             ,width:300
									 ,height:40
									// ,minLength:1
									// ,maxLength:3
									// ,maskRe:/[0-9]/i
						  }


//-------------------------end item---------------------------------					  
					 ]
					 ,
					 buttons:
					 [
					      {
						       text:'บันทึก'
							   ,scale:'medium'
							    ,iconCls:'add16'
								,handler:function()
								{
								     app2.getForm().submit({
									 
									 
									 
									 										})
								}
						  }
						  ,
						  {
						       text:'ล้าง'
							   ,scale:'medium'
							     ,iconCls:'add-close'
												  ,handler:function()
													  {
														 app2.getForm().reset();
													  }

						  }
					 ]
		  });

});
</script>

</head>

<body>
 <div id="fr_appendix2"></div>
</body>
</html>

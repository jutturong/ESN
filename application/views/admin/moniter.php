<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<script type="text/javascript">
  Ext.onReady(function()
  {
  
  function  calAge(o,y)  //คำนวณอายุ
{
         var  tmp=o.split("-");
	     var  current=new Date();
		
		 var   current_year=current.getFullYear(); //ปีปัจจุบัน
		
//		 var  current_month =current.getMonth(); //เดือนปัจจุบัน 
//		var   current_date=current.getDate();  //วัน
		
		
		 
	   // Ext.MessageBox.show('',''+o);
	       //  alert(''+current_date);
//---------------- คำนวณ ปี ----------------------		   
//		   if( current_month > tmp[1] )
//		   {
//		          var  y=  current_year  -tmp[0] - 1; //ปี
//				   //alert(''+y);
//		   }
//		   else
//		   {
//		         var  y=  current_year  -tmp[0]  
//		   }
		   
		   
		   var  y=  current_year  -tmp[0] ; 
		 
		   Ext.getCmp('y').setValue(y);
}	
//----------------- comdbobox  ตำบล,อำเภอ,จังหวัด
//====================== เืลือกตำบล	
var StoreDistrict = new Ext.data.JsonStore({
     //url: base_url+'?c=default_application&m=select_district',
	 url:'<?=base_url()?>index.php/home/select_district',
     root: 'result',
	 fields: ['district_id','district_name']
});

	 var SelectDistrict = new Ext.form.ComboBox({
	//tpl:'<tpl for="."><div style="font-size:16px" class="search-item"><span>{district_name}</span>{Excerpt}</div></tpl>',
    store:StoreDistrict,
    mode:'remote',
	fieldLabel:'ตำบล',
	hiddenName:'district',
    name:'SelectDistrict',
    id:'SelectDistrict',
    displayField:'district_name',
    valueField:'district_id',
    typeAhead:true,
    loadingText:'Searching...',
    hideTrigger:false,
    triggerAction:'all',
    forceSelection: true,
   // width:140,
   // style:'height:22px;font-weight:bold; font-size:16px',
    allowBlank:false,
    emptyText:'เลือกตำบล',
    minChars:1,
	queryParam:'query',  //ตัวส่งค่า query
   // itemSelector:'div.search-item',
    listeners: {'select': function(){
				    	//StoreAmphur.load ({params:{'district_id':this.getValue()}});
				}
	},
    onSelect : function(record, index){
	            if(this.fireEvent('beforeselect', this, record, index) !== false)
	            {
	               this.setValue(record.data[this.valueField || this.displayField]);
	               this.collapse();
	               this.fireEvent('select', this, record, index);
	            }
    }

 });
//===================== เลือกอำเภอ ==============================================================================================				  
			    	      var   storeAmphur=new  Ext.data.JsonStore({
				 	     url:  '<?=base_url()?>index.php/home/select_amphur',
						 root: 'result',
  					     fields: ['amphur_id','amphur_name'],
						 //params: { 'province_id':40 } 
				  											         });
						//storeAmphur.baseParams={ 'province_id': 40 }  //การส่งค่า					 
				var   SelectAmphur=new   Ext.form.ComboBox({
									fieldLabel:'อำเภอ '
									,emptyText:'เลือกอำเภอ'
									,id:'SelectAmphur'
									,name:'SelectAmphur'
									,displayField:'amphur_name'
									,valueField:'amphur_id'
									,store:storeAmphur
									,typeAhead:true
									,mode:'remote'
									,forceSelection:true
									,allowBlank:false
									,msgTarget:'under'
									,triggerAction:'all'
								    ,loadingText:'Searching...'
									,hideTrigger:false
									,selectOnFocus:true
								   ,typeAhead:true
							   		,queryParam:'query'  //ตัวส่งค่า query
									,valueNotFoundText:'หาข้อมูลไม่พบ..'
									,listeners:{  
									               'select':function()
												   {
												       	 StoreDistrict.load( {params:{'district_id':this.getValue()}} ); 
													//	 Ext.getCmp('SelectAmphur').setValue('');
														// Ext.getCmp('SelectDistrict').setValue('');

												   } 
												   ,onSelect : function(record, index){
																if(this.fireEvent('beforeselect', this, record, index) !== false)
																{
																   this.setValue(record.data[this.valueField || this.displayField]);
																   this.collapse();
																   this.fireEvent('select', this, record, index);
																}
   																					 }
									           }
				});											   
//===================== เลือกจังหวัด ==============================================================================================				  
				  var   valueProvince=new  Ext.data.JsonStore({
				 	      url:  '<?=base_url()?>index.php/home/select_province',
						 root: 'result',
  					     fields: ['prov_id','prov_name']
				  											   });
				   var    selectProvince=new Ext.form.ComboBox({
									 fieldLabel:'จังหวัด '
									,id:'selectProvince'
									,name:'selectProvince'
									,emptyText:'เลือกจังหวัด'
								//	,tpl:'<tpl for="."><div style="font-size:12px" class="search-item"><span>{prov_name}</span>{Excerpt}</div></tpl>'
									,displayField:'prov_name'
									,valueField:'prov_id'
									,hiddenName:'province'
									  ,store:valueProvince 
									  
									  
									 ,typeAhead:true
									 ,mode:'remote'
									,forceSelection:true
									 ,loadingText:'Searching...'
									  ,hideTrigger:false
									 ,forceSelection: true
									,allowBlank:false
									,msgTarget:'under'
									,triggerAction:'all'
								 //  ,style:'height:20px;font-weight:bold; font-size:12px'
									,hideTrigger:false
									,editable: true
									,selectOnFocus:true
									,minChars:2
									,valueNotFoundText:'หาข้อมูลไม่พบ..'
								//	,itemSelector:'div.search-item'
									,queryParam:'query'  //ตัวส่งค่า query
								//	,enableToggle:true
								//	,toggleHandler:function(){  Ext.MessageBox.show('t'); }
                                    ,listeners:{ 
									                'select':function()
													{
													     storeAmphur.load( {params:{'province_id':this.getValue()}} ); 
														 Ext.getCmp('SelectAmphur').setValue('');
														 Ext.getCmp('SelectDistrict').setValue('');
													} 
													,
													onSelect : function(record, index){
													if(this.fireEvent('beforeselect', this, record, index) !== false)
													{
													   this.setValue(record.data[this.valueField || this.displayField]);
													   this.collapse();
													   this.fireEvent('select', this, record, index);
													}
    }      
								    			} 
				                                               });
	
	 var   app1=new Ext.FormPanel({
	        title:'Appendix 1',
			default: { width:100 },
			//widthLabel:120,
			defaultType:'textfield',
			items:[
//--------------------------------------------------------------------->
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
			           //xtype:'textfield',
					   fieldLabel:'HN ',
					   name:'HN',
					   //anchor:'95%',
					   allowBlank:false,
					   //emptyText:'ระบุ HN',
					   msgTarget:'side',
					   minLength:1,
					  // maxLength : 6,
					   width: 50,
					   //alue:'1'
			        }
                    ,
					{
					   //xtype
					   fieldLabel:'เลขที่บัตรประชาชน ',
					   name:'person_id',
					   allowBlank:false,
					   maxLength:13,
					   width:100,
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
									 ,msgTarget:'side'
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
					       xtype:'fieldset'
						   ,checkboxToggle:true
						   ,collapsed:false
						   ,title:'ที่อยู่'
						   ,items:[
								                           selectProvince,   //จังหวัด
													       SelectAmphur,   //อำเภอ         
								                           SelectDistrict,    //ตำบล
														  
								 {
								     xtype:'textfield'
									,fieldLabel:'รหัสไปรษณีย์ '
									,width:50
									,maxLength:5
									,minLength:2
									 ,maskRe:/[0-9]/i
									// ,value:'46120'
								 }
								 , 
								  		    {
										     xtype:'textarea',
											 fieldLabel:'ที่อยู่ ',
										     name:'',
											 width:300,
											 height:40,
											 allowBlank:false,
											 msgTarget:'side'
									        } 
								  
								   ]
						 
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
						 ,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด '
						//,anchor:'100%'
					     ,allowBlank:false
						 ,id:'birth'
						 ,name:'birth'
						 ,msgTarget:'side'
						 ,format:'Y-m-d'
						// ,invalidClass:'ux-status-error'
						 ,triggerClass : 'x-form-date-trigger'
						 ,showToday:true
						 ,listeners: {   select  :  function(e,y,m,d){
						                                          //   var  e=  this.getValue();
																//	 alert(''+e);
						                                             calAge(e.getValue().dateFormat('Y-m-d'),y)
																	  }
								     }									  
					   }
					 ,
					  {
						 
						 xtype:'compositefield'
						 ,fieldLabel:'อายุ (ปี)'
						 ,items:[
						     {
									    xtype:'textfield'
									   ,maxLength:3
									   ,minLength:1
									   ,width:30
									   ,id:'y'
									   ,name:'y'
									    ,style:'textAlign:center'
									   ,maskRe:/[0-9]/i
									   ,readOnly:true
						      }
							    ]
					 }
                    ,
					  {
					    
						 xtype:'combo'
						,fieldLabel:'อาชีพ '
					    ,width:250
						,store:[[1,'1. ไม่ระบุ'],[2,'2. ไม่มีอาชีพ'],[3,'3. เกษตรกรรม'],[4,'4. พระ/นักบวช'],[5,'5. รับราชการ/รัฐวิสาหกิจ/พนักงานของรัฐ'],[6,'6. ครู/อาจารย์'],[7,'7. บุคลากรสาธารณสุข'],[8,'8. ข้าราชการบำนาญ'],[9,'9. ค้าขาย/นักธุรกิจ'],[10,'10. พนักงาน/ลูกจ้างของเอกชน'],[11,'11. นักเรียน/นักศึกษา']]
						,displayField:'state'
						,typeAhead:true
						,mode:'local'
						,forceSelection:true
						,allowBlank:false
						,msgTarget:'side'
						,triggerAction:'all' //แสดงรายการทั้งหมด
					 }
                      ,
					 {
					    xtype:'combo'
						,fieldLabel:'ระดับการศักษา'
						,width:250
						,store:[[1,'1. ไม่ระบุ'],[2,'2. ไม่ไ้ด้ศึกษา'],[3,'3. ประถมศึกษา'],[4,'4. มัธยมศึกษา'],[5,'5. มัธยมศึกษาตอนต้น'],[6,'6. อนุปริญญา/ปวส.'],[7,'7. ปริญญาตรีขึ้นไป']]
						,displayField:'state'
					    ,mode:'local'
						,forceSelection:true
						,allowBlank:false
						,msgTarget:'side'
						,triggerAction:'all'
					 }
					 ,
					 {
					   xtype:'combo'
					   ,fieldLabel:'สิทธิทางการรักษา'
					   ,displayField:'state'
					   ,mode:'local'
					   ,forceSelect:true
					   ,allowBlank:false
					   ,msgTarget:'side'
					   ,triggerAction:'all'
					   ,store:[[1,'1. ประกันสุขภาพถ้วนหน้าของโรงพยาบาล'],[2,'2. ประกันสุขภาพถ้วนหน้าส่งตัวมา'],[3,'3. ประกันสังคม'],[4,'4. ชำระเงินเอง'],[5,'5. ข้าราขการ/รัฐวิสาหกิจ'],[6,'6. ผู้พิการ'],[7,'7. พระภิกษุ/แม่ีชี']]
					 }
					 ,
					 {
					   fieldLabel:'เริ่มมีอาการชักเมื่ออายุ (ปี) '
					   ,name:''
					   ,allowBlank:false
					   ,msgTarget:'side'
					   ,width:50
					   ,maxLength:2
					   ,minLength:1
					   ,emptyText:''
					   ,maskRe: /[0-9]/i
					 }
					,
					  {
					   fieldLabel:'ชักมาแล้ว (ปี) '
					   ,name:''
					   ,allowBlank:false
					   ,msgTarget:'side'
					   ,width:50
					   ,maxLength:2
					   ,minLength:1
					    ,maskRe:/[0-9]/i
					 }
					,
					 {
					     xtype:'fieldset'
						,checkboxToggle:true
						,title:'รูปแบบการชักที่เป็นครั้งแรก'
						,autoHeight:false
						,width:750
						,name:'other1'
						,collapsed:false
						,name:'other1'
						,items:[{
						           xtype:'compositefield'
						           ,fieldLabel:'รูปแบบการชักที่เป็นครั้งแรก'
								   ,msgTarget:'side'
								   ,items:[
//----------------------------------------------------------------------------
{
													 xtype:'combo'
													,fieldLabel:'รูปแบบอาการชักที่เป็นครั้งแรก '
													,name:'a1'
													,displayField:'state'
													,typeAhead:true
													,mode:'local'
													,forceSelection:true
													,allowBlank:false
													,msgTarget:'side'
													,triggerAction:'all'
													,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Other.(ระบุ)..']]
													,hideTrigger:false
													,selectOnFocus:true
													,listeners:{
						select:function(){							
	     				if( this.getValue() == 8 )
						{

						}					
											}			      
															   
															   }
}	
,
{  xtype:'displayfield' ,value:'Other.(ระบุ) ' }
,
{  xtype:'textarea',name:'tx_oth1',width:270,height:40 ,disabled:false}						   
								           ]
						        }]
						
					 }
				,
{					 
     xtype:'fieldset'
    ,checkboxToggle:true
	,title:'รูปแบบการชักที่เป็นอยู่ ณ ปัจจุบัน'
	,autoHeight:false
	,width:750
	,name:''
	,collapsed:false
	,items:[	
		    {
			   		    xtype:'compositefield'
					   ,fieldLabel:'รูปแบบการชัก ณ ปัจจุบัน'
					   ,msgTarget:'side' 
					   ,items:[{

//----------------------------------			   
			    xtype:'combo'
			   ,fieldLabel:'รูปแบบการชัก ณ ปัจจุบัน '
			   ,name:''
			   ,displayField:'state'
			   ,typeAhead:true
			   ,mode:'local'
			   ,forceSelection:true
			   ,allowBlank:false
			   ,msgTarget:'side'
			   ,triggerAction:'all'
			   ,hideTrigger:false
			   ,selectOnFocus:true
			   ,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Other. (ระบุ)']]
//---------------------------------------			   
                              }
							  
							   ,{  xtype:'displayfield',value:'Other. (ระบุ) '  }	
							   ,{  xtype:'textarea',name:'',width:270,height:40,disabled:false }
							  
							  ]
			  }
             
            ]
		}
        ,
			{
			       xtype:'fieldset'
				  ,title:'เคยตรวจ EEG มาก่อนหรือไม่'
				  ,autoHeight:false
				  ,collapsed:false
				  ,checkboxToggle:true
				  ,width:750
				  ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'เคยตรวจ EEG มาก่อนหรือไม'
							  ,items:[
				                        {
										   boxLabel:'เคย'
										   ,name:'k2'
										   ,listeners:{ 'check':function(){ Ext.getCmp('d1').enable(); } }
										}
										,
										{
										    boxLabel:'ไม่เคย'
										   ,name:'k2'
										}
				                     ]
				          }
						  ,
						  {
						       xtype:'datefield'
							  ,fieldLabel:'วัน-เดือน-ปี เคยตรวจ EEG'
							  ,disabled:true
							  ,id:'d1'
						  }
						  
						  ]
			  
			  }
,
{
			       xtype:'fieldset'
				  ,title:'ผลการตรวจ EEG่'
				  ,autoHeight:false
				  ,collapsed:false
				  ,checkboxToggle:true
				  ,width:750
				  ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'ผลการตรวจ EEG'
							  ,items:[
				                        {
										   boxLabel:'ปกติ'
										   ,name:''
										}
										,
										{
										   boxLabel:'ผิดปกติ'
										   ,name:''
										}
				                     ]
				          }]
}
,
{
			       xtype:'fieldset'
				  ,title:'เคยตรวจ CT/MRI มาก่อนหรือไม่'
				  ,autoHeight:false
				  ,collapsed:false
				  ,checkboxToggle:true
				  ,width:750
				  ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'เคยตรวจ CT/MRI มาก่อนหรือไม่'
							  ,items:[
				                        {
										   boxLabel:'เคย'
										   ,name:'s1'
										   ,listeners:{ 'check':function(){  Ext.getCmp('d2a').enable(); } }
										}
										,
										{
										    boxLabel:'ไม่เคย'
										   ,name:'s1'
										   
										}
				                     ]
				          }
						    ,
							{
							   xtype:'datefield'
							  ,fieldLabel:'วัน-เดือน-ปี ที่เคยตรวจ CT/MR '
							  ,name:'d2a'
							  ,id:'d2a'
							  ,disabled:true
							}
						  ]

}
,
{
			       xtype:'fieldset'
				  ,title:'ผลการตรวจ  CT/MRI'
				  ,autoHeight:false
				  ,collapsed:false
				  ,checkboxToggle:true
				  ,width:750
				  ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'ผลการตรวจ  CT/MRI่'
							  ,items:[
				                        {
										   boxLabel:'ปกติ'
										   ,name:''
										}
										,
										{
										   boxLabel:'ผิดปกติ'
										   ,name:''
										}
				                     ]
				          }]

}
,
{
       xtype:'fieldset'
	   ,title:'ลักษณะความผิดปกติจาก CT/MRI'
	   ,autoHeight:false
	   ,collapse:false
	   ,checkboxToggle:true
	   ,width:750
	   ,name:''
	   ,items:
	   [ //item
                  {
				       xtype:'compositefield'
					   ,fieldLabel:'ลักษณะความผิดปกติจาก CT/MRI'
					   ,msgTarget:'side'
					   ,items:
					     [
						      {
							         xtype:'combo'
									 ,fieldLabel:'ลักษณะความผิดปกติจาก CT/MRI'
									 ,name:''
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									 ,allowBlank:false
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									 ,store:[[1,'1. Brain atrophy'],[2,'2. Brain metastasis'],[3,'3. Cortical  dysplasia'],[4,'4. Cysticercosis'],[5,'5. Encephalomalacia'],[6,'6. Granulomatous lesion'],[7,'7. Hemorrhage stroke'],[8,'8. Heterotropia'],[9,'9. Hippocampal  sclerosis'],[10,'10. Hydrocephalus'],[11,'11. Ischemic stroke'],[12,'12. Post craniotomy'],[13,'13. Primary brain tumor'],[14,'14. Other'],[15,'15. Normal finding']]
									
							  }
							  ,
							  {
							         xtype:'displayfield'
									 ,value:'Other. (ระบุ) '
							  }
							  ,
							  {
							       xtype:'textarea'
								   ,width:280
								   ,height:40
								   ,name:''
								   ,id:'tx1'
							  }
						 ]
				  }
        ] //item
}
,
{
		 xtype:'fieldset'
		,title:'ยาที่ได้รับมาก่อนหน้านี้  พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:
        [
		    {
			     xtype:'compositefield'
				 ,fieldLabel:'ยาที่ได้รับมาก่อนหน้านี้  พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
			     ,msgTarget:'side'
			     ,items:[
                               {
							        xtype:'combo'
									 ,name:''
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									 ,allowBlank:false
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									,store:[[1,'1. Carbamazepine'],[2,'2. Phenobarbital'],[3,'3. Phenytoin'],[4,'4. Sodium valproate'],[5,'5. ฺGabapen'],[6,'6. Lamotrigine'],[7,'7. Levetiracetam'],[8,'8. Topiramate'],[9,'9. Other']]
							   }
							   ,
							   {
							         xtype:'displayfield'
									 ,value:'ระบุรายละเอียดเพิ่ม  '
							   }
							   ,
							   {
							        xtype:'textfield'
									,name:''
									,width:220
							   }
                            ]
			}
		]
}
,
{
  		 xtype:'fieldset'
		,title:'โรคร่วมอื่นๆ ของผู้ป่วย'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:
           [
		   		{
					     xtype:'compositefield'
				 ,fieldLabel:'ยาที่ได้รับมาก่อนหน้านี้  พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
			     ,msgTarget:'side'
			     ,items:[
                              {
							  			  xtype:'combo'
									 ,name:''
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									 ,allowBlank:false
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									,store:[[1,'1. Carbamazepine'],[2,'2. Phenobarbital'],[3,'3. Phenytoin'],[4,'4. Sodium valproate'],[5,'5. ฺGabapen'],[6,'6. Lamotrigine'],[7,'7. Levetiracetam'],[8,'8. Topiramate'],[9,'9. Other']]
                                    ,listeners:{ 'select':function()
									         { 
												 if( this.getValue() == 9 )
												 {
												       //alert('t');
													    Ext.getCmp('x1').enable();
														Ext.getCmp('x1').setValue('test');
														//Ext.getCmp('x1').focus();
												 }
											  } 
												 
											    }
							  }
							  ,
							  {
							  		  xtype:'displayfield'
									 ,value:'ระบุรายละเอียดเพิ่ม  '
							  }
							  ,
							  {
							  		   xtype:'textfield'
									,name:''
									,width:220
									,id:'x1'
									,disabled:true

							  }
						   ]
			   }
		   ]     
}
				,
				{
				    xtype:'compositefield'
					,fieldLabel:'โรคร่วมอื่นๆ  ของผู้ป่วย '
					 ,msgTarget:'side'
					 ,items:[
					                {
					
					   xtype:'combo'
					 //  ,fieldLabel:'โรคร่วมอื่นๆ  ของผู้ป่วย '
					   				 ,name:''
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									 ,allowBlank:false
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									,store:[[0,'0. ไม่มี'],[1,'1. โรคไขมันในเลือดสูง'],[2,'2. โรคความดันโลหิตสูง'],[3,'3. โรคเบาหวาน'],[4,'4. โรคหลอดเลือดในสมองอุดตัน'],[5,'5. โรคอื่นๆ ระบุ...']]
								
						           }
								   ,
								   {
								          xtype:'displayfield'
										  ,value:'โรคอื่นๆ ระบุ'
								   }
								   ,
								   {
								        xtype:'textfield'
										,width:250
										
								   }
							]		

				}
,
{
  		 xtype:'fieldset'
		,title:'ประวัติการแพ้ยา'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:
             [
																{
																										 xtype:'radiogroup'
																										,fieldLabel:'ประวัติการแพ้ยา '
																										,items:[
																													   {
																														  boxLabel:'เคย'
																												    	  ,name:'z12'
																												  ,listeners:{ 'check':function(){ Ext.getCmp('d3').enable(); } }
																													   }
																													   ,
																													   {
																															  boxLabel:'ไม่เคย'
																															  ,name:'z12'
																													   }
																												  ]
																   }
																   ,
																   {
																        xtype:'datefield'
																		,fieldLabel:'วัน-เดือน-ปี ที่เคยแพ้ยา '
																		,id:'d3'
																		,name:'d3'
																		,disabled:true
																   }
                                                                  ,
															   {
																       xtype:'textfield'
																	   ,fieldLabel:'ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่นที่ไม่ใช่ยากันชัก) '
																	   ,width:300
																   }
			 ]
}
,
{
  		 xtype:'fieldset'
		,title:'ยากันชักที่แพ้'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:
           [
		        {
				     xtype:'compositefield'  
		           ,name:''
		        ,fieldLabel:'ยากันชักที่แพ้ '	
		           ,items:[
                    {
										 xtype:'combo'
									   ,name:''
													 // ,fieldLabel:'ยากันชักที่แพ้'					
																		 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														 ,allowBlank:false
														 ,triggerAction:'all'
														 ,hideTrigger:false
														 ,selectOnFocus:true
														,store:[[1,'1. Carbamazepine'],[2,'2. Phenobarbital'],[3,'3. Phenytoin'],[4,'4. Sodium valproate'],[5,'5. Gabapentine'],[6,'6. Lamotrigine'],[7,'7. Levetiracetam'],[8,'8. Topiramate'],[9,'9. Other']]
                  }
				  ,
				  {
				       xtype:'displayfield'
					   ,value:'ระบุรายละเอียดเพิ่ม '
				  }
				  ,
				  {
				       xtype:'textfield'
					   ,name:''
					   ,width:200
				  }
                             ]
               }
            ]
}
,
{
        		 xtype:'fieldset'
		,title:'ลักษณะการแพ้ยากันชัก'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:[
                        {
						  xtype:'compositefield'
						  ,fieldLabel:'ลักษณะการแพ้ยากันชัก'  
				          ,items:
						      [
							                      {
										 xtype:'combo'
									   ,name:''
													 // ,fieldLabel:'ยากันชักที่แพ้'					
																		 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														 ,allowBlank:false
														 ,triggerAction:'all'
														 ,hideTrigger:false
														 ,selectOnFocus:true
														,store:[[1,'1. Antiepileptic  hypersensitivity  syndrome'],[2,'2. Rash'],[3,'3. Steven  Johnson  syndrome'],[4,'4. TEN'],[5,'5. Urticaria'],[6,'6. อื่นๆ ระบุ']]
             										     }
														 ,
														 {
														     xtype:'displayfield'
															 ,value:'6. อื่นๆ  ระบุ '
														 }
														 ,
														 {
														      xtype:'textfield'
															  ,width:250
															  
														 }

							  ]
							}  
				     ]
}
,
{
        		 xtype:'fieldset'
		,title:'สิ่งกระตุ้นให้เกิดอาการชัก'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:[
                        {
						  xtype:'compositefield'
						  ,fieldLabel:'สิ่งกระตุ้นให้เกิดอาการชัก'  
				          ,items:
						      [
							                      {
										 xtype:'combo'
									   ,name:''
													 // ,fieldLabel:'ยากันชักที่แพ้'					
																		 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														 ,allowBlank:false
														 ,triggerAction:'all'
														 ,hideTrigger:false
														 ,selectOnFocus:true
														,store:[[1,'1. ความเครียด'],[2,'2. เครื่องดื่มแอลกอฮอล์็'],[3,'3. ประจำเดือน'],[4,'4. พักผ่อนไม่เพียงพอ'],[5,'5. อื่นๆ']]
             										     }
														 ,
														 {
														     xtype:'displayfield'
															 ,value:'5. อื่นๆ  ระบุ '
														 }
														 ,
														 {
														      xtype:'textfield'
															  ,width:250
															  
														 }

                              ]
						 }	  
                      ]
}
,
{
       xtype:'datefield'
	  ,fieldLabel:'วันที่สัมภาษณ์  วัน/เดือน/ปี  พ.ศ. (dd/mm/25yy) '
}
,
{
        		 xtype:'fieldset'
		,title:'ลักษณะการแพ้ยากันชัก'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:[
				         {
							  xtype:'compositefield'
							 ,name:''
							  ,fieldLabel:'ผู้กรอกข้อมูล  ชื่อ - นามสกุล  '
							 ,items:[
										   {
												   xtype:'textfield'
												//   ,fieldLabel:'ผู้กรอกข้อมูล  ชื่อ - นามสกุล  '
												   ,width:150
												   ,allowBlank:false
												   ,msgTarget:'under'
											}
											,
											{
											      xtype:'displayfield'
												  ,value:' - '
											}
											,
												  {
												   xtype:'textfield'
												//   ,fieldLabel:'ผู้กรอกข้อมูล  ชื่อ - นามสกุล  '
												   ,width:200
												   ,allowBlank:false
												    ,msgTarget:'under'
											}

									   ] 
                          }
                      ]
}
  ]	
			     ,buttons:[{
				         text:'บันทึก',
						 scale:'medium',
				         iconCls:'add16',
						 handler:function()
						 {
						     //alert('t');
							 simple.getForm().submit({
							      
								  method:'POST',
								 
						
						
								 success:function()
								 {
								    alert('t');
								 } 
								 ,failure:function()
								 {
								    //alert('f');
									Ext.MessageBox.confirm('Pleas insert Data!!','Pleas insert form Appendix 1');
								 }
								 
								 
/*								  success:function()
								  {
								      alert('t');
								  },
								  failure:function(f,a)
								  {
								      alert('f');
								  }
*/								  
								  
							 
							                          });
						 
						 }
				            }
						  ,
						  {
						  text:'ล้างข้อมูล',
						  scale:'medium',
						  iconCls:'add-close',
						  handler:function()
						  {
						      simple.getForm().reset();
						  }
						  
						  }	
							
							]

//--------------------------------------------------------------------->	
                	
	 });
	 
	 var   app2=new Ext.FormPanel({
	           title:'Appendix 2',
					default: { width:100 },
					//widthLabel:120,
					defaultType:'textfield',
					items:[
//------------------------------------------------------------------------>	
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
											,
															 {
																 xtype:'compositefield'
																 ,fieldLabel:'อายุ (ปี-เดือน-วัน)'
																 ,items:[
																	 {
																				xtype:'textfield'
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

//------------------------------------------------------------------------>					
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
	 
	 
	 

	 var   app3=new Ext.FormPanel({
	           title:'Appendix 3',
			   default: { width:100 },
					//widthLabel:120,
					defaultType:'textfield',
					items:[
//---------------------------------------------------------->
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
							    xtype:'datefield'
								,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด (dd/mm/25yy) '
								,name:''
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
								,fieldLabel:'วัน-เดือน-ปี พ.ศ. (dd/mm/25yy) ที่เข้านอนรักษา '
								,name:''
							 }
							 							 ,
							 {
							    xtype:'datefield'
								,fieldLabel:'วัน-เดือน-ปี พ.ศ. (dd/mm/25yy) ที่จำหน่าย '
								,name:''
							 }
                                ,
								{
								     xtype:'fieldset'
									,title:'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา'
																	,checkboxToggle:true
								,collapsed:false
								,autoHeight:false
								,items:[
                                         {
                                               xtype:'compositefield'
											   ,fieldLabel:'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้านอนรักษา'
											   ,items:[
											                  {
																				    xtype:'combo'
																				   ,fieldLabel:'อายุ (ปี) '
																				  ,width:160
                                                                                  ,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Status epilepticus'],[9,'9. Other.(ระบุ)..']]
																				  ,modal:'local'
																				  ,displayField:'value'
																				  ,allowBlank:false
																				  ,msgTarget:'side'
																				  ,triggerAction:'all'
															   }
															   ,
															   {
															      xtype:'displayfield'
																  ,value:'9. Other (ระบุ) '
															   }
															   ,
															   {
															       xtype:'textfield'
																   ,width:250
															   }
											             ]
										  }
                                       ]
								}
								,
								{
                                        xtype:'textfield'
										,fieldLabel:'สรุปการรักษาที่ได้รับ '
										,width:300
										
								}
								,
								{
								     xtype:'fieldset'
									 ,title:'สถานะจำหน่าย '
									 ,checkboxToggle:true
									 ,collapsed:false
									 ,autoHeight:false
									 ,items:[
									        {
                                                       xtype:'combo'
													  ,fieldLabel:'สถานะจำหน่าย'
													  ,width:160
                                                     ,store:[[1,'1. Complete recovery'],[2,'2. Improved'],[3,'3. Not improved'],[4,'4. Dead']]
														  ,modal:'local'
														  ,displayField:'value'
																				  ,allowBlank:false
																				  ,msgTarget:'side'
																				  ,triggerAction:'all'
											}
									 ]
								}
								,
								{
								    fieldLabel:'รายละเอียดเพิ่มเติม '
									,width:400
								}
								,
								{
								      xtype:'fieldset'
									 ,title:'ประเภทจำหน่าย'
									 ,checkboxToggle:true
									 ,collapsed:false
									 ,autoHeight:false
                                         ,items:
										 [
										       {
										                  xtype:'compositefield'
														  ,fieldLabel:'ประเภทจำหน่าย '
														  ,items:[
														         {
																          xtype:'combo'
																		  ,fieldLabel:'สถานะจำหน่าย'
																		  ,width:160
																		 ,store:[[1,'1. with approval'],[2,'2. against  advice'],[3,'3. by escape '],[4,'4. by transfer'],[5,'5. death'],[6,'6. other..']]
																			  ,modal:'local'
																			  ,displayField:'value'
																									  ,allowBlank:false
																									  ,msgTarget:'side'
																									  ,triggerAction:'all'
																 }
																 ,
																 {
														                xtype:'displayfield'
																		,value:'6. Other '
														         }
																 ,
																 {
																         xtype:'textfield'
																        ,width:300
																 }
														  ]
										       }
										 ]
								}

//---------------------------------------------------------->					
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
	 	 var   app4=new Ext.FormPanel({
	          title:'Appendix 4',
			   default: { width:100 },
					//widthLabel:120,
			  defaultType:'textfield',
			  items:[
//------------------------------------------------------------------
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
								,fieldLabel:'วัน-เดือน-ปี พ.ศ. (dd/mm/25yy) ที่เข้ารักษาในห้องฉุกเิฉิน '
								,name:''
							 }
	                       ,    
									{
								     xtype:'fieldset'
									,title:'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฺฉิน'
																	,checkboxToggle:true
								,collapsed:false
								,autoHeight:false
								,items:[
                                         {
                                               xtype:'compositefield'
											   ,fieldLabel:'รูปแบบการชักที่เป็นอยู่ ณ วันที่เข้ารักษาในห้องฉุกเฺฉิน'
											   ,items:[
											                  {
																				    xtype:'combo'
																				   ,fieldLabel:'อายุ (ปี) '
																				  ,width:160
                                                                                  ,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Status epilepticus'],[9,'9. Other.(ระบุ)..']]
																				  ,modal:'local'
																				  ,displayField:'value'
																				  ,allowBlank:false
																				  ,msgTarget:'side'
																				  ,triggerAction:'all'
															   }
															   ,
															   {
															      xtype:'displayfield'
																  ,value:'9. Other (ระบุ) '
															   }
															   ,
															   {
															       xtype:'textfield'
																   ,width:250
															   }
											             ]
										  }
                                       ]
								}
								,
								{
                                        xtype:'textfield'
										,fieldLabel:'สรุปการรักษาที่ได้รับ '
										,width:350
										
								}
                ,
													{
								     xtype:'fieldset'
									,title:'ผลการรักษา'
									,checkboxToggle:true
								,collapsed:false
								,autoHeight:false
								,items:[
											                  {
																				    xtype:'combo'
																				   ,fieldLabel:'ผลการรักษา '
																				  ,width:160
                                                                                  ,store:[[1,'1. หาย'],[2,'2. admit'],[3,'3. refer'],[4,'4. death']]
																				  ,modal:'local'
																				  ,displayField:'value'
																				  ,allowBlank:false
																				  ,msgTarget:'side'
																				  ,triggerAction:'all'
															   }


                                           ]
										   }
//------------------------------------------------------------------
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
	 	 var   app5=new Ext.FormPanel({
	          title:'Appendix 5',
			  			   default: { width:100 },
					//widthLabel:120,
					defaultType:'textfield',
					items:[
//------------------------------------------------------------
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
								,fieldLabel:'วัน-เดือน-ปี พ.ศ. (dd/mm/25yy) ที่เยี่ยมบ้าน '
								,name:''
							 }
							 ,
							 {
							     xtype:'textarea'
								 ,fieldLabel:'ปัญหาที่พบ '
							     ,width:300
								 ,height:40
							 }

//------------------------------------------------------------
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
	 	 var   app6=new Ext.FormPanel({
	          title:'Appendix 6',
			  			  			   default: { width:100 },
					//widthLabel:120,
					defaultType:'textfield',
					items:[
					{
//--------------------------------------------------------------
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


//--------------------------------------------------------------
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
	 	 var   app7=new Ext.FormPanel({
	          title:'Search HN,เลขบัตรประชาชน',
			  			  			   default: { width:100 },
					//widthLabel:120,
					defaultType:'textfield',
					items:[

                          ]

	 });


//--------------------------------------> modify tabpanel
	  var  fr1=new Ext.FormPanel({
	            title:'<?=$head?>',
				renderTo:Ext.get('morniter'),
				width:830,
				height:2200,
				frame:true,
				cls:'label1',
				items: new Ext.TabPanel({
				          autoTabs:true,
						  activeTab:5,
						  height:2000,
				          items:[
								      app1
									  ,
									  app2
									  ,
									  app3
									  ,
									  app4
									  ,
									  app5
									  ,
									  app6
									  ,
									  app7
								]
								       })
								   });	    	  
								
//------------------------column------------------------>
//var panel = new Ext.Panel({
//                id:'main-panel',
//                baseCls:'x-plain',
//                //renderTo: Ext.getBody(),
//				 renderTo: Ext.get('morniter'),
//                layout:'table',
//                layoutConfig: {columns:1},
//                // applied to child components
//                //defaults: {frame:true, width:600, height: 200},
//				 defaults: {frame:true, width:700},
//                items:[
				
//				 {
//                    title:'Item 1'
//                 }
//				 ,
//				 {
//                    title:'Item 2'
//                 }
//				 ,
//				 {
//                    title:'Item 3'
//                 }
//				 ,
//				 {
//                    title:'Item 4',
//                    width:410,
//                    colspan:2
//                 }
//				 ,
//				 {
//                    title:'Item 5'
//                 }
//				 ,
//				 {
//                    title:'Item 6'
//                 }
//				 ,
//				 {
//                    title:'Item 7',
//                    width:410,
//                    colspan:2
//                 }
//				 ,
//				 {
//                    title:'Item 8'
//                 }
//				]
//            });
//------------------------------------------> tab panel

  });
</script>

</head>

<body>
<div id="morniter"></div>

</body>
</html>

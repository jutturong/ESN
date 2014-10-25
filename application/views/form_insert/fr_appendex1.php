<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<!--<script type="text/javascript" src="<?=base_url()?>js_dsn/form_appendix/fr_appendix1.js"></script>
-->


<style> 
  .test-lbl-text-align
  {font-weight:bold;color:red;text-align:right;display:block;width:200px;height:200px;}
</style>


<script type="text/javascript">
     Ext.BLANK_IMAGE_URL = '<?=base_url()?>ext/resources/images/default/s.gif';	
    
	
	 Ext.onReady(function()  //ปรับปุงใหม่
	       {
		   


	  	   
//====================== เืลือกตำบล	
var StoreDistrict = new Ext.data.JsonStore({
     //url: base_url+'?c=default_application&m=select_district',
	 url:'<?=base_url()?>index.php/home/select_district',
     root: 'result',
	 fields: ['district_id','district_name']
});

	 var district_id = new Ext.form.ComboBox({
	//tpl:'<tpl for="."><div style="font-size:16px" class="search-item"><span>{district_name}</span>{Excerpt}</div></tpl>',
    store:StoreDistrict,
    mode:'remote',
	fieldLabel:'ตำบล',
	hiddenName:'district',
    name:'district_id',
    id:'district_id',
    displayField:'district_name',
    valueField:'district_id',
    typeAhead:true,
    loadingText:'Searching...',
    hideTrigger:false,
    triggerAction:'all',
    forceSelection: true,
   // width:140,
   // style:'height:22px;font-weight:bold; font-size:16px',
  //  allowBlank:false,
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
				var   amphur_id=new   Ext.form.ComboBox({
									fieldLabel:'อำเภอ '
									,emptyText:'เลือกอำเภอ'
									,id:'amphur_id'
									,name:'amphur_id'
									,displayField:'amphur_name'
									,valueField:'amphur_id'
									,store:storeAmphur
									,typeAhead:true
									,mode:'remote'
									,forceSelection:true
								//	,allowBlank:false
								    ,hiddenName:'amphur'
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
				   var    prov_id=new Ext.form.ComboBox({
									 fieldLabel:'จังหวัด '
									,id:'prov_id'
									,name:'prov_id'
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
								//	,allowBlank:false
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
													     storeAmphur.load( {params:{'prov_id':this.getValue()}} ); 
														// Ext.getCmp('amphur_id').setValue('');
														// Ext.getCmp('district_id').setValue('');
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
		  

formEnable={
               testvar:22,
			   enb:function(e,f)
			   {
			      if( f == 8 )
				  {
							  //alert(e);
							  //var  text=e;
						//	return  document.getElementById('detail_epilepsy_first').disabled=true;
							  //e.disable();
							   //return   Ext.getCmp(e).disable();
				   }			   
			   }  
           }

		  

	 var  simple=new Ext.FormPanel({
	        labelWidth:200,
			url:'<?=base_url()?>index.php/appendix/insert_appendix1/',
			renderTo:Ext.get('fr_appendix1'),
			frame:true,
			title:'<?=$appendix?> <?=$name?>',
			bodyStyle:'padding : 5px 5px 0',
			width:800,
			Height:1400,
			//cls:'test-lbl-text-align',
			cls:'label1',
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
			           //xtype:'textfield',
					   fieldLabel:'HN ',
					   name:'HN',
					   id:'HN',
					   //anchor:'95%',
					   allowBlank:false,
					   //emptyText:'ระบุ HN',
					   msgTarget:'side',
					   minLength:6,
					   maxLength : 6,
					   width: 60,
					   value:'EY7728'
			        }
					,
					{
					   //xtype
					   fieldLabel:'เลขที่บัตรประชาชน ',
					   name:'person_id',
					   id:'person_id',
					   allowBlank:false,
					   minLength:13,
					   maxLength:13,
					   value:'3333333333333',
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
									       { xtype:'textfield',name:'firstname',allowBlank:false ,width:70,maxLength:20,minLength:2,value:'วนิชชาวดี'} 
										   ,{ xtype:'displayfield',value:'-'  }  
										   ,{  xtype:'textfield',name:'surname',allowBlank:false,width:100,maxLength:25,minLength:2,value:'ดอนป้อม' }
									         ]
								  } 
						         ]
					}
//-----------------testing name && lastname-------------------					 
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
													 // id:'sex',
													  inputValue:2,
													  msgTarget:'under',
													  checked:true
												   },
												   {
										               boxLabel:'M ชาย',
													   name:'sex',
													 //  id:'sex',
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
								                           prov_id,   //จังหวัด
													       amphur_id,   //อำเภอ         
								                           district_id,    //ตำบล
														  
								 {
								     xtype:'textfield'
									,fieldLabel:'รหัสไปรษณีย์ '
									,width:50
									,id:'zipcode'
									,name:'zipcode'
									,maxLength:5
									,minLength:2
									 ,maskRe:/[0-9]/i
									 ,value:'40000'
								 }
								 , 
								  		    {
										     xtype:'textarea',
											 fieldLabel:'ที่อยู่ ',
										     name:'address',
											 id:'address',
											 width:300,
											 height:40,
											 allowBlank:false,
											 msgTarget:'side',
											 value:'234/6 ถ.มิตรภาพ'
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
						,value:'0867656543'
						,width:80
						,name:'telephone'
						,id:'telephone'
					 }
					 ,
					 {
					     xtype:'datefield'
						 ,fieldLabel:'วัน-เดือน-ปี พ.ศ.ที่เกิด '
						//,anchor:'100%'
					   //  ,allowBlank:false
						 ,id:'birthdate'
						 ,name:'birthdate'
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
			//						   ,fieldLabel:'อายุ (ปี-เดือน-วัน) '
									   ,maxLength:3
									   ,minLength:1
									   ,width:30
									   ,id:'age'
									   ,name:'age'
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
						//,allowBlank:false
						,hiddenName:'occupational_id'
						,msgTarget:'side'
						,triggerAction:'all' //แสดงรายการทั้งหมด
						
						,id:'occupational'
						,name:'occupational'
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
						//,allowBlank:false
						,msgTarget:'side'
						,hiddenName:'education_id'
						,triggerAction:'all'
						,name:'education'
						,id:'education'
					 }
					 ,
					 {
					   xtype:'combo'
					   ,fieldLabel:'สิทธิทางการรักษา'
					   ,displayField:'state'
					   ,mode:'local'
					   ,forceSelect:true
					  // ,allowBlank:false
					   ,msgTarget:'side'
					   ,triggerAction:'all'
					   ,store:[[1,'1. ประกันสุขภาพถ้วนหน้าของโรงพยาบาล'],[2,'2. ประกันสุขภาพถ้วนหน้าส่งตัวมา'],[3,'3. ประกันสังคม'],[4,'4. ชำระเงินเอง'],[5,'5. ข้าราขการ/รัฐวิสาหกิจ'],[6,'6. ผู้พิการ'],[7,'7. พระภิกษุ/แม่ีชี']]
					   ,name:'payment'
					   ,id:'payment'
					   ,hiddenName:'payment_id'
					 }
					 ,
					 {
					   fieldLabel:'เริ่มมีอาการชักเมื่ออายุ (ปี) '
					   ,name:''
					   //,allowBlank:false
					   ,msgTarget:'side'
					   ,width:50
					   ,maxLength:2
					   //,minLength:1
					   ,emptyText:'2'
					   ,name:'age_payment'
					   ,id:'age_payment'
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
					  // ,minLength:1
					    ,maskRe:/[0-9]/i
						,value:'1'
						,name:'age_sick'
						,id:'age_sick'
					 }
					 
					 
//-########################################################################-> รูปแบบการชักที่เป็นครั้งแรก					 
					 ,
					 {
					     xtype:'fieldset'
						,checkboxToggle:true
						,title:'รูปแบบการชักที่เป็นครั้งแรก'
						,autoHeight:false
						,width:750
						,name:'other1'
						,collapsed:false
						//,name:'other1'
						,items:[{
						           xtype:'compositefield'
						           ,fieldLabel:'รูปแบบการชักที่เป็นครั้งแรก'
								   ,msgTarget:'side'
								   ,items:[
//----------------------------------------------------------------------------
{
													 xtype:'combo'
													,fieldLabel:'รูปแบบอาการชักที่เป็นครั้งแรก '
													,name:'epilepsy_first'
													,id:'epilepsy_first'
													,displayField:'state'
													,typeAhead:true
													,mode:'local'
													,forceSelection:true
													//,allowBlank:false
													,hiddenName:'epilepsy_first_id'
													,msgTarget:'side'
													,triggerAction:'all'
													,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Other.(ระบุ)..']]
													,hideTrigger:false
													,selectOnFocus:true
													,listeners:{
															'select':function()
															         {
//																		  e='detail_epilepsy_first';
//																		  f=this.getValue();
//																		  formEnable.enb(e,f);
																			//this.disable();
																			//Ext.getCmp('detail_epilepsy_first').disable();
																	 }
															   }
}	
,
{  xtype:'displayfield' ,value:'Other.(ระบุ) ' }
,
{  xtype:'textarea',name:'detail_epilepsy_first',width:270,height:40 ,disabled:false,value:'มีการชักกระตุกอย่างรุนแรง'}						   
//-----------------------------------------------------------------------------								   
								           ]
						        }]
						
					 }
//-##########################################################-> รูปแบบการชักที่เป็นครั้งแรก					 
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
					  // ,msgTarget:'side' 
					   ,items:[{

//----------------------------------			   
			    xtype:'combo'
			   ,fieldLabel:'รูปแบบการชัก ณ ปัจจุบัน '
			   ,name:'current_epilepsy'
			   ,id:'current_epilepsy'
			   ,displayField:'state'
			   ,typeAhead:true
			   ,mode:'local'
			   ,forceSelection:true
			  // ,allowBlank:false
			   ,hiddenName:'current_epilepsy_id'
			   ,msgTarget:'side'
			   ,triggerAction:'all'
			   ,hideTrigger:false
			   ,selectOnFocus:true
			   ,store:[[1,'1. Simple partial seizure'],[2,'2. Complex partial seizure'],[3,'3. Absence'],[4,'4. Atonic'],[5,'5. Myoclonic'],[6,'6. Generalized tonic clonic'],[7,'7. Tonic seizure'],[8,'8. Other. (ระบุ)']]
//---------------------------------------			   
               	,listeners:{  select:function(){   
				                  //alert('t');  
								     if( this.getValue==8 )
									 {
									      //alert('t');
										   //document.getElementById('other_current_epilepsy').disabled=false;
										  // Ext.getCmp('other_current_epilepsy').enable();
									 }
									 
								               }
				
				           }              
							 
							  }
							  
							   ,{  xtype:'displayfield',value:'Other. (ระบุ) '  }	
							   ,{  xtype:'textarea',width:270,height:40,disabled:false,value:'ชักเมื่ออยู่ในที่แคบ',name:'other_current_epilepsy' }
							  
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
				 
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'เคยตรวจ EEG มาก่อนหรือไม'
							  ,items:[
				                        {
										   boxLabel:'เคย'
										   ,checked:true
										   ,name:'ever_EEG'
										   ,inputValue:1
										   ,listeners:{ 'check':function(){ Ext.getCmp('d1').enable(); } }
										}
										,
										{
										    boxLabel:'ไม่เคย'
										   ,name:'ever_EEG'
										   ,inputValue:2
										}
				                     ]
				          }
						  ,
						  {
						       xtype:'datefield'
							  ,fieldLabel:'วัน-เดือน-ปี เคยตรวจ EEG'
							  //,disabled:false
							 // ,id:'date_Ever_EEG'
							  ,name:'date_Ever_EEG'
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
				 // ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'ผลการตรวจ EEG'
							  ,items:[
				                        {
										   boxLabel:'ปกติ'
										   ,checked:true
										   ,name:'results_EEG'
										   ,inputValue:1
										   //,id:'results_EEG'
										}
										,
										{
										   boxLabel:'ผิดปกติ'
										   ,name:'results_EEG'
										   ,inputValue:2
										   //,id:'results_EEG'
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
				// ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'เคยตรวจ CT/MRI มาก่อนหรือไม่'
							  ,items:[
				                        {
										   boxLabel:'เคย'
										   ,name:'ever_CT_MRI'
										   ,checked:true
										   ,inputValue:1
										   ,listeners:{ 'check':function(){ /* Ext.getCmp('d2a').enable();*/ } }
										}
										,
										{
										    boxLabel:'ไม่เคย'
										   ,name:'ever_CT_MRI'
										   ,inputValue:2
										}
				                     ]
				          }
						    ,
							{
							   xtype:'datefield'
							  ,fieldLabel:'วัน-เดือน-ปี ที่เคยตรวจ CT/MR '
							  ,name:'date_Ever_CT_MRI'
							  ,id:'date_Ever_CT_MRI'
							  ,disabled:false
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
				 // ,name:''
				  ,items:[{
				               xtype:'radiogroup'
							  ,fieldLabel:'ผลการตรวจ  CT/MRI่'
							  ,items:[
				                        {
										   boxLabel:'ปกติ'
										   ,name:'result_CT_MRI'
										   ,checked:true
										   ,inputValue:1
										}
										,
										{
										   boxLabel:'ผิดปกติ'
										   ,name:'result_CT_MRI'
										   ,inputValue:2
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
	  // ,name:''
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
									 ,name:'nature_CT_MRI'
									 ,id:'nature_CT_MRI'
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									// ,allowBlank:false
									 ,hiddenName:'nature_CT_MRI_id'
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
								   ,name:'other_Nature_CT_MRI'
								   ,id:'other_Nature_CT_MRI'
								   ,value:'ลักษณะความผิดปกติจาก CT/MRI'
								   ,disabled:false
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
		   //,name:''
		   ,items:
        [
		    {
			     xtype:'compositefield'
				 ,fieldLabel:'ยาที่ได้รับมาก่อนหน้านี้  พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
			     ,msgTarget:'side'
			     ,items:[
                               {
							        xtype:'combo'
									 ,name:'drug'
									 ,id:'drug'
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									// ,allowBlank:false
									  ,hiddenName:'drug_id'
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
									,name:'drug_other'
									//,id:'drug_other'
									,width:220
									,height:40
									,value:'ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
									,disabled:false
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
		   //,name:''
		   ,items:
           [
		   		{
					     xtype:'compositefield'
				 ,fieldLabel:'ยาที่ได้รับมาก่อนหน้านี้  พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
			     ,msgTarget:'side'
			     ,items:[
                              {
							  		  xtype:'combo'
									 ,name:'disease_drug'
									 //,id:'disease_drug'
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									// ,allowBlank:false
									  ,hiddenName:'disease_drug_id'
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									,store:[[1,'1. Carbamazepine'],[2,'2. Phenobarbital'],[3,'3. Phenytoin'],[4,'4. Sodium valproate'],[5,'5. ฺGabapen'],[6,'6. Lamotrigine'],[7,'7. Levetiracetam'],[8,'8. Topiramate'],[9,'9. Other']]
                                    ,listeners:{ 'select':function()
									         { 
												 if( this.getValue() == 9 )
												 {
												        //alert('t');
													    //Ext.getCmp('disease_drug_other').enable();
														//Ext.getCmp('x1').setValue('test');
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
								  	,name:'disease_drug_other'
									//,id:'x1'
									,width:220
									,height:40
									,disabled:false
                                    ,value:'ยาที่ได้รับมาก่อนหน้านี้ พร้อมระบุความรุนแรงและแบบแผนการใช้ยา'
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
					   				 ,name:'disease_drug'
									 ,id:'allergic'
									 ,displayField:'state'
									 ,typeAhead:true
									 ,mode:'local'
									 ,forceSelection:true
									// ,allowBlank:false
									 ,hiddenName:'disease_drug_id'
									 ,triggerAction:'all'
									 ,hideTrigger:false
									 ,selectOnFocus:true
									,store:[[0,'0. ไม่มี'],[1,'1. โรคไขมันในเลือดสูง'],[2,'2. โรคความดันโลหิตสูง'],[3,'3. โรคเบาหวาน'],[4,'4. โรคหลอดเลือดในสมองอุดตัน'],[5,'5. โรคอื่นๆ ระบุ...']]
								
						           }
								   ,
								   {
								          xtype:'displayfield'
										  //,name:'allergic_date'
										 // ,id:'allergic_date'
										  ,value:'โรคอื่นๆ ระบุ'
								   }
								   ,
								   {
								        xtype:'textfield'
										,width:250
										,value:'โรคอื่นๆ ระบุ'
										,name:'allergic_detail'
										,id:'allergic_detail'
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
		   //,name:''
		   ,items:
             [
																{
																										 xtype:'radiogroup'
																										,fieldLabel:'ประวัติการแพ้ยา '
																										,items:[
																													   {
																														  boxLabel:'เคย'
																												    	  ,name:'allergic'
																														  ,inputValue:1
																														  ,checked:true
																												  ,listeners:{ 'check':function(){ Ext.getCmp('drug_epilepsy_detail').enable(); } }
																													   }
																													   ,
																													   {
																															  boxLabel:'ไม่เคย'
																															  ,name:'allergic'
																															  ,inputValue:2
																													   }
																												  ]
																   }
																   ,
																   {
																        xtype:'datefield'
																		,fieldLabel:'วัน-เดือน-ปี ที่เคยแพ้ยา '
																		,id:'allergic_date'
																		,name:'allergic_date'
																		,disabled:false
																   }
                                                                  ,
															   {
																       xtype:'textfield'
																	   ,fieldLabel:'ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่นที่ไม่ใช่ยากันชัก) '
																	   ,width:300
																	   ,name:'allergic_detail'
																	   ,value:'ระบุชื่อยาและลักษณะการแพ้ยา (กรณียาอื่นที่ไม่ใช่ยากันชัก)'
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
									 					  ,name:'drug_epilepsy'
													 // ,fieldLabel:'ยากันชักที่แพ้'					
														 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														// ,allowBlank:false
														 ,hiddenName:'drug_epilepsy_id'
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
					   ,name:'drug_epilepsy_detail'
					   ,width:200
					   ,value:'ยากันชักที่แพ้'
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
									   ,name:'nature_drug_epilepsy'
									   ,id:'nature_drug_epilepsy'
													 // ,fieldLabel:'ยากันชักที่แพ้'					
																		 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														 ,hiddenName:'nature_drug_epilepsy_id'
														// ,allowBlank:false
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
															  ,name:'Nature_drug_epilepsy_other'
															  ,id:'Nature_drug_epilepsy_other'
															  ,value:'ลักษณะการแพ้ยากันชัก'
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
		   //,name:''
		   ,items:[
                        {
						  xtype:'compositefield'
						  ,fieldLabel:'สิ่งกระตุ้นให้เกิดอาการชัก'  
				          ,items:
						      [
							                      {
										 xtype:'combo'
									     ,name:'stimulate_epilepsy'
										 ,id:'stimulate_epilepsy'
													 // ,fieldLabel:'ยากันชักที่แพ้'					
																		 ,displayField:'state'
														 ,typeAhead:true
														 ,mode:'local'
														 ,forceSelection:true
														 //,allowBlank:false
														 ,hiddenName:'stimulate_epilepsy_id'
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
															  ,value:'สิ่งกระตุ้นให้เกิดอาการชัก'
															  ,name:'stimulate_epilepsy_other'
															 // ,id:'stimulate_epilepsy_other'
														 }

                              ]
						 }	  
                      ]
}
,
{
       xtype:'datefield'
	  ,fieldLabel:'วันที่สัมภาษณ์  วัน/เดือน/ปี  พ.ศ. (dd/mm/25yy) '
	  ,name:'interview_date'
	  ,id:'interview_date'
}
,
{
        		 xtype:'fieldset'
		,title:'ชื่อ-นามสกุล ผู้กรอกข้อมูล'
		,autoHeight:false
		   ,collapse:false
		   ,checkboxToggle:true
		   ,width:750
		   ,name:''
		   ,items:[
				         {
							  xtype:'compositefield'
							// ,name:'interview_name'
							  ,fieldLabel:'ผู้กรอกข้อมูล  ชื่อ - นามสกุล  '
							 ,items:[
										   {
												   xtype:'textfield'
												//   ,fieldLabel:'ผู้กรอกข้อมูล  ชื่อ - นามสกุล  '
												   ,width:80
												   ,allowBlank:false
												   ,msgTarget:'under'
												   ,value:'กงทอง'
												   ,name:'interview_name'
												   ,id:'interview_name'
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
												   ,width:100
												   ,allowBlank:false
												    ,msgTarget:'under'
													,value:'สารีบุตร'
													,name:'interview_lastname'
													,id:'interview_lastname'
											}

									   ] 
                          }
                      ]
}
//----------------------------------------------------------------------- end  item
			       ]
			     ,buttons:[{
				         text:'บันทึก',
						 scale:'medium',
				         iconCls:'add16',
						 handler:function()
						 {
						     //alert('t');
							      simple.getForm().submit({
								  url:'<?=base_url()?>index.php/appendix/insert_appendix1',
								  method:'POST',
								 success:function()
								 {
								    //alert('t');
									 Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล', 'บันทึกข้อมูลแล้ว');
								 } 
								 ,failure:function()
								 {
								    //alert('f');
									Ext.MessageBox.confirm('สถานะการบันทึกข้อมูล','กรุณาใส่ข้อมูลให้ครบถ้วน');
								 }
								 
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
	 
	 
	 
	 
	 });
	
 function  enable_text(e,f) //เปิดปุ่ม textfield
 {
        if( e == 8 )
		{
		    return Ext.getCmp('x1');
		} 
 }

	
function  calAge(o,y)  //คำนวณอายุ
{
         var  tmp=o.split("-");
	     var  current=new Date();
		 var   current_year=current.getFullYear(); //ปีปัจจุบัน
		 var  y=  current_year  -tmp[0] ; 
		   Ext.getCmp('age').setValue(y);
}	
						 
//=============== end  ext function					 
					 });
					 
					 
</script>


   
</head>



<body>

 <div id="fr_appendix1"></div>

</body>
</html>

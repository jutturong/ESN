<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
</head>


<script type="application/javascript">
Ext.onReady(function()
              {
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
									,typeAhead:true
									,mode:'remote'
									,forceSelection:true
									,valueField:'amphur_id'
									//,allowBlank:false
									,msgTarget:'under'
									,triggerAction:'all'
                                   ,store:storeAmphur
									,hideTrigger:false
									,selectOnFocus:true
									,listeners:{  
									               'select':function()
												   {
												       	 StoreDistrict.load( {params:{'district_id':this.getValue()}} ); 
													//	 Ext.getCmp('SelectAmphur').setValue('');
														 Ext.getCmp('SelectDistrict').setValue('');

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
									 ,typeAhead:false
									 ,mode:'remote'
									,forceSelection:true
									 ,loadingText:'Searching...'
									  ,hideTrigger:false
									 ,forceSelection: true
									,allowBlank:false
									,msgTarget:'under'
									,triggerAction:'all'
                                   ,store:valueProvince 
								 //  ,style:'height:20px;font-weight:bold; font-size:12px'
									,hideTrigger:false
									,selectOnFocus:true
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
				   
				   var  simple=new  Ext.FormPanel({
				          title:'<?=$title?>',
						  renderTo:Ext.get('fr_appendix1')
						  ,items:[ 
				                  selectProvince,
								  SelectAmphur,
								  SelectDistrict
				                  ]
				   });
			  
			  });
</script>

<body>

 <div id="fr_appendix1"></div>
 
 
</body>
</html>

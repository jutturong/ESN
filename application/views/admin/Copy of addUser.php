<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<script type="text/javascript">
  Ext.onReady(function()
  {


    function EditUser2(id_user) //แ้ก้ไข user  ต้นฉบับ
	{
	    return  String.format("<img  src='<?=base_url()?>images/edit.png' onClick=\"   win=new Ext.Window({ layout:\'form\',width:500,title:\'ปรับปรุงข้อมูลของ user\',closeAction:\'hide\',defaultType:\'textfield\',items:[{ fieldLabel:\'ชื่อผู้ใช้งาน (user) \' }] }); win.show(this); \"   />");   
	}
	
	
	var  formEditUser=new Ext.FormPanel({
	          title:' .: แ้ก้ไขข้อมูลของ User :. ',
			  labelWidth:100,
			  id:'formEditUser',
			  defaultType:'textfield',
			  defaults:{ width:100 }
			
			
			  ,
			 reader:new Ext.data.XmlReader({record:'contact',success:'@success'}
			      ,
				    [ 
					    { name:'edit_user',mapping:'edit_user' }
					]
					                       )
				,	
				
										});
										
	var  winEdit=new Ext.FormPanel({
	     layout:'fit',
		 id:'winEdit',
		 frame:true,
		 title:' .: แ้ก้ไขข้อมูลของ User :. ',
		 width:500,
		 height:300,
		 closeAction:'hide',
		 resizable:true,
		 closable:true,  //ถ้า closable:false คือไม่สามารถปิด window ได้
		 plain:true,
		 xtype:'container',
		 waitMsgTarget:true,
		 defaultType:'textfield',
		 
		 
		 
        reader : new Ext.data.XmlReader({
            record : 'contact',
            success: '@success'
        }, [
            {name: 'first', mapping:'name/first'}, // custom mapping
            {name: 'last', mapping:'name/last'},
            'company', 'email', 'state',
            {name: 'dob', type:'date', dateFormat:'m/d/Y'} // custom data types
        ]),
		
// errorReader: new Ext.form.XmlErrorReader(),
 
 
 			 
items: [
            new Ext.form.FieldSet({
                title: 'Contact Information',
                autoHeight: true,
                defaultType: 'textfield',
                items: [{
                        fieldLabel: 'First Name',
                        emptyText: 'First Name',
                        name: 'first',
                        width:190
                    }, {
                        fieldLabel: 'Last Name',
                        emptyText: 'Last Name',
                        name: 'last',
                        width:190
                    }, {
                        fieldLabel: 'Company',
                        name: 'company',
                        width:190
                    }, {
                        fieldLabel: 'Email',
                        name: 'email',
                        vtype:'email',
                        width:190
                    },

                    new Ext.form.ComboBox({
                        fieldLabel: 'State',
                        hiddenName:'state',
                        store: new Ext.data.ArrayStore({
                            fields: ['abbr', 'state']
                           // data : Ext.exampledata.states // from states.js
                        }),
                        valueField:'abbr',
                        displayField:'state',
                        typeAhead: true,
                        mode: 'local',
                        triggerAction: 'all',
                        emptyText:'Select a state...',
                        selectOnFocus:true,
                        width:190
                    }),

                    new Ext.form.DateField({
                        fieldLabel: 'Date of Birth',
                        name: 'dob',
                        width:190,
                        allowBlank:false
                    })
                ]
            })
        ]		 
		 
		 
		 ,bbar:new Ext.ux.StatusBar({
		     text:'User Management',
		     iconCls:'x-status-saved' 
		 
		 							})
									
								
	
	});
	

Ext.form.XmlErrorReader = function(){
    Ext.form.XmlErrorReader.superclass.constructor.call(this, {
            record : 'field',
            success: '@success'
        }, [
            'id', 'msg'
        ]
    );
};
Ext.extend(Ext.form.XmlErrorReader, Ext.data.XmlReader);

//--------------------------------------------------
var   userFormJson=new  Ext.FormPanel({
	     layout:'fit',
		 id:'userFormJson',
		 frame:true,
		 title:' .: แ้ก้ไขข้อมูลของ User :. ',
		 width:500,
		 height:300,
		 closeAction:'hide',
		 resizable:true,
		 closable:true,  //ถ้า closable:false คือไม่สามารถปิด window ได้
		 plain:true,
		 xtype:'container',
		 waitMsgTarget:true,
		 defaultType:'textfield',
		 items:[
						    new Ext.form.FieldSet({
							title: 'Contact Information',
							autoHeight: true,
							url: '<?=base_url()?>index.php/admin/call_user2', 
							defaultType: 'textfield',
							store:'storeForm',
							items:[
										{
											fieldLabel: 'ขื่อผู้ใช้งาน (user) ',
											emptyText: 'user',
											name: 'edit_user',
											width:100,
											allowBlank:false
										}
							       ]
                                                   })
		        ]
									});
									
									
var   userFormJson=new  Ext.FormPanel({
	     layout:'fit',
		 id:'userFormJson',
		 frame:true,
		 title:' .: แ้ก้ไขข้อมูลของ User :. ',
		 width:500,
		 height:300,
		 closeAction:'hide',
		 resizable:true,
		 closable:true,  //ถ้า closable:false คือไม่สามารถปิด window ได้
		 plain:true,
		 xtype:'container',
		 waitMsgTarget:true,
		 defaultType:'textfield',
		 
		 reader : new Ext.data.JsonReader({
		          root:'results',
		          fields:[
				        { name:'edit_user',mapping:'user'  }
				  ]
		 								}),
		 
		 items:[
						    new Ext.form.FieldSet({
							title: 'Contact Information',
							autoHeight: true,
							//url: '<?=base_url()?>index.php/admin/call_user2', 
							defaultType: 'textfield',
							store:'storeForm',
							items:[
										{
											fieldLabel: 'ขื่อผู้ใช้งาน (user) ',
											emptyText: 'user',
											name: 'edit_user',
											id:'edit_user',
											width:100,
											allowBlank:false
										}
							       ]
                                                   })
		        ]
									});
									
//--------------------------------------------------
	
	formEdit={ testvar:22   //-->load form edit user
			 ,win1:function(value) 
				  {  
					    winEdit.getForm().load({url:'<?=base_url()?>ext/examples/form/xml-form.xml'});
				  }
				,userJson:function(value)
				{
//---------------------------------------------------------------------------
//---------------------------------------------------------------------------												
							   userFormJson.form.load({ url: '<?=base_url()?>index.php/admin/call_user2',params:{ id_user:value },method:'POST'});
							   userFormJson.render('addUser');
				}  
	         }
	
	
	function EditUser(id_user)
	{
	   // return  String.format("<img src='<?=base_url()?>images/edit.png' onClick=\"formEdit.win1("+ id_user +")\"  >");  //ของเดิมอันนี้  XML
		 return  String.format("<img src='<?=base_url()?>images/edit.png' onClick=\"formEdit.userJson("+ id_user +")\"  >");
	}
	
	
	
//    function DeleteUser (MemId)
//	{
//		Ext.Msg.confirm('ยืนยันการลบข้อมูล', 'คุณแน่ใจที่จะลบประเภทบัตรสามาชิกใช่หรือไม่ ?', function(btn){
//  		if (btn == 'yes')
//  		{
//				Ext.Ajax.request({
//				    url:base_url+'?c=member_detail&m=delete_memtype',
//				    method:'POST',
//				    params:{'memtype_id': MemId},
//				    success: function(response, options) {
//				        //MsgSuccess('ระบบได้ลบประเภทบัตรสามาชิกเรียบร้อยแล้ว',300);
//				        CardTypeViewStore.load();
//				    }
//				});
//  			}
//		});
//	}
	
	
	
	 function  DeleteUser(id_user)
	 {
	    // Ext.Msg.confirm('ยืนยันการลบข้อมูล', 'คุณแน่ใจที่จะลบสมาชิกท่านนี้ ?');
		 return  String.format("<img src='<?=base_url()?>images/editdelete.png' alt='{0}' onClick=\"Ext.MessageBox.confirm('จำกัดการใช้งาน user','คุณต้องการ block user',function(btn){ if(btn==\'no\'){ Ext.Ajax.request({ url:\'<?=base_url()?>index.php/admin/block_user\',method:\'POST\',params:{ \'id_user'\:\'" + id_user + "\',\'block\':\'t\' },success:function(){  Ext.MessageBox.alert(\'แสดงสถานะของ user\',\'ยกเลิกการ block user\');  PresidentsDataStore.load(); },false:function(){  Ext.MessageBox.alert(\'Error System\',\'ระบบการทำงานผิดพลาด!!\'); } }); } else if( btn==\'yes\') { Ext.Ajax.request({  url:\'<?=base_url()?>index.php/admin/block_user\',method:\'POST\',params:{ \'id_user\':\'" + id_user + "\',\'block\':\'f\'  },success:function(){   Ext.MessageBox.alert(\'แสดงสถานะของ user\',\'block user\'); PresidentsDataStore.load(); },false:function(){ Ext.MessageBox.alert(\'Error System\',\'ระบบการทำงานผิดพลาด!!\'); } }); }  })\" />");
		 //return  new  Ext.Button({ text:'Edit',width:50,handler:function(){ alert('t'); }  });
	 }
	
	
	
	function changeStatus()
	{
	     //new  Ext.MessageBox.confirm('Confirm','testing');
		   //Ext.Msg.confirm('a','b');
		 // alert('t');
	}


function showResult(btn){
        Ext.example.msg('Button Click', 'You clicked the {0} button', btn);
    };
	
	
//var itemDeleter = new Extensive.grid.ItemDeleter();
 
 
 
 //------------------------> grid 
PresidentsDataStore = new Ext.data.Store({
      id: 'PresidentsDataStore',
      proxy: new Ext.data.HttpProxy({
                url: '<?=base_url()?>index.php/report/table_user',      // File to connect to
                method: 'POST'
            }),
            baseParams:{task: "LISTING"}, // this parameter asks for listing
      reader: new Ext.data.JsonReader({   
                  // we tell the datastore where to get his data from
        root: 'results',
        totalProperty: 'total',
        id: 'id'
      },[ 
		 {name: 'id_user', type: 'string', mapping: 'id_user'},
		 { name:'code_user',type:'string',mapping:'code_user' },
		 { name:'name',type:'string',mapping:'name' },
		 { name:'code_hospital',type:'int',mapping:'code_hospital' },
		 { name:'prov_name',type:'string',mapping:'prov_name' },
		 { name:'user',type:'string',mapping:'user' },
		 {    },
		 {    },
		 { name:'id_typeuser',type:'int',mapping:'id_typeuser'   },
		 { name:'enable_user',type:'string',mapping:'enable_user' }
		 
      ]),
     		 sortInfo:{field: 'id_user', direction: "ASC"}
    });
	PresidentsDataStore.load();
	
PresidentsColumnModel = new Ext.grid.ColumnModel(
    [{
        header: 'ลำดับที่',
        readOnly: true,
        dataIndex: 'id_user', // this is where the mapped name is important!
        width: 60,
        hidden: false
      }
	  ,
	  {
	     header:'รหัส',
		 readOnly:true,
		 dataIndex:'code_user',
		 width:60,
		 hidden:false
	  }
	  ,
	  {
	     header:'โรงพยาบาล',
		 readOnly:true,
		 dataIndex:'name',
		 width:100,
		 hidden:false
	  }
	  ,
	  {
	     header:'รหัสตาม สปสช',
		 readOnly:true,
		 dataIndex:'code_hospital',
		 width:100,
		 hidden:false
	  }
	  ,
	  {
	      header:'จังหวัด',
		  readOnly:true,
		  dataIndex:'prov_name',
		  width:80,
		  hidden:false
	  }
	  ,
	  	  {
	      header:'user',
		  readOnly:true,
		  dataIndex:'user',
		  width:90,
		  hidden:false
	  }
	  ,
	  {
	     header:'Edit',
		 width:50,
		 //sortable:true
		 align:'center',
		 dataIndex:'id_user',
		 //renderer:function(val){ return '<img  src="<?=base_url()?>images/edit.png"  onClick="alert(\'edit\')"  />'; }
		 renderer:EditUser
	  }
	  ,
	  {
	     header:'Block',
		 width:50,
		 //sortable:true
		 align:'center',
		 dataIndex:'id_user',
			//renderer:function(val){ return '<img  src="<?=base_url()?>images/editdelete.png" onClick="DeleteUser()" />'; }
			renderer:DeleteUser
			//renderer:function(id_user){ return '<img src="<?=base_url()?>images/editdelete.png"  onClick="alert(' + id_user + ')"    >'; }
	  }
	  ,
	  {
	     header:'สิทธิการใช้งาน',
		 width:100,
		 align:'center',
		 dataIndex:'id_typeuser',
		 renderer:function(id_typeuser)
		    { 
			    if( id_typeuser == 1 ) 
				{ return '<img src="<?=base_url()?>images/admin.png"  width="35" >' } 
				else if ( id_typeuser == 2 )  
				{  return '<img src="<?=base_url()?>images/user.png"  width="35" >' }  
			
			}
	  }
	  ,
	  {
	     header:'Status',
		 width:60,
		 align:'center',
		 dataIndex:'enable_user',
		 renderer:function(enable_user)
		 {
		   if( enable_user =='t')
		   {
		       return '<img src="<?=base_url()?>images/ok.png"   >'
		   }
		   else (  enable_user =='f' )
		   {
		      return '<img src="<?=base_url()?>images/delete.png"  >'
		   }
		 }
	  }

//	  ,{
//        header: 'First Name',
//        dataIndex: 'FirstName',
//        width: 150,
//        editor: new Ext.form.TextField({  // rules about editing
//            allowBlank: false,
//            maxLength: 20,
//            maskRe: /([a-zA-Z0-9\s]+)$/   // alphanumeric + spaces allowed
//          })
//      },{
//        header: 'Last Name',
//        dataIndex: 'LastName',
//        width: 150,
//        editor: new Ext.form.TextField({
//          allowBlank: false,
//          maxLength: 20,
//          maskRe: /([a-zA-Z0-9\s]+)$/
//          })
//      },{
//        header: 'ID party',
//        readOnly: true,
//        dataIndex: 'IDparty',
//        width: 50,
//        hidden: true                      // we don't necessarily want to see this...
//      },{
//        header: 'Party',
//        dataIndex: 'PartyName',
//        width: 150,
//        readOnly: true
//      },{
//        header: "Income",
//        dataIndex: 'Income',
//        width: 150,
//        renderer: function(v){ return '$ ' + v; },   
//                           // we tell Ext how to display the number
//        editor: new Ext.form.NumberField({
//          allowBlank: false,
//          decimalSeparator : ',',
//          allowDecimals: true,
//          allowNegative: false,
//          blankText: '0',
//          maxLength: 11
//          })
//      }
	  
	  
	  
	  ]
    );
    PresidentsColumnModel.defaultSortable= true;	
PresidentListingEditorGrid =  new Ext.grid.EditorGridPanel({
      title:'แสดงบัญชีรายชื่อของโรงพยาบาลทั้งหมด (All user)',
	  width:800,
	  height:300,
	  frame:true,
	  id: 'PresidentListingEditorGrid',
      store: PresidentsDataStore,     // the datastore is defined here
      cm: PresidentsColumnModel,      // the columnmodel is defined here
      enableColLock:false,
      clicksToEdit:1,
      selModel: new Ext.grid.RowSelectionModel({singleSelect:false})
    });



 //---------------------------- province -----------------------------------------------------------------  
    var   valueProvince=new  Ext.data.JsonStore({
				 	      url:  '<?=base_url()?>index.php/home/select_province',
						 root: 'result',
  					     fields: ['prov_id','prov_name']
						                         });
	
	
	
	var   id_typeuser=new  Ext.form.ComboBox({  //ประเภทของผู้ใ้ช้
	
		      triggerAction:'all',
		  lazyRender:true,
	      fieldLabel:'ประเภทของผู้ใช้ ',
		  id:'id_typeuser',
		  name:'id_typeuser', 
	      emptyText:'ประเภทของผู้ใช้',
		//  displayField:'prov_name',
		 // valueField:'prov_id',
		  store:[[1,'Admin'],[2,'User']], 
     	  typeAhead:true,
		   mode:'local',
		   forceSelection:true,
		   loadingText:'ประเภทของผู้ใช้...',
									  hideTrigger:false,
									 forceSelection: true,
									allowBlank:false,
									msgTarget:'under',
									triggerAction:'all',
								 //  ,style:'height:20px;font-weight:bold; font-size:12px'
									hideTrigger:false,
									editable: true,
									selectOnFocus:true,
									minChars:2,
									valueNotFoundText:'หาข้อมูลไม่พบ..',
								//	,itemSelector:'div.search-item'
									queryParam:'query'  //ตัวส่งค่า query
								//	,enableToggle:true

	
	
	
	});
	
	
	 var  id_province =new Ext.form.ComboBox({  //เลือกจังหวัด
	      triggerAction:'all',
		  lazyRender:true,
	      fieldLabel:'จังหวัด',
		  id:'id_province',
		  name:'id_province', 
	      emptyText:'เลือกจังหวัด',
		  displayField:'prov_name',
		  valueField:'prov_id',
		  store:valueProvince, 
     	  typeAhead:true,
		   mode:'remote',
		   forceSelection:true,
		   loadingText:'Searching...',
									  hideTrigger:false,
									 forceSelection: true,
									allowBlank:false,
									msgTarget:'under',
									triggerAction:'all',
								 //  ,style:'height:20px;font-weight:bold; font-size:12px'
									hideTrigger:false,
									editable: true,
									selectOnFocus:true,
									minChars:2,
									valueNotFoundText:'หาข้อมูลไม่พบ..',
								//	,itemSelector:'div.search-item'
								//	queryParam:'query'  //ตัวส่งค่า query
								//	,enableToggle:true
	 
	 
	 }); 
	  
	  
	  
	  
	 
	  var  fr1=new Ext.FormPanel({
	            title:'<?=$head?>',
				renderTo:Ext.get('addUser'),
				width:800,
				height:400,
				frame:true,
				cls:'label1',
				items: new Ext.TabPanel({
				         // autoTabs:true,
						  activeTab:1,
						  height:300,
				          items:[
						          {
								      title:'เพิ่มผู้ใช้ (Add user)',
									  layout:'form',
								      defaultType:'textfield',
									  defaults:{ width:100 },
									  items:[
									          {
											     fieldLabel:'ชื่อผู้ใช้งาน (User) ',
												 name:'user',
												 allowBlank:false,
												 width:100,
												 maxLength:30,
												 minLength:4,
												 msgTarget:'side',
												 value:''
											  }
											  ,
									          {
											     fieldLabel:'รหัสผ่าน (Password) ',
												 name:'password',
												 width:80,
												 maxLength:15,
												 minLength:4,
												 allowBlank:false,
												 magTarget:'side',
												 value:''
											  }
											  ,
											  {
											    fieldLabel:'ชื่อโรงพยาบาล ',
												 name:'name',
												 width:200,
												 maxLength:100,
												 minLength:4,
												 allowBlank:false,
												 magTarget:'side',
												 value:''

											  }
											  ,
											  id_province  //จังหวัด
											  ,
											  {
											     fieldLabel:'รหัส ',
												 name:'code_user',
												 width:40,
												 maxLength:4,
												 minLength:4,
												 allowBlank:false,
												 value:'<?=$code_user?>',
												 readOnly:true,
												 magTarget:'side'
											  }
											  ,
											  {
											  	 fieldLabel:'รหัสตาม สปสช ',
												 name:'code_hospital',
												 width:50,
												 maxLength:5,
												 minLength:1,
												 allowBlank:false,
												 //value:'0001',
												 //readOnly:true,
												 magTarget:'side',
												 maskRe:/[0-9]/i,
												 value:''
											  }
											  ,
											  id_typeuser
											  ,
											  
									        ]
											,
											buttons:[
											           {
													      text:'เพิ่มผู้ใช้ (Add User)',
														  scale:'medium',
														  iconCls:'add16',
														  handler:function()
														  {
															  if( fr1.getForm().isValid())
															  {
																  fr1.getForm().submit({
																	 url:'<?=base_url()?>index.php/admin/insert_user',
																	 method:'POST',
																	 success:function(form,action)
																	 {
																	    //alert('t');
																		PresidentsDataStore.load();
																		//succ_mess;
																		//Ext.MessageBox.confirm('Confirm','บันทึกข้อมูลเรียบร้อยแล้ว');
																		Ext.MessageBox.show({
																		   title:'สถานะการบันทึกข้อมูล',
																		   msg:'บันทึกข้อมูลแล้ว',
																		   width:300,
																		   buttons:Ext.MessageBox.OK
																		
																		});
																	 },
																	 failure:function(form,action)
																	 {
																	    //alert('f');
																		PresidentsDataStore.load();
																		//Ext.MessageBox.confirm('Confirm','บันทึกข้อมูลเรียบร้อยแล้ว');
																		Ext.MessageBox.show({
																		   title:'สถานะการบันทึกข้อมูล',
																		   msg:'บันทึกข้อมูลซ้ำ',
																		   width:300,
																		   buttons:Ext.MessageBox.OK
																		
																		});
																		
																		
																	 }  
																  					   });
															  }
															
															 
														  }
													   }
													   ,
													   {
													      text:'ล้างข้อมูล (Clear Data)',
														  scale:'medium',
														  iconCls:'add-close',
														  handler:function()
														  {
														     fr1.getForm().reset();
														  }
													   }]
											
								  }
								  ,
								  {
								       title:'บัญชีรายชื่อผู้ใช้',
									   layout:'form',
									  // height:250,
								       items: PresidentListingEditorGrid,
									   
						           }
						         ]
				
										})
	  							  });
  }
  		    );
</script>

</head>

<body>

<div id="addUser"></div>

</body>
</html>

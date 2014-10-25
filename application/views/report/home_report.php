<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
Ext.onReady(function(){

//--------------- with  client script 
var myData = [
		   [1,'0001','รพ.ศรีนครินทร์',13777,'ขอนแก่น','(ขอนแก่น)'],
    ];
var store = new Ext.data.ArrayStore({
        fields: [
           {name: 'id_user',type:'integer'},
           {name: 'user_code'},
          // {name: 'change', type: 'float'},
		   {name: 'name'},
           {name: 'a', type: 'integer'},
         //  {name: 'lastChange', type: 'date', dateFormat: 'n/j h:ia'}
			{name: 'b'},
			{name: 'c'}

        ]
    });
    // manually load local data
    store.loadData(myData);
 var grid = new Ext.grid.GridPanel({
        store: store,
        columns: [
			{id:'id_user',header: "ลำดับที่", width: 50, sortable: true, dataIndex: 'id_user'},
          //  {header: "รหัส", width: 75, sortable: true, renderer: 'usMoney', dataIndex: 'user_code'},
			 {header: "รหัส", width: 75, sortable: true,  dataIndex: 'user_code'},
           // {header: "ชื่อโรงพยาบาล", width: 75, sortable: true, renderer: change, dataIndex: 'name'},
			{header: "ชื่อโรงพยาบาล", width: 75, sortable: true,  dataIndex: 'name'},
           // {header: "% Change", width: 75, sortable: true, renderer: pctChange, dataIndex: 'pctChange'},
			{header: "รห้ัสตาม สปสช", width: 75, sortable: true },
           // {header: "Last Updated", width: 85, sortable: true, renderer: Ext.util.Format.dateRenderer('m/d/Y'), dataIndex: 'lastChange'}
			{header: "จังหวัด", width: 85 },
              {header: "สาขาพื้้นที่", width: 85 }
			
        ],
        stripeRows: true,
       // autoExpandColumn: 'company',
		 autoExpandColumn: 'id_user',
        height:100,
        width:100,
        title:'รายชื่อโรงพยาบาลในเครือข่าย'
    });
    //grid.render('home_report');  //เอาออกเพื่่อให้ render ใน window
function change(val){
        if(val > 0){
            return '<span style="color:green;">' + val + '</span>';
        }else if(val < 0){
            return '<span style="color:red;">' + val + '</span>';
        }
        return val;
    }
	
 function pctChange(val){
        if(val > 0){
            return '<span style="color:green;">' + val + '%</span>';
        }else if(val < 0){
            return '<span style="color:red;">' + val + '%</span>';
        }
        return val;
    }
//----------->#### end  client script	

//-----------> connect ot  MYSQL server
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
		 { name:'prov_name',type:'string',mapping:'prov_name' }
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
		  width:150,
		  hidden:false
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
      id: 'PresidentListingEditorGrid',
      store: PresidentsDataStore,     // the datastore is defined here
      cm: PresidentsColumnModel,      // the columnmodel is defined here
      enableColLock:false,
      clicksToEdit:1,
      selModel: new Ext.grid.RowSelectionModel({singleSelect:false})
    });

	
var win_m1=new Ext.Window({  
      //title:' Easy Epilepsy Clinic โปรแกรมเครือข่ายงานบริการผู้ป่วยโรคลมชัก ',
	  title:'<?=$title?>',
	  layout:'fit',
      width:450,
	  height:300,
	  closeAction:'hide',
	  plain:true,
	 // items:grid  //->with  client javascript
	 // items:GridMemderAllStore  //ต้น
	// items: new Ext.TabPanel({ autoTabs:true,activeTab:0,border:true,items: [ grid ] })
       items:PresidentListingEditorGrid
});

 
 
var  menu1=new Ext.Action({  
      text:'โรงพยาบาล',
	  iconCls:'page_white_office',
	  menu:[ { text:'รายชื่อโรงพยาบาลในเครือข่าย',iconCls:'car_add' ,listeners: {  'click':function()
	                                                   {  
													              //alert('t');
															if( win_m1 )
															{
															    win_m1.show();
															}  
													    } }    } ]
                          });
						  

var  action1_menu2=new Ext.Action({
         text:'จำนวนผู้ป่วยในแต่ละเดือน',
		iconCls:'image_add',
         handler:function(){

			               }
                                });	
								
var  action2_menu2=new Ext.Action({
         text:'สถานการณ์ผู้ป่วยของโรงพยาบาล',
			iconCls:'image_add',
         handler:function(){

			               }
                                });						  					  
													  					  
var  action3_menu2=new Ext.Action({
         text:'Dynamic Reporting',
			iconCls:'image_add',
         handler:function(){

			               }
                                });						  					  

var  sub1_action4_menu2=new Ext.Action({  text:'Patient data (AP1)' , iconCls:'iconlistmania' });
var  sub2_action4_menu2=new Ext.Action({  text:'Followup (AP2)' , iconCls:'iconlistmania'  });
var  sub3_action4_menu2=new Ext.Action({  text:'Followup+Drug (AP2)' , iconCls:'iconlistmania'  });
var  sub4_action4_menu2=new Ext.Action({  text:'Admit'  , iconCls:'iconlistmania' });
var  sub5_action4_menu2=new Ext.Action({  text:'ER' , iconCls:'iconlistmania'  })

var  action4_menu2=new Ext.Action({
         text:'Dynamic Reporting',
		 iconCls:'iconlistmania',
		 menu:[ sub1_action4_menu2,sub2_action4_menu2,sub3_action4_menu2,sub4_action4_menu2,sub5_action4_menu2  ],
         handler:function(){

			               }
                                });						  					  


var  menu2=new Ext.Action({
     text:'จำนวนผู้ป่วยในแต่ละ รพ.',
     iconCls:'page_white_office',
	  menu:[ { text:'รายงานสถานการณ์จำนวนผู้ป่วยของแต่ละโรงพยาบาลในปัจจุบัน', iconCls:'image_add',menu:[  action1_menu2,action2_menu2,action3_menu2,action4_menu2  ]   }]
	 //menu:[  action1_menu2,action2_menu2,action3_menu2,action4_menu2   ]

                          });	
						  
						  
var  sub1_menu3=new Ext.Action({ text:'รายงานการมารับบริการของผู้ป่วยที่ OPD',  iconCls:'image_add'  });

						  
var  menu3=new Ext.Action(
                 {
				     text:'การรัีบบริการ OPD',
				     iconCls:'page_white_office',
					 menu:[ sub1_menu3 ] 
				 });						  
						  
var  menu4=new  Ext.Action({
                    text:'การรับบริการ OPD(GINA)',
                    iconCls:'page_white_office',
					 menu:[ { text:'รายงานการมารับบริการของผู้ป่วยที่ OPD (GINA)', iconCls:'image_add'  } ]
                 });
				 
var   menu5_sub1=new Ext.Action({
          text:'จำนวนผู้ป่วยในแต่ละเดือน',
		  iconCls:'layout_content'
});

var   menu5_sub2=new Ext.Action({
          text:'จำแนกตามประเภทการจำหน่าย',
		  iconCls:'layout_content'
});

var   menu5_sub3=new Ext.Action({
          text:'จำแนกตามสถานะการจำหน่าย',
		   iconCls:'layout_content'
});


var   menu5=new  Ext.Action({
                          text:'5.',
						  iconCls:'page_white_office',
						  menu:[ { text:'รายงานการเข้าพักรักษาตัวในโรงพยาบาล', iconCls:'layout_content' ,menu:[ menu5_sub1,menu5_sub2,menu5_sub3 ]  } ]
						  
                            });	
							
var   menu6_sub1=new Ext.Action(
                           {
						     text:'จำนวนผู้ป่วยในแต่ละเดือน',
						    iconCls:'layout_content'
						   });
var   menu6_sub2=new Ext.Action(
                           {
						     text:'จำแนกตามประเภทการจำหน่าย',
						    iconCls:'layout_content'
						   });

var   menu6_sub3=new Ext.Action(
                           {
						     text:'จำแนกตามสถานะการจำหน่าย',
						    iconCls:'layout_content'
						   });
						   

var   menu6=new  Ext.Action({
                        text:'6.',
						 iconCls:'page_white_office',
						menu:[{ text:'รายงานการเข้ารักษาฉุกเฉินในโรงพยาบาล', iconCls:'layout_content',menu:[ menu6_sub1,menu6_sub2,menu6_sub3 ] }]

                            });	
							
var   menu7=new Ext.Action({
                     text:'7.',
                     iconCls:'page_white_office',
					 menu:[ { text:'ผู้ป่วยโรคหืด ตามรอบปี', iconCls:'layout_content' } ]
                           });		
						   
						   
var  menu8_sub1=new Ext.Action({
                     text:'รายงานการใช้กลุ่มยาก่อนการรักษา',
					  iconCls:'layout_content'
                               });
							   
var  menu8_sub2=new Ext.Action({
                     text:'รายงานการใช้กลุ่มยาหลังการรักษา',
					   iconCls:'layout_content'
                               });
							   

var   menu8=new Ext.Action({
                     text:'8.',
					 iconCls:'page_white_office',
					 menu:[ { text:'รายงานการใช้กลุ่มยาในการรักษา',    iconCls:'layout_content' , menu:[ menu8_sub1,menu8_sub2 ] } ]
                           });

var   menu9_sub1=new Ext.Action({
                    text:'ผลการรักษาของผู้ป่วยที่ใช้กลุ่มยา ICH ในการรักษา',
                     iconCls:'layout_content'
                                });

var   menu9_sub2=new Ext.Action({
                    text:'ผลการรักษาของผู้ป่วยที่ใช้กลุ่มยา ICH + LABA ในการรักษา',
                       iconCls:'layout_content'
                                });

var   menu9_sub3=new Ext.Action({
                    text:'ผลการรักษาของผู้ป่วยที่ใช้กลุ่มยา No Controller ในการรักษา',
					 iconCls:'layout_content'

                                });


var   menu9=new Ext.Action({
                    text:'9.',
					 iconCls:'page_white_office',
					menu:[ { text:'ผลการรักษาจำแนกตามกลุ่มยา',  iconCls:'layout_content', menu:[ menu9_sub1,menu9_sub2,menu9_sub3 ] } ]

                     });						   						   														
					 
var   menu10_sub2=new Ext.Action({
                       text:'สปสชเขตขอนแก่น',
					    iconCls:'layout_content'
                    });					 
					  
var   menu10_sub1=new Ext.Action({
                       text:'เครื่องมือสร้างรายงานผลการรักษาตามการมา Follow-up',
					    iconCls:'layout_content'
                    });					 
					 
var   menu10=new Ext.Action({
                    text:'10.',
					 iconCls:'page_white_office',
					menu:[ { text:'สรุปผลการรักษา',  iconCls:'layout_content', menu:[ menu10_sub1,menu10_sub2  ] } ]

                     });
					 						   						   														
var   menu11=new Ext.Action({
                    text:'11.',
					 iconCls:'page_white_office',
					menu:[ { text:'ความรุนแรงของโรคหืดหอบก่อนเข้ารับการรักษา' ,  iconCls:'layout_content' } ]

                     });						   						   														 
					  

var  panel=new Ext.Panel({
       title:'REPORT รายงานข้อมูล',
	   frame:true,
       width:830,
	   height:300,
       renderTo:Ext.get('home_report'),
	   tbar:[
	            menu1 
				,
				menu2
				,
				menu3
				,
				menu4
				,
				menu5
				,
				menu6
				,
				menu7
				,
				menu8
				,
				menu9
				,
				menu10
				,
				menu11
	        ]
						 });
//==================end   panel
});	//end  Ext function
		
			 		
</script>
</head>

<body>
<div id="home_report"></div>
</body>
</html>

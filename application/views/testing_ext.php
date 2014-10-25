<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<?=$this->load->view('import_ext')?>

<script type="text/javascript">
    Ext.onReady(function(){
	          var   action=new Ext.Action({
			              text:'Action 1'
			              ,handler:function()
			                 {
			                          //Ext.msg('Click','You clicked on "Action 1".');
			                 }
							,iconCls:'add16' 
			  });  
			
			      
				  
				  var   panel=new  Ext.Panel({
				         title:'Action'
						 ,width:600
						 ,height:300
						  ,frame:true
						 ,bodyStyle:'padding:10px'
						 ,tbar:[
						              action, {  text:'Action Menu',menu:[action] }
								 ]
						 ,items:[
						       new Ext.Button(action)
							   //,new Ext.Button(tb)
						 ]
						 ,renderTo:Ext.get('test_ext')
				  });
				  
				  
//-------------------------- การ add ค่าเข้าไปใน  tbar				  
//	var tb = panel.getTopToolbar();
//    // Buttons added to the toolbar of the Panel above
//    // to test/demo doing group operations with an action
//    tb.add('->', {
//        text: 'Disable',
//        handler: function(){
//            action.setDisabled(!action.isDisabled());
//            this.setText(action.isDisabled() ? 'Enable' : 'Disable');
//        }
//    }, {
//        text: 'Change Text',
//        handler: function(){
//            Ext.Msg.prompt('Enter Text', 'Enter new text for Action 1:', function(btn, text){
//                if(btn == 'ok' && text){
//                    action.setText(text);
//                    action.setHandler(function(){
//                        Ext.example.msg('Click','You clicked on "'+text+'".');
//                    });
//                }
//            });
//        }
//    }, {
//        text: 'Change Icon',
//        handler: function(){
//            action.setIconClass(action.getIconClass() == 'blist' ? 'bmenu' : 'blist');
//        }
//    });
//    tb.doLayout();
//-------------------------- การ add ค่าเข้าไปใน  tbar		
	
	
	var   tb=panel.getTopToolbar();
	   tb.add(
	          {
	                text:'Disabled'
				   ,handler:function()
				       {   
					          //alert('t'); 
							     this.setText(action.isDisabled()  ? 'Enable' : 'Disable');
							  }
				   
		      }
	   );
	tb.doLayout();
	
	
	});
</script>
</head>

<body>


<div id="test_ext"></div>

</body>
</html>

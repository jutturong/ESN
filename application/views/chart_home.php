<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<script type="text/javascript">
   Ext.onReady(
       function()
	     {  
		
		
//#--------------------------------------- first chart-------------------------------------------------------------		
		      // alert('t'); 
			  var store = new Ext.data.JsonStore({
        fields:['name', 'visits', 'views'],
        data: [
            {name:'Jul 07', visits: 245000, views: 3000000},
            {name:'Aug 07', visits: 240000, views: 3500000},
            {name:'Sep 07', visits: 355000, views: 4000000},
            {name:'Oct 07', visits: 375000, views: 4200000},
            {name:'Nov 07', visits: 490000, views: 4500000},
            {name:'Dec 07', visits: 495000, views: 5800000},
            {name:'Jan 08', visits: 520000, views: 6000000},
            {name:'Feb 08', visits: 620000, views: 7500000}
        ]
    });
			  
								  new Ext.Panel({
							title: 'EEC system  visit 2011',
							renderTo: 'container',
							width:500,
							height:300,
							layout:'fit',
					
							items: {
								xtype: 'linechart',
								store: store,
								xField: 'name',
								yField: 'visits',
								listeners: {
									itemclick: function(o){
										var rec = store.getAt(o.index);
										Ext.example.msg('Item Selected', 'You chose {0}.', rec.get('name'));
									}
								}
							}
						});
//#--------------------------------------- first chart-------------------------------------------------------------		
		 
		 }
		      );
</script>
</head>

<body>
          <?
		      echo  br();
			   echo  br();
			    echo  br();
				 echo  br();
				  echo  br();
				   echo  br();
				    echo  br();
					 echo  br();
					  echo  br();
					   echo  br();
		  ?>
           <div id="container"></div>

</body>
</html>

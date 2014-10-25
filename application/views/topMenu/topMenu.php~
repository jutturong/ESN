<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<?=$this->load->view('css_topmenu')?>
<?=$this->load->view('auto_complete')?>

<script type="text/javascript">
$(function(){  
    var dateBefore=null;  
    $("#from_date").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});  


$(function(){  
    var dateBefore=null;  
    $("#to_date").datepicker({  
        showButtonPanel: true ,
        yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
        //numberOfMonths: 2, //จำนวนของเดือนที่โชว์
        // minDate: -20,
        //showWeek: true,
        firstDay: 1,
         maxDate: "+1M +10D",
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
 
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
 
    });  
      
});  
</script>


</script>

<script type="text/javascript">
    $(function()
    {
        //alert('t');
         $('#btn_report').button({ icons:{primary:'ui-icon-document'},text:true }).click(function()
         {
             $('#dialog_report').dialog({
                 resizeable:false,
                 height:250,
                 width:700,
                 modal:true,
                 buttons:{
                     "Search":function()
                     {
                          // $(this).dialog('close');
                           //alert('t');
                           //window.location.href("../../../report_pdf/appendix_report/report_hn.php");
                           //window.open('../../../report_pdf/appendix_report/report_hn.php','mywindow','width=400,height=200');
                           var  begin=$('#from_date').val();
                           var  end=$('#to_date').val();
                           $(this).dialog('close');
                          // window.open('../../../report_pdf/appendix_report/report_hn.php?begin=' + begin + '&end=' +  end ,'mywindow','');//ของเดิม
                            window.open('../../../report_pdf/appendix_report/query_report_esn.php?begin=' + begin + '&end=' +  end ,'mywindow',''); //ปรับปรุง query จากวันที่ เดือน ปี
                      },Cancel:function()
    {
        $(this).dialog('close');
    }
                 }
             });
         });
    })
    </script>

<script type="text/javascript">
   $(function()
       {
	      //btn_appendix1
		    $('#btn_appendix1').button({ icons:{primary:'ui-icon-folder-open'},text:true }).click(function()
			       {
				 // $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':1 }); //original
                                                   $('#result').load('<?=base_url()?>index.php/welcome/call_appendix1/',{ 'appendix':1 }); //modify
                                                //alert('t');
                                                
			       });
			$('#btn_appendix2').button({ icons:{primary:'ui-icon-folder-open'},text:true }).click(function()
			       {
                                                  // alert('t');//ใช้สำหรับทดสอบ
				    //$('#result').load('<?PHP echo base_url(); ?>index.php/home/load_appendix/',{ 'appendix':2 });
				   //$('#result').load('<?PHP echo base_url(); ?>index.php/welcome/load_appendix/',{ 'appendix':2 });
                                           $('#result').load('<?PHP echo base_url(); ?>index.php/welcome/test/',{ 'appendix':2 });
                                  });
			
			$('#btn_logout').button({ icons:{primary:'ui-icon-closethick'},text:true }).click(function()
			       {
			            // $('#result').load('<?=base_url()?>index.php/home/logout/',{ 'appendix':2 }); //ของเดิม
                                                      $('#result').load('<?=base_url()?>index.php/welcome/logout/',{ 'appendix':2 });
				   });
	   
	   }
	 );  
  $(function()
    {
	    
//##########################################  Appendix 1-6	   
	   //alert('t');
		  $('#app1').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':1 });
			   }
		   );
		   
				  $('#app2').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':2 });
			   }
		   );
   
   				  $('#app3').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':3 });
			   }
		   );

	   				  $('#app4').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':4 });
			   }
		   );

	   				  $('#app5').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':5 });
			   }
		   );

	   				  $('#app6').click(function()
		       { 
			       //alert('t'); 
				   $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':6 });
			   }
		   );

          //--------->search HN
		  $("#searchField").click(function(){  $(this).val(''); });
		   //--------->search ชื่อ
		  $("#search_name").click(function(){  $(this).val(''); });
		   //--------->search นามสกุล
		  $("#search_lastname").click(function(){  $(this).val(''); });
		  
		  
		  //=========== call appendix 1
		  $('#call_app1').click(function(){  $('#result').load('<?=base_url()?>index.php/appendix/call_appendix',{ 'app':2 }); });
		  
	
		  //============ ค้นหา appendix  จาก HN
/*		  
		  $("#img_search").click(function()
		  {   
		      $('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':$("#search_id_appendix1").val() });  
		  });
		  
*/		  


//################################## admin
		
		 $('#adduser').click(function(){    //สำหรับการเพิ่ม user
		        // alert('t');
				 $('#result').load('<?=base_url()?>index.php/home/load_home_admin/',{ 'admin':'home_admin' });		 
		                              
									   }
		  );



	}
   );
   
//=============================> auto complete   
/*    function all_lookup()
	{ 
		    $.ajax({
			    type:'POST'
			  // ,url:'<?=base_url()?>index.php/project/autocomplete'
			   ,url:'<?=base_url()?>index.php/home/all_autocomplete_HN'
			   ,data:'select=false'
			   ,success:function(data){
			     	$('#suggestions').show();
					$('#autoSuggestionsList').html(data); 
			   }
			});
		
     }
*/	 
	 
	 
 //=========================> ค้นหา HN  
   function lookup(inputString)
	{ 
	    if( $('#searchField').val().length == 0 )
		{
		   $('#suggestions').hide();
		}
		else{
		    $.ajax({
			    type:'POST'
			  // ,url:'<?=base_url()?>index.php/project/autocomplete'
			  // ,url:'<?=base_url()?>index.php/home/autocomplete_HN'
			   ,url:'<?=base_url()?>index.php/home/search_all'
			   
			   ,data:'HN=' + $('#searchField').val()
			   ,success:function(data){
			     	$('#suggestions').show();
					$('#autoSuggestionsList').html(data); 
			   }
			});
		}
	}
	function fill(thisValue,c_id) {
		$('#searchField').val(thisValue);
		$('#search_id_appendix1').val(c_id);
		setTimeout("$('#suggestions').hide();", 200);
		$('#result').load('<?=base_url()?>index.php/appendix/search_appendix',{ 'id_appendix1':$("#search_id_appendix1").val() });  
	}
//=============================> ค้นหาชื่อ
/*	function lookup_name(inputString)
	{ 
	    if( $('#search_name').val().length == 0 )
		{
		   $('#suggestions').hide();
		}
		else{
		    $.ajax({
			    type:'POST'
			  // ,url:'<?=base_url()?>index.php/project/autocomplete'
			   ,url:'<?=base_url()?>index.php/home/autocomplete_name'
			   ,data:'name=' + $('#search_name').val()
			   ,success:function(data){
			     	$('#suggestions').show();
					$('#autoSuggestionsList').html(data); 
			   }
			});
		}
	}
*/	
//=============================> ค้นหานามสกุล		
/*		function lookup_lastname(inputString)
	{ 
	    if( $('#search_lastname').val().length == 0 )
		{
		   $('#suggestions').hide();
		}
		else{
		    $.ajax({
			    type:'POST'
			  // ,url:'<?=base_url()?>index.php/project/autocomplete'
			   ,url:'<?=base_url()?>index.php/home/autocomplete_lastname'
			   ,data:'lastname=' + $('#search_lastname').val()
			   ,success:function(data){
			     	$('#suggestions').show();
					$('#autoSuggestionsList').html(data); 
			   }
			});
		}
	}
*/
</script>

</head>



<body>

       <div align="left">
	        <?=nbs(5)?>
           <button id="btn_report">Report</button>       
           <button id="btn_appendix1" >Appendix 1</button>
	       <button id="btn_appendix2">Start Program</button>
            <button id="btn_logout">Logout</button>
	   </div>
    
    
    
    <div id="dialog_report"  title="Report ESN System"  style="display: none">
        <!--
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">        
         </span>
        -->
        Plese specify information for report
        <?php echo br(); ?>
         Form Date :
         <input name="from_date" type="text" id="from_date"   readonly="true" style="width:20%" size="10" maxlength="20" />
         
         To :
         <input name="to_date" type="text" id="to_date"  readonly="true"  style="width:20%" size="10" maxlength="20" />
    </div>
    

        


</body>
</html>

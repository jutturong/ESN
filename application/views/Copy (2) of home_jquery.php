<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<?=$this->load->view('import_jquery')?>
<script type="text/javascript">
  $(function()
        {
		       $('#hardcopy').accordion();
		}
		);
 
  $(function()
        {
		       $('#form_system').accordion();
		}
	);	
 
  $(function()
  {
       $('#report').accordion();
  }
  );

$(function() //operation
 {
      $('#admin').accordion();
 }
            );
			

 $(function(){  $('#ui-widget-content').accordion();  });
			
 
$(function() //tab appendix1
   {
      $('#tab-app1').tabs();
      $('#tab-app2').tabs();
	  $('#tab-app3').tabs();
	  $('#tab-app4').tabs();
	  $('#tab-app5').tabs();
	  $('#tab-app6').tabs();
   }
  );

//##---------------- button  search
$(function() {
		  // $("button, input:submit, a", ".demo").button();
		  // $("a", ".demo").click(function() { return false; });
		   $('#btn_Search').button({ icons:{ primary:'ui-icon-search' } });
		   $('#btn_Logout').button({ icons:{ primary:'ui-icon-locked'} });
	});


//##------------------------ menu
$(function() 
		{
		var availableTags = ["AA0096", "AA0105", "BC5692", "coldfusion", "javascript", "asp", "ruby", "python", "c", "scala", "groovy", "haskell", "perl"];
		$("#tags").autocomplete({
			source: availableTags
								});
	     });


//##------------------------ content
 $(function() 
        {
		    $("#accordion").accordion({  event:"mouseover" });
			
		}
  );



</script>
</head>

<body>


<table width="1164" align="right">

<tr>
<td colspan="2" align="left" valign="top" class="ui-widget-header">
                    <?=nbs(5)?> 
                    <label for="tags">HN : </label>
                    <input id="tags" />
                    <button id="btn_Search">Search</button>
                    <button id="btn_Logout">Logout</button>
</td>
</tr>

<tr>
<td colspan="2" align="left" valign="top">




<div id="accordion" class="ui-widget-content">

<h3><a href="#">(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา</a></h3>
		<div id="tab-app1">
                             <ul>
                             <li><a href="#app1-insert">บันทึกข้อมูล</a></li>
                             <li><a href="#app1-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app1-insert">1</div> 
                             <div id="app1-data">2</div> 
        </div>
                    
                    
	<h3><a href="#">(Appendix 2) แบบบันทึกการติดตามการรักษา</a></h3>
						<div id="tab-app2">
					         <ul>
                                 <li><a href="#app2-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app2-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app2-insert">1</div> 
                             <div id="app2-data">2</div> 

        </div>
	<h3><a href="#">(Appendix 3) แบบบันทึกการนอนรักษาพยาบาลในโรงพยาบาล</a></h3>
						<div id="tab-app3">
					         <ul>
                                 <li><a href="#app3-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app3-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app3-insert">1</div> 
                             <div id="app3-data">2</div> 

        </div>
                    
                    
                    
                    
	<h3><a href="#">(Appendix 4) แบบบันทึกการรักษาในห้องฉุกเฉิน</a></h3>
						<div id="tab-app4">
					         <ul>
                                 <li><a href="#app4-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app4-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app4-insert">1</div> 
                             <div id="app4-data">2</div> 

        </div>
   
    <h3><a href="#">(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย</a></h3>
						<div id="tab-app5">
					         <ul>
                                 <li><a href="#app5-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app5-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app5-insert">1</div> 
                             <div id="app5-data">2</div> 

        </div>
    <h3><a href="#">(Appendix 6ุ) แบบบันทึกการเสียชีวิต</a></h3>
						<div id="tab-app6">
					         <ul>
                                 <li><a href="#app6-insert">บันทึกข้อมูล</a></li>
                                 <li><a href="#app6-data">แสดงข้อมูล</a></li>
                             </ul>
                             
                             <div id="app6-insert">1</div> 
                             <div id="app6-data">2</div> 

        </div>

    
</div>




                    
                    
                    
</div>
</td>
</tr>

<tr>
<td width="643" align="left" valign="top">
<div id="admin" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Admin  ผู้ดูแลระบบ</a></h3>
         <div>
             testing  admin
         </div>

</div>
</td>

<td width="509" align="left" valign="top">
<div id="report" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Report  การรายงานผล</a></h3>
                        <div>
                             testing  report
                        </div>
</div>
</td>
</tr>


<tr>

<td  align="left" valign="top">
<div  id="form_system" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">แบบฟอร์มต่าง ๆ</a></h3>
          <div>
                  form system
          </div>

</div>
</td>



<td align="left" valign="top">
<div  id="hardcopy" class="ui-widget-content">
<h3><?=nbs(5)?><a href="#">Hard Copy</a></h3>
         <div>
            Hard copy
         </div>
</div>

</td>
</tr>




</table>

</body>


</html>

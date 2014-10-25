<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<?=$this->load->view('css_topmenu')?>
<?=$this->load->view('auto_complete')?>

<script type="text/javascript">
   $(function()
       {
	      //btn_appendix1
		    $('#btn_appendix1').button({ icons:{primary:'ui-icon-folder-open'},text:true }).click(function()
			       {
				   		 $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':1 });
				   });
			$('#btn_appendix2').button({ icons:{primary:'ui-icon-folder-open'},text:true }).click(function()
			       {
				   		 $('#result').load('<?=base_url()?>index.php/home/load_appendix/',{ 'appendix':2 });
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
	       <button id="btn_appendix1">Appendix 1</button>
	       <button id="btn_appendix2">Appendix 2</button>
	   </div>
    <div style="margin-left:50px;">
        <ul id="menu">
            
             <img style="float:left;" alt="" src="<?=base_url()?>images/menu_left.png"/>
             
             
             
            
             <li>
               (EEC) 
            </li>
            
           
            <li><a href="#">(Appendix1-2)</a>
                  <ul id="insert_appendix">
                        <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app1">(Appendix 1) เพิ่มแบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 
                        
                          <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app2">(Appendix 2) แบบบันทึกการติดตามรักษา</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 
                        
                        
						<!--
                         <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app3">(Appendix 3) แบบบันทึกการนอนรักษาพยาบาลในโรงพยาบาล</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 

                         <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app4">(Appendix 4) แบบบันทึกการรักษาในห้องฉุกเฉิน</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 

                         <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app5">(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 

                         <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                       		<a href="#" id="app6">(Appendix 6) แบบบันทึกการเสียชีวิต</a>
                	 	<img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                        </li> 
						-->
						

                  </ul> 
                   
            </li>
            
            
			<!--
            <li><a href="#">รายงานข้อมูล(Report)</a>
                <ul id="search_appendix">
                    
                    <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#" id="call_app1">Appendix 1-6 </a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>
                    
                    
                  <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#">Appendix 2</a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>
                    
                       <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#">Appendix 3</a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>
                    
                         <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#">Appendix 4</a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>

                    <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#">Appendix 5</a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>

                    <li>
                        <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                        <a href="#">Appendix 6</a>
                        <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                    </li>


                </ul>
            </li>
            -->
            
            <li class="searchContainer">
              ระบบสืบค้น(H/ชื่อ/นามสกุล) 
              <ul>
             	     <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                    <li>
                      
                        <div>   
                                        <input type="text" id="searchField" onblur="fill();" onkeyup="lookup(this.value);"  value="" size="7" maxlength="10"/>
                                        <input name="search_id_appendix1" type="hidden" id="search_id_appendix1" size="5" maxlength="10" />
                                       <!-- <img src="<?=base_url()?>images/transfer.png" id="img_search" alt="ค้นหา" />-->
                                       <!--<img src="<?=base_url()?>images/refresh.png" alt="แสดงทั้งหมด" onclick="all_lookup()" />-->
                        </div>   
                        
                    </li> 
                    
<!--                    <li>
                        <div>
                                         <input type="text" id="search_name" onblur="fill();" onkeyup="lookup_name(this.value);"  value="" size="7" maxlength="5"/>
                        </div>
                    </li>
-->                    
<!--                    <li>
                        <div>
                                         <input type="text" id="search_lastname" onblur="fill();"   onkeyup="lookup_lastname(this.value);" size="7" maxlength="5"/>
                        </div>

                    </li>
-->                    
                    
                    
                     <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/> 
               </ul>
            </li> 
            
            
            
            
            
            
                 <?
//				 echo   $sess_id_typeuser;
//				 echo br(); 
				   if( $sess_id_typeuser==1 )
				   {
				  ?>
                <li>Administrator
                         <ul id="admin">
                        			       <li>
                                            <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                                            <a href="#" id="adduser">Add User เพิ่มผู้ใช้งาน</a>
                                            <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                                           </li>  
                         </ul>
               </li> 
               
                  <?
				    }
				  ?>
              
             
<!--              <li>  Reprt รายงานผลข้อมูล
                         <ul id="report">
                        			       <li>
                                            <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                                            <a href="#">Appendix 1</a>
                                            <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                                           </li>  
                         </ul>
               </li> 
-->               
               

                
<!--                <li>แบบฟอร์มต่างๆ
                <ul id="form_"> </ul>
                </li>
-->              
                <li>Refresh
                <ul id="refresh"> 
                
                <li>
                 <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                <a href="<?=base_url()?>index.php/home/home_system">Refresh</a>
                  <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                </li>
                
                
                </ul>
                </li>
  
                
                <li id="logout">Logout
                <ul >
                
                <li>
                 <img class="corner_inset_left" alt="" src="<?=base_url()?>images/corner_inset_left.png"/>
                <a href="<?=base_url()?>index.php/home/logout">Logout</a>
                  <img class="corner_inset_right" alt="" src="<?=base_url()?>images/corner_inset_right.png"/>
                </li>
                
                
                
                
                </ul>
                </li>


                 <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>

                       <img style="float:left;" alt="" src="<?=base_url()?>images/menu_right.png"/>
      
        </ul>
        

             
             
             
              
              
              
                      
             
    
    
    
    </div>
    
    



</body>
</html>

<html>
<head>
<title><?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?=$this->load->view('import_dojo')?>


<script type="text/javascript">
   dojo.require("dojo.parser");
  // dojo.require("dijit.form.TextBox");
   dojo.require("dijit.form.ValidationTextBox");
  
  
   //dojo.require("dijit.Tooltip");
   
/*    dojo.ready(function(){
	    alert('t');
	});
*/	
	
</script>

</head>


<body  class="claro" bgcolor="#006900" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">



<br>
<br>
<br>
<br>

<!-- ImageReady Slices (slide_login.psd) -->
<?=form_open('home/checklogin')?>
<table width="670" height="305" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
		<td>
			<img src="<?=base_url()?>images/login_01.jpg" width="106" height="130" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_02.jpg" width="85" height="130" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_03.jpg" width="174" height="130" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_04.jpg" width="135" height="130" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_05.jpg" width="113" height="130" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_06.jpg" width="57" height="130" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_07.jpg" width="106" height="87" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_08.jpg" width="85" height="87" alt=""></td>
		
        
        
        <td colspan="3" align="center" valign="middle" background="<?=base_url()?>images/login_09.jpg">
        
 <table width="291">
<tr>
                 <td width="99" height="30" align="right" valign="middle"> <label for="password">user</label>  
                 : <?=nbs(2)?>  </td>
          <td width="180" align="left" valign="middle">
          <input type="text" 
          size="10" 
          maxlength="10" 
          id="user" 
          name="user" 
          required="true" 
          dojoType="dijit.form.ValidationTextBox"  
          invalidMessage="Please type a Username" 
          value="srinagarind"
          promptMessage='Username'/>          
          </td>
        </tr>
               <tr>
               <td align="right" valign="middle">
               
               <label for="password">password </label>  
               :  <?=nbs(2)?>
               </td>
               <td align="left" valign="middle">
               <input type="password" 
               id="password" 
               name="password" 
               size="10" 
               maxlength="10"  
               dojoType="dijit.form.ValidationTextBox" 
               required="true" 
               intermediateChanges="true" 
               invalidMessage="Please type a Password"
               value="chest" 
               promptMessage='Password'/>   
                           </td>
        </tr>
             
             </table>        
        
        
			
<!--            <img src="images/login_09.jpg" width="174" height="87" alt="">
--></td>
            
            
<!--		<td>
			<img src="images/login_10.jpg" width="135" height="87" alt=""></td>
		<td>
			<img src="images/login_11.jpg" width="113" height="87" alt=""></td>
-->        
        
        
        
<td>
			<img src="<?=base_url()?>images/login_12.jpg" width="57" height="87" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_13.jpg" width="106" height="43" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_14.jpg" width="85" height="43" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_15.jpg" width="174" height="43" alt=""></td>
		<td>
			
            
            <!--<img src="images/login_16.jpg" width="135" height="43" alt="">-->
              <input type="image" src="<?=base_url()?>images/login_16.jpg">
            
            
            </td>
		<td>
			<img src="<?=base_url()?>images/login_17.jpg" width="113" height="43" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_18.jpg" width="57" height="43" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_19.jpg" width="106" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_20.jpg" width="85" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_21.jpg" width="174" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_22.jpg" width="135" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_23.jpg" width="113" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_24.jpg" width="57" height="45" alt=""></td>
	</tr>
</table>
<?=form_close()?>
<!-- End ImageReady Slices -->
</body>
</html>
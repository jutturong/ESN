<html>
<head>
<title><?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="<?=base_url()?>ESN.css" rel="stylesheet" type="text/css">


</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (login_new_slide.psd) -->



<br>
<br>
<br>
<br>
<br>
<br>


<?PHP  //echo  form_open('home/checklogin')?>
<?PHP echo form_open('welcome/checklogin');?>

<center>
<table width="614" height="265" border="0" cellpadding="0" cellspacing="0" id="Table_01" class="bordertable1">
<tr>
		<td>
			<img src="<?=base_url()?>images/login_modify03_01.jpg" width="167" height="108" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_02.jpg" width="179" height="108" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_03.jpg" width="134" height="108" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_04.jpg" width="116" height="108" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_05.jpg" width="18" height="108" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_modify03_06.jpg" width="167" height="90" alt=""></td>
		<td colspan="3" align="center" valign="middle">
        
        
        
        <table width="291" class="font16">
<tr >
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
          promptMessage='Username' class="font16"/>          
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
               promptMessage='Password' class="font16"/>   
                 </td>
        </tr>
             
          </table>
        
        
<!--        <img src="images/login_modify03_07.jpg" width="179" height="90" alt="">
        <img src="images/login_modify03_08.jpg" width="134" height="90" alt="">
		<img src="images/login_modify03_09.jpg" width="116" height="90" alt="">
-->        </td>
<td>
		<img src="<?=base_url()?>images/login_modify03_10.jpg" width="18" height="90" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_modify03_11.jpg" width="167" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_12.jpg" width="179" height="45" alt=""></td>
		<td>
			
            
<!--            <img src="images/login_modify03_13.jpg" width="134" height="45" alt="">
-->             <input type="image" src="<?=base_url()?>images/login_modify03_13.jpg">
            
            
      </td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_14.jpg" width="116" height="45" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_15.jpg" width="18" height="45" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/login_modify03_16.jpg" width="167" height="22" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_17.jpg" width="179" height="22" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_18.jpg" width="134" height="22" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_19.jpg" width="116" height="22" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/login_modify03_20.jpg" width="18" height="22" alt=""></td>
	</tr>
</table>
</center>

<?=form_close()?>
<!-- End ImageReady Slices -->
</body>
</html>
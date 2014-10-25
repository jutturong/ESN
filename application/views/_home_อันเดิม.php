<html>
<head>
<title><?=$title?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?=$this->load->view('import_new')?>   <!--import_jquery-->
<?=$this->load->view('import_ext')?>

<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>images/favicon.ico">

</head>
<body bgcolor="#006900">
<!-- ImageReady Slices (slide_home.psd) -->
<table width="1300" height="1500" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
<tr>
		<td>
			<img src="<?=base_url()?>images/home_01.jpg" width="71" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_02.jpg" width="290" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_03.jpg" width="14" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_04.jpg" width="200" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_05.jpg" width="219" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_06.jpg" width="226" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_07.jpg" width="186" height="133" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_08.jpg" width="94" height="133" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/home_09.jpg" width="71" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_10.jpg" width="290" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_11.jpg" width="14" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_12.jpg" width="200" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_13.jpg" width="219" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_14.jpg" width="226" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_15.jpg" width="186" height="109" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_16.jpg" width="94" height="109" alt=""></td>
	</tr>
	<tr>
		<td background="<?=base_url()?>images/home_17.jpg">
        
			<!--<img src="<?=base_url()?>images/home_17.jpg" width="71" height="1191" alt="">-->
            
            </td>
		
        
        
        <td align="left" valign="top" >
        
              <!-- ###Main menu ####-->
        
			<!--<img src="images/home_18.jpg" width="290" height="1191" alt="">-->            
                <?=$this->load->view('mainmenu')?>
         </td>
         
         
            
            
            
		<td background="<?=base_url()?>images/home_19.jpg">
			<!--<img src="<?=base_url()?>images/home_19.jpg" width="14" height="1191" alt="">-->
            
            </td>
		<td colspan="4" align="left" valign="top" background="<?=base_url()?>images/home_21.jpg">
                   <!--####content#####-->
                   
                   <?  @include($file);    ?>
                   
                      <!--tesging  .. content-->
        
<!--			<img src="images/home_20.jpg" width="200" height="1191" alt="">
			<img src="images/home_21.jpg" width="219" height="1191" alt="">
			<img src="images/home_22.jpg" width="226" height="1191" alt="">
			<img src="images/home_23.jpg" width="186" height="1191" alt="">
--> </td>
<td background="<?=base_url()?>images/home_24.jpg">
			<!--<img src="<?=base_url()?>images/home_24.jpg" width="94" height="1191" alt="">-->
            
            </td>
	</tr>
	<tr>
		<td>
			<img src="<?=base_url()?>images/home_25.jpg" width="71" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_26.jpg" width="290" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_27.jpg" width="14" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_28.jpg" width="200" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_29.jpg" width="219" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_30.jpg" width="226" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_31.jpg" width="186" height="67" alt=""></td>
		<td>
			<img src="<?=base_url()?>images/home_32.jpg" width="94" height="67" alt=""></td>
	</tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
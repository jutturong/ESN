<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title; ?></title>
<?PHP  $this->load->view('import_jquery'); ?>
</head>

<body>

<?PHP
	/*      
         $atts = array(
	        'width'      => '800',
	         'height'     => '600',
	          'scrollbars' => 'yes',
	          'status'     => 'yes',
	          'resizable'  => 'yes',
	          'screenx'    => '0',
	          'screeny'    => '0'
		         );
        */ 
	//echo anchor_popup('loadtable/load_form_medication_error_view/'.$HN.'/'.$MonitoringDate, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
	//echo anchor_popup('blood/call_data/'.$HN, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
?>
 
<?PHP  echo form_fieldset($fieldset); ?>    
<form id="form1" name="form1" method="post" action="">
<table width="728" border="1" style="border-collapse:collapse">
  <tr>
    <td width="104">&nbsp;Hb :</td>
    <td width="230">
    
        <input name="textfield" type="text" id="textfield" value="<?PHP echo @$Lab8; ?>" size="10" maxlength="10" /> 
        g/dL
       

    </td>
    <td width="115">L :</td>
    <td width="251">
      <input name="textfield8" type="text" id="textfield8" value="<?PHP echo @$Lab16; ?>" size="10" maxlength="10" />
      %</td>
  </tr>
  <tr>
    <td>Hct :</td>
    <td>
      <input name="textfield2" type="text" id="textfield2" value="<?PHP echo @$Lab9; ?>" size="10" maxlength="10" />
      %
   </td>
    <td>M :</td>
    <td>
      <input name="textfield9" type="text" id="textfield9" value="<?PHP echo @$Lab17; ?>" size="10" maxlength="10" />
      %</td>
  </tr>
  <tr>
    <td>WBC :</td>
    <td>
      <input name="textfield3" type="text" id="textfield3" value="<?PHP echo @$Lab10; ?>" size="10" maxlength="10" />
    C / mm <sup>3</sup></td>
    <td>E :</td>
    <td>
      <input name="textfield10" type="text" id="textfield10" value="<?PHP echo @$Lab18; ?>" size="10" maxlength="10"/>
      %
   </td>
  </tr>
  <tr>
    <td>Platelet :</td>
    <td>
      <input name="textfield4" type="text" id="textfield4" value="<?PHP echo @$Lab11; ?>" size="10" maxlength="10" />
     C / mm <sup>3</sup></td>
    <td>B :</td>
    <td>
        <input type="text" name="textfield11" id="textfield11" value="<?PHP echo @$Lab19; ?>" size="10" maxlength="10" /> 
      %
   </td>
  </tr>
  <tr>
    <td>Blast :</td>
    <td>
      <input name="textfield5" type="text" id="textfield5" value="<?PHP echo @$Lab12; ?>" size="10" maxlength="10" />
   </td>
    <td>INR :</td>
    <td>
        <input type="text" name="textfield12" id="textfield12" value="<?PHP echo @$Lab20; ?>" size="10" maxlength="10" />
   </td>
  </tr>
  <tr>
    <td>Band :</td>
    <td>
      <input name="textfield6" type="text" id="textfield6" value="<?PHP echo @$Lab13; ?>" size="10" maxlength="10" />
  </td>
    <td>PT :</td>
    <td>
      <input type="text" name="textfield13" id="textfield13" value="<?PHP echo @$Lab21; ?>" size="10" maxlength="10" />
      Sec</td>
  </tr>
  <tr>
    <td>PMN :</td>
    <td>
      <input name="textfield7" type="text" id="textfield7" value="<?PHP echo @$Lab14; ?>" size="10" maxlength="10"/>
    </label></td>
    <td>aPTT :</td>
    <td>
      <input name="textfield14" type="text" id="textfield14" value="<?PHP echo @$Lab22; ?>" size="10" maxlength="10" />
      Sec</td>
  </tr>
  <tr>
    <td>ANC :</td>
    <td>
        <input name="textfield14" type="text" id="textfield14" value="<?PHP echo @$Lab15; ?>" size="10" maxlength="10" />
        cell</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    
    
  <tr>
    <td>วัน - เดือน - ปี :</td>
    <td>
         <?PHP  $this->imagemodels->nextpage($select_name,$HN_val,$query_dmy,$url); ?>  
    
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    
  <!--  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  -->
  
    <!--
    <tr>
        <td colspan="4" align="center"><button>บันทึก</button><button>ล้างข้อมูล</button></td>

  </tr>
    -->
    
</table>

</form>
 <?PHP echo form_close(); ?>   
    
    
</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


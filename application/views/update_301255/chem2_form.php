<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<title>Untitled Document</title>
--></head>

<body>
<?PHP
	       $atts = array(
	        'width'      => '800',
	         'height'     => '600',
	          'scrollbars' => 'yes',
	          'status'     => 'yes',
	          'resizable'  => 'yes',
	          'screenx'    => '0',
	          'screeny'    => '0'
		         );
	//echo anchor_popup('loadtable/load_form_medication_error_view/'.$HN.'/'.$MonitoringDate, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
	echo anchor_popup('chem2/call_data/'.$HN, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
?>
<form id="form1" name="form1" method="post" action="">
<table width="879" border="1" style="border-collapse:collapse">
  <tr>
    <td width="108">TB :</td>
    <td width="177">

        <input name="textfield" type="text" id="textfield" size="10" maxlength="10" value="" />
        mg/dL
     
  
    </td>
    <td width="94">LDL :</td>
    <td width="472"><label>
      <input name="textfield3" type="text" id="textfield3" size="10" maxlength="10" value="" />
    mg/dL</label></td>
  </tr>
  <tr>
    <td>DB :</td>
    <td><label>
      <input name="textfield2" type="text" id="textfield2" size="10" maxlength="10"  value=""/>
      mg/dL
    </label></td>
    <td>A1C :</td>
    <td><label>
      <input name="textfield4" type="text" id="textfield4" size="10" maxlength="10" />
    %</label></td>
  </tr>
  <tr>
    <td>ALT :</td>
    <td><label>
      <input name="textfield8" type="text" id="textfield8" size="10" maxlength="10" value="" />
    U/L</label></td>
    <td>CK :</td>
    <td><label>
      <input name="textfield5" type="text" id="textfield5" size="10" maxlength="10" />
    U/L</label></td>
  </tr>
  <tr>
    <td>AST :</td>
    <td><label>
      <input name="textfield9" type="text" id="textfield9" size="10" maxlength="10" value="" />
    U/L</label></td>
    <td>CK-MB :</td>
    <td><label>
      <input name="textfield6" type="text" id="textfield6" size="10" maxlength="10" />
    U/L</label></td>
  </tr>
  <tr>
    <td>ALP :</td>
    <td><label>
      <input name="textfield10" type="text" id="textfield10" size="10" maxlength="10" value=""/>
    U/L</label></td>
    <td>Trop-T :</td>
    <td><label>
      <input name="textfield7" type="text" id="textfield7" size="10" maxlength="10" />
      U/L
    </label></td>
  </tr>
  <tr>
    <td>Chol :</td>
    <td><label>
      <input name="textfield11" type="text" id="textfield11" size="10" maxlength="10" value="" />
    mg/dL</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>TG :</td>
    <td><label>
      <input name="textfield12" type="text" id="textfield12" size="10" maxlength="10" value=""/>
    mg/dL</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>HDL :</td>
    <td><label>
      <input name="textfield13" type="text" id="textfield13" size="10" maxlength="10" value="" />
    </label>
      mg/dL</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
      <tr>
          <td colspan="4"><button>บันทึก</button><button>ล้างข้อมูล</button></td>

  </tr>
    
</table>

</form>
  
  
</body>
</html>

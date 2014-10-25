<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title; ?></title>
</head>

    <?PHP echo $this->load->view('import_jquery'); ?>
    
<body>
<?PHP echo form_fieldset($fieldset)?>
<form id="form1" name="form1" method="post" action="">
<table width="700" border="1" style="border-collapse:collapse">
  <tr>
    <td >TB :</td>
    <td >

        <input name="textfield" type="text" id="textfield" size="5" maxlength="10" value="<?PHP echo $Lab37; ?>" readonly />
        mg/dL
     
  
    </td>
    <td >LDL :</td>
    <td ><label>
      <input name="textfield3" type="text" id="textfield3" size="5" maxlength="10" value="<?PHP echo $Lab47; ?>" readonly />
    mg/dL</label></td>
  </tr>
    
    
  <tr>
    <td>DB :</td>
    <td><label>
      <input name="textfield2" type="text" id="textfield2" size="5" maxlength="10"  value="<?PHP echo $Lab38; ?>" readonly/>
      mg/dL
    </label></td>
    <td>A1C :</td>
    <td><label>
      <input name="textfield4" type="text" id="textfield4" size="5" maxlength="10" value="<?PHP echo $Lab44; ?>" readonly />
    %</label></td>
  </tr>
  <tr>
    <td>ALT :</td>
    <td><label>
      <input name="textfield8" type="text" id="textfield8" size="5" maxlength="10" value="<?PHP echo $Lab39; ?>" readonly />
    U/L</label></td>
    <td>CK :</td>
    <td><label>
      <input name="textfield5" type="text" id="textfield5" size="5" maxlength="10" value="<?PHP echo $Lab42; ?>" readonly/>
    U/L</label></td>
  </tr>
  <tr>
    <td>AST :</td>
    <td><label>
      <input name="textfield9" type="text" id="textfield9" size="5" maxlength="10" value="<?PHP echo $Lab40; ?>" readonly/>
    U/L</label></td>
    <td>CK-MB :</td>
    <td><label>
      <input name="textfield6" type="text" id="textfield6" size="10" maxlength="10" value="<?PHP echo $Lab43; ?>" readonly/>
    U/L</label></td>
  </tr>
  <tr>
    <td>ALP :</td>
    <td><label>
      <input name="textfield10" type="text" id="textfield10" size="5" maxlength="10" value="<?PHP echo $Lab41; ?>" readonly/>
    U/L</label></td>
    <td>Trop-T :</td>
    <td><label>
      <input name="textfield7" type="text" id="textfield7" size="10" maxlength="10" value="<?PHP echo $Lab44; ?>" readonly/>
      U/L
    </label></td>
  </tr>
  <tr>
    <td>Chol :</td>
    <td><label>
            <input name="textfield11" type="text" id="textfield11" size="5" maxlength="10" value="" />
    mg/dL</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>TG :</td>
    <td><label>
            <input name="textfield12" type="text" id="textfield12" size="5" maxlength="10" value="<?PHP echo $Lab45; ?>" readonly/>
    mg/dL</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    
  <tr>
    <td>HDL :</td>
    <td><label>
            <input name="textfield13" type="text" id="textfield13" size="5" maxlength="10" value="<?PHP echo @$Lab46; ?>" readonly />
    </label>
      mg/dL</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

 <tr>
        <td colspan="4">
             วัน - เดือน - ปี : <?PHP $this->imagemodels->nextpage($select_name,$HN_val,$query_dmy,$url); ?>

        </td>
    </tr>
    
</table>

</form>
  <?PHP echo form_close(); ?>
  
</body>
</html>

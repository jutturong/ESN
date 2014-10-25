<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title; ?></title>
<?PHP  $this->load->view('import_jquery'); ?>
<script type="text/javascript">
    $(function()
       {
           $('#btnclcr').click(function()
            {
                //alert('t');
                 var  count_year =$('#count_year').val();
                 var  bw=$('#bw').val();
                 var  sex=$('#sex').val();
                 var scr=$('#scr').val();
                 var  result;
                 var total;
                // var sex = 2;  // สมมุติค่า
                 if( sex == 1 )
                 {
                     alert('เพศ : ชาย');
                    // result=1.23 * bw * (140-count_year);
                     // result=  ( bw * (140-count_year) / 72 ) * scr;
                        result=  ( (140-count_year) * bw ) /  (72 *scr);   
                     $('#result_clcr').val(result);
                 }
                 else
                 {
                     alert('เพศ : หญิง');
                    // result=0.85 * bw * (140-count_year);
                     // result=  (bw * (140-count_year) / 72 ) * scr * 0.85;
                       result=  ( (140-count_year) * bw ) /  (72 *scr);  
                       total=result * 0.85
                       
                     $('#result_clcr').val(total);
                 }
            }); 
           
       });

</script>

</head>

<body>

    <?PHP
    //echo  $Lab23;
    ?>
    
 <?PHP echo form_fieldset($fieldset); ?>   
<form id="form1" name="form1" method="post" action="">
    

<table width="687" border="1" style="border-collapse:collapse">
  <tr>
    <td width="125">BS :</td>
    <td width="175">
     
        <input name="textfield" type="text" id="textfield" value="<?PHP echo @$Lab23; ?>" size="3" maxlength="10" readonly />
      
   
    mg/dL</td>
    <td width="105">CI :</td>
    <td width="254">
      <input name="textfield8" type="text" id="textfield8" value="<?PHP echo @$Lab30; ?>" size="3" maxlength="10" readonly />
    mEq/L</td>
  </tr>
  <tr>
    <td>BUN :</td>
    <td>
      <input name="textfield2" type="text" id="textfield2" value="<?PHP echo @$Lab24; ?>" size="3" maxlength="10" readonly/>
    mg/dL</td>
    <td>Ca :</td>
    <td>
      <input name="textfield9" type="text" id="textfield9" size="3" maxlength="10"   value="<?PHP echo @$Lab31; ?>" readonly/>
    g/dL</td>
  </tr>
  <tr>
    <td>SCr :</td>
    <td>
        <label>
      <input name="textfield3" type="text" id="scr" value="<?PHP echo @$Lab25; ?>" size="3" maxlength="10"  readonly/>
    mg/dL</label>
    </td>
    <td>P :</td>
    <td width="254" height="10">
      <input name="textfield10" type="text" id="textfield10" size="3" maxlength="10" value="<?PHP echo @$Lab32; ?>" readonly/>
      mg / dL
      
   </td>
  </tr>
  <tr>
      <td>
          
          <button id="btnclcr" type="button">คำนวณ CLCr</button>
      
      </td>
    <td>
        ( weight )
        <input type="text" id="bw" size="5" />
        <input type="hidden" id="sex" value="<?PHP echo $sex;   ?>" size="5" />
      
        <input type="text" id="result_clcr" size="5" readonly  /> mL / min
        <br>
            (อายุ)
        <input type="text" id="count_year" value="<?PHP echo $count_year;   ?>" size="5" />
       
    
    </td>
    <td>TP :</td>
    <td><label>
      <input name="textfield11" type="text" id="textfield11" size="3" maxlength="10" value="<?PHP echo @$Lab35; ?>" readonly />
    g/dL</label></td>
  </tr>
  <tr>
    <td>Uric acid :</td>
    <td><label>
      <input name="textfield4" type="text" id="textfield4" value="<?PHP echo @$Lab26; ?>" size="3" maxlength="10" readonly />
    mg / dL</label></td>
    <td>Alb :</td>
    <td><label>
      <input name="textfield12" type="text" id="textfield12" size="3" maxlength="10" value="<?PHP echo @$Lab36; ?>" readonly />
    g/dL</label></td>
  </tr>
  <tr>
    <td>Na :</td>
    <td><label>
      <input name="textfield5" type="text" id="textfield5" value="<?PHP echo @$Lab27; ?>" size="3" maxlength="10" readonly />
    mEg/L</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>K</td>
    <td><label>
      <input name="textfield6" type="text" id="textfield6" value="<?PHP echo @$Lab28; ?>" size="3" maxlength="10" readonly />
    mEg/L</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>HCO <sub>3</sub></td>
    <td><label>
      <input name="textfield7" type="text" id="textfield7" value="<?PHP echo @$Lab29; ?>" size="3" maxlength="10" readonly/>
    mEg/L</label></td>
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

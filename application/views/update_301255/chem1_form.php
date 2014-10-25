<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title; ?></title>

<script type="text/javascript">
    $(function()
       {
           $('#btnclcr').click(function()
            {
                //alert('t');
                 var  count_year =$('#count_year').val();
                 var  bw=$('#bw').val();
                 var  sex=$('#sex').val();
                 
                 var  result;
                 if( sex == 1 )
                 {
                     alert('เพศ : ชาย');
                     result= (bw * (140-count_year) ) / 72;
                     $('#result_clcr').val(result);
                 }
                 else
                 {
                     alert('เพศ : หญิง');
                     result= ( ( bw * (140-count_year) ) / 72 ) * 0.85  ;
                     $('#result_clcr').val(result);
                 }
            }); 
           
       });

</script>


</head>

<body>

<form id="form1" name="form1" method="post" action="">
    
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
	echo anchor_popup('chem1/call_data/'.$HN, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
?>
    
<table width="687" border="1" style="border-collapse:collapse">
  <tr>
    <td width="125">BS :</td>
    <td width="175">
     
        <input name="textfield" type="text" id="textfield" value="" size="10" maxlength="10" />
      
   
    mg/dL</td>
    <td width="105">CI :</td>
    <td width="254">
      <input name="textfield8" type="text" id="textfield8" value="" size="10" maxlength="10" />
    mEq/L</td>
  </tr>
  <tr>
    <td>BUN :</td>
    <td>
      <input name="textfield2" type="text" id="textfield2" value="" size="10" maxlength="10" />
    mg/dL</td>
    <td>Ca :</td>
    <td>
      <input name="textfield9" type="text" id="textfield9" size="10" maxlength="10"   value=""/>
    g/dL</td>
  </tr>
  <tr>
    <td>SCr :</td>
    <td><label>
      <input name="textfield3" type="text" id="textfield3" value="" size="10" maxlength="10" />
    mg/dL</label></td>
    <td>P :</td>
    <td width="254" height="10">
      <input name="textfield10" type="text" id="textfield10" size="10" maxlength="10" value="" />
      mg / dL
      
   </td>
  </tr>
  <tr>
    <td>
        <button id="btnclcr" type="button">คำนวณ CLCr</button>  BW ( Weight )  <input type="text" id="bw" size="5" maxlength="5" />
    
   <input type="hidden" id="sex" value="<?PHP echo $sex;   ?>" size="5" />
        
    
    </td>
    <td>  
       
        <input type="text" id="result_clcr" size="5" readonly  />mL / min 
         (อายุ)
        <input type="text" id="count_year" value="<?PHP echo $count_year;   ?>" size="5" readonly />
       
         
        
    </td>
    <td>TP :</td>
    <td><label>
      <input name="textfield11" type="text" id="textfield11" size="10" maxlength="10" value="" />
    g/dL</label></td>
  </tr>
  <tr>
    <td>Uric acid :</td>
    <td><label>
      <input name="textfield4" type="text" id="textfield4" value="" size="10" maxlength="10" />
    mg / dL</label></td>
    <td>Alb :</td>
    <td><label>
      <input name="textfield12" type="text" id="textfield12" size="10" maxlength="10" value="" />
    g/dL</label></td>
  </tr>
  <tr>
    <td>Na :</td>
    <td><label>
      <input name="textfield5" type="text" id="textfield5" value="" size="10" maxlength="10" />
    mEg/L</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>K</td>
    <td><label>
      <input name="textfield6" type="text" id="textfield6" value="" size="10" maxlength="10" />
    mEg/L</label></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>HCO <sub>3</sub></td>
    <td><label>
      <input name="textfield7" type="text" id="textfield7" value="" size="10" maxlength="10" />
    mEg/L</label></td>
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
        <td colspan="4" align="center"><button>บันทึก</button><button>ล้าง</button></td>
  </tr>
    
</table>
</form>
 
 
</body>
</html>

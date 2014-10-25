<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?PHP echo $title; ?></title>
<?PHP  $this->load->view('import_jquery'); ?>
<script type="text/javascript">
  $(function()
  {
      $('#btn_BSA').click(function()
      {
            
             var  w=parseFloat($('#weight').val());
             var  h=parseFloat($('#height').val());
             var  res='';
             if( w > 0  &&  h > 0  )
             {
                 // alert('test');
                 res=(w*h)/3600;
                 res=Math.sqrt(res);
                 $('#txt_BSA').val(res);
             }
             
      });
  });
</script>
</head>

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
	echo anchor_popup('general/call_data/'.$HN, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
?>

 <form id="form1" name="form1" method="post" action="">
<table width="549" border="1" style="border-collapse:collapse">
  <tr>
    <td width="300">Weight :</td>
    <td width="363">
   
     
        <input name="textfield" type="text" id="weight" size="10" maxlength="10" value="" /> 
        kg.
    

    </td>
  </tr>
  <tr>
    <td>Height :</td>
    <td><label>
      <input name="textfield2" type="text" id="height" size="10" maxlength="10"  value="" />
    cm.</label></td>
  </tr>
  <tr>
      <td><button type="button" id="btn_BSA">รายการคำนวณ BSA</button> :</td>
    <td>
       <?PHP echo nbs(); ?>     
        <input type="text" readonly maxlength="10" size="10" id="txt_BSA"/> 
        m  
        
        <sup>2</sup>
    </td>
  </tr>
  <tr>
    <td>RR :</td>
    <td><label>
      <input name="textfield3" type="text" id="textfield3" size="10" maxlength="10" value="" />
    times/min</label></td>
  </tr>
  <tr>
    <td>HR :</td>
    <td><label>
      <input name="textfield4" type="text" id="textfield4" size="10" maxlength="10"  value=""/>
    bpm</label></td>
  </tr>
  <tr>
    <td>BP :</td>
    <td><label>
      <input name="textfield5" type="text" id="textfield5" size="10" maxlength="10" value="" />
    mm. Hg</label></td>
  </tr>
  <tr>
    <td>BT :</td>
    <td><label>
      <input name="textfield6" type="text" id="textfield6" size="10" maxlength="10"  value=""/>
    </label></td>
  </tr>
  
    <tr>
        <td colspan="2" align="center"> 
            <button>บันทึกข้อมูล</button>
             <button>ล้างข้อมูล</button>
        </td>    
    </tr>
    
    
</table>


    </form>

</body>
</html>

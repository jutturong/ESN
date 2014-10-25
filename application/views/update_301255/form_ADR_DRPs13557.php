<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<?=$this->load->view('import_jquery')?>
</head>

<body>

<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
Monitoring Date : <input type="text" value="<?=$MonitoringDate?>" readonly="true" size="10" maxlength="20" >
</li>
<li>
    ADRs : <select><?=$this->epiquery->adrscode_tb()?></select>        
</li>
<li>Drug/Product : <select><?=$this->epiquery->drug_tb()?></select></li>
<li>Detail : <input type="text" size="40" maxlength="60"></li>
<li>Action : <input type="radio"> Prevent <input type="radio"> Correct </li>
<li>Intervention : 
                  <table>
				  <tr>
				  <td>Patient</td> <td>Doctor</td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Adjust for appropriate therapy due to health system </td>
				  <td><input type="checkbox"> Add new medication </td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Correct technique of administration </td>
				  <td><input type="checkbox"> Adjust dosage regimen </td>
				  </tr>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Improve compliance </td>
				  <td><input type="checkbox"> Confirm prescription </td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Inform drug relate problems </td>
				  <td><input type="checkbox"> Discontinue medication </td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Life style modification </td>
				  <td><input type="checkbox"> Inform drug related problems </td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Monitor efficacy and toxicity </td>
				  <td><input type="checkbox"> Suggest changing medication </td>
				  </tr>
				  <tr>
				  <td><input type="checkbox"> Prevention of Adverse drug reaction </td>
				  <td><input type="checkbox"> Suggest laboratory </td>
				  </tr>



				  
				  </table>
         

</li>
<li>Response : <input type="radio"> Resolved <input type="radio"> Improved  <textarea cols="35" rows="1"></textarea>    
      <br>
	  <input type="radio"> Not Improved <input type="radio"> N/A
</li>
<li>Cause : <input type="checkbox"> สาเหตุจากตัวผู้ป่วย <input type="checkbox"> สาเหตุจากโรค <input type="checkbox"> สาเหตุจากยา 
        <br>
		<input type="checkbox"> สาเหตุจากผู้ดูแล <input type="checkbox"> สาเหตุอื่นๆ
</li>
<li>ผู้ประเมิน : <font color="red"><?=$name?></font> 

</li>

<li>
ลือก วัน-เดือน-ปี :
<?PHP
   $this->epiquery->list_date_tabel_open($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
              //list_date_tabel_open($tb,$HN_name,$HN_val,$date_name,$select_name,$url)//วัน-เดือน-ปี ภายใน table
?>
    
</li>


</ul>
<?PHP
echo form_close();
?>


</body>
</html>

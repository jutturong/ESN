<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<script>
$(function()
{
   //alert('t');
}
);
</script>
</head>

<body>
<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
			Non Compliance Type :  <select>
										<option>:: select ::</option>
										<?=$this->epiquery->select_compliance_type()?>
						   		   </select> 
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
									//echo anchor_popup('loadtable/load_view_noncompliance/'.$HN.'/'.$MonitoringDate, 'View', $atts);
                                                              
                                                                        ?> 
</li>
<li>Drug/Product : <select><?=$this->epiquery->drug_product()?></select></li>
<li>Detail : <input type="text" size="30" maxlength="50" value=""></li>


<li>Action : <input type="radio" > Prevent <input type="radio"> Correct </li>







<li>Intervention : 

<?PHP
			
$pharmacist = array(
									  'width'      => '800',
									  'height'     => '300',
									  'scrollbars' => 'yes',
									  'status'     => 'yes',
									  'resizable'  => 'yes',
									  'screenx'    => '0',
									  'screeny'    => '0'
						  );

		  echo anchor_popup('loadtable/load_view_pharmacist_noncompliance/'.$HN.'/'.$MonitoringDate, 'Click To Add Intervention',$pharmacist);
?> 
</li>

<li>Result :
 
<input type="radio" > Resolved 


<input type="radio" > Improved


<input type="radio" > Not Improved 

<input type="radio" > N/A

<input type="radio" checked> Resolved 
<input type="radio" checked> Improved
<br>
<input type="radio" checked> Not Improved 
<input type="radio" checked> N/A
<br>

<textarea cols="40" rows="2"></textarea>
 </li>
<li>Cause :

   
   <input type="radio" > สาเหตุจากตัวผู้ป่วย 
<input type="radio" > สาเหตุจากผู้ดูแล
<br>
<input type="radio" > สาเหตุจากยา 
<input type="radio" > สาเหตุอื่นๆ
<br>
<input type="radio"> สาเหตุจากโรค

</li>
<li>
    <button>บันทึก</button>
    <button>ล้างข้อมูล</button>   
</li>




</ul>
<?PHP
echo form_close();
?>
</body>
</html>

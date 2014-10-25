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
			Medication error :  <select>
										<option>:: select ::</option>
										<?  //$this->epiquery->select_compliance_type() ?>
                                        <?=$this->epiquery->select_medication_err()?>
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
									echo anchor_popup('loadtable/load_form_medication_error_view/'.$HN.'/'.$MonitoringDate, 'View', $atts);
								   ?>
								   <button>Add</button> 
</li>
<li>Drug/Product : <select><?=$this->epiquery->drug_product()?></select></li>
<li>Detail : <input type="text" size="30" maxlength="50" value="<?=$MedicationErrorDetail?>"></li>

<li>
Action :
<? if( $Action4==1) 
{
?> 
<input type="radio" checked> Prevent
<?
}
elseif( $Action4==2  )
{
?>
<input type="radio" checked> Correct 
<?
}
else
{
?>
<input type="radio" > Prevent
<input type="radio" > Correct 
<?
}
?>
</li>

<li>Intervention : 
<!--<button>Click To Add Intervention</button>-->
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
		  echo anchor_popup('loadtable/load_view_pharmacist_medication_error/'.$HN.'/'.$MonitoringDate, 'Click To Add Intervention',$pharmacist);
?>
</li>
<li>Result : 
<?
if( $Response4==1)
{
?>
<input type="radio" checked> Resolved 
<input type="radio"> Improved
<br>
<input type="radio"> Not Improved 
<input type="radio"> N/A
<br>
<?
}
elseif(  $Response4==2  )
{
?>
<input type="radio" > Resolved 
<input type="radio" checked> Improved
<br>
<input type="radio"> Not Improved 
<input type="radio"> N/A
<br>
<?
}
elseif( $Response4=='' )
{
?>
<input type="radio" > Resolved 
<input type="radio" > Improved
<br>
<input type="radio" > Not Improved 
<input type="radio"> N/A
<br>
<?
}
elseif( $Response4==4 )
{
?>
<input type="radio" > Resolved 
<input type="radio" > Improved
<br>
<input type="radio" > Not Improved
<input type="radio" checked> N/A
<br>
<?
}
else
{
?>
<input type="radio" checked> Resolved 
<input type="radio"> Improved
<br>
<input type="radio"> Not Improved 
<input type="radio"> N/A
<br>
<?
}
?>
<textarea cols="40" rows="2"><?=$ResponseDetail4?></textarea>
 </li>
 
<!-- 
<li>Cause : <input type="radio"> สาเหตุจากตัวผู้ป่วย <input type="radio"> สาเหตุจากผู้ดูแล
<br>
<input type="radio"> สาเหตุจากยา <input type="radio"> สาเหตุอื่นๆ
<br>
<input type="radio"> สาเหตุจากโรค
</li>
<li></li>
-->

</ul>
<?PHP
echo form_close();
?>
</body>
</html>

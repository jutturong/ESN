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
									echo anchor_popup('loadtable/load_view_noncompliance/'.$HN.'/'.$MonitoringDate, 'View', $atts);
								   ?> 
</li>
<li>Drug/Product : <select><?=$this->epiquery->drug_product()?></select></li>
<li>Detail : <input type="text" size="30" maxlength="50" value="<?=$NonComplianceDetail1?>"></li>

<?PHP
if( $Action1 == 1 )
{
?>
<li>Action : <input type="radio" checked> Prevent <input type="radio"> Correct </li>
<?PHP
}
elseif( $Action1 == 2 )
{
?>
<li>Action : <input type="radio" > Prevent <input type="radio" checked> Correct </li>
<?PHP
}
else
{
?>
<li>Action : <input type="radio" > Prevent <input type="radio" > Correct </li>
<?PHP
}
?>
<li>Intervention : 
<!--<button>Click To Add Intervention</button>
-->
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
<?
if( $Response1 == 1   )
{
?> 
<input type="radio" checked> Resolved 
<?
}
elseif(  $Response1 == 2  )
{
?>
<input type="radio" checked> Improved
<?
}
elseif( $Response1 == 3   )
{
?>
<br>
<input type="radio" checked> Not Improved 
<?
}
elseif( $Response1 == 4 )
{
?>
<input type="radio" checked> N/A
<br>
<?
}
else
{
?>
<input type="radio" checked> Resolved 
<input type="radio" checked> Improved
<br>
<input type="radio" checked> Not Improved 
<input type="radio" checked> N/A
<br>
<?
}
?>

<textarea cols="40" rows="2"><?=$ResponseDetail1?></textarea>
 </li>
<li>Cause :
<? if($Cause1_1==1)
{
?> 
   <input type="radio" checked> Resolved 
   <input type="radio" checked> สาเหตุจากตัวผู้ป่วย 
<?
}
else
{
?>
	 <input type="radio" checked> สาเหตุจากตัวผู้ป่วย 
<?
}
?>

<?
if( $Cause1_4==1  )
{
?>
<input type="radio" checked> สาเหตุจากผู้ดูแล
<?
}
else
{
?>
<input type="radio" > สาเหตุจากผู้ดูแล
<?
}
?>
<br>

<?
if( $Cause1_3==1 )
{
?>
<input type="radio" checked> สาเหตุจากยา 
<?
}
else
{
?>
<input type="radio" > สาเหตุจากยา 
<?
}
?>


<?
if( $Cause1_5==1  )
{
?>
<input type="radio" checked> สาเหตุอื่นๆ
<?
}
else
{
?>
<input type="radio" > สาเหตุอื่นๆ
<?
}
?>


<br>

<?
if( $Cause1_2==1)
{
?>
<input type="radio" checked> สาเหตุจากโรค
<?
}
else
{
?>
<input type="radio"> สาเหตุจากโรค
<?
}
?>


</li>
<li>
    <button type="button">เพิ่มข้อมูล</button>
     <button type="button">ล้างข้อมูล</button>
</li>
</ul>
<?PHP
echo form_close();
?>
</body>
</html>

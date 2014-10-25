<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>

</head>

<body>
<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>

<?
if( $GiveInformation1==1  )
{
?>
<input type="checkbox" checked> What's your disease?
<?
}else
{
?>
<input type="checkbox" > What's your disease?
<?
}
?>
<?=nbs(10)?>
								   <?PHP
									$atts = array(
									  'width'      => '800',
									  'height'     => '300',
									  'scrollbars' => 'yes',
									  'status'     => 'yes',
									  'resizable'  => 'yes',
									  'screenx'    => '0',
									  'screeny'    => '0'
									);
									echo anchor_popup('loadtable/load_form_give_information_view/'.$HN.'/'.$MonitoringDate, 'View', $atts);
								   ?>
								   <button>Add</button> 
</li>

<li>
<?
if( $GiveInformation2==1 )
{
?>
<input type="checkbox" checked> What's treatment?
<?
}else
{
?>
<input type="checkbox" > What's treatment?
<?
}
?>
</li>

<li>

<?
if(  $GiveInformation3==1 )
{
?>
<input type="checkbox" checked> How to manage the side effect?
<?
}else
{
?>
<input type="checkbox" > How to manage the side effect?
<?
}
?>
</li>

<li>
<?
if( $GiveInformation4==1  )
{
?>
<input type="checkbox" checked> Bring medication to each visit?
<?
}else
{
?>
<input type="checkbox" > Bring medication to each visit?
<?
}
?>

</li>


<li>
<?
if(  $GiveInformation5==1  )
{
?>
<input type="checkbox" checked> How to correct behavior?
<?
}else
{
?>
<input type="checkbox" > How to correct behavior?
<?
}
?>

</li>


<li>
Other :
<textarea cols="40" rows="2"><?=$GiveInformation6?></textarea>
 </li>
 


</ul>
<?PHP
echo form_close();
?>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<style>
table, td, th
{
border:0 px solid green;
}
th
{
background-color:green;
color:white;
}
</style>


</head>

<body>

<table width="447" >

<!--<tr>
<th width="122">select</th>
<th width="61">วัน เดือน ปี</th>
<th width="77">Lab</th>
</tr>
-->

<tr>
<th colspan="2"> Evalution </th>
</tr>

<tr>
<th width="123" >ผลการประเมิน </th>
<th width="333" align="left" >

<?PHP  $this->epiquery->evalution_select()?>

</th>
</tr>

<tr>
<th >วันที่ประเมิน </th>
<th align="left" ><?PHP echo $MonitoringDate; ?></th>
</tr>


<tr>
<th >บันทึกเพิ่ม </th>
<th align="left" >
<label>
<textarea name="textarea" id="textarea" cols="40" rows="2"></textarea>
</label>
&nbsp;&nbsp;</th>
</tr>




</table>


</body>
</html>

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


<table width="442" >
<tr>
<th width="122">select</th>
<th width="61">วัน เดือน ปี</th>
<th width="77">Lab</th>
</tr>

<tr>
<td align="center"><input type="text" size="10" maxlength="100" /></td>
<td align="center"><?=$MonitoringDate?></td>
<td>

<select>
           <option value=""> :: select ::</option>
           <?
		         foreach($drug_query->result() as $row)
				 {
				    ?>
                           <option value="<?=@$row->LabCode?>"><?=@$row->Lab?></option>
                          <!--  <option value="<?=@$row->Lab?>"><?=@$row->Lab?></option>-->
                    <?
				 }
		   ?>
           </select>

</td>
</tr>


</table>



</body>
</html>

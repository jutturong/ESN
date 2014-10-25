<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<style>
					table, td, th
					{
					border:1 px solid green;
					}
					th
					{
					background-color:green;
					color:white;
					}
</style>

</head>

<body>


<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
<textarea cols="45" rows="2"></textarea>
<button>Add</button>
</li>
<li>
<table >
<tr>
<th width="55" valign="top"><div align="center">Date</div></th>
<th width="67" valign="top"><div align="center">From</div></th>
<th width="152" valign="top"><div align="center">Progress Note</div></th>
</tr>
<tr>
<td align="left" valign="top"></td>
<td align="left" valign="top"></td>
<td align="left" valign="top"></td>
</tr>
</table>
</li>
</ul>
<?PHP
echo form_close();
?>
</body>
</html>

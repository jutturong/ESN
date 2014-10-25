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
</ul>
<?PHP
echo form_close();
?>


</body>
</html>

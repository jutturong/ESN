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
        วัน/เดือน/ปี ที่บันทึกข้อมูลแล้ว :
    
        <select >
            <?PHP
               foreach($query->result() as $row)
               {
                   $MonitoringDate=$row->MonitoringDate;
            ?>
            <option value="<?PHP echo  $MonitoringDate; ?>"><?PHP echo $MonitoringDate; ?></option>
            <?PHP
               }
            ?>
        </select>
        
    
    </li>
    
<li>
<table>
<tr>
<td width="273">
  <div align="center">Past Medical History:</div></td>
<td width="269">
  <div align="center">Previous AEDs history:</div></td>
</tr>
<tr>
<td>1. Perinatal history</td>
<td><input type="checkbox"> Phenytoin</td>
</tr>

<tr>
<td>
<input type="checkbox"> 1.1 Normal labor
</td>
<td>
<input type="checkbox"> Carbamazepine
</td>
</tr>

<tr>
<td>
<input type="checkbox"> 1.2 Forceps
</td>
<td>
<input type="checkbox"> Sodium Valproate
</td>
</tr>

<tr>
<td>
<input type="checkbox"> 1.3 Caesarian section
</td>
<td>
<input type="checkbox"> Phenobarbital
</td>
</tr>

<tr>
<td>
<input type="checkbox"> 1.4 Jaundice
</td>
<td>
<input type="checkbox"> Topiramate
</td>
</tr>

<tr>
<td>
Other : <textarea cols="35" rows="3"></textarea>
</td>
<td>
<input type="checkbox"> Lamotrigine
<br>
<input type="checkbox"> Gabapentine
<br>
<input type="checkbox"> Levetiracetam
<br>
Other : <textarea cols="35" rows="3"></textarea>
</td>
</tr>

<tr>
    <td>
        <input type="checkbox"> 2. Normal development
    </td>      
</tr>
<tr>
    <td>
        <input type="checkbox"> 3. Learning
    </td>      
</tr>
<tr>
    <td>
        <input type="checkbox"> 4. Febrile convulsion
    </td>      
</tr>
<tr>
    <td>
        <input type="checkbox"> 5. Family history of seizure
    </td>      
</tr>
<tr>
    <td>
        <input type="checkbox"> 6. Head injury
    </td>      
</tr>
</table>

</li>



</li>


 


</ul>
<?PHP
echo form_close();
?>
</body>
</html>

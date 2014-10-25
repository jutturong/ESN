<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
</head>

<body>

    <table border="1">
<tr>
<th>
Date
</th>
<th>
Clinic
</th>
<th>
Drug/Product
</th>
<th>
DosageRegimen
</th>  
<th>
Amonunt
</th> 
</tr>
        <?PHP
        foreach($query_treatment->result() as $row)
        {        
            $MonitoringDate=$row->MonitoringDate;
            $Drug_ProductID=$row->Drug_ProductID;
            $DosageRegimen=$row->DosageRegimen;
            $Amount=$row->Amount;
           ?>
        <tr>
            <td><?=$MonitoringDate?></td>
            <td></td>
            <td><?=$Drug_ProductID?></td>
            <td><?=$DosageRegimen?></td>
            <td><?=$Amount?></td>
        </tr>
          <?PHP
        }
        ?>
</table>


</body>
</html>

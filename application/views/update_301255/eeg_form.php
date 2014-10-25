<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
</head>

<body>
    <ul>
        HN : <input type="text" value="<?PHP echo $HN; ?>" size="6" readonly />
    </ul>
    <ul>
        วัน-เดือน-ปี : <input type="text" value="<?PHP echo $date_eeg; ?>" size="10" readonly   /> 
    </ul>
    <ul>
        EEG Result :
        <select>
            <option> เลือก </option>
            <?PHP
            foreach($query_eeg->result() as $row)
            {
                $Code=$row->Code;
                $EEGResult=$row->EEGResult;
            ?>
            <option value="<?PHP echo $Code; ?>"><?PHP echo $EEGResult; ?></option>
            <?PHP    
            }   
          ?>
            
        </select>
        
        
    </ul>
    <ul>
        <button type="submit">บันทึก</button>
        <button type="reset">ยกเลิก</button>
    </ul>
    
<table width="428" border="1" cellpadding="10" cellspacing="1" style="border-collapse:collapse">
  <tr>
    <td width="133" height="30" align="center">Date</td>
    <td width="246" align="center">EEG Result</td>
  </tr>
  
   <?PHP
   foreach($query->result() as $row )
   {
        $MonitoringDate=$row->MonitoringDate;
       //echo br();
        $Value=$row->Value;
      //echo br();
       $EEGResult=$row->EEGResult;
       //  echo br();
   ?>
  <tr>
    <td align="center"> 
        <?PHP echo $MonitoringDate; ?>
    </td>
    <td align="center">  
        <?PHP echo $EEGResult; ?>
    </td>
  </tr>
    <?PHP
   }
    ?>
</table>




</body>
</html>

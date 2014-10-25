<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="428" border="1" cellpadding="10" cellspacing="1" style="border-collapse:collapse">
  <tr>
    <td width="133" height="30" align="center">Date</td>
    <td width="246" align="center">EEG Result</td>
  </tr>
  
  <tr>
    <td align="center">
    <input name="date_EEG" type="text" id="date_EEG" size="20" maxlength="30" value="<?=$EEG_date?>"  readonly="readonly" style="vertical-align:middle">
    <td align="center">
    
    <select id="value_EEG"  name="value_EEG">
         <?
		       foreach($select_EEG->result() as $row)
			   {
			         $Code_tb=$row->Code;
					 $EEGResult_tb=$row->EEGResult;
					 
				       if(  $value95 ==  $Code_tb  )
					   {
					 ?>
                          <option value="<?=$Code_tb?>" selected="selected"><?=$EEGResult_tb?></option>
                     <?
					 }
					   else
					   {
					       ?>
                            <option value="<?=$Code_tb?>" ><?=$EEGResult_tb?></option>
                           <?
					   }
			   }
		 ?>
    </select>    
    </td>
  </tr>
</table>




</body>
</html>

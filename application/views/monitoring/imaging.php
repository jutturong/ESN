<table border="1" style="border-collapse:collapse">
<tr>
<td width="146" height="43" align="center">Date</td>
<td width="148" align="center">Lab</td>
<td width="248" align="center">Imaging Result</td>
</tr>

<tr>
<td height="37">    
<input name="date_EEG" type="text" id="date_EEG" size="20" maxlength="30" value="<?=$EEG_date?>"  readonly="readonly" style="vertical-align:middle">
</td>
<td>    <select id="value_image_lab"  name="value_image_lab">
         <?
		       foreach($select_image_lab->result() as $row)
			   {
			         $LabCode_tb=$row->LabCode;
					 $Lab_tb=$row->Lab;
					 //$EEGResult_tb=$row->EEGResult;
					 ?>
                          <option value="<?=$LabCode_tb?>"><?=$Lab_tb?></option>
                     <?
			   }
		 ?>
    </select>    
</td>
<td>

    <select id="value_image"  name="value_image">
         <?
		       foreach($select_image->result() as $row)
			   {
			         $b_tb=$row->Brainatrophy;
					 //$EEGResult_tb=$row->EEGResult;
					 ?>
                          <option value="<?=$b_tb?>"><?=$b_tb?></option>
                     <?
			   }
		 ?>
    </select>    



</td>
</tr>



</table>

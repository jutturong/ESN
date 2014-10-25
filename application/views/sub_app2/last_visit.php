


<table width="575">
<?
   //foreach($progress_tb->result() as $row)
    foreach($monitoring_04->result() as $row)
	{
	    $value_tb=$row->Value;
	   //echo br();
	    $MonitoringDate_tb=$row->MonitoringDate;
	   //echo br();
	     $Lab_tb=$row->Lab;
	   
	   $ex_date=explode('-', $MonitoringDate_tb);
	   $year_conv= $ex_date[0]+543; 
	   //echo br();
	   $month_conv= $ex_date[1];
	   //echo br();
	   $date_conv= $ex_date[2];
	   //echo br();
	    $full_dmy=$date_conv.'/'.$month_conv.'/'.$year_conv; 
	?>
	<tr>
<td width="600" >

<!--
</td>
<td width="230" >
-->

<font color="#0066FF">
	   <?=$value_tb?> time/mo.
</font>	   
<font color="#FF0000">	   
	    ( <?=$full_dmy?> ) 
</font>
<input name="hid_value" type="hidden" id="hid_value" value="<?=$value_tb?>">
</td>



</tr>
	<?
	
	}
?>

</table>


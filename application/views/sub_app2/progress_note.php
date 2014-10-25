
<body>

		       <table width="741" border="1" style="border-collapse:collapse ">
			   <tr>
			   <td width="177" height="25" align="center">Date</td>
			    <td width="174" height="25" align="center">Form</td>
				  <td width="368" height="25" align="center">Progress Note</td>
			   </tr>
			   
						
						<?
						   foreach($progress_tb->result() as $row)
						   {
						      $MonitoringDate=$row->MonitoringDate;
							  $Progress=$row->Progress;
							  $UserName=$row->UserName;
							  $UserSurname=$row->UserSurname;
						?>   
						   
						   <tr>
			   <td width="177" height="25" align="left">&nbsp;<?=$MonitoringDate?></td>
			    <td width="174" height="25" align="left">&nbsp;ภญ.<?=$UserName?>&nbsp;&nbsp;<?=$UserSurname?></td>
				  <td width="368" height="25" align="left">&nbsp;<?=$Progress?></td>
			   </tr>
			            <?
						    }
						?>
			   
			   

			   
			   </table>


</body>
</html>

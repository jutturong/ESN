<?
/*
                  //echo  $date_EEG;
				  $ex=explode('-',$date_EEG);
				  echo  $full_date=$ex[2]."/".$ex[1]."/".$ex[0];    //แปลงวันเดือนปีให้อยู่ในรูปแบบเต็ม
 */
?>


<?
		   $arr_img=array($value96,$value97,$value100);
?>
<table border="1" style="border-collapse:collapse">
<tr>
<td width="146" height="43" align="center">Date</td>
<td width="148" align="center">Lab</td>
<td width="248" align="center">Imaging Result</td>
</tr>

<tr>
<td height="37">    
<input name="date_EEG" type="text"   id="date_EEG" size="20" maxlength="30" value="<?=$date_EEG?>"  >
</td>
<td>   


         <?
		       foreach($select_image_lab->result() as $row)
			   {
			         $LabCode_tb[]=$row->LabCode;
					 $Lab_tb[]=$row->Lab;
					 //$EEGResult_tb=$row->EEGResult;
			   }
		 ?>



 <select id="value_image_lab"  name="value_image_lab">
              <option value="">:: select ::</option>
              
              <?
			        switch($arr_img)
					{
					    case      $arr_img[0]  !=   ""    :
						{
						    ?>
                            <option value="<?=$LabCode_tb[0]?>" selected="selected"><?=$Lab_tb[0]?></option>
                             <option value="<?=$LabCode_tb[1]?>"><?=$Lab_tb[1]?></option>
             				<option value="<?=$LabCode_tb[2]?>"><?=$Lab_tb[2]?></option>
                            <?
							break;
						}
						case       $arr_img[1]  !=   ""    :
						{
							?>
						   <option value="<?=$LabCode_tb[0]?>"><?=$Lab_tb[0]?></option>
                           <option value="<?=$LabCode_tb[1]?>" selected="selected"><?=$Lab_tb[1]?></option>
                           <option value="<?=$LabCode_tb[2]?>"><?=$Lab_tb[2]?></option>
                            <?
								break;
						}
						case     $arr_img[2]  !=   ""    :
						{
						     ?>
                              <option value="<?=$LabCode_tb[0]?>"><?=$Lab_tb[0]?></option>
                                 <option value="<?=$LabCode_tb[1]?>"><?=$Lab_tb[1]?></option>
                               <option value="<?=$LabCode_tb[2]?>" selected="selected"><?=$Lab_tb[2]?></option>
                             <?
							 break;
						}
					}
			  ?>
  
    </select> 
       
</td>
<td>

    <select id="value_image"  name="value_image">
  				  <option >:: Select ::</option>
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

<tr>
<td colspan="3" align="center"><button type="submit">บันทึก</button></td>
</tr>


</table>

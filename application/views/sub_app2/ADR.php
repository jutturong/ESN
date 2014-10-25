<table>

<tr>
		 <td width="675" colspan="2"  align="left" valign="middle">
		
		 &nbsp;&nbsp;&nbsp;ADRs : &nbsp;
		 
    <select id="ADRs" name="ADRs">
          
                <?
				        foreach($DRPselection2_option->result() as $row)
						{
						       $DRPselection2_tb=$row->DRPselection2;
							   ?>
                                        <option value="<?=$DRPselection2_tb?>"><?=$DRPselection2_tb?></option>
                               <?
						}
				?>
             
		 </select>   
		 
		 <button id="View" >View</button>  <button id="Add" >Add</button>
		
		 </td>
  </tr>
		 
		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Detail : &nbsp; <input type="text" value="<? echo  @$ADRDetail2_tb;   ?>" size="80" maxlength="200" />	  
		
		 </td>
		 </tr>


		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Action : &nbsp;  <input type="radio" id="" name="" /> Prevent <input type="radio" id="" name="" /> Correct
		
		 </td>
		 </tr>
		 
		 
		 		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Intervention : &nbsp; <button id="Click_To_Add_Intervention" >Click To Add Intervention</button>  
		
		 </td>
		 </tr>
		 
		 
		 		 		 		 		 		 <tr>
		 <td  align="left" valign="middle" colspan="2">
		
		 &nbsp;&nbsp;&nbsp;Result : &nbsp; <input type="radio" id="" name="" /> Resolved  <input type="radio" id="" name="" /> Improved 
		 <br />
		 <input type="radio" id="" name="" /> Not Improved   <input type="radio" id="" name="" /> N/A 
		 <br />
		 <textarea cols="50" rows="3"></textarea>
		
		 </td>
		 </tr>

                     <tr>
                     <td colspan="2" align="center" valign="top">
                      <button id="save_app2" >Save</button>
                      <button type="reset"  id="reset_app2">Reset</button>                      </td>
                     </tr>

</table>

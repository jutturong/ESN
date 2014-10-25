<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?=$this->load->view('import_jquery')?>

<script type="text/javascript">
        $(function(){
		            var object = jQuery.parseJSON( $arr);
					alert(''+$arr['a']);
		});
</script>


</head>

<body>


<div id="dialog-epilepsy" title="Epilepsy Clinic" style="display:none">
   <span id="test1"></span> 
    
<!--    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
-->

<?	  //ค่า query  ใน epilepsy  ของการ select   Duration of Attack,Severity of  Attack
    		  $ep_select=$this->db->query("SELECT * from   `labcode`      where     `Code`  in('ESev1','ESev2','ESev3');");
			  foreach(  $ep_select->result() as $row)
			  {
			          $code_tb[]=$row->Code;
				      $lab_tb[]= $row->LabDetail;
			  }
?>


<table width="842">
<tr>
			
            <td width="681" colspan="2" align="center">		
		       
                  <button id="View_Frequency_of_Seizure_Chart" disabled="disabled">View Frequency of Seizure Chart</button>
			</td>
</tr>
		 
		      <td colspan="2" align="left">
									  Frequency (time/month) :	
			    <input name="frequency" type="text" id="frequency" style="text-align:center " size="5" maxlength="3"/> 
                
                ชักครั้งก่อน : <input name="value_epi" type="" id="value_epi"   size="5" maxlength="3" value="<?=@$value_tb?>" style="text-align:center" /> ครั้ง
				 
                 <!-- <font color="#FF0000"><?=@$MonitoringDate_tb?></font>-->
                 Last Visit :
                  <font color="#FF0000"><?=@$show_date?></font>
                   
                                  
                </td>
</tr>
		 
<tr>
		      <td colspan="2" align="left">
			  Clinical Response :
			    <input name="clinic_response" type="text" id="clinic_response" readonly="true" size="20" maxlength="100" style="color:#009999 " />
				</td>
</tr>
<tr>
		      <td colspan="2" align="left">
			  Duration of Attack :	
	     <select id="Duration_of_Attack" name="Duration_of_Attack">
							     <option value="<?=$code_tb[0]?>"><?=$lab_tb[0]?></option>
                                 <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
                                  <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
			  </select> 		   
              </td>
</tr>
<tr>
		   <td colspan="2" align="left">
			  Severity of Attack :	
       <select id="Severity_of_Attack" name="Severity_of_Attack">
							     <option value="<?=$code_tb[0]?>"><?=$lab_tb[0]?></option>
                                 <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
                                  <option value="<?=$code_tb[1]?>"><?=$lab_tb[1]?></option>
			  </select> 		 
              </td>
</tr>
</table>

</div>

</body>
</html>

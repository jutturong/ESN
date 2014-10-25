<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
</head>

<body>
<?=$this->load->view('import_jquery')?>
<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
Monitoring Date : <input type="text" value="<?=$MonitoringDate?>" readonly="true" size="10" maxlength="20" >
</li>
<li>
    ADRs : <select>
        <?=$this->epiquery->adrscode_tb()?>
    </select>
</li>
        <li>Drug/Product : 
            <select>
              <?=$this->epiquery->drug_tb()?>
            </select>
        </li>
        <li>Detail : <input type="text" size="40" maxlength="60" value="<?=$MedicationErrorDetail?>"></li>
<li>Action : 
    <?
       if( $Action4 == 1 )
       {
    ?>
    <input type="radio" checked> Prevent 
    <input type="radio"> Correct </li>
    <?
       }
       elseif( $Action4 == 2  )
       {
    ?>
    <input type="radio" > Prevent
    <input type="radio" checked> Correct </li>
     <?
       }else
       {
     ?>
    <input type="radio" > Prevent 
    <input type="radio"> Correct </li>
     <? 
       } 
     ?>
<li>Intervention : 
                  <table>
				  <tr>
				  <td>Patient</td> <td>Doctor</td>
				  </tr>
				  <tr>
				  <td>
                                      <?
                                         if($InterventionPT4_1 == 1 )
                                         {
                                      ?>
                                      <input type="checkbox" checked> Adjust for appropriate therapy due to health system 
                                      <?
                                         }else
                                         {
                                      ?>
                                      <input type="checkbox" > Adjust for appropriate therapy due to health system
                                      <?
                                         }
                                      ?>
                                  </td>
				  <td>
                                       <? 
                                        if( $InterventionDoctor4_1 == 1 ) 
                                        {
                                       ?>
                                      <input type="checkbox" checked> Add new medication 
                                       <?
                                         }
                                       else
                                       {
                                       ?>
                                      <input type="checkbox" > Add new medication 
                                      <?
                                       }
                                      ?>
                                  
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <? 
                                         if( $InterventionPT4_2 == 1 )
                                         {                                           
                                      ?>   
                                      <input type="checkbox" checked> Correct technique of administration 
                                      <?
                                         }
                                         else
                                         {    
                                      ?>
                                      <input type="checkbox" checked> Correct technique of administration
                                      <?
                                         }
                                      ?>   
                                  </td>
				  <td>
                                     <? if( $InterventionDoctor4_2 == 1 ) 
                                     {                                        
                                    ?>
                                      <input type="checkbox" checked> Adjust dosage regimen 
                                    <?
                                     }else
                                     {
                                    ?>
                                      <input type="checkbox" > Adjust dosage regimen 
                                      <?
                                     }
                                      ?>
                                  </td>
				  </tr>
				  </tr>
				  <tr>
				  <td>
                                     <?
                                       if( $InterventionPT4_3 == 1 )
                                       { 
                                     ?>
                                      <input type="checkbox" checked> Improve compliance 
                                     <?
                                       }else
                                       {
                                     ?>
                                      <input type="checkbox" > Improve compliance 
                                      <?
                                       }
                                      ?>
                                  </td>
				  <td>
                                     <?
                                       if( $InterventionDoctor4_3 == 1 )
                                       {    
                                     ?>
                                      <input type="checkbox" checked> Confirm prescription 
                                    <?
                                       }else
                                       {
                                    ?>
                                      <input type="checkbox" > Confirm prescription
                                      <?
                                       } 
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <?
                                        if( $InterventionPT4_4 == 1 )
                                        {
                                      ?>
                                      <input type="checkbox" checked> Inform drug relate problems 
                                      <?
                                        }else
                                        {
                                      ?>
                                      <input type="checkbox" > Inform drug relate problems
                                      <?
                                        }
                                      ?>
                                  </td>
				  <td>
                                      <? if( $InterventionDoctor4_4 == 1 )
                                         {
                                          ?>
                                      <input type="checkbox" checked> Discontinue medication 
                                      <?
                                         }else{
                                      ?>
                                       <input type="checkbox"> Discontinue medication
                                      <?
                                         }
                                      ?>   
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                    <?
                                      if( $InterventionPT4_5 == 1 )
                                      {
                                    ?>
                                      <input type="checkbox" checked> Life style modification 
                                    <?
                                      }else
                                      {
                                    ?>
                                       <input type="checkbox" > Life style modification
                                      <?
                                      }
                                      ?>
                                  </td>
				  <td>
                                      <?
                                        if( $InterventionDoctor4_5 == 1 )
                                        {
                                      ?>
                                      <input type="checkbox" checked> Inform drug related problems 
                                      <?
                                        }else
                                        {
                                      ?>
                                      <input type="checkbox"> Inform drug related problems
                                      <?
                                        }
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                     <? if( $InterventionPT4_6 == 1 )
                                     {
                                         ?>
                                      <input type="checkbox" checked> Monitor efficacy and toxicity 
                                     <?
                                     }else
                                     {
                                     ?>
                                      <input type="checkbox" > Monitor efficacy and toxicity 
                                      <?
                                     }
                                      ?>
                                  </td>
				  <td>
                                     <?
                                       if( $InterventionDoctor4_6 == 1 )
                                       {
                                     ?>
                                      <input type="checkbox" checked> Suggest changing medication 
                                     <?
                                       }else
                                       {
                                     ?>
                                       <input type="checkbox" > Suggest changing medication
                                      <?
                                       }
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                     <?
                                      if( $InterventionPT4_7 == 1 )
                                      {
                                     ?>
                                      <input type="checkbox" checked> Prevention of Adverse drug reaction 
                                     <?
                                      }else
                                      {
                                     ?>
                                       <input type="checkbox"> Prevention of Adverse drug reaction                                     
                                      <?
                                      }
                                      ?>
                                  </td>
				  <td>
                                    <?
                                     if( $InterventionDoctor4_7 == 1)
                                     {
                                    ?>
                                      <input type="checkbox" checked> Suggest laboratory 
                                    <?
                                     }else
                                     {
                                    ?>
                                      <input type="checkbox" > Suggest laboratory 
                                      <?
                                     }
                                      ?>
                                  
                                  </td>
				  </tr>



				  
				  </table>
         

</li>
<li>Response : 
   
    <?
     if( $Response4 == 1 )
     {
    ?>
    <input type="radio" checked> Resolved 
    <input type="radio"> Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio"> Not Improved <input type="radio"> N/A
    <?
     }elseif( $Response4 == 2  )
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" checked> Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio"> Not Improved <input type="radio"> N/A    
    <?
     }elseif( $Response4 == 4 )
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" > Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio" > Not Improved <input type="radio" checked> N/A 
    <?
     }else
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" > Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio" checked> Not Improved <input type="radio"> N/A
    <?
     }
    ?>
</li>

<li>ผู้ประเมิน : <font color="red"><?=$name?></font></li>

<li>
ลือก วัน-เดือน-ปี :

<?PHP
   $this->epiquery->list_date_tabel_open($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
  //list_date_tabel_open($tb,$HN_name,$HN_val,$date_name,$select_name,$url)//วัน-เดือน-ปี ภายใน table
?>
    
</li>

</ul>
<?PHP
echo form_close();
?>


</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
</head>

<body>
<?PHP  $this->load->view('import_jquery'); ?>
<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
Monitoring Date : <input type="text" value="<?=$MonitoringDate?>" readonly="true" size="10" maxlength="20" >
</li>
<li>
    Medication error : 
    <select>
        <?PHP   //$this->epiquery->adrscode_tb();   ?>      
         <?PHP   $this->epiquerymodel->medication_select($DRPselection4);   ?>
        <?PHP  //$this->epiquerymodel->otherdrp_select($DRPselection4);  ?>
    </select>
</li>
        <li>Drug/Product : 
            <select>
              <?=$this->epiquerymodel->drug_tb()?>
            </select>
        </li>
        <li>Detail : <input type="text" size="40" maxlength="60" value="<?=$MedicationErrorDetail?>"></li>
<li>Action : 
    <?PHP
       if( $Action4 == 1 )
       {
    ?>
    <input type="radio" checked> Prevent 
    <input type="radio"> Correct </li>
    <?PHP
       }
       elseif( $Action4 == 2  )
       {
    ?>
    <input type="radio" > Prevent
    <input type="radio" checked> Correct </li>
     <?PHP
       }else
       {
     ?>
    <input type="radio" > Prevent 
    <input type="radio"> Correct </li>
     <?PHP 
       } 
     ?>
<li>Intervention : 
                  <table>
				  <tr>
				  <td>Patient</td> <td>Doctor</td>
				  </tr>
				  <tr>
				  <td>
                                      <?PHP
                                         if($InterventionPT4_1 == 1 )
                                         {
                                      ?>
                                      <input type="checkbox" checked> Adjust for appropriate therapy due to health system 
                                      <?PHP
                                         }else
                                         {
                                      ?>
                                      <input type="checkbox" > Adjust for appropriate therapy due to health system
                                      <?PHP
                                         }
                                      ?>
                                  </td>
				  <td>
                                       <?PHP 
                                        if( $InterventionDoctor4_1 == 1 ) 
                                        {
                                       ?>
                                      <input type="checkbox" checked> Add new medication 
                                       <?PHP
                                         }
                                       else
                                       {
                                       ?>
                                      <input type="checkbox" > Add new medication 
                                      <?PHP
                                       }
                                      ?>
                                  
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <?PHP 
                                         if( $InterventionPT4_2 == 1 )
                                         {                                           
                                      ?>   
                                      <input type="checkbox" checked> Correct technique of administration 
                                      <?PHP
                                         }
                                         else
                                         {    
                                      ?>
                                      <input type="checkbox" checked> Correct technique of administration
                                      <?PHP
                                         }
                                      ?>   
                                  </td>
				  <td>
                                     <?PHP if( $InterventionDoctor4_2 == 1 ) 
                                     {                                        
                                    ?>
                                      <input type="checkbox" checked> Adjust dosage regimen 
                                    <?PHP
                                     }else
                                     {
                                    ?>
                                      <input type="checkbox" > Adjust dosage regimen 
                                      <?PHP
                                     }
                                      ?>
                                  </td>
				  </tr>
				  </tr>
				  <tr>
				  <td>
                                     <?PHP
                                       if( $InterventionPT4_3 == 1 )
                                       { 
                                     ?>
                                      <input type="checkbox" checked> Improve compliance 
                                     <?PHP
                                       }else
                                       {
                                     ?>
                                      <input type="checkbox" > Improve compliance 
                                      <?PHP
                                       }
                                      ?>
                                  </td>
				  <td>
                                     <?PHP
                                       if( $InterventionDoctor4_3 == 1 )
                                       {    
                                     ?>
                                      <input type="checkbox" checked> Confirm prescription 
                                    <?PHP
                                       }else
                                       {
                                    ?>
                                      <input type="checkbox" > Confirm prescription
                                      <?PHP
                                       } 
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <?PHP
                                        if( $InterventionPT4_4 == 1 )
                                        {
                                      ?>
                                      <input type="checkbox" checked> Inform drug relate problems 
                                      <?PHP
                                        }else
                                        {
                                      ?>
                                      <input type="checkbox" > Inform drug relate problems
                                      <?PHP
                                        }
                                      ?>
                                  </td>
				  <td>
                                      <?PHP if( $InterventionDoctor4_4 == 1 )
                                         {
                                          ?>
                                      <input type="checkbox" checked> Discontinue medication 
                                      <?PHP
                                         }else{
                                      ?>
                                       <input type="checkbox"> Discontinue medication
                                      <?PHP
                                         }
                                      ?>   
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                    <?PHP
                                      if( $InterventionPT4_5 == 1 )
                                      {
                                    ?>
                                      <input type="checkbox" checked> Life style modification 
                                    <?PHP
                                      }else
                                      {
                                    ?>
                                       <input type="checkbox" > Life style modification
                                      <?PHP
                                      }
                                      ?>
                                  </td>
				  <td>
                                      <?PHP
                                        if( $InterventionDoctor4_5 == 1 )
                                        {
                                      ?>
                                      <input type="checkbox" checked> Inform drug related problems 
                                      <?PHP
                                        }else
                                        {
                                      ?>
                                      <input type="checkbox"> Inform drug related problems
                                      <?PHP
                                        }
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                     <?PHP if( $InterventionPT4_6 == 1 )
                                     {
                                         ?>
                                      <input type="checkbox" checked> Monitor efficacy and toxicity 
                                     <?PHP
                                     }else
                                     {
                                     ?>
                                      <input type="checkbox" > Monitor efficacy and toxicity 
                                      <?PHP
                                     }
                                      ?>
                                  </td>
				  <td>
                                     <?PHP
                                       if( $InterventionDoctor4_6 == 1 )
                                       {
                                     ?>
                                      <input type="checkbox" checked> Suggest changing medication 
                                     <?PHP
                                       }else
                                       {
                                     ?>
                                       <input type="checkbox" > Suggest changing medication
                                      <?PHP
                                       }
                                      ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                     <?PHP
                                      if( $InterventionPT4_7 == 1 )
                                      {
                                     ?>
                                      <input type="checkbox" checked> Prevention of Adverse drug reaction 
                                     <?PHP
                                      }else
                                      {
                                     ?>
                                       <input type="checkbox"> Prevention of Adverse drug reaction                                     
                                      <?PHP
                                      }
                                      ?>
                                  </td>
				  <td>
                                    <?PHP
                                     if( $InterventionDoctor4_7 == 1)
                                     {
                                    ?>
                                      <input type="checkbox" checked> Suggest laboratory 
                                    <?PHP
                                     }else
                                     {
                                    ?>
                                      <input type="checkbox" > Suggest laboratory 
                                      <?PHP
                                     }
                                      ?>
                                  
                                  </td>
				  </tr>



				  
				  </table>
         

</li>
<li>Response : 
   <?PHP echo br(); ?>
    <?PHP
     if( $Response4 == 1 )
     {
    ?>
    <input type="radio" checked> Resolved 
    <input type="radio"> Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio"> Not Improved <input type="radio"> N/A
    <?PHP
     }elseif( $Response4 == 2  )
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" checked> Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio"> Not Improved <input type="radio"> N/A    
    <?PHP
     }elseif( $Response4 == 4 )
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" > Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio" > Not Improved <input type="radio" checked> N/A 
    <?PHP
     }else
     {
    ?>
    <input type="radio" > Resolved 
    <input type="radio" > Improved  
    <textarea cols="35" rows="1"><?=$ResponseDetail4?></textarea>    
      <br>
    <input type="radio" checked> Not Improved <input type="radio"> N/A
    <?PHP
     }
    ?>
</li>

<li>ผู้ประเมิน : <font color="red"><?PHP echo  $name; ?></font></li>

<li>
ลือก วัน-เดือน-ปี :

<?PHP
  // $this->epiquerymodel->list_date_tabel_open($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
  //list_date_tabel_open($tb,$HN_name,$HN_val,$date_name,$select_name,$url)//วัน-เดือน-ปี ภายใน table
$this->epiquerymodel->list_date_tabel_all($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
?>
    
</li>

</ul>
<?PHP
echo form_close();
?>


</body>
</html>

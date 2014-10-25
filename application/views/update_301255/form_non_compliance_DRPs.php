<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<?=$this->load->view('import_jquery')?>
</head>

<body>

<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
Monitoring Date : <input type="text" value="<?=$MonitoringDate?>" readonly="true" size="10" maxlength="20" >
</li>
        <li>Drug/Product : 
            <select>
                <?=$this->epiquerymodel->drug_tb()?>
            </select>  
            <?PHP echo nbs(2); 
            
            if( $Preparation == 1 )
            {
                ?>
            <input type="checkbox" checked> Preparation
             <?PHP
            }elseif($Preparation == 0 )
            {
               ?>
            <input type="checkbox" > Preparation
               <?PHP    
            }
            
            ?>
            
            <?PHP echo nbs(2); ?>
            <?PHP
                if( $Rinse == 1 )
                {
            ?>
            <input type="checkbox" checked > Rinse 
            <?PHP
                }elseif( $Rinse == 0 )
                {
                    ?>
                    <input type="checkbox"  > Rinse 
                    <?PHP
                }
            ?>
        </li>
<li>Non Compliance Type :  
    <select>
        <?PHP //$this->epiquerymodel->select_compliance_type(); //ของเดิม ?>
        <?PHP  $this->epiquerymodel->non_compliance_select($DRPselection1);    ?>
    </select>
    <?PHP echo nbs(2); ?>
    <?PHP  
        if( $Inhalation == 1 )
        {
    ?>
    <input type="checkbox" checked > Inhalation
    <?PHP
        }elseif( $Inhalation== 0 )
        {
         ?>   
             <input type="checkbox" > Inhalation
         <?PHP   
        }
    ?>
    <?PHP echo nbs(2); ?> 
             
             
    <?PHP if($Emptytest==1)
    {
        
    ?>
             <input type="checkbox" checked> Empty test
    <?PHP
    }else
    {
        ?>
            <input type="checkbox" > Empty test
        <?PHP     
    }
    ?>
    <button>แก้ไขร้อยละของความไม่ร่วมมือ</button>
    
    
    <!--
    <input type="text" value="<?=$PercentNonCompliance?>" readonly size="5" maxlength="10">
    -->
    
</li>
<li>Detail : <input type="text" size="40" maxlength="60" value="<?=$NonComplianceDetail1?>"></li>
<li>Action : 
    <?php
    if( $Action1 == 1 )
    {
    ?>
    <input type="radio" checked> Prevent 
    <input type="radio"> Correct 
    <?php
    }elseif( $Action1 == 2 )
    {
    ?>
    <input type="radio" > Prevent
    <input type="radio" checked> Correct 
    <?php
    }
    else
    {
    ?>
    <input type="radio" > Prevent
    <input type="radio"> Correct 
    <?php
    }
    ?>
</li>   
<li>Intervention : 
                  <table>
				  <tr>
				  <td>Patient</td> <td>Doctor</td>
				  </tr>
				  <tr>
				  <td>                                                                       
                                      <!--<input type="checkbox" checked> Adjust for appropriate therapy due to health system -->
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_1,'Adjust for appropriate therapy due to health system','');  ?>                                  
                                  </td>
                                  
				  <td>
                                      <!--
                                      <input type="checkbox"> Add new medication 
                                     -->
                                     <?php  $this->epiquerymodel->check_select($InterventionDoctor1_1,'Add new medication','');  ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>                                     
                                      <!--<input type="checkbox" checked> Correct technique of administration--> 
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_2,'Correct technique of administration','');  ?>  
                                  </td>
				  <td>
                                        <!--<input type="checkbox"> Adjust dosage regimen-->
                                      <?php  $this->epiquerymodel->check_select($InterventionDoctor1_2,'Adjust dosage regimen','');  ?>
                                      
                                  </td>
				  </tr>
				  </tr>
				  <tr>
				  <td>
                                      <!--<input type="checkbox"> Improve compliance--> 
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_3,'Improve compliance','');  ?>
                                  
                                  </td>
				  <td>
                                      <!--<input type="checkbox"> Confirm prescription--> 
                                      <?php  $this->epiquerymodel->check_select($InterventionDoctor1_3,'Confirm prescription','');  ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <!--<input type="checkbox"> Inform drug relate problems--> 
                                      <?php  $this->epiquerymodel->check_select($InterventionDoctor1_5,'Inform drug relate problems','');  ?>
                                  </td>
                                  
				  <td>
                                      <!--<input type="checkbox"> Discontinue medication--> 
                                     <?php  $this->epiquerymodel->check_select($InterventionDoctor1_4,'Discontinue medication','');  ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <!--<input type="checkbox"> Life style modification--> 
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_5,'Life style modification','');  ?>
                                  </td>
				  <td>
                                      <!--<input type="checkbox"> Inform drug related problems -->
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_4,'Inform drug related problems','');  ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <!--<input type="checkbox"> Monitor efficacy and toxicity -->
                                  <?php  $this->epiquerymodel->check_select($InterventionPT1_6,'Monitor efficacy and toxicity','');  ?>
                                  </td>
				  <td>
                                      <!--<input type="checkbox"> Suggest changing medication--> 
                                   <?php  $this->epiquerymodel->check_select($InterventionDoctor1_6,'Suggest changing medication','');  ?>
                                  </td>
				  </tr>
				  <tr>
				  <td>
                                      <!--<input type="checkbox"> Prevention of Adverse drug reaction -->
                                      <?php  $this->epiquerymodel->check_select($InterventionPT1_7,'Prevention of Adverse drug reaction','');  ?>
                                  </td>
				  <td>
                                      <!--<input type="checkbox"> Suggest laboratory--> 
                                   <?php  $this->epiquerymodel->check_select($InterventionDoctor1_7,'Suggest laboratory','');  ?>
                                  </td>
				  </tr>



				  
				  </table>
         

</li>
<li>Response : 
   
    <!--
    <br>
    <input type="radio"> Resolved 
    <input type="radio"> Improved  
    <textarea cols="35" rows="1"></textarea>    
    <br>
    <input type="radio"> Not Improved 
    <input type="radio"> N/A
    -->
    <?PHP    $this->epiquerymodel->select_response($Response1,$ResponseDetail1); ##เกิด bug  ?>
    
</li>



<li>Cause : 
    <!--<input type="checkbox"> สาเหตุจากตัวผู้ป่วย -->
    <?=$this->epiquerymodel->check_select($Cause1_1,'สาเหตุจากตัวผู้ป่วย','')?>
    <!--<input type="checkbox"> สาเหตุจากโรค -->
    <?=$this->epiquerymodel->check_select($Cause1_2,'สาเหตุจากโรค','')?>
    <!--<input type="checkbox"> สาเหตุจากยา--> 
    <?=$this->epiquerymodel->check_select($Cause1_3,'สาเหตุจากยา','')?>
    <br>
    <!--<input type="checkbox"> สาเหตุจากผู้ดูแล--> 
    <?=$this->epiquerymodel->check_select($Cause1_4,'สาเหตุจากผู้ดูแล','')?>
    <!--<input type="checkbox"> สาเหตุอื่นๆ-->
    <?=$this->epiquerymodel->check_select($Cause1_5,'สาเหตุอื่นๆ','')?>
</li>

<li>
    ผู้ประเมิน : <font color="red"><?=$name?></font>

</li>


<li> 
    เลือก วัน-เดือน-ปี : 
<?PHP
   $this->epiquerymodel->list_date_tabel_mo2($tb,'HN',$HN,'MonitoringDate',$select_name);
?>

    
</li>

</ul>
<?PHP
echo form_close();
?>


</body>
</html>

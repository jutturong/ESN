<?php
class Epiquerymodel extends CI_Model {
    var $title   = '';
    var $content = '';
    var $date    = '';
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   
    function test()
    {
         return "testing model";
    }
    
    function  select_compliance_type()
    {//begin
	   $arr=array(0=>'No',1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
            ?>
	   <option value="">:: select ::</option>
            <?PHP    
           foreach($arr as $key=>$value)
	   {
	               ?>		
                             <option value="<?=$key?>"><?=$value?></option>
                             <?PHP
	   }
         
           /*    
           for($i=1;$i<=3;$i++)
                 {
                     ?>
                            <option value=<?=$i?>>1.testing<?=$i?></option> 
                     <?PHP
                 }
             */    
           ?>
                   <!--     
                      <option value="">:: select ::</option>                      
                      <option value="1">1.testing1</option>
                      <option value="2">2.testing2</option>
                    -->  
           <?PHP                 
      }//end function 
      
      function  query_appendix1($hn) //ดึง วัน เดือน ปี เกิด appendix1
      {
          $str="SELECT *
FROM `01-demographic`
WHERE `HN` = '".$hn."'  ; ";
          $query=$this->db->query($str);
           $check= $query->num_rows();
          //echo br();
          if(  $check > 0 )
          {
              $row=$query->row();
              return $row->BirthDate;            
          }
      }
      function  query_query_app1_mo2($hn,$fname)
      {
      $str="SELECT *
FROM `01-demographic`
WHERE `HN` = '".$hn."'  ; ";
       $query=$this->db->query($str);
           $check= $query->num_rows();
          //echo br();
          if(  $check > 0 )
          {
              $row=$query->row();
              return $row->$fname;            
          }
        
      }
      
      function non_compliance_select($k)
      {
          $arr=array(0=>'No',1=>'Over dosage',2=>'Under dosage',3=>'Not compliance with the life style',4=>'Incorrect technique');
          //echo $ka;
          //echo br();
          foreach($arr as $key=>$va)
          { //begin 
              
              if( $k == $key )
              {
                  ?>
                    <option value="<?=$va?>" selected><?=$va?></option>  
                    
                  <?PHP 
              }
              else
              {
      ?>
                    <option value="<?=$va?>"><?=$va?></option>         
      <?PHP  
      
              }
          }//end
      }
      
   function  drug_product()
     {//begin
              $tb="drug";
	$query=$this->db->get($tb);
	foreach($query->result() as $row)
	{
	     $drug_id=$row->drug_id;
		//echo br();
	     $drug=$row->drug;
		//echo br();
		?>
            <option value="<?=$drug_id?>"><?=$drug?></option>
            <?PHP
	}
    }//end
function  drug_tb()//fetch drug tb in form drug/Product
{//begin
    $query=$this->db->get('drug');
    foreach($query->result() as $row)
    {
        $drug_id=$row->drug_id;
        $drug=$row->drug;
        ?>
        <option id="<?=$drug_id?>"><?=$drug?></option>
        <?PHP
    }
}//end

function  check_select($id,$name_field,$name_checkbox)//ทดสอบใช้กับ popup http://127.0.0.1/ESN/index.php/loadtable/load_view_noncompliance/AB0762/2010-04-01 
{//begin function
    if( $id == 1 )
    {//begin if
        ?>
            <input type="checkbox" checked name="<?=$name_checkbox?>" id="<?=$name_checkbox?>" value="<?=$id?>"> <? echo $name_field; ?> 
            
        <?PHP
      nbs(2);
      echo $name_field;
    }else
    {//begin else
        ?> 
            <input type="checkbox" name="<?=$name_checkbox?>" id="<?=$name_checkbox?>" value="0"> <? echo $name_field; ?>
        <?PHP  
        nbs(2);
      echo $name_field;
    }
    
}//end function

function  list_date_tabel($tb,$HN_name,$HN_val,$date_name,$select_name)//วัน-เดือน-ปี ภายใน table
{//begin
   ?>
        <script>
           $(function()
           {                        
            $('#<?=$select_name?>').change(function()
             {
                   //alert('t'); 
               window.open("<?=base_url()?>index.php/loadtable/load_view_noncompliance_mo2/<?=$HN_val?>/" + $(this).val(),"_blank","toolbar=no, scrollbars=yes, resizable=no, top=0, left=50, width=900, height=1000");
             });           
           })
        </script>   
   <?PHP     
    $query=$this->db->get_where($tb,array($HN_name=>$HN_val));
    ?>
        <select id="<?=$select_name?>" name="<?$select_name?>" >
            <option value=''> select </option>
    <?PHP    
    foreach($query->result() as $row)
    {
           $MonitoringDate=$row->$date_name;
        echo"<option value='".$MonitoringDate."'>".$MonitoringDate."</option>";
    }
    ?>
        </select>        
    <?PHP        
}//end function

function  list_date_tabel_mo2($tb,$HN_name,$HN_val,$date_name,$select_name)//วัน-เดือน-ปี ภายใน table
{//begin
   ?>
        <script>
           $(function()
           {                        
            $('#<?=$select_name?>').change(function()
             {
               //alert('t');                  
               window.open("<?=base_url()?>index.php/loadtable_mo2/load_view_noncompliance_mo2/<?=$HN_val?>/" + $(this).val(),"_blank","toolbar=no, scrollbars=yes, resizable=no, top=0, left=50, width=900, height=1000");
               //window.open("<?=base_url()?>index.php/loadtable_mo2/load_view_noncompliance_mo2/<?=$HN_val?>/" + $(this).val(),"_blank","toolbar=no, scrollbars=yes, resizable=no, top=0, left=50, width=900, height=1000");             
              //load_view_noncompliance_mo1
                });           
           })
        </script>   
    <?PHP
     $query=$this->db->get_where($tb,array($HN_name=>$HN_val));
     ?>
        <select id="<?=$select_name?>" name="<?$select_name?>" >
            <option value=''> select </option>
           <?PHP
           foreach($query->result() as $row)
             {//begin foreach
               $MonitoringDate=$row->$date_name;
               echo"<option value='".$MonitoringDate."'>".$MonitoringDate."</option>";
              }//end foreach
           ?>
            </select>  
     <?PHP       
}//end function

//###===========================
function select_response($id,$ResponseDetail1)//ใช้กับ noncompliance
{
    switch($id)//1=Resolved ,2=Improved,3=Not Improved,4=N/A 
    {//begin
      case 1:
      {
       ?>
        <br>
        <input type="radio" id="" name="" checked> Resolved 
        <input type="radio" id="" name=""> Improved  
        <textarea cols="35" rows="1"><?=$ResponseDetail1?></textarea>    
        <br>
        <input type="radio" id="" name=""> Not Improved 
        <input type="radio" id="" name=""> N/A  
       <?php   
          break;
      }
      case 2:
      {
       ?>
        <br>
        <input type="radio" id="" name="" > Resolved 
        <input type="radio" id="" name="" checked> Improved  
        <textarea cols="35" rows="1"><?=$ResponseDetail1?></textarea>    
        <br>
        <input type="radio" id="" name=""> Not Improved 
        <input type="radio" id="" name=""> N/A  
       <?php 
           break;
      }
      case 3:
      {
       ?>
        <br>
        <input type="radio" id="" name="" > Resolved 
        <input type="radio" id="" name="" > Improved  
        <textarea cols="35" rows="1"><?=$ResponseDetail1?></textarea>    
        <br>
        <input type="radio" id="" name="" checked> Not Improved 
        <input type="radio" id="" name=""> N/A  
       <?php
          break;
      }
      case 4:
      {
       ?>
        <br>
        <input type="radio" id="" name="" > Resolved 
        <input type="radio" id="" name="" > Improved  
        <textarea cols="35" rows="1"><?=$ResponseDetail1?></textarea>    
        <br>
        <input type="radio" id="" name="" > Not Improved 
        <input type="radio" id="" name="" checked> N/A  
       <?php
          break;
      }
      default:
      {
          ?>
         <br>
        <input type="radio" id="" name="" > Resolved 
        <input type="radio" id="" name="" > Improved  
        <textarea cols="35" rows="1"><?=$ResponseDetail1?></textarea>    
        <br>
        <input type="radio" id="" name="" > Not Improved 
        <input type="radio" id="" name="" > N/A  
       <?php
      }
    }//end switch
       
}//end function

##------ ADR---
/*
function  adr_select()//adr select 
{
        $str_query="select   adrscode.`ADRs`,`adrstype`.`ADRsType` from `adrscode`  left join
				   `adrstype` on  adrscode.`ADRsType`=adrstype.`Code`";
		$query=$this->db->query($str_query);		
		//  $query->num_rows();
		foreach($query->result() as $row)
		{
		        $ADRs=$row->ADRs;
				$ADRsType=$row->ADRsType;
	 ?>
                	<option ><?=$ADRs?> | <?=$ADRsType?></option>
                <?PHP
		}
	  
}
 */ 
 
function  adrscode_tb() //adrscode_tb
{
    $query=$this->db->get('adrscode');
    foreach($query->result() as $row)
    {
        $ADRsType=$row->ADRsType;
        $ADRs=$row->ADRs;
        ?>
        <option id="<?=$ADRs?>"><?=$ADRs?></option>
        <?PHP
    }  
}

function medication_select($v)// เป็น select ใน medication error select
{
    $arr=array(0=>'No',1=>'Prescribing error',2=>'Trancribing error',3=>'Dispensing error',4=>'Administration error',5=>'Unclear order');      
    foreach ($arr as $k=>$y )
    {
      if( $k == $v )
      {
        ?>
        <option value="<?PHP echo $k; ?>" selected=><?PHP echo $y; ?></option>
        <?PHP
      } 
      else
      {
          ?>
           <option value="<?PHP echo $k; ?>" ><?PHP echo $y; ?></option>
          <?PHP
      }
    }
}

function  otherdrp_select($a)
{
    $ar1=array(0=>'No',1=>'Need for additional drug therapy',2=>'Improper drug selection',3=>'Improper dosage regimen',4=>'Failure to receive medication',5=>'Drug interaction',6=>'Unnecessary drug therapy',7=>'Duplication/Repeated',8=>'Other');
    foreach($ar1 as $k=>$v)
    {
        if( $a == $k )
        {
        ?>
           <option value="<?PHP echo $k; ?>" selected><?PHP echo $v; ?></option>
        <?PHP   
        }  else {
      ?>
           <option value="<?PHP echo $k; ?>" ><?PHP echo $v; ?></option>
       <?PHP    
        }
    }
}

##===========ADR================
function  list_date_tabel_all($tb,$HN_name,$HN_val,$date_name,$select_name,$url)//วัน-เดือน-ปี ภายใน table
{//begin
   ?>
        <script>
           $(function()
           {                        
            $('#<?=$select_name?>').change(function()
             {
                  var  va=$(this).val();
                  var  total= '<?PHP echo $url;?>' + va;

 //alert('<?PHP echo $url; ?>');
 window.open("<?PHP echo $url; ?>/<?=$HN_val?>/" + $(this).val(),"_blank","toolbar=no, scrollbars=yes, resizable=no, top=0, left=50, width=900, height=1000");
                
                });           
           })
        </script>   
    <?PHP
     $query=$this->db->get_where($tb,array($HN_name=>$HN_val));
     ?>
        <select id="<?=$select_name?>" name="<?$select_name?>" >
            <!-- <option value=''> select </option> -->
           <?PHP
           foreach($query->result() as $row)
             {//begin foreach
               $MonitoringDate=$row->$date_name;
               echo'<option >'.$MonitoringDate."</option>";
              }//end foreach
           ?>
       </select>  
     <?PHP       
}//end function

##-- medication error
function select_medication_err()
{//begin
     $arr1=array(1=>'Prescribing error',2=>'Trancribing error',3=>'Dispensing error',4=>'Administration error',5=>'Unclear order');
	 foreach($arr1 as $key=>$value)
	 {//begin 
	     ?>
             <option value="<?=$key?>"><?=$value?></option>
         <?PHP
	 }//end
}//end function

function  other_drps_select()
{
     $arr1=array(1=>'Need for additional drug therapy',2=>'Improper drug selection',3=>'Improper dosage regimen',4=>'Failure to receive medication',5=>'Drug interaction',6=>'Unnecessary drug therapy',7=>'Duplication/Repeated',8=>'Other');
	 foreach($arr1 as  $key=>$value)
	 {
	     ?>
            <option value="<?=$key?>"><?=$value?></option>
         <?PHP
	 }
}

##=========  qeury  ADR ======================
function  query_hn_adr($tb,$field_name,$field_value)
{//begin function
		    $query=$this->db->get_where($tb,array($field_name=>$field_value));
                                 echo $check_row=$query->num_rows();		                                
			 if( $check_row > 0 )
			 { 			 
				//return  "true";
                                                          // return  $query;
				 //$this->epiquery->style_table1();
				 //$this->epiquery->noncompliance_table($query);
			 }
			 else
			 {
			     $this->epiquery->get_script1();
			 }
}//end functionc



function  adr_select()//adr select 
{
        $str_query="select   adrscode.`ADRs`,`adrstype`.`ADRsType` from `adrscode`  left join
				   `adrstype` on  adrscode.`ADRsType`=adrstype.`Code`";
		$query=$this->db->query($str_query);		
		//  $query->num_rows();
		foreach($query->result() as $row)
		{
		        $ADRs=$row->ADRs;
				$ADRsType=$row->ADRsType;
				?>
                	<option ><?=$ADRs?> | <?=$ADRsType?></option>
                <?PHP
		}
	  
}


##========= progress note
function  adr_table($query,$adr_value_id,$control_function)//ใช้สำหรับ non compliance
		{
		    //$this->model_select->style_table1();
			 $this->epiquery->style_table1();
			 $atts = array(
							'width'      => '800',
							'height'     => '600',
							 'scrollbars' => 'yes',
							 'status'     => 'yes',
							// 'status'     => 'no',
							 'resizable'  => 'yes',
							//  'resizable'  => 'no',
						 'screenx'    => '0',
						    'screeny'    => '0'
          				  );
			    ?>
			<table >
					<tr>
					<!--<th width="122">MonitoringDate</th>-->
					<th width="80"><div align="center">HN</div></th>
					<th width="140">Monitoring Date</th>
					<!--<th width="77">Clinic</th>
					<th width="90">Value</th>
					-->
					<!--<th>Lastname</th>
					<th>Savings</th>
					-->
					</tr>
					<script>
					function load_view(HN,monitoringDate,adr_value_id,control_function)
						{
						   //alert(''+ control_function );
						    //$('#ard_value').load('<?=base_url()?>index.php/loadtable/load_form_noncompliance/' + HN + '/'+ monitoringDate );
							//$(adr_value_id).load('<?=base_url()?>index.php/loadtable/load_form_noncompliance/' + HN + '/'+ monitoringDate );
							$(adr_value_id).load('<?=base_url()?>index.php/' + control_function + HN + '/'+ monitoringDate );
						}
					</script>
					<?PHP
					    foreach($query->result() as $row )
						{
						   $HN=$row->HN;
						   $MonitoringDate=$row->MonitoringDate;
						   ?>
						      <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
							  <td><a href="#"  onClick="javaScript:load_view('<?=$HN?>','<?=$MonitoringDate?>','<?=$adr_value_id?>','<?=$control_function?>')"><?=nbs(2)?><?=$HN?></a></td>
							  <td><?=nbs(2)?><?=$MonitoringDate?></td>
							  </tr>
						   <?PHP
						}
					?>
			</table>
 			   <?PHP
}//end 

##query modify  24-06-57
function  epi_value($L,$HN) //query เพื่อดึงค่าต่างๆใน 04-monitoring
{
    $str="SELECT *
FROM `04-monitoring`
WHERE `Lab` =".$L." and  HN='".$HN."'  ORDER BY MonitoringDate desc ";
               $q=$this->db->query($str);   
                $check64= $q->num_rows(); 
               //echo br();
                    if($check64 > 0 )
                    {
                        $row=$q->row();
                        return $row->Value;
                    }
                    else
                    {
                        return  '';
                    }
}

function  epi_value_dmy($L,$HN,$dmy) //query เพื่อดึงค่าต่างๆใน 04-monitoring
{
    $str="SELECT *
FROM `04-monitoring`
WHERE `Lab` =".$L." and  HN='".$HN."' and  MonitoringDate='".$dmy."'  ORDER BY MonitoringDate desc ";
               $q=$this->db->query($str);   
                $check64= $q->num_rows(); 
               //echo br();
                    if($check64 > 0 )
                    {
                        $row=$q->row();
                        return $row->Value;
                    }
                    else
                    {
                        return  '';
                    }
}

##--- select  for  Duration of attack
function  select_Duration($v,$name)//
{
    $arr1=array('ESev1'=>'Same','ESev2'=>'Increase','ESev3'=>'Decrease');
    //echo  $v;
    ?>
        <select id="" name="">    
       <option >:: select ::</option>                
   <?PHP  
      foreach($arr1 as $key=>$va )
      {  
          if( $key ==  $v )
          {
              ?>
                        <option value="<?=$key?>" selected><?=$key?></option>   
              <?PHP          
          }
         else
         {
                 ?>
                        <option value="<?=$key?>" ><?=$key?></option>   
              <?PHP
         }                
      } //end foreach    
       ?>
            </select>         
       <?PHP  
}

function select_epi()
{
    ?>
                <option value="ESev1">Same</option>
                <option value="ESev2">Increase</option>
                <option value="ESev1">Decrease</option>
    <?PHP                    
}

function  dmy_epi($HN)
{
    if( !empty($HN) )
    {      
     //LIMIT 0 , 1
        $str="SELECT *
FROM `04-monitoring`
WHERE Lab
IN ( 64, 66, 67, 101 )  and  HN='".$HN."' order by  MonitoringDate    ";   
      $q=$this->db->query($str);
      $check = $q->num_rows();
        if( $check > 0 ) 
        {
         $row=$q->row();
           return  $row->MonitoringDate;
        }
        else
        {
            return "";
        }
    }
    
}


}//end class
           ?>
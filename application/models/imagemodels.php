<?php
class Imagemodels extends CI_Model {
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
    
    function  query_dmy()
    {
       // $tb="04-monitoring";
         $HN="CQ1312";       
        $str="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND HN = '$HN'
AND Lab =95;  ";
            $q=$this->db->query($str);
            $num=$q->num_rows();
            if( $num > 0 )
            {
                   foreach($q->result() as $row)
                   {
                       $MonitoringDate=$row->MonitoringDate;
                ?>
<option value="<?PHP  echo  $MonitoringDate; ?>"><?PHP echo  $MonitoringDate; ?></option>
                <?PHP
                   }
            }
            else
            {
                echo "ไม่พบข้อมูลของคนไข้";
            }
            
    }//end function
    
    ##===========วัน เดือน ปี================
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


function  nextpage($select_name,$HN_val,$query,$url)//วัน-เดือน-ปี ภายใน table
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
       
        <select name="<?PHP echo $select_name;  ?>" id="<?PHP  echo $select_name; ?>">
            <option > :: เลือก :: </option>
              <?PHP
                foreach($query->result() as $row)
                {
                    @$MonitoringDate=$row->MonitoringDate;
                    ?>
            <option value="<?PHP echo @$MonitoringDate; ?>"><?PHP echo @$MonitoringDate; ?></option>
                   <?PHP
                }
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
    
    
}
?>

<?php
class Bloodmodels extends CI_Model { //begin class
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
    
    function  query_value($HN,$L)//ใช้ดึงค่า value ใน 04-monitoring
    {//begin
          // and  `Lab` in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)           
$str_q1=" select * from  `04-monitoring`  
 where  HN='".$HN."'
 and `Clinic`='Epilepsy C'
 and  `Lab`=".$L."   order by  MonitoringDate  DESC
";           
                 $q8=$this->db->query($str_q1);
                 $count8= $q8->num_rows();
                 $row=$q8->row();
                if( $count8 > 0)
                {    
                 return  $row->Value;
                }
                else
                {
                 return  "";                    
                }    
    }//end
    
    function  query_dmy_value($HN,$MonitoringDate,$L)//ใช้ดึงค่า value ใน 04-monitoring
    {//begin       
$str_q1=" select * from  `04-monitoring`  
 where  HN='".$HN."'
 and `Clinic`='Epilepsy C'
 and  `MonitoringDate`='".$MonitoringDate."'  
 and `Lab` in(".$L.")   ";
              $q=$this->db->query($str_q1);
              $count = $q->num_rows();                                                 
                if(  $count > 0)
                { 
                 $row=$q->row();
                 return  $row->Value;
                }
                else
                {
                 return  "";                    
                }    
    }//end
    
}//end class   

?>

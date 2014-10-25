<?php
class Chemmodels extends CI_Model {
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
    
    function  query_chem1($L,$HN)
    {
        $str="select * from  `04-monitoring`   where  `Lab` =".$L."    and `Clinic`='Epilepsy C'  and  HN='".$HN."' order by  MonitoringDate DESC;";             
        $q=$this->db->query($str);                 
         $check = $q->num_rows(); 
        if( $check > 0 )
        {
            $row=$q->row();
            return    $row->Value;
        }
        else
        {
            return  '';
        }
    }//end function
    function  query_chem1_dmy($L,$HN,$MonitoringDate)
    {
                $str="select  *  from  `04-monitoring`    where    `Lab` =".$L."  and `Clinic`='Epilepsy C' and  HN='".$HN."'  and  MonitoringDate='".$MonitoringDate."'   ";                 
                $q=$this->db->query($str);
                $check=$q->num_rows(); 
                if( $check > 0 )
                {
                      $row=$q->row();
                      return    $row->Value;
                }
                 else
                {
                      return  '';
                }
    }
    
}//end class
?>

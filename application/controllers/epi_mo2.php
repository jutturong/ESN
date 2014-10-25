<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Epi_mo2 extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    var  $title="ESN system  คลินึกโรคลมชัก";  
    public function __construct()
       {
            parent::__construct();        
            //$this->load->helper('url'); //autoload 	
	 //  $this->load->helper('form'); //autoload
	//$this->load->helper('gen_string');
            // $this->load->library('session'); //autoload
	 // $this->load->helper('html'); //autoload	
	// $this->load->model('Model_logout'); //#bug error
            // $this->load->library('db_query');
            $this->load->database();
       }
      public  function  auto_epi() //ค้นหาค่าใน epilepsy clinic ย่อยใน tab
	{
/*
					   echo '<li onClick="fill_(\''.$HN.'\',\''.$id_appendix1.'\',\''.$person_id.'\',\''.$ep_no.'\',\''.$name.'\',\''.$surname.'\',\''.$sex.'\',\''.$zipcode.'\',\''.$address.'\',\''.$telephone.'\',\''.@$cal_age.'\',\''.@$d_tb.'\');">'.$full.'</li>'; 
	*/
	               $HN=trim($this->input->get_post('HN'));
				   
                        //query  HN auto complete จากของเดิม
					    $query1="select   distinct monitoring_04.HN,tb_appendix1.`name`,tb_appendix1.`surname` from   `monitoring_04`  
		 left   join  `tb_appendix1`   on   `monitoring_04`.HN=`tb_appendix1`.HN 
		     where  
                     `monitoring_04`.HN  like('%$HN%')  and
			           monitoring_04.`Clinic`   like('%Epilepsy C%')   
					   order  by    monitoring_04.`MonitoringDate` desc   limit 0,30 ";
                            
                                
					   
					   
//					     select   distinct (monitoring_04.HN),tb_appendix1.`name`,tb_appendix1.`surname` from   `monitoring_04`  
//		 left   join  `tb_appendix1`   on   `monitoring_04`.HN=`tb_appendix1`.HN 
//		     where  
//                       `monitoring_04`.HN  like('%ha%')  and
//			            monitoring_04.`Clinic`   like('%Epilepsy C%')   
//        order  by    monitoring_04.`MonitoringDate` desc   limit 0,30   
				   
					   
					   
										   
//HN ='AL4286'  ที่ใช้้สำหรับทดสอบ
/*										
$query1="SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  HN ='$HN'
and  Lab=64 
ORDER BY `monitoring_04`.MonitoringDate DESC  
limit 0,1 ";  
*/										   
										   
						  $quryHN1=$this->db->query($query1);
						  foreach($quryHN1->result() as $row)
						  {
									 $name_tb=$row->name;
									  $HN_tb=$row->HN;
									  //$value_tb=$row->Value;
									 // $value_tb=1;
									  $surname_tb=$row->surname;
									  //echo '<li onClick="fill_ep(\''.$HN_tb.'\',\''.$value_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									 echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									//echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
						 
	
	}	//end function  

}//end class     
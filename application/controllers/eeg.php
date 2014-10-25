<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eeg extends CI_Controller {
    var  $title="ESN system  คลินึกโรคลมชัก";   
    public function __construct()
       {
            parent::__construct();        
            $this->load->helper('url'); //autoload 	
	  $this->load->helper('form'); //autoload
	//$this->load->helper('gen_string');
             $this->load->library('session'); //autoload
	  $this->load->helper('html'); //autoload	
	// $this->load->model('Model_logout'); //#bug error
            // $this->load->library('db_query');
            $this->load->database();
           // $this->load->model('loginmodels');
            $this->load->model('epiquerymodel');
            $this->load->helper('date');
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }
       public  function  load_switch()  //seg3=HN,seg4=link,seg5=id_div
       {
           $sess_num = $this->session->userdata('sess_num');
           if(  $sess_num  ==   1    ) 	//1=login
	{
	   $HN=$this->input->get_post('HN');
	   //echo $HN=$this->uri->segment(3);
	  // $HN='CQ1312'; //HN ทดสอบ
	 if (strlen($HN) > 0 )
	  {
	$data['HN']=$HN;											   // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
              $datestring = "%Y-%m-%d";
              //$time = time();
               $data['date_eeg']= mdate($datestring);                                                                                                                                                              $data['title']=$this->title;
/*												   //$query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
      $str="SELECT *                                                                                                                                                                             
    FROM `04-monitoring`
    WHERE Clinic = 'Epilepsy C'
    AND Lab = '95'  AND  HN='".$HN."'   ";
 */ 
                                                                                                                                                                                 
 $str="
select * from  `04-monitoring`  
left join `eegresult` on `04-monitoring`.`Value`=`eegresult`.`Code`
 where `04-monitoring`.Clinic='Epilepsy C' and `04-monitoring`.Lab='95' and  `04-monitoring`.`HN`='".$HN."'";
    $query=$this->db->query($str);
    
    ##- eeg result --
    $data['query_eeg']=$this->db->query('SELECT *
FROM `eegresult`');
											   $check_row=$query->num_rows();
												   if(  $check_row > 0 )
												   {
														
														    $data['query']= $query;
														   //$data['link']=   base_url().'index.php/epi/query_imaging';   //varible
														  // $data['link']=$this->uri->segment(4); //ของเดิม
														  $data['link']=trim($this->input->get_post('link_'));
														   //$data['id_div']='#load_image_value';  //ของเดิม
														   // $data['id_div']=$this->uri->segment(5);
															 $data['id_div']=trim($this->input->get_post('id_div'));
															 
														   // $this->epiquery->query_HN_table($query,$link,$id_div);
														 //  $this->load->view('update_301255/log_HN_monitoring',$data);
                                                                                                                                                                                             $this->load->view('update_301255/eeg_form',$data);
												   }
                                                                                                   else
                                                                                                   {
                                                                                                       echo "ไม่พบ HN ที่ค้นหา";
                                                                                                   }
	     }
	}
	else
             {
										 // echo "F";
										   $this->logout();
             }			
       }//end function
}
?>

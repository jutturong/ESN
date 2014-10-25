<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Epi2 extends CI_Controller {
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
            $this->load->model('imagemodels');
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }
        public  function  load_epi()
	{
                $sess_num = $this->session->userdata('sess_num');
	 if( $sess_num  ==   1    ) 	//1=login
	  {
	       $HN=$this->uri->segment(3);
                      $data['HN']=$HN;
                      $data['title']=$this->title;
                  // echo br();
	       //$HN='HM1643';								   
		if (strlen($HN) > 0 )
		 {
		     // $data['alius_pic']=   $link_anchor_popup.''.$data['data_new_picture']; 
		     // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
		 $query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
                             
		 $check_row=$query->num_rows();
                 
                 
                              $data['fieldset']="Epilepsy History";
                              
                                
		      if(  $check_row > 0 )
		          {
		//echo "testing";	
                          $data['query']= $query;
			//$this->load->view('update_301255/log_epi',$data);
                                          // $this->load->view('update_301255/form_epilepsy_history',$data);
                                         //  $this->load->view('update_301255/ep_form',$data);
                                            $this->load->view('update_301255/ep_form_mo2',$data);
			 }                             
		 }
	}
	else
	{
	   $this->welcome->logout();
	}			
	}//end function
      public function call_data()
      {
            $sess_num = $this->session->userdata('sess_num');
	 if( $sess_num  ==   1    ) 	//1=login
	  {
                 
                $HN=$this->uri->segment(3);
                
                $data['MonitoringDate']= $this->epiquerymodel->dmy_epi($HN);
                
               $data['Lab64']= $this->epiquerymodel->epi_value(64,$HN);
              // echo br();
               $data['Lab66']= $this->epiquerymodel->epi_value(66,$HN);    
               //echo br();
               $data['Lab67']= $this->epiquerymodel->epi_value(67,$HN); 
               //echo br();
               $data['Lab101']= $this->epiquerymodel->epi_value(101,$HN); 
               //echo br();
               
                    $data['title']=$this->title;                 
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab in(64,66,67,101)  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem2/query_chem2/"; 
                      $data['fieldset']="Epilepsy History";
                    $data['name']="select_name";
                    
                    //## query dmy
                          //$select_name,$HN_val,$query_dmy,$url
                           $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab IN ( 64,66,67,101) AND HN='$HN'; ");
                          // echo  $data['query_dmy']->num_rows();
                           $data['select_name']="select_date2"; //ok   
                           $data['url']= base_url()."index.php/epi2/query_epi";
                      
                      //$this->epiquerymodel->select_Duration($data['Lab67'],$HN);
                      
                $this->load->view('update_301255/ep_form_DRPs',$data);
              }
             else
	{
	   $this->welcome->logout();
	}
         
      }//end function  
      
      public function query_epi()
      {
          $sess_num = $this->session->userdata('sess_num');
          if( $sess_num  ==   1    ) 	//1=login
	  {
                    $HN=$this->uri->segment(3);
                 //  echo br();
                    $MonitoringDate=$this->uri->segment(4);
                    
                    /*
                      $str="SELECT *
FROM `04-monitoring`
WHERE `Lab`
IN ( 64, 66, 67, 101 ) and  HN='".$HN."'  and  MonitoringDate='".$MonitoringDate."'  order by MonitoringDate   DESC  ";
                      $q=$this->db->query($str);
                     // echo  $q->num_rows();                  
                   //  $row=$q->row();
                   */  
                   
                   $data['Lab64'] = $this->epiquerymodel->epi_value_dmy(64,$HN,$MonitoringDate);
                 // echo br();
                  $data['Lab66'] = $this->epiquerymodel->epi_value_dmy(66,$HN,$MonitoringDate);   
                 // echo br();  
                  $data['Lab67'] = $this->epiquerymodel->epi_value_dmy(67,$HN,$MonitoringDate);   
                  //echo br();  
                   $data['Lab101'] = $this->epiquerymodel->epi_value_dmy(101,$HN,$MonitoringDate);   
                 // echo br();  
                  
                  $data['title']=$this->title;                 
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab in(64,66,67,101)  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem2/query_chem2/"; 
                      $data['fieldset']="Epilepsy History";
                    $data['name']="select_name";
                    
                    //## query dmy
                          //$select_name,$HN_val,$query_dmy,$url
                           $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab IN ( 64,66,67,101) AND HN='$HN'; ");
                          // echo  $data['query_dmy']->num_rows();
                           $data['select_name']="select_date2"; //ok   
                           $data['url']= base_url()."index.php/epi2/query_epi";
                           
                            $this->load->view('update_301255/ep_form_DRPs',$data);
               }
          else
	{
	   $this->welcome->logout();
	}
      }
}
?>


<?PHP  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Noncompliance extends CI_Controller {
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
       }
       public  function index()
       {
             echo "testing noncompliance!!";
           
       }
       
public function  load_form_noncompliance_blank()//แสดงหน้า form  non compliance จากการกด click
{//begin function
     $sess_num = $this->session->userdata('sess_num');
    if( $sess_num == 1 )
    {
		 $HN=$this->uri->segment(3);
		$data['HN']=$this->uri->segment(3);
		// $MonitoringDate=$this->uri->segment(4);
		//  $data['MonitoringDate']=$this->uri->segment(4); 
                             $data['fieldset']='Non Compliance';		
                             $this->load->view('update_301255/form_non_compliance',$data); //ปรับปรุงใหม่
    }
    else
    {
        redirect('welcome/index');
    }
}//end function
    
}


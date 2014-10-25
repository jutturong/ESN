<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chem2 extends CI_Controller {//begin
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
            $this->load->model('chemmodels');
            $this->load->model('imagemodels');
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }  
         public function  loadform()
         {
               $sess_num = $this->session->userdata('sess_num');
               $HN=$this->input->get_post('HN');
              // $HN='HU3128';  
               $data['HN']=$HN;
               if(  $sess_num  ==   1    ) 	//1=login
	{
                    $data['title']=$this->title;
                     
                    
                    $this->load->view('update_301255/chem2_form',$data);
               }
             else {
                   redirect('welcome/logout');
                }
         }//end functoin
         public function  call_data() //Lab(37-47)
         {//begin
               $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	{
                  $HN=$this->uri->segment(3);                
                      for($i=37;$i<=47;$i++)
                      {
                          $name = "Lab".$i;
                          $data[$name]=$this->chemmodels->query_chem1($i,$HN);
                         // echo br();
                      }
                      
                     $data['title']=$this->title;
                   
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab between 37 and 47  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem2/query_chem2/"; 
                    $data['fieldset']="Chem2";
                    $this->load->view('update_301255/chem2_form_DRPs',$data);
                    
              }
              else
              {
                   redirect('welcome/logout');
              }
         }//end function
         
    public  function query_chem2()
    {
         $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	{
                     $HN=$this->uri->segment(3);
                   //  echo br();
                     $MonitoringDate=$this->uri->segment(4);
                    // echo br(); 
                 // and  MonitoringDate='".$MonitoringDate."'    
               
             //  echo   $this->chemmodels->query_chem1_dmy(23,$HN,$MonitoringDate); 
                  for($i=37;$i<=47;$i++)
                   {
                        $name = "Lab".$i;
                        $data[$name]=$this->chemmodels->query_chem1_dmy($i,$HN,$MonitoringDate); 
                 //echo  br();
                   }    
                    $data['title']=$this->title;                 
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab between 23 and 36  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem2/query_chem2/";
                    
                    $data['fieldset']="Chem2";
                    $this->load->view('update_301255/chem2_form_DRPs',$data);
                 
             }
              else
              {
                   redirect('welcome/logout');
              }
    }
}
?>
            





<?PHP  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Progressnote extends CI_Controller {
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
       
function  load_progress_note()//load No compliance
{
     $sess_num = $this->session->userdata('sess_num');
      if( 	 $sess_num   ==   1    )
         { //begin function
               $HN=$this->uri->segment(3); //call
             //  $HN="DY2939"; //testing HN            
	 $tb="12-progress";
          $str="select * from `12-progress`
left join `user`  on   `12-progress`.`From`=`user`.`UserCode` 
 left join `usertype` on `user`.`Title`=`usertype`.`Code`
where  `12-progress`.HN='".$HN."' and `12-progress`.Clinic='Epilepsy Clinic'  ";

          $query=$this->db->query($str);
          $data['query']=$query;
          $check_row=$query->num_rows();            
                if( $check_row > 0 )
                {//if	                
                    // $this->epiquery->adr_table($query_hn,$adr_value_id,$control_function);
                    $this->load->view('update_301255/form_progress_note',$data);
                }//end if
                else
                {//begin
                    echo " ค้นไม่พบข้อมูล ";                   
                }//end           
         }//end function
          else
          {
	 redirect('welcome/logout');
          }
				
}//end
    
}


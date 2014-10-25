<?PHP  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Giveinformation extends CI_Controller {
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
     public  function  load_give_information()//load No compliance
     {//function
          $sess_num = $this->session->userdata('sess_num');
			if(  $sess_num  ==   1    )
			{ 
			    //$HN=$this->uri->segment(3);
                                                $HN='AA0096'; //HN สำหรับการทดสอบ
                                                $data['HN']=$HN;
			    
                                                $data['title']=$this->title;
                                                $data['fieldset']="Give Information";
                                                $this->load->view('update_301255/form_give_information',$data);
			    //$query_hn=$this->epiquery->query_hn_adr($tb,$field_name,$HN);
			    //$adr_value_id='#give_information_value';
			   // $control_function='loadtable/load_form_give_information/';
			   // $this->epiquery->adr_table($query_hn,$adr_value_id,$control_function);					
			}
			else
			{
			     redirect('welcome/logout');
			}				
     }//end
    public function load_giveinformation_DRP()
    {//begin
          $sess_num = $this->session->userdata('sess_num');
         if( $sess_num == 1 )
         {
             $HN=$this->uri->segment(3);
             $data['HN']=$HN;
            //$HN='AA0096'; //HN สำหรับการทดสอบ
            $data['fieldset']="Give Information";
            $data['title']=$this->title;
           // $tb="06-giveinformation";
           $tb="06_giveinformation";
           $data['tb']=$tb;        
            $this->db->order_by("MonitoringDate", "desc");
          //  $this->db->limit(1);
            $query=$this->db->get_where($tb,array('HN'=>$HN));
            //echo $row=$query->num_rows();
           // foreach($query->result() as $row )
           // {//begin
                 $row=$query->row();
                 $data['MonitoringDate']=$row->MonitoringDate;
                 $data['GiveInformation1']=$row->GiveInformation1; //What's your disease?            
                  $data['GiveInformation2']=$row->GiveInformation2; //What's treatment?               
                  $data['GiveInformation3']=$row->GiveInformation3; // How to manage the side effect?               
                 $data['GiveInformation4']=$row->GiveInformation4; //Bring medication to each visit?            
               $data['GiveInformation5']=$row->GiveInformation5; //How to correct behavior?             
                $data['GiveInformation6']=$row->GiveInformation6; //
                $data['url']= base_url()."index.php/giveinformation/load_giveinformation_DRP_date/";
                $data['select_name']="select_date2"; //ok             
                $data['name']=$this->session->userdata('sess_name');//ok            
               $this->load->view('update_301255/form_other_give_information_DRPs',$data);
         }
         else
         {
           redirect('welcome/logout');  
         }
    }//end
  public function load_giveinformation_DRP_date()
{//begin
     $sess_num = $this->session->userdata('sess_num');
         if( $sess_num == 1 )
         {
           echo  $HN=$this->uri->segment(3);
           echo br();
           $data['HN']=$HN;
           echo   $MonitoringDate=$this->uri->segment(4);
           echo br();
           $data['MonitoringDate']=$HN;
           $tb="06_giveinformation";
           $data['tb']=$tb;   
           $data['fieldset']="Give Information";
            $data['title']=$this->title;          
            $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
            //$query->num_rows();                 
            $query=$this->db->get_where($tb,array('HN'=>$HN));
                 $row=$query->row();
                 $data['MonitoringDate']=$row->MonitoringDate;
                 $data['GiveInformation1']=$row->GiveInformation1; //What's your disease?            
                  $data['GiveInformation2']=$row->GiveInformation2; //What's treatment?               
                  $data['GiveInformation3']=$row->GiveInformation3; // How to manage the side effect?               
                 $data['GiveInformation4']=$row->GiveInformation4; //Bring medication to each visit?            
               $data['GiveInformation5']=$row->GiveInformation5; //How to correct behavior?             
                $data['GiveInformation6']=$row->GiveInformation6; //
                $data['url']= base_url()."index.php/giveinformation/load_giveinformation_DRP_date/";
                $data['select_name']="select_date2"; //ok             
                $data['name']=$this->session->userdata('sess_name');//ok            
               $this->load->view('update_301255/form_other_give_information_DRPs',$data);              
         }
          else
         {
           redirect('welcome/logout');  
         }
}//end
    
}//end class  
   ?>    


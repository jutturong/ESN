<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
       /*
	public function index() //ใช้สำหรับทดสอบ
	{
		$this->load->view('welcome_message');
	}
        */ 
        
           public function index()
           {
               //echo "testing";
               $data['title']="ESN system  คลินึกโรคลมชัก"; 
               $sess_user=array(
	                       'sess_user' =>''
			,'sess_id_user'=>''
			,'sess_id_typeuser'=>''
			,'sess_name'=>''
			,'sess_jurisdiction'=>''
			,'sess_agencies'=>''
			,'sess_date_submit'=>''
			,'sess_num'=>'' //ตรวจสอบการ login
			  );
              $this->load->view('login_modify03',$data);	
           }
           public function login()
           {
               //echo "testing";
               $data['title']="ESN system  คลินึกโรคลมชัก"; 
               $sess_user=array(
	                       'sess_user' =>''
			,'sess_id_user'=>''
			,'sess_id_typeuser'=>''
			,'sess_name'=>''
			,'sess_jurisdiction'=>''
			,'sess_agencies'=>''
			,'sess_date_submit'=>''
			,'sess_num'=>'' //ตรวจสอบการ login
			  );
              $this->load->view('login_modify03',$data);	
           }
           public function checklogin()
           {
                $user=trim($this->input->get_post('user'));
                //echo br();
	     $password=trim($this->input->get_post('password'));
 	     $password=md5($password);  
              // echo br();
                 //-----------------> enable_user == t    ,f=คือการ blog user
	     /*
                 $tb="tbl_user";
                 $this->db->select('*');
                 $q1=$this->db->get_where($tb,array('user'=>$user,'password'=>$password,'enable_user'=>'t'));
		//-----------------> enable_user == t    ,f=คือการ blog user   	   
	     $num=$q1->num_rows();
              */ 
               $tb="tbl_user";
               $this->db->select('*');
               $q1=$this->db->get_where($tb,array('user'=>$user,'password'=>$password,'enable_user'=>'t'));
               $num=$q1->num_rows();
               $row=$q1->row();
		      $sess_user=array(
		      'sess_user'=>$row->user
		      ,'sess_id_user'=>$row->id_user
		      ,'sess_id_typeuser'=>$row->id_typeuser  //ตรวจสอบ สิทธิ์ user  1=admin  2=user
		      ,'sess_name'=>$row->name                                     
		   //   ,'sess_jurisdiction'=>$row->jurisdiction
		    //  ,'sess_agencies'=>$row->agencies
		    //  ,'sess_date_submit'=>$row->date_submit
                           //  ,'sess_name'=>$row->name  //ชื่อที่ login เข้ามา
		      ,'sess_num'=>$num //ตรวจสอบการ login  ถ้า 1 คือการ login  โดยไม่ซ้ำ
                     			    );
		       $this->session->set_userdata($sess_user);
                         redirect('welcome/home_system');  
           }
           
           public function  home_system()  //หน้าหลักของโปรแกรมตัวใหม่
		{
		   $sess_num = $this->session->userdata('sess_num'); 
		   $data['sess_id_typeuser']=$this->session->userdata('sess_id_typeuser');				 
		   $this->db->select('*');
		   $query=$this->db->get('tb_appendix1');				 
		   $this->db->select('*');
		   $data['province']=$this->db->get('province');				 
		   $this->db->select('*');
		   $data['occupational']=$this->db->get('occupational');								
	              $this->db->select('*');
		   $data['education']=$this->db->get('education');
                          $this->db->select('*');
		   $data['payment']=$this->db->get('payment');				  
	               $this->db->select('*');
		   $data['epilepsy_first']=$this->db->get('epilepsy_first');
		   $this->db->select('*');
		   $data['CTMRI']=$this->db->get('CTMRI');
		   $this->db->select('*');
		   $data['drug']=$this->db->get('drug');
		   $this->db->select('*');
		   $data['disease_drug']=$this->db->get('disease_drug');
		   $this->db->select('*');
		   $data['nature_drug_epilepsy']=$this->db->get('nature_drug_epilepsy');
		   $this->db->select('*');
		   $data['stimulate_epilepsy']=$this->db->get('stimulate_epilepsy');				  
		   $data['sess_name']=$this->session->userdata('sess_name');				 
		   $this->db->select('*');
		   $num_online_query=$this->db->get_where('tb_onlinestatus',array('id_statusonline'=>1));
		   $data['num_online']=$num_online_query->num_rows(); //นับจำนวนสมาชิก online												
		   ##---------------------------------------------------- Epilepsy clinic ----------------------------------------------------------				
		   ##  query ของ  Duration of Attack				     
		   //   $data['epi_select']=$this->db->query("SELECT * from   `labcode`      where     `Code`  in('ESev1','ESev2','ESev3');");							 
		   if( $sess_num == 1 )  //$sess_num==1 คือมีการ login
                          {//if		    						
		      $data['title']= title_program();
		      $data['num_']=$query->num_rows();
		      $data['begin_load']="chart_home.php";-
		      //$this->load->view('home_jquery',$data);														
		      $this->load->view('home_02',$data);
		   }//end if		
	              else
		   {//begin else
		      redirect('home/index/');
		   }
		}
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
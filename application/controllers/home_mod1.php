<?php
class Home_mod1 extends CI_Controller {

       public function __construct()
       {
            parent::__construct();        
            //$this->load->helper('url'); //autoload 	
	 //  $this->load->helper('form'); //autoload
	//$this->load->helper('gen_string');
            // $this->load->library('session'); //autoload
	 // $this->load->helper('html'); //autoload	
	 $this->load->model('Model_logout');
            // $this->load->library('db_query');
            $this->load->database();
       }
       public function test2()
       {
           echo "test2 function";
           echo "<hr>";
          // echo"<img src=\"".base_url()."report.jpg\" >";
           
          echo "<img src=".base_url()."\"images/rond_Charte.gif\" >";
          // $this->load->view('login_modify03');	 
       }
      //public function  login() //เข้าสู่ระบบ login
       public function  index() //เข้าสู่ระบบ login
	{   
	//echo "testing" ;
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
                  
                           //  $this->session->unset_userdata($sess_user);
	               //   $this->session->sess_destroy();        
                         //    $this->load->view('login_modify03',$data);	 
	}
        public function  checklogin() //checklogin  ตรวจสอบการเข้าใช้ระบบ
	{
	      $user=trim($this->input->get_post('user'));
                 //echo br();
	      $password=trim($this->input->get_post('password'));
 	      $password=md5($password);              
                 //-----------------> enable_user == t    ,f=คือการ blog user
	      $tb="tbl_user";
                 $this->db->select('*');
                 $q1=$this->db->get_where($tb,array('user'=>$user,'password'=>$password,'enable_user'=>'t'));
		//-----------------> enable_user == t    ,f=คือการ blog user   	   
	     $num=$q1->num_rows();
                    if( $num == 1 )
		   {		      
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
					/*  
					   echo   $this->session->userdata('sess_user');  //ทดสอบการใช้ session
					   echo br();	
					   echo   $this->session->userdata('sess_id_typeuser');  //ทดสอบการใช้ session
					   echo br();	
					   echo   $this->session->userdata('sess_name');//ทดสอบการใช้ session
					   echo br();
					   echo   $this->session->userdata('sess_jurisdiction');//ทดสอบการใช้ session	
					   echo br(); 
					   echo   $this->session->userdata('sess_agencies');//ทดสอบการใช้ session	
					   echo br();
					*/   
			        $id_user=$this->session->userdata('sess_id_user');
			    //    $this->Model_logout->online($id_user);
					//redirect('home/home_loading'); //ของเดิม  
			    redirect('home/home_system');  			 
		   }
                   
		   
	} 
        
}//end class
?>


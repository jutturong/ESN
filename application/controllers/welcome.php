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
       /*
	public function index() //ใช้สำหรับทดสอบ
	{
		$this->load->view('welcome_message');
	}
        */ 
        
           public function index()
           {
               //echo "testing";
               //$data['title']="ESN system  คลินึกโรคลมชัก"; 
               $data['title']=$this->title;
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
                         redirect('welcome/home_system2');  
           }
           
           public    function  home_system()  //หน้าหลักของโปรแกรมตัวใหม่
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
		  // $data['CTMRI']=$this->db->get('CTMRI');
		  // $this->db->select('*');
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
		//echo $sess_num;
                //echo br();
                
                   if( $sess_num == 1 )  //$sess_num==1 คือมีการ login
                          {//if		    						
		     // $data['title']= title_program();
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
          public function home_system2()
          {
              $sess_num = $this->session->userdata('sess_num'); 
              if( $sess_num == 1 )  		
              {
                  $data['title']= $this->title;
                //  $data['begin_load']="chart_home.php";
                  $this->load->view('home_02',$data);
              } 
              else
	   {//begin else
		      redirect('home/index/');
              }
                 
          }
         public function test()
         {
             $sess_num = $this->session->userdata('sess_num'); 
             $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');
             $appendix=$this->input->post('appendix'); 
            if( $sess_num == 1 )
            {               
               switch($appendix)
	   {
                  case 2:
                  {
                      $data['title']=$this->title;
                      $this->load->view('update_301255/all_form1',$data); //ของเดิมในการ load
                      break;
                  }
                   
               }

				
            }
         }
         public function test2()
         {
             echo "tesging 2 fucntion";
         }
         
         public function call_appendix1() //แก้ไข เรียก appendix1
         {
            $sess_num = $this->session->userdata('sess_num'); 
		   $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');
		  $appendix=$this->input->post('appendix'); 
	       if( $sess_num == 1 )
		     {
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
				 $data['CTMRI']=$this->db->get('ctmri');

				  $this->db->select('*');
				  $data['drug']=$this->db->get('drug');

				  $this->db->select('*');
				  $data['disease_drug']=$this->db->get('disease_drug');

				  $this->db->select('*');
				  $data['nature_drug_epilepsy']=$this->db->get('nature_drug_epilepsy');

				  $this->db->select('*');
				  $data['stimulate_epilepsy']=$this->db->get('stimulate_epilepsy');

				
				 $data['title']= $this->title;
				 //$data['num_']=$query->num_rows();

				$data['heading']="(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
			             $this->load->view('form_insert/j_app1',$data);
                   
                              }
                      else
		   {
				  redirect('welcome/index/');
		   }        
             
         }
         
         public function  load_appendix()//ใช้สำหรับการ load appendix 1-6
	{
	               $sess_num = $this->session->userdata('sess_num'); 
		   $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');
		  $appendix=$this->input->post('appendix'); 
	       if( $sess_num == 1 )
		     {

				
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

				
							$data['title']= title_program();
							$data['num_']=$query->num_rows();

				
				switch($appendix)
				  {
				      case 1:
					  {
					        $data['heading']="(Appendix 1) แบบบันทึกข้อมูลพื้นฐานของผู้ป่วยเมื่อเริ่มการรักษา";
							$this->load->view('form_insert/j_app1',$data);
						 break;
					  }
					  case 2:
					  {
					          $data['id_appendix1']=$this->input->get_post('id_appendix1');
							  $data['heading']="(Appendix 2) แบบบันทึกการติดตามรักษา";
							  
							  //-- ADR query ใน  j_app2 ใน 2.2
							  $this->db->select('*');
							 // $this->db->form('adrscode');
							  $this->db->join('adrstype','adrscode.ADRsType=adrstype.Code');
							  $data['adr']=$this->db->get('adrscode');
							
							//------------------ epilepsy  clinic  
							// select  Duration of Attack:
							 $data['epi_select']=$this->db->query("SELECT * from   `labcode`      where     `Code`  in('ESev1','ESev2','ESev3');");  
							  
							  
						//-------- EEG 
						 $datestring = "%d/%m/%Y ";
				         $data['EEG_date']=mdate($datestring);
				         $data['select_EEG']=$this->db->query('select  *  from  eegresult;');
			         	 //$this->load->view('monitoring/EEG',$data);

					  //-----------Imaging 
					  //imagingresult	
					   $data['select_image_lab']=$this->db->query(' select  *  from    `laboratorytype`    where  `LabCode` in(96,97,100);');	 
					   $data['select_image']=$this->db->query('select  *  from  imagingresult;');	   
							  
							   //$this->load->view('form_insert/j_app2',$data);  ตัวเดิมท่ใช้โหลด ปรับปุรงล่าสุด  30-12-55
							  
							   $this->load->view('update_301255/all_form1',$data); //ของเดิมในการ load
							   //$this->load->view('update_301255/all_form_mo1',$data); //ของเดิมในการ load
							   
						 break;
					  }
					  case  3:
					  {
				            $data['id_appendix1']=$this->input->get_post('id_appendix1');
							$data['heading']="(Appendix 3) แบบบันทึกการนอนรักษาพยาบาลในโรงพยาบาล";
							$this->load->view('form_insert/j_app3',$data);

						 break;
					  }
					  case  4:
					  {
					  		 $data['id_appendix1']=$this->input->get_post('id_appendix1');
							$data['heading']="(Appendix 4) แบบบันทึกการรักษาในห้องฉุกเฉิน";
							$this->load->view('form_insert/j_app4',$data);

					     break;
					  }
					  	 case  5:
					  {
					  		 $data['id_appendix1']=$this->input->get_post('id_appendix1');
							$data['heading']="(Appendix 5) แบบบันทึกการเยี่ยมบ้านของผู้ป่วย";
							$this->load->view('form_insert/j_app5',$data);

					     break;
					  }
					  	 case  6:
					  {
					  		 $data['id_appendix1']=$this->input->get_post('id_appendix1');
							$data['heading']="(Appendix 6) แบบบันทึกการเสียชีวิต";
							$this->load->view('form_insert/j_app6',$data);

					     break;
					  }

				  }
			 }
		   else
		   {
				  redirect('welcome/index/');
		   }
	}
 
        public     function  logout($id_user) //ออกจากระบบ
	{
	                 //$id_user=$this->uri->segment(3);
		            // $this->Model_logout->logout($id_user);
					
		          $id_user=$this->session->userdata('sess_id_user');
				  
				  	
				   $data=array(
				                 'id_statusonline' =>0
				               );

				  $this->db->where('id_user',$id_user);		   
				  $this->db->update('tb_onlinestatus',$data);			   

				 
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
                   
                              $this->session->unset_userdata($sess_user);
                            //  $this->session->destroy();
				 
				     redirect('home/index/');

	}
	
       public  function test3()
        {
            echo "testing function";
        }  
        
        
       
        
        
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
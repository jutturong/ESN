<?PHP
    class   Loginmodels  extends CI_Model{
	         //var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	    function __construct()
		{
		      parent::Model();
		}
                function  test()
                {
                    echo "testing model";
                }
		
					function  logout($id_user)
					{
											$sess_user=array(
											'sess_user' => ''
											,'sess_id_typeuser'=>  ''
											,'sess_name'=> ''
											,'sess_jurisdiction'=>''
											,'sess_agencies'=>''
											,'sess_date_submit'=>''
											,'sess_num'=> ''//ตรวจสอบการ login
												 );
			
							 $this->session->unset_userdata($sess_user);
							   $data=array(
											 'id_statusonline' =>0
										   );
							 
							  $this->db->where('id_user',$id_user);		   
							  $this->db->update('tb_onlinestatus',$data);			   
							  redirect('home/index/');
					}//end function
					
						function  session_login() //checklogin  ตรวจสอบการเข้าใช้ระบบ
									{
									    return    $this->session->userdata('sess_num');  //login=1
								 	} //end function


		}//end class model
?>		
		

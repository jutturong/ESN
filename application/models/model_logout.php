<?PHP
    class  Model_logout  extends Model{
	    function  Model_logout()
		{
		      parent::Model();
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
		}
		
		function    online($id_user)
		{
		           $this->session->unset_userdata($sess_user);
				   $data=array(
				                 'id_statusonline' =>1
				               );     
			       $this->db->where('id_user',$id_user);		   
				   $this->db->update('tb_onlinestatus',$data);			   

		}
	
##-----------end class	
	}
?>
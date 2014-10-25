<?PHP ob_start(); ?>
 <?PHP
 class  Home_1 extends Controller {
         
   function  Home()
       {
	  parent::Controller();
	  $this->load->helper('url');
	  $this->load->helper('test');
	  $this->load->helper('form');
	  //$this->load->helper('gen_string');
      $this->load->library('session');
	  
	  $this->load->library('session');
	  
	  
	  $this->load->model('Model_logout');
      $this->load->library('db_query');

	  
	   }
	function  index() //เข้าสู่ระบบ login
	{
	   //echo "testing";
	   //$data['title']="ESN system  คลินึกโรคลมชัก";
	    $data['title']= title_program();
	
	
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
	                          $this->session->sess_destroy();
	
	
	   // $this->load->view('login',$data);  //เข้าสู่ระบบ login ตัวเติม
	   $this->load->view('login_modify03',$data);
	  //   $this->load->view('home_02',$data); //หน้าหลัก
	}  
	function test()
        {
            echo "testing";                          
            
        
        }
	function  load_appendix()//ใช้สำหรับการ load appendix 1-6
	{
	       $sess_num = $this->session->userdata('sess_num'); 
		   $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');
		   $appendix=$this->input->get_post('appendix'); 
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
				  redirect('home/index/');
		   }
	}
	
	function  checklogin() //checklogin  ตรวจสอบการเข้าใช้ระบบ
	{
	          $user=trim($this->input->get_post('user'));
		      $password=trim($this->input->get_post('password'));
		      $password=md5($password);
		//-----------------> enable_user == t    ,f=คือการ blog user
		   $tb="tbl_user";
		   $this->db->select('*');
		   $q1=$this->db->get_where($tb,array('user'=>$user,'password'=>$password,'enable_user'=>'t'));
		//-----------------> enable_user == t    ,f=คือการ blog user   	   
		     $num=$q1->num_rows();
			// $num=0;  //ตรวจสอบการเข้าสู่ระบบ
		   if( $num == 1 )
		   {
		        // echo  "login system"; 
		            $row=$q1->row();
					$sess_user=array(
					            'sess_user'=>$row->user
								,'sess_id_user'=>$row->id_user
								,'sess_id_typeuser'=>$row->id_typeuser  //ตรวจสอบ สิทธิ์ user  1=admin  2=user
					            ,'sess_name'=>$row->name
                                      
					            ,'sess_jurisdiction'=>$row->jurisdiction
								,'sess_agencies'=>$row->agencies
								,'sess_date_submit'=>$row->date_submit
                                ,'sess_name'=>$row->name  //ชื่อที่ login เข้ามา
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
					$this->Model_logout->online($id_user);
					//redirect('home/home_loading');   
					 redirect('home/home_system');  			 
		   }
		   else
		   {
		        // echo "logout system";
		        // redirect('home/index');
				  $id_user=$this->session->userdata('sess_id_user');
				 // $this->Model_logout->online($id_user);
				  redirect('home/index/');
		   }
		   
	} 
	
	
	
	function  home_loading()  //หน้าหลักโปรแกรม
	{
	       $sess_num = $this->session->userdata('sess_num'); 
	       if( $sess_num == 1 )
		   {
		      //$data['sess_name']=$this->session->userdata('sess_name');
			   $data['title']= title_program();
			  	$data['file']="chart_home.php";
			  $this->load->view('home',$data); //หน้าหลัก
		   
		   } 
	       else
		   {
		     	  $id_user=$this->session->userdata('sess_id_user');
				  //$this->Model_logout->online($id_user);
				   redirect('home/index/');
		   }
	}
	
	function   province() //เลือกจังหวัด
	{
	      $this->db->select('*');
		  $q1=$this->db->get('province');
		  foreach($q1->result() as $row)
		  {
		          $prov_id=$row->prov_id;
			      $prov_name=$row->prov_name;
			      $arr[]=array('prov_id'=>$prov_id,'prov_name'=>$prov_name);
		  }
	           $total=$q1->num_rows();
			   //$jsonresult=JEncode($arr[]);
			    $jsonresult=json_encode($arr);
			    echo '{"total":"'.$total.'","results":' .$jsonresult. '}'; 
			   
			   //  echo   json_encode($arr);
	}
	
	
	function  load_province()//เืลือกจังหวัด
	{
	     $p_id=$this->input->get_post('prov_id');
		 
		 if( $p_id > 0 )
		 {
			 $query=$this->db->get_where('province',array('prov_id'=>$p_id));
		 }
		 else
		 {
		 	 $query=$this->db->get_where('province');
		 }
		 
		 foreach($query->result() as $row)
		 {
	             $prov_id=$row->prov_id; 
			     $prov_name=$row->prov_name;
				 ?>
                     <option value="<?=$prov_id?>"><?=$prov_name?></option>
                 <?
	     }
	}
	
		
	    function  load_district() //โหลดตำบลจาก jquery
		{
		     $this->db->select('*');
		     $query=$this->db->get('main_district');
			 foreach($query->result() as $row)
			 {
			      ?>
                      <option value="<?=$row->district_id?>"><?=$row->district_name?></option>
                  <?
			 }
		}
		
		function  load_amphur() //โหลดออำเภอจาก jquery
		{
		     $this->db->select('*');
		     $query=$this->db->get('main_amphur');
			 foreach($query->result() as $row)
			 {
			      ?>
                      <option value="<?=$row->amphur_id?>"><?=$row->amphur_name?></option>
                  <?
			 
			 }
		}
		
		function  load_select() //id,tb,id_field,name_field ใช้สำหรับเลือก จังหวัด  ตำบล  อำเภอ
			{
				 $id=$this->input->get_post('id');
				 $tb=$this->input->get_post('tb');
				 $id_field=$this->input->get_post('id_field');
				 $name_field=$this->input->get_post('name_field');
				       
					    if( $id > 0 )
						{
							 $query=$this->db->get_where($tb,array($id_field=>$id));
							 foreach($query->result() as $row)
									 {
											 $id_tb=$row->$id_field;
											 $name_tb=$row->$name_field;
											 ?>
												 <option value="<?=$id_tb?>"><?=$name_tb?></option>
											 <?
									 }

							 
						}
						else
						{
						     $query=$this->db->get($tb);
								foreach($query->result() as $row)
									 {
											 $id_tb=$row->$id_field;
											 $name_tb=$row->$name_field;
											 ?>
												 <option value="<?=$id_tb?>"><?=$name_tb?></option>
											 <?
									 }
						}	 
							 
							 
			}

	 
	
	function   select_province() //เลือกจังหวัด  =================> modul ตัวใหม่ ที่ทดสอบจากการแยก
	{
	        $query=$this->input->post('query');
		    $this->db->select('*');
			$this->db->like('prov_name',$query);
		    $query=$this->db->get('province');
			foreach($query->result_array() as $row)
						{
							$arr[] = $row;
						}
			$jsonresult = json_encode($arr);
			echo"{\"result\":$jsonresult}";	
	}

   function  select_amphur2() //เลือกอำเภอจาก jquery
   {
            $amphur_id=trim($this->input->get_post('amphur_id'));
			
			$tb="main_amphur";
			$id="amphur_id";
		  
			
		
		
			if(  $amphur_id != '' )
			{
			     $query=$this->db->query('select  *   from  '.$tb.'  where  '.$id.'  like(\''.$amphur_id.'%\') ;');
				 //$query=$this->db->query('select  *   from  '.$tb.'  where  '.$id2.' =\''.$district_name.'\') ;');
			}
			elseif( $amphur_id == ''   )
			{
			      $this->db->select('*');
				  $query=$this->db->get($tb);
			} 
			
			
								
								
	      ?>
	           <select name="amphur_id" id="amphur_id">
         <?
		 
		 // $this->db->like('amphur_id',$amphur_id);
		 // $query= $this->db->get('main_amphur');
		
		
		
	   foreach($query->result() as $row)
	   {
	           $amphur_id_fetch=$row->amphur_id;
			   $amphur_name=$row->amphur_name;
		   ?>
               
                   <option  value="<?=$amphur_id_fetch?>"><?=$amphur_name?></option>
                
           <?
	   }
	   ?>
               </select>
       <?
   }
   
   
   function  select_amphur3()
   {
   
  	           	$amphur_id=$this->input->get_post('amphur_id');
			  //echo br();
			    $amphur_name=$this->input->get_post('amphur_name');
			  //echo br();
			  
			  
				  $this->db->like('amphur_id',$amphur_id);
				  $this->db->like('amphur_name',$amphur_name);
				   $query_num=$this->db->get('main_amphur');
				
			  $num_= $query_num->num_rows();
				//echo br();
				
				
			if( $num_ > 0 )
			{	   
				foreach($query_num->result() as $row)
				{ 
							$amphur_id_tb=$row->amphur_id;
							$amphur_name_tb=$row->amphur_name;
							
							//$prov_name="prov_name";
							//$prov_id="prov_id";
							
							 echo '<li onClick="fill_amphur(\''.$amphur_name_tb.'\',\''.$amphur_id_tb.'\');">'.$amphur_name_tb.'</li>'; 
				}			 
			} 	 
				 
				 
			  
				 
   }
   
   
    function  select_district3()
   {
                    $amphur_auto_id=$this->input->get_post('district_id');
				  //echo br();
				    $district_name=$this->input->get_post('district_name');
				  //echo br();
				  

				$amphur_name_tb='1';
				$amphur_id_tb='2';
				$amphur_name_tb='3';
				
				
				         $this->db->like('district_id',$amphur_auto_id);
						 $this->db->like('district_name',$district_name);
						 $query_num=$this->db->get('main_district');
						   $num= $query_num->num_rows();
						 // echo br();
						 
						 if( $num > 0  )
						 {
                             foreach($query_num->result() as $row)
							 {
									$district_id_tb=$row->district_id;
									$district_name_tb=$row->district_name;
									 echo '<li onClick="fill_district(\''.$district_name_tb.'\',\''.$district_id_tb.'\');">'.$district_name_tb.'</li>'; 
							 }		 
						 }			 
   }
   
   
    function   select_amphur() //เลือกอำเภอ  =================> modul ตัวใหม่ ที่ทดสอบจากการแยก
	{
		       $amphur_id=trim($this->input->post('prov_id'));
			  $query=$this->input->post('query');
			 if(   $amphur_id  >  0  )
			 {  
								  // $amphur_id=40;
								//$tb="main_amphur";
								//$id="amphur_id";
								
								$this->db->like('amphur_name', $this->input->post('query'),'after');
								$this->db->like('amphur_id', $amphur_id ,'after');
								$query = $this->db->get('main_amphur');
				
			              	// or    amphur_name   like(\''.$query.'%\')
							//   $query=$this->db->query('select  *   from   '.$tb.'  where  '.$id.' like (\''.$amphur_id.'%\')   ;');
						    //$total=  $q1->num_rows();
							
							  foreach($query->result_array() as $row)
							 {
										$arr[] = $row;
							 }
								   $jsonresult=json_encode($arr);
								   echo"{\"result\":$jsonresult}";	
			}	   
	}
	
	
	function  select_district2() //เลือกตำบล จาก jquery
	{
	    $district_id=trim($this->input->post('district_id'));
	    $district_name=trim($this->input->post('district_name'));
		 if( $district_id > 0 )
		 {
		     $tb="main_district";
			 $id="district_id";
			 $id2="district_name";
			 
			 //$query=$this->db->query('select  *   from  '.$tb.'  where  '.$id.'  like(\''.$amphur_id.'%\') ;');
			 
			 $query=$this->db->query('select  *   from  '.$tb.'  where  '.$id.'  like(\''.$district_id.'%\') ;');
			 
			 
			 //$query=$this->db->query('select  *   from  '.$tb.'  where  '.$id2.' =\''.$district_name.'\') ;');
		 }
		 else
		 {
		     $query= $this->db->get('main_district');
		 }
		 
		   ?>
                  <select name="district" id="district">
                  <?
                      	   foreach($query->result() as $row)
							   {
                                     $district_id=$row->district_id;
									 $district_name=$row->district_name;
				  ?>
                                     <option value="<?=$district_id?>"><?=$district_name?></option>
                  <?
				  				}
				  ?>
                  </select>              
           <?
	}  
		
	function select_district() //ตำบล =================> modul ตัวใหม่ ที่ทดสอบจากการแยก
	{
			$district_id=trim($this->input->post('district_id'));
			if (  $district_id  >  0 )
			{	  
				  $tb="main_district";
				  $id="district_id";
				  
				  $query=$this->db->query('select  *   from   '.$tb.'  where  '.$id.' like (\''.$district_id.'%\');');
							  //$total=  $q1->num_rows();
							  foreach($query->result_array() as $row)
							 {
										$arr[] = $row;
							 }
								   $jsonresult=json_encode($arr);
								   echo"{\"result\": $jsonresult}";	
		    }						   	
	}
	
	function   amphur() //อำเภอ
	{
	           $amphur_id=trim($this->input->get_post('amphur_id'));
			   //  $amphur_id=trim($this->uri->segment(3));
				 
			  $q1=$this->db->get('main_amphur');
			  $total=  $q1->num_rows();
			  foreach($q1->result() as $row)
			 {
			          $amphur_id =$row->amphur_id;
				   //    $amphur_id =$row->sub_id;
				 // echo  br();
				       $amphur_name=$row->amphur_name;
				      $arr[]=array('amphur_id'=>$amphur_id,'amphur_name'=>$amphur_name); 	
					  // $arr[]=$row;	
			 }
			       $jsonresult=json_encode($arr);
			      echo  '{"total":"'.$total.'","results":'.$jsonresult.'}'; 

//			 $q1=$this->db->select('select  *,round(substring(amphur_id,2 )) as amphur_id form main_amphur');
//              $this->db->select('*');
//			  $this->db->like('amphur_id',10);
//			 $q1=$this->db->get('main_amphur');
//			$total=  $q1->num_rows();
//			 foreach($q1->result() as $row)
//			 {
//			      $amphur_id =$row->amphur_id;
//				  $amphur_name=$row->amphur_name;
//				  $arr[]=array('amphur_id'=>$amphur_id,'amphur_name'=>$amphur_name); 		
//			 }
//			           $total=$q1->num_rows();
//			          
//					 $jsonresult=json_encode($arr);
//			            echo  '{"total":"'.$total.'","result":'.$jsonresult.'}'; 
	
	}
	
	function   district()  //ตำบล
	{
	      $this->db->select('*');
          $q1=$this->db->get('main_district');	
		  $total=$q1->num_rows();
		  foreach($q1->result_array() as $row)
		  {
		       $arr[]=$row;
		  }
		      $jsonresult=json_encode($arr);
		      echo  '{"total":"'.$total.'","results":'.$jsonresult.'}'; 
	}
	
	
	function  loaddojo() //ทดสอบการโหลด dojo
	{
	      $data['title']= title_program();
		  $this->load->view('',$data);
	
	}
	
	function  logout($id_user) //ออกจากระบบ
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
	
	function   sql_query() //เขียนการใช้ sql  เพื่อทดสอบการเลือกจังหวัด
    {
	     $tb="main_amphur";
		 $id="amphur_id";
		 $value=81;
		 $name="amphur_name";
//		 $this->db_query->query_amphur($tb,$id,$value,$name);  //ทดสอบการดึงชื่ออำเภอ
           $que1=$this->db->query('select  *   from   '.$tb.'  where  '.$id.' like (\''.$value.'%\');');
		   foreach($que1->result() as $row)
		   {
		      echo  $row->$id;
			  echo  nbs(2);
			  echo   $row->$name;
			  echo  br(); 
		   }
	}


     function   SelectAmphur() //เลือกอำเภอ
	 {
			    $amphur_id=$this->input->post('amphur_id');    
			      // $amphur_id=40;
			   $tb="main_amphur";
		 $id="amphur_id";
		 //$value=81;
		 $name="amphur_name";
//		 $this->db_query->query_amphur($tb,$id,$value,$name);  //ทดสอบการดึงชื่ออำเภอ
           $que1=$this->db->query('select  *   from   '.$tb.'  where  '.$id.' like (\''.$amphur_id.'%\');');
		   $total=$que1->num_rows();
		   foreach($que1->result_array() as $row)
		   {
//		      echo  $row->$id;
//			  echo  nbs(2);
//			  echo   $row->$name;
//			  echo  br(); 
                           $arr[]=$row;
		   }
	   				      $jsonresult=json_encode($arr);
		     			  echo  '{"total":"'.$total.'","results":'.$jsonresult.'}'; 

			           //echo  "{\"results\":$jsonresult}";
	 
	 }


       function  search_() //การค้นหาข้อมูล
	   {
	         $sess_num = $this->session->userdata('sess_num'); 
				   if( $sess_num == 1 )
				   {
				         $data['title']= title_program();
					     $data['file']=  'form_insert/search.php'; 
						 $this->load->view('home',$data);
				   }
	   
	   }


		
		function  test_combo() //ทดสอบการเขียน combobox
		{
		     $data['title']= title_program();
		     $data['file']=  'form_insert/test_combo.php'; 
			 $this->load->view('home',$data);
		} 
		
		
		function   load_add_user() //load  add user
		{
				   $sess_num = $this->session->userdata('sess_num'); 
				   if( $sess_num == 1 )
				   {
						$query=$this->db->get('tbl_user');
						 $data['code_user']=$query->num_rows() + 1;
						//$data['code_user']=1000;
						switch($data['code_user'])
						{
						   case $data['code_user'] < 10 :
						   {
						      $data['code_user']="000".$data['code_user'];
							  break;
						   }
						   case $data['code_user'] < 100 :
						   {
						      $data['code_user']="00".$data['code_user'];
							  break;
						   }
						   case $data['code_user'] < 1000 :
						   {
						      $data['code_user']="0".$data['code_user'];
							  break;
						   }
						}
						
						 $data['head']=" .:: บริหารจัดการผู้ใช้ (user) ::. ";
						 $data['title']= title_program();
					     $data['file']=  'admin/addUser.php'; 
						 $this->load->view('home',$data);
				   }
				   else
				   {
		   		   		  $id_user=$this->session->userdata('sess_id_user');
		  				  $this->Model_logout->online($id_user);
				  		  redirect('home/logout/');

		           }
		}
		
		
		function  load_home_admin() //หน้า load สำหรับ การเพิ่ม user
		{
		     
			   $data['sess_id_user']=$this->session->userdata('sess_id_user');
			// echo br();
			  //  echo "testing...";
			  
			  $sess_num = $this->session->userdata('sess_num');  //ตรวจสอบการ login  ถ้า 1 คือการ login  โดยไม่ซ้ำ
			//  echo br();
	      	 $sess_id_typeuser=$this->session->userdata('sess_id_typeuser');  //ตรวจสอบการ login  ถ้า 1 คือการ login  โดยไม่ซ้ำ
			//  echo br();
			
			   $sess_num = $this->session->userdata('sess_num'); 
				   if( $sess_num == 1 && $sess_id_typeuser == 1 )
				   {
				   
				        // echo "testing...";
			   
/*								$data['title']= title_program();
								$data['begin_load']="chart_home.php";-
								$this->load->view('home_02',$data);
								
								
*/		     	
		                            $this->db->join('province','province.prov_id=tbl_user.id_province');
		                            $data['tb_']=$this->db->get('tbl_user');
		
									$data['title']= title_program();
									$data['begin_load']="chart_home.php";
									//$this->load->view('home_02',$data);
									$this->load->view('admin/j_mainadmin',$data);
									
		          }
				  	else
					{
						redirect('home/index');
					}
		
		}
		
		
		
		function  home_system()  //หน้าหลักของโปรแกรมตัวใหม่
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
                    {
							//echo "testing ";
							
							$data['title']= title_program();
							$data['num_']=$query->num_rows();
							$data['begin_load']="chart_home.php";-
							//$this->load->view('home_jquery',$data);
							

							
							$this->load->view('home_02',$data);
					 }		
			     else
				 {
				     redirect('home/index/');
				 }
		}
		
		function  topMenu() //ทดสอบ TopMenu
		{
		            $data['title']= title_program();
					$this->load->view('topMenu/topMenu',$data);
		}
		function  load_begin_page() //โหลดหน้าแรกเมื่อเข้าสู่ระบบ login
		{
		   $sess_num = $this->session->userdata('sess_num'); 
		   $data['test']="test";
				   if( $sess_num == 1 )
				   {
				          //echo "t";
						  $this->load->view('chart_home',$data);
				   }
				   else
				   {
				          redirect('home/logout');
				   }
		}
		
		
	function  province_autocomplete() //ค้นหาชื่อจังหวัีดแบบ auto complete
	{
	
						$prov_name=trim($this->input->get_post('prov_name'));
						$this->db->select('*');
						$this->db->like('prov_name',$prov_name);
						$query=$this->db->get('province');
							
						  if( $query->num_rows() > 0  )
						  {
								 foreach($query->result() as $row)
								 {			
											$prov_id=$row->prov_id;
											$prov_name=$row->prov_name;
											
											
										//	$name=$row->name;
										//	$surname=$row->surname;
										//	$full=$HN." ".$name."  ".$surname;
											
											
											 echo '<li onClick="fill_province(\''.$prov_name.'\',\''.$prov_id.'\');">'.$prov_name.'</li>'; 
								 } 	
						 }
						 
						 	 
//						 else
//						 {
//						 						$this->db->select('*');
//												$this->db->like('HN',$HN);
//												$query=$this->db->get('tb_appendix1');
//												 foreach($query->result() as $row)
//													 {			
//														$id_appendix1=$row->id_appendix1;
//														$HN=$row->HN;
//														$name=$row->name;
//														$surname=$row->surname;
//														$full=$HN." ".$name."  ".$surname;
//														 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
//													 } 	
//						 }	
						 
						  
	
	}
	
	function  search_all() //ค้นหา ทั้งหมดจาก ช่องเดียว HN ชื่อ นามสกุล
	{
	     		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
						
						
						//---------------- HN ---------------------------------------------------------------------------
						//$select=trim($this->input->get_post('select'));
						$HN=trim($this->input->get_post('HN'));
						$this->db->select('*');
						$this->db->like('HN',$HN);
						$query=$this->db->get('tb_appendix1');
							
						  if( $query->num_rows() >= 1  )
						  {
								 foreach($query->result() as $row)
								 {			
											$id_appendix1=$row->id_appendix1;
											$HN=$row->HN;
											$name=$row->name;
											$surname=$row->surname;
											$full=$HN." ".$name."  ".$surname;
											 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
								 } 	
						 }	
						 else//---------------------------- ชื่อ
						 { 
						    $name=trim($this->input->get_post('HN'));
							$this->db->select('*');
							$this->db->like('name',$name);
							$query_name=$this->db->get('tb_appendix1');
						     if( $query_name->num_rows() >= 1 )
							 {
							     foreach($query_name->result() as $row)
								 {		
											$id_appendix1=$row->id_appendix1;
											$HN=$row->HN;
											$name_tb=$row->name;
											$surname=$row->surname;
											$full=$HN." ".$name_tb."  ".$surname;
											echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
								}		
							 }
							 else //นามสกุล
							 {
								$surname=trim($this->input->get_post('HN'));
								$this->db->select('*');
								$this->db->like('surname',$surname);
								$query_name=$this->db->get('tb_appendix1');
								 if( $query_name->num_rows() >= 1 )
								 {
									 foreach($query_name->result() as $row)
									 {		
												$id_appendix1=$row->id_appendix1;
												$HN=$row->HN;
												$name_tb=$row->name;
												$surname=$row->surname;
												$full=$HN." ".$name_tb."  ".$surname;
												echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
									}		
								 }   
							 }

						 }
							 		 
				   }

	}
	
	 function  all_autocomplete_HN()//ค้นหาผู้ป่วยจาก HN จากการกดปุ่ม
		{
		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
						//$select=trim($this->input->get_post('select'));
						$HN=trim($this->input->get_post('HN'));
						$this->db->select('*');
						$this->db->like('HN',$HN);
						$query=$this->db->get('tb_appendix1');
							
						  if( $query->num_rows() > 0  )
						  {
								 foreach($query->result() as $row)
								 {			
											$id_appendix1=$row->id_appendix1;
											$HN=$row->HN;
											$name=$row->name;
											$surname=$row->surname;
											$full=$HN." ".$name."  ".$surname;
											 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
								 } 	
						 }	 
						 else
						 {
						 						$this->db->select('*');
												$this->db->like('HN',$HN);
												$query=$this->db->get('tb_appendix1');
												 foreach($query->result() as $row)
													 {			
														$id_appendix1=$row->id_appendix1;
														$HN=$row->HN;
														$name=$row->name;
														$surname=$row->surname;
														$full=$HN." ".$name."  ".$surname;
														 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
													 } 	
						 }	 
							 
							 		 
				   }
		}

		
		
		function  autocomplete_HN()//ค้นหาผู้ป่วยจาก HN
		{
		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
 						$HN=trim($this->input->get_post('HN'));
						//$select=trim($this->input->get_post('select'));
						
						$this->db->select('*');
						$this->db->like('HN',$HN);
						$query=$this->db->get('tb_appendix1');
						if( $query->num_rows() > 0  )
						{
							 foreach($query->result() as $row)
							 {			
										$id_appendix1=$row->id_appendix1;
										$HN=$row->HN;
										$name=$row->name;
										$surname=$row->surname;
										$full=$HN." ".$name."  ".$surname;
										 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
							 } 			 
						}
				   }
		}
		
		

		function  app_autocomplete_HN()//แสดง HN จาก การค้นหา appendix
		{
		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
 						$HN=trim($this->input->get_post('HN'));
						//$select=trim($this->input->get_post('select'));
						
						$this->db->select('*');
						$this->db->like('HN',$HN);
						$query=$this->db->get('tb_appendix1');
						if( $query->num_rows() > 0  )
						{
							 foreach($query->result() as $row)
							 {			
										$id_appendix1=$row->id_appendix1;
										$HN=$row->HN;
										$name=$row->name;
										$surname=$row->surname;
										$full=$HN." ".$name."  ".$surname;
										$person_id=$row->person_id;
										$ep_no=$row->ep_no;
										$name=$row->name;
										$surname=$row->surname;
										$sex=$row->sex;
										$zipcode=$row->zipcode;
										$address=$row->address;
										$telephone=$row->telephone;
										
										$birthdate_tb=$row->birthdate;
										
										//echo  $age=$row->age;
										
										
										 //----------------------- วัน  เดือน ปี เกิด
										 
										
										 
											
									     //----------------------- วัน  เดือน ปี เกิด 		
										
										 
										
										 
										//------- คำนวณอายุ
										
										  //$cal_age=0;
										
										 if(  $HN !=  ''  )
										{
										    $d=$this->db->get_where('02-diagnosis',array('HN'=>$HN));
										    $num_d=$d->num_rows();
											
											
											  if(   $num_d  > 0 )
											    {
														foreach($d->result() as $row)
														{
																	 @$d_tb=$row->Diagnosis;
														}
										      }
											  else
											  {
											       $d_tb='';
											  }
											  
											
										}
										
										
										//fill_(thisValue,c_id,person_id,ep_no,name,surname,sex,zipcode,address,telephone,birthdate,age,diagnosis)
											if(  $birthdate_tb  != ''   )
											{
													 $ex=explode('-',$birthdate_tb);
											 		 $conv_y=$ex[0]+543;
													 @$cal_age=date('Y')-$ex[0];  //คำนวณอายุของผู้ป่วย
											}

					
					
					
					   echo '<li onClick="fill_(\''.$HN.'\',\''.$id_appendix1.'\',\''.$person_id.'\',\''.$ep_no.'\',\''.$name.'\',\''.$surname.'\',\''.$sex.'\',\''.$zipcode.'\',\''.$address.'\',\''.$telephone.'\',\''.@$cal_age.'\',\''.@$d_tb.'\');">'.$full.'</li>'; 
							
							 } 
						 
 
							 			 
						}
				   }
		}
		
		
		
		function  autocomplete_name()//ค้นหาผู้ป่วยจาก ชื่อ
		{
		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
 						$name=trim($this->input->get_post('name'));
						//$select=trim($this->input->get_post('select'));
						
						$this->db->select('*');
						$this->db->like('name',$name);
						$query=$this->db->get('tb_appendix1');
						if( $query->num_rows() > 0  )
						{
							 foreach($query->result() as $row)
							 {			
										$id_appendix1=$row->id_appendix1;
										$HN=$row->HN;
										$name=$row->name;
										$surname=$row->surname;
										$full=$HN." ".$name."  ".$surname;
										 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
							 } 			 
						}
				   }
		}
		
		
		function  autocomplete_lastname()//ค้นหาผู้ป่วยจาก นามสกุล
		{
		     $sess_num = $this->session->userdata('sess_num'); 
			 	 if( $sess_num == 1 )
				   {
 						$lastname=trim($this->input->get_post('lastname'));
						//$select=trim($this->input->get_post('select'));
						$this->db->select('*');
						$this->db->like('surname',$lastname);
						$query=$this->db->get('tb_appendix1');
						if( $query->num_rows() > 0  )
						{
							 foreach($query->result() as $row)
							 {			
										$id_appendix1=$row->id_appendix1;
										$HN=$row->HN;
										$name=$row->name;
										$surname=$row->surname;
										$full=$HN." ".$name."  ".$surname;
										 echo '<li onClick="fill(\''.$HN.'\',\''.$id_appendix1.'\');">'.$full.'</li>'; 
							 } 			 
						}
				   }
		}
		
		
		
		function  load_progress_note()//โหลด progress note สำหรับ appendix 2 ใน  2.2
		{
		    
			  	$HN=trim($this->input->get_post('HN'));
					 if( $HN != ''  )
					 {
						 $this->db->select('*');
						 $this->db->join('user','progress.From=user.UserCode');
						 $data['progress_tb']=$this->db->get_where('progress',array('HN'=>$HN));
						 $this->load->view('sub_app2/progress_note',$data);
					 } 	 
		
		}
		

  }
?>
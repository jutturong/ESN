<?=ob_start()?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class  Epi extends Controller {
         
						public function  __construct()
							   {
							  parent::Controller();
							  $this->load->helper('url');
							  $this->load->helper('test');
							  $this->load->helper('form');
							  
							//  $this->load->helper('gen_string');
							  
							  $this->load->library('session');
							//  $this->load->model('Model_logout');
							//  $this->load->model('epi_select');
							  
							 // $this->load->library('db_query');
							  
							 //  $this->load->model('epiquery');
							  
							  //  $this->load->model('loginmodels');
								
							   $CI =& get_instance();  //การใช้ CI
							 //  $CI->load->helper('gen_string');

							   }

			   function  ck_login()  //ใช้ check การ login ของระบบ
				{
							  //return    $this->check_login= "t";
						    return     $this->check_login=$this->loginmodels->session_login();
			   }
			   function  logout()
			   {
			                return     redirect('home/index');
			   }		 
							   
							   
	function  auto_epi() //ค้นหาค่าใน epilepsy clinic ย่อยใน tab
	{
/*
					   echo '<li onClick="fill_(\''.$HN.'\',\''.$id_appendix1.'\',\''.$person_id.'\',\''.$ep_no.'\',\''.$name.'\',\''.$surname.'\',\''.$sex.'\',\''.$zipcode.'\',\''.$address.'\',\''.$telephone.'\',\''.@$cal_age.'\',\''.@$d_tb.'\');">'.$full.'</li>'; 
	*/
	               $HN=trim($this->input->get_post('HN'));
				   
					    $query1="select   distinct monitoring_04.HN,tb_appendix1.`name`,tb_appendix1.`surname` from   `monitoring_04`  
		 left   join  `tb_appendix1`   on   `monitoring_04`.HN=`tb_appendix1`.HN 
		     where  
                     `monitoring_04`.HN  like('%$HN%')  and
			           monitoring_04.`Clinic`   like('%Epilepsy C%')   
					   order  by    monitoring_04.`MonitoringDate` desc   limit 0,30 ";
					   
					   
//					     select   distinct (monitoring_04.HN),tb_appendix1.`name`,tb_appendix1.`surname` from   `monitoring_04`  
//		 left   join  `tb_appendix1`   on   `monitoring_04`.HN=`tb_appendix1`.HN 
//		     where  
//                       `monitoring_04`.HN  like('%ha%')  and
//			            monitoring_04.`Clinic`   like('%Epilepsy C%')   
//        order  by    monitoring_04.`MonitoringDate` desc   limit 0,30   
				   
					   
					   
										   
//HN ='AL4286'  ที่ใช้้สำหรับทดสอบ
/*										
$query1="SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  HN ='$HN'
and  Lab=64 
ORDER BY `monitoring_04`.MonitoringDate DESC  
limit 0,1 ";  
*/										   
										   
						  $quryHN1=$this->db->query($query1);
						  foreach($quryHN1->result() as $row)
						  {
									 $name_tb=$row->name;
									  $HN_tb=$row->HN;
									  //$value_tb=$row->Value;
									 // $value_tb=1;
									  $surname_tb=$row->surname;
									  //echo '<li onClick="fill_ep(\''.$HN_tb.'\',\''.$value_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									 echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									//echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
						 
	
	}	//end function  


##============================ TDM  auto complete=====================================
	function  auto_tdm() //ค้นหาค่าใน epilepsy clinic ย่อยใน tab
	{
	               $HN=trim($this->input->get_post('HN'));

/*				   
					    $query1="select   distinct   13_tdm.HN,tb_appendix1.`name`,tb_appendix1.`surname` from   `13_tdm`  
		 left   join  `tb_appendix1`   on   `13_tdm`.HN=`tb_appendix1`.HN 
		     where  
                     `13_tdm`.HN  like('%$HN%')  
					      limit 0,30 ";
*/

//like('%ac5381%');";		

  $query1="select   13_tdm.HN,`01-demographic`.name,`01-demographic`.surname from  13_tdm   
left  join  `01-demographic`   on  13_tdm.HN=`01-demographic`.HN
where   13_tdm.HN   like ('%$HN%')    limit 0,30 ;";						  
						  
						  
						  $quryHN1=$this->db->query($query1);
						  foreach($quryHN1->result() as $row)
						  {
									 $name_tb=$row->name;
									  $HN_tb=$row->HN;
									  //$value_tb=$row->Value;
									 // $value_tb=1;
									  $surname_tb=$row->surname;
									  //echo '<li onClick="fill_ep(\''.$HN_tb.'\',\''.$value_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									 echo '<li onClick="fill_tdm(\''.$HN_tb.'\');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									//echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
	}	//end function  


//function  query_monitoring($lab,$HN)
//{
// $query1="SELECT *
//FROM `monitoring_04`
//LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
//WHERE Clinic LIKE '%Epilepsy C%'
//and  HN ='$HN'
//and  Lab=$lab
//ORDER BY `monitoring_04`.MonitoringDate DESC
//limit  0,1 
//";  
//			  $query_tb=$this->db->query($query1);
//			   foreach( $query_tb->result() as $row)
//						  {
//								   $MonitoringDate_tb=$row->MonitoringDate;
//									//echo  nbs(2);
//								   $HN_tb=$row->HN;
//									//echo  nbs(2);
//								return   $value_tb=$row->Value;
//									//echo  br(); 
//									 // echo '<li onClick="fill_ep(\''.$HN_tb.'\','.$value_tb.');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
//									// echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
//						 }
//}	
	
	



function  query_monitoring_date($lab,$HN)  //แสดงวันที่
{

     $query1="SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  HN ='$HN'
and  Lab=$lab
ORDER BY `monitoring_04`.MonitoringDate DESC
limit  0,1 
";  


			  $query_tb=$this->db->query($query1);
			   foreach( $query_tb->result() as $row)
						  {
								 return  $MonitoringDate_tb=$row->MonitoringDate;
									//echo  nbs(2);
								   $HN_tb=$row->HN;
									//echo  nbs(2);
								   $value_tb=$row->Value;
									//echo  br(); 
									 // echo '<li onClick="fill_ep(\''.$HN_tb.'\','.$value_tb.');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									// echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
}						   
					   
	
function  query_date_moni4($HN)  //qeury  เพื่อดึง สำหรับ tab  epilepsy
{
           if( $HN != "" )
		   { 
			  $query1="SELECT * from `monitoring_04`
where  `HN` like('%$HN%')  order by   MonitoringDate  desc  limit  0,1   ";
						$query2=$this->db->query($query1);
                         $row=$query2->row_array();
							     $date=$row['MonitoringDate'];
							if( $date != ''  )
							{
							      $ex_date=explode('-',$date);
								 return $ex_date[2].'/'.$ex_date[1].'/'.$ex_date[0];
							}	  
             }
}	


function  query_monitoring($lab,$MonitoringDate,$HN)
{


// $query1="SELECT *
//FROM `monitoring_04`
//LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
//WHERE Clinic LIKE '%Epilepsy C%'
//and  HN ='$HN'
//and  Lab=$lab
//ORDER BY `monitoring_04`.MonitoringDate DESC
//limit  0,1 
//";  


/*
 $query1="SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  `MonitoringDate`=''
and  Lab=$lab
ORDER BY `monitoring_04`.MonitoringDate DESC
";  
*/


 // $query1="select  *  from `monitoring_04`  where  lab='$lab'   and   HN='$HN' and   MonitoringDate='$MonitoringDate';";  //ของเดิมหลังจาก graph ไม่ขึ้น
    $query1="select  *  from `monitoring_04`  where  lab='$lab'   and   HN='$HN' ";
	
	
			  $query_tb=$this->db->query($query1);
		//   $query_tb->num_rows();
			   foreach( $query_tb->result() as $row)
						  {
								  // $MonitoringDate_tb=$row->MonitoringDate;  //**************
									//echo  nbs(2);
								 //  $HN_tb=$row->HN;  //*****************
									//echo  nbs(2);
								return   $value_tb=$row->Value;
									//echo  br(); 
									 // echo '<li onClick="fill_ep(\''.$HN_tb.'\','.$value_tb.');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									// echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
			

                       // $row=$query_tb->row();
						//return    $row->Value;			 
						 
}	//end function

	   
function  query_ep()  //query  Epilepsy  
{
			  // $HN=trim($this->input->get_post('HN'));  //ของเดิม
			   $HN=trim($this->uri->segment(3));
			   $data['HN']=$HN;
			   //$MonitoringDate=trim($this->input->get_post('MonitoringDate'));
			     $MonitoringDate=trim($this->uri->segment(4));  //ของเดิม
			   
/*
	     $query1="SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  HN ='$HN'
and  Lab=64 
ORDER BY `monitoring_04`.MonitoringDate DESC
limit  0,1 
";  
              $query_tb=$this->db->query($query1);
			   foreach( $query_tb->result() as $row)
						  {
								    echo  $MonitoringDate_tb=$row->MonitoringDate;
									echo  nbs(2);
									echo   $HN_tb=$row->HN;
									echo  nbs(2);
									echo   $value_tb=$row->Value;
									echo  br(); 
									 // echo '<li onClick="fill_ep(\''.$HN_tb.'\','.$value_tb.');">'.$HN_tb.'    '.$name_tb.'  '.$surname_tb.'</li>';
									// echo '<li onClick="fill_ep(\''.$HN_tb.'\');">'.$HN_tb.'</li>';
						 }
*/
							//------------------ epilepsy  clinic  
				// select  Duration of Attack:
/*
------ ค่าลดลง ----------
ECli1=Marked Improvement หมายถึง จำนวนครั้งของการชักลดลงมากกว่า 50 % เมื่อเทียบ
กับครั้งที่แล้ว
ECli2=Moderated Improvement หมายถึง จำนวนครั้งของการชักลดลง25-50 % เมื่อเทียบกับ
ครั้งที่แล้ว

ECli3=Same ลดลงหรือเพิ่มขึ้นไม่ถึง 25 %
----- ค่าเพิ่มขึ้น------
ECli4=Worse มีอาการชักเพิ่มขึ้น มากกว่า 25 % เมื่อเทียบกับครั้งที่แล้ว

----- ไม่ลดไม่เพิ่ม เท่าเดิม
ECli5=Seizure free หมายถึง ไม่ชักเลย ต้องเป็น 0
*/				
				
		if (  !empty( $MonitoringDate) )
		{		
						
//==============================================
/*						  $freq_sql="SELECT * from `monitoring_04`
											where  `Lab`=64
											and  HN='DQ6493';";
						  $freq_sql2=$this->db->query($freq_sql);	
						  foreach( $freq_sql2->result() as $row)
						  {
						         $arr['MonitoringDate_tb']=$row->MonitoringDate;
								 $arr['Value']=$row->Value;
								  $data['$ax']= json_encode($arr);	
						  }	
*/						  
//==============================================						
						  
				// 64,66,67,101
				 
				 
				 $data['epi_select']=$this->db->query("SELECT * from   `labcode`      where     `Code`  in('ESev1','ESev2','ESev3');");  //ของเดิม
			
				 $data['value64']=$this->query_monitoring(64,$MonitoringDate,$HN);	//64 = Frequency (time/month) :    //การเรียกค่า funciton ใน function เดียวกัน  //##ของเดิม quey ผิด
			    $data['value66']=$this->query_monitoring(66,$MonitoringDate,$HN);	//การเรียกค่า funciton ใน function เดียวกัน   //##ของเดิม quey ผิด
				
			    $data['date_last_visit']=$this->query_date_moni4($HN);
				
				switch( $data['value66'])
				{
				     case 'ECli1':
					{
					    $data['cr_tran']="Marked Improvement";
					   break;
					}
					 case 'ECli2':
					{
					    $data['cr_tran']="Moderated Improvement";
					   break;
					}
					 case 'ECli3':
					{
					    $data['cr_tran']="Same";
					   break;
					}
					 case 'ECli4':
					{
					    $data['cr_tran']="Worse";
					   break;
					}
              		 case 'ECli5':
					{
					    $data['cr_tran']="Seizure free";
					   break;
					}
				}
				
				//echo  $data['cr_tran'];
				//echo br();
			    $data['value67']=$this->query_monitoring(67,$MonitoringDate,$HN);	//67=Duration of Attack          //การเรียกค่า funciton ใน function เดียวกัน
		        $data['value101']=$this->query_monitoring(101,$MonitoringDate,$HN);	//101=Severity of Attack      //การเรียกค่า funciton ใน function เดียวกัน
				 $this->load->view('update_301255/ep_form',$data);
				 
		}		 
}	


function     demo_ajax_json() // function  ������������������ JSON
        {
                          ?>
                          [
                        "CustomerID":"C001",
                        "Name":"Weerachai Nukitram",
                        "Email":"win.weerachai@thaicreate.com",
                        "CountryCode":"TH",
                        "Budget":"1000000",
                        "Used":"600000"
                        ]
						<?PHP
        }
		
function   test()
{
			?>
							{
							"one": "Singular sensation",
							"two": "Beady little eyes",
							"three": "Little birds pitch by my doorstep"
							}
			<?PHP
}		

		
		
function   get_script()  //ทดสอบการ run script
{
       ?>
				//alert("This JavaScript alert was loaded by AJAX");
                $('#container2').html('test');
        <?PHP        
}		

function   ep_chart2()
{
					//$HN=trim($this->input->get_post('HN'));
						$HN=trim($this->uri->segment(3));
						  $freq_sql="SELECT  Value  from `monitoring_04`
											where  `Lab`=64 
											and  HN   ='$HN'  ;";
						  $freq_sql2=$this->db->query($freq_sql);	
						  foreach( $freq_sql2->result() as $row)
						  {
						       //  $arr['dmy']=$row->MonitoringDate;
								// $arr['val']=$row->Value;
								$arr[] = $row;
							}
						    $jsonresult = json_encode($arr);  // ตัวนี้จะใช้งาน
							echo   $jsonresult ;	
}

function   ep_chart() //แสดง chart
{
						// $HN=trim($this->input->get_post('HN'));
						$HN=trim($this->uri->segment(3));
						 //$HN='ha2815';
						//echo br();
						//DQ6493
						  $freq_sql="SELECT * from `monitoring_04`
											where  `Lab`=64
											and  HN   ='$HN'  ;";
											
											
						  $freq_sql2=$this->db->query($freq_sql);	
						// $num_field=$freq_sql2->num_fields();
						  
						  
						 // $resultArray = array();
						 // $arrCol = array();
						  
						  foreach( $freq_sql2->result() as $row)
						  {
						       //  $arr['dmy']=$row->MonitoringDate;
								// $arr['val']=$row->Value;
								
								$arr[] = $row;
							  
							  //  $arr[]=$row->Value;
												 
								//echo    json_encode($arr);	
								  //echo    json_decode($arr,true);	
								 // echo  json_encode(array('data'=>$arr));
								
								
/*								 for($i=0;$i< $num_field;$i++)
								 {
								     $arrCol[mysql_field_name($freq_sql2,$i)] = $obResult[$i];
								 }
								 array_push($resultArray,$arrCol);
*/								 
								
						  }	
						  
						    $jsonresult = json_encode($arr);  // ตัวนี้จะใช้งาน
						   //echo '({"numrows":"'.$query->num_rows().'","results":'.$jsonresult.'})';
						
						//  echo '({"results":'.$jsonresult.'})';  // ตัวนี้จะใช้งาน
						   echo  $jsonresult;  // ตัวนี้จะใช้งาน 
						   
						   //echo    json_encode($arr);
						   
						//  echo json_encode($resultArray);
						
						
						//  $freq_sql2->free_result();
						// json_encode(one:1, two:2, three:3, four:4, five:5 );
						//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
						//echo  json_encode($json);  
} 														

function     query_eeg() //สำหรับการเรียกหาค่า EEG
{
         //$HN=trim($this->input->get_post('HN'));   //ตัวอย่าง  HN= dd6636  //ของเดิม
		 $HN=trim($this->uri->segment(3));
		if (   $HN != ""   )
		{	


/*
ตัวอย่างการ query       GE1008
SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'
and  Lab=95 
and  HN='GE1008'
ORDER BY `monitoring_04`.MonitoringDate DESC  
*/		       
		        //$data['value101']=$this->query_monitoring(101,$HN);	//101=Severity of Attack      //การเรียกค่า funciton ใน function เดียวกัน
										//eeg_form.php
						//-------- EEG 
						 $datestring = "%d/%m/%Y ";
				         $data['EEG_date']=mdate($datestring);
				         $data['select_EEG']=$this->db->query('select  *  from  eegresult;');
						  $data['value95']=$this->query_monitoring(95,$HN);
				            //  $data['value95']=$this->query_monitoring(95,'GE1008');	//67=Duration of Attack          //การเรียกค่า funciton ใน function เดียวกัน
					         // $data['value95']=2;    //ทดสอบ
			              $this->load->view('update_301255/eeg_form',$data);
	     }			

}	


function  formate_date($date)   // วัน/เดือน/ปี
{
                  //echo  $date_EEG;
				  if(  $date != "" )
				  {
								  $ex=explode('-',$date);
								  $con_y=$ex[0]+543;
								//  return     $ex[2]."/".$ex[1]."/".$ex[0];    //แปลงวันเดือนปีให้อยู่ในรูปแบบเต็ม
								  return     $ex[2]."/".$ex[1]."/".$con_y;    //แปลงวันเดือนปีให้อยู่ในรูปแบบเต็ม
				  }				  
}


function     query_imaging() //สำหรับการเรียกหาค่า EEG
{

/*
query  imaging
96=CT  ดูจาก  LabotaryType
97=MRI  ดูจาก  LabotaryType
100=Not done ดูจาก  LabotaryType

// HN="IE5577"  lab 96  เป็น HN ที่ใช้สำหรับทดสอบ
*/
        // $HN=trim($this->input->get_post('HN'));   //ตัวอย่าง  HN= dd6636 //ของเดิม
	    $HN=trim($this->uri->segment(3));
	    $MonitoringDate=trim($this->uri->segment(4));
		 // $HN="DA6242";
		if (   $HN != ""   )
	{	
		       //echo $HN;
			   //echo br();
		        //$data['value101']=$this->query_monitoring(101,$HN);	//101=Severity of Attack      //การเรียกค่า funciton ใน function เดียวกัน
										//eeg_form.php
  //-----------Imaging 
					  //imagingresult	
					   $data['select_image_lab']=$this->db->query(' select  *  from    `laboratorytype`    where  `LabCode` in(96,97,100);');	 
					   $data['select_image']=$this->db->query('select  *  from  imagingresult;');	   
					
				//	$HN="IE5577";  -->testing
//------------------------ Lab	---การ select ค่า----------------			     						 
	     $data['value96']=$this->query_monitoring(96,$MonitoringDate,$HN);	//96=CT brain         //การเรียกค่า funciton ใน function เดียวกัน
         $data['value97']=$this->query_monitoring(97,$MonitoringDate,$HN);	//97=MRI brain
		 $data['value100']=$this->query_monitoring(100,$MonitoringDate,$HN);	//100=Not done
//--------------------------------------------------				   
				   
				   
				   $date96=$this->query_monitoring_date(96,$MonitoringDate,$HN); 
					
					//IE5577  	ตัวอย่างการ  query  96
					/*    ตัวอย่างการ query 96
					SELECT * FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
 WHERE Clinic LIKE '%Epilepsy C%' 
  and  HN='IE5577'
 and Lab=96 
 ORDER BY `monitoring_04`.MonitoringDate DESC limit 0,1
 */
                        $date96=$this->query_monitoring_date(96,$MonitoringDate,$HN); 
						
						//IE8379    ==>  97
/*						
SELECT * FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
 WHERE Clinic LIKE '%Epilepsy C%' 
and HN='IE8379'
 and Lab=97 
 ORDER BY `monitoring_04`.MonitoringDate DESC limit 0,1						
*/
						    
				       // $data['date_EEG']=$this->formate_date( $date96);  //ของเดิม
					     $data['date_EEG']=$this->formate_date($MonitoringDate);  //ของเดิม
					  // $data['date_EEG']=$MonitoringDate;
					   
				   //formate_date($date)
				   // query_monitoring_date($lab,$HN)
				   
			           $this->load->view('update_301255/imaging_form',$data);
	      }			
}	

function  query_general() //general tab4
{
      // $HN=trim($this->input->get_post('HN'));   //ตัวอย่าง  HN= dd6636
	   $HN=trim($this->uri->segment(3));   //ตัวอย่าง  HN= dd6636
	 	$MonitoringDate=trim($this->uri->segment(4)); 
		/*    ตัวอย่างการ query
		SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'

and  HN='ES8688'
 and  Lab=2
ORDER BY `monitoring_04`.MonitoringDate DESC  
*/
		  //$HN="HB3644";  //--> value1  testing
		  //$MonitoringDate="2010-05-17";  // testing
		//    HN='ES8688'    --> value2
		//HN='ES8688'   -> value3
		//	$HN='HI9850'; ->value4
		//   value5  ไม่มี
		// $HN=GZ3503  ->value6
		//GZ9470  --value7
		//$HN='GZ9470';
		if (   $HN != ""   )
	{	
					 $data['value1']=$this->query_monitoring(1,$MonitoringDate,$HN);	//96=CT brain         //การเรียกค่า funciton ใน function เดียวกัน
					  $data['value2']=$this->query_monitoring(2,$MonitoringDate,$HN);	
					   $data['value3']=$this->query_monitoring(3,$MonitoringDate,$HN);
						 $data['value4']=$this->query_monitoring(4,$MonitoringDate,$HN);
						  $data['value5']=$this->query_monitoring(5,$MonitoringDate,$HN);
							$data['value6']=$this->query_monitoring(6,$MonitoringDate,$HN);	  
							   $data['value7']=$this->query_monitoring(7,$MonitoringDate,$HN);
					   //  $data['value97']=$this->query_monitoring(97,$HN);	//97=MRI brain
						// $data['value100']=$this->query_monitoring(100,$HN);	//100=Not done
					   $this->load->view('update_301255/general_form',$data);
	   }

}

function    query_blood()   //tab5  query   8-22
{
      //  $HN=trim($this->input->get_post('HN'));   //ตัวอย่าง  HN= dd6636
			   $HN=trim($this->uri->segment(3));   //ตัวอย่าง  HN= dd6636
	 		   $MonitoringDate=trim($this->uri->segment(4)); 
		/*
		SELECT *
FROM `monitoring_04`
LEFT JOIN labcode2 ON labcode2.Code = monitoring_04.Lab
WHERE Clinic LIKE '%Epilepsy C%'


 and  Lab=9
ORDER BY `monitoring_04`.MonitoringDate DESC */

		
		// $HN="bq3951";  //  value8     Hb: g/dL
		//  $HN="bq3951";  //value9      Hct :
		       //15  Cell
			  // $HN="FO8290"; //value20
			 // $HN="FO8290";    //value21

				   if (   $HN != ""   )
					{	
										   $data['value8']=$this->query_monitoring(8,$MonitoringDate,$HN);
										   $data['value9']=$this->query_monitoring(9,$MonitoringDate,$HN);
										   $data['value10']=$this->query_monitoring(10,$MonitoringDate,$HN);
										   $data['value11']=$this->query_monitoring(11,$MonitoringDate,$HN);
										   $data['value12']=$this->query_monitoring(12,$MonitoringDate,$HN);
										   $data['value13']=$this->query_monitoring(13,$MonitoringDate,$HN);
										   $data['value14']=$this->query_monitoring(14,$MonitoringDate,$HN);
										   $data['value15']=$this->query_monitoring(15,$MonitoringDate,$HN);
										   $data['value16']=$this->query_monitoring(16,$MonitoringDate,$HN);
											$data['value17']=$this->query_monitoring(17,$MonitoringDate,$HN);
										   $data['value18']=$this->query_monitoring(18,$MonitoringDate,$HN);
										   $data['value19']=$this->query_monitoring(19,$MonitoringDate,$HN);
											$data['value20']=$this->query_monitoring(20,$MonitoringDate,$HN);
											 $data['value21']=$this->query_monitoring(21,$MonitoringDate,$HN);
										   $this->load->view('update_301255/blood_form',$data);
					 }
	 
}														

function   query_chem1()   //chem1    between 23 and 36      ,  chem 2    between 37 and 47 
{
       //$HN=trim($this->input->get_post('HN'));   //ตัวอย่าง  HN= dd6636
	   		   $HN=trim($this->uri->segment(3));   //ตัวอย่าง  HN= dd6636
	 		   $MonitoringDate=trim($this->uri->segment(4)); 

	    //$HN="DS5228";    //value23
		//$HN="FV0822";    //value24
		//$HN="GR4285";     //value25
		//  value26  ไม่มี
		//   $HN="CB5648";     //value27
		//   $HN="CB5648";       //value28
		//$HN="CB5648";       //value29
		
		//  $HN="GR4285";    //value  106 mL/min   ** ตรวจสอบด้วย
				  if (   $HN != ""   )
					{	
								//	$HN="CB5648";      //value  30
										 $data['value23']=$this->query_monitoring(23,$MonitoringDate,$HN);
										$data['value24']=$this->query_monitoring(24,$MonitoringDate,$HN);
										$data['value25']=$this->query_monitoring(25,$MonitoringDate,$HN);
										$data['value26']=$this->query_monitoring(26,$MonitoringDate,$HN);
										$data['value27']=$this->query_monitoring(27,$MonitoringDate,$HN);
										$data['value28']=$this->query_monitoring(28,$MonitoringDate,$HN);
										$data['value29']=$this->query_monitoring(29,$MonitoringDate,$HN);
										$data['value30']=$this->query_monitoring(30,$MonitoringDate,$HN);
										$data['value31']=$this->query_monitoring(31,$MonitoringDate,$HN);
										$data['value32']=$this->query_monitoring(32,$MonitoringDate,$HN);
										  $data['value35']=$this->query_monitoring(35,$MonitoringDate,$HN);
										  	$data['value36']=$this->query_monitoring(36,$MonitoringDate,$HN); 
									  $this->load->view('update_301255/chem1_form',$data);
					}
}	

function   query_chem2()    //chem 2    between 37 and 47   
{
     //  $HN=trim($this->input->get_post('HN'));
	 	   		   $HN=trim($this->uri->segment(3));   //ตัวอย่าง  HN= dd6636
	 		      $MonitoringDate=trim($this->uri->segment(4)); 

	                //   $HN="CL6941";    //value37
					//  $HN="CL6941";  //38
					  //  $HN="CL6941";  //39
						//$HN="FV0822"; //40
						//FV0822    41
						//CL6941    42
						//FB5436    42
						//FV0822    45
						//FV0822   46
						//GR4285  47
						
						
    				  if (   $HN != ""   )
					{	
										 $data['value37']=$this->query_monitoring(37,$MonitoringDate,$HN); 
										$data['value38']=$this->query_monitoring(38,$MonitoringDate,$HN); 
								    	$data['value39']=$this->query_monitoring(39,$MonitoringDate,$HN); 
										$data['value40']=$this->query_monitoring(40,$MonitoringDate,$HN); 
										$data['value41']=$this->query_monitoring(41,$MonitoringDate,$HN); 
										
										$data['value34']=$this->query_monitoring(34,$MonitoringDate,$HN); 
										
											$data['value45']=$this->query_monitoring(45,$MonitoringDate,$HN); 
										$data['value46']=$this->query_monitoring(46,$MonitoringDate,$HN); 
										$data['value47']=$this->query_monitoring(47,$MonitoringDate,$HN);  

										$data['value33']=$this->query_monitoring(33,$MonitoringDate,$HN); 
											$data['value42']=$this->query_monitoring(42,$MonitoringDate,$HN); 
											
												$data['value43']=$this->query_monitoring(43,$MonitoringDate,$HN); 
													$data['value44']=$this->query_monitoring(44,$MonitoringDate,$HN); 
											
									  $this->load->view('update_301255/chem2_form',$data);
					}
}

										
	function  graph_ep() //สำหรับการแสดงผล graph 
	{
	            $HN=trim($this->input->get_post('HN'));
			    $query="SELECT * from 
			                                        `monitoring_04`
								                      where  `Lab`=64
													  and  HN='$HN'
													  ";
				 $data["query1"]=$this->db->query($query);									  
			   $this->load->view('update_301255/ep_graph',$data);
	}
  
	function   drug_load() //โหลดหน้า drug level
	{
				   // echo    $HN=trim($this->input->get_post('HN'));
				   //echo br();
		   	         
			      $HN=trim($this->uri->segment(3));
			      $data['HN']=$HN;
		 		 // echo br();
		              $MonitoringDate=trim($this->uri->segment(4));
			      $data['MonitoringDate']=$MonitoringDate;  //เปลี่ยนค่าการรับแล้วให้เป็น analysis date
			      $data['AnalysisDate']= $MonitoringDate;
					 
			      $revers_date=MY_convert_dmy_thai_tdm($MonitoringDate);
			      $data['revers']=$revers_date;
		         
//		   $sql="	select   *   from  
//                        monitoring_04  
//                        where 
//						HN='$HN'
//						and
//                        Clinic   like('%Epilepsy%')
//                        and
//                        lab in(0,68,69,70,71,83,84);";
						
			 // $sql="select MonitoringDate,`HN`,Lab from  13_tdm   where  HN='$HN' ;";	 //ของเดิม
			  //$HN='AA1129';
			//  $revers_date='12 ก.ย. 2554';
			  
			     $sql="select    *    from  13_tdm   where  HN='$HN'   and    MonitoringDate='$revers_date' ;";			
			//echo br();
			$data['query1']=$this->db->query($sql);	
			//select * from  13_tdm where hn='AA0869'
			//   $data['query1']->num_rows(); //ตรวจสอบการนับจำนวน
		
		
			$drug_select="select  LabCode,Lab 
				from
				laboratorytype
				where  LabCode in(68,69,70,71,83,84);";
			$data['drug_query']=$this->db->query($drug_select);
                        
                        //$this->epi_select->drug_select(68);
			
		/*select * from  13_tdm 
where  
HN='HR7620'
and
ward  like('epi%')
order by   13_tdm.MonitoringDate;	
*/     //test	

##==============เพิ่มเติมของ อ.สุณี=======
//  $sql_drug="select  drug1,drug2,drug3 from tr_therapeutic3";  
  $sql_drug="select  drug1 from tr_therapeutic3";  
    //$this->db->get_where('tr_therapeutic3',array(''));
	$data['query_drug']=$this->db->query($sql_drug);

$data['sess_name']=$this->session->userdata('sess_name');		

            //echo "testing  progress";
##================== load  form  Druog   Progress and Action	
                    //  $drug_query1=$this->db->get_where('13_tdm',array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));	 
                                         //   echo $MonitoringDate;
                                          //  echo br();
				          $convert_dmy  =  dmy_tdm($MonitoringDate);    // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM  เช่น   02 ก.พ. 2552
				          //echo br();
					  //  $drug_query1=$this->db->get_where('13_tdm',array('HN'=>$HN,'MonitoringDate'=>$convert_dmy));	   //ของเดิม  monitorong date
						  $drug_query1=$this->db->get_where('13_tdm',array('HN'=>$HN,'AnalysisDate'=>$convert_dmy));	
						foreach( $drug_query1->result() as  $row)
						{
						             $data['Ward']= $row->Ward;
							           $data['Vd']= $row->Vd;
									   $data['Interpretation']=$row->Interpretation;
									   $data['NB']=$row->NB;
									   $data['Vmax']=$row->Vmax;
									   $data['Lab']=$row->Lab;
                                                                           $data['Ke']=$row->Ke;
                                                                           $data['Cl']=$row->Cl;
                                                                           $data['Assessment']=$row->Assessment;
                                                                           $data['T1div2']=$row->T1div2;
                                                                           $data['T1div2Unit']=$row->T1div2Unit;
                                                                           $data['MonitoringDate']=$row->MonitoringDate;
                                                                           $data['CLUnit']=$row->CLUnit;                                                                           
                                                                           $data['KeUnit']=$row->KeUnit;
                                                                           $data['arr_KeUnit']=array(4=>'hr-1',5=>'day-1');                                                                      
                                                                           
                                                                           $data['T1div2Unit']=$row->T1div2Unit;
                                                                           $data['arr_T1div2Unit']=array(6=>'hr',7=>'day'); 
                                                                           
									  $data['Indication']=$row->Indication;
                                                                          $data['Lab']=$row->Lab;
						}
                                                
                                            //echo $MonitoringDate;
                                           // echo br();
                                                //echo $MonitoringDate;
                                                $dmy_con= dmy_convert1($MonitoringDate);
                                                $query_follup1=$this->db->get_where('11-followup',array('HN'=>$HN,'MonitoringDate'=>$dmy_con));
                                              //  $query_follup1->num_rows();
                                                foreach($query_follup1->result() as $row)
                                                {
                                                    $data['FollowUpDate']=$row->FollowUpDate;
                                                }
			
		    $this->load->view('update_301255/drug_level_form',$data);
	}
	
//##=================== modify  เพิ่มเติมจากพี่เบิ้มที่ไปปรึกษากันมา=================
  function  request_drug() //แสดงรายการจากพี่เบิ้ม
				{
											if(  $this->ck_login()  ==   1    ) 	//1=login
											{
														  //echo "testing";
													  $HN=trim($this->uri->segment(3));	
														  //echo hr();		
														  $drug1=trim($this->uri->segment(4));	
													 //select   HospitalName,OPD,HN  from   `tr_therapeutic3`  where  HN='GB6052' and  drug1 like('%Valproic acid%');
													   $drug1_split= MY_split_space($drug1);
													    $query_txt="select   HospitalName,OPD,HN  from   `tr_therapeutic3`  where  HN='$HN' and  drug1 like('%$drug1_split%');";		
													 	$data['query_drug_tr_therapeutic3']=$this->db->query($query_txt);
														//  $data['query_drug_tr_therapeutic3']->num_rows();  //check  การนับของจำนวน  field  ใน table
														$data['title']=".:: ESN system ::.";
														$this->load->view('update_301255/tb_tr_therapeutic3',$data);
											}
											else
											{
												 // echo "F";
												   $this->logout();
											}			
				
				}
//##================= form  load  ESN======================					
function    old_record_form()  //ดึง form =>  old record ข้อมา ของอุณีที่เพิ่ม
{
											if(  $this->ck_login()  ==   1    ) 	//1=login
											{
                                                     $data['title']=".::  ESN  system  ::.";
													  $data['MonitoringDate']=$this->uri->segment(3);
											$drug_select="select  LabCode,Lab 
											  from
											  laboratorytype
											 where  LabCode in(68,69,70,71,83,84);";
			$data['drug_query']=$this->db->query($drug_select);		



													$this->load->view('update_301255/old_record_form',$data);
											}
											else
											{
												 // echo "F";
												   $this->logout();
											}			
}
function   evalution_form() //ดึง form =>  evalution ข้อมา ของอุณีที่เพิ่ม
{
											if(  $this->ck_login()  ==   1    ) 	//1=login
											{
                                                     $data['title']=".::  ESN  system  ::.";
												      $data['MonitoringDate']=$this->uri->segment(3);
												     $this->load->view('update_301255/evalution_form',$data);
											}
											else
											{
												 // echo "F";
												   $this->logout();
											}			
}
	
	
	function   popup_table()
{
     echo  "testing popup";

}

function  test_popup()
{
    echo "testing";
}
function medication_profile()
{
    $data['title']=".::  ESN  system  ::.";
    $HN=$this->uri->segment(3);
     //echo  br();
    $MonitoringDate=$this->uri->segment(4);
     //echo  br();
    $convert_monitoring=date_medication($MonitoringDate);  //เปลี่ยนรูปแบบให้ตรงกับการ query
    $data['query_treatment']=$this->db->get_where('05-treatment',array('HN'=>$HN)); 
     //echo  br();
    $data['query_treatment']->num_rows();
    $this->load->view('update_301255/medication_profile_form',$data);
   
}

function compliance()// โหลด non compliance
{
$sess_num = $this->session->userdata('sess_num'); 
	       if( $sess_num == 1 )
		   {
		       echo "testing";
		   
		   } 
	       else
		   {
		     	  $id_user=$this->session->userdata('sess_id_user');
				  //$this->Model_logout->online($id_user);
				   redirect('home/index/');
		   }
}

function  load_compliance()  //seg3=HN,seg4=link,seg5=id_div
				{
									if(  $this->ck_login()  ==   1    ) 	//1=login
									{
										   $HN=$this->input->get_post('HN');
										 //  $HN=$this->uri->segment(3);
										  //$HN='HM1643';
										   if (strlen($HN) > 0 )
										   {
												   // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
												  // $query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
												// ตัวอย่างทดสอบ  AA0869
												//  $sql="select MonitoringDate,`HN`,Lab from  13_tdm  where HN='AA0869';;"; //ของเดิม
												
											      	//$HN='AA0869';  //ใ้่้ช้เป็นตัวอย่างสำหรับทดสอบ
													
												  $sql="select    AnalysisDate,MonitoringDate,`HN`,Lab from  13_tdm  where HN='$HN';;";
												  $query=$this->db->query($sql);
												     $check_row=$query->num_rows();
												  
												   if(  $check_row > 0 )
												   {
														    $data['query']= $query;
														   //$data['link']=   base_url().'index.php/epi/query_imaging';   //varible
														  // $data['link']=$this->uri->segment(4); //ของเดิม
														  $data['link']=trim($this->input->get_post('link_'));
														   //$data['id_div']='#load_image_value';  //ของเดิม
														   // $data['id_div']=$this->uri->segment(5);
															 $data['id_div']=trim($this->input->get_post('id_div'));
														   // $this->epiquery->query_HN_table($query,$link,$id_div);
														   $this->load->view('update_301255/log_HN_TDM',$data);
												   }
										   }
									}
									else
									{
										 // echo "F";
										   $this->logout();
									}			
				}//end function
															 
 } //end class
 ?>
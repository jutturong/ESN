<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Image extends CI_Controller {//begin
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
            $this->load->model('imagemodels');
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }  
         public function  loadform_image()
         {
               $sess_num = $this->session->userdata('sess_num');
               $HN=$this->input->get_post('HN');
              // $HN='HU3128';                 
               if(  $sess_num  ==   1    ) 	//1=login
	{
                    $data['title']=$this->title;
                    $data['HN']=$HN;
                    $datestring = "%Y-%m-%d";
                    $data['date_']= mdate($datestring);  
                    
                    /*
                    //เพิ่มเติม 96,97,100  เทียบได้ใน laboratorytype
96=CT brain
97=MRI brain
100=Not done
                     */ 
                     $LabCode_arr=array(96,97,100);
                     $this->db->where_in('LabCode', $LabCode_arr);
                     $data['query_select']=$this->db->get('laboratorytype'); //Lab :
                     //  $data['query_select']->num_rows();
                     
                     $data['query_select2']=$this->db->get('imagingresult');//Imaging Result : 
                     $data['fieldset']=" บันทึกข้อมูล Imaging";
                    
                    $this->load->view('update_301255/image_form2',$data);
               }
             else {
                   redirect('welcome/logout');
                }
         }
         public  function  call_image()  //seg3=HN,seg4=link,seg5=id_div
       {
            $sess_num = $this->session->userdata('sess_num');
           if(  $sess_num  ==   1    ) 	//1=login
	{
	   //$HN=$this->input->get_post('HN');
	   //echo $HN=$this->uri->segment(3);
	  $HN= 'HU3128'; //HN ทดสอบ
	 if (strlen($HN) > 0 )
	  {
	$data['HN']=$HN;											   // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
              $datestring = "%Y-%m-%d";
              //$time = time();
               $data['date_eeg']= mdate($datestring);                                                                                                                                                              $data['title']=$this->title;
/*												   //$query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
      $str="SELECT *                                                                                                                                                                             
    FROM `04-monitoring`
    WHERE Clinic = 'Epilepsy C'
    AND Lab = '95'  AND  HN='".$HN."'   ";
 */ 
  
  /*             
 $str="
select * from  `04-monitoring`  
left join `eegresult` on `04-monitoring`.`Value`=`eegresult`.`Code`
 where `04-monitoring`.Clinic='Epilepsy C' and `04-monitoring`.Lab='95' and  `04-monitoring`.`HN`='".$HN."'";
    $query=$this->db->query($str);
   */
 $str="";              
 ##- eeg result --
$data['query_eeg']=$this->db->query('SELECT *
FROM `eegresult`');
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
														 //  $this->load->view('update_301255/log_HN_monitoring',$data);
                                                                                                                                                                                             $this->load->view('update_301255/eeg_form',$data);
												   }
                                                                                                   else
                                                                                                   {
                                                                                                       echo "ไม่พบ HN ที่ค้นหา";
                                                                                                   }
	     }
	}
	else
             {
										 // echo "F";
										   $this->logout();
             }			
       }//end function
       public function  insert_data() //ข้อมูลที่บันทึกแล้ว
       {
            $sess_num = $this->session->userdata('sess_num');
            if( $sess_num == 1 )
            {
                 $HN=trim($this->uri->segment(3));
                 $data['HN']=$HN;
                 $tb="04-monitoring";
                 $tb_join="laboratorytype";
                 $str_join="04-monitoring.Lab=laboratorytype.LabCode";
                 $data['title']=$this->title;              
                if( !empty($HN) )
                {
                    //(Lab=96,97,100)
                    $data['query_select']=$this->db->get('laboratorytype'); //Lab :
                   
/*  query  LAB  image */

 $str_q96="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=96 and `04-monitoring`.HN='".$HN."'; ";
$query96=$this->db->query($str_q96);
 $check96= $query96->num_rows();
if( $check96 > 0)
{
    $row=$query96->row();
    //echo 
    $data['Lab']=$row->Lab;
      $data['Value']=$row->Value;
}

 $str_q97="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=97 and `04-monitoring`.HN='".$HN."'; ";
$query97=$this->db->query($str_q97);
 $check97= $query97->num_rows();
if( $check97 > 0)
{
    $row=$query97->row();
   // echo $row->Lab;
    $data['Lab']=$row->Lab;
   $data['Value']=$row->Value;
}

 $str_q100="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=97 and `04-monitoring`.HN='".$HN."'; ";
$query100=$this->db->query($str_q100);
 $check100= $query100->num_rows();
if( $check100 > 0)
{
    $row=$query100->row();
    //echo $row->Lab;
    $data['Lab']=$row->Lab;
     $data['Value']=$row->Value;
}
//echo $data['Lab'];
/*  query  LAB  image */



                     //$arr_lab=array(96,97,100);
   $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring` WHERE Lab IN ( 96, 97, 100 ) AND HN='$HN'; ");
         $data['query_dmy']->num_rows();
   //  $data['query_select']=$this->db->get($tb); //Lab :
                     
                     $data['query_select2']=$this->db->get('imagingresult');//Imaging Result : 
                     $data['fieldset']=" บันทึกข้อมูล Imaging";
                     
                    
                    $data['query_eeg']=$this->db->query('SELECT *
FROM `eegresult`');
                    $this->db->order_by('MonitoringDate','DESC');
                   // $this->db->limit(1,0);
                    $qeury=$this->db->get_where($tb,array('HN'=>$HN,'Clinic'=>'Epilepsy C'));
                    //echo $qeury->num_rows();                 
                    $row=$qeury->row();
                       //echo $row->Value;
                      //form_image_DRPs.php
                    
                    
                    /* query select*/
                  $this->db->order_by('MonitoringDate','DESC');
                  
                  
                  $str_query="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND HN = '$HN'
AND Lab =95  limit  0,1   ";
   $q=$this->db->query($str_query); 
   $q->num_rows();
   $row=$q->row();
    $data['MonitoringDate']=$row->MonitoringDate;
   
   $data['tb']=$tb;
    $data['HN_val']=$HN;
    
   // $data['query']=$this->db->get($tb);
  /*  
    $str_query_select="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND HN = '".$HN."'
AND Lab =95";
    */
    
    $str_query_select="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND Lab in(96,97,100)";
   
      $data['query_select']=$this->db->query($str_query_select);
    //  $data['query_select']->num_rows();
    
    $data['select_name']="select_date2"; //ok                                        
    $data['url']= base_url()."index.php/image/query_page/";
                    
                    
                   $this->load->view('update_301255/form_image_DRPs',$data);
                }
            }
            else
            {
                redirect('welcome/logout');
            }
       }//end function
  
        public function  query_page() //ข้อมูลที่บันทึกแล้ว
       {
            $sess_num = $this->session->userdata('sess_num');
            if( $sess_num == 1 )
            {
                 $HN=trim($this->uri->segment(3));
                 $MonitoringDate=trim($this->uri->segment(4));
                // echo br();
                 
                 $data['HN']=$HN;
                 $tb="04-monitoring";
                 $tb_join="laboratorytype";
                 $str_join="04-monitoring.Lab=laboratorytype.LabCode";
                 $data['title']=$this->title;              
                if( !empty($HN) )
                {
                    //(Lab=96,97,100)
                    $data['query_select']=$this->db->get('laboratorytype'); //Lab :
                   
/*  query  LAB  image */

 $str_q96="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=96 and `04-monitoring`.HN='".$HN."' and  `04-monitoring`.MonitoringDate='".$MonitoringDate."'; ";
$query96=$this->db->query($str_q96);
 $check96= $query96->num_rows();
if( $check96 > 0)
{
    $row=$query96->row();
    //echo 
    $data['Lab']=$row->Lab;
      $data['Value']=$row->Value;
}

 $str_q97="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=97 and `04-monitoring`.HN='".$HN."' and  `04-monitoring`.MonitoringDate='".$MonitoringDate."'; ";
$query97=$this->db->query($str_q97);
 $check97= $query97->num_rows();
if( $check97 > 0)
{
    $row=$query97->row();
   // echo $row->Lab;
    $data['Lab']=$row->Lab;
   $data['Value']=$row->Value;
}

 $str_q100="select *  from  `04-monitoring`
left join `laboratorytype` on `04-monitoring`.Lab=`laboratorytype`.`LabCode`
where `04-monitoring`.Lab=97 and `04-monitoring`.HN='".$HN."' and `04-monitoring`.MonitoringDate='".$MonitoringDate."'; ";
$query100=$this->db->query($str_q100);
 $check100= $query100->num_rows();
if( $check100 > 0)
{
    $row=$query100->row();
    //echo $row->Lab;
    $data['Lab']=$row->Lab;
     $data['Value']=$row->Value;
}
//echo $data['Lab'];
/*  query  LAB  image */



                     //$arr_lab=array(96,97,100);
   $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring` WHERE Lab IN ( 96, 97, 100 ) AND HN='$HN'; ");
         $data['query_dmy']->num_rows();
   //  $data['query_select']=$this->db->get($tb); //Lab :
                     
                     $data['query_select2']=$this->db->get('imagingresult');//Imaging Result : 
                     $data['fieldset']=" บันทึกข้อมูล Imaging";
                     
                    
                    $data['query_eeg']=$this->db->query('SELECT *
FROM `eegresult`');
                    $this->db->order_by('MonitoringDate','DESC');
                   // $this->db->limit(1,0);
                    $qeury=$this->db->get_where($tb,array('HN'=>$HN,'Clinic'=>'Epilepsy C'));
                    //echo $qeury->num_rows();                 
                    $row=$qeury->row();
                       //echo $row->Value;
                      //form_image_DRPs.php
                    
                    
                    /* query select*/
                  $this->db->order_by('MonitoringDate','DESC');
                  
                  
                  $str_query="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND HN = '$HN'
AND Lab =95  limit  0,1   ";
   $q=$this->db->query($str_query); 
   $q->num_rows();
   $row=$q->row();
    $data['MonitoringDate']=$row->MonitoringDate;
   
   $data['tb']=$tb;
    $data['HN_val']=$HN;
    
   // $data['query']=$this->db->get($tb);
  /*  
    $str_query_select="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND HN = '".$HN."'
AND Lab =95";
    */
    
    $str_query_select="SELECT *
FROM `04-monitoring`
WHERE `Clinic` = 'Epilepsy C'
AND Lab in(96,97,100)";
   
      $data['query_select']=$this->db->query($str_query_select);
    //  $data['query_select']->num_rows();
    
    $data['select_name']="select_date2"; //ok                                        
    $data['url']= base_url()."index.php/image/query_page/";
                    
                    
                   $this->load->view('update_301255/form_image_DRPs',$data);
                }
            }
            else
            {
                redirect('welcome/logout');
            }
       }//end function
       
  
       
}//end class
?>


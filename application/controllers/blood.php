<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blood extends CI_Controller {//begin
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
            $this->load->model('bloodmodels');
            $this->load->model('imagemodels'); 
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }  
         public function  loadform()
         {
               $sess_num = $this->session->userdata('sess_num');
               $HN=$this->input->get_post('HN');
               $data['HN']=$HN;
              // $HN='HU3128';                 
               if(  $sess_num  ==   1    ) 	//1=login
	{
                    $data['title']=$this->title;
                     
                    
                    $this->load->view('update_301255/blood_form',$data);
               }
             else {
                   redirect('welcome/logout');
                }
         }
         public function  call_data() //Lab(8-22)
         {//begin
               $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	     {
                 $HN=$this->uri->segment(3);
                 //echo br();
             

/*     //ตัดไปอยู่ในส่วน  bloodmodels             
  // and  `Lab` in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)           
$str_q1=" select * from  `04-monitoring`  
 where  HN='".$HN."'
 and `Clinic`='Epilepsy C'
 and  `Lab`=8 
";           
                 $q8=$this->db->query($str_q1);
                 echo $count8= $q8->num_rows();
                 $row=$q8->row();
                if( $count8 > 0)
                {    
                 $data['Lab8']= $row->Value;
                }
                else
                {
                 $data['Lab8']="";                    
                }    
  */
   
                  /*
                  for($i=8;$i<=22;$i++)
                  {
                      echo $this->bloodmodels->query_value($HN,$i);
                      echo br();
                  }
                  */
                 
                 
                 /*
                  8 	2 	Hb
9 	2 	Hct
10 	2 	WBC
11 	2 	Platelet
12 	2 	Blast
13 	2 	Band
14 	2 	Neutrophil
15 	2 	ANC
16 	2 	Lymphocyte
17 	2 	Monocyte
18 	2 	Eosinophil
19 	2 	Basophil
20 	2 	INR
21 	2 	PT
22 	2 	aPTT
                  
                  */
                 
                 
                 
                 $data['Lab8']=$this->bloodmodels->query_value($HN,8);
                //echo br();             
                 $data['Lab9']=$this->bloodmodels->query_value($HN,9);
                //echo br();                 
                $data['Lab10']=$this->bloodmodels->query_value($HN,10); 
                //echo br();   
                 $data['Lab11']=$this->bloodmodels->query_value($HN,11);
                //echo br(); 
                 $data['Lab12']=$this->bloodmodels->query_value($HN,12);
                //echo br();
                 $data['Lab13']=$this->bloodmodels->query_value($HN,13); 
                //echo br();              
                $data['Lab14']=$this->bloodmodels->query_value($HN,14);
                //echo br();  
                 $data['Lab15']=$this->bloodmodels->query_value($HN,15);
                //echo br();  
                $data['Lab16']=$this->bloodmodels->query_value($HN,16); 
                //echo br(); 
                $data['Lab17']=$this->bloodmodels->query_value($HN,17);
                //echo br(); 
                 $data['Lab18']=$this->bloodmodels->query_value($HN,18);
                //echo br(); 
                $data['Lab19']=$this->bloodmodels->query_value($HN,19); 
                //echo br();   
                 $data['Lab20']=$this->bloodmodels->query_value($HN,20);
                //echo br();  
                $data['Lab21']=$this->bloodmodels->query_value($HN,21);
                //echo br(); 
                 $data['Lab22']=$this->bloodmodels->query_value($HN,22); 
                 
                $data['title']=$this->title;
               
                 $data['query_dmy']= $this->db->query("SELECT distinct MonitoringDate FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)  AND HN='$HN'; ");
              
                
                 $data['fieldset']="Blood";
                 $data['HN_val']=$HN;                
                 $data['select_name']="select_date2"; //ok   
                 $data['url']= base_url()."index.php/blood/query_blood/";
                                               
                 $this->load->view('update_301255/blood_form_DRPs',$data);
                                      
                }
             else {
                   redirect('welcome/logout');
                }
         }//end
    public function query_blood()
    {
             $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	{//being
                   $HN=$this->uri->segment(3);
                 //echo br();
                   $MonitoringDate=$this->uri->segment(4);
                 //echo br();
                
               /*    
                $str_blood="select  * from  `04-monitoring`
left join   `tb_appendix1`   
on   `04-monitoring`.HN=`tb_appendix1`.HN
where `04-monitoring`.`Lab` in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)
and `04-monitoring`.`Clinic`='Epilepsy C'  and `04-monitoring`.HN=\"".$HN."\" and  `04-monitoring`.MonitoringDate=\"".$MonitoringDate."\"  ;
";
              echo  $str_blood;
              
              $query=$this->db->query($str_blood);
              echo  $query->num_rows();
              */
                                   
             $data['Lab8']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,8);
              //echo br();
              $data['Lab9']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,9);
              //echo br();
             $data['Lab10']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,10);
              //echo br();
               $data['Lab11']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,11);
              //echo br();
               $data['Lab12']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,12);
              //echo br();
              $data['Lab13']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,13);
              //echo br();
              $data['Lab14']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,14);
              //echo br();
              $data['Lab15']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,15);
              //echo br();            
               $data['Lab16']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,16);
              //echo br();
              $data['Lab17']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,17);
              //echo br();
              $data['Lab18']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,18);
              //echo br();
              $data['Lab19']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,19);
              //echo br();
              $data['Lab20']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,20);
              //echo br();
              $data['Lab21']=$this->bloodmodels->query_dmy_value($HN,$MonitoringDate,21);
              //echo br();
                           
                 $data['title']=$this->title;
                 $data['query_dmy']= $this->db->query("SELECT  distinct MonitoringDate  FROM  `04-monitoring`  WHERE  `Clinic`='Epilepsy C'  and  Lab in(8,9,10,11,12,13,14,15,16,17,18,19,20,21,22)  AND HN='".$HN."' ; ");
                 $data['HN_val']=$HN;
                 $data['select_name']="select_date2"; //ok   
                 $data['url']= base_url()."index.php/blood/query_blood/";
                                               
                 $this->load->view('update_301255/blood_form_DRPs',$data);
              
             }//end
             else 
                {
                   redirect('welcome/logout');
                }
    }
}//end class
?>
            



<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chem1 extends CI_Controller {//begin
    var  $title="ESN system  คลินึกโรคลมชัก";   
    public function __construct()
       {
            parent::__construct();        
            $this->load->helper('url'); //autoload 	
	  $this->load->helper('form'); //autoload
	 $this->load->helper('gen_string');
             $this->load->library('session'); //autoload
	  $this->load->helper('html'); //autoload	
	// $this->load->model('Model_logout'); //#bug error
            // $this->load->library('db_query');
            $this->load->database();
           // $this->load->model('loginmodels');
            $this->load->model('epiquerymodel');
            $this->load->helper('date');
            $this->load->model('chemmodels');
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
              // $HN='HU3128';                 
               if(  $sess_num  ==   1    ) 	//1=login
	{
                    $data['title']=$this->title;
                    $data['HN']=$HN;    
                    
                    
                     $dmy_app1=$this->epiquerymodel->query_appendix1($HN); //ดึง วัน เดือน ปี appendix1
                   $data['sex']=$this->epiquerymodel->query_query_app1_mo2($HN,'Sex'); //เพศของผู้ป่วยจะเอาไปคำนวณ
                   /*CLCl = 1.23x BW x (140-อายุ) แล้วทั้งหมดหารด้วย SCr เป็นสูตรของผู้ชาย  อยู่ใน chem1/call_data=>HD1815
สูตรผู้หญิง = เหมือนของผู้ชายแต่คูณด้วย 0.85 */
                     $data['count_year']=cal_year($dmy_app1);
                   $data['BW']=56; //ค่านี้กำหนดขึ้นมาเพื่อแค่ทดสอบ
                    
                    $this->load->view('update_301255/chem1_form',$data);
               }
             else {
                   redirect('welcome/logout');
                }
         }
         
          public function  call_data() //Lab(23-36)
         {//begin
               $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	{
                   $HN=$this->uri->segment(3);
                    // echo br();  
                   //ตัวอย่างทดสอบ HD1815
                   /*
                      $str1="select * from  `04-monitoring`  
                            where  
                           `Lab`   between 23 and 63
                            and `Clinic`='Epilepsy C'
                            and  HN='".$HN."';
";
                        $q=$this->db->query($str1);
                       // echo br();
                        echo   $q->num_rows();                  
                    */
                 
                   /*
                   for($i=23;$i<=36;$i++)
                   {
                        $str="select * from  `04-monitoring`  
                            where  
                                         `Lab` =".$i."
                            and `Clinic`='Epilepsy C'
                            and  HN='".$HN."'";
                        
                      $q=$this->db->query($str);
                       echo br();
                       echo   $q->num_rows(); 
                   }  
                    
                    */ 
                   
                   $dmy_app1=$this->epiquerymodel->query_appendix1($HN); //ดึง วัน เดือน ปี appendix1
                   $data['sex']=$this->epiquerymodel->query_query_app1_mo2($HN,'Sex'); //เพศของผู้ป่วยจะเอาไปคำนวณ
                   /*CLCl = 1.23x BW x (140-อายุ) แล้วทั้งหมดหารด้วย SCr เป็นสูตรของผู้ชาย  อยู่ใน chem1/call_data=>HD1815
สูตรผู้หญิง = เหมือนของผู้ชายแต่คูณด้วย 0.85 */
                     $data['count_year']=cal_year($dmy_app1);
                   $data['BW']=56; //ค่านี้กำหนดขึ้นมาเพื่อแค่ทดสอบ
                   
                 
                   
                   //Lab(23-36)    
                   //$name="Lab";
                   for($i=23;$i<=36;$i++)
                   {
                        $name = "Lab".$i;
                       // echo $name;
                       // echo br();
                  $data[$name]=$this->chemmodels->query_chem1($i,$HN);
                 //echo  br();
                   // echo  $data['24']=$this->chemmodels->query_chem1(24,$HN);
                  // echo  br();
                   }
                   $data['title']=$this->title;
                   
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab between 23 and 36  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem1/query_general/";

                    $data['fieldset']="Chem1";
                           
                   $this->load->view('update_301255/chem1_form_DRPs',$data);
                
              }
              else
              {
                   redirect('welcome/logout');
              }
         }//end function
    public  function query_general()
    {
         $sess_num = $this->session->userdata('sess_num');
             if(  $sess_num  ==   1    ) 	//1=login
	{
                     $HN=$this->uri->segment(3);
                   //  echo br();
                     $MonitoringDate=$this->uri->segment(4);
                    // echo br(); 
                 // and  MonitoringDate='".$MonitoringDate."'    
               
             //  echo   $this->chemmodels->query_chem1_dmy(23,$HN,$MonitoringDate); 
                  for($i=23;$i<=36;$i++)
                   {
                        $name = "Lab".$i;
                        $data[$name]=$this->chemmodels->query_chem1_dmy($i,$HN,$MonitoringDate); 
                 //echo  br();
                   }    
                    $data['title']=$this->title;                 
                    $data['query_dmy']= $this->db->query("SELECT distinct  MonitoringDate  FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab between 23 and 36  AND HN='$HN'; ");
                    $data['HN_val']=$HN;
                    $data['select_name']="select_date2"; //ok   
                    $data['url']= base_url()."index.php/chem1/query_general/";

                           
                   $this->load->view('update_301255/chem1_form_DRPs',$data);
                 
             }
              else
              {
                   redirect('welcome/logout');
              }
    }
}//end class
?>
            




<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General extends CI_Controller {//begin
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
         public function  loadform()
         {
               $sess_num = $this->session->userdata('sess_num');
               $HN=$this->input->get_post('HN');
               $data['HN']=$HN;
              // $HN='HU3128';                 
               if(  $sess_num  ==   1    ) 	//1=login
	{
                    $data['title']=$this->title;
                     
                    
                    $this->load->view('update_301255/general_form',$data);
               }
             else {
                   redirect('welcome/logout');
                }
         }
         public function  call_data()
         {
               $sess_num = $this->session->userdata('sess_num');
               $HN=$this->uri->segment(3);
               $data['HN_val']=$HN;
              // $HN='HZ8167';   //HN ทดสอบ     
              $tb="04-monitoring";
               if(  $sess_num  ==   1    ) 	//1=login+
               {
                   //$this->db->order_by('MonitoringDate','DESC');
                 /*
                   // $this->db->limit(0,1);
                   for($i=1;$i<=7;$i++)
                   {
                  // $q=$this->db->get_where($tb,array('HN'=>$HN,'Lab'=>$i,'Clinic'=>'Epilepsy C'));
                       
                      $check= $q->num_rows();
                       if( $check > 0 )
                       {
                           //echo $check;
                           //echo br();
                           $row=$q->row();
                           echo $row->Lab;
                           echo br();
                       } 
                   } 
                  */ 
                 
                   $this->db->order_by('MonitoringDate','DESC');   
           //  for($i=1;$i<=7;$i++)
            // {
                 //1=Weight
                   
                   /*
                   $str_q1="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(1)   LIMIT 0,7;";  
                   */
                   
                   $str_q1="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(1) ;";
                   
                   $q1=$this->db->query($str_q1);
                   //$this->db->limit(1,0);
                   $check1= $q1->num_rows();
                   //echo br();
                   if(   $check1 > 0 )
                   {
                       $row1=$q1->row();
                       $data['Lab1']=$row1->Lab;
                       
                   }
                   
                  //2=Height
                   /*
                   $str_q2="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(2)   LIMIT 0,7;"; 
                   */
                   
                   $str_q2="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(2) ;";
                   
                   $q2=$this->db->query($str_q2);
                   $check2= $q2->num_rows();
                   // echo br();
                    if(   $check2 > 0 )
                   {
                       $row2=$q2->row();
                      // $data['Lab2']=$row2->Lab;
                        $data['Lab2']=$row2->Value;
                   }
                   
                    //3=BSA
                   /*
                   $str_q3="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(3)   LIMIT 0,7;";  
                   */
                 
                   $str_q3="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(3) ;";
                   
                   $q3=$this->db->query($str_q3);
                   $check3= $q3->num_rows();
                    //echo br();   
                   if(   $check3 > 0 )
                   {
                       $row3=$q3->row();
                        //$data['Lab3']=$row3->Lab;
                       $data['Lab3']=$row3->Value;
                   }
                    
                   //4=Body Temperature
                   /*
                    $str_q4="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(4)   LIMIT 0,7;";               
                  */
                    $str_q4="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(4) ;";
                 //echo br();
                 
                  $q4=$this->db->query($str_q4);
                   $check4= $q4->num_rows();
                 //echo br(); 
                     if(   $check4 > 0 )
                   {
                       $row4=$q4->row();
                      // $data['Lab4']=$row4->Lab;   
                       $data['Lab4']=$row4->Value;  
                       
                   }
                    
                    //5=Respiratory Rate
                   /*
                                        $str_q5="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(5)   LIMIT 0,7;";   
                     */
                   
                     $str_q5="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(5) ;";
                     
                   $q5=$this->db->query($str_q5);
                   $check5= $q5->num_rows();
                    //echo br(); 
                     if(   $check5 > 0 )
                   {
                       $row5=$q5->row();
                     //echo   $data['Lab5']=$row5->Lab;
                          $data['Lab5']=$row5->Value;
                       
                   }
                                        //6=Respiratory Rate
                   
                   /*
                   $str_q6="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(6)   LIMIT 0,7;";   
                   */
                   
                   
                   $str_q6="select * from  `04-monitoring`  where  `HN`='".$HN."'  and  `Clinic`='Epilepsy C'  and   `Lab` in(6) ;";
                   
                   $q6=$this->db->query($str_q6);
                   $check6= $q6->num_rows();
                   // echo br(); 
                         if(   $check6 > 0 )
                   {
                       $row6=$q6->row();
                       //echo $data['Lab6']=$row6->Lab;
                        $data['Lab6']=$row6->Value;
                       //echo br();  
                   }
                                                            //7=Blood Pressure
                   $str_q7="select * from  `04-monitoring`  left join  `laboratorytype`
on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
where 
`04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and   `04-monitoring`.`Lab` in(7)   LIMIT 0,7;";               
                   $q7=$this->db->query($str_q7);
                   $check7= $q7->num_rows();
                 
                     if(   $check7 > 0 )
                   {
                       $row7=$q6->row();
                       $data['Lab7']=$row7->Lab;
                       
                   }
                   
                          $data['title']=$this->title;
                          $data['fieldset']="General";
                          
                           //## query dmy
                          //$select_name,$HN_val,$query_dmy,$url
                           $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab IN ( 1,2,3,4,5,6,7) AND HN='$HN'; ");
                          // echo  $data['query_dmy']->num_rows();
                           $data['select_name']="select_date2"; //ok   
                           $data['url']= base_url()."index.php/general/query_general/";
                                                  
                           $this->load->view('update_301255/form_general_DRPs',$data);
                                                             
               }
                else {
                   redirect('welcome/logout');
                }
         }
         
public function query_general()
{
    $sess_num = $this->session->userdata('sess_num');
     //   $tb="04-monitoring";
       if(  $sess_num  ==   1    ) 	
               {
                  $HN=$this->uri->segment(3);
                  $data['HN_val']=$HN;
                  $MonitoringDate=$this->uri->segment(4);
                 //echo br();
                 $data['MonitoringDate']=$MonitoringDate;
                 
               
                 
                 $str_q1="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(1)  ";               
                  $q1=$this->db->query($str_q1);
                  $check1_=$q1->num_rows();
                   //echo br();
                    if( $check1_  > 0 )
                    {   
                        $row=$q->row();
                         $data['Lab1']= $row->Lab;
                    }
                    
                 $str_q2="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(2)  ";               
                  $q2=$this->db->query($str_q2);
                  $check2_=$q2->num_rows();
                  // echo br();
                    if( $check2_  > 0 )
                    {   
                        $row=$q2->row();
                          $data['Lab2']=$row->Lab;
                    }
                    
                     $str_q3="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(3)  ";               
                  $q3=$this->db->query($str_q3);
                  $check3_=$q3->num_rows();
                   //echo br();
                    if( $check3_  > 0 )
                    {   
                        $row=$q3->row();
                         $data['Lab3']=$row->Lab;
                    }
                     
                    
                    $str_q4="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(4)  ";               
                  $q4=$this->db->query($str_q4);
                  $check4_=$q4->num_rows();
                   //echo br();
                    if( $check4_  > 0 )
                    {   
                        $row=$q4->row();
                         $data['Lab4']=$row->Lab;
                    }
                    
                    $str_q5="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(5)  ";               
                  $q5=$this->db->query($str_q5);
                  $check5_=$q5->num_rows();
                // echo br();  
                    if( $check5_  > 0 )
                    {   
                        $row=$q5->row();
                         $data['Lab5']= $row->Lab;
                    }
                    
                    $str_q6="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(6)  ";               
                  $q6=$this->db->query($str_q6);
                   $check6_=$q6->num_rows();
                   //echo br();
                    if( $check6_  > 0 )
                    {   
                        $row=$q6->row();
                        $data['Lab6']= $row->Lab;
                    }
                    
                  $str_q7="select * from  `04-monitoring`  left join  `laboratorytype`
                 on `04-monitoring`.Lab=`laboratorytype`.`LabGroup`
                 where 
                 `04-monitoring`.`HN`='".$HN."'  and  `04-monitoring`.`Clinic`='Epilepsy C'  and  `04-monitoring`.`MonitoringDate`='".$MonitoringDate."' and   `04-monitoring`.`Lab` in(7)  ";               
                  $q7=$this->db->query($str_q7);
                 $check7_=$q7->num_rows();
                  // echo br();
                    if( $check7_  > 0 )
                    {   
                        $row=$q7->row();
                        $data['Lab7']= $row->Lab;
                    }
                    
                   
                    
                    $data['title']=$this->title;
                          $data['fieldset']="General";
                          
                           //## query dmy
                          //$select_name,$HN_val,$query_dmy,$url
                           $data['query_dmy']= $this->db->query("SELECT * FROM `04-monitoring`   WHERE  `Clinic`='Epilepsy C'  and  Lab IN ( 1,2,3,4,5,6,7) AND HN='$HN'; ");
                          // echo  $data['query_dmy']->num_rows();
                           $data['select_name']="select_date2"; //ok   
                           $data['url']= base_url()."index.php/general/query_general/";
                          
                          $this->load->view('update_301255/form_general_DRPs',$data);
                  
               } 
      else
      {
          redirect('welcome/logout');
      }
}//end function


}//end class
?>
            

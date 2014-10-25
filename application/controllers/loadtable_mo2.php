<?PHP  ob_start(); ?>
<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loadtable_mo2 extends CI_Controller {
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
       }
        public function test2()
         {
             echo "tesging 2 fucntion";
         }
public function  load_form_noncompliance_blank()//แสดงหน้า form  non compliance จากการกด click
{//begin function
   // echo "testing";
     $sess_num = $this->session->userdata('sess_num');
    if( $sess_num == 1 )
    {
	  $HN=$this->uri->segment(3);
	 $data['HN']=$this->uri->segment(3);
	 // $MonitoringDate=$this->uri->segment(4);
	//  $data['MonitoringDate']=$this->uri->segment(4); 
              $data['fieldset']='Non Compliance';		
                $this->load->view('update_301255/form_non_compliance',$data); //ปรับปรุงใหม่
    }
    else
    {
        redirect('welcome/index');
    }
}//end function
         public function  load_epi()
				{
							if(  $this->ck_login()  ==   1    ) 	//1=login
							{
								  // $HN=$this->input->get_post('HN');
								   $HN=$this->uri->segment(3);
								  //$HN='HM1643';
								   
								   if (strlen($HN) > 0 )
								   {
										 // $data['alius_pic']=   $link_anchor_popup.''.$data['data_new_picture']; 
										   // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
										   $query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
										   $check_row=$query->num_rows();
										   if(  $check_row > 0 )
										   {
												   $data['query']= $query;
												   //$data['link']=   base_url().'index.php/epi/query_ep';  
												   $this->load->view('update_301255/log_epi',$data);
										   }
								   }
							}
							else
							{
							     // echo "F";
								   $this->logout();
							}			
				}//end function

//=====================2= tab EEG==============================			
			public	function  load_eeg()
				{
							if(  $this->ck_login()  ==   1    ) 	//1=login
							{
								  // $HN=$this->input->get_post('HN');
								   $HN=$this->uri->segment(3);
								  //$HN='HM1643';
								   if (strlen($HN) > 0 )
								   {
								           // select * from   `monitoring_04`  where  HN='HM1643' order by `MonitoringDate` desc; 
										   $query=$this->db->get_where('monitoring_04',array('HN'=>$HN));
										   $check_row=$query->num_rows();
										   if(  $check_row > 0 )
										   {
												   $data['query']= $query;
												   $data['link']=   base_url().'index.php/epi/query_eeg';  
												   $data['id_div']='#load_eeg_value';
												   // $this->epiquery->query_HN_table($query,$link,$id_div);
												   $this->load->view('update_301255/log_HN_monitoring',$data);
										   }
								   }
							}
							else
							{
							     // echo "F";
								   $this->logout();
							}			
				}//end function
                                
 public function  load_view_noncompliance_mo1() //load form view non_compliance
{//begin function
       $sess_num = $this->session->userdata('sess_num');
     if(   $sess_num == 1  )
     {
         // ทดสอบใช้  HN = Ab0762           
         $HN=$this->uri->segment(3);
	       $data['HN']=$this->uri->segment(3);
	       // $MonitoringDate=$this->uri->segment(4);
	       // $data['MonitoringDate']=$this->uri->segment(4);
				    
		        $data['title']=$this->title;
                                    //$this->title=$this->title;
		       $data['fieldset']='B.Identify DRPs (Non Compliance) History';
                                    //$this->fieldset='Non Compliance';
		       
                                    $data['tb']="07-noncompliance"; 
                                    $data['name']=$this->session->userdata('sess_name');
                                    $data['select_name']="select_date";
                                    if( !empty($HN)  )
                                    {
                                        //echo "testing";
                                        // $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                       //echo $this->db->count_all($tb);  
                                       $this->db->limit(1);
                                       $this->db->order_by("MonitoringDate", "desc"); 
                                       $tb="07-noncompliance";
                                       $query=$this->db->get_where($tb,array('HN'=>$HN));
                                       $check = $query->num_rows();
                                       if( $check > 0 )
                                       {//begin if      
                                        $row=$query->row();
                                       ##-- query-----                                          
                                           $data['MonitoringDate']=$row->MonitoringDate;
                                           
                                            $data['DRPselection1']=$row->DRPselection1; //Non Compliance Type
                                           //echo br();
                                           
                                            $data['PercentNonCompliance']=$row->PercentNonCompliance;//ร้อยละความไม่ร่วมมือ
                                            $data['Preparation']=$row->IncorrectedTechnique1; //Preparation 
                                           //echo br();
                                            $data['Inhalation']=$row-> IncorrectedTechnique2; //Inhalation
                                           //echo br();
                                            $data['Rinse']=$row->IncorrectedTechnique3; //Rinse 
                                           //echo br();
                                            $data['Emptytest']=$row->IncorrectedTechnique4;//Empty test
                                           //echo br(); 
                                           
                                            $data['NonComplianceDetail1']=$row->NonComplianceDetail1; //IncorrectedTechnique1
                                            $data['Action1']=$row->Action1;//1=prevent,2=correct
                                            
                                            //--## Intervention--
                                           $data['InterventionPT1_1']=$row->InterventionPT1_1;  //0,1 //Adjust for appropriate therapy due to health system
                                           $data['InterventionPT1_2']=$row->InterventionPT1_2; //Correct technique of administration
                                            $data['InterventionPT1_3']=$row->InterventionPT1_3; //Improve compliance
                                            $data['InterventionPT1_4']=$row->InterventionPT1_4; //Inform drug relate problems 
                                            $data['InterventionPT1_5']=$row->InterventionPT1_5; //Life style modification 
                                            $data['InterventionPT1_6']=$row->InterventionPT1_6; //Monitor efficacy and toxicity 
                                            $data['InterventionPT1_7']=$row->InterventionPT1_7; //Prevention of Adverse drug reaction
                                            
                                            $data['InterventionDoctor1_1']=$row->InterventionDoctor1_1; //Add new medication  
                                            $data['InterventionDoctor1_2']=$row->InterventionDoctor1_2; //Adjust dosage regimen 
                                            $data['InterventionDoctor1_3']=$row->InterventionDoctor1_3; //Confirm prescription 
                                            $data['InterventionDoctor1_4']=$row->InterventionDoctor1_4; //Discontinue medication 
                                            $data['InterventionDoctor1_5']=$row->InterventionDoctor1_5; //Inform drug related problems 
                                            $data['InterventionDoctor1_6']=$row->InterventionDoctor1_6; //Suggest changing medication
                                            $data['InterventionDoctor1_7']=$row->InterventionDoctor1_7; //Suggest laboratory 
                                           
                                            //## Response
                                            //1=Resolved ,2=Improved,3=Not Improved,4=N/A 
                                           $data['Response1']=$row->Response1;
                                            $data['ResponseDetail1']=$row->ResponseDetail1;
                                            //##Cause ผลการเลือกมี Yes,No
                                            $data['Cause1_1']=$row->Cause1_1;//สาเหตุจากตัวผู้ป่วย
                                            $data['Cause1_2']=$row->Cause1_2;//สาเหตุจากโรค
                                            $data['Cause1_3']=$row->Cause1_3;//สาเหตุจากยา 
                                            $data['Cause1_4']=$row->Cause1_4;//สาเหตุจากผู้ดูแล
                                            $data['Cause1_5']=$row->Cause1_5;//สาเหตุอื่นๆ 
                                           
                                            $this->load->view('update_301255/form_non_compliance_DRPs',$data);
                                       }//end if 
                                       else
                                       {//begin else
                                            echo"------->Empty Data!!<----------";
                                       }//end else
                                    }
     }
     else
     {
         redirect('welcome/index');       
     }
     
 }//end function

 public function  load_view_noncompliance_mo2() //load form view non_compliance
{//begin function
       $sess_num = $this->session->userdata('sess_num');
     if(   $sess_num == 1  )
     {
         // ทดสอบใช้  HN = Ab0762           
         $HN=$this->uri->segment(3);
	       $data['HN']=$this->uri->segment(3);
	        $MonitoringDate=$this->uri->segment(4);
	        $data['MonitoringDate']=$this->uri->segment(4);
				    
		        $data['title']=$this->title;
                                    //$this->title=$this->title;
		       $data['fieldset']='Non Compliance';
                                    //$this->fieldset='Non Compliance';
		       
                                    $data['tb']="07-noncompliance"; 
                                    $data['name']=$this->session->userdata('sess_name');
                                    $data['select_name']="select_date";
                                    if( !empty($HN)  )
                                    {
                                        //echo "testing";
                                        // $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                       //echo $this->db->count_all($tb);  
                                       $this->db->limit(1);
                                       $this->db->order_by("MonitoringDate", "desc"); 
                                       $tb="07-noncompliance";
                                      // $query=$this->db->get_where($tb,array('HN'=>$HN));
                                        $query=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                        $query->num_rows();
                                            $row=$query->row();
                                       ##-- query-----                                          
                                           $data['MonitoringDate']=$row->MonitoringDate;
                                            $data['PercentNonCompliance']=$row->PercentNonCompliance;//ร้อยละความไม่ร่วมมือ
                                            $data['NonComplianceDetail1']=$row->NonComplianceDetail1; 
                                            $data['Action1']=$row->Action1;//1=prevent,2=correct
                                            
                                            //--## Intervention--
                                           $data['InterventionPT1_1']=$row->InterventionPT1_1;  //0,1 //Adjust for appropriate therapy due to health system
                                           $data['InterventionPT1_2']=$row->InterventionPT1_2; //Correct technique of administration
                                            $data['InterventionPT1_3']=$row->InterventionPT1_3; //Improve compliance
                                            $data['InterventionPT1_4']=$row->InterventionPT1_4; //Inform drug relate problems 
                                            $data['InterventionPT1_5']=$row->InterventionPT1_5; //Life style modification 
                                            $data['InterventionPT1_6']=$row->InterventionPT1_6; //Monitor efficacy and toxicity 
                                            $data['InterventionPT1_7']=$row->InterventionPT1_7; //Prevention of Adverse drug reaction
                                            
                                            $data['InterventionDoctor1_1']=$row->InterventionDoctor1_1; //Add new medication  
                                            $data['InterventionDoctor1_2']=$row->InterventionDoctor1_2; //Adjust dosage regimen 
                                            $data['InterventionDoctor1_3']=$row->InterventionDoctor1_3; //Confirm prescription 
                                            $data['InterventionDoctor1_4']=$row->InterventionDoctor1_4; //Discontinue medication 
                                            $data['InterventionDoctor1_5']=$row->InterventionDoctor1_5; //Inform drug related problems 
                                            $data['InterventionDoctor1_6']=$row->InterventionDoctor1_6; //Suggest changing medication
                                            $data['InterventionDoctor1_7']=$row->InterventionDoctor1_7; //Suggest laboratory 
                                           
                                            //## Response
                                            //1=Resolved ,2=Improved,3=Not Improved,4=N/A 
                                           $data['Response1']=$row->Response1;
                                            $data['ResponseDetail1']=$row->ResponseDetail1;
                                            //##Cause ผลการเลือกมี Yes,No
                                            $data['Cause1_1']=$row->Cause1_1;//สาเหตุจากตัวผู้ป่วย
                                            $data['Cause1_2']=$row->Cause1_2;//สาเหตุจากโรค
                                            $data['Cause1_3']=$row->Cause1_3;//สาเหตุจากยา 
                                            $data['Cause1_4']=$row->Cause1_4;//สาเหตุจากผู้ดูแล
                                            $data['Cause1_5']=$row->Cause1_5;//สาเหตุอื่นๆ 
                                           
                                            $this->load->view('update_301255/form_non_compliance_DRPs',$data);
                                                                                   
                                    }
     }
     else
     {
         redirect('welcome/index');       
     }
     
 }//end function
  
 ##============== ADR=============
 public function  load_form_adrs_mo1()//แสดงหน้า form  non compliance จากการกด click
{//begin function
        $sess_num = $this->session->userdata('sess_num');
      if(  $sess_num == 1   )
      {
     
				   $HN=$this->uri->segment(3);
				   $data['HN']=$this->uri->segment(3);
				   //$MonitoringDate=$this->uri->segment(4);
				  // $data['MonitoringDate']=$this->uri->segment(4); 				   
				   $tb="08-adr"; 
				   $data['title']=$this->title;
				   $data['fieldset']='ADRs';			   
				   $this->load->view('update_301255/form_adr',$data);
      
      }
      else
      {
                     redirect('welcome/index');   
      }
	
}//end function

public function  load_form_adr_view()//แสดงหน้า form  non compliance จากการกด click
{//begin function
   $sess_num = $this->session->userdata('sess_num');
if( 	 $sess_num  ==   1    )
			{ 
			       $HN=$this->uri->segment(3);
		                     $data['HN']=$this->uri->segment(3);//ok
		                     $MonitoringDate=$this->uri->segment(4);
		                     $data['MonitoringDate']=$this->uri->segment(4);//ok 
				
			       $data['select_name']="select_date2"; //ok
                                              
                                                 $data['url']= base_url()."index.php/loadtable_mo2/load_form_adr_view_mo2/";
                                                 
                                                 
                                                   $tb="08-adr"; 
                                                  $data['tb']="08-adr"; 
                                                  $this->db->limit(1);
                                                  $this->db->order_by("MonitoringDate", "desc"); 
                                                  //$data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
                                                  $data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                                  $data['name']=$this->session->userdata('sess_name');//ok                                 
                                                  ##-------- fetch data -----------
                                                  // $checknum =  $data['query']->num_rows();				      
				       $data['fieldset']='ADRs';				       				      				   
				       $row=$data['query']->row();                                      
                                                                 $data['MonitoringDate']=$row->MonitoringDate;
				       $data['ADRDetail2']=$row->ADRDetail2;
				       $data['Action2']=$row->Action2;			   
				       $data['Response2']=$row->Response2;
				       $data['ResponseDetail2']=$row->ResponseDetail2;                                                                                                                                                  
                                   ##-------- fetch data -----------
				   $checknum =  $data['query']->num_rows();
				   $data['title']=$this->title;
				   $data['fieldset']='B.Indentify DRPs (ADRs) History';
				   $this->load->view('update_301255/form_ADR_DRPs',$data);
			}
			else
			{
				redirect('welcome/index');
			}
}//end function

public function  load_form_adr_view_mo2()//แสดงหน้า form  non compliance จากการกด click
{//begin function
   $sess_num = $this->session->userdata('sess_num');
if( 	 $sess_num  ==   1    )
			{ 
			       $HN=$this->uri->segment(3);
		                     $data['HN']=$this->uri->segment(3);//ok
		                     $MonitoringDate=$this->uri->segment(4);
		                     $data['MonitoringDate']=$this->uri->segment(4);//ok 
				
			       $data['select_name']="select_date2"; //ok
                                                 // $data['url']= base_url()."index.php/loadtable/load_form_adr_view_mo2/".$HN."/".$MonitoringDate.'';//ok
                                                   $data['url']= base_url()."index.php/loadtable_mo2/load_form_adr_view_mo2/".$HN."/".$MonitoringDate.'';//ok
			       $tb="08-adr"; 
                                                  $data['tb']="08-adr"; 
                                                  $this->db->limit(1);
                                                  $this->db->order_by("MonitoringDate", "desc"); 
                                                  $data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
                                                  //$data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                                  $data['name']=$this->session->userdata('sess_name');//ok                                 
                                                  ##-------- fetch data -----------
                                                  // $checknum =  $data['query']->num_rows();				      
				       $data['fieldset']='ADRs';				       				      				   
				       $row=$data['query']->row();                                      
                                                                 $data['MonitoringDate']=$row->MonitoringDate;
				       $data['ADRDetail2']=$row->ADRDetail2;
				       $data['Action2']=$row->Action2;			   
				       $data['Response2']=$row->Response2;
				       $data['ResponseDetail2']=$row->ResponseDetail2;                                                                                                                                                  
                                   ##-------- fetch data -----------
				   $checknum =  $data['query']->num_rows();
				   $data['title']=$this->title;
				   $data['fieldset']='B.Indentify DRPs (ADRs) History';
				   $this->load->view('update_301255/form_ADR_DRPs',$data);
			}
			else
			{
				redirect('welcome/index');
			}
}//end function


##====== Medication Error
public function  load_form_medication_mo1()//แสดงหน้า form  non compliance จากการกด click
{//begin function
    $sess_num = $this->session->userdata('sess_num');
if( 	$sess_num  ==   1    )
			{ 
				   $HN=$this->uri->segment(3);
				   $data['HN']=$this->uri->segment(3);
				   $MonitoringDate=$this->uri->segment(4);
				   $data['MonitoringDate']=$this->uri->segment(4); 
				   $tb="10-medicationerror";
                                   
                                                             $data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                   				 
				   $data['title']=$this->title;
				   $data['fieldset']='Medication Error';
				   				   
				  $this->load->view('update_301255/form_medication_error',$data);
			}
			else
			{
				redirect('home/page_login');
			}
}//end function

public function  load_form_medication_error_view()//แสดงหน้า form  non compliance จากการกด click
{//begin function
    $sess_num = $this->session->userdata('sess_num');
if( 	$sess_num  ==   1    )
			{ 
				   $HN=$this->uri->segment(3);
				   $data['HN']=$this->uri->segment(3);
				   $MonitoringDate=$this->uri->segment(4);
				   $data['MonitoringDate']=$this->uri->segment(4); 
				   //$tb="07-noncompliance";
				   //$tb="08-adr"; 
				   $tb="10-medicationerror";
                                                             $data['tb']="10-medicationerror";
				   //$data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate));
                                  
                                   $this->db->order_by("MonitoringDate", "desc"); 
                                   //$data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                   $query=$this->db->get_where($tb,array('HN'=>$HN));
				  // $checknum =  $data['query']->num_rows();
                                  // $row=$data['query'];
                                   $query->num_rows();
                                   
                                   $data['MonitoringDate']=$this->uri->segment(4);//ok 
		      $data['select_name']="select_date2"; //ok
                                  // $data['url']= base_url()."index.php/loadtable/load_form_medication_error_view_mo2/".$HN."/";//ok
                                   // $data['url']= base_url()."index.php/loadtable/load_form_medication_error_view_mo2/".$HN."/";//ok
                                     $data['url']= base_url()."index.php/loadtable_mo2/load_form_adr_view_mo2/";
                            
                                   $row=$query->row();
				     
                                      $data['MonitoringDate']=$row->MonitoringDate;   
                                      $data['DRPselection4']=$row->DRPselection4; //Medication error  $arr=array(0=>'No',1=>'Prescribing error',2=>'Trancribing error',3=>'Dispensing error',4=>'Administration error',5=>'Unclear order');  
                                
                                      $data['MedicationErrorDetail']=$row->MedicationErrorDetail;                                     
	                        $data['Action4']=$row->Action4; //1=Prevent,2=correct
		          $data['ResponseDetail4']=$row->ResponseDetail4;
		         $data['Response4']=$row->Response4;//Action
                                      $data['InterventionPT4_1']=$row->InterventionPT4_1; //Adjust for appropriate therapy due to health system 	
                                      $data['InterventionPT4_2']=$row->InterventionPT4_2; //Correct technique of administration                                                              
                                      $data['InterventionPT4_3']=$row->InterventionPT4_3;//Improve compliance   
                                      $data['InterventionPT4_4']=$row->InterventionPT4_4;//Inform drug relate problems 
                                      $data['InterventionPT4_5']=$row->InterventionPT4_5;//Life style modification 
                                      $data['InterventionPT4_6']=$row->InterventionPT4_6;//Monitor efficacy and toxicity 
                                      $data['InterventionPT4_7']=$row->InterventionPT4_7;//Prevention of Adverse drug reaction
                                                                         
                                      $data['InterventionDoctor4_1']=$row->InterventionDoctor4_1;//Add new medication 
                                      $data['InterventionDoctor4_2']=$row->InterventionDoctor4_2;//Adjust dosage regimen 
                                      $data['InterventionDoctor4_3']=$row->InterventionDoctor4_3;//Confirm prescription
                                      $data['InterventionDoctor4_4']=$row->InterventionDoctor4_4;//Discontinue medication
                                      $data['InterventionDoctor4_5']=$row->InterventionDoctor4_5;//Inform drug related problems 
                                      $data['InterventionDoctor4_6']=$row->InterventionDoctor4_6;//Suggest changing medication
                                      $data['InterventionDoctor4_7']=$row->InterventionDoctor4_7;//Suggest laboratory                                  

                                      $data['Response4']=$row->Response4;  //Response: 1=resolved,2=improved 4=N/A
                                      $data['ResponseDetail4']=$row->ResponseDetail4; //
                                      
                                      $data['name']=$this->session->userdata('sess_name');//ok
                                      
                                      $data['title']=$this->title; 
		         $data['fieldset']='C.Medication error History';
				  
                                      $this->load->view('update_301255/form_medication_error_DRPs',$data);
                                   
			}
			else
				{
					   redirect('home/page_login');
				}
}//end function
###=============== other DRP
public function  load_form_other_drps_view_mo1()//แสดงหน้า form  non compliance จากการกด click
{//begin function
    $sess_num = $this->session->userdata('sess_num');
if( 	 $sess_num  ==   1    )
			{ 
				   $HN=$this->uri->segment(3);
				   $data['HN']=$this->uri->segment(3);
				   $MonitoringDate=$this->uri->segment(4);
				   $data['MonitoringDate']=$this->uri->segment(4); 
				   $tb="09-otherdrp";
				   $data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                                             $checknum =  $data['query']->num_rows();
				   $data['title']=$this->title;
				   $data['fieldset']='B.Identify DRPs(Other DRPs) History';				   
                                                            $this->load->view('update_301255/form_other_drps',$data);
                                                          //    $this->load->view('update_301255/form_other_drps_DRPs',$data);
			}
			else
				{
					   redirect('home/page_login');
				}
}//end function


public function  load_form_other_drps_view()//แสดงหน้า form  non compliance จากการกด click
{//begin function
     $sess_num = $this->session->userdata('sess_num');
if( 	 $sess_num ==   1    )
			{ 
			    //$HN=$this->uri->segment(3); //AB3540  ใช้สำหรับทดสอบ
                                               $HN='AB3540';
			    $data['HN']=$this->uri->segment(3);
                                              
			    $MonitoringDate=$this->uri->segment(4);
				  // $data['MonitoringDate']=$this->uri->segment(4); 
				   //$tb="07-noncompliance";
				   //$tb="08-adr"; 
		                 $tb="09-otherdrp";
                                 
                                 
                                 $data['tb']="09-otherdrp";
                                             
                                              $data['url']= base_url()."index.php/loadtable_mo2/load_form_other_drps_view_mo2/";
                                              
                                             $data['select_name']="select_date";   
                                            
                                              $data['name']=$this->session->userdata('sess_name'); 
                                              
				   //$data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                              $this->db->limit(1);
                                              $this->db->order_by("MonitoringDate", "desc");
                                              $data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                              $data['query']->num_rows();
                                   
                                   
				   $checknum =  $data['query']->num_rows();
				   $data['title']=$this->title;
				   $data['fieldset']='B.Identify DRPs(Other DRPs) History';
                            
                                   
                                   $row=$data['query']->row();
                                   
                                   $data['MonitoringDate']=$row->MonitoringDate;
                              
                                $data['DRPselection3']=$row->DRPselection3;  //Other ADRs  $ar1=array(0=>'No',1=>'Need for additional drug therapy',2=>'Improper drug selection',3=>'Improper dosage regimen',4=>'Failure to receive medication',5=>'Drug interaction',6=>'Unnecessary drug therapy',7=>'Duplication/Repeated',8=>'Other');
                                   
                                   
                                   $data['DRPDetail3']=$row->DRPDetail3;
                                   $data['Action3']=$row->Action3; //1=Prevent,2=Correct 
                                   $data['InterventionPT3_1']=$row->InterventionPT3_1; //Adjust for appropriate therapy due to health system
                                   $data['InterventionPT3_2']=$row->InterventionPT3_2;//Correct technique of administration 
				   $data['InterventionPT3_3']=$row->InterventionPT3_3;//Improve compliance 
                                   $data['InterventionPT3_4']=$row->InterventionPT3_4;//Inform drug relate problems
                                   $data['InterventionPT3_5']=$row->InterventionPT3_5;//Life style modification 
                                   $data['InterventionPT3_6']=$row->InterventionPT3_6;//Monitor efficacy and toxicity
                                   $data['InterventionPT3_7']=$row->InterventionPT3_7;//Prevention of Adverse drug reaction 
                                   
                                   $data['InterventionDoctor3_1']=$row->InterventionDoctor3_1;//Add new medication 
                                   $data['InterventionDoctor3_2']=$row->InterventionDoctor3_2;// Adjust dosage regimen 
                                   $data['InterventionDoctor3_3']=$row->InterventionDoctor3_3;//Confirm prescription 
                                   $data['InterventionDoctor3_4']=$row->InterventionDoctor3_4;//Discontinue medication
                                   $data['InterventionDoctor3_5']=$row->InterventionDoctor3_5;//Inform drug related problems
                                   $data['InterventionDoctor3_6']=$row->InterventionDoctor3_6;//Suggest changing medication 
                                   $data['InterventionDoctor3_7']=$row->InterventionDoctor3_7;//Suggest laboratory 
                                   
                                   
                                   $data['Response3']=$row->Response3; //Response  1=Resolved 2=Improved 3=Not Improved 4=N/A 
                                   $data['ResponseDetail3']=$row->ResponseDetail3; //
                                   
                                   $data['ConfirmForDelete']=$row->ConfirmForDelete;
                                   $data['CheckForDelete']=$row->CheckForDelete;
                                   
                                  
                                    
                                   //$this->epiquerymodel->list_date_tabel_all($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
                                   
                                   
                                   $this->load->view('update_301255/form_other_drps_DRPs',$data);
                                   
                                    
			}
			else
				{
					   redirect('home/page_login');
				}
}//end function

public function  load_form_other_drps_view_mo2()//แสดงหน้า form  non compliance จากการกด click
{//begin function
     $sess_num = $this->session->userdata('sess_num');
if( 	 $sess_num ==   1    )
			{ 
			    //$HN=$this->uri->segment(3); //AB3540  ใช้สำหรับทดสอบ
                                               $HN='AB3540';
			    $data['HN']=$this->uri->segment(3);
                                              
			    $MonitoringDate=$this->uri->segment(4);
				  // $data['MonitoringDate']=$this->uri->segment(4); 
				   //$tb="07-noncompliance";
				   //$tb="08-adr"; 
		                 $tb="09-otherdrp";
                                             $data['tb']="09-otherdrp";
                                             
                                                 $data['url']= base_url()."index.php/loadtable_mo2/load_form_other_drps_view_mo2/";
                                                $data['select_name']="select_date";
                                              $data['name']=$this->session->userdata('sess_name');
                                              
                                              
				   //$data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                              $this->db->limit(1);
                                              $this->db->order_by("MonitoringDate", "desc");
                                            //  $data['query']=$this->db->get_where($tb,array('HN'=>$HN));
                                              $data['query']=$this->db->get_where($tb,array('HN'=>$HN,'MonitoringDate'=>$MonitoringDate)); //ของเดิม
                                              $data['query']->num_rows();
                                   
                                   
				   $checknum =  $data['query']->num_rows();
				   $data['title']=$this->title;
				   $data['fieldset']='B.Identify DRPs(Other DRPs) History';
                                   
                                   
                                   $row=$data['query']->row();
                                   
                                   $data['MonitoringDate']=$row->MonitoringDate;
                                   $data['DRPDetail3']=$row->DRPDetail3;
                                   $data['Action3']=$row->Action3; //1=Prevent,2=Correct 
                                   $data['InterventionPT3_1']=$row->InterventionPT3_1; //Adjust for appropriate therapy due to health system
                                   $data['InterventionPT3_2']=$row->InterventionPT3_2;//Correct technique of administration 
				   $data['InterventionPT3_3']=$row->InterventionPT3_3;//Improve compliance 
                                   $data['InterventionPT3_4']=$row->InterventionPT3_4;//Inform drug relate problems
                                   $data['InterventionPT3_5']=$row->InterventionPT3_5;//Life style modification 
                                   $data['InterventionPT3_6']=$row->InterventionPT3_6;//Monitor efficacy and toxicity
                                   $data['InterventionPT3_7']=$row->InterventionPT3_7;//Prevention of Adverse drug reaction 
                                   
                                   $data['InterventionDoctor3_1']=$row->InterventionDoctor3_1;//Add new medication 
                                   $data['InterventionDoctor3_2']=$row->InterventionDoctor3_2;// Adjust dosage regimen 
                                   $data['InterventionDoctor3_3']=$row->InterventionDoctor3_3;//Confirm prescription 
                                   $data['InterventionDoctor3_4']=$row->InterventionDoctor3_4;//Discontinue medication
                                   $data['InterventionDoctor3_5']=$row->InterventionDoctor3_5;//Inform drug related problems
                                   $data['InterventionDoctor3_6']=$row->InterventionDoctor3_6;//Suggest changing medication 
                                   $data['InterventionDoctor3_7']=$row->InterventionDoctor3_7;//Suggest laboratory 
                                   
                                   
                                   $data['Response3']=$row->Response3; //Response  1=Resolved 2=Improved 3=Not Improved 4=N/A 
                                   $data['ResponseDetail3']=$row->ResponseDetail3; //
                                   
                                   $data['ConfirmForDelete']=$row->ConfirmForDelete;
                                   $data['CheckForDelete']=$row->CheckForDelete;
                                   
                                   
                                   //$this->epiquerymodel->list_date_tabel_all($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
                                   
                                   
                                   $this->load->view('update_301255/form_other_drps_DRPs',$data);
                                   
                                    
			}
			else
				{
					   redirect('home/page_login');
				}
}//end function



/*
public  function  adrscode_tb() //adrscode_tb
{
    $query=$this->db->get('adrscode');
    foreach($query->result() as $row)
    {
        //$ADRsType=$row->ADRsType;
        //$ADRs=$row->ADRs;
        ?>
        <option id="<?=$ADRs?>"><?=$ADRs?></option>
        <?PHP
    }  
}
*/



}//end class      
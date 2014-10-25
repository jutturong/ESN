<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('DMY_thai_convert'))
{//if
	function DMY_thai_convert($DMY)
	{
		if(  strlen($DMY) > 0  &&  $DMY != ""   )
		{  //if     
						 $ex=explode(' ',$DMY);
						 $v_date=   $ex[0];
						 $v_time=$ex[1];
						  $ex_date=explode('-',$v_date);
						  $convert_year=$ex_date[0]+543;
						  $DMY_format=  "".$ex_date[2].'/'.$ex_date[1].'/'.$convert_year.' Time : '.$v_time;
						  if  ( strlen($DMY_format) > 0 )
						  {
							   return     $DMY_format; 
						  }
		 }	//endif  
	}
}//end if

if ( ! function_exists('date_medication')) //แปลงวันเดือนปีของ Medication profile
{//if
	function date_medication($DMY)
	{
		if(  strlen($DMY) > 0  &&  $DMY != ""   )
		{  //if     
			 $ex=explode('-',$DMY);
                         $con_year=$ex[2]-543;
			 return  $con_year.'-'.$ex[1].'-'.$ex[0];
		 }	//endif  
	}
}//end if

if ( ! function_exists('convert_thai_DMY')) //ใช่้สำหรับแปลงค่าผลวันเดือนปี  17-05-2523
{
	function  convert_thai_DMY($b_dmy)
	{
		   if( strlen($b_dmy) > 0 )  //รูปแบบที่ได้มาคือ  1980-05-17 
		   {
		      // echo  $b_dmy;
			  // echo br();
			     $ex=explode('-',$b_dmy);
				 $con_y=$ex[0]+543;
				// return  $con_y.'-'.$ex[1].'-'.$ex[0];   //แปลงกลับให้เป็น format แบบไทย
				return    $ex[2].'-'.$ex[1].'-'.$con_y;
		   }
     }
}	 


if ( ! function_exists('convert_eng_DMY')) //ใช่้สำหรับแปลงค่าผลวันเดือนปี  17-05-2523
{
	function  convert_eng_DMY($b_dmy)
	{
		   if( strlen($b_dmy) > 0 )  //รูปแบบที่ได้มาคือ  1980-05-17 
		   {
		        //echo  $b_dmy;
				 $ex=explode('-',$b_dmy);
				 $con_y= $ex[2]-543;
				// $con_y= $ex[2];
				 return   $con_y.'-'.$ex[1].'-'.$ex[0];   //แปลงกลับให้เป็น format แบบไทย
		   }
     }
}	 


if ( ! function_exists('check_max_year_thai')) //function =>format คือ  //ใช้กับ format 1980-05-17
{
	function check_max_year_thai($b_dmy)
	{
			  $y_end=date("Y");   
			  $y_thai=$y_end+543;
			  if(   $y_va  <= $y_thai )
			  {
			      //return true;
				  echo "T";
			  }    
			  else
			  {
			     //return false;
				 echo  "F";
			  }   
	}
}//end if


if ( ! function_exists('calc_ofset_page'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
       function   calc_ofset_page($page,$list_limit)
	   {
	   				####==== ตัวแปรที่ใช้
					// $page=4; //หน้าที่ส่งมา
					 // $list_limit=10; //จำนวนของ รายการต่อหน้าที่ต้องการแสดง  limit
					####==== ตัวแปรที่ใช้
					  $reng_limit=$list_limit-1; // คำนวณหารายการ offset โดยเอา    $list_limit-1  
					   $x=($page*$list_limit);
					   $ofset=$x-$reng_limit;
					  return    $ofset;
	   }
}

if ( ! function_exists('DMY_format'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
	   function   DMY_format($dmy)
	   {
                       //  echo  $dmy;
					if( strlen($dmy) > 0  )
					{
						       $ex=explode('-',$dmy);
							   $con_y=$ex[2]-543;
							   return    $con_y.'-'.$ex[1].'-'.$ex[0];
					}		   
	   }
}


if ( ! function_exists('DMY_format2'))  // จัดรูปแบบให้เป็น 1947-05-15
{//if
	   function   DMY_format2($dmy)
	   {
                       //  echo  $dmy;
					if( strlen($dmy) > 0  )
					{
						       $ex=explode('-',$dmy);
							   $con_y=$ex[2]-543;
							   return    $con_y.'-'.$ex[1].'-'.$ex[0];
					}		   
	   }
}






if ( ! function_exists('DATE_TIME'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
       function   DATE_TIME()
	   {
   			$datestring = "%Y-%m-%d %H:%i:%s";
		    $time = time();
	        return   mdate($datestring,$time);
	   }
}


//######## ------------------------  window.open  -------------------------------------------
if ( ! function_exists('MY_anchor_popup'))
{
	function MY_anchor_popup($uri = '', $title = '', $attributes = FALSE)
	{
		$title = (string) $title;

		$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;

		if ($title == '')
		{
			$title = $site_url;
		}

		if ($attributes === FALSE)
		{
			return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank');\">".$title."</a>";
		}

		if ( ! is_array($attributes))
		{
			$attributes = array();
		}

		foreach (array('width' => '800', 'height' => '600', 'scrollbars' => 'no', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0', ) as $key => $val)
		{
			$atts[$key] = ( ! isset($attributes[$key])) ? $val : $attributes[$key];
			unset($attributes[$key]);
		}

		if ($attributes != '')
		{
			$attributes = _parse_attributes($attributes);
		}

		return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank', '"._parse_attributes($atts, TRUE)."');\"$attributes>".$title."</a>";
	}
} //end if

if ( ! function_exists('MY_strpos'))  // ใช้สำหรับการค้นหาแล้ว  link ต่อ   
{//if
       function   MY_strpos_link($tx)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
			     $pos1=strpos($tx,'http://');
				 if(   is_numeric($pos1 )  )
				 {
				       ?>
					             <a href="<?=$tx?>" target="_blank"><?=$tx?></a>
                       <?php
				 }
				 else
				 {
                    		    echo    $tx;
				 }
	   }
}

//##============  แ้ก้ปัญหาการส่งค่าที่มีช่องว่าง========
if ( ! function_exists('MY_add_date'))  // ใช้สำหรับการค้นหาแล้ว  link ต่อ   
{//if
       function   MY_add_date($dt,$add)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
				if(  $dt != ""  )
				{
									  $ex=explode(' ',$dt);
					//				  echo   $ex[0];
					//				  echo br();
					//				  echo   $ex[1];
					//	 			  echo br();
					//				   echo   $ex[2];
					//	 			  echo br();
									return    $str_total=$ex[0].$add.$ex[1].$add.$ex[2];
				}					
	   }
}
##=============  ถอดวันเดือนปี ภาษาไทยให้ไเป็นภาษาอังกฤษ  จะใช้กับ ตาราง  13_tdm  รูปแบบคือ 22 ส.ค. 2554
if ( ! function_exists('MY_convert_dmy_eng'))  // ใช้สำหรับการค้นหาแล้ว  link ต่อ   
{//if
       function   MY_convert_dmy_eng($dt)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
				if(  $dt != ""  )
				{
									  $ex=explode(' ',$dt);
									  //echo br();
								       //echo   $ex[1];
								       //echo br();
                                                                       
									   switch($ex[1])
									   {
									        case 'ม.ค.':
											{
											     $con_m=1;
											    break;
											}
									   		 case 'ก.พ.':
											{
											     $con_m=2;
											    break;
											}
											  case 'มี.ค.':
											{
											     $con_m=3;
											    break;
											}
											  case 'เม.ย.':
											{
											     $con_m=4;
											    break;
											}
											  case 'พ.ค.':
											{
											     $con_m=5;
											    break;
											}
											  case 'มิ.ย.':
											{
											     $con_m=6;
											    break;
											}
											  case 'ก.ค.':
											{
											     $con_m=7;
											    break;
											}
											  case 'ส.ค.':
											{
											     $con_m=8;
											    break;
											}
											  case 'ก.ย.':
											{
											     $con_m=9;
											    break;
											}
											  case 'ต.ค.':
											{
											     $con_m=10;
											    break;
											}
											 case 'พ.ย.':
											{
											     $con_m=11;
											    break;
											}
											 case 'ธ.ค.':
											{
											     $con_m=12;
											    break;
											}
                                                                                default:{
                                                                                            $con_m='';
                                                                                }
                                                                                        
									   }
                                                                           //echo  $con_m;
                                                                           //echo br();
                                                                           return  $ex[0]."-".$con_m."-".$ex[2];
				}//end if					
	   }//end function
}


if ( ! function_exists('MY_convert_dmy_thai_tdm'))  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM
{//if
       function   MY_convert_dmy_thai_tdm($dt)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
             if( $dt != '' )
			 {
			      					   $ex=explode('-',$dt);
									 // echo br();
								       //echo   $ex[0];
									   //echo br();
								  switch($ex[1])
									   {
									        case  1 :
											{
											     $con_m='ม.ค.';
											    break;
											}
									   		 case  2 : 
											{
											     $con_m='ก.พ.';
											    break;
											}
											  case  3 :
											{
											     $con_m='ม.ค.';
											    break;
											}
											  case 4:
											{
											     $con_m='เม.ย.';
											    break;
											}
											  case 5:
											{
											     $con_m='พ.ค.';
											    break;
											}
											  case 6:
											{
											     $con_m='มิ.ย.';
											    break;
											}
											  case 7:
											{
											     $con_m='ก.ค.';
											    break;
											}
											  case 8:
											{
											     $con_m='ส.ค.';
											    break;
											}
											  case 9:
											{
											     $con_m='ก.ย.';
											    break;
											}
											  case 10:
											{
											     $con_m='ต.ค.';
											    break;
											}
											 case 11:
											{
											     $con_m='พ.ย.';
											    break;
											}
											 case 12:
											{
											     $con_m='ธ.ค.';
											    break;
											}
									   }
									 return  $ex[0]." ".$con_m." ".$ex[2];
  
			 }
       }

//##=========== spit
if ( ! function_exists('MY_split_space'))  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM
{//if
       function   MY_split_space($dr)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
             if( $dr!= '' )		
			  {
                       $ex=split(' ',$dr);
					   return   $ex[0];
              }
	   }//end function		  
}


//##=========== spit
if ( ! function_exists('MY_split_space'))  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM
{//if
       function   MY_split_space($dr)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
             if( $dr!= '' )		
			  {
                       $ex=split(' ',$dr);
					   return   $ex[0];
              }
	   }//end function		  
}


//##=========== spit
if ( ! function_exists('help_test'))  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM
{//if
       function   help_test()  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
            echo  "testing";
	   }//end function		  
}

if ( ! function_exists('dmy_convert1'))  // 2011-02-04แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM
{//if
       function   dmy_convert1($dmy)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
              //echo  "testing";
               //2011-02-04 format
              //echo  $dmy;
              //echo br();
               $ex=explode('-',$dmy);
                 $y_con=$ex[2]-543;
                 return $y_con.'-'.$ex[1].'-'.$ex[0];
	   }//end function		  
}

//##============= convert  วันเ-ดือน-ปี ให้อยู่ในรูปของ  วันเดือนปี ไทย เพื่อ query  ในการดึงข้อมูล    13_TDM  
if ( ! function_exists('dmy_tdm'))  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM  เช่น   02 ก.พ. 2552
{//if
       function   dmy_tdm($dmy)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {			
            				    //echo  "testing";
								//echo   $dmy;
									$ex=explode('-',$dmy);
								
//								 echo   $ex[0];
//								 echo  br();
//								  echo   $ex[1];
//								   echo  br();
//									echo   $ex[2];
									
									
									switch($ex[1])
									{ //begin    switch
									         case  1:
															  {
																	  $convert_month='ม.ค.';
																       break;
															  }
										  	   case  2:
															{
																		  $convert_month='ก.พ.';
																	    break;
															 }
											   case  3:
															  {
																	   $convert_month='มี.ค.';
																       break;
															  }
										  	        
											   case  4:
															  {
																	$convert_month='เม.ย.';
																       break;
															  }
											   case  5:
															  {
																	 $convert_month='พ.ค.';
																 break;
															  }
											   case  6:
															  {
																	  $convert_month='มิ.ย.';
																 break;
															  }
										     case  7:
															  {
																	 $convert_month='ก.ค.';  
																     break;
															  }
											   case  8:
															  {
																	   $convert_month='ส.ค.';
																      break;
															  }
											   case  9:
														  {
																  $convert_month='ก.ย.';
															      break;
														  }
											   case  10:
														  {
																   $convert_month='ต.ค.';
															      break;
														  }
											   case  11:
														  {
																  $convert_month='พ.ย.';
															      break;
														  }
											   case  12:
														  {
														         $convert_month='ธ.ค.';
															 break;
														  }
									} //end   switch
									
									return    $ex[0].' '.$convert_month.' '.$ex[2];
	   }//end function		  
}

//## คำนวณ อายุของ chem1
if ( ! function_exists('cal_year')  )  // แปลงกลับในรูปแบบของ วันเดือนปี  เพื่อดึงข้อมูลของ TDM  เช่น   02 ก.พ. 2552
{//begin
        function cal_year($dmy)
        {
             if( !empty($dmy) )
             {
                 //echo "testing";
                 //echo  $dmy;
                 $ex1=explode(" ",$dmy);
                 $ex1[0];
                   if(   !empty($ex1[0])    )
                   {
                          $ex2=  explode("-", $ex1[0] );
                          $ex2[0];  //ปี พ.ศ. เกิด
                          //echo br();
                          $datestring="%Y"; // ปี พ.ศ. ปัจจุบัน
                          $cur_year= mdate($datestring);
                          return  $year=$cur_year - $ex2[0];
                   }
             }
        }
}//end function
	   
}	//end class     
?>	
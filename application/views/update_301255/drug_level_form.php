 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
<!--
@import url("<?=base_url()?>style_table.css");
-->
</style>

<?=$this->load->view('import_ext')?>
<?=$this->load->view('import_jquery')?>
<?=$this->load->view('send_system')?>
<?=$this->load->view('import_dhtml')?>


<script type="text/javascript">     //เขียน function  เกียวกับ   วัน  เดือน ปี
$(function(){     
    var dateBefore=null;  
    $("#analysis_date").datepicker({  
	    showButtonPanel: true ,
		yearRange: '-85: +3', //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
        dateFormat: 'dd-mm-yy',  
		//numberOfMonths: 2, //จำนวนของเดือนที่โชว์
		// minDate: -20,
		//showWeek: true,
		firstDay: 1,
		 maxDate: "+1M +10D", 
        showOn: 'button',  
        buttonImage: '<?php  echo   base_url();  ?>images/calendar.gif',  
        buttonImageOnly: true,  
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],   
        monthNamesShort: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],  
        changeMonth: true,  //เปลี่ยนเดือนได้
        changeYear: true ,   //เปลี่ยนปีได้
        beforeShow:function(){  
            if($(this).val()!=""){  
                var arrayDate=$(this).val().split("-");       
                arrayDate[2]=parseInt(arrayDate[2])-543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
            }  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);  
  
        },  
        onChangeMonthYear: function(){  
            setTimeout(function(){  
                $.each($(".ui-datepicker-year option"),function(j,k){  
                    var textYear=parseInt($(".ui-datepicker-year option").eq(j).val())+543;  
                    $(".ui-datepicker-year option").eq(j).text(textYear);  
                });               
            },50);        
        },  
        onClose:function(){  
            if($(this).val()!="" && $(this).val()==dateBefore){           
                var arrayDate=dateBefore.split("-");  
                arrayDate[2]=parseInt(arrayDate[2])+543;  
                $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);      
            }         
        },  
        onSelect: function(dateText, inst){   
            dateBefore=$(this).val();  
            var arrayDate=dateText.split("-");  
            arrayDate[2]=parseInt(arrayDate[2])+543;  
            $(this).val(arrayDate[0]+"-"+arrayDate[1]+"-"+arrayDate[2]);  
        }  
  
    });  
      
});  
</script> 

<script type="text/javascript">
$(function()//  เพิ่มเติมจากของพี่เบิ้ม  เรื่องการดึงข้อมูลจาก   mysql  ของ อ.พสิน
{
     // $('#request_drug').click(function(){   alert('t'); });
	   $('#request_drug').change( function()
	   {   
	         //alert('t'); 
			 window.open('<?=base_url()?>index.php/epi/request_drug/' +  '<?=$HN?>/'  +    $(this).val()    ,'_blank','width=600,height=700');
		}
		);
	 // alert('t');
	   //document.getElementById('#request_drug').
}
);
</script>

<script type="text/javascript">
$(function()  //window  open  popup   เพิ่มเติมของ อ.สุณี
{
       $('#old_record').button( { icons:{  primary:"ui-icon-clipboard" }  } ).click(function()
	   {
	           window.open('<?=base_url()?>index.php/epi/old_record_form/' +  '<?=$MonitoringDate?>/'  +    $(this).val()    ,'_blank','width=600,height=700');
	   }
	   );
	   
         $('#evalution').button(  { icons:{  primary:"ui-icon-clipboard" }  } ).click(function()
	   {
	           window.open('<?=base_url()?>index.php/epi/evalution_form/' +  '<?=$MonitoringDate?>/'  +    $(this).val()    ,'_blank','width=500,height=300');
	   }
	   );

}
);
</script>

</head>

<body>


<?
        $sess_name= $this->session->userdata('sess_name');   //ชื่อของโรงพยาบาลที่ login เข้ามา
?>




<?
echo form_fieldset(' Progress and Action ');
?>
<table width="612" id="box-table-a" summary="Employee Pay Sheet">
<thead>
     <tbody>
         <tr>
             <td>
                 
                 <?PHP
                 $atts = array(
                'width'      => '600',
                'height'     => '600',
                'scrollbars' => 'yes',
                'status'     => 'yes',
                'resizable'  => 'yes',
                'screenx'    => '0',
                'screeny'    => '0'
            );
echo anchor_popup('epi/medication_profile//'.$HN.'//'.$MonitoringDate.'', 'Medication Profile', $atts);                 
                 ?>
             </td>
         </tr> 
         <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Drug :</td>
       <td width="467">
         <select>
           <option value=""> :: select ::</option>
           <?
		$this->epi_select->drug_select($Lab);         
	   ?>
           </select>
           
           <!--<input type="button" value="Old Record"  id="old_record"/>-->
           
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
       <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Interpret Date :</td>
         <td width="467">
             <input name="" type="text" value="<?=@$MonitoringDate?>" />
           Analysis Date                      
<input name="analysis_date" type="text"  id="analysis_date" value="<?=@$AnalysisDate?>" size="10" maxlength="10"/>           
                   </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
             <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Ward :</td>
           <td width="467">
           <input type="text" value="<?=@$Ward?>" />
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
             <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Indication :</td>
           <td width="467">
            <select>
            
<!--           <option value=""> :: select ::</option>
           <option value="1">Routine Monitoring</option>
           <option value="2">Suspected Toxicity</option>
           <option value="3">Suspected Subtherapeutic</option>
           <option value="4">Other..</option>
-->       
                 <?PHP  $this->epi_select->selec_indication($Indication);   ?>    
           </select>
           
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
            </tr>
            
            <tr>
            <td colspan="3">
                Pharmacoldnetic Parameters :
            </td>
            </tr>
             <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Vd :</td>
           <td width="467">
           <?
           $data = array(
              'name'        => '',
              'id'          => 'username',
              'value'       => ''.$Vd.'',
              'maxlength'   => '30',
              'size'        => '30',
              'style'       => 'width:25%',
            );
					echo form_input($data);
				?>
                Litre
                <?=nbs(3)?>
                Ke:
                <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => ''.$Ke.'',
              'maxlength'   => '50',
              'size'        => '20',
              'style'       => 'width:30%',
            );
					echo form_input($data);
				?>

<?
/*
$options = array(
					''  => '::select:::',
                  'day-1'  => 'day-1',
				   'hr-1'  => 'hr-1'
                );
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
 */
?>
   <select id="" name="">
<?           
    $this->epi_select->array_select($arr_KeUnit,$KeUnit);
//array_select
 ?>
   </select>
<?

?>        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
      
      <tr>
      <td>
      Cl:
      </td>
      <td>
          <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => ''.$Cl.'',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:30%',
            );
					echo form_input($data);
				?>
 <?

 /*
 $options = array(
                  ''  => '::Select::',
                  'L/day'    => 'L/day',
                  'L/hr'   => 'L/hr',
                  'mL/min' => 'mL/min',
                );
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
*/
                ?>
                    <select name="" id="">                 
                <?
                   $this->epi_select->CLUnit_select($CLUnit);
                ?>               
                    </select>                
   
          T1/2 :         
          <select id="" name="">
                <?
                   $this->epi_select->array_select(&$arr_T1div2Unit,$T1div2Unit);
                ?>
          </select>
                 
    
 

   
      </td>
      </tr>
      
      
      <tr>
      <td>
      Assessment : 
      </td>
      <td>
      <?
$options = array(
                  ''=>'::Select::',
				  '1'  => 'Therapentic',
                  '2'    => 'Subtherapeutic',
                  '3'   => 'Overtherapeutic',
                  '4' => 'Toxic',
				  '5' => 'Uninterpertation',
				  '6' => 'Undetectable',
                );
//$shirts_on_sale = array('small', 'large');
//echo form_dropdown('shirts', $options, 'large'); //ของเดิม ก่อนเขียนเป็น model
    ?>
          <select id="" name="">             
              <?PHP echo  $this->epi_select->select_Assessment($Assessment)?>
          </select>      
    <?PHP
?>
<?
//echo form_button('name','Evalution');
?>

<button id="evalution">Evalution</button>

      </td>
      </tr>
      
      <tr>
      <td colspan="3">
      Interpretation and Recommendation :
      </td>
      
      </tr>
      
      <tr>
    <td>
      <?
$data = array(
      'name'        => '',
      'id'          => '',
      'value'       => ''.$Interpretation.'',
      'rows'        => '3',
      'cols'        => '100',
      'style'       => 'width:500%',
    );
	echo form_textarea($data);
	  ?>
      </td>
      </tr>

<tr>
<td>
N.B. :
</td>
<td>
      <?
$data = array(
      'name'        => '',
      'id'          => '',
      'value'       => ''.$NB.'',
      'rows'        => '2',
      'cols'        => '100',
      'style'       => 'width:100%',
    );
	echo form_textarea($data);
	  ?>
</td>
</tr>

<tr>
<td>
<?
echo form_checkbox('newsletter', 'accept', FALSE);
?>
<?=nbs(3)?>
Follow Up : 
</td>

<td>
          <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => ''.$FollowUpDate.'',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:20%',
            );
					echo form_input($data);
				?>
<?=nbs(3)?>
week :
<?=nbs(3)?>
          <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:20%',
            );
					echo form_input($data);
?>
</td>
</tr>

<tr>
<td colspan="2">
User :
          <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => ''.$sess_name.'',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:40%',
            );
					echo form_input($data);
?>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<button>Save</button>
<button>Cancel</button>
</td>
</tr>

     </tbody>  
    </thead>
 
</table>
<?
echo form_fieldset_close(); 
?>
</body>
</html>

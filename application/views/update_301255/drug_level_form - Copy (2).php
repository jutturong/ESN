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

<table id="box-table-a" summary="Employee Pay Sheet">
    <thead>
   	  <tr>
       	  <th width="126" align="center" scope="col">Date</th>
        <th width="114" align="center" scope="col">Request drug</th>
        <th width="70" align="center" scope="col">Level</th>
        <th width="114" align="center" scope="col">Assessment</th>
        <th width="206" align="center" scope="col">Interpretation & Recommendation</th>
        <th width="88" scope="col">N.B.</th>
        <th width="157" scope="col">Interpreter</th>
      </tr>
    </thead>
    <tbody>
    
    <?
	  foreach($query1->result()   as   $row)
	  {
	           
			   
			   //$date=$row->MonitoringDate;
			  // $this->convertDate($date);
			  
			  
//			   $exdate=explode('-',$date);
//			   $year=$exdate[0]+543;
//	           $month=$exdate[1];
//			   $day=$exdate[2];
			   
			   $NB=$row->NB;
			   $Assessment=$row->Assessment;
			 //echo br();
			   
			 //  $date_total=$day.'/'.$month.'/'.$year;
	  
	?>
<tr>
        	<td><?=@$revers?></td>
            <td>
            
<!--            <select>
           <option value=""> :: select ::</option>
           <?
		         foreach($query_drug->result() as $row)
				 {
				    ?>
                           <option value="<?=@$row->drug1?>"><?=@$row->drug1?></option>
                    <?
				 }
		   ?>
           </select>
-->       



<select id="request_drug" name="request_drug">
           <option value=""> :: select ::</option>
           <?
		         foreach($drug_query->result() as $row)
				 {
				    ?>
                         <!--  <option value="<?=@$row->LabCode?>"><?=@$row->Lab?></option>-->
                             <option value="<?=@$row->Lab?>"><?=@$row->Lab?></option>
                    <?
				 }
		   ?>
           </select>
 

            </td>
            <td align="center"><label>
              <input name="textfield2" type="text" id="textfield2" size="5" maxlength="2" />
            </label></td>
      <td><?=$Assessment?></td>
            <td><label>
              <textarea name="textarea" id="textarea" cols="45" rows="1"></textarea>
            </label></td>
            <td><?=$NB?></td>
			 <td align="center">
             <?
      echo  $sess_name
?>             </td>
      </tr>
    <?
 	}	
	 ?>
  </tbody>
</table>

<?
echo form_fieldset(' Progress and Action ');
?>
<table width="612" id="box-table-a" summary="Employee Pay Sheet">
<thead>
     <tbody>
   	  <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Drug :</td>
       <td width="467">
         <select>
           <option value=""> :: select ::</option>
           <?
		         foreach($drug_query->result() as $row)
				 {
				    ?>
                           <option value="<?=@$row->LabCode?>"><?=@$row->Lab?></option>
                          <!--  <option value="<?=@$row->Lab?>"><?=@$row->Lab?></option>-->
                    <?
				 }
		   ?>
           </select>
           <input type="button" value="Old Record"  id="old_record"/>
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
       <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Interpret Date :</td>
         <td width="467">
           <input name="" type="text" />
           Analysis Date
           
           
<input type="text" size="10" maxlength="10" name="analysis_date"  id="analysis_date"/>           
           
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
             <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Ward :</td>
           <td width="467">
           <input name="" type="text" />
        </td>
       <!--   <th width="119" align="center" scope="col">Request drug</th>-->
      </tr>
             <tr>
       	 <!-- <th width="112" align="center" scope="col">Drug :</th>-->
          <td width="133">Indication :</td>
           <td width="467">
            <select>
           <option value=""> :: select ::</option>
           <option value="1">Routine Monitoring</option>
           <option value="2">Suspected Toxicity</option>
           <option value="3">Suspected Subtherapeutic</option>
           <option value="4">Other..</option>
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
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:10%',
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
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:10%',
            );
					echo form_input($data);
				?>

<?
$options = array(
					''  => '::select:::',
                  'day-1'  => 'day-1',
				   'hr-1'  => 'hr-1'
                );
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
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
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:10%',
            );
					echo form_input($data);
				?>
 <?
$options = array(
                  ''  => '::Select::',
                  'L/day'    => 'L/day',
                  'L/hr'   => 'L/hr',
                  'mL/min' => 'mL/min',
                );
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
?>
    T1/2 :
          <?
           $data = array(
              'name'        => '',
              'id'          => '',
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '10',
              'style'       => 'width:10%',
            );
					echo form_input($data);
				?>
 <?
$options = array(
                  ''  => '::Select::',
                  'day'    => 'day',
                  'hr'   => 'hr',
                );
$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
?>
   
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
echo form_dropdown('shirts', $options, 'large');
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
      'value'       => '',
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
      'value'       => '',
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
              'value'       => '',
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

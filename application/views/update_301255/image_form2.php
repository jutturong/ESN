<?PHP
	       $atts = array(
	        'width'      => '800',
	         'height'     => '600',
	          'scrollbars' => 'yes',
	          'status'     => 'yes',
	          'resizable'  => 'yes',
	          'screenx'    => '0',
	          'screeny'    => '0'
		         );
	//echo anchor_popup('loadtable/load_form_medication_error_view/'.$HN.'/'.$MonitoringDate, 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
	echo anchor_popup('image/insert_data/'.$HN.'/', 'เรียกดูข้อมูลที่บันทึกแล้ว', $atts);
?>

<?PHP echo form_fieldset($fieldset); ?>

<ul>
    HN : <input type="text" value="<?=$HN?>" readonly="" size="10"  />   
</ul>
<ul>
    Date : <input type="text" value="<?=$date_?>" readonly="" size="10"  />  
</ul>
<ul>
    Lab : 
    <select>
         <option> เลือก </option>
        <?PHP 
           foreach($query_select->result() as $row)
           {
               $LabCode=$row->LabCode;
               $Lab=$row->Lab;
               ?>
                  <option value="<?PHP echo $LabCode; ?>"><?PHP  echo  $Lab; ?></option>
               <?PHP
           }
        ?>
    </select>
</ul>
<ul>
    Imaging Result :
    <select>
        <option> เลือก </option>
    <?PHP
       foreach($query_select2->result() as $row)
       {
           $Brainatrophy=$row->Brainatrophy;
           ?>
    <option value="<?PHP echo $Brainatrophy; ?>"><?PHP echo $Brainatrophy; ?></option>
          <?PHP
       }
    ?>
    </select>
</ul>

<ul>
    <button>บันทึก</button>
    <button type="reset">ล้างข้อมูล</button>
</ul>

<?PHP echo form_close(); ?>
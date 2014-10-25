<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>

</head>

<body>
<?PHP
 echo form_fieldset($fieldset);
?>
<ul>
<li>


<input type="checkbox" > What's your disease?
<?PHP echo nbs(10); ?>
        <?PHP
	$atts = array(
	 'width'      => '800',
	'height'     => '300',
	 'scrollbars' => 'yes',
	 'status'     => 'yes',
	 'resizable'  => 'yes',
	 'screenx'    => '0',
	'screeny'    => '0'
	                );
	//echo anchor_popup('loadtable/load_form_give_information_view/'.$HN.'/'.$MonitoringDate, 'ข้อมูลที่บันทึกไปแล้ว', $atts);
              echo anchor_popup('giveinformation/load_giveinformation_DRP/'.$HN, 'ข้อมูลที่บันทึกไปแล้ว', $atts);
        ?>       
</li>

<li>

<input type="checkbox" > What's treatment?

</li>

<li>


<input type="checkbox" > How to manage the side effect?

</li>

<li>

<input type="checkbox" > Bring medication to each visit?


</li>


<li>

<input type="checkbox" > How to correct behavior?


</li>


<li>
Other :
<textarea cols="40" rows="2">
    
</textarea>
 </li>
 
 <li>
     <button>บันทึกข้อมูล</button><button>ล้างข้อมูล</button>
 </li>

</ul>
<?PHP
echo form_close();
?>
</body>
</html>

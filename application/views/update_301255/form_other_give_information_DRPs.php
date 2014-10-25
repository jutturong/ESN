<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<?PHP  $this->load->view('import_jquery'); ?>
</head>

<body>

<?PHP
echo form_fieldset($fieldset);
?>
<ul>
<li>
Monitoring Date : 
<!--<input type="text" value="<?=@$MonitoringDate?>" readonly="true" size="10" maxlength="20" >-->
<?PHP
$this->epiquerymodel->list_date_tabel_all($tb,'HN',$HN,'MonitoringDate',$select_name,$url);
?>
</li>
<li>
    <?PHP
      if( $GiveInformation1 == 'Y')
      {//begin
    ?>
    <input type="checkbox" checked> What's your disease?
    <?PHP
      }//end
      else
      {
    ?>
     <input type="checkbox" checked> What's your disease?
    <?PHP
      }
    ?>
</li>
<li>
   <?PHP
      if( $GiveInformation2 == 'Y')
      {//begin
    ?>
    <input type="checkbox" checked> What's treatment?
   <?PHP
      }
      else
      {
   ?>
    <input type="checkbox" checked> What's treatment?
    <?PHP
      }
    ?>
</li>
<li>
  <?PHP
      if( $GiveInformation3 == 'Y')
      {//begin
    ?>
    <input type="checkbox" checked> How to manage the side effect?
<?PHP
      }
      else{
    ?>
    <input type="checkbox" checked> How to manage the side effect?
   <?PHP
      }
   ?> 
</li>

<li>
  <?PHP
      if( $GiveInformation4 == 'Y')
      {//begin
    ?>  
    <input type="checkbox" checked> Bring medication to each visit?
    <?PHP
      }else
      {
    ?>
    <input type="checkbox" checked> Bring medication to each visit?
    <?PHP
      }
    ?>
</li>


<li>
   <?PHP
      if( $GiveInformation5 == 'Y')
      {//begin
    ?>
    <input type="checkbox" checked> How to correct behavior?
     <?PHP
      }else
      {
     ?>
    <input type="checkbox" checked> How to correct behavior?
    <?PHP
      }
    ?>
</li>
<li>
Other: <textarea cols="50" rows="2"><?PHP echo @$GiveInformation6; ?></textarea>
</li>
<li>ผู้ประเมิน : <font color="red"><?PHP echo  $name; ?></font></li>

</ul>
<?PHP
echo form_close();
?>


</body>
</html>

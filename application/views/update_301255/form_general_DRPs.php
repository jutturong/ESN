<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<?=$this->load->view('import_jquery')?>
</head>

<body>

<?PHP
echo form_fieldset($fieldset);
?>
    
<ul>
    Weight : <input name="textfield" type="text" id="textfield" size="10" readonly  maxlength="10" value="<?PHP echo @$Lab1;  ?>" />  kg.     
</ul>
    
    <ul>
        Height : <input name="textfield2" type="text" id="textfield2" size="10" readonly maxlength="10"  value="<?PHP echo @$Lab2;  ?>" />
    cm.
    </ul>  
    
    <ul>
        BSA : <input name="textfield2" type="text" id="textfield2" size="10" readonly maxlength="10"  value="<?PHP echo @$Lab3;  ?>" /> m  <sup>2</sup>   
    </ul>
    
    <ul>
        RR : <input name="textfield3" type="text" id="textfield3" size="10"  readonly  maxlength="10" value="<?PHP echo @$Lab4;  ?>" />
    times/min
    </ul>
    
    <ul>
        HR : <input name="textfield4" type="text" id="textfield4" size="10" readonly maxlength="10"  value="<?PHP echo @$Lab5;  ?>"/>
    bpm
    </ul>
    
    <ul>
        BP :  <input name="textfield5" type="text" id="textfield5" size="10" readonly  maxlength="10" value="<?PHP echo @$Lab6;  ?>" />
    mm. Hg
    </ul>
    
    <ul>
        BT : <input name="textfield6" type="text" id="textfield6" size="10"  readonly  maxlength="10"  value="<?PHP echo @$Lab7;  ?>"/>
    </ul>
    
    <ul>
    วัน - เดือน - ปี : <?PHP  $this->imagemodels->nextpage($select_name,$HN_val,$query_dmy,$url); ?>    
    </ul>
    
    
<?PHP
echo form_close();
?>


</body>
</html>

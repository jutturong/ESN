<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?=$title?></title>
<?=$this->load->view('import_jquery')?>
</head>

<body>
    <?PHP echo form_fieldset(' แสดงข้อมูล Imaging ของคนไข้ที่มา '); ?>
    <ul>
        HN : <input type="text" value="<?PHP echo @$HN; ?>" size="6" readonly> 
    </ul>
     <ul>
        Lab : <input type="text" value="<?PHP echo @$Lab; ?>" size="15" readonly> 
       
    </ul>
       <ul>
       Imaging Result : <input type="text" value="<?PHP echo @$Value; ?>" size="20" readonly> 
   
    </ul>
           <ul>
             
               วัน-เดือน-ปี ที่มา : <input type="text" value="<?PHP echo @$MonitoringDate; ?>" size="4" readonly/>
               
    </ul>
    <ul>
        เลือก วัน-เดือน-ปี ที่ต้องการดูข้อมูล :
        
        
        <?PHP //$this->imagemodels-> list_date_tabel_all($tb,$HN_name,$HN_val,$date_name,$select_name,$url);//วัน-เดือน-ปี ภายใน table  ?>
        <?PHP // $this->imagemodels->list_date_tabel_all($tb,'HN',$HN,'MonitoringDate',$select_name,$url); ?>
        <?PHP  $this->imagemodels->nextpage($select_name,$HN_val,$query_dmy,$url); ?>
        
    </ul>
    <?PHP form_close(); ?>
</body>
</html>

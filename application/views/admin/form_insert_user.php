<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<body>

   
   
<?=form_open('admin/insert_user_jquery')?>   
    <table width="634">
    
    
<tr>
         	 <td width="413">User :</td>
			<td width="209">
            <input name="user" type="text" id="user"  size="20" maxlength="10" />
    </td>
</tr>
 <tr>
         	 <td width="413">Password :</td>
			<td width="209">
            <input name="password" type="text" id="password" size="20" maxlength="10" />
    </td>
</tr>
 <tr>
         	 <td width="413">ชื่อของผู้ใช้ :</td>
			<td width="209">
            <input name="name" type="text" id="name"  size="20" maxlength="10" />
    </td>
</tr>
 <tr>
         	 <td width="413">จังหวัด :</td>
			<td width="209">
             
              <select name="id_province" id="id_province">
                <?
				    $pr=$this->db->get('province');
					foreach($pr->result() as $row)
					{
                        $prov_id_tb=$row->prov_id;
						$prov_name_tb=$row->prov_name;
						        ?>
								<option value="<?=$prov_id_tb?>" ><?=$prov_name_tb?></option>
                                <?
                    }
				?>
              </select>
                 
    </td>
</tr>
     

 <tr>
         	 <td width="413">รหัส :</td>
			<td width="209">
            <input name="code_user" type="text" id="code_user"  size="20" maxlength="10" />
    </td>
</tr>
 
 
  <tr>
         	 <td width="413">รหัสตาม สปสช :</td>
			<td width="209">
            <input name="code_hospital" type="text" id="code_hospital"  size="20" maxlength="10" />
    </td>
</tr>


  <tr>
         	 <td width="413">สิทธิการใช้งาน (admin/user) :</td>
	<td width="209">
<select name="id_typeuser" id="id_typeuser">
          <option value="1"  >Admin (ผุ้ดูแลระบบ)</option>
          <option value="2"  >User (ผุ้ใช้งานธรรมดา)</option>
      </select>
	</td>
</tr>
 
 
  <tr>
         	 <td width="413">สถานะการเข้าใช้งาน ( Yes อนุญาติ / No ไม่อนุญาติ ) :</td>
	<td width="209">
<select name="enable_user" id="enable_user">
          <option value="t"  >Yes</option>
        <option value="f"  >No</option>
      </select>
	</td>
</tr>


 <tr>
         	 <td width="413" colspan="2" align="center" valign="middle">
             &nbsp;
                 <button id="form_update">Insert</button>
                 <input name="id_user" type="hidden" id="id_user"  /></td>
	         <!--<td width="209">-->
	</td>
</tr>
     
      
</table>
<?=form_close()?>

</body>



</html>

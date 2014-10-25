<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?=$title?></title>

<?=$this->load->view('import_ext')?>
<?=$this->load->view('import_jquery')?>
<?=$this->load->view('send_system')?>


<script type="text/javascript">

$(function()
{

   	   $("#date_visit").datepicker(
	       {
		     
			 			                      changeMonth: true,
								   changeYear: true,
								   dateFormat:'yy-mm-dd',
								 //  showButtonPanel:true,
								  // appendText:'(yyyy-mm-dd)',
								 // minDate:0,
								   onSelect:function(dateText)
			                                  { 
														
														
//														 var  o=$(this).val().split("-");
//														 var  current=new Date();
//														 var   current_year=current.getFullYear(); //ปีปัจจุบัน
//														 var  ans= parseInt( current_year ) -  parseInt(o[0])  ;  
//													    $('#age').val(ans);
														
														
											   }

		   
		   }
		 );



});

</script>

</head>

<body>

<?=form_open('appendix/update_appendix_modify')?>
<table width="811" border="0" class="bordertable1">

<tr >
     <td height="31" colspan="2" align="center" class="bordertable1"><?=$heading?></td>
  </tr>

 
    <!--
     <tr>
    <td width="303" align="right">HN :</td>
    <td width="588">
    <input name="HN" type="text" id="HN" size="10" maxlength="6"  value="<?=$HN?>" />   
    
     <input name="id_appendix1" type="hidden" id="id_appendix1" value="<?=$id_appendix1?>" size="5" maxlength="5"  readonly="readonly"/> 
    <input name="appendix" type="hidden" id="appendix" value="5" />    </td>
  </tr>

  <tr>
    <td align="right">เลขที่บัตรประชาชน :</td>
    <td>
      <input name="person_id" type="text" id="person_id" size="15" maxlength="13" value="<?=$person_id?>"  />   </td>
  </tr>
  <tr>
    <td align="right">Epilepsy No :</td>
    <td width="588">
    <input name="ep_no" type="text" id="ep_no" size="5" maxlength="5" readonly="readonly" value="<?=$ep_no?>"  />   </td>
  </tr>
  
    <tr>
    <td align="right">ชื่อ-นามสกุล :</td>
    <td width="588">
      <input name="firstname" type="text" id="firstname" size="10" maxlength="25" value="<?=$name?>"   />
      -      
      <input name="surname" type="text" id="surname" size="15" maxlength="25"  value="<?=$surname?>"  /></td>
  </tr>
  
      <tr>
    <td align="right">เพศ :</td>
    <td width="588">
      
      <input name="sex" type="radio"  value="2"  <? if( $sex== 2 ) { ?>  checked="checked"   <? }  ?>  />
      (F) หญิง 
      <input type="radio" name="sex"  value="1" <? if( $sex== 1 ) { ?>  checked="checked"   <? }  ?>  />
      (M) ชาย      </td>
  </tr>

        <tr>
      <td align="right" valign="top" >วัน-เดือน-ปี เกิด :</td>
    <td width="588" height="2">
    <input name="birthdate" type="text"  value="<?=$birthdate?>" id="birthdate" size="10" maxlength="15"  >     </td>
  </tr>

        <tr>
      <td align="right" valign="top">อายุ :</td>
    <td width="588" height="2">
      <input name="age" type="text" id="age" size="4" maxlength="2" readonly="readonly" value="<?=$age?>"  />       </td>
      
        </tr>
      -->


<tr>
        <td width="513" align="right" valign="middle">
        
          <?=$this->load->view('form_insert/_app1_update')?>
         
<!--          <span id="show_app1">          
          </span>
-->          
          </td>
        <td width="373" align="left" valign="middle">&nbsp;
        
        
                </td>
        </tr>

        <tr>
      <td align="right" valign="top">วัน/เดือนน/ปี ที่เยี่ยมบ้าน :</td>
    <td width="498" height="2">
      <input name="date_visit" type="text" id="date_visit" size="10" maxlength="12"  value="<?=$date_visit?>"  />       </td>
  </tr>


        <tr>
      <td align="right" valign="top">ปัญหาที่พบ :</td>
    <td width="498" height="2">
     <textarea name="problem" cols="45" rows="1" id="problem" ><?=$problem?>
     </textarea>       
      
      </td>
  </tr>



                     <tr>
                     <td colspan="2" align="center">
                              <button>Update</button>                     
                              </td>
                     </tr>


</table>
<?=form_close()?>

</body>
</html>

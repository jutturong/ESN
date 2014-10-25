<?
   $sess_name=$this->session->userdata('sess_name');
   $sess_id_user=$this->session->userdata('sess_id_user');
   $tb="tbl_mainmenu";
  
  ##---------------------- จำนวนสมาชิก online --------------------
   $tb_online="tb_onlinestatus";
   $q1=$this->db->get_where($tb_online,array('id_statusonline'=>1));   //1=online,2=offline
     // $row=$q1->row();
   $num_online=$q1->num_rows();
   ##---------------------- จำนวนสมาชิก online --------------------
   
   
?>

<script type="application/javascript">
   //logout
   Ext.onReady(function()
       {
	         Ext.get('logout').on('click',function(e)
			      {
				        Ext.MessageBox.show({
						            title:'Easy Epilepsy Clinic'
									,layout:'absolute'
						            ,msg:'Exit EEC  Programe'
									,width:500
                                    //,html:'x:0,y:0'
									,x:50
									,y:10
									,autoScroll:true
									//,html:'Positioned at x:50,y:50'
									,html:'x:50,y:100'
									,progressText:'Pleas wait..'
									,progress:true
									,waitConfig:{ interval:1000 }
									,buttons:Ext.MessageBox.YESNO
									,fn:function(btn)
									    {
										   if( btn=='yes')
										   {
										      window.location='<?=base_url()?>index.php/home/logout/<?=$sess_id_user?>'
										   }
										   else if( btn=='no')
										   {
										       this.close();
										   }
										}
						                     });
				   });
	   
	   
	   });
   
   
   
    Ext.onReady(function(){
	       
		  
		   var  online=new Ext.form.FormPanel({
		          title:'จำนวนสมาชิก online : <?=$num_online?>  คน'
				  ,renderTo:Ext.get('online')
		          ,width:270
		          ,heigth:30
				  ,cls:'label1'
				  ,items:[
				       {     
				              xtype:'fieldset'
							 ,title:'ข้อมูลสมาชิก'
							 ,checkboxToggle:true
							 ,collapsed:false
							 ,width:250
							 ,labelWidth:80
							 ,autoHeight:false
							 ,items:[
							          {
												xtype:'compositefield'
											   ,fieldLabel:'ชื่อสมาชิก '
												,items:
												   [
													 {
														 xtype:'displayfield'
														,value:'<?=$sess_name?>'
													 }
												   ]
										}   
							        ]
				       }
				         ]
		                                       });
						   });
</script>

<!--1 form appendix --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/mainmenu_1.jpg" border="0">
</td>
</tr>
<!--content-->
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>1));
  foreach($q1->result() as $row)
  {
    $menucontent=$row->menucontent;
	$id_menu=$row->id_menu;
	$link_content=$row->link_content;
	$link_content = base_url().''.$link_content.'/'.$id_menu;
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <?=nbs(1)?>
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="<?=$link_content?>" >
   <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>
<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>

<?=br()?>



<!--2 HN appendix --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/mainmenu_2.jpg" border="0">
</td>
</tr>
<!--content-->
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>2));
  foreach($q1->result() as $row)
  {
    $menucontent=$row->menucontent;
	$link_content=$row->link_content;
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="<?=base_url()?><?=$link_content?>" >
 			  <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>
<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>


<?=br()?>


<!--3 search 
-->
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/mainmenu_3.jpg" border="0">
</td>
</tr>
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>3));
  foreach($q1->result() as $row)
  {
    $menucontent=$row->menucontent;
	$link_content=$row->link_content;
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="#" >
   <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>
<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>

</table>




<?=br()?>




<?=br()?>

<!--5 report --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="<?=base_url()?>index.php/report/" id="report">
<img src="<?=base_url()?>images/report.jpg" border="0">
</a>
</td>
</tr>
<!--content-->
<?
//  $this->db->select('*');
//  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
//  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>5));
//  foreach($q1->result() as $row)
//  {
//    $menucontent=$row->menucontent;
//	$link_content=$row->link_content;
?>

<!--<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="#" >
   <?
     //$menucontent
   ?>
    </a>
</td>
</tr>
<?
 //  }
?>
<tr>
-->


<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>




<?=br()?>

<!--6 form data --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/formdata.jpg" border="0">
</td>
</tr>
<!--content-->
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>6));
  foreach($q1->result() as $row)
  {
    $menucontent=$row->menucontent;
	$link_content=$row->link_content;
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="#" >
   <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>
<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>


<?=br()?>

<!--7 hardcopy --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/hardcopy.jpg" border="0">
</td>
</tr>
<!--content-->
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>7));
  foreach($q1->result() as $row)
  {
    $menucontent=$row->menucontent;
	 $link_content=$row->link_content;
	 
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
    <a href="#" >
   <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>
<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>

<?=br()?>




<!--4 administrator --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/admin.jpg" border="0">
</td>
</tr>
<!--content-->
<?
  $this->db->select('*');
  $this->db->join('tbl_menucontent','tbl_menucontent.id_menu=tbl_mainmenu.id_menu','inner');
  $q1=$this->db->get_where($tb,array($tb.'.id_headmenu'=>4));
  foreach($q1->result() as $row)
  {
      $menucontent=$row->menucontent;
	  $link_content=$row->link_content;
?>
<tr>
<td background="<?=base_url()?>images/bg_mainmenu.jpg" class="fontMenu">
     <img src="<?=base_url()?>images/vector.png"> 
       
         <a href="<?=base_url()?><?=$link_content?>" >
  				 <?=$menucontent?>
    </a>
</td>
</tr>
<?
  }
?>







<tr>
<td>
<img src="<?=base_url()?>images/buttommenu.jpg" border="0">
</td>
</tr>
</table>

<?=br()?>
<div id="online"></div>
<?=br()?>

<!--8 logout --> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<a href="#" id="logout">    <!--<?=base_url()?>index.php/home/logout/-->
<img src="<?=base_url()?>images/logout.jpg" border="0">
</a>
</td>
</tr>
</table>


<!--9 banner --> 
<!--<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<img src="<?=base_url()?>images/banner.jpg" border="0">
</td>
</tr>
</table>
-->
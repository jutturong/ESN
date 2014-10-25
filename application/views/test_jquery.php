<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<?
      require('import_jquery.php');
?>

<script language="javascript">
$("document").ready(function(){
            $("#top").click(function(){
                  jQuery.ajax({
                                    url: '<?=base_url()?>index.php/home/receive_json',
                                    type: 'GET',
                                    dataType: 'jsonp',
                                    dataCharset: 'jsonp',
                                    success: function (data){
                                      var content = data.msg;
                                      alert(content);
                                      $('#layDiv').html('');
                                      $('#layDiv').html(content);
                                      $('#layDiv').css("display","block");
                                    }
                    });
            });
});
</script>

</head>



<body>


<div  style="background-color:#333333;height:20px;">
<a id="top" href="javascript:void(0);" gt;Show Message></a>
</div>


<div id="layDiv" style="display:none;height:30px;font-weight:bold;color:#ff3300;"></div>



</body>
</html>

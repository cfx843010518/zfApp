<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/admin_right.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="total">
<form name="upload_from" id="upload_from" action="" method="post" enctype="multipart/form-data">
<table class="tableClass" width="95%" border="0" align="center" cellpadding="5" cellspacing="1" >
  <tr>
    <th height="22" colspan="2">��ͼƬ�ϴ���</th>
  </tr>
  <tr>
    <td width="25%" align="right">��ͼ�ϴ���</td>
    <td width="75%"><input name="upload_num" value="1" id="upload_num" style="width:30px;padding:2px 0;" />   <input type="submit" id="add_num" value="����" />(�����ϴ���ͼƬ����:)</td>
  </tr>
  <?php 
   $upload_num=$_POST["upload_num"]?$_POST["upload_num"]:1;
   for($i=0;$i<$upload_num;$i++){
  ?>
  <tr>
    <td width="25%" align="right">ͼƬ�ϴ���</td>
    <td width="75%">
    <input type="file" name="pic_upload[]" /> 
    ͼƬ˵��(alt)��<input type="text" name="pic_alt[]" />  
    ����ͼ��<input type="checkbox" value="1" name="pic_thumb[]" style="margin:0 5px;" />
    ��<input name="thumb_width[]" id="thumb_width" value="" style="margin:0 5px; width:40px;" />px  
    �ߣ�<input name="thumb_height[]" id="thumb_height" style="margin:0 5px; width:40px;" value="" />px</td>
  </tr>
  <?php }?>
   <tr>
    <td width="25%" align="right"></td>
    <td width="75%"><input type="submit" value="�ϴ�" name="upload_submit" /></td>
  </tr>
</table>
</form>

</div>
</body>
</html>
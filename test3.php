<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
 <html xmlns="http://www.w3.org/1999/xhtml"> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=gb2312" /> 
 <title>�ĵ��ϴ�</title> 
 </head> 
 <body> 
 <script language="javascript">
 <!-- ��̬����ļ�ѡ��ؼ�--> 
function AddRow() 
 { 
 var eNewRow = tblData.insertRow(); 
 for (var i=0;i<1;i++) 
 { 
 var eNewCell = eNewRow.insertCell(); 
 eNewCell.innerHTML = "<tr><td><input type='file' name='filelist[]' size='50'/></td></tr>"; 
 } 
 } 
 // --></script> 
 <form name="myform" method="post" action="uploadfile.php" enctype="multipart/form-data" > 
 <table id="tblData" width="400" border="0"> 
 <!-- ���ϴ��ļ�������post�ķ�����enctype="multipart/form-data" --> 
 <!-- ����ҳ����ַ����uploadfile.php--> 
 <input name="postadd" type="hidden" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]; ?>" /> 
 <tr><td>�ļ��ϴ��б� 
<input type="button" name="addfile" onclick="AddRow()" value="����б�" /></td></tr> 
 <!-- filelist[]������һ������--> 
 <tr><td><input type="file" name="filelist[]" size="50" /></td></tr> 
 </table> 
 <input type="submit" name="submitfile" value="�ύ�ļ�" /> 
 </form> 
 </body> 
 </html>
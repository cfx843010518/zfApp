<html>
<head><title>����ļ��ϴ���</title></head>
<body>
<style>
    form{
        margin: 20px;
        padding: 10px;
    }

    #picInput>input{
        display: block;
        margin: 10px;
    }


</style>
<form action="pic.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <div id="picInput">
        �ϴ�ͼƬ��<input type="file" name='myfile[]'>
    </div>
    <input id="addBtn" type="button" onclick="addPic1()" value="�������ͼƬ"><br/><br/>
    <input type="submit" value="�ϴ��ļ�">
</form>

<script>
    function addPic1(){
        var addBtn =  document.getElementById('addBtn');
        var input = document.createElement("input");
        input.type = 'file';
        input.name = 'myfile[]';
        var picInut = document.getElementById('picInput');
        picInut.appendChild(input);
        if(picInut.children.length == 3){
            addBtn.disabled = 'disabled';
        }
    }
</script>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><title>选择数据表</title>
<meta charset="utf-8">
<style type = "text/css">
    a{text-decoration: none;font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);}
    a:link{color:#00FFFF;}
    a:hover{color:#FF00FF;}
    a:visited{color:#00FFFF;}
    a:active{color:#FF00FF;}
</style>

<body>
<input type="button" value="登出"  style="margin:20px 10px 0px 1200px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='<?php echo U('Home/Index/index');?>'">

<div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:90px 0px 0px 0px" align="center">
    <h>请选择数据表</h>
</div>

<form action="<?php echo U('Home/Index/showtable');?>" method="post" style="margin: 50px auto;padding:50px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px;">
    <select name="select_db" style="margin: 50px auto;padding:10px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px">
        <?php $__FOR_START_1583580090__=0;$__FOR_END_1583580090__=$tot;for($i=$__FOR_START_1583580090__;$i < $__FOR_END_1583580090__;$i+=1){ if($tbname[$i] != 'user'): ?><option value=<?php echo ($tbname[$i]); ?>><?php echo ($tbname[$i]); ?></option><?php endif; } ?>    
    </select>

    <input type="submit" value="查询" style ="margin:10px 150px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;">

</form>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>登录界面</title>
    <style type = "text/css">
        a{text-decoration: none;font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);}
        a:link{color:#00FFFF;}
        a:hover{color:#FF00FF;}
        a:visited{color:#00FFFF;}
        a:active{color:#FF00FF;}
    </style>
</head>
<body>
<div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:150px 0px 0px 0px" align="center">
    <h>请登录MySQL</h>
</div>
<form action="<?php echo U('Home/Index/login');?>" method="post" style="margin: 50px auto;padding:50px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px;">
    <input  type="text" name="user"  style = "margin:5px;background-color: rgb(250, 255, 189) !important; border-radius: 3px;box-shadow: none; color: rgb(0, 0, 0);line-height: 26px;width:350px;" placeholder="用户名">
    <input  type="password" name="password"  style = "margin:5px;background-color: rgb(250, 255, 189) !important; border-radius: 3px;box-shadow: none; color: rgb(0, 0, 0);line-height: 26px;width:350px;" placeholder="密码">
    <input type="submit" value="登录" style ="margin:10px 150px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;"align="center">
</form>

</body>
</html>
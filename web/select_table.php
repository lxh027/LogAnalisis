<title>选择数据表</title>
<meta charset="utf-8">
<style type = "text/css">
    a{text-decoration: none;font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);}
    a:link{color:#00FFFF;}
    a:hover{color:#FF00FF;}
    a:visited{color:#00FFFF;}
    a:active{color:#FF00FF;}
</style>

<body>
<input type="button" value="登出"  style="margin:20px 10px 0px 1200px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='login.html'">

<div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:90px 0px 0px 0px" align="center">
    <h>请选择数据表</h>
</div>

<form action="show_table.php" method="get" style="margin: 50px auto;padding:50px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px;">
    <select name="select_db" style="margin: 50px auto;padding:10px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px">
        <?php
        $con=mysqli_connect("localhost","root","") or die("数据库链接失败");
        $sel=mysqli_select_db($con,"loganalisis") or die("数据库选择失败");
        $sql="show tables from loganalisis";
        $result=mysqli_query($con,$sql);
        while ($tb=mysqli_fetch_row($result))
            if ($tb[0]!='user'){
                ?>
                <option value=<?php echo $tb[0]; ?>><?php echo $tb[0]; ?></option>
                <?php
            }
        mysqli_free_result($result);
        ?>
    </select>

    <input type="submit" value="查询" style ="margin:10px 150px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;">

</form>
</body>
</html>
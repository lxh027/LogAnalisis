<title>查询表格信息</title>
<mata charset="utf-8">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php
    $tb_name=$_GET["select_db"];
    $fd_name=$_GET["select_fd"];
    $content=$_GET["content"];
    $con=mysqli_connect("localhost","root","") or die("数据库链接失败");
    $sel=mysqli_select_db($con,"loganalisis") or die("数据库选择失败");
    mysqli_query($con,"set names utf8");
    if (isset($_GET["page"]))$page=$_GET["page"];
    else $page=1;
    $starttime = explode(' ',microtime());
    $result=mysqli_query($con,"select count(*) as num from $tb_name where $fd_name like '%$content%'");
    $endtime = explode(' ',microtime());
    $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
    $thistime = round($thistime,3);
    $recordcount=(int)mysqli_fetch_assoc($result)['num'];
    $start=($page-1)*100;
    $lastpage=ceil($recordcount/100);
    ?>
    <style>
        .m-tb {font-size: 12px;}
        .m-tb th { background-color: #c3dde0; border: 1px solid #aaaaaa; padding: 2px; }
        .m-tb td { background-color: #ffffff; border: 1px solid #aaaaaa; padding: 2px; }
    </style>
    <input type="button" value="返回"  style="margin:20px 10px 0px 1108px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='show_table.php?<?php echo "select_db=$tb_name" ?>'">
    <input type="button" value="登出"  style="margin:20px 10px 0px 10px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='login.html'">
    <div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:50px 0px 50px 0px" align="center">
        <h><?php echo $tb_name?>查找</h></br>
    </div>
    <div class="panel panel-default" align="center" style="margin:0px 0px 0px 0px;">
        <div style="font-size:10px;font-family:微软雅黑;color:rgb(98,94,91);margin:2px 0px 2px 0px" align="center">
            字段：<?php echo $fd_name?>,关键字：<?php echo $content?>,查找到<?php echo $recordcount?>条记录，用时<?php echo $thistime?>s
        </div>
        <table class="m-tb" border="1px" cellspacing="0px" width="80%">
            <ul class="pagination">
                <?php
                if ($page!=1){
                    ?>
                    <li><a href="?<?php echo "select_db=$tb_name&select_fd=$fd_name&content=$content" ?>&page=1"><<</a></li>
                    <?php
                }
                if ($page!=1){
                    ?>
                    <li><a href="?<?php echo "select_db=$tb_name&select_fd=$fd_name&content=$content" ?>&page=<?php echo $page-1 ?>"><</a></li>
                    <?php
                }
                ?>
                <li><a><?php echo "第$page"."页"?></a></li>
                <?php
                if ($page!=$lastpage){
                    ?>
                    <li><a href="?<?php echo "select_db=$tb_name&select_fd=$fd_name&content=$content" ?>&page=<?php echo $page+1 ?>">></a></li>
                    <?php
                }
                if ($page!=$lastpage){
                    ?>
                    <li><a href="?<?php echo "select_db=$tb_name&select_fd=$fd_name&content=$content" ?>&page=<?php echo $lastpage ?>">>></a></li>
                    <?php
                }
                ?>
            </ul>
            <?php
            $sql="show columns from $tb_name";
            $result=mysqli_query($con,$sql);
            echo "<tr>";
            while ($hd=mysqli_fetch_row($result)){
                ?>
                <th><?php echo $hd[0] ?></th>
                <?php
            }
            echo "</tr>";
            mysqli_free_result($result);
            ?>

            <?php
            $sql="select * from $tb_name where $fd_name like '%$content%' limit $start,100";
            $result=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_row($result)){
                echo "<tr>";
                for ($i=0;$i<sizeof($row);$i++){
                    ?>
                    <td><?php
                        $s='';
                        for ($j=0;$j<strlen($row[$i]);$j++)
                            if ($row[$i][$j]==' ') $s.='&nbsp';
                            else $s.=$row[$i][$j];
                        echo $s;
                        ?></td>
                    <?php
                }
                echo "</tr>";
            }
            mysqli_free_result($result);
            ?>
        </table>
        <div style="height: 100px"></div>
    </div>

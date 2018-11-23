<?php if (!defined('THINK_PATH')) exit();?><title>显示表格信息</title>
<mata charset="utf-8">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .m-tb {font-size: 12px;}
        .m-tb th { background-color: #c3dde0; border: 1px solid #aaaaaa; padding: 2px; }
        .m-tb td { background-color: #ffffff; border: 1px solid #aaaaaa; padding: 2px; }
    </style>
    <input type="button" value="返回"  style="margin:20px 10px 0px 1108px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='<?php echo U('Home/Index/showtable');?>'">
    <input type="button" value="登出"  style="margin:20px 10px 0px 10px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='<?php echo U('Home/Index/index');?>'">
    <div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:50px 0px 50px 0px" align="center">
        <h><?php echo ($tbname); ?></h>
    </div>

    <div class="panel panel-default" align="center" style="margin:0px 0px 0px 0px;">
    <div style="font-size:10px;font-family:微软雅黑;color:rgb(98,94,91);margin:2px 0px 2px 0px" align="center">
        字段：<?php echo ($fdname); ?>,关键字：<?php echo ($key); ?>,查找到<?php echo ($tot); ?>条记录，用时<?php echo ($time); ?>s
    </div>
    <div class="panel-body center">
        <tr>
            <td>
                <?php echo ($page); ?>
            </td>
        </tr>
    </div>
    <table class="m-tb" border="1px" cellspacing="0px" width="80%">
    <tr>
        <?php $__FOR_START_670073476__=0;$__FOR_END_670073476__=$columns_sum;for($i=$__FOR_START_670073476__;$i < $__FOR_END_670073476__;$i+=1){ ?><th><?php echo ($columns[$i]); ?></th><?php } ?> 
    </tr>    
    <?php $__FOR_START_835738206__=0;$__FOR_END_835738206__=$count;for($i=$__FOR_START_835738206__;$i < $__FOR_END_835738206__;$i+=1){ ?><tr>
            <?php $__FOR_START_1907444896__=0;$__FOR_END_1907444896__=$columns_sum;for($j=$__FOR_START_1907444896__;$j < $__FOR_END_1907444896__;$j+=1){ ?><td><?php echo ($list[$i][$columns[$j]]); ?></td><?php } ?>
        </tr><?php } ?>

    </table>
        <div style="height: 100px"></div>
    </div>
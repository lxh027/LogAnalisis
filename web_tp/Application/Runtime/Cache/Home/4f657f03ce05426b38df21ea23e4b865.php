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
    <input type="button" value="返回"  style="margin:20px 10px 0px 1108px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='<?php echo U('Home/Index/choose');?>'">
    <input type="button" value="登出"  style="margin:20px 10px 0px 10px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;" onclick="location='<?php echo U('Home/Index/index');?>'">
    <div style="font-size:25px;font-family:微软雅黑;color:rgb(98,94,91);margin:50px 0px 50px 0px" align="center">
        <h><?php echo ($tbname); ?></h>
    </div>
    <form action="<?php echo U('Home/Index/search');?>" method="post" style="margin: 10px auto;padding:10px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:450px;">
        <select name="select_fd" style="margin: 10px auto;padding:2px;box-shadow: 1px 1px 2px 1px #aaaaaa;border-radius: 3px;width:400px">
                <?php $__FOR_START_40567116__=0;$__FOR_END_40567116__=$columns_sum;for($i=$__FOR_START_40567116__;$i < $__FOR_END_40567116__;$i+=1){ ?><option value=<?php echo ($columns[$i]); ?>><?php echo ($columns[$i]); ?></option><?php } ?>        
        </select>
        <input  type="text" name="content"  style = "margin: 10px auto;padding:2px;border-radius: 3px;width:400px">
        <input type="submit" value="搜索" style ="margin:10px 150px;height : 36px;border:1px;background-color:#00bee7;color:#fff;width:72px;border-radius: 3px;"align="center">
    </form>

    <div class="panel panel-default" align="center" style="margin:0px 0px 0px 0px;">
    <div class="panel-body center">
        <tr>
            <td>
                <?php echo ($page); ?>
            </td>
        </tr>
    </div>
    <table class="m-tb" border="1px" cellspacing="0px" width="80%">
    <tr>
        <?php $__FOR_START_582007617__=0;$__FOR_END_582007617__=$columns_sum;for($i=$__FOR_START_582007617__;$i < $__FOR_END_582007617__;$i+=1){ ?><th><?php echo ($columns[$i]); ?></th><?php } ?> 
    </tr>    
    <?php $__FOR_START_403338699__=0;$__FOR_END_403338699__=$count;for($i=$__FOR_START_403338699__;$i < $__FOR_END_403338699__;$i+=1){ ?><tr>
            <?php $__FOR_START_152205698__=0;$__FOR_END_152205698__=$columns_sum;for($j=$__FOR_START_152205698__;$j < $__FOR_END_152205698__;$j+=1){ ?><td><?php echo ($list[$i][$columns[$j]]); ?></td><?php } ?>
        </tr><?php } ?>

    </table>
        <div style="height: 100px"></div>
    </div>
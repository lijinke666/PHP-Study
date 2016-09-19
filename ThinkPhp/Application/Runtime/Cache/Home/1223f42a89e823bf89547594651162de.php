<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <style>
        body,body,input,button{
            font-family: 'Microsoft YaHei UI';
        }
        table{
            width:50%;
        }
        td{
            padding: 8px;
        }
        a{
            display: inline-block;
            text-decoration: none;
            width: 120px;
            height:35px;
            text-align: center;
            line-height: 35px;
            color:#FFF;
            background: rgba(153, 82, 16, 0.5);
            border-radius: 2px;
            text-shadow: 1px 1px 2px rgba(0,0,0,.4);
        }
    </style>
</head>
<body>
<h2>公用部分</h2>

<div><h2>公用头部</h2></div>


<form action="<?php echo U('Index/update');?>" method="post">
<table border="1">
    <tr>
        <td><strong>id</strong></td>
        <td><strong>收货地址</strong></td>
        <td><strong>昵称</strong></td>
        <td><strong>性别</strong></td>
        <td><strong>操作</strong></td>
    </tr>
    <?php if($detailData): if(is_array($detailData)): foreach($detailData as $key=>$v): ?><tr>
            <td><?php echo ($v['i_u_id']); ?></td>
            <td><input type="text" value="<?php echo ($v['i_address']); ?>" name="i_address"></td>
            <td><input type="text" value="<?php echo ($v['i_name']); ?>" name="i_name"></td>
            <td><?php echo ($v['i_sex']); ?></td>
            <td><input type="submit" value="提交"></td>
            <input type="hidden" value="<?php echo ($v['i_u_id']); ?>" name="i_u_id">
        </tr><?php endforeach; endif; ?>
    <?php else: ?>
        <tr><td colspan="5" style="color:#FFF;">暂无数据</td></tr><?php endif; ?>
    <tr>
        <td colspan="5"><a href="<?php echo U('Index/index');?>">返回</a></td>
    </tr>
</table>
</form>
    <script>
        window.onload=function(){
            var tr =  document.querySelectorAll("tr");
            for(var i=0; i<tr.length; i++){
                tr[i*2+1].style.backgroundColor="rgba(0,0,0,0.2)";
            }
        }
    </script>

<footer><h2>公用底部</h2></footer>
</body>
</html>
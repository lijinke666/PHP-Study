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


<table border="1" style="text-align: center">
    <tr>
        <td>id</td>
        <td>手机号</td>
        <td>密码</td>
        <td>操作</td>
    </tr>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
        <td><?php echo ($v['u_id']); ?></td>
        <td><?php echo ($v['u_user']); ?></td>
        <td><?php echo ($v['u_pwd']); ?></td>
        <td><a href="<?php echo U('Index/detail', array('id'=>$v['u_id']));?>">详情</a></td>
    </tr><?php endforeach; endif; ?>
    <tr>
        <?php echo ($divNode); ?>
    </tr>

</table>

<footer><h2>公用底部</h2></footer>
</body>
</html>
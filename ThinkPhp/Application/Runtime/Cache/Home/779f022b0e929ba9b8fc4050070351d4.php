<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <style>
        *{
            font-family: 'Microsoft YaHei';
            text-align: center;
        }
    </style>
</head>
<body>
<h5>你好 <strong><?php echo ($user); ?></strong></h5>
<h2>图书列表</h2>
<table width="50%" border="1" align="center">
    <thead>
    <tr>
        <td>图书id</td>
        <td>图书名称</td>
        <td>图书类型</td>
        <td>操作</td>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($bookData)): foreach($bookData as $key=>$v): ?><tr>
            <td><?php echo ($v['b_id']); ?></td>
            <td><?php echo ($v['b_bookname']); ?></td>
            <td><?php echo ($v['b_type']); ?></td>
            <td><a href="<?php echo U('Book/delete',array('id'=>$v['b_id']));?>">删除</a>&nbsp;|&nbsp;<a href="<?php echo U('Book/bookInfo',array('id'=>$v['b_id']));?>">详情</a></td>
        </tr><?php endforeach; endif; ?>
    </tbody>
    <tr>
        <td colspan="4"><a href="<?php echo U('Book/addBook');?>">添加图书</a></td>
    </tr>
</table>
</body>
</html>
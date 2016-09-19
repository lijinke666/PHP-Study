<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <style>
        body{
            text-align: center;
            font-size:16px;
            font-family: "Microsoft YaHei";
        }
    </style>
</head>
<body>
<h2 style="text-align: center">书籍详情</h2>
<table border="1" width="70%" align="center">
    <thead>
    <tr>
        <td>id</td>
        <td>书籍名称</td>
        <td>书籍简介</td>
        <td>类型</td>
        <td>上市时间</td>
    </tr>
    </thead>
    <tbody>
    <?php if($infoData): if(is_array($infoData)): foreach($infoData as $key=>$v): ?><tr>
                <td><?php echo ($v['i_b_id']); ?></td>
                <td><?php echo ($v['b_bookname']); ?></td>
                <td><?php echo ($v['i_brief']); ?></td>
                <td><?php echo ($v['b_type']); ?></td>
                <td><?php echo (date('Y年m月d日',strtotime($v['i_registe_date'])));?></td>
            </tr><?php endforeach; endif; ?>
    <?php else: ?>
        <tr><td colspan="5">暂无数据</td></tr><?php endif; ?>
    <tr>
        <td colspan="5"><a href="<?php echo U('Book/home');?>">返回</a></td>
    </tr>
    </tbody>
</table>
<h2>用户评论</h2>
<table border="1" width="40%" align="center">
    <tr>
        <td>昵称</td>
        <td>评论</td>
        <td>时间</td>
    </tr>
    <?php if($commentData): if(is_array($commentData)): foreach($commentData as $key=>$v): ?><tr>
            <td><?php echo ($v['u_user']); ?></td>
            <td><?php echo ($v['c_msg']); ?></td>
            <td><?php echo (date('Y年m月d日',strtotime($v['c_date'])));?></td>
        </tr><?php endforeach; endif; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">暂无评价</td>
        </tr><?php endif; ?>
</table>
<h2>我要评论</h2>
<form action="<?php echo U('Book/talk');?>" method="post">
    <input type="hidden" value="<?php echo ($c_b_id); ?>" name="id">
    <textarea type="text" placeholder="输入评论" cols="30" rows="5" name="talkMsg"></textarea><br/><button type="submit">提交</button>
</form>
<a href="<?php echo U('Page/index');?>">查看所有书籍评论</a>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
</head>
<body>
<h2>添加书籍</h2>
<form action="<?php echo U('Book/add');?>" method="post">
<fieldset>
    <p><span>书籍名:</span><input type="text" placeholder="请输入书籍名称" name="bookname"></p>
    <p><span>类型:</span>
        <select name="type" id="">
            <option value="爱情">爱情</option>
            <option value="励志">励志</option>
            <option value="小说">小说</option>
            <option value="都市">都市</option>
            <option value="玄幻">玄幻</option>
            <option value="成长">成长</option>
            <option value="名著">名著</option>
    </select>
    </p>
    <p><span>描述:</span>
        <textarea placeholder="书籍简介" name="brief"></textarea>
    </p>
    <p>
        <span>上市时间:</span><input type="date" placeholder="上市时间" name="date">
    </p>
    <p><button type="submit">添加</button></p>
</fieldset>
    <a href="<?php echo U('Book/home');?>">返回</a>
</form>
</body>
</html>
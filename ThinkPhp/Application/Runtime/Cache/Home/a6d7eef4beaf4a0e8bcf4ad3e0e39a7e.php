<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
</head>
<body>
<h2>图书管理系统</h2>
<form action="<?php echo U('Book/checkLogin');?>" method="post">
    <fieldset>
        <p>
            <span>账号:</span><input type="text" placeholder="请输入账号" name="user">
        </p>
        <p>
            <span>密码:</span><input type="text" placeholder="请输入密码" name="pwd">
        </p>
        <p>
            <input type="submit" value="登录">
        </p>
    </fieldset>

</form>
</body>
</html>
<?php
return array(
    //'配置项'=>'配置值'
    'URL_HTML_SUFFIX'  => '',       //伪静态后缀
    'URL_MODEL' => 2,               //重写模式

    //数据库配置
    'DB_TYPE' => 'mysql',             //数据库类型
    'DB_USER' => 'root',              //用户名
    'DB_PWD'  => '',                  //密码
    'DB_HOST' => 'localhost',         //主机
    'DB_PORT' => '3306',              //端口
    'DB_NAME' => 'book',              //数据库名称
    'DB_CHARSET' => 'utf8' ,          //编码

    //路径配置
    'TMPL_PARSE_STRING' => array(
        '__WWW_JK__' => '/Public/study1'
    )
    
);
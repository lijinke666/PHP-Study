<?php
    echo '你好啊'.'php！';
    $string = "123";
    $int = 123;
    $floot =12.3;
    $array= array("123","126");
    var_dump($string);             //显示变量的数据类型
    var_dump($int);
    var_dump($floot);
    var_dump($array);

  $m= memory_get_usage().'<br/>';            //获取当前php消耗的内存
  echo $m;
  $m = memory_get_usage()-$m;
  echo $m;
?>
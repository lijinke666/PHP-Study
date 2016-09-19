<?php
   $nowDate = date('m-d');        //获取当天日期
   $week = date("w");        //星期几
   echo $nowDate."<br/>";
   echo $week;

   $random = rand(1,50);        //获取1--50之间的随机数
   echo "<br/>".$random;
?>
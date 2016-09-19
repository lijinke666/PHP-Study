<?php
    $array = array("李金珂","赵日天");
    foreach ($array as $key) {
    	echo $key.'<br/>';
    }

    $Array1 = array(
    	'id' => '11111',
    	'key' => '22222',
    	'slkd' => '33333',
    	'ksd' => '44444',
    	);
    foreach($Array1 as $k=>$v){
    	echo $k."&nbsp;".$v."<br/>";
    }
	print_r($array);        //打印数组       也可以打印对象
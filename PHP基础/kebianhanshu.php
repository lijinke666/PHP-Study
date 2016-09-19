<?php
	//可变函数
	function fn(){
		
	}
	$a= fn();
	$a;
	if(function_exists($a)){
		echo '这是 一个函数111';
	}else{
		echo '这不是一个函数';
	}

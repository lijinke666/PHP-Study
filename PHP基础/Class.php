<?php
	header("Content-Type: text/html;charset=utf-8");
/*======================类====================================*/
  $br="<br/>";
	class Dog{                    //创建类
		var $dog= '李金珂';
		function getDogName(){
			return $this->dog;
		}
	}
	$dog = new Dog();             //第一种方法  实例化
	$dog2 ='Dog';                 //也可以采用变量创建
	echo $dog->getDogName();

/*=============================================================*/

	class Name{
		public $a ="李金珂";           //公用
		protected $b ="赵日天";        //受保护
		private $c="嘿嘿黑";           //私有
		public static $aa="李金珂";    //static表示静态变量   通过  ::直接输入  不用实例化
		function getB(){
			return $this->b;
		}
	}
	$name = new Name();
	echo "<br/>".$name->getB()."<br/>";
	echo Name::$aa."<br/>";        //如果是静态的变量不用实例化函数  通过:: 调用

/*===========================================================*/

/*=========================构造函数和析构函数================*/
   class ParentClass{
	   function __construct(){
		   print "父类构造函数被调用"."<br/>";
	  }  
	  public $a="父类";
   }
   // $parent = new ParentClass();         //实例化的时候会自动调用  __construct();

   class ChildClass extends ParentClass{          //继承 ParentClass 类
   	function __construct(){
   		print "子类构造函数被调用"."<br/>";
   		parent::__construct();                   //继承之后  如果要输出父类 的构造函数  使用　parent::__construct();
   	}
   }

   $parent = new ChildClass();
   echo $parent->a;


 /*======================静态关键字　static ================================*/
  class Sta{
  	public static $static =20;
  	public static function up(){
  		return self::$static;                 //静态变量  $this没用  需要使用self::获取    如果是继承 使用 parent::  获取
  	}
  }
  class ParentSta extends Sta{
  	public static function go(){
  		 return parent::up();
  	}
  }
  echo "<br/>";
  echo Sta::$static.$br;
  echo Sta::up().$br;
  echo ParentSta::go();
?>
<meta charset="UTF-8">
<?php
	class A{
	    	function foo(){
		       if (isset($this)){
		       	echo '$this 는 정의되었습니다. (';
		       	echo get_class($this);
		       	echo ")\n";
		      	}else{
		      		echo "\$this 는 정의되지 않았습니다.\n";
		      }
	    	}
	}

	class B{
		function bar(){
			// Note: 다음 라인은 E_STRICT 가 활성화 되었을 경우 warning을 발생시킵니다.
			A::foo();
		}
	}

	$a = new A();
	$a->foo();
	echo "<br>";

	// Note: 다음 라인은 E_STRICT 가 활성화 되었을 경우 warning을 발생시킵니다.
	A::foo();
	echo "<br>";
	$b = new B();
	$b->bar();
	echo "<br>";

	// Note: 다음 라인은 E_STRICT 가 활성화 되었을 경우 warning을 발생시킵니다.
	B::bar();
	echo "<br>";

	class SimpleClass{}
	$instance = new SimpleClass();
	$assigned   =  $instance;
	$reference  =& $instance;

	$instance->var = '$assigned 는 이 값을  가지게 됩니다.';

	$instance = null; // $instance and $reference become null

	var_dump($instance);
	echo "<br>";
	var_dump($reference);
	echo "<br>";
	var_dump($assigned);
	echo "<br>";

	function swap($a, $b){
		$tem = $a;
		$a = $b;
		$b = $tem;
	}

	$i = 3;
	$j = 4;

	print "$i, $j <br>";
	swap('i', 'j');
	print "$i, $j";
	echo "<br>";

	function swap2($a, $b){
		global $$a, $$b;
		$tem = $$a;
		$$a = $$b;
		$$b = $tem;
	}

	$i = 3;
	$j = 4;

	print "$i, $j <br>";
	swap2('i', 'j');
	print "$i, $j";
	echo "<br>";

	function swap3(&$a, &$b){
		$tem = $a;
		$a = $b;
		$b = $tem;
	}

	$i = 3;
	$j = 4;

	print "$i, $j <br>";
	swap3($i, $j);
	print "$i, $j";
	echo "<br>";


	class Test
{
    static public function getNew()
    {
        return new static;
    }
}

class Child extends Test
{}

$obj1 = new Test();
$obj2 = new $obj1;
var_dump($obj1 !== $obj2);
echo "<br>";

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);
echo "<br>";

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);
echo "<br>";
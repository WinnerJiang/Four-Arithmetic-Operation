<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://ww
	w.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">
<!--
 * Created on Jan 27, 2015
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
-->
 <head>
  <title> Four Arithmetic Operation</title>
 </head>
 <body>

<?php
// define variables
$firstNum = $secondNum =0;
$result =null;
$waringForExp = $warningFirstNum = $warningSecondNum="";
$operation = "";
$inputErr= false;

@$firstNum = $_POST["firstNum"];
@$secondNum = $_POST["secondNum"];

// this function used for "Notice: Undefined index/variable"
function _post($str){
	$var = !empty($_POST[$str])?$_POST[$str]:null;
	return $var;
}
//check the input are all numbers
function checkInput($a , $b){
	if($a && $b/*&&($a!=0)&&($b!=0)*/){
		//both variables are not null
		if(!is_numeric($a)) {
			// the first varialbe is not number	
			if(!is_numeric($b)){
				//the second variable is not number
				$warningFirstNum="The first variable is not a number!";
				$warningSecondNum="The second variable is not a number!";
				echo "41";
				return false;
			}
			else{
				//the second varible is number
				$warningFirstNum="The first variable is not a number!";
				echo "45",$warningFirstNum;
				return false;
			}
		}
		else{
			//the first variable is number
			if(!is_numeric($b)){
				//the second variable is not number
				$warningSecondNum="The second variable is not a number!";
				echo "47",$warningSecondNum;
				return false;
			}
			// both of the variables are numbers
			else return true;
		}		

	}else{
		// at least one variable is null or 0
		if($a){
			// the first variable is neither null nor 0 and the second variable is null or 0
			if(!is_numeric($a)){
				// the first variable is not number
				$warningFirstNum="The first variable is not a number!";
				if(!is_numeric($b)){
					// the seconde variable is null
					$warningSecondNum="Pls input the second number!";
					echo "74";
					return false;
				}else{
					// the seconde variable is 0
					return false;
				}
			}
			else {
				// the first variable is number
				if(!is_numeric($b)){
					// the seconde variable is null
					$warningSecondNum="Pls input the second number!";
					echo "87";
					return false;
				}else{
					// the seconde variable is 0
					return true;
				}
			}
		}
		else if($b){
			//the first variable is null or 0 and the second variable is neither null nor 0
			if(!is_numeric($b)){
				//the second variable is not number
				$warningSecondNum="The second variable is not a number!";
				if(!is_numeric($a)){
					// the first variable is null
					$warningFirstNum="Pls input the first number!";
					return false;
				}
				else {
					// the first variable is 0
					return false;
				}
			}else{
				//the second variable is number
				if(!is_numeric($a)){
					// the first variable is null
					$warningFirstNum="Pls input the first number!";
					echo "87";
					return false;
				}else{
					// the first variable is 0
					return true;
				}
			}
		}
		else{
			//both of the variables are null or 0
			if($a==0){
				if($b==0)
					return true;
				else {
					// the seconde variable is null
					$warningSecondNum="Pls input the second number!";
					return false; 
				}
			}else{
				// the first variable is null
				$warningFirstNum="Pls input the first number!";
				if($b==0){
					return false;
				}else {
					//the seconde variable is null
					$warningSecondNum="Pls input the second number!";
					return false;
				}
			}
		}
	}
}

// if($_POST["add"]){
  if(_post("add")){
  		if(checkInput($firstNum,$secondNum)){
  			$operation="+";
 			$result = $firstNum + $secondNum;
  		}
  		else $inputErr = true;
  }

  if(_post("sub")){
  	if(checkInput($firstNum,$secondNum)){
  		$operation="-";
  		$result = $firstNum - $secondNum;	
  	}
  	else $inputErr = true;	

  }

  if(_post("multi")){
  	if(checkInput($firstNum,$secondNum)){
  		$operation="*";
   		$result = $firstNum * $secondNum;
  	}
  	else $inputErr = true;
  	
  }
  
  if(_post("div")){
  	if(checkInput($firstNum,$secondNum)){
  		// check both number is legal for opertation
  		$operation="/";
  		if($secondNum){
  	    	$result = $firstNum / $secondNum;
  		}
  		else{
  			$waringForExp="Zero cannot be divisor!";
  		}
  	}
  	else $inputErr = true;
  }
?>
	<p>
		<h3>Four Arithmetic Operation</h3>
	</p> 

 	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"> 
 	First Number:<input type="text" name="firstNum" value="<?php echo $firstNum ?>" >
 	<div style="color:red"><?php echo $warningFirstNum ?></div>
 	<br>
 	<br>
 	Second Number:<input type="text" name="secondNum" value="<?php echo $secondNum ?>">
 	<span style="color:red"><?php echo $warningSecondNum ?></span>
 	<div style = "color:red"><?php echo $waringForExp ?></div>
 	<br>
 	<br>Choose one operation:
 	<br>
 	<input id="add" type=submit name="add" value="+">
 	<input id="sub"  type=submit name="sub" value="-">
 	<input id="multi"  type=submit name="multi" value="*"> 
 	<input id="div"  type=submit name="div" value="/"> 
 	<br>
 	<br>
 	The result is:

 	<?php 
 		if(!$inputErr)
 			echo $firstNum,$operation,$secondNum,"=",$result;
 		else echo "Please enter the correct variables!";
 	 ?>
 </body>
</html>

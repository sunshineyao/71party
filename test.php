<?php
/**
* Author csuhan
* https://lovesmg.cn
*/
include 'dangkeauto.class.php';
if(!isset($_SERVER['argv'][1])){
	print('please enter like this: php test2.php [you score_id] [wanted_score]');
	exit();
}else{
	//分数ID
	$id = $_SERVER['argv'][1];
}
if(isset($_SERVER['argv'][2])){
	$pwd = $_SERVER['argv'][2];
}
//期待分数
$wanted_score = '100';
if(isset($_SERVER['argv'][3])){
	$wanted_score = $_SERVER['argv'][3];
}
//等待时间
$seconds = 60*rand(10,20);
if(isset($_SERVER['argv'][4])){
	$seconds = $_SERVER['argv'][4];
}

$dang = new dangke($id,$pwd,"",$wanted_score);
$dang->run_with_time($seconds);

//http://202.197.61.23/exam/PersonInfo/StartExamAll.aspx?PaperID=27&UserID=29235&Start=yes
?>


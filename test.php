<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 2017/11/28
 * Time: 16:41
 */
include 'dangke.class.php';
$dang = new dangke('3511046','217408',"152911",'100');
$dang->get_answers();
echo $dang->run();


//http://202.197.61.23/exam/PersonInfo/StartExamAll.aspx?PaperID=27&UserID=29235&Start=yes
<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 2017/11/28
 * Time: 16:41
 */
include 'dangke.class.php';
$dang = new dangke('20512048','949376','',100);
echo $dang->login();
//print_r($dang);
$dang->get_answers();
echo $dang->run();

//http://202.197.61.23/exam/PersonInfo/StartExamAll.aspx?PaperID=27&UserID=29235&Start=yes
<?php if(!empty($_POST)&&isset($_POST['userid'])&&isset($_POST['password'])):?>
<?php
include 'dangke.class.php';
$dang = new dangke($_POST['userid'],$_POST['password'],'',100);
$islogin=$dang->login();
if($islogin){//登陆成功
	$dang->get_answers();
	$score = $dang->run();
	echo "最终分数为".$score;
	echo "<br/>";
	echo "<a href='http://202.197.61.23/exam/'>登陆查看成绩</a>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<h1>信息未完善或账号密码错误，请返回重试</h1>
</body>
</html>
<?php
}
?>

<?php else: ?>

<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>71Party</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  	<div class="container">
  		<div class="bg-primary" style="padding: 20px;border-radius: 10px;margin-bottom: 10px;">
  			<h1>中南大学党课刷分</h1>  			
  		</div>
  		<p>使用本系统前请明确：<br/>1. 本程序仅用于学习交流，对可能出现的一切问题概不负责<br/>2. 使用本程序前请确保参加过党课考试，即完善了考务系统的信息<br/>3. 本程序运行时间较短，但不会对最终成绩的导出造成影响（本人亲自实验）<br/>4. 少一些人知道，少一些事端</p>
	    <form action="./index.php" method="post">
		  <div class="form-group">
		    <label for="userid">账号</label>
		    <input type="text" class="form-control" id="userid" name="userid" placeholder="请输入考务系统账号">
		  </div>
		  <div class="form-group">
		    <label for="password">密码</label>
		    <input type="password" class="form-control" id="password"  name="password" placeholder="请输入考务系统密码">
		  </div>
		  <button type="submit" class="btn btn-primary">提交</button>
		</form>
  	</div>
  	

    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>



<?php endif; ?>	
<?php
	require("config/config.php");
	require("lib/db.php");
	$conn=db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
	$result=mysqli_query($conn,'SELECT * FROM topic');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="/style.css">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Bootstrap -->
    <link href="http://localhost:81/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="back">
	<div class="container">
	<header class="jumbotron text-center">
		<img src="임보라2.jpg" alt="생활코딩" class="img-circle" id="logo">
		<h1><a href="/index.php">Web-App By Minsu</a></h1>
	</header>
	<div class="row">
	<nav class="col-md-3">
		<ol class="nav nav-pills nav-stacked">
			<?php
				while($row=mysqli_fetch_assoc($result)){
					echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title'])."</a></li>"."\n";
				}
			 ?>
		</ol>
	</nav>
	<div class="col-md-9">
	<article>
		<?php
		if(empty($_GET['id'])==false){
			$sql="SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=".$_GET['id'];
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
			echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
			echo '<p>'.htmlspecialchars($row['name']).'</p>';
			echo strip_tags($row['description'],'<a><h1><h2><h3><h4><ul><ol><li><img><br>');
		}
		else{
			echo "<h3>코딩공부를 위한 웹페이지에 오신걸 환영합니다 *^^*</h3>";
		}
		 ?>
	</article>
	<hr>
	<div id="control" >
		<div class="btn-group" role="group" aria-label="...">
		<input type="button" value="white" onclick="document.getElementById('back').className='white'" class="btn btn-default btn-lg"/>
		<input type="button" value="black" onclick="document.getElementById('back').className='black'" class="btn btn-default btn-lg"/>
	 	</div>
		<div class="btn-group" role="group" aria-label="...">
		<a href="/write.php" class="btn btn-success btn-lg">쓰기</a>
		<a href="/delete.php" class="btn btn-success btn-lg">삭제</a>
		<a href="/update.php" class="btn btn-success btn-lg">수정</a>
		</div>
	</div>
</div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c34c43012db2461b16b3809/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap-3.3.4-dist/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
	</div>
</body>
</html>

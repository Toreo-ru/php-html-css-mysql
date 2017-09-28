
<?php 
//Шапка сайта
?>
<link rel="stylesheet" type="text/css" href="style.css" >

<div class="site"style="margin: auto; background-color:#FF543D; font-size: 22px; color: White; top: 0; width: 100%;" align="center">
	<br>
	<center>Такси<br>
		<script type="text/javascript" src="libs/jquery-3.2.1.min.js"></script>
		<div class="site-menu">
			<a href="http://cp73388.tmweb.ru/index.php">На главную </a>
			<br>
 			<a href="http://cp73388.tmweb.ru/dispetcher.php">Диспетчер</a>
		</div>
		<br>
		<?php 
		//Подключение БД в шапке сайта, чтобs не тратить время и подключать на каждой странице.
		require "db.php";
		?>
	</center>
</div>
	
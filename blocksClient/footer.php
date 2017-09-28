<?php 
//Подвал сайта
?>
<br><br><br>
<div style="margin: auto; background-color:#FF543D; font-size: 22px; color: White; position: fixed; left: 0; bottom: 0; width: 100%; " align="center">
	<center>2017<br>
		<?php 
		//Проверка подключения к БД вывод статуса.
			if(!R::testConnection())
			{
				exit('Нет подключения к базе данных');
			}
			echo 'db подключена';
		?>
	</center>
</div>
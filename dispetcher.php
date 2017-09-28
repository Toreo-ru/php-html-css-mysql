<html>
		<!-- начало хедера (header.php) -->
		<head>
			<title>Заявки на такси</title>
			<?php 
			//Подключение шапки			
			include ("blocksClient/header.php");?>
		</head>
			<!-- конец хедера -->
	<center>
<!--Обрабатываем выполнение кнопок принял / отказал-->
		<?php
			$aDoor = $_POST['chetyre'];
			if(isset($_POST['prinyl']))
			{
				if(empty($aDoor)) 
				{
					echo("Вы не выбрали ни одного заказа.");
				} 
  				else
  				{
  					$N = count($aDoor);
    				echo("Вы выбрали $N заказа(ов): ");
    				for($i=0; $i < $N; $i++)
    				{
    					echo($aDoor[$i] . " ");
    					$user=R::load('users', $aDoor[$i]);
	 					$user->status = 1;
	 					R::store($user);
       				}
  				}
			}
     
			if(isset($_POST['otkaz']))
			{
  				if(empty($aDoor)) 
  				{
  					echo("Вы не выбрали ни одного заказа."); 
  				} 
  				else
  				{
  					$N = count($aDoor);
   					echo("Вы выбрали $N заказа(ов): ");
   					for($i=0; $i < $N; $i++)
    				{
    					echo($aDoor[$i] . " ");
     					$user=R::load('users', $aDoor[$i]);
	 					$user->status = 2;
	 					R::store($user);
    				}
  				}
			}		
		?><!--Конец обработки-->

		<!-- Рисуем кнопки / рисуем таблицу-->
		<form action="dispetcher.php" method="POST">
		
			<p>
				<button type="submit" name="prinyl">Отправить машину</button>
				<button type="submit" name="otkaz">Отказать</button>
			</p>
		
			<table style="margin-top: 0px;" width="800" frame=”hsides” bordercolor=”black”>
		
				<tr style="background-color:42aaff">
				<th>№ заказа</th>
				<th> ФИО </th>
				<th> Email </th>
				<th> Откуда </th>
				<th> Куда </th>
				</tr> <!--ряд с ячейками заголовков-->
				

				<!--Запрос к БД на заполнение таблицы-->
				<div id="content">
					<?php

						$Zakazi = R::findAll( 'users' );
						//Цикл вывода значения строк массива
						foreach ($Zakazi as $users) 
						{
							if ($users->status == '1')
							{
								echo "<tr style='background:#90ee90'>";
							}
							if ($users->status == '2')
							{
							echo "<tr style='background:#ff6666'>";
							}
							if ($users->status == '')
							{
							echo "<tr>";
							}
							echo "<td>"; echo "<input type='checkbox' name='chetyre[]' value=\"{$users->id}\"/>"; echo $users->id; echo "</td>";
							echo "<td>"; echo $users->fio; echo "</td>";
							echo "<td>"; echo $users->email; echo "</td>";
							echo "<td>"; echo $users->from; echo "</td>";
							echo "<td>"; echo $users->to; echo "</td>";
						}
						echo "</tr>"
					?>
				</div>
			</table>
			
 			<p>
 				<button type="submit" name="prinyl">Отправить машину</button>
 				<button type="submit" name="otkaz">Отказать</button>
 			</p>
		</form>
	</center>
	
</body>
<style>
	table 
	{
		border: 1px solid #69c;
	}
	th 
	{
  		font-weight: normal;
  		color: #039;
  		border-bottom: 1px dashed #69c;
	}
	td 
	{
		color: #669;
 	}
	tr:hover td 
	{
		background: #ccddff;
	}
</style>
<?php 
	//Подключение подвала	
	include ("blocksClient/footer.php");
?>
</html>

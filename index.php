<html>
		<head>
			<title>Заказ такси</title>

			<!-- начало хедера (header.php) -->
<?php
//Подключение шапки		
include ("blocksClient/header.php");
?>
		<!-- конец хедера -->
			</head>
	<body>
		
		<center>
			<div>
				<br>
			
		<?php
//активируем проверки и внесение инфы в БД, в случае если проверка пройдена.
		$data = $_POST;
		if(isset($data['buy']))
		{
			//Проверяем заполненно то или иное поле и выводим ошибку.
	
			$errors = array();
			if($data['fio'] == '')
			{
				$errors[] = 'Введите ФИО';
				
			}
			if(trim($data['email']) == '')
			{
				$errors[] = 'Введите Email';
			}
			if($data['from'] == '')
			{
				$errors[] = 'Введите адрес откуда нужно Вас забрать';
			}
			if($data['to'] == '')
			{
				$errors[] = 'Введите адрес куда нужно Вас доставить';
			}
	
			if(empty($errors))
			{
				//Все хорошо, все условия выполнены - поля заполнены - можно заказывать
		
				$user=R::dispense('users');
				$user->fio = $data['fio'];
				$user->email = $data['email'];
				$user->from = $data['from'];
				$user->to = $data['to'];
				R::store($user);
				echo '<div style="color: green;">Заказ размещен.</div><hr>';
			} 
			else
			{
				echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
			}
		}
		?>

		<form action="index.php" method="POST">
				<!-- Поля для заполнения инфой и код для автоматического заполнения поля предыдущей инфой, в случае ошибки типа: "Заполните поле ..." -->
			<p><p><strong>ФИО:</strong></p>
				<input type="text" name="fio" value ="<?php echo @$data['fio']; ?>">
 			</p>
 			<p><p><strong>Ваш Email:</strong></p>
				<input type="email" name="email" value="<?php echo @$data['email']; ?>">
 			</p>
			<p><p><strong>Откуда:</strong></p>
				<input type="text" name="from" value="<?php echo @$data['from']; ?>">
 			</p>
 			<p><p><strong>Куда:</strong></p>
				<input type="text" name="to" value="<?php echo @$data['to']; ?>">
 			</p>
 			<p>
				<button type="submit" name="buy">Заказать</button>
 			</p>	
		</form>
					
					
					
					
					
					
					
					
					
			</div>
		</center>

	</body>
	
		<!-- начало футера (footer.php) -->
<?php
 	//Подключение подвала
	include ("blocksClient/footer.php");
?>
		<!-- конец футера -->
		
</html>

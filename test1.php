
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Выберите один ответ на вопрос</h1>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

//echo "<pre>";
//var_dump($_GET);
//var_dump($_POST);
//echo "</pre>";

$testNumber;
$test1Array=[];
$test2Array=[];
$test3Array=[];

//Шаг 1. Проверка номера теста

if (isset($_GET["mytest"]) && !empty($_GET["mytest"])) 
	{
		$testNumber=$_GET["mytest"];
		//echo "<pre>";
		//var_dump($testNumber);
		//echo "</pre>";
	}
	else 
	{
		echo "Вы не выбрали тест.";
	}


//Шаг 2. Загрузка соответствующего номеру json в массив
$testNumber;

if ($testNumber==="1") 
	{
		//echo "Первый тест";
		$test1Content=file_get_contents("./uploaded/test1.json");
		$test1Array=json_decode($test1Content, true);
		//echo "<pre>";
		//print_r($test1_array);
		//echo "</pre>"; 
		 ?>
		<form action="test1.php?mytest=1" enctype="multipart/form-data" method="POST">
			<p><label><strong><?php echo $test1Array["TEST1_QUESTION"]?></strong></label></p>
			<p><input type="radio" name="answer" value="a1"><?php echo $test1Array["TEST1_ANSWER_1"]?></p>
			<p><input type="radio" name="answer" value="a2"><?php echo $test1Array["TEST1_ANSWER_2"]?></p>
			<p><input type="radio" name="answer" value="a3"><?php echo $test1Array["TEST1_ANSWER_3"]?></p>
  			<p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
		</form>
		<?php

		if (empty($_POST["answer"]))
		{
			echo "<pre>";
			print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
			echo "</pre>";
		}

		if (!empty($_POST["answer"]) && $_POST["answer"]==="a3") 
			{
				echo "В точку!";?>
				<form>
					<p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
					<p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
				</form> <?php
			}

		if (!empty($_POST["answer"]) && $_POST["answer"]!="a3") 
		{
			echo "Неверный ответ! Попробуй еще раз!";
		}
		else
		{
			//echo "нет ответа";
		}
	} 
	
	elseif ($testNumber==="2") 
		{
			//echo "Второй тест";
			$test2Content=file_get_contents("./uploaded/test2.json");
			$test2Array=json_decode($test2Content, true);
			//echo "<pre>";
			//print_r($test2Array);
			//echo "</pre>"; ?>
			<form action="test1.php?mytest=2" enctype="multipart/form-data" method="POST">
				<p><label><strong><?php echo $test2Array["TEST2_QUESTION"]?></strong></label></p>
				<p><input id="t2a1" type="radio" name="answer" value="a1"><?php echo $test2Array["TEST2_ANSWER_1"]?></p>
				<p><input id="t2a2" type="radio" name="answer" value="a2"><?php echo $test2Array["TEST2_ANSWER_2"]?></p>
				<p><input id="t2a3" type="radio" name="answer" value="a3"><?php echo $test2Array["TEST2_ANSWER_3"]?></p>
  				<p><input type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
			</form>
			<?php

			if (empty($_POST["answer"]))
			{
				echo "<pre>";
				print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
				echo "</pre>";
			}
			if (!empty($_POST["answer"]) && $_POST["answer"]==="a2") 
			{
				echo "В точку!";?>
				<p><form>
					<p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
					<p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
				</form> <?php
			} 
			if (!empty($_POST["answer"]) && $_POST["answer"]!="a2") 
			{
				echo "Неверный ответ! Попробуй еще раз!";
			}
			else
			{
				//echo "нет ответа";
			}
			
		}
		elseif ($testNumber==="3")
			{
				//echo "Третий тест";
				$test3Content=file_get_contents("./uploaded/test3.json");
				$test3Array=json_decode($test3Content, true);
				//echo "<pre>";
				//print_r($test3Array);
				//echo "</pre>"; ?>
				<form action="test1.php?mytest=3" enctype="multipart/form-data" method="POST">
					<p><label><strong><?php echo $test3Array["TEST3_QUESTION"]?></strong></label></p>
					<p><input id="choice" type="radio" name="answer" value="a1"><?php echo $test3Array["TEST3_ANSWER_1"]?></p>
					<p><input id="choice" type="radio" name="answer" value="a2"><?php echo $test3Array["TEST3_ANSWER_2"]?></p>
					<p><input id="choice" type="radio" name="answer" value="a3"><?php echo $test3Array["TEST3_ANSWER_3"]?></p>
  					<p><input id="choice" type="submit" name="CheckTest" value="Проверить" title="Проверить"></p>
				</form>
				<?php
				if (empty($_POST["answer"]))
				{
					echo "<pre>";
					print_r("У каждого советского человека есть выбор! Выбери один из вариантов ответа!");
					echo "</pre>";
				}				

				if (!empty($_POST["answer"]) && $_POST['answer']==="a1") 
				{
					echo "В точку!";?>
						<form>
							<p><input type="submit" formaction="list1.php" name="ShowTestList" value="Мне понравилось! Хочу еще тест!" title="Мне понравилось! Хочу еще тест!"></p>
							<p><input type="submit" formaction="certificate.php" name="GiveCertificate" value="Получить сертификат" title="Получить"></p>
						</form> <?php

				} 
				if (!empty($_POST["answer"]) && $_POST["answer"]!="a1") 
				{
					echo "Неверный ответ! Попробуй еще раз!";
				}
				else
				{
					//echo "нет ответа";
				}
				
			} 
			else
			{
				http_response_code(404);
			}

?>
</body>
</html>

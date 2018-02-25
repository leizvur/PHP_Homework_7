<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form enctype="multipart/form-data" action="admin1.php" method="POST">
	<label><strong>Выберите файл с тестами в формате JSON для загрузки на сервер:</strong></label><br>
	<input type="file" name="mytest"><br><br>
	<input type="submit" value="Отправить тест"><br><br>

<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

@mkdir("uploaded", 0777);


//Шаг 1. Проверяем расширение файла

if (isset($_FILES["mytest"]["name"]) && !empty($_FILES["mytest"]["name"])) 
	{
		$filename=$_FILES["mytest"]["name"];
		$testArray=explode(".", $filename);
		//echo "<pre>";
		//print_r($testArray);
		
		if ($testArray[1] !== "json") 
			{
				echo "Пожалуйста, выберите файл формата JSON.";
			}
		else
			{
				//echo "Спасибо, Вы выбрали корректный формат файла для загрузки на сервер.";
			}

		if ($_FILES["mytest"]["error"] == UPLOAD_ERR_OK)	
			{
				move_uploaded_file($_FILES["mytest"]["tmp_name"], "uploaded/".basename($_FILES["mytest"]["name"]));
				header('Location: list1.php');
				exit;
?>
				<input type="submit" formaction="list1.php" value="Выбрать тест"><br><br>
<?php			
			}
		else
			{
				echo "Ошибка загрузки теста на сервер.";
			}

	}
	
?>
	
</form>
</body>
</html>

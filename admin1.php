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

//echo "<pre>";
//var_dump($_FILES);
//var_dump($_POST);
//echo "</pre>";


@mkdir("uploaded", 0777);


//Шаг 1. Проверяем расширение файла

if (isset($_FILES["mytest"]["name"]) && !empty($_FILES["mytest"]["name"])) 
	{
		$filename=$_FILES["mytest"]["name"];
		$test_array=explode(".", $filename);
		//echo "<pre>";
		//print_r($test_array);
		
		if ($test_array[1] !== "json") 
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
				echo "Тест загружен на сервер.";
				echo "<h3>Информация о загруженном на сервер файле: </h3>";
				echo "<p><strong>Оригинальное имя загруженного файла:</strong> ".$_FILES['mytest']['name']."</p>";
				echo "<p><strong>Mime-тип загруженного файла:</strong> ".$_FILES['mytest']['type']."</p>";
				echo "<p><strong>Размер загруженного файла в байтах:</strong> ".$_FILES['mytest']['size']."</p>";
				$filepath=realpath("uploaded/".basename($_FILES["mytest"]["name"]));
				$shortfilepath=str_replace($_SERVER['DOCUMENT_ROOT'], '', $filepath);
				//var_dump($shortfilepath);

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

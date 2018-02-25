<?php
session_start();
//Текст сертификата

//var_dump($_SESSION["user"]);


//Текст сертификата
$certText=$_SESSION["user"] . " - человек, на 33,3% рожденный в СССР!";


//Картинка сертификата
$image=imagecreatetruecolor(640, 320);
$backgroundColor=imagecolorallocate($image, 255, 0, 0);
$textColor=imagecolorallocate($image, 0, 255, 0);

$certPng=__DIR__ . "/certificate.png";
if (!file_exists($certPng)) 
{
	echo "Файл с картинкой для сертификата не найден!";
	exit;
}


$fontTtf=__DIR__ . '/impact.ttf';
if (!file_exists($fontTtf)) 
{
	echo "Файл шрифта не найден!";
	exit;
}


$certFile=imagecreatefrompng($certPng);
imagefill($image, 20, 20, $backgroundColor);
imagecopy($image, $certFile, 0, 0, 0, 0, 640, 320);
imagettftext($image, 15, 0, 50, 200, $textColor, $fontTtf, $certText);
header('Content-Type: image/png');
imagepng($image);

?>
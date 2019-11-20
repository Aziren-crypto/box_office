<?
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('UTC');
date_default_timezone_set("Europe/Moscow");
session_start();

try {
	$db = new PDO('mysql:host=localhost;dbname=cabinet', 'root', '');
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	$db->query("SET lc_time_names = 'ru_RU'");
	$db->query("SET NAMES 'utf8'");
} catch (PDOException $e) {
	print "Ошибка подключения к БД<br/>";
	die();
}
$sql_string = "SET time_zone = '+3:00'";
$stmt = $db->prepare($sql_string);
$stmt->execute(array());
//define ('SITE_FOLDER', '');
?>

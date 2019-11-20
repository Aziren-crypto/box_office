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
		<style>
		   /*ul.hr li {
			display: inline; /* Отображать как строчный элемент */
			margin-right: 5px; /* Отступ слева */
			border: 1px solid #000; /* Рамка вокруг текста */
			padding: 3px; /* Поля вокруг текста */
		   } */

			table {
				border-collapse: collapse; /* Убираем двойные границы между ячейками */
			}
			td {
				padding: 5px; /* Поля вокруг текста */
				border: 1px solid black; /* Рамка вокруг ячеек */
			}
			.column{
				overflow: auto;
				display: inline-block;
				border: 1px solid red;
				vertical-align: top;
			}
			.menu{
				width: 23%;
			}
			.col_2{
				width: 37%;
			}
			.col_3{
				width: 37%;
			}
			.item_tr{
				border: 1px solid black;
				cursor: pointer;
				margin: 5px;
				padding: 5px;
			}
			.item_tr.linked{
				background-color: #bde5ae;
			}
			.item_tr.selected{
				//background-color: 9ec9e8;
				border: 2px solid blue;
				color: blue;
			}

			a.selected{
				pointer-events: none;
				cursor: default;
				color: #303030;
				font-size: 200%;
				text-decoration: none;
				font-weight: bold;
			}
			ul.hr li{
				list-style-type: none;
			}
			.item_tr .avatar, .result .avatar{
				max-height: 60px;
				width: auto;
			}
			.clientCont{
				border: 2px solid #638196;
				position: absolute;
				background-color: #D7EAF4;
				width:auto;
			}
			 .clientCont .result{
				border: 1px solid #638196;
			}
		</style>
<?//script type="text/javascript" src="jquery-3.3.1.min.js"></script?>
<script src="jquery-1.9.1.min.js"></script>
<script src="jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.fancybox.css">


<script type="text/javascript">
$(document).ready(function() {
$(".myfancybox").fancybox({  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
//Iframe
$(".myframe").fancybox({
iframe : {
scrolling : 'yes',
},
});

});
</script>
<?$USER_ID = 2;?>
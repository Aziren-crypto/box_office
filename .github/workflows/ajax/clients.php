<?
include '../header_mini.php';

$sql_string = 'SELECT * FROM mh_users WHERE id_senior = ?';
$stmt = $db->prepare($sql_string);
$stmt->execute(array($_REQUEST['master_id']));
$first_item = true;
?>
<div><button>Создать клиента</button></div>
<div>
	<form method="get" action="clients.php" style="border: 1px solid #8a8a8a; border-radius: 5px; background-color: #dbdbdb; padding: 5px; margin: 5px;">
		<input type="text" autocomplete="off" name="search" id="client_search">
		<div class="clientCont"></div>
		<div><input id="show_all" name="show_all" type="checkbox">Показать всех</div>
		<button>Найти</button>
	</form>

</div>

<div id="clients_list">
	<?
	while($arrItem = $stmt->fetch()){
		//global $first_item;
		//echo '<p>$first_item: '.$first_item.'</p>';
		/*$first_td = true;
		if($first_item == true){
			echo '<table><tr>';
			foreach($arrItem as $k => $v){
				echo '<td>'.$k.'</td>';
			}
			echo '</tr>';
			$first_item = false;
		}
		foreach($arrItem as $k => $v){
			if($first_td == true){
				echo '<tr class="item_tr">';
				$first_td = false;
			}
			echo '<td>'.$v.'</td>';
		}
		if($first_td == false){
			echo '</tr>';
		}*/
		echo '<div class="item_tr linked" target="_blank">';
		/*foreach($arrItem as $k => $v){
			echo $k.': '.$v.', ';
		}*/?>
		<div style="display: inline-block;">
			<img class="avatar" src="images/<?=$arrItem['avatar']?>">
		</div>
		<div style="display: inline-block; vertical-align: top">
			<div><?=$arrItem['name']?> <?=$arrItem['last_name']?></div>
			<div><?=$arrItem['company']?></div>
		</div>
		<?
		echo '</div>';
	}
	?>
</div>

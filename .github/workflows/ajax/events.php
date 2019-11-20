<?
include 'header_mini.php';
$user_id = 3;
$sql_string = 'SELECT * FROM mh_users WHERE id_senior = ?';
$stmt = $db->prepare($sql_string);
$stmt->execute(array($user_id));
$first_item = true;
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
	echo '<div class="item_tr" target="_blank">';
	foreach($arrItem as $k => $v){
		echo $k.': '.$v.', ';
	}
	echo '</div>';
}

?>


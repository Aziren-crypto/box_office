<?
include 'header_mini.php';

//echo '<pre>'; print_r($_REQUEST); echo '</pre>';
$sql_string = "SELECT * FROM mh_users WHERE (name LIKE ? OR last_name LIKE ? OR company LIKE ?)";
if($_REQUEST['show_all'] == 'false'){
	//echo '<br>show_all_no';
	$sql_string .= " AND id_senior = ?";
}else{
	//echo '<br>show_all';
}
$stmt = $db->prepare($sql_string);
$sql_array = array('%'.$_REQUEST['string'].'%', '%'.$_REQUEST['string'].'%', '%'.$_REQUEST['string'].'%');
if($_REQUEST['show_all'] == 'false'){
	$sql_array[] = $_REQUEST['master_id'];
}
$stmt->execute($sql_array);
$first_item = true;
?>

<?
$nothink = true;
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
	echo '<div class="result">';
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
	$nothink = false;
}
if($nothink == true){
	echo 'Ничего не найдено';
}
?>


<?
include 'header_mini.php';

$sql_string = 'SELECT * FROM mh_users';
$stmt = $db->prepare($sql_string);
$stmt->execute(array());
$first_item = true;
?>

<?
while($arrItem = $stmt->fetch()){
	echo '<div class="item_tr';
	if($arrItem['id_senior'] == $_REQUEST['master_id']) echo ' linked';
	echo '" target="_blank">';
	?>
	<div style="display: inline-block;">
		<img class="avatar" src="images/<?=$arrItem['avatar']?>">
	</div>
	<div style="display: inline-block; vertical-align: top">
		<div><?=$arrItem['name']?> <?=$arrItem['last_name']?></div>
		<div><?=$arrItem['company']?></div>
	</div>
	<?
	if($arrItem['id_senior'] != $_REQUEST['master_id']) echo '<div style="display: inline-block; vertical-align: top; float: right;"><a class="link_client" href="'.$arrItem['id'].'">Добавить себе</a></div>';
	echo '</div>';
}
?>


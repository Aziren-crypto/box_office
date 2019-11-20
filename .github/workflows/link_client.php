<?
include 'header_mini.php';

$sql_string = 'UPDATE mh_users SET id_senior = ? WHERE id = ?';
$stmt = $db->prepare($sql_string);
$stmt->execute(array($_REQUEST['master_id'], $_REQUEST['client_id']));
echo 'Клиент привязан';
?>

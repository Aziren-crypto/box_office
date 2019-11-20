<?
include 'header.php';
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Главная страница</title>
	</head>
	<body>

		<?$USER_ID = 2;?>
		<div class="column menu">
			<?include 'menu.php';?>
		</div>
		<div class="column col_2">
			<?
			$sql_string = 'SELECT * FROM mh_users';
			$sql_array = array();
			$is_where = false;
			if(!$_REQUEST['show_all'] == 'Y'){
				$is_where = true;
				$sql_string .= ' WHERE id_senior = ?';
				$sql_array[] = $USER_ID;
			}
			if(isset($_REQUEST['search']) && strlen($_REQUEST['search']) > 0){
				if($is_where == false){
					$sql_string .= ' WHERE';
					$is_where = true;
				}else{
					$sql_string .= ' AND';
				}
				$sql_string .= ' (name LIKE ? OR last_name LIKE ? OR company LIKE ?)';
				$sql_array[] = '%'.$_REQUEST['search'].'%';
				$sql_array[] = '%'.$_REQUEST['search'].'%';
				$sql_array[] = '%'.$_REQUEST['search'].'%';
			}
			/*echo '<br>$sql_string '.$sql_string;
			echo '<br>$sql_array ';
			echo '<pre>'; print_r($sql_array); echo '</pre>';*/
			$stmt = $db->prepare($sql_string);
			$stmt->execute($sql_array);
			$first_item = true;
			?>
			<?//div><button>Создать клиента</button></div?>
			

<a data-fancybox data-src="#hidden-content" href="javascript:;">Создать клиента</a>
<div style="display: none;" id="hidden-content"><h2>Форма создания клиента</h2>
			<form method="get" action="clients.php" style="border: 1px solid #8a8a8a; border-radius: 5px; background-color: #dbdbdb; padding: 5px; margin: 5px;">
				<input type="text" autocomplete="off" value="<?=$_REQUEST['search']?>" name="search" id="client_search">
				<div class="clientCont"></div>
				<div><input id="show_all" name="show_all" type="checkbox" value="Y" 
				<?
				if($_REQUEST['show_all'] == 'Y'){
					echo ' checked="checked"';
				}?>
				>Показать всех</div>
				<input type="hidden" name="search_users" value="Y ">
				<button>Найти</button>
			</form>
</div>

			<form method="get" action="clients.php" style="border: 1px solid #8a8a8a; border-radius: 5px; background-color: #dbdbdb; padding: 5px; margin: 5px;">
				<input type="text" autocomplete="off" value="<?=$_REQUEST['search']?>" name="search" id="client_search">
				<div class="clientCont"></div>
				<div><input id="show_all" name="show_all" type="checkbox" value="Y" 
				<?
				if($_REQUEST['show_all'] == 'Y'){
					echo ' checked="checked"';
				}?>
				>Показать всех</div>
				<input type="hidden" name="search_users" value="Y ">
				<button>Найти</button>
			</form>
			<div id="clients_list">
				<?
				while($arrItem = $stmt->fetch()){
					echo '<div class="item_tr';
					if($arrItem['id_senior'] == $USER_ID) echo ' linked';
					echo '" target="_blank">';
					?>
					<div style="display: inline-block;">
						<img class="avatar" src="images/<?=$arrItem['avatar']?>">
					</div>
					<div style="display: inline-block; vertical-align: top">
						<div><?=$arrItem['name']?> <?=$arrItem['last_name']?></div>
						<div><?=$arrItem['company']?></div>
					</div>
					<?if($arrItem['id_senior'] != $USER_ID) echo '<div style="display: inline-block; vertical-align: top; float: right;"><a class="link_client" href="'.$arrItem['id'].'">Добавить себе</a></div>';?>
					<?
					echo '</div>';
				}
				?>
			</div>
		</div>
		<div class="column col_3">
				
		</div>
	</body>
<?
include 'footer.php';
?>
</html>


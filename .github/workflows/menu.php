<?$arMenu = array(
	'dashboard.php' => '1. Дэшборд',
	'clients.php' => '2. Клиенты',
	'tasks.php' => '3. Задачи',
	'statistics.php' => '4. Статистка',
	'team.php' => '5. Команда',
	'chat.php' => '6. Чаты',
	'report.php' => '7. Отчёт'
);?>
<ul class="hr">
	<?
	foreach($arMenu as $k => $v){
		$url = array_pop(explode('/', $_SERVER['SCRIPT_NAME']));?>
		<li><a class="menu_item<?if($url == $k) echo ' selected';?>" href="<?=$k?>"><?=$v?></a></li>
	<?}?>
</ul>

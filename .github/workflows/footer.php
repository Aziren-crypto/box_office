	<script>
		$('body').on('click', '.menu_item', function(){
			$('.menu_item').removeClass('selected');
			$(this).addClass('selected');
			$('.column.col_2')[0].innerHTML = 'Загрузка ...';
			$.ajax({
				type: "POST",
				url: 'ajax/'+$(this).attr('href'),
				data: { master_id: '<?=$USER_ID?>'},
				success: function(result){
					$('.column.col_2')[0].innerHTML = result;
				}
			});
			return false;
		});
		selector = '.item_tr';
		$('body').on('click', selector, function(){
			$(selector).removeClass('selected');
			$(this).addClass('selected');
		});
		
		// < поиск
		$('body').on('click keyup', '#client_search', function(){
			var that = this;
			var search = $(that).val();
			if(search.length >= 3){
				//alert('ok');
				var cont = $(that).siblings('.clientCont');
				cont.css('display', 'block');
				cont.html('Поиск ...');
				$.post(
					'clients_search.php',
					{
						string: search,
						show_all: $('#show_all').prop("checked"),
						master_id: '<?=$USER_ID?>'
					},
					function(data){
						if(search == $(that).val()){
							cont.html(data).show();
							search = false;
						}
					}
				);
			}
			return false;
		});
		$(document).mouseup(function (e){ // событие клика по веб-документу
			var div = $('.clientCont');
			if (!div.is(e.target)){
				$('.clientCont').hide();
			}
		});
		// > поиск
		/*$('body').on('click', '#show_all', function(){
			//alert($(this).prop("checked"));
			$('#clients_list').html('Загрузка ...');
			if($(this).prop("checked") == true){
				$.post(
					'clients_all.php',
					{
						master_id: '<?=$USER_ID?>'
					},
					function(data){
						$('#clients_list')[0].innerHTML = data;
					}
				);
			}else{
				$.post(
					'clients_linked.php',
					{
						master_id: '<?=$USER_ID?>'
					},
					function(data){
						$('#clients_list')[0].innerHTML = data;
					}
				);
			}
		});*/
		$('body').on('click', '.link_client', function(){
			var that = this;
			client_id = $(this).attr('href')
			$.ajax({
				type: "POST",
				url: 'link_client.php',
				data: { master_id: '<?=$USER_ID?>', client_id: client_id},
				success: function(result){
					alert(result);
					$(that).closest(".item_tr").addClass('linked');
					$(that).remove();
				}
			});
			return false;
		});
	</script>
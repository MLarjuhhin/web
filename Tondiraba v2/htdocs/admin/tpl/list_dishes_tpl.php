<?php
if ($modulePage2 == 'add' || $modulePage2 == 'edit') {
	include_once 'list_dishes_edit_tpl.php';
} else {
	?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2>Список блюд</h2>
			</div>
			<div class="card-body">
				<a href="/menu/list_dishes/add" class="btn btn-success my-3">Добавить</a>

				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Имя</th>
						<th>Цена</th>
						<th></th>
						<th></th>
					</tr>
					<?
					$x = 1;
					foreach (ListDishes::getList($DB) as $k => $v) {
						?>
						<tr>
							<td><?= $x ?></td>
							<td><?= $v['name'] ?></td>
							<td><?= $v['price'] ?></td>
							<td><a href="/menu/list_dishes/edit/<?= $v['id'] ?>" class="btn btn-warning">Обновить</a></td>
							<td>
								<form action="/menu/list_dishes/delete/<?= $v['id'] ?>" method="post" id="delete_list_dishes_<?= $v['id'] ?>">
									<input type="hidden" name="act" value="delete_dish">
									<input type="submit" class="btn btn-danger" value="Delete" name="btn"
										   onclick="if(!confirm('Уверены?')) {
											   return false;
											   }else{
											   document.getElementById('delete_list_dishes_<?= $v['id'] ?>').submit(); return false;
											   }">

								</form>
							</td>
						</tr>
						<?
						$x++;
					}
					?>
				</table>
			</div>
		</div>
	</div>
<? } ?>
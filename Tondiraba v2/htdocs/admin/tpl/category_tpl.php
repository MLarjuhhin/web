<?php
if ($modulePage2 == 'add' || $modulePage2 == 'edit') {
	include_once 'category_edit_tpl.php';
} else {
	?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2>Категории</h2>
			</div>
			<div class="card-body">
				<a href="/menu/category/add" class="btn btn-success my-3">Добавить</a>

				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Имя</th>
						<th></th>
						<th></th>
					</tr>
					<?
					$x = 1;
					foreach (Category::getCategoryList($DB) as $k => $v) {
						?>
						<tr>
							<td><?= $x ?></td>
							<td><?= $v['name'] ?></td>
							<td><a href="/menu/category/edit/<?= $v['id'] ?>" class="btn btn-warning">Обновить</a></td>
							<td>
								<form action="/menu/category/delete/<?= $v['id'] ?>" method="post" id="delete_category_<?= $v['id'] ?>">

									<input type="submit" class="btn btn-danger" value="Delete"
										   onclick="if(!confirm('Уверены?')) {
											   return false;
											   }else{
											   document.getElementById('delete_category_<?= $v['id'] ?>').submit(); return false;
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
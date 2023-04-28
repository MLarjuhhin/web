<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h2>Поиск текста:</h2>
		</div>
		<div class="card-body">
			<form method="post" >
				<table>
					<tr>
						<th>ID</th>
						<td><input type="text" class="form-control" name="text_search_id" ></td>
					</tr>
					<tr>
						<th>Текст на русском</th>
						<td><input type="text" class="form-control" name="text_search_rus"></td>
					</tr>
					<tr>
						<th><?=text('slug')?></th>
						<td><input type="text" class="form-control" name="text_search_slug"></td>
					</tr>
					<tr>
						<td>
                            <input type="hidden" name="act" value="search">
                            <input type="submit" class="btn btn-success btn-sm">
                        </td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h2><?=($submit_form=='add')?'Добавить':'Обновить'?> текст:</h2>
		</div>

		<div class="card-body">
			<form method="post" >
				<table>
					<tr>
						<th>Текст на русском</th>
						<td><textarea name="text_rus" class="form-control"  id="" cols="60" rows="10"><?=$language['rus']?></textarea></td>
					</tr>
					<tr>
						<th>SLUG</th>
						<td><input type="text" class="form-control" name="slug" value="<?=$language['slug']?>" <?=($submit_form=='edit')?'disabled':''?>></td>
					</tr>
					<tr>
						<td>
                            <input type="hidden" name="act" value="<?=$submit_form?>_language">
                            <input type="submit" class="btn btn-success btn-sm">
                        </td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>



<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h2></h2>
		</div>
		<div class="card-body">
			<form method="post" >
				<table class="table table-striped">
					<tr>
						<th>ID</th>
						<th>Название на русском</th>
						<th></th>
					</tr>
                    <?foreach ($languages as $tx) {?>
                        <tr>
                            <td><?=$tx['id']?></td>
                            <td><?=$tx['rus']?></td>
                            <td><a href="/text/edit/<?=$tx['id']?>">edit</a></td>
                        </tr>
                   <? }?>

				</table>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<?
			if($modulePage2=='edit'){
			?>
				<h2>Обновить запись</h2>
			<?}else{?>
				<h2>Добавить запись</h2>
			<?}?>

		</div>
		<div class="card-body">
			<form method="post">
				<!-- name -->
				<div class="form-group row ">
					<label class="control-label col-md-4" id="name">Название</label>
					<div class="col-md-6">
						<input type="text" name="name_dish" id="name" class="form-control" value="<?=(isset($Update['name'])?htmlentities($Update['name']):$_POST['name_dish'])?>">
					</div>
				</div>
				<!-- price -->
				<div class="form-group row ">
					<label class="control-label col-md-4" id="price">Цена</label>
					<div class="col-md-6">
						<input type="text" name="price_dish" id="price" class="form-control" value="<?=(isset($Update['price'])?$Update['price']:$_POST['price_dish'])?>">
					</div>
				</div>

                <!-- Multiple -->
                <div class="form-group row ">
                    <label class="control-label col-md-4" id="product">Продукты</label>
                    <div class="col-md-6">
                        <select class="select2_dish_and_product" multiple="multiple" id="product" name="product[]" data-placeholder="Выбери продукты..." style="width: 100%;">

							<? foreach ($Product as $k => $v) { ?>
                                <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
							<? } ?>


                        </select>
                    </div>
                </div>

				<input type="hidden" name="act" value="<?=$modulePage2?>_dish">
				<?
				if($modulePage2=='edit'){
					?>
					<input type="submit" class="btn btn-warning" value="Обновить">
				<?}else{?>
					<input type="submit" class="btn btn-success" value="Добавить">
				<?}?>
				<a href="/<?= $modulePage1 ?>" class="btn btn-info">Отмена</a>
			</form>
		</div>
	</div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h2>Добавить запись</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <!-- name -->
                <div class="form-group row ">
                    <label class="control-label col-md-4" id="name">Название</label>
                    <div class="col-md-6">
                        <input type="text" name="name_category" id="name" class="form-control" value="<?=(isset($Update['name'])?$Update['name']:'')?>">
                    </div>
                </div>
                <input type="hidden" name="act" value="<?=$modulePage2?>_category">
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
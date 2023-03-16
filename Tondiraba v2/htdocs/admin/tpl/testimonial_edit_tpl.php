
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h2>Добавить запись</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <!-- name -->
                <div class="form-group row ">
                    <label class="control-label col-md-4" id="name">Имя</label>
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control" value="<?=(isset($Update['name'])?$Update['name']:'')?>">
                    </div>
                </div>
                <!-- profession -->
                <div class="form-group row ">
                    <label class="control-label col-md-4" id="profession">Профессия</label>
                    <div class="col-md-6">
                        <input type="text" name="profession" id="profession" class="form-control" value="<?=(isset($Update['profession'])?$Update['profession']:'')?>">
                    </div>
                </div>
                <!-- descr -->
                <div class="form-group row ">
                    <label class="control-label col-md-4" id="description">Описание</label>
                    <div class="col-md-6">
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control"><?=(isset($Update['description'])?$Update['description']:'')?></textarea>
                    </div>
                </div>
                <?
                if($modulePage1=='edit'){
                ?>
                    <input type="submit" class="btn btn-warning" value="Обновить">
                <?}else{?>
                    <input type="submit" class="btn btn-success" value="Добавить">
                <?}?>
                <a href="/<?= $modulePage0 ?>" class="btn btn-info">Отмена</a>
            </form>

        </div>
    </div>
</div>
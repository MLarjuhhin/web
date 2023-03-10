<?php
if($modulePage1=='add' || $modulePage1=='edit'){
include_once 'testimonial_edit_tpl.php';
}else{?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Testimonial</h2>
            </div>
            <div class="card-body">

                <a href="/testimonial/add" class="btn btn-success my-3">Добавить</a>

                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Имя</th>
                        <th>Профессия</th>
                        <th>Описание</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>

                    </tr>
                    <?
$x=1;
                    foreach ($Query as $k =>$v){?>
                        <tr>
                            <td><?=$x?></td>
                            <td><?=$v['name']?></td>
                            <td><?=$v['profession']?></td>
                            <td><?=$v['description']?></td>
                            <td>Активный</td>
                            <td><a href="/testimonial/edit/<?=$v['id']?>" class="btn btn-warning">Обновить</a></td>
                            <td>
                                <form action="/testimonial/delete/<?=$v['id']?>" method="post" id="delete_testimonial_<?=$v['id']?>">

                                    <input type="submit" class="btn btn-danger" value="Delete" onclick="if(!confirm('Уверены?')) {
                                        return false;
                                    }else{
                                        document.getElementById('delete_testimonial_<?= $v['id'] ?>').submit(); return false;
                                    }" >

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
<?}?>
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
                        <th>Изображение</th>
                        <th>Имя</th>
                        <th>Профессия</th>
                        <th>Описание</th>
                        <th>Статус</th>
                        <th></th>
                        <th></th>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>#</td>
                        <td>Maksim</td>
                        <td>IT-juht</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae debitis enim facere fugiat fugit incidunt ipsum laudantium minima nesciunt, omnis perferendis quaerat ratione sequi ut voluptatum! Ex fuga quidem similique!</td>
                        <td>Активный</td>
                        <td><a href="/testimonial/edit/1" class="btn btn-warning">Обновить</a></td>
                        <td><a href="/testimonial/delete/1" class="btn btn-danger">Удалить</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?}?>
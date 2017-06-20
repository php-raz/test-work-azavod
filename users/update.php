<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$user = new Users();
$data = $user->findOne($id);

 echo '<h3>Редактирование данных пользователя</h3>
            <form id="update_user_form" action="ajax.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="surname_user">Фамилия</label>
                    <input type="text" name="surname_user" value="' . $data[1] . '" required class="form-control" id="surname_user" placeholder="Фамилия">
                    <input type="hidden" name="id" value="' . $id . '">
                </div>
                <div class="form-group">
                    <label for="name_user">Имя</label>
                    <input type="text" name="name_user" value="' . $data[2] . '" required class="form-control" id="name_user" placeholder="Имя">
                </div>
                <div class="form-group">
                    <label for="lastname_user">Отчество</label>
                    <input type="text" name="patronymic_user" value="' . $data[3] . '" required class="form-control" id="patronymic_user" placeholder="Отчество">
                </div>
                <div class="form-group">
                    <label for="birth_user">Дата рождения</label>
                    <input type="date" name="birth_user" value="' . $data[4] . '" required class="form-control" id="birth_user" placeholder="Дата рождения">
                </div>
                <div class="form-group">
                        <label for="gender_user">Пол</label>
                        <select  name="gender_user" required class="form-control" id="gender_user">
                            '. select_gender($data[5]) .'
                          </select>
                    </div>
                <div class="form-group">
                    <label for="img_user_update">Изменить Фото</label>
                    <p><img class="update_show" src="' . $data[6] . '">
                    <input type="file" name="img_user_update" class="form-control" id="img_user_update"></p>
                </div>
                <div class="form-group ">
                    <input id="update_user" type="submit" value="Сохранить" name="update_user" class="btn btn-success pull-right">
                </div>
              </form>
              <input type="submit" value="Отмена" name="update_user" class="btn btn-success pull-right" onclick="redir_home()">';

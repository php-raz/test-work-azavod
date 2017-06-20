<?php
    echo '<h3>Добавить сотрудника</h3>
            <form id="test-form" action="ajax.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputSurname">Фамилия</label>
                        <input type="text" name="surname_user" required class="form-control" id="exampleInputSurname" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Имя</label>
                        <input type="text" name="name_user" required class="form-control" id="exampleInputName" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPatronymic">Отчество</label>
                        <input type="text" name="patronymic_user" class="form-control" id="exampleInputPatronymic" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBirth">Дата рождения</label>
                        <input type="date" name="birth_user" required class="form-control" id="exampleInputBirth" placeholder="Дата рождения">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputGender">Пол</label>
                        <select  name="gender_user" required class="form-control" id="exampleInputGender">
                            <option disabled selected>Выберите пол</option>
                            <option value="1">Муж.</option>
                            <option value="0">Жен.</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="img_user">Фото</label>
                        <input type="file" name="img_user" required class="form-control" id="img_user">
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Сохранить" name="create_user" class="btn btn-success pull-right">
                    </div>
                </form>
                <input type="submit" onclick="redir_home()" value="Отмена" name="cancel_create_user" class="btn btn-success pull-right">';

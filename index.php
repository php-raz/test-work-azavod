<?php
require_once 'header.php';
require_once 'function.php';

echo '<h3>Поиск</h3><br>';

echo '<form id="filter"  action="javascript:void(null);" onsubmit="send(1)" method="post">
            <div class="form-group">
                <input type="text" name="search_user" class="form-control" placeholder="Поиск">
            </div>
            <div class="form-group-gender">
                <label>Пол</label><br>
                <input type="checkbox" name="gender[]" id="gender_1" value="1" checked><label for="gender_1">Муж</label><br>
                <input type="checkbox" name="gender[]" id="gender_0" value="0" checked><label for="gender_0">Жен</label>
            </div>
            <div class="form-group-age">
                <label>Возраст</label>
                <input type="text" name="age_start" class="form-control" placeholder="с">
                <input type="text" name="age_end" class="form-control" placeholder="по">
            </div>
            <div class="form-group-button">
                <input id="search_button" type="submit" value="Поиск" name="search_button" class="btn btn-success pull-right">
            </div>
        </form><br>';

echo '<div id="results"></div>';

require_once 'footer.php';
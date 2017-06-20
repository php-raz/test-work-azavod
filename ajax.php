<?php
require_once 'function.php';
$users = new Users();


if (!empty($_POST["search_button"])) {

    $search_user = $_POST["search_user"];
    if (!empty($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        $gender = array();
    }
    $age_start = $_POST["age_start"];
    $age_end = $_POST["age_end"];

    $data = $users->findWhere($search_user, $gender, $age_start, $age_end);
    print_reestr($data);
}


if (!empty($_POST['update_user'])) {

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $data = $users->findOne($id);

    $surname = filter_input(INPUT_POST, 'surname_user', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $patronymic = filter_input(INPUT_POST, 'patronymic_user', FILTER_SANITIZE_STRING);
    $birthday = filter_input(INPUT_POST, 'birth_user', FILTER_SANITIZE_NUMBER_FLOAT);
    $gender = filter_input(INPUT_POST, 'gender_user', FILTER_SANITIZE_NUMBER_INT);

    $file = $_FILES['img_user_update'];
    $image = save_file($file);

    if (empty($image)) {
        $image = $data[6];
    }

    $users->update($id, $surname, $name, $patronymic, $birthday, $gender, $image);

    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: /");

}

if (!empty($_POST['create_user'])) {
    
    $surname = filter_input(INPUT_POST, 'surname_user', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name_user', FILTER_SANITIZE_STRING);
    $patronymic = filter_input(INPUT_POST, 'patronymic_user', FILTER_SANITIZE_STRING);
    $birthday = filter_input(INPUT_POST, 'birth_user', FILTER_SANITIZE_NUMBER_FLOAT);
    $gender = filter_input(INPUT_POST, 'gender_user', FILTER_SANITIZE_NUMBER_INT);

    $file = $_FILES['img_user'];
    $image = save_file($file);

    $user = new Users();
    $user->create($surname, $name, $patronymic, $birthday, $gender, $image);

    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: /");

}

if (!empty($_GET['delete']) and $_GET['delete'] == 'delete') {

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $user = new Users();
    echo $user->delete($id);

    header("HTTP/1.1 307 Temporary Redirect");
    header("Location: /");
}

?>
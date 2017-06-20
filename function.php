<?php
function __autoload($class){
    include 'classes/class.' . $class . '.php';
}

function print_reestr($data) {
    $num = 5;  
    if (isset($_POST['page'])) {
        $current_page = intval($_POST['page']); 
    }
     
    $users_count = count($data); 
    $pages_count = intval(($users_count - 1) / $num) + 1;  

    if(empty($current_page) or $current_page < 0) {
        $current_page = 1;  
    }
        
    if($current_page > $pages_count) {
        $current_page = $pages_count;  
    }

    $start = $current_page * $num - $num;  
     
    $result = '';
    $result .= '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="row">№ id</th>
                            <th>Фото</th>
                            <th>ФИО</th>
                            <th>Возраст</th>
                            <th>Пол</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                <tbody>';

    for ($i=0; $i < $num; $i++) { 
        if( $start == $users_count) {
            continue;
        }
        $result .= '<tr><td>' . $data[$start]['id'] . '</td>';
        $result .= '<td><img  onmouseover="this.width=64;this.height=64" onmouseout="this.width=47;this.height=46" width="47" height="46" class="reestr_show" src="' . $data[$start]['image'] . '"></td>';
        $result .= '<td>' . $data[$start]['surname'] .' '. $data[$start]['name'] .' '. $data[$start]['patronymic'] . '</td>';
        $result .= '<td>' . calculate_age($data[$start]['birthday']) .' лет'. '</td>';
        $result .= '<td>' . gender_color($data[$start]['gender']) . '</td>';
        $result .= '<td><a href="users.php?c=update&id=' . $data[$start]['id'] . '">Ред, </a><a href="ajax.php?delete=delete&id=' . $data[$start]['id'] . '" onclick="return confirm(\'Действительно удалить?\')">удал</a></td>';
        $start++;

    }
    $result .= '</tbody></table>';
    echo $result;
     
    pagination($current_page, $pages_count);

}

function pagination($current_page, $pages_count) {
    if($current_page - 2 > 0) {
        $page2left = $current_page - 2;
        $page2left = '<a href="javascript:ajax_page('.$page2left.');"> '.$page2left .'</a> | ';
    } 
    if($current_page - 1 > 0) {
        $page1left = $current_page - 1;
        $page1left = '<a href="javascript:ajax_page('.$page1left.');"> '.$page1left .'</a> | ';  
    }

    if($current_page + 2 <= $pages_count) {
        $page2right = $current_page + 2;
        $page2right = ' | <a href="javascript:ajax_page('.$page2right.');"> '.$page2right.' </a>';  
    }
    if($current_page + 1 <= $pages_count) {
        $page1right = $current_page + 1;
        $page1right = ' | <a href="javascript:ajax_page('.$page1right.');"> '.$page1right.' </a>'; 
    } 

    $pagination = '';
    if (!empty($page2left)) {
        $pagination .= $page2left;
    }
    if (!empty($page1left)) {
        $pagination .= $page1left;
    }
    $pagination .= '<b>'.$current_page.'</b>';
    if (!empty($page1right)) {
        $pagination .= $page1right;
    }
    if (!empty($page2right)) {
        $pagination .= $page2right;
    }
    echo $pagination; 
}

function calculate_age($birthday) {
  $birthday_timestamp = strtotime($birthday);
  $age = date('Y') - date('Y', $birthday_timestamp);
  if (date('md', $birthday_timestamp) > date('md')) {
    $age--;
  }
  return $age;
}

function gender_color($num) {
    if ($num == 1) {
        $result = "<font color='blue'>Муж</font>";
    } else {
        $result = "<font color='red'>Жен</font>";
    }
    return $result;
}

function save_file($file) {
    if (isset($file['name']) && !empty($file['name'])) {
        
        if ($file['size'] <= 200000 && $file['size'] > 0) {
            $file_name = '/assets/img/' . $file['name'];
            $file_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $file_path);
        } else {
            $file_name = '<h4>Размер файла превышает максимально допустимый размер(200 кб). Загрузите другой файл.</h4>';
        }
        return $file_name; 
    }
}

function select_gender($value){
    if ($value == 1) {
        $result = '<option value="1" selected>Муж.</option><option value="0">Жен.</option>';
    } else {
        $result = '<option value="1">Муж.</option><option value="0" selected>Жен.</option>';
    }
    return $result;
}
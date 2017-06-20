<?php
require_once 'header.php';
require_once 'function.php';

if (isset($_GET['c']) and !empty($_GET['c'])) {
    switch($_GET['c']){
        case 'create':
            $action = 'create';
            break;
        case 'update':
            $action = 'update';
            break;
    }
    
    include_once("users/$action.php");
}

require_once 'footer.php';
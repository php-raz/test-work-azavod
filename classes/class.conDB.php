<?php

final class conDB
{
    public static $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        $mysqli = @new mysqli('localhost', 'n988692e_azavod', 'test_azavod', 'n988692e_azavod');
        if (mysqli_connect_errno()) {
            die(mysqli_connect_error());
        }
        $mysqli->query("SET CHARSET utf8");
        self::$db = $mysqli;
    }
}
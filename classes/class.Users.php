<?php

class Users
{
    private $mysqli;

    public function __construct()
    {
        conDB::getInstance();
        $db = conDB::$db;
        $this->mysqli = $db;
    }

    public function create($surname, $name, $patronymic, $birthday, $gender, $image)
    {
        $sql = 'INSERT INTO `users` SET surname = "' . $surname . '", name = "' . $name . '", patronymic = "' . $patronymic . '", birthday = "' . $birthday . '", gender = "' . $gender . '", image = "' . $image . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) {
            die($this->mysqli->error);
        }
    }

    public function update($id, $surname, $name, $patronymic, $birthday, $gender, $image)
    {
        $sql = 'UPDATE `users` SET surname = "' . $surname . '", name = "' . $name . '", patronymic = "' . $patronymic . '", birthday = "' . $birthday . '", gender = "' . $gender . '", image = "' . $image . '" WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);

    }

    public function find()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findBy($arr = array())
    {
        $sql = '';
        foreach ($arr as $key => $value) {
            $sql .= 'SELECT * FROM `users` WHERE ' . $key . ' = "' . $value . '"';
        }
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function findOne($id)
    {
        $sql = 'SELECT * FROM `users` WHERE id = "' . $id . '"';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_row();

    }
    
    public function findWhere($search_user, $gender, $age_start, $age_end)
    {
        function addWhere($where, $add, $and = true) {
            if ($where) {
                if ($and) {
                    $where .= " AND $add";
                }
            }
            else {
                $where = $add;
            }
            return $where;
        }

        $where = "";
        $age = "((YEAR(CURRENT_DATE)-YEAR(birthday)) - (RIGHT(CURRENT_DATE,5)<RIGHT(birthday,5)))";
        if ($search_user) {
            $word = htmlspecialchars($search_user);
            $where = addWhere($where, "(`surname` LIKE '%" . $word . "%' OR `name` LIKE '%" . $word . "%' OR `patronymic` LIKE '%" . $word . "%')");
        }

        if ($gender) {
            if (count($gender) == 2) {
                $where = addWhere($where, "`gender` IN ('1', '0')");
            } elseif (count($gender) == 1) {
                $gender_num = htmlspecialchars($gender[0]);
                $where = addWhere($where, "`gender` = '".$gender_num."'");
            } else {
                $where = addWhere($where, "`gender` = NULL");
            }
            
        }

        if ($age_start) {            
            $age_start = htmlspecialchars($age_start);
            $where = addWhere($where, "$age >= $age_start");
        }
        if ($age_end) {
            $age_end = htmlspecialchars($age_end);
            $where = addWhere($where, "$age <= $age_end");
        }
        
        $sql = "SELECT * FROM `users`";
        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function count_row()
    {
        $sql = 'SELECT COUNT(*) FROM `users`';
        $result = $this->mysqli->query($sql);
        if (!$result) die($this->mysqli->error);
        $result = $result->fetch_row();
        return $result[0];

    }
}
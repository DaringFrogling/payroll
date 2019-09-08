<?php


class Validations
{
    public static function CheckName($name)
    {
        if (preg_match("/^[a-zA-Z]+\s+[a-zA-Z]+$/", $name)) {
            return true;
        }
    }

    public static function CountEmployees($department)
    {
        $db = Db::getConnection();

        $sql = "SELECT COUNT(id) FROM produced_products WHERE product_id = :department";

        $result = $db->prepare($sql);
        $result->bindParam(':department', $department, PDO::PARAM_STR);
        $result->execute();

        $count = $result->fetchColumn();

        if ($count <= 10) {
            return true;
        } else {
            return false;
        }

    }

    public static function IsSelected($department)
    {
        if ($department != 0) {
            return true;
        }
    }
}
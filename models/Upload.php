<?php


class Upload
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

    public static function AddRecord($employee, $department, $amount, $salary)
    {
        $db = Db::getConnection();

        $sql1 = 'INSERT INTO employees (name_surname) VALUES (:employee)';

        $result = $db->prepare($sql1);
        $result->bindParam(':employee', $employee, PDO::PARAM_STR);


        $sql2 = "INSERT INTO produced_products (employee_id, product_id, amount, salary) VALUES (LAST_INSERT_ID(), '$department', '$amount', '$salary')";

        $res = $db->prepare($sql2);

        if ($result->execute() && $res->execute()){
            return true;
        }else{
            return false;
        }
    }

    public static function UpdateRecord($id, $employee, $department, $amount, $salary)
    {
        $db = Db::getConnection();
        $sql1 = "UPDATE employees SET name_surname=:employee WHERE id=:id";

        $result = $db->prepare($sql1);
        $result->bindParam(':employee', $employee, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        $sql2 = "UPDATE produced_products SET product_id = '$department', amount= '$amount', salary = '$salary' WHERE id=" . $id;

        $res = $db->prepare($sql2);

        if ($result->execute() && $res->execute()){
            return true;
        }else{
            return false;
        }
    }

}
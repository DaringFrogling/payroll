<?php


class Actions
{
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

    public static function DeleteRecord($id)
    {
        $db = Db::getConnection();

        $sql1 = "DELETE FROM employees WHERE id=:id";

        $result = $db->prepare($sql1);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        $sql2 = "DELETE FROM produced_products WHERE id=:id";

        $res = $db->prepare($sql2);
        $res->bindParam(':id', $id, PDO::PARAM_STR);

        if ($result->execute() && $res->execute()){

            $jsonResponse = array(
                'status' => 200
            );

            echo json_encode($jsonResponse);

            return true;
        }else{
            return false;
        }
    }

}
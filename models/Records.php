<?php


class Records
{
    /*
     * Returns single row with specified id
     * @param int $id
     * */
    public static function getRowById($id)
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT 
                                            produced_products.id,
                                            employees.name_surname as employee_id,
                                            produced_products.product_id,
                                            produced_products.amount,
                                            produced_products.salary
                                        FROM
                                            produced_products
                                                INNER JOIN
                                            employees ON produced_products.employee_id = employees.id
                                        WHERE produced_products.id =' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $singleRecord = $result->fetch();

            $i = 0;
            while ($row = $result->fetch()) {
                $singleRecord[$i]['id'] = $row['id'];
                $singleRecord[$i]['employee_id'] = $row['employee_id'];
                $singleRecord[$i]['product_id'] = $row['product_id'];
                $singleRecord[$i]['amount'] = $row['amount'];
                $singleRecord[$i]['salary'] = $row['salary'];
                $i++;
            }

            return $singleRecord;
        }
    }

    /*
     * Returns an array of records
     * @param int $id
     * */
    public static function getRecordsList()
    {
        $db = Db::getConnection();

        $recordsList = array();

        $result = $db->query('SELECT 
                                            produced_products.id,
                                            employees.name_surname as employee_id,
                                            products.item as product_id,
                                            produced_products.amount,
                                            produced_products.salary
                                        FROM
                                            produced_products
                                                INNER JOIN
                                            employees ON produced_products.employee_id = employees.id
                                                INNER JOIN
                                            products ON produced_products.product_id = products.id
                                        ORDER BY produced_products.id ASC');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $recordsList[$i]['id'] = $row['id'];
            $recordsList[$i]['employee_id'] = $row['employee_id'];
            $recordsList[$i]['product_id'] = $row['product_id'];
            $recordsList[$i]['amount'] = $row['amount'];
            $recordsList[$i]['salary'] = $row['salary'];
            $i++;
        }

        return $recordsList;
    }

}
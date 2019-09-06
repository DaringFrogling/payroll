<?php

include_once ROOT . '/models/Records.php';
include_once ROOT . '/models/Upload.php';

class mainController
{
    public function actionIndex()
    {
        $recordsList = array();
        $recordsList = Records::getRecordsList();

        require_once(ROOT . '/views/index.php');

        return true;
    }

    public function actionAdd()
    {
        $employee = '';
        $department = '';
        $amount = '';
        $salary = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $employee = $_POST['employee-name'];
            $department = $_POST['department'];
            $amount = $_POST['produced-products'];
            $salary = $_POST['salary'];

            $errors = false;

            if (!Upload::CheckName($employee)) {
                $errors[] = 'Необходимо задать имя и фамилию!';
            }

            if (!Upload::CountEmployees($department)) {
                $errors[] = 'В этом отделе уже заняты все рабочие места!';
            }

            if (!Upload::IsSelected($department)) {
                $errors[] = 'Необходимо выбрать категорию!';
            }

            if ($errors == false) {
                $result = Upload::AddRecord($employee, $department, $amount, $salary);
            }

        }

        require_once(ROOT . '/views/add.php');

        return true;
    }

    public function actionEdit($id)
    {
        $singleRecord = array();
        $singleRecord = Records::getRowById($id);

        $id = '';
        $employee = '';
        $department = '';
        $amount = '';
        $salary = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $employee = $_POST['employee-name'];
            $department = $_POST['department'];
            $amount = $_POST['produced-products'];
            $salary = $_POST['salary'];

            $errors = false;

            if (!Upload::CheckName($employee)) {
                $errors[] = 'Необходимо задать имя и фамилию!';
            }

            if (!Upload::CountEmployees($department)) {
                $errors[] = 'В этом отделе уже заняты все рабочие места!';
            }

            if (!Upload::IsSelected($department)) {
                $errors[] = 'Необходимо выбрать категорию!';
            }

            if ($errors == false) {
                $result = Upload::UpdateRecord($id, $employee, $department, $amount, $salary);
            }


        }

        require_once(ROOT . '/views/edit.php');

        return true;

    }

}
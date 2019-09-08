<?php

include_once ROOT . '/models/Records.php';
include_once ROOT . '/models/Actions.php';
include_once ROOT . '/models/Validations.php';

class mainController
{
    public function actionIndex()
    {
        $recordsList = Records::getRecordsList();

        if (isset($_POST['action']) && $_POST['action'] === 'delete-row') {
            $id = $_POST['id'];

            Actions::DeleteRecord($id);

            return true;
        }

        require_once(ROOT . '/app/views/index.php');

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

            if (!Validations::CheckName($employee)) {
                $errors[] = 'Необходимо задать имя и фамилию!';
            }

            if (!Validations::CountEmployees($department)) {
                $errors[] = 'В этом отделе уже заняты все рабочие места!';
            }

            if (!Validations::IsSelected($department)) {
                $errors[] = 'Необходимо выбрать категорию!';
            }

            if ($errors == false) {
                $result = Actions::AddRecord($employee, $department, $amount, $salary);
            }

        }

        require_once(ROOT . '/app/views/add.php');

        return true;
    }

    public function actionEdit($id)
    {
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

            if (!Validations::CheckName($employee)) {
                $errors[] = 'Необходимо задать имя и фамилию!';
            }

            if (!Validations::CountEmployees($department)) {
                $errors[] = 'В этом отделе уже заняты все рабочие места!';
            }

            if (!Validations::IsSelected($department)) {
                $errors[] = 'Необходимо выбрать категорию!';
            }

            if ($errors == false) {
                $result = Actions::UpdateRecord($id, $employee, $department, $amount, $salary);
            }


        }

        require_once(ROOT . '/app/views/edit.php');

        return true;

    }

}
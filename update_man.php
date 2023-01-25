<?php
require_once 'classes/People.php';

if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
    $model = new People();
    $model->name = $_POST['name'];
    $model->age = $_POST['age'];
    if($model->update_man($_POST['id'])){
        header('Location: index.php');
    }
}
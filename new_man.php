<?php
require_once 'People.php';

if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST){
    $model = new People();
    $model->name = $_POST['name'];
    $model->age = $_POST['age'];
    if($model->new_man()){
        header('Location: index.php');
    }
}
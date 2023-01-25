<?php
require_once 'People.php';

if ($_SERVER['REQUEST_METHOD']=='GET' && $_GET['id']){
    if(People::del_man($_GET['id'])){
        header('Location: index.php');
    }
}
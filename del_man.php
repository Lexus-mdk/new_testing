<?php
require_once 'classes/People.php';

if ($_SERVER['REQUEST_METHOD']=='GET' && $_GET['id']){
    if(People::del_man($_GET['id'])){
        header('Location: index.php');
    }
}
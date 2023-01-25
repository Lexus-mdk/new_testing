<?php
require_once 'classes/People.php';
require_once 'classes/Form.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Перепись</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
</head>
<body>
<h1>Перепись</h1>
    <div class="form" id="add">
        <?php $form = Form::Begin(['method'=>'post', 'action'=>'new_man.php'])?>
        <?= $form->input(['type'=>'text', 'name'=>'name'], 'Имя: ', true)?>
        <?= $form->input(['type'=>'number', 'name'=>'age'], 'Возраст: ', false)?>
        <?= $form->submit(['value'=>'Сохранить'])?>
        <?php $form::end();?>
    </div>
    <div class="form none" id="update-form">
        <?php $form = Form::Begin(['method'=>'post', 'action'=>'update_man.php'])?>
        <?= $form->input(['type'=>'number', 'name'=>'id', 'style'=>'display:none;', 'id'=>'id'], false, true)?>
        <?= $form->input(['type'=>'text', 'name'=>'name', 'id'=>'name'], 'Имя: ', true)?>
        <?= $form->input(['type'=>'number', 'name'=>'age', 'id'=>'age'], 'Возраст: ', false)?>
        <?= $form->submit(['value'=>'Изменить'])?>
        <?php $form::end();?>
        <a href="#" id="cancel">Отмена</a>
    </div>
    <div class="table">
        <?php
            People::render_table();
        ?>
    </div>
    <div class="statistic">
        <?php
        People::statistic();
        ?>
    </div>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
